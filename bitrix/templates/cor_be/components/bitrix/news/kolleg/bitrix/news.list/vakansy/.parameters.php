<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule('iblock'))
	return;
if(!CModule::IncludeModule('art.corp'))
	return;
if(!CModule::IncludeModule('art.devfunc'))
	return;

$listProp = RSDevFuncParameters::GetTemplateParamsPropertiesList($arCurrentValues['IBLOCK_ID']);

$arTemplateParameters = array(
	'ARCORP_PROP_VACANCY_TYPE' => array(
		'NAME' => GetMessage('AR.CORP.PROP_VACANCY_TYPE'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['L'],
		'DEFAULT' => '',
	),
	'ARCORP_PROP_SIGNATURE' => array(
		'NAME' => GetMessage('AR.CORP.PROP_SIGNATURE'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['SNL'],
		'DEFAULT' => '',
	),
);

ARCORP_AddComponentParameters($arTemplateParameters,array('blockName'));