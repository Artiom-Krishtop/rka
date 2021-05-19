<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>" class="js">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
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
<!--<p id="skip-link">
      <a href="#main-menu" class="element-invisible element-focusable">Jump to navigation</a>
</p>-->
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<div class="container">
		<aside>
			<?$APPLICATION->IncludeFile(
						$APPLICATION->GetTemplatePath("include_areas/header_logo.php"),
						Array(),
						Array("MODE"=>"html")
					);?>
<section class="regions">
    <h3 class="block-title">Attorneys' Regional Bars</h3>
			<?$APPLICATION->IncludeComponent("bitrix:menu", "colleg", Array(
				"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
					"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
					"DELAY" => "N",	// Откладывать выполнение шаблона меню
					"MAX_LEVEL" => "1",	// Уровень вложенности меню
					"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
					"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
					"MENU_CACHE_TYPE" => "N",	// Тип кеширования
					"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
					"MENU_THEME" => "site",
					"ROOT_MENU_TYPE" => "colleg",	// Тип меню для первого уровня
					"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
					"COMPONENT_TEMPLATE" => ""
				),
				false
			);?>			
</section>
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
<div class="text_main">
<?$APPLICATION->IncludeFile(
			$APPLICATION->GetTemplatePath("include_areas/header_menu.php"),
			Array(),
			Array("MODE"=>"html")
		);?>

</div>

<?if (($APPLICATION->GetCurPage() != "/de/")){?>
			<section class="page-content">
 <div id="navigation" class="breadcrumb"><?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "main", Array(
	"START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
		"PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
		"SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
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
      