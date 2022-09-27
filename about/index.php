<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Об адвокатуре");
?><div class="field-item even" property="content:encoded">
	<p>
 <span>&nbsp;<?$APPLICATION->IncludeComponent(
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
);?> </span>
	</p>
	<p>
		 Адвокатура в Республике Беларусь представляет собой правовой институт, призванный осуществлять профессиональную правозащитную деятельность, оказывать квалифицированную юридическую помощь гражданам и юридическим лицам - всем, кто в этом нуждается. Адвокаты участвуют в разъяснении законодательства и правовом воспитании населения. Всей своей деятельностью адвокатура служит принципам законности, справедливости и гуманизма. Являясь институтом гражданского общества, адвокатура&nbsp;имеет и публично-правовой статус: осуществляемые ею профессиональная уголовная защита и гражданско-правовое представительство - составные части системы правосудия.
	</p>
	<p>
		 В соответствии со статьей 62 Конституции Республики Беларусь <i><span style="font-size: 13pt; ">"каждый имеет право на юридическую помощь для осуществления и защиты прав и свобод, в том числе право пользоваться в любой момент помощью адвокатов и других своих представителей в суде, иных государственных органах, органах местного управления, на предприятиях, в учреждениях, организациях, общественных объединениях и в отношениях с должностными лицами и гражданам. В случаях, предусмотренных законом, юридическая помощь оказывается за счет государственных средств. Противодействие оказанию правовой помощи в Республике Беларусь запрещается".</span></i>
	</p>
	<p>
 <span style="font-size: 13pt; ">Органами адвокатского самоуправления в Республике Беларусь являются:&nbsp;</span> <br>
 <span style="font-size: 13pt; ">съезд адвокатов,&nbsp;</span> <br>
 <span style="font-size: 13pt; ">Белорусская республиканская коллегия адвокатов,</span> <br>
 <span style="font-size: 13pt; ">территориальные коллегии адвокатов.</span>
	</p>
	<p>
 <span style="font-size: 13pt; ">Высшим органом адвокатского самоуправления является съезд адвокатов. </span>
	</p>
	<p>
 <span style="font-size: 13pt; ">Белорусская республиканская коллегия адвокатов (БРКА) представляет и защищает интересы адвокатов во взаимоотношениях с государственными органами и иными организациями, координирует деятельность территориальных коллегий адвокатов, осуществляет меры, направленные на повышение доступности и качества оказания юридической помощи, определяет порядок кадрового обеспечения территориальных коллегий адвокатов по согласованию с Министерством юстиции Республики Беларусь, осуществляет мониторинг деятельности адвокатов в порядке, утвержденном советом Белорусской республиканской коллегии адвокатов.&nbsp;</span>
	</p>
	<p>
 <span style="font-size: 13pt; "> В Республике Беларусь образованы следующие территориальные коллегии адвокатов:</span>
	</p>
 <span style="font-size: 13pt; "> <a href="http://www.rka.by/kollegies/brestskaya-oblastnaya/"><span style="font-size: 13pt; ">Брестская областная коллегия адвокатов (БОКА)</span></a>
	<p>
 <span style="font-size: 13pt; "><a href="http://www.rka.by/kollegies/vitebskaya-oblastnaya/"><span style="font-size: 13pt; ">Витебская областная коллегия адвокатов (ВОКА)</span></a> </span>
	</p>
	<p>
 <a href="http://www.rka.by/kollegies/gomelskaya-oblastnaya/"><span style="font-size: 13pt; ">Гомельская областная коллегия адвокатов (ГОКА)</span></a>
	</p>
	<p>
 <a href="http://www.rka.by/kollegies/grodnenskaya-oblastnaya/"><span style="font-size: 13pt; ">Гродненская областная коллегия адвокатов (ГрОКА)</span></a>
	</p>
 <a href="http://www.rka.by/kollegies/minskaya-gorodskaya/"><span style="font-size: 13pt; ">Минская городская коллегия адвокатов (МГКА)</span></a> </span>
	<p>
	</p>
 <a href="http://www.rka.by/kollegies/minskaya-oblastnaya/"><span style="font-size: 13pt; ">Минская областная коллегия адвокатов (МОКА)</span></a>
	<p>
	</p>
 <a href="http://www.rka.by/kollegies/mogilevskaya-oblastnaya/"><span style="font-size: 13pt; ">Могилевская областная коллегия адвокатов(МогОКА)</span></a>
	<p>
	</p>
 <br>
</div>
 <b> <b><b> <span style="font-size: 13pt;"> </span><?$APPLICATION->IncludeComponent(
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
);?></b></b></b><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>