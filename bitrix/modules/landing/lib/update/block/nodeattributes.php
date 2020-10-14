<?

namespace Bitrix\Landing\Update\Block;


use Bitrix\Landing\Manager;
use Bitrix\Landing\Subtype\Form;
use Bitrix\Main\Config\Option;
use Bitrix\Main\Update\Stepper;
use Bitrix\Landing\Block;
use Bitrix\Landing\Internals\BlockTable;
use Bitrix\Main\Entity;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Loader;
use Bitrix\Main\Web\DOM\Element;

final class NodeAttributes extends Stepper
{
	const CONTINUE_EXECUTING = true;
	const STOP_EXECUTING = false;
	const OPTION_NAME = 'blocks_attrs_update';
	const OPTION_STATUS_NAME = 'blocks_attrs_update_status';
	const STEP_PORTION = 10;    //count of block CODES to step
	
	protected static $moduleId = 'landing';
	protected $dataToUpdate = array();
	protected $blocksToUpdate = array();
	protected $sitesToUpdate = array();
	protected $status = array();
	protected $codesToStep = array();
	
	/**
	 * get progress from option or set default
	 */
	private function loadCurrentStatus()
	{
//		saved in option
		$this->status = Option::get('landing', self::OPTION_STATUS_NAME, '');
		$this->status = ($this->status !== '' ? @unserialize($this->status) : array());
		$this->status = (is_array($this->status) ? $this->status : array());

//		or default
		if (empty($this->status))
		{
//			get codes from all updaters options
			$count = 0;
			$params = array();
			foreach (Option::getForModule('landing') as $key => $option)
			{
				if (strpos($key, self::OPTION_NAME) === 0 && $key != self::OPTION_STATUS_NAME)
				{
					$option = ($option !== '' ? @unserialize($option) : array());

//					save params
					$params[$key] = $option['PARAMS'];
//					count of all blocks - to progress-bar
					$filter = array(
						'CODE' => array_keys($option['BLOCKS']),
						'DELETED' => 'N',
					);
					if (
						isset($option['PARAMS']['UPDATE_PUBLISHED_SITES']) &&
						$option['PARAMS']['UPDATE_PUBLISHED_SITES'] != 'Y'
					)
					{
						$filter['PUBLIC'] = 'N';
					}
					
					$res = BlockTable::getList(array(
						'select' => array(
							new \Bitrix\Main\Entity\ExpressionField(
								'CNT', 'COUNT(*)'
							),
						),
						'filter' => $filter,
					));
					if ($row = $res->fetch())
					{
						$count += $row['CNT'];
					}
				}
			}
			
			$this->status['COUNT'] = $count;
			$this->status['STEPS'] = 0;
			$this->status['SITES_TO_UPDATE'] = array();
			$this->status['UPDATER_ID'] = '';
			$this->status['PARAMS'] = $params;
			
			Option::set('landing', self::OPTION_STATUS_NAME, $this->status);
		}
	}
	
	/**
	 * May be several Options for update data. They have uniqueId. Find ID of first option
	 *
	 * @return string
	 */
	private function getUpdaterUniqueId()
	{
//		continue processing current updater
		if ($this->status['UPDATER_ID'] !== '')
		{
			return $this->status['UPDATER_ID'];
		}
		
		$updaterOptions = Option::getForModule('landing');
		$allOptions = preg_grep('/' . self::OPTION_NAME . '.+/', array_keys($updaterOptions));
		$allOptions = array_diff($allOptions, array(self::OPTION_STATUS_NAME));    // remove status option from list
		sort($allOptions);
		
		if (!empty($allOptions))
		{
			return str_replace(self::OPTION_NAME, '', $allOptions[0]);
		}
		else
		{
			return '';
		}
	}
	
	
	public function execute(array &$result)
	{
//		dbg
//		self::log('UPDATER START');
//		nothing to update
		$this->loadCurrentStatus();

//		dbg
		self::log('UPDATER START', $this->status);
		
		if (!$this->status['COUNT'])
		{
			self::finish();
			
			return self::STOP_EXECUTING;
		}

//		find option. If nothing - we update all
		$this->status['UPDATER_ID'] = $this->getUpdaterUniqueId();

//		dbg
//		self::log('unique id', $this->status['UPDATER_ID']);
		
		if (!$this->status['UPDATER_ID'])
		{
			self::finish();
			
			return self::STOP_EXECUTING;
		}
		
		$this->processBlocks();

//		was processing all data for current option
		if (!is_array($this->dataToUpdate['BLOCKS']) || empty($this->dataToUpdate['BLOCKS']))
		{
			$this->finishOption();
		}

//		dbg
		self::log('UPDATER before CONTINUE (status)', $this->status);
		
		$result['count'] = $this->status['COUNT'];
		$result['steps'] = $this->status['STEPS'];
		
		return self::CONTINUE_EXECUTING;
	}
	
	
	/**
	 * Additional operations before stop executing
	 */
	private static function finish()
	{
//		dbg
		self::log('UPDATER FINISH');
		
		self::clearOptions();
		self::removeCustomEvents();
	}
	
	
	/**
	 * If no more blocks to update - remove all data options and status
	 *
	 * @throws \Bitrix\Main\ArgumentNullException
	 */
	private static function clearOptions()
	{
		foreach (Option::getForModule('landing') as $key => $option)
		{
			if (strpos($key, self::OPTION_NAME) === 0)
			{
				Option::delete('landing', array('name' => $key));
			}
		}
	}
	
	
	/**
	 * Create option name by base name and unique ID
	 * @return string
	 */
	private function getOptionName()
	{
		return self::OPTION_NAME . $this->status['UPDATER_ID'];
	}
	
	
	private function collectBlocks()
	{
//		dbg
//		self::log('');
		
		$this->dataToUpdate = Option::get(self::$moduleId, $this->getOptionName());
		$this->dataToUpdate = ($this->dataToUpdate !== '' ? @unserialize($this->dataToUpdate) : array());

//		dbg
		self::log('data to update collected', $this->dataToUpdate);
		
		$this->codesToStep = array_unique(array_keys($this->dataToUpdate['BLOCKS']));
		$this->codesToStep = array_slice($this->codesToStep, 0, self::STEP_PORTION);

//		load BLOCKS
		$filter = array(
			'CODE' => $this->codesToStep,
			'DELETED' => 'N',
		);
		if (
			isset($this->status['PARAMS'][$this->getOptionName()]['UPDATE_PUBLISHED_SITES']) &&
			$this->status['PARAMS'][$this->getOptionName()]['UPDATE_PUBLISHED_SITES'] != 'Y'
		)
		{
			$filter['PUBLIC'] = 'N';
		}
		
		$resBlock = BlockTable::getList(array(
			'filter' => $filter,
			'select' => array(
				'ID',
				'SORT',
				'CODE',
				'ACTIVE',
				'PUBLIC',
				'DELETED',
				'CONTENT',
				'LID',
				'SITE_ID' => 'LANDING.SITE_ID',
			),
			'order' => array(
				'CODE' => 'ASC',
				'ID' => 'ASC',
			),
		));
		
		while ($row = $resBlock->fetch())
		{
			$this->blocksToUpdate[$row['CODE']][$row['ID']] = new Block($row['ID'], $row);
			if (count($this->blocksToUpdate) > self::STEP_PORTION)
			{
				unset($this->blocksToUpdate[$row['CODE']]);
				break;
			}

//			save sites ID for current blocks to reset cache later
			$this->sitesToUpdate[$row['ID']] = $row['SITE_ID'];
		}

//		dbg
//		self::log('blocks to update are found');
	}
	
	
	private function processBlocks()
	{
//		dbg
		self::log('process blocks start');
		
		$this->collectBlocks();
		
		foreach ($this->blocksToUpdate as $code => $blocks)
		{
			foreach ($blocks as $block)
			{
//				dbg
//				self::log('update BLOCK BEFORE (check exist data)', array('code' => $code));
				if (is_array($this->dataToUpdate['BLOCKS'][$code]) && !empty($this->dataToUpdate['BLOCKS'][$code]))
				{
					$this->updateBlock($block);

//					after processing block save site ID to update cache later (only if update needed)
					if (
						isset($this->status['PARAMS'][$this->getOptionName()]['UPDATE_PUBLISHED_SITES']) &&
						$this->status['PARAMS'][$this->getOptionName()]['UPDATE_PUBLISHED_SITES'] == 'Y'
					)
					{
						$this->status['SITES_TO_UPDATE'][] = $this->sitesToUpdate[$block->getId()];
					}
				}
				
				$this->status['STEPS']++;
			}
		}
		
		$this->finishStep();
	}
	
	private function updateBlock(Block $block)
	{
//		dbg
		self::log('update BLOCK START', array(
			'code' => $block->getCode(),
			'id' => $block->getId(),
			'dataToUpdate' => $this->dataToUpdate['BLOCKS'][$block->getCode()],
		));
		
		$code = $block->getCode();
		$doc = $block->getDom();
		$wrapper = Block::getAnchor($block->getId());

//		save to journal
		$eventLog = new \CEventLog;
		$eventLog->Add(array(
			"SEVERITY" => $eventLog::SEVERITY_SECURITY,
			"AUDIT_TYPE_ID" => 'LANDING_BLOCK_BEFORE_UPDATE',
			"MODULE_ID" => "landing",
			"ITEM_ID" => 'landing_block_' . $block->getId(),
			"DESCRIPTION" => $doc->getInnerHTML(),
		));
		
		foreach ($this->dataToUpdate['BLOCKS'][$code]['NODES'] as $selector => $rules)
		{
//			apply to the all block or by selector
			if ($selector == $wrapper)
			{
				$resultList = array(
					array_pop($doc->getChildNodesArray()),
				);
			}
			else
			{
				$resultList = $doc->querySelectorAll($selector);
			}

//			prepare ATTRS
			$nodeAttrs = array();
			if (is_array($rules['ATTRS_ADD']) && !empty($rules['ATTRS_ADD']))
			{
				$nodeAttrs = array_merge($nodeAttrs, $rules['ATTRS_ADD']);
			}
			if (is_array($rules['ATTRS_REMOVE']) && !empty($rules['ATTRS_REMOVE']))
			{
				$nodeAttrs = array_merge($nodeAttrs, array_fill_keys(array_values($rules['ATTRS_REMOVE']), ''));
			}

//			PROCESS
			foreach ($resultList as $nth => $resultNode)
			{
//				FILTER
//				use until cant add some filters in DOM\Parser
				if (is_array($rules['FILTER']) && !empty($rules['FILTER']))
				{
					$notFilterd = false;
//					By content. May have 'NOT' key
					if (
						isset($rules['FILTER']['CONTENT']) && is_array($rules['FILTER']['CONTENT']) &&
						(
							$rules['FILTER']['CONTENT']['VALUE'] != $resultNode->getInnerHTML() ||
							(
								$rules['FILTER']['CONTENT']['NOT'] &&
								$rules['FILTER']['CONTENT']['VALUE'] == $resultNode->getInnerHTML()
							)
						)
					)
					{
						$notFilterd = true;
					}

//					by position in DOM
					if (
						isset($rules['FILTER']['NTH']) && is_array($rules['FILTER']['NTH']) &&
						isset($rules['FILTER']['NTH']['VALUE']) &&
						$nth + 1 != $rules['FILTER']['NTH']['VALUE']
					)
					{
						$notFilterd = true;
					}
					
					if ($notFilterd)
					{
						continue;
					}
				}

//				CLASSES
				$classesChange = false;
				$nodeClasses = $resultNode->getClassList();
				if (is_array($rules['CLASSES_REMOVE']) && !empty($rules['CLASSES_REMOVE']))
				{
					$nodeClasses = array_diff($nodeClasses, $rules['CLASSES_REMOVE']);
					$classesChange = true;
				}
				if (is_array($rules['CLASSES_ADD']) && !empty($rules['CLASSES_ADD']))
				{
					$nodeClasses = array_merge($nodeClasses, $rules['CLASSES_ADD']);
					$classesChange = true;
				}
				$nodeClasses = array_unique($nodeClasses);
				if ($classesChange)
				{
					$resultNode->setClassName(implode(' ', $nodeClasses));
				}

//				ID
				if ($rules['ID_REMOVE'] && $rules['ID_REMOVE'] == 'Y')
				{
					$resultNode->removeAttribute('id');
				}

//				ATTRS
				foreach ($nodeAttrs as $name => $value)
				{
//					reduce string (in attributes may be a complex data)
					$value = str_replace(array("\n", "\t"), "", $value);
					
					if ($value)
					{
						$resultNode->setAttribute($name, is_array($value) ? json_encode($value) : $value);
					}
					else
					{
						$resultNode->removeAttribute($name);
					}
				}

//				REMOVE NODE
				if (isset($rules['NODE_REMOVE']) && $rules['NODE_REMOVE'] === true)
				{
					$resultNode->getParentNode()->removeChild($resultNode);
				}
				
//				REPLACE CONTENT by regexp
//				be CAREFUL!
				if (
					isset($rules['REPLACE_CONTENT']) && is_array($rules['REPLACE_CONTENT']) &&
					array_key_exists('regexp', $rules['REPLACE_CONTENT']) &&
					array_key_exists('replace', $rules['REPLACE_CONTENT'])
				)
				{
					$innerHtml = $resultNode->getInnerHTML();
					$innerHtml = preg_replace($rules['REPLACE_CONTENT']['regexp'], $rules['REPLACE_CONTENT']['replace'], $innerHtml);
					if(strlen($innerHtml) > 0)
					{
						$resultNode->setInnerHTML($innerHtml);
					}
				}
			}


//			add CONTAINER around nodes.
			if (
				isset($rules['CONTAINER_ADD']) && is_array($rules['CONTAINER_ADD']) &&
				isset($rules['CONTAINER_ADD']['CLASSES']) &&
				!empty($resultList)
			)
			{
				if (!is_array($rules['CONTAINER_ADD']['CLASSES']))
				{
					$rules['CONTAINER_ADD']['CLASSES'] = [$rules['CONTAINER_ADD']['CLASSES']];
				}
//				check if container exist
				$firstNode = $resultList[0];
				$parentNode = $firstNode->getParentNode();
				$parentClasses = $parentNode->getClassList();
				if (empty(array_diff($rules['CONTAINER_ADD']['CLASSES'], $parentClasses)))
				{
					break;
				}

//				param TO_EACH - add container to each element. Default (false) - add container once to all nodes
				if (!isset($rules['CONTAINER_ADD']['TO_EACH']) || $rules['CONTAINER_ADD']['TO_EACH'] !== true)
				{
					$containerNode = new Element($rules['CONTAINER_ADD']['TAG'] ? $rules['CONTAINER_ADD']['TAG'] : 'div');
					$containerNode->setOwnerDocument($doc);
					$containerNode->setClassName(implode(' ', $rules['CONTAINER_ADD']['CLASSES']));
					$parentNode->insertBefore($containerNode, $firstNode);
					foreach ($resultList as $resultNode)
					{
						$parentNode->removeChild($resultNode);
						$containerNode->appendChild($resultNode);
					}
				}
				else
				{
					foreach ($resultList as $resultNode)
					{
						$containerNode = new Element($rules['CONTAINER_ADD']['TAG'] ? $rules['CONTAINER_ADD']['TAG'] : 'div');
						$containerNode->setOwnerDocument($doc);
						$containerNode->setClassName(implode(' ', $rules['CONTAINER_ADD']['CLASSES']));
						$parentNode->insertBefore($containerNode, $resultNode);
						
						$parentNode->removeChild($resultNode);
						$containerNode->appendChild($resultNode);
					}
				}
			}
		}

//		dbg
//		self::log('update block before save content');
		$block->saveContent($doc->saveHTML());

//		updates COMPONENTS params
		if (is_array($this->dataToUpdate['BLOCKS'][$code]['UPDATE_COMPONENTS']))
		{
			foreach ($this->dataToUpdate['BLOCKS'][$code]['UPDATE_COMPONENTS'] as $selector => $params)
			{
				$block->updateNodes(array($selector => $params));
			}
		}

//		if need remove PHP - we must use block content directly, not DOM parser
		if (
			$this->dataToUpdate['BLOCKS'][$code]['CLEAR_PHP'] &&
			$this->dataToUpdate['BLOCKS'][$code]['CLEAR_PHP'] == 'Y'
		)
		{
//			dbg
			self::log('update block before clear PHP');
			$content = $block->getContent();
			$content = preg_replace('/<\?.*\?>/s', '', $content);
			$block->saveContent($content);
		}

//		change block SORT
		if (
			$this->dataToUpdate['BLOCKS'][$code]['SET_SORT'] &&
			is_numeric($this->dataToUpdate['BLOCKS'][$code]['SET_SORT'])
		)
		{
//			dbg
			self::log('update block before set sort');
			$block->setSort($this->dataToUpdate['BLOCKS'][$code]['SET_SORT']);
		}

//		dbg
//		self::log('update block before save');
		$block->save();

//		dbg
		self::log('update BLOCK FINISH', array('code' => $block->getCode()));
	}
	
	
	private function finishStep()
	{
//		dbg
		self::log('finish STEP (codes to step)', array(
			'codesToStep' => $this->codesToStep,
			'status' => $this->status,
		));

//		processed blocks must be removed from data
		foreach ($this->codesToStep as $code)
		{
			unset($this->dataToUpdate['BLOCKS'][$code]);
		}
		
		Option::set('landing', $this->getOptionName(), serialize($this->dataToUpdate));
		Option::set('landing', self::OPTION_STATUS_NAME, serialize($this->status));
	}
	
	private function finishOption()
	{
//		clean cloud sites cache only if needed
		$this->updateSites();

//		dbg
//		self::log('UPDATER FINISH OPTION before', array('optionName' => $this->getOptionName()));

//		finish current updater id, try next
		Option::delete('landing', array('name' => $this->getOptionName()));
		$this->status['SITES_TO_UPDATE'] = array();
		$this->status['UPDATER_ID'] = '';
		Option::set('landing', self::OPTION_STATUS_NAME, serialize($this->status));

//		dbg
		self::log('UPDATER FINISH OPTION', array('optionName' => $this->getOptionName(), 'status' => $this->status));
	}
	
	
	private function updateSites()
	{
		if (
			isset($this->status['PARAMS'][$this->getOptionName()]['UPDATE_PUBLISHED_SITES']) &&
			$this->status['PARAMS'][$this->getOptionName()]['UPDATE_PUBLISHED_SITES'] == 'Y' &&
			Loader::includeModule('bitrix24')
			
			&& false
//			dbg: need this?
		)
		{
			foreach (array_unique($this->status['SITES_TO_UPDATE']) as $siteId)
			{
				if (intval($siteId))
				{
//					Site::update($siteId, array());
				}
			}
		}
	}
	
	
	/**
	 * Before delete block handler.
	 * @param Entity\Event $event Event instance.
	 * @return Entity\EventResult
	 */
	public static function disableBlockDelete(Entity\Event $event)
	{
		if (\Bitrix\Landing\Update\Stepper::checkAgentActivity('\Bitrix\Landing\Update\Block\NodeAttributes'))
		{
			$result = new Entity\EventResult();
			$result->setErrors(array(
				new Entity\EntityError(
					Loc::getMessage('LANDING_BLOCK_DISABLE_DELETE'),
					'BLOCK_DISABLE_DELETE'
				),
			));
			
			return $result;
		}
		else
		{
			self::removeCustomEvents();
		}
	}
	
	/**
	 * Before publication landing handler.
	 * @param \Bitrix\Main\Event $event Event instance.
	 * @return Entity\EventResult
	 */
	public static function disablePublication(\Bitrix\Main\Event $event)
	{
		if (\Bitrix\Landing\Update\Stepper::checkAgentActivity('\Bitrix\Landing\Update\Block\NodeAttributes'))
		{
			$result = new Entity\EventResult;
			$result->setErrors(array(
				new \Bitrix\Main\Entity\EntityError(
					Loc::getMessage('LANDING_DISABLE_PUBLICATION'),
					'LANDING_DISABLE_PUBLICATION'
				),
			));
			
			return $result;
		}
		else
		{
			self::removeCustomEvents();
		}
	}
	
	
	/**
	 * If agent not exist - we must broke events, to preserve infinity blocking publication and delete
	 */
	public static function removeCustomEvents()
	{
		$eventManager = \Bitrix\Main\EventManager::getInstance();
		$eventManager->unregisterEventHandler(
			'landing',
			'\Bitrix\Landing\Internals\Block::OnBeforeDelete',
			'landing',
			'\Bitrix\Landing\Update\Block\NodeAttributes',
			'disableBlockDelete');
		$eventManager->unregisterEventHandler(
			'landing',
			'onLandingPublication',
			'landing',
			'\Bitrix\Landing\Update\Block\NodeAttributes',
			'disablePublication'
		);
	}
	
	
	/**
	 * Update form domain, when updated b24 connector
	 * F.e., when user remove and new portal
	 * Other method, because different params
	 *
	 * @param Event $event
	 */
	public static function updateFormDomainByConnector($event)
	{
		self::updateFormDomain();
	}
	
	/**
	 * Set data for NodeUpdater to updating form domain
	 *
	 * @param array $domains
	 * @throws \Bitrix\Main\ArgumentException
	 * @throws \Bitrix\Main\ArgumentNullException
	 * @throws \Bitrix\Main\ArgumentOutOfRangeException
	 * @throws \Bitrix\Main\ObjectPropertyException
	 * @throws \Bitrix\Main\SystemException
	 */
	public static function updateFormDomain($domains = array())
	{
//		method may call from event or manual
		if (is_array($domains) && $domains['new_domain'])
		{
			$newDomain = $domains['new_domain'];
		}
		else
		{
			$newDomain = Form::getOriginalFormDomain();
		}

//		something wrong
		if (!$newDomain)
		{
			return;
		}

//		find all CRM FORM blocks
		$toUpdater = array(
			'PARAMS' => array(
				'UPDATE_PUBLISHED_SITES' => 'Y',
				'BLOCKS' => array(),
			),
		);

//		collect form blocks by content
		$resBlock = BlockTable::getList(array(
			'filter' => array(
				'DELETED' => 'N',
				'%=CONTENT' => '%data-b24form-original-domain%',
			),
			'select' => array('ID', 'CODE'),
		));
		foreach ($resBlock as $block)
		{
			$toUpdater['BLOCKS'][$block['CODE']] = array(
				'NODES' => array(
					'.bitrix24forms ' => array(
						'ATTRS_ADD' => array('data-b24form-original-domain' => $newDomain),
					),
				),
			);
		}

//		register UPDATER
		$updaterUniqueId = time();
		while (true)
		{
			if (\Bitrix\Main\Config\Option::get('landing', self::OPTION_NAME . $updaterUniqueId) == '')
			{
				break;
			}
			$updaterUniqueId++;
		}
		\Bitrix\Main\Config\Option::set('landing', self::OPTION_NAME . $updaterUniqueId, serialize($toUpdater));
		\Bitrix\Main\Update\Stepper::bindClass('\Bitrix\Landing\Update\Block\NodeAttributes', 'landing', 10);
	}
	
	/**
	 * Do nothing for fix bug.
	 * @return string
	 */
//	dbg: try to fix. May del this
//	public static function execAgent()
//	{
//		return '';
//	}
	
	/**
	 * @param $name
	 * @param array $data
	 * @throws \Bitrix\Main\Db\SqlQueryException
	 *
	 * @return void
	 */
	private static function log($name, $data = array())
	{
//		only for clouds
		if (!Manager::isB24())
		{
			return;
		}
		
		$data = serialize($data);
		
		$connection = \Bitrix\Main\Application::getConnection();
		if (!$connection->isTableExists('b_landing_nodeupdater_log'))
		{
			$connection->query("
				CREATE TABLE `b_landing_nodeupdater_log` (
				  `ID` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
				  `NAME` varchar(255) NULL,
				  `DATA` text NULL,
				  `DATE` timestamp NULL DEFAULT NOW()
				);
			");
			
		}
		$name = $connection->getSqlHelper()->forSql($name);
		$data = $connection->getSqlHelper()->forSql($data);
		$query = "INSERT INTO `b_landing_nodeupdater_log` (`NAME`, `DATA`) VALUES ('$name', '$data');";
		$dbRes = $connection->query($query);
	}
	
	
	/**
	 * Code for updater.php see in landing/dev/updater
	 */
}

?>