<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Постановление Совета РКА Об отдельных вопросах стажировки");
$APPLICATION->SetPageProperty("keywords", "");
$APPLICATION->SetPageProperty("description", "16.08.2012 № 02/12 г. Минск Об отдельных вопросах стажировки В целях единой практики разрешения вопросов, связанных со стажировкой адвокатов,совет Республиканской коллегии адвокатов ПОСТАНОВЛЯЕТ:");
$APPLICATION->SetTitle("Постановление Совета РКА Об отдельных вопросах стажировки");
?>
<div class="form-item form-type-item">
  <label>Язык </label>
 Русский
</div>
<div class="field-item even" property="content:encoded"><p>16.08.2012 № 02/12 г. Минск</p>
<p>Об отдельных вопросах стажировки</p>
<p>В целях единой практики разрешения вопросов, связанных со стажировкой адвокатов,совет Республиканской коллегии адвокатов</p>
<p>ПОСТАНОВЛЯЕТ:</p>
<ol><li>Прием претендентов в качестве стажера адвоката и направление их на стажировку в юридическую консультацию, адвокатское бюро или к адвокату, осуществляющему адвокатскую деятельность индивидуально производить по решению совета, исходя из утвержденной годовой сметы доходов и расходов соответствующей территориальной коллегии адвокатов.</li>
<li>Стажировка адвоката считается оконченной в день окончания срока срочного трудового договора.</li>
<li>Со стажером, в отношении которого Квалификационной комиссией по вопросам адвокатской деятельности в Республике Беларусь принято решение о несоответствии лицензионным требованиям и условиям, советом территориальной коллегии адвокатов, адвокатским бюро либо адвокатом, осуществляющим адвокатскую деятельность индивидуально, может быть заключен трудовой договор на новый срок стажировки. При этом следует иметь в виду, что в соответствии с пунктом 9 статьи 9 Закона Республики Беларусь «Об адвокатуре и адвокатской деятельности в Республике Беларусь» претендент, в отношении которого принято решение о несоответствии лицензионным требованиям и условиям, допускается к очередной сдаче квалификационного экзамена не ранее чем через шесть месяцев.</li>
</ol><p>Председатель В.И.Чайчиц</p>
<p>&nbsp;</p></div>
<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"aboutsub_menu", 
	array(
		"ROOT_MENU_TYPE" => "aboutsub",
		"MAX_LEVEL" => "1",
		"CHILD_MENU_TYPE" => "aboutsub",
		"USE_EXT" => "Y",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"COMPONENT_TEMPLATE" => "aboutsub_menu",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N"
	),
	false
);?> 
<h2 class="title comment-form" id="commento">Добавить комментарий</h2>
<hr>
<?$APPLICATION->IncludeComponent("bitrix:forum.topic.reviews", "comment_fiz", array(
	"AJAX_POST" => "Y",
		"CACHE_TIME" => "0",
		"CACHE_TYPE" => "A",
		"DATE_TIME_FORMAT" => "j F Y G:i",
		"EDITOR_CODE_DEFAULT" => "Y",
		"ELEMENT_ID" => "106769",
		"FILES_COUNT" => "",
		"FORUM_ID" => "8",
		"IBLOCK_ID" => "20",
		"IBLOCK_TYPE" => "company",
		"MESSAGES_PER_PAGE" => "10",
		"NAME_TEMPLATE" => "",
		"PAGE_NAVIGATION_TEMPLATE" => "",
		"PREORDER" => "Y",
		"RATING_TYPE" => "standart",
		"SHOW_AVATAR" => "Y",
		"SHOW_LINK_TO_FORUM" => "N",
		"SHOW_MINIMIZED" => "N",
		"SHOW_RATING" => "N",
		"URL_TEMPLATES_DETAIL" => "",
		"URL_TEMPLATES_PROFILE_VIEW" => "",
		"URL_TEMPLATES_READ" => "",
		"USE_CAPTCHA" => "Y",
		"COMPONENT_TEMPLATE" => "comment_fiz"
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "N"
	)
);?> 
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>