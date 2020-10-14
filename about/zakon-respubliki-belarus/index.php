<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Закон об адвокатуре и адвокатской деятельности");
$APPLICATION->SetPageProperty("keywords", "Адвокатура, адвокатская деятельность, юридическая помощь");
$APPLICATION->SetPageProperty("description", "Законодательство об адвокатуре и адвокатской деятельности в Республике Беларусь.");
$APPLICATION->SetTitle("Закон Республики Беларусь");
?>
<div class="field-item even" property="content:encoded"><p>30 декабря 2011 г. N 334-З</p>
<p class="ConsPlusTitle" align="center"><strong>ОБ АДВОКАТУРЕ И АДВОКАТСКОЙ ДЕЯТЕЛЬНОСТИ В РЕСПУБЛИКЕ БЕЛАРУСЬ</strong></p>
<p class="ConsPlusNormal">&nbsp;</p>
<p class="ConsPlusNormal" align="right">Принят Палатой представителей 19 декабря 2011 года</p>
<p class="ConsPlusNormal" align="right">Одобрен Советом Республики 20 декабря 2011 года</p>
<p class="ConsPlusNormal" align="center">(в ред. Законов Республики Беларусь от 29.12.2012 N 7-З,</p>
<p class="ConsPlusNormal" align="center">от 11.07.2017 N 42-З)</p>
</div>
<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"about_menu", 
	array(
		"ROOT_MENU_TYPE" => "about",
		"MAX_LEVEL" => "1",
		"CHILD_MENU_TYPE" => "about",
		"USE_EXT" => "Y",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"COMPONENT_TEMPLATE" => "about_menu",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N"
	),
	false
);?> 
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
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>