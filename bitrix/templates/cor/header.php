<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>" class="js">
<head>
    <?global $APPLICATION;?>
    <?IncludeTemplateLangFile(__FILE__);?>

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
        ym(73540363, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/73540363" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-BT94Z50V3D"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-BT94Z50V3D');
    </script>

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta property="og:title" content="<?$APPLICATION->ShowTitle()?>" />
    <?if (strpos($APPLICATION->GetCurPage(), 'news') !== false || strpos($APPLICATION->GetCurPage(), 'blogs') !== false || strpos($APPLICATION->GetCurPage(), 'faq_ask') !== false):?>
        <meta property="og:type" content="article" />
    <?else:?>
        <meta property="og:type" content="website" />
    <?endif;?>
    <meta property="og:url" content="<?=( ((CMain::IsHTTPS()) ? "https://rka.by" : "http://rka.by") . $APPLICATION->GetCurPage() );?>" />
    <meta property="og:image" content="https://rka.by<?=SITE_TEMPLATE_PATH;?>/images/og-logo.jpg" />
    <meta property="og:locale" content="ru_RU" />
    <meta property="og:site_name" content="<?=$_SERVER['SERVER_NAME']?>" />
    <title><?$APPLICATION->ShowTitle()?></title>
    <?
    $APPLICATION->ShowMeta("viewport");
    $APPLICATION->ShowMeta("HandheldFriendly");
    $APPLICATION->ShowMeta("apple-mobile-web-app-capable", "yes");
    $APPLICATION->ShowMeta("apple-mobile-web-app-status-bar-style");
    $APPLICATION->ShowMeta("SKYPE_TOOLBAR");

    $APPLICATION->ShowHead();

    $APPLICATION->SetPageProperty("viewport", "initial-scale=1.0, width=device-width");
    $APPLICATION->SetPageProperty("HandheldFriendly", "true");
    $APPLICATION->SetPageProperty("apple-mobile-web-app-capable", "yes");
    $APPLICATION->SetPageProperty("apple-mobile-web-app-status-bar-style", "black");
    $APPLICATION->SetPageProperty("SKYPE_TOOLBAR", "SKYPE_TOOLBAR_PARSER_COMPATIBLE");

    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/styles/style.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/styles/flexslider.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/styles/jquery.fancybox.css');

    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/js.cookie.min.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jspdf.debug.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery-1.12.4.min.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.flexslider.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.fancybox.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/shCore.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.ui.widget.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.fiji.ticker.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.validate.min.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/localization/messages_ru.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.inputmask.min.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/script.js');
    // $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/api.js');

    $APPLICATION->AddHeadString('<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />', true);
    ?>
    <script src="https://www.google.com/recaptcha/api.js"></script>
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
        <?$APPLICATION->IncludeComponent(
            "bitrix:search.form",
            "serch_advo",
            array(
                "PAGE" => "#SITE_DIR#search/index.php",
                "USE_SUGGEST" => "Y",
                "COMPONENT_TEMPLATE" => "serch_advo",
                "COMPOSITE_FRAME_MODE" => "A",
                "COMPOSITE_FRAME_TYPE" => "AUTO"
            ),
            false
        );?>
        <?$APPLICATION->IncludeComponent(
            "bitrix:menu",
            "left_menu",
            array(
                "ALLOW_MULTI_SELECT" => "N",
                "CHILD_MENU_TYPE" => "left",
                "DELAY" => "N",
                "MAX_LEVEL" => "1",
                "MENU_CACHE_GET_VARS" => array(
                ),
                "MENU_CACHE_TIME" => "3600",
                "MENU_CACHE_TYPE" => "A",
                "MENU_CACHE_USE_GROUPS" => "Y",
                "MENU_THEME" => "site",
                "ROOT_MENU_TYPE" => "left",
                "USE_EXT" => "N",
                "COMPONENT_TEMPLATE" => "left_menu",
                "COMPOSITE_FRAME_MODE" => "A",
                "COMPOSITE_FRAME_TYPE" => "AUTO"
            ),
            false
        );?>
        <section class="regions" style="margin-top:30px;">
            <h3 class="block-title">Коллегии по регионам</h3>
            <?$APPLICATION->IncludeComponent(
                "bitrix:menu",
                "colleg",
                array(
                    "ALLOW_MULTI_SELECT" => "N",
                    "CHILD_MENU_TYPE" => "left",
                    "DELAY" => "N",
                    "MAX_LEVEL" => "1",
                    "MENU_CACHE_GET_VARS" => array(
                    ),
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_TYPE" => "A",
                    "MENU_CACHE_USE_GROUPS" => "Y",
                    "MENU_THEME" => "site",
                    "ROOT_MENU_TYPE" => "colleg",
                    "USE_EXT" => "N",
                    "COMPONENT_TEMPLATE" => "colleg",
                    "COMPOSITE_FRAME_MODE" => "A",
                    "COMPOSITE_FRAME_TYPE" => "AUTO"
                ),
                false
            );?>
        </section>
        <?$APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("include_areas/brk_facebook.php"),
            Array(),
            Array("MODE"=>"html")
        );?>
        <?$APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("include_areas/brk_vk.php"),
            Array(),
            Array("MODE"=>"html")
        );?>
        <?$APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath("include_areas/poem.php"),
            Array(),
            Array("MODE"=>"html")
        );?><br><br>
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
                    "TITLE_BLOCK" => "Документы",
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
        <?$APPLICATION->IncludeComponent("diera:events.calendar", "calle", array(
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
            $APPLICATION->GetTemplatePath("include_areas/journal_arhive.php"),
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
            <?$APPLICATION->IncludeComponent(
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
            );?>
            <?$APPLICATION->IncludeFile(
                $APPLICATION->GetTemplatePath("include_areas/header_menu.php"),
                Array(),
                Array("MODE"=>"html")
            );?>
        </div>
        <?if (($APPLICATION->GetCurPage() == "/about/")){?>
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
        <?}?>
        <?if (($APPLICATION->GetCurPage() != "/")){?>
			<section class="page-content">
                <div id="navigation" class="breadcrumb">
                    <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "main", Array(
                        "START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
                        "PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
                        "SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
                        "COMPONENT_TEMPLATE" => ".default"
                    ),
                        false
                    );?>
                </div>
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
	<div class="content-block-head">Подписка на рассылку</div>
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