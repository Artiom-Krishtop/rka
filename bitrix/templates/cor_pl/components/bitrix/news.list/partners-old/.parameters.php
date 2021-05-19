<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule('iblock'))
	return;
if(!CModule::IncludeModule('art.corp'))
	return;
if(!CModule::IncludeModule('art.devfunc'))
	return;

$arTemplateParameters = array();

ARCORP_AddComponentParameters($arTemplateParameters,array('blockName','owlSupport'));
if( $arCurrentValues['ARCORP_USE_OWL']=='Y' ) {
	ARCORP_AddComponentParameters($arTemplateParameters,array('owlSettings'));
} else {
	ARCORP_AddComponentParameters($arTemplateParameters,array('bootstrapCols'));
}