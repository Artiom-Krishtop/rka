<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule('iblock'))
	return;
if(!CModule::IncludeModule('art.corp'))
	return;
if(!CModule::IncludeModule('art.devfunc'))
	return;

$listProp = RSDevFuncParameters::GetTemplateParamsPropertiesList($arCurrentValues['IBLOCK_ID']);

$arNewsListTemplates = ARCORP_GetComponentTemplateList('bitrix:news.list');

$arValues = array(
    '12' => '1',
    '6' => '2',
    '4' => '3',
    '3' => '4',
    '2' => '6',
);

$arTemplateParameters = array(
	'ARCORP_LIST_TEMPLATES_LIST' => array(
		'NAME' => GetMessage('AR.CORP.LIST_TEMPLATES'),
		'TYPE' => 'LIST',
		'VALUES' => $arNewsListTemplates,
		'DEFAULT' => '',
		'REFRESH' => 'Y',
		'PARENT' => 'LIST_SETTINGS',
	),
	'ARCORP_DETAIL_TEMPLATES' => array(
		'NAME' => GetMessage('AR.CORP.DETAIL_TEMPLATES'),
		'TYPE' => 'LIST',
		'VALUES' => ARCORP_GetComponentTemplateList('bitrix:news.detail'),
		'DEFAULT' => '',
		'REFRESH' => 'Y',
		'PARENT' => 'DETAIL_SETTINGS',
	),
	'ARCORP_LIST_TEMPLATES_DETAIL_USE' => array(
		'NAME' => GetMessage('AR.CORP.DETAIL_LIST_TEMPLATES_USE'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
		'DEFAULT' => 'N',
		'REFRESH' => 'Y',
		'PARENT' => 'DETAIL_SETTINGS',
	),
);

if( IsModuleInstalled('subscribe') ) {
	$arTemplateParameters['ARCORP_DETAIL_USE_SUBSCRIBE'] = array(
		'NAME' => GetMessage('AR.CORP.DETAIL_USE_SUBSCRIBE'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
		'DEFAULT' => 'Y',
		'REFRESH' => 'Y',
		'PARENT' => 'DETAIL_SETTINGS',
	);
	if( $arCurrentValues['ARCORP_DETAIL_USE_SUBSCRIBE']=='Y' ) {
		$arTemplateParameters['ARCORP_DETAIL_SUBSCRIBE_PAGE'] = array(
			'NAME' => GetMessage('AR.CORP.DETAIL_SUBSCRIBE_PAGE'),
			'TYPE' => 'STRING',
			'DEFAULT' => '',
			'PARENT' => 'DETAIL_SETTINGS',
		);
		$arTemplateParameters['ARCORP_DETAIL_SUBSCRIBE_NOTE'] = array(
			'NAME' => GetMessage('AR.CORP.DETAIL_SUBSCRIBE_NOTE'),
			'TYPE' => 'STRING',
			'DEFAULT' => '',
			'PARENT' => 'DETAIL_SETTINGS',
		);
	}
}

if( $arCurrentValues['ARCORP_LIST_TEMPLATES_DETAIL_USE']=='Y' ) {
	$arTemplateParameters['ARCORP_SHOW_BLOCK_NAME_DETAIL'] = array(
		'NAME' => GetMessage('AR.CORP.SHOW_BLOCK_NAME'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
		'DEFAULT' => 'Y',
		'PARENT' => 'DETAIL_SETTINGS',
	);
	$arTemplateParameters['ARCORP_BLOCK_NAME_IS_LINK_DETAIL'] = array(
		'NAME' => GetMessage('AR.CORP.BLOCK_NAME_IS_LINK'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
		'DEFAULT' => 'N',
		'PARENT' => 'DETAIL_SETTINGS',
	);
	$arTemplateParameters['ARCORP_LIST_TEMPLATES_DETAIL'] = array(
		'NAME' => GetMessage('AR.CORP.DETAIL_LIST_TEMPLATES'),
		'TYPE' => 'LIST',
		'VALUES' => $arNewsListTemplates,
		'DEFAULT' => '',
		'REFRESH' => 'Y',
		'PARENT' => 'DETAIL_SETTINGS',
	);
}

$arTemplateParameters['ARCORP_SHOW_BLOCK_NAME_LIST'] = array(
	'NAME' => GetMessage('AR.CORP.SHOW_BLOCK_NAME'),
	'TYPE' => 'CHECKBOX',
	'VALUE' => 'Y',
	'DEFAULT' => 'Y',
	'PARENT' => 'LIST_SETTINGS',
);
$arTemplateParameters['ARCORP_BLOCK_NAME_IS_LINK_LIST'] = array(
	'NAME' => GetMessage('AR.CORP.BLOCK_NAME_IS_LINK'),
	'TYPE' => 'CHECKBOX',
	'VALUE' => 'Y',
	'DEFAULT' => 'N',
	'PARENT' => 'LIST_SETTINGS',
);

if( $arCurrentValues['ARCORP_LIST_TEMPLATES_DETAIL_USE']=='Y' && $arCurrentValues['ARCORP_LIST_TEMPLATES_DETAIL']!='news' ) {
	$arTemplateParameters['ARCORP_USE_OWL_DETAIL'] = array(
		'NAME' => GetMessage('AR.CORP.USE_OWL'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
		'DEFAULT' => '',
		'REFRESH' => 'Y',
		'PARENT' => 'DETAIL_SETTINGS',
	);
	if( $arCurrentValues['ARCORP_USE_OWL_DETAIL']=='Y' ) {
		$arTemplateParameters['ARCORP_OWL_CHANGE_SPEED_DETAIL'] = array(
			'NAME' => GetMessage('AR.CORP.OWL_CHANGE_SPEED'),
			'TYPE' => 'STRING',
			'DEFAULT' => '2000',
			'PARENT' => 'DETAIL_SETTINGS',
		);
		$arTemplateParameters['ARCORP_OWL_CHANGE_DELAY_DETAIL'] = array(
			'NAME' => GetMessage('AR.CORP.OWL_CHANGE_DELAY'),
			'TYPE' => 'STRING',
			'DEFAULT' => '8000',
			'PARENT' => 'DETAIL_SETTINGS',
		);
		$arTemplateParameters['ARCORP_OWL_PHONE_DETAIL'] = array(
			'NAME' => GetMessage('AR.CORP.OWL_PHONE'),
			'TYPE' => 'STRING',
			'DEFAULT' => '1',
			'PARENT' => 'DETAIL_SETTINGS',
		);
		$arTemplateParameters['ARCORP_OWL_TABLET_DETAIL'] = array(
			'NAME' => GetMessage('AR.CORP.OWL_TABLET'),
			'TYPE' => 'STRING',
			'DEFAULT' => '2',
			'PARENT' => 'DETAIL_SETTINGS',
		);
		$arTemplateParameters['ARCORP_OWL_PC_DETAIL'] = array(
			'NAME' => GetMessage('AR.CORP.OWL_PC'),
			'TYPE' => 'STRING',
			'DEFAULT' => '3',
			'PARENT' => 'DETAIL_SETTINGS',
		);
	} else {
        $arTemplateParameters['ARCORP_COLS_IN_ROW_DETAIL'] = array(
            'NAME' => GetMessage('AR.CORP.COLS_IN_ROW'),
            'TYPE' => 'LIST',
            'VALUES' => $arValues,
            'DEFAULT' => '3',
            'PARENT' => 'DETAIL_SETTINGS',
        );
	}
}

if( $arCurrentValues['ARCORP_LIST_TEMPLATES_LIST']!='news' ) {
	$arTemplateParameters['ARCORP_USE_OWL_LIST'] = array(
		'NAME' => GetMessage('AR.CORP.USE_OWL'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
		'DEFAULT' => '',
		'REFRESH' => 'Y',
		'PARENT' => 'LIST_SETTINGS',
	);
	if( $arCurrentValues['ARCORP_USE_OWL_LIST']=='Y' ) {
		$arTemplateParameters['ARCORP_OWL_CHANGE_SPEED_LIST'] = array(
			'NAME' => GetMessage('AR.CORP.OWL_CHANGE_SPEED'),
			'TYPE' => 'STRING',
			'DEFAULT' => '2000',
			'PARENT' => 'LIST_SETTINGS',
		);
		$arTemplateParameters['ARCORP_OWL_CHANGE_DELAY_LIST'] = array(
			'NAME' => GetMessage('AR.CORP.OWL_CHANGE_DELAY'),
			'TYPE' => 'STRING',
			'DEFAULT' => '8000',
			'PARENT' => 'LIST_SETTINGS',
		);
		$arTemplateParameters['ARCORP_OWL_PHONE_LIST'] = array(
			'NAME' => GetMessage('AR.CORP.OWL_PHONE'),
			'TYPE' => 'STRING',
			'DEFAULT' => '1',
			'PARENT' => 'LIST_SETTINGS',
		);
		$arTemplateParameters['ARCORP_OWL_TABLET_LIST'] = array(
			'NAME' => GetMessage('AR.CORP.OWL_TABLET'),
			'TYPE' => 'STRING',
			'DEFAULT' => '2',
			'PARENT' => 'LIST_SETTINGS',
		);
		$arTemplateParameters['ARCORP_OWL_PC_LIST'] = array(
			'NAME' => GetMessage('AR.CORP.OWL_PC'),
			'TYPE' => 'STRING',
			'DEFAULT' => '3',
			'PARENT' => 'LIST_SETTINGS',
		);
	} else {
        $arTemplateParameters['ARCORP_COLS_IN_ROW_LIST'] = array(
            'NAME' => GetMessage('AR.CORP.COLS_IN_ROW'),
            'TYPE' => 'LIST',
            'VALUES' => $arValues,
            'DEFAULT' => '3',
            'PARENT' => 'LIST_SETTINGS',
        );
	}
}

if( $arCurrentValues['ARCORP_LIST_TEMPLATES_DETAIL_USE']=='Y' && $arCurrentValues['ARCORP_LIST_TEMPLATES_DETAIL']=='about_us' ) {
	$arTemplateParameters['ARCORP_PROP_PUBLISHER_NAME_DETAIL'] = array(
		'NAME' => GetMessage('AR.CORP.PROP_PUBLISHER_NAME'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['SNL'],
		'PARENT' => 'DETAIL_SETTINGS',
	);
	$arTemplateParameters['ARCORP_PROP_PUBLISHER_BLANK_DETAIL'] = array(
		'NAME' => GetMessage('AR.CORP.PROP_PUBLISHER_BLANK'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
		'PARENT' => 'DETAIL_SETTINGS',
	);
	$arTemplateParameters['ARCORP_PROP_PUBLISHER_DESCR_DETAIL'] = array(
		'NAME' => GetMessage('AR.CORP.PROP_PUBLISHER_DESCR'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['SNL'],
		'PARENT' => 'DETAIL_SETTINGS',
	);
}

if( $arCurrentValues['ARCORP_LIST_TEMPLATES_LIST']=='about_us' ) {
	$arTemplateParameters['ARCORP_PROP_PUBLISHER_NAME_LIST'] = array(
		'NAME' => GetMessage('AR.CORP.PROP_PUBLISHER_NAME'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['SNL'],
		'PARENT' => 'LIST_SETTINGS',
	);
	$arTemplateParameters['ARCORP_PROP_PUBLISHER_BLANK_LIST'] = array(
		'NAME' => GetMessage('AR.CORP.PROP_PUBLISHER_BLANK'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
		'PARENT' => 'LIST_SETTINGS',
	);
	$arTemplateParameters['ARCORP_PROP_PUBLISHER_DESCR_LIST'] = array(
		'NAME' => GetMessage('AR.CORP.PROP_PUBLISHER_DESCR'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['SNL'],
		'PARENT' => 'LIST_SETTINGS',
	);
}

if( $arCurrentValues['ARCORP_LIST_TEMPLATES_DETAIL_USE']=='Y' && $arCurrentValues['ARCORP_LIST_TEMPLATES_DETAIL']=='action' ) {
	$arTemplateParameters['ARCORP_PROP_MARKER_TEXT_DETAIL'] = array(
		'NAME' => GetMessage('AR.CORP.PROP_MARKER_TEXT'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['SNL'],
		'PARENT' => 'DETAIL_SETTINGS',
	);
	$arTemplateParameters['ARCORP_PROP_MARKER_COLOR_DETAIL'] = array(
		'NAME' => GetMessage('AR.CORP.PROP_MARKER_COLOR'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['SNL'],
		'PARENT' => 'DETAIL_SETTINGS',
	);
	$arTemplateParameters['ARCORP_PROP_ACTION_DATE_DETAIL'] = array(
		'NAME' => GetMessage('AR.CORP.PROP_ACTION_DATE'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['SNL'],
		'PARENT' => 'DETAIL_SETTINGS',
	);
}

if( $arCurrentValues['ARCORP_LIST_TEMPLATES_LIST']=='action' ) {
	$arTemplateParameters['ARCORP_PROP_MARKER_TEXT_LIST'] = array(
		'NAME' => GetMessage('AR.CORP.PROP_MARKER_TEXT'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['SNL'],
		'PARENT' => 'LIST_SETTINGS',
	);
	$arTemplateParameters['ARCORP_PROP_MARKER_COLOR_LIST'] = array(
		'NAME' => GetMessage('AR.CORP.PROP_MARKER_COLOR'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['SNL'],
		'PARENT' => 'LIST_SETTINGS',
	);
	$arTemplateParameters['ARCORP_PROP_ACTION_DATE_LIST'] = array(
		'NAME' => GetMessage('AR.CORP.PROP_ACTION_DATE'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['SNL'],
		'PARENT' => 'LIST_SETTINGS',
	);
}

if( $arCurrentValues['ARCORP_LIST_TEMPLATES_DETAIL_USE']=='Y' && $arCurrentValues['ARCORP_LIST_TEMPLATES_DETAIL']=='docs' ) {
	$arTemplateParameters['ARCORP_PROP_FILE_DETAIL'] = array(
		'NAME' => GetMessage('AR.CORP.PROP_FILE'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['F'],
		'PARENT' => 'DETAIL_SETTINGS',
	);
}

if( $arCurrentValues['ARCORP_LIST_TEMPLATES_LIST']=='docs' ) {
	$arTemplateParameters['ARCORP_PROP_FILE_LIST'] = array(
		'NAME' => GetMessage('AR.CORP.PROP_FILE'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['F'],
		'PARENT' => 'LIST_SETTINGS',
	);
}

if( $arCurrentValues['ARCORP_LIST_TEMPLATES_DETAIL_USE']=='Y' ) {
	if( $arCurrentValues['ARCORP_LIST_TEMPLATES_DETAIL']=='features1' || $arCurrentValues['ARCORP_LIST_TEMPLATES_DETAIL']=='features2' ) {
		$arTemplateParameters['ARCORP_LINK_DETAIL'] = array(
			'NAME' => GetMessage('AR.CORP.LINK'),
			'TYPE' => 'LIST',
			'VALUES' => $listProp['SNL'],
			'PARENT' => 'DETAIL_SETTINGS',
		);
		$arTemplateParameters['ARCORP_BLANK_DETAIL'] = array(
			'NAME' => GetMessage('AR.CORP.BLANK'),
			'TYPE' => 'LIST',
			'VALUES' => $listProp['SNL'],
			'PARENT' => 'DETAIL_SETTINGS',
		);
	}
}

if( $arCurrentValues['ARCORP_LIST_TEMPLATES_LIST']=='features1' || $arCurrentValues['ARCORP_LIST_TEMPLATES_LIST']=='features2' ) {
	$arTemplateParameters['ARCORP_LINK_LIST'] = array(
		'NAME' => GetMessage('AR.CORP.LINK'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['SNL'],
		'PARENT' => 'LIST_SETTINGS',
	);
	$arTemplateParameters['ARCORP_BLANK_LIST'] = array(
		'NAME' => GetMessage('AR.CORP.BLANK'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['SNL'],
		'PARENT' => 'LIST_SETTINGS',
	);
}

if( $arCurrentValues['ARCORP_LIST_TEMPLATES_DETAIL_USE']=='Y' && ($arCurrentValues['ARCORP_LIST_TEMPLATES_DETAIL']=='newslistcol' || $arCurrentValues['ARCORP_LIST_TEMPLATES_DETAIL']=='honors') ) {
	$arTemplateParameters['ARCORP_SHOW_DATE_DETAIL'] = array(
		'NAME' => GetMessage('AR.CORP.SHOW_DATE'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
		'PARENT' => 'DETAIL_SETTINGS',
	);
}

if( $arCurrentValues['ARCORP_LIST_TEMPLATES_LIST']=='newslistcol' || $arCurrentValues['ARCORP_LIST_TEMPLATES_LIST']=='honors' ) {
	$arTemplateParameters['ARCORP_SHOW_DATE_LIST'] = array(
		'NAME' => GetMessage('AR.CORP.SHOW_DATE'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
		'PARENT' => 'LIST_SETTINGS',
	);
}

if( $arCurrentValues['ARCORP_LIST_TEMPLATES_DETAIL_USE']=='Y' && $arCurrentValues['ARCORP_LIST_TEMPLATES_DETAIL']=='reviews' ) {
	$arTemplateParameters['ARCORP_AUTHOR_NAME_DETAIL'] = array(
		'NAME' => GetMessage('AR.CORP.AUTHOR_NAME'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['SNL'],
		'PARENT' => 'DETAIL_SETTINGS',
	);
	$arTemplateParameters['ARCORP_AUTHOR_JOB_DETAIL'] = array(
		'NAME' => GetMessage('AR.CORP.AUTHOR_JOB'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['SNL'],
		'PARENT' => 'DETAIL_SETTINGS',
	);
}

if( $arCurrentValues['ARCORP_LIST_TEMPLATES_LIST']=='reviews' ) {
	$arTemplateParameters['ARCORP_AUTHOR_NAME_LIST'] = array(
		'NAME' => GetMessage('AR.CORP.AUTHOR_NAME'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['SNL'],
		'PARENT' => 'LIST_SETTINGS',
	);
	$arTemplateParameters['ARCORP_AUTHOR_JOB_LIST'] = array(
		'NAME' => GetMessage('AR.CORP.AUTHOR_JOB'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['SNL'],
		'PARENT' => 'LIST_SETTINGS',
	);
}

if( $arCurrentValues['ARCORP_LIST_TEMPLATES_DETAIL_USE']=='Y' && $arCurrentValues['ARCORP_LIST_TEMPLATES_DETAIL']=='staff' ) {
	$arTemplateParameters['ARCORP_SHOW_BUTTON_DETAIL'] = array(
		'NAME' => GetMessage('AR.CORP.SHOW_BUTTON'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
		'DEFAULT' => 'N',
	);
	if( $arCurrentValues['ARCORP_SHOW_BUTTON']=='Y' ) {
		$arTemplateParameters['ARCORP_BUTTON_CAPTION_DETAIL'] = array(
			'NAME' => GetMessage('AR.CORP.BUTTON_CAPTION'),
			'TYPE' => 'STRING',
		);
	}
}

if( $arCurrentValues['ARCORP_LIST_TEMPLATES_LIST']=='staff' ) {
	$arTemplateParameters['ARCORP_SHOW_BUTTON_LIST'] = array(
		'NAME' => GetMessage('AR.CORP.SHOW_BUTTON'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
		'DEFAULT' => 'N',
	);
	if( $arCurrentValues['ARCORP_SHOW_BUTTON']=='Y' ) {
		$arTemplateParameters['ARCORP_BUTTON_CAPTION_LIST'] = array(
			'NAME' => GetMessage('AR.CORP.BUTTON_CAPTION'),
			'TYPE' => 'STRING',
		);
	}
}

if( $arCurrentValues['ARCORP_LIST_TEMPLATES_DETAIL_USE']=='Y' && $arCurrentValues['ARCORP_LIST_TEMPLATES_DETAIL']=='vacancies' ) {
	$arTemplateParameters['ARCORP_PROP_VACANCY_TYPE_DETAIL'] = array(
		'NAME' => GetMessage('AR.CORP.PROP_VACANCY_TYPE'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['L'],
		'DEFAULT' => '',
	);
	$arTemplateParameters['ARCORP_PROP_SIGNATURE_DETAIL'] = array(
		'NAME' => GetMessage('AR.CORP.PROP_SIGNATURE'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['SNL'],
		'DEFAULT' => '',
	);
}

if( $arCurrentValues['ARCORP_LIST_TEMPLATES_LIST']=='vacancies' ) {
	$arTemplateParameters['ARCORP_PROP_VACANCY_TYPE_LIST'] = array(
		'NAME' => GetMessage('AR.CORP.PROP_VACANCY_TYPE'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['L'],
		'DEFAULT' => '',
	);
	$arTemplateParameters['ARCORP_PROP_SIGNATURE_LIST'] = array(
		'NAME' => GetMessage('AR.CORP.PROP_SIGNATURE'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['SNL'],
		'DEFAULT' => '',
	);
}


/**
/**************************************************
/************* detail template params *************
/**************************************************
**/


if( $arCurrentValues['ARCORP_DETAIL_TEMPLATES']=='gallery' ) {
	$arTemplateParameters['ARCORP_PROP_MORE_PHOTO'] = array(
		'NAME' => GetMessage('AR.CORP.PROP_MORE_PHOTO'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['F'],
		'PARENT' => 'DETAIL_SETTINGS',
	);
}