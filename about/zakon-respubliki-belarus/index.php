<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Закон об адвокатуре и адвокатской деятельности");
$APPLICATION->SetPageProperty("keywords", "Адвокатура, адвокатская деятельность, юридическая помощь");
$APPLICATION->SetPageProperty("description", "Законодательство об адвокатуре и адвокатской деятельности в Республике Беларусь.");
$APPLICATION->SetTitle("Закон Республики Беларусь");
?><div class="field-item even" property="content:encoded">
	<p>
		 30 декабря 2011 г. N 334-З (в редакции от 06.01.2021)
	</p>
	<p class="ConsPlusTitle" align="center">
		<strong>ОБ АДВОКАТУРЕ И АДВОКАТСКОЙ ДЕЯТЕЛЬНОСТИ В РЕСПУБЛИКЕ БЕЛАРУСЬ</strong>
	</p>
	<p class="ConsPlusNormal">
		&nbsp; &nbsp;&nbsp;<br>
	</p>
</div>
<?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"about_menu",
	Array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "about",
		"COMPONENT_TEMPLATE" => "about_menu",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "about",
		"USE_EXT" => "Y"
	)
);?> 
<?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"aboutsub_menu",
	Array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "aboutsub",
		"COMPONENT_TEMPLATE" => "aboutsub_menu",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "aboutsub",
		"USE_EXT" => "Y"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>