<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Электронное обращение");
?><p>
 <span style="font-family: Georgia, serif; font-size: 14pt;">&nbsp; &nbsp; Электронные обращения граждан, в том числе индивидуальных предпринимателей, и юридических лиц рассматриваются Белорусской республиканской коллегией адвокатов в соответствии с требованиями Закона Республики Беларусь от 18 июля 2011 года "Об обращениях граждан и юридических лиц". </span><span style="font-size: 14pt;"> </span>
</p>
 <span style="font-family: Georgia, serif; font-size: 14pt;">&nbsp; &nbsp;Электронное обращение гражданина в обязательном порядке должно содержать: </span><br>
 <span style="font-family: Georgia, serif; font-size: 14pt;">&nbsp; наименование и (или) адрес организации либо должность лица, которым направляется обращение; </span><br>
 <span style="font-family: Georgia, serif; font-size: 14pt;">&nbsp; фамилию, собственное имя, отчество (если таковое имеется) либо инициалы гражданина; </span><br>
</span><span style="font-family: Georgia, serif; font-size: 14pt;">&nbsp; адрес места жительства (места пребывания) гражданина; </span><br>
</span><span style="font-family: Georgia, serif; font-size: 14pt;">&nbsp; изложение сути обращения; </span><br>
<span style="font-family: Georgia, serif; font-size: 14pt;">&nbsp; адрес электронной почты гражданина.</span>
<p>
</p>
 <b><span style="color: #9d0039;"><i><span style="font-family: Georgia, serif; font-size: 14pt;">&nbsp; Внимание!</span></i></span></b>
<p>
</p>
 <span style="font-family: Georgia, serif; font-size: 14pt;"><b><span style="color: #9d0039;"><i>&nbsp; В электронном обращении не рассматриваются просьбы об оказании юридической помощи. Для этого перейдите на страницу интернет-ресурса "Бесплатная юридическая онлайн-консультация Белорусской республиканской коллегии адвокатов" по адресу:<span style="font-family: Georgia, serif; font-size: 14pt;"><b><span style="color: #9d0039;"><i><a title="ON-LINE консультация" href="http://www.rka.by/faq_ask" target="_blank">http://www.rka.by/faq_ask</a>.
<p>
</p>
 <span style="font-family: Georgia, serif; font-size: 14pt;"><b><span style="color: #9d0039;"><i>&nbsp;Вопросы, адресованные конкретным адвокатам, рассматриваться не будут.</i></span></b><br>
 </span>
<p>
</p>
 <?$APPLICATION->IncludeComponent(
	"bitrix:form.result.new",
	"cormessage",
	Array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"COMPONENT_TEMPLATE" => "cormessage",
		"EDIT_URL" => "",
		"HIDE_CAPTION" => "Y",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"LIST_URL" => "",
		"SEF_MODE" => "N",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "N",
		"VARIABLE_ALIASES" => array("WEB_FORM_ID"=>"WEB_FORM_ID","RESULT_ID"=>"RESULT_ID",),
		"WEB_FORM_ID" => "3"
	)
);?> <script>
var jert = jQuery('form[name="SIMPLE_FORM_3"]');
if(!jert){
console.log(jert);	
	//jQuery(".field-item.even").css("display","none");
	jQuery(".field-item.even").addClass('js-hidden');
}
</script> <style>
.js-hidden {
	display:none;
}
</style></i></span></b></span></i></span></b></span><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>