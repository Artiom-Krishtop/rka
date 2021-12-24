<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Правовая юридическая помощь наслению");
$APPLICATION->SetPageProperty("keywords", "");
$APPLICATION->SetPageProperty("description", "Адвокаты оказывают различные виды правовой и юридической помощи населению, в том числе, оказывают бесплатную правовую помощь населению.");
$APPLICATION->SetTitle("Порядок и условия оказания юридической помощи адвокатами");
?><div class="field-item even" property="content:encoded">
	<p>
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
	</p>
	<p>
 <span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 13pt;">&nbsp; В своей профессиональной деятельности адвокаты руководствуются Законом «Об адвокатуре и адвокатской деятельности в Республике Беларусь» от 30 декабря 2011 г. № 334-З, в котором регламентирована деятельность адвоката и порядок оказания адвокатами правовой помощи гражданам и юридическим лицам. Гражданам юридическая помощь может быть оказана на платной и бесплатной основе.</span>
	</p>
	<p>
 <span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 13pt;">&nbsp; &nbsp;Адвокаты оказывают клиентам следующие виды юридической помощи:</span>
	</p>
	<li><span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 13pt;">дают консультации и разъяснения по юридическим вопросам;</span></li>
	<li><span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 13pt;">составляют заявления, жалобы и другие документы правового характера;</span></li>
	<li><span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 13pt;">представляют интересы клиентов в судах, в том числе на стадии исполнения судебных постановлений, а также в государственных органах, иных организациях, в том числе их органах управления, и перед физическими лицами;</span></li>
	<li><span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 13pt;">участвуют в досудебном производстве и суде по уголовным делам в качестве защитника, а также представителя потерпевших, гражданских истцов, гражданских ответчиков;</span></li>
	<li><span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 13pt;">участвуют в административном процессе в качестве защитника, представителя потерпевшего, иных физических или юридических лиц, являющихся участниками административного процесса;</span></li>
	<li><span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 13pt;">проводят правовую оценку документов и деятельности;</span></li>
	<li><span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 13pt;">ведут правовую работу по обеспечению хозяйственной и иной деятельности;</span></li>
	<li><span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 13pt;">ведут правовую работу по вопросам привлечения инвестиций в Республику Беларусь;</span></li>
	<li><span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 13pt;">совершают от имени и в интересах клиентов юридически значимые действия в пределах полномочий, предоставленных им клиентом и законодательством;</span></li>
	<li><span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 13pt;">оказывают иные виды юридической помощи. </span></li>
 <span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 13pt;"><br>
	 Адвокаты также вправе выступать примирителями в примирительной процедуре, медиаторами, арбитрами или третейскими судьями.</span><br>
 <br>
 <span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 13pt;">&nbsp; &nbsp;Профессиональная защита прав и интересов клиентов по уголовным, гражданским делам, делам, возникающим из хозяйственных (экономических) споров, и делам об административных правонарушениях в общих и хозяйственных судах, органах, ведущих уголовный или административный процесс, осуществляется только адвокатами.</span><br>
	<ol>
	</ol>
	<p>
 <span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 13pt;">&nbsp;&nbsp;</span><span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 13pt;">&nbsp;</span>
	</p>
</div>
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