<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>" class="js">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta property="og:title" content="<?$APPLICATION->ShowTitle()?>" />
    <?if (strpos($APPLICATION->GetCurPage(), 'news') !== false || strpos($APPLICATION->GetCurPage(), 'blogs') !== false || strpos($APPLICATION->GetCurPage(), 'faq_ask') !== false):?>
        <meta property="og:type" content="article" />
    <?else:?>
        <meta property="og:type" content="website" />
    <?endif;?>
    <meta property="og:url" content="<?=( ((CMain::IsHTTPS()) ? "https://rka.by" : "http://rka.by") . $APPLICATION->GetCurPage() );?>" />
    <meta property="og:image" content="https://rka.by<?=SITE_TEMPLATE_PATH;?>/images/og-logo.jpg" />
    <meta property="og:locale" content="be_BY" />
    <meta property="og:site_name" content="<?=$_SERVER['SERVER_NAME']?>" />
<title><?$APPLICATION->ShowTitle()?></title>
<?$APPLICATION->ShowHead()?>

<?
$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/styles/style.css');
//$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/styles/owl.carousel.css');
$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/styles/flexslider.css');
$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/styles/jquery.fancybox.css');
//$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/styles/header.css');
//$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/styles/sidebar.css');
//$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/styles/footer.css');
//$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/styles/content.css');
//$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/styles/color.css'); // color scheme
//$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/custom/style.css');
?>

<?
    //$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery-1.11.2.min.js');	
    //$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.flexslider.js');	
	//$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/script.js');
	
	
    //$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/owl.carousel.min.js');	
   //$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/bootstrap/bootstrap.js');
    //$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/fancybox/jquery.fancybox.pack.js');
    //$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/lightgal/js/jquery.chocolat.js'); 
	//$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/choko.js'); 


	
	//$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/modernizr.custom.53451.js');
	//$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.gallery.js');
	//$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.spincrement.min.js');

   // $APPLICATION->AddHeadScript('https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js');
      $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery-1.11.2.min.js');
      $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.flexslider.js');
      $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.fancybox.js');  
      $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.ui.widget.js');      
      $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.fiji.ticker.js');             
      $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/script.js');        
?>

<!--<script  src="<?=SITE_TEMPLATE_PATH.'/js/jquery-1.11.2.min.js'?>"></script>	
<script  src="<?=SITE_TEMPLATE_PATH.'/js/jquery.flexslider.js'?>"></script>	
<script  src="<?=SITE_TEMPLATE_PATH.'/js/jquery.fancybox.js'?>"></script>	
<script  src="<?=SITE_TEMPLATE_PATH.'/js/script.js'?>"></script>	-->
<?php 
//<script>jQuery.noConflict();</script>
//print "<pre>"; 
//print_r(SITE_TEMPLATE_PATH.'/js/script.js');
//print "</pre>";
?>
</head>

<body class="html front not-logged-in one-sidebar sidebar-first page-node i18n-ru fb_processed <?global $USER; if ($USER->IsAdmin()):?>admined-body<?endif;?> ">
<!--<p id="skip-link"><a href="#main-menu" class="element-invisible element-focusable">Jump to navigation</a></p>-->
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<div class="container">
    <aside>
        <?$APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("include_areas/header_logo.php"),
            Array(),
            Array("MODE"=>"html")
        );?>
        <?$APPLICATION->IncludeComponent("bitrix:search.form", "serch_advo", Array(
            "PAGE" => "#SITE_DIR#search/index.php",	// ???????????????? ???????????? ?????????????????????? ???????????? (???????????????? ???????????? #SITE_DIR#)
            "USE_SUGGEST" => "N",	// ???????????????????? ?????????????????? ?? ???????????????????? ??????????????
        ),
            false
        );?>
        <?$APPLICATION->IncludeComponent(
            "bitrix:menu",
            "left_menu",
            Array(
                "ALLOW_MULTI_SELECT" => "N",	// ?????????????????? ?????????????????? ???????????????? ?????????????? ????????????????????????
                "CHILD_MENU_TYPE" => "left",	// ?????? ???????? ?????? ?????????????????? ??????????????
                "DELAY" => "N",	// ?????????????????????? ???????????????????? ?????????????? ????????
                "MAX_LEVEL" => "1",	// ?????????????? ?????????????????????? ????????
                "MENU_CACHE_GET_VARS" => "",	// ???????????????? ???????????????????? ??????????????
                "MENU_CACHE_TIME" => "3600",	// ?????????? ?????????????????????? (??????.)
                "MENU_CACHE_TYPE" => "N",	// ?????? ??????????????????????
                "MENU_CACHE_USE_GROUPS" => "Y",	// ?????????????????? ?????????? ??????????????
                "MENU_THEME" => "site",
                "ROOT_MENU_TYPE" => "left",	// ?????? ???????? ?????? ?????????????? ????????????
                "USE_EXT" => "N",	// ???????????????????? ?????????? ?? ?????????????? ???????? .??????_????????.menu_ext.php
                "COMPONENT_TEMPLATE" => "vertical_multilevel"
            ),
            false
        );?>
        <section class="regions" style="margin-top:30px;">
            <h3 class="block-title">?????????????? ???? ????????????????</h3>
            <?$APPLICATION->IncludeComponent(
                "bitrix:menu",
                "colleg",
                Array(
                    "ALLOW_MULTI_SELECT" => "N",	// ?????????????????? ?????????????????? ???????????????? ?????????????? ????????????????????????
                    "CHILD_MENU_TYPE" => "left",	// ?????? ???????? ?????? ?????????????????? ??????????????
                    "DELAY" => "N",	// ?????????????????????? ???????????????????? ?????????????? ????????
                    "MAX_LEVEL" => "1",	// ?????????????? ?????????????????????? ????????
                    "MENU_CACHE_GET_VARS" => "",	// ???????????????? ???????????????????? ??????????????
                    "MENU_CACHE_TIME" => "3600",	// ?????????? ?????????????????????? (??????.)
                    "MENU_CACHE_TYPE" => "N",	// ?????? ??????????????????????
                    "MENU_CACHE_USE_GROUPS" => "Y",	// ?????????????????? ?????????? ??????????????
                    "MENU_THEME" => "site",
                    "ROOT_MENU_TYPE" => "colleg",	// ?????? ???????? ?????? ?????????????? ????????????
                    "USE_EXT" => "N",	// ???????????????????? ?????????? ?? ?????????????? ???????? .??????_????????.menu_ext.php
                    "COMPONENT_TEMPLATE" => ""
                ),
                false
            );?>
        </section><br>
        <?/*$APPLICATION->IncludeFile(
						$APPLICATION->GetTemplatePath("include_areas/journal_arhive.php"),
						Array(),
						Array("MODE"=>"html")
			);*/?>
        <?$APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("include_areas/poem.php"),
            Array(),
            Array("MODE"=>"html")
        );?>
        <div id="block-block-22" class="block block-block contextual-links-region odd" style="margin-bottom:10px;">
            <?$APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "video_on_main2",
                array(
                    "IBLOCK_TYPE" => "company",
                    "IBLOCK_ID" => "18",
                    "NEWS_COUNT" => "20",
                    "SORT_BY1" => "ACTIVE_FROM",
                    "SORT_ORDER1" => "DESC",
                    "SORT_BY2" => "SORT",
                    "SORT_ORDER2" => "ASC",
                    "FILTER_NAME" => "",
                    "FIELD_CODE" => array(
                        0 => "DETAIL_PICTURE",
                        1 => "",
                    ),
                    "PROPERTY_CODE" => array(
                        0 => "LINK_YOUTUBE",
                        1 => "LINK_FILE",
                        2 => "FILE",
                        3 => "",
                    ),
                    "CHECK_DATES" => "Y",
                    "DETAIL_URL" => "",
                    "AJAX_MODE" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "AJAX_OPTION_HISTORY" => "N",
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "36000000",
                    "CACHE_FILTER" => "Y",
                    "CACHE_GROUPS" => "N",
                    "PREVIEW_TRUNCATE_LEN" => "140",
                    "ACTIVE_DATE_FORMAT" => "d.m.Y",
                    "SET_TITLE" => "N",
                    "SET_STATUS_404" => "N",
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                    "ADD_SECTIONS_CHAIN" => "N",
                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                    "PARENT_SECTION" => "",
                    "PARENT_SECTION_CODE" => "",
                    "INCLUDE_SUBSECTIONS" => "Y",
                    "PAGER_TEMPLATE" => "",
                    "DISPLAY_TOP_PAGER" => "N",
                    "DISPLAY_BOTTOM_PAGER" => "N",
                    "PAGER_TITLE" => "",
                    "PAGER_SHOW_ALWAYS" => "N",
                    "PAGER_DESC_NUMBERING" => "N",
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                    "PAGER_SHOW_ALL" => "N",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "COMPONENT_TEMPLATE" => "video_on_main2",
                    "SET_BROWSER_TITLE" => "N",
                    "SET_META_KEYWORDS" => "N",
                    "SET_META_DESCRIPTION" => "N",
                    "TITLE_BLOCK" => "??????????????????",
                    "SET_LAST_MODIFIED" => "N",
                    "STRICT_SECTION_CHECK" => "N",
                    "ALL_URL" => "",
                    "PAGER_BASE_LINK_ENABLE" => "N",
                    "SHOW_404" => "N",
                    "MESSAGE_404" => "",
                    "COMPOSITE_FRAME_MODE" => "A",
                    "COMPOSITE_FRAME_TYPE" => "AUTO",
                    "DISPLAY_DATE" => "Y",
                    "DISPLAY_NAME" => "Y",
                    "DISPLAY_PICTURE" => "Y",
                    "DISPLAY_PREVIEW_TEXT" => "Y"
                ),
                false
            );?>
        </div>
        <?$APPLICATION->IncludeComponent(
            "diera:events.calendar",
            "calle",
            array(
                "IBLOCK_TYPE" => "news",
                "LAST_YEAR" => "Y",
                "IBLOCK_ID" => "3",
                "DATE_START" => "DATE_ACTIVE_FROM",
                "DATE_END" => "",
                "DETAIL_URL" => "",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "360000",
                "CACHE_NOTES" => "",
                "COMPONENT_TEMPLATE" => ".default",
                "COMPOSITE_FRAME_MODE" => "N",
                "COMPOSITE_FRAME_TYPE" => "AUTO"
            ),
            false,
            array(
                "ACTIVE_COMPONENT" => "N"
            )
        );?>
        <?$APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("include_areas/brk_vk.php"),
            Array(),
            Array("MODE"=>"html")
        );?>
        <?$APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("include_areas/brk_facebook.php"),
            Array(),
            Array("MODE"=>"html")
        );?>
    </aside>
    <section class="main">
        <div id="header" class="region region-navigation">
            <div id="header_menu">
                <?/*$APPLICATION->IncludeFile(
                    $APPLICATION->GetTemplatePath("include_areas/header_icons.php"),
                    Array(),
                    Array("MODE"=>"php")
                );*/?>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "horizontal_multilevel",
                    array(
                        "ROOT_MENU_TYPE" => "top",
                        "MAX_LEVEL" => "3",
                        "CHILD_MENU_TYPE" => "left",
                        "USE_EXT" => "Y",
                        "MENU_CACHE_TYPE" => "A",
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "MENU_CACHE_GET_VARS" => array(
                        ),
                        "COMPONENT_TEMPLATE" => "horizontal_multilevel",
                        "DELAY" => "N",
                        "ALLOW_MULTI_SELECT" => "N"
                    ),
                    false
                );?>
            </div>
            <?/*$APPLICATION->IncludeComponent(
                "bitrix:system.auth.form",
                "auth_advo",
                array(
                    "FORGOT_PASSWORD_URL" => "",
                    "REGISTER_URL" => "/auth/",
                    "PROFILE_URL" => "/personal/profile/",
                    "SHOW_ERRORS" => "N",
                    "COMPONENT_TEMPLATE" => "auth_advo"
                ),
                false
            );*/?>
            <div class="text_main">
                <?$APPLICATION->IncludeFile(
                    $APPLICATION->GetTemplatePath("include_areas/header_menu.php"),
                    Array(),
                    Array("MODE"=>"html")
                );?>

            </div>
            <?/*if (($APPLICATION->GetCurPage() == "/be/about/")){?>
            <section class="about">
                <div class="region region-intro">
                <div id="block-block-8" class="block block-block contextual-links-region first last odd">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        ".default",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => "/include/about_text.php",
                            "EDIT_TEMPLATE" => ""
                        )
                    );
                            ?>
                    </div><!-- /.block -->
               </div><!-- /.region -->
            </section>
            <?}*/?>
            <?if (($APPLICATION->GetCurPage() != "/be/")){?>
            <section class="page-content">
                <div id="navigation" class="breadcrumb"><?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "main", Array(
                        "START_FROM" => "0",	// ?????????? ????????????, ?????????????? ?? ???????????????? ?????????? ?????????????????? ?????????????????????????? ??????????????
                        "PATH" => "",	// ????????, ?????? ???????????????? ?????????? ?????????????????? ?????????????????????????? ?????????????? (???? ??????????????????, ?????????????? ????????)
                        "SITE_ID" => "s1",	// C?????? (?????????????????????????????? ?? ???????????? ?????????????????????????? ????????????, ?????????? DOCUMENT_ROOT ?? ???????????? ????????????)
                        "COMPONENT_TEMPLATE" => ".default"
                    ),
                        false
                    );?> </div>
                <h1 id="page-title" class="title"><?$APPLICATION->ShowTitle(false)?></h1>
                <?}?>
                <!--<section class="page-content">
                      <a id="main-content"></a>
                        <h1 class="title" id="page-title"></h1>
                        <ul class="action-links"></ul>
                </section>-->
                <?/*<!--<table id="content">
                  <tbody>
                    <tr><td class="left-column">
                        <div class="content-block">
                            <div class="content-block-head">???????????????? ???? ????????????????</div>
                                <div class="content-block-body"><?$APPLICATION->IncludeComponent(
                                    "bitrix:subscribe.form",
                                    ".default",
                                    Array(
                                        "PAGE" => "#SITE_DIR#personal/subscribe/subscr_edit.php",
                                        "SHOW_HIDDEN" => "N",
                                        "USE_PERSONALIZATION"	=>	"N",
                                        "CACHE_TYPE" => "A",
                                        "CACHE_TIME" => "3600"
                                    )
                                    );?>
                                </div>
                            </div>
                        </div>
                      </td><td class="main-column">
                         <div id="navigation"><?$APPLICATION->IncludeComponent(
                            "bitrix:breadcrumb",
                            ".default",
                            Array(
                                "START_FROM" => "0",
                                "PATH" => "",
                                "SITE_ID" => ""
                            )
                        );?> </div>
                        <h1 id="pagetitle"><?$APPLICATION->ShowTitle(false)?></h1>-->*/?>