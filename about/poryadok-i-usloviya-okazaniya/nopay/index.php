<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Условия и порядок оказания беплатной юридической помощи различным группам лиц");
$APPLICATION->SetPageProperty("keywords", "");
$APPLICATION->SetPageProperty("description", "Чтобы получить бесплатную юридическую помощь, дело должно соответствовать определенным критериям.");
$APPLICATION->SetTitle("Бесплатная юридическая помощь");
?><div class="field-item even" property="content:encoded">
	<p>
 <span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 14pt;">&nbsp; &nbsp;Случаи, когда юридическая помощь предоставляется бесплатно, перечислены в статье 28 Закона «Об адвокатуре и адвокатской деятельности в Республике Беларусь»:</span>
	</p>
	<p>
 <span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 14pt;">&nbsp; истцам - при составлении заявлений и ведении дел в судах первой инстанции, связанных с трудовыми правоотношениями, о взыскании алиментов, о лишении родительских прав; </span><br>
 <span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 14pt;">&nbsp; участникам и инвалидам Великой Отечественной войны, инвалидам боевых действий на территории других государств - при даче устной консультации по вопросам, не связанным с предпринимательской деятельностью; </span><br>
 <span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 14pt;">&nbsp; гражданам - при составлении заявлений об установлении факта получения заработной платы за конкретный период в определенном размере для назначения пенсий, о признании гражданина ограниченно дееспособным или недееспособным; </span><br>
 <span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 14pt;">
		инвалидам I и II группы - при даче устной консультации, не требующей ознакомления с документами; </span><br>
 <span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 14pt;">&nbsp; малообеспеченным родителю в неполной семье, воспитывающему ребенка в возрасте до восемнадцати лет, родителям (усыновителям, удочерителям) в многодетных семьях - при даче устной консультации, не требующей ознакомления с документами; </span><br>
 <span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 14pt;">&nbsp; несовершеннолетним - в их интересах; родителям (усыновителям, удочерителям, опекунам, попечителям) несовершеннолетних - в интересах их несовершеннолетних детей; </span><br>
 <span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 14pt;">&nbsp; пенсионерам и инвалидам, пребывающим (проживающим) в&nbsp;учреждениях социального обслуживания, осуществляющих стационарное социальное обслуживание, а также законным представителям граждан, признанных судом недееспособными, - при даче консультации по вопросам, связанным с обеспечением и защитой прав и законных интересов указанных граждан; </span><br>
 <span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 14pt;">&nbsp; беременным женщинам - при даче устной консультации по вопросам, связанным с рождением ребенка; </span><br>
 <span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 14pt;">&nbsp; иным категориям граждан - по решению коллегии адвокатов.</span><br>
 <span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 14pt;"> </span><span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 14pt;"><span style="font-family: &quot;Times New Roman&quot;, Times;">Юридическая помощь по вопросам социальной защиты и реабилитации жертвам торговли людьми, а в случае недостижения ими четырнадцатилетнего возраста — их законным представителям, лицам, пострадавшим в результате акта терроризма, оказывается за счет средств республиканского бюджета.</span><br>
 </span><br>
 <span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 14pt;">&nbsp; &nbsp;Юридическая помощь подозреваемому или обвиняемому по уголовному делу оплачивается из средств местного бюджета в случае участия адвоката в уголовном процессе по требованию органа, ведущего уголовный процесс (то есть в порядке статьи 46 Уголовно-процессуального кодекса Республики Беларусь). Следует иметь в виду, что затраты местного бюджета на оплату помощи адвоката могут быть взысканы с обвиняемого в случае признания его виновным, за исключением расходов по оплате труда адвоката при даче им консультации до начала первого допроса.&nbsp;</span>
	</p>
	<p>
 <span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 14pt;">&nbsp; Юридическая помощь по вопросам социальной защиты и реабилитации жертвам торговли людьми, а в случае недостижения ими четырнадцатилетнего возраста - их законным представителям, лицам, пострадавшим в результате акта терроризма, оказывается за счет средств республиканского бюджета. </span>
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