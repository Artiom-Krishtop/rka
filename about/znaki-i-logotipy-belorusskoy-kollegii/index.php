<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Знаки и логотипы белорусской коллегии адвокатов");
$APPLICATION->SetPageProperty("keywords", "");
$APPLICATION->SetPageProperty("description", "Логотип Республиканской коллегии адвокатов представляет собой эмблему, в которой сочетаются узнаваемые символы, раскрывающие суть деятельности адвоката.");
$APPLICATION->SetTitle("Знаки и логотипы белорусской коллегии адвокатов");
?>
<div class="field-item even" property="content:encoded"><p>Логотип Республиканской коллегии адвокатов представляет собой эмблему, в которой сочетаются узнаваемые символы, раскрывающие суть деятельности адвоката.</p>
<p>Центром эмблемы является колонна, которую венчают весы – главный инструмент богини правосудия Фемиды, на которых тщательно взвешиваются добро и зло, вина и наказание.&nbsp; При этом чаши весов на гербе находятся на одной плоскости, что подразумевает под собой равновесие. Колонна - символ стабильности и надежности - является основой для этого равновесия. Золотая колонна - основа эмблемы, именно она символизирует в ней деятельность адвоката (это подчеркнуто размещенной на ней красной лентой с надписью "Адвокат").</p>
<p>В геральдических символах колонна олицетворяет идею мировой оси, которая удерживает небо, связывая его с землей. В данном же случае она иносказательно изображает роль адвокатуры как связующего звена между гражданами и системой правоохранительными органами. Колонна обрамлена лучами солнца. Прямые лучи символизируют собой сияющее солнце как знак красоты, благородства и мудрости. Венок из листьев дубы и лавра – узнаваемый символ, широко использующийся как в геральдических знаках, так и в эмблемах. Дуб ассоциируется с силой, достоинством и стойкостью. Лавр – традиционный символ непреклонности, победы над трудностями и невзгодами.</p>
<table border="0" cellpadding="10"><tbody><tr><td><a href="/upload/docs/Logo_bw.jpg"><img src="http://www.youtube.com/watch?resize=docs&amp;identity=Logo_bw-150x171.jpg" alt="" width="150" height="171"></a></td>
<td valign="top">
Черно-белый логотип в форматах
<ul><li><a href="/upload/docs/Logo_bw.jpg" rel="nofollow">.jpg</a></li>
<li><a href="/upload/docs/Logo_bw.eps" rel="nofollow">.eps</a></li>
<li><a href="/upload/docs/Logo_bw.cdr" rel="nofollow">.cdr</a></li>
</ul>
&nbsp;</td>
</tr><tr><td><a href="/upload/docs/Logo_color.jpg"><img src="http://www.youtube.com/watch?resize=docs&amp;identity=Logo_color-150x171.jpg" alt="" width="150" height="171"></a></td>
<td valign="top">
Цветной логотип в форматах
<ul><li><a href="/upload/docs/Logo_color.jpg" rel="nofollow">.jpg</a></li>
<li><a href="/upload/docs/Logo_color.eps" rel="nofollow">.eps</a></li>
<li><a href="/upload/docs/Logo_color.cdr" rel="nofollow">.cdr</a></li>
<li><a href="/upload/docs/Logo_golden_color_texture.zip" rel="nofollow">.psd</a></li>
</ul></td>
</tr><tr><td><a href="/upload/docs/Logo_golden_texture.jpg"><img src="http://www.youtube.com/watch?resize=docs&amp;identity=Logo_golden_texture-150x150.jpg" alt="" width="150" height="150"></a></td>
<td valign="top">
Золотой логотип с текстурой в форматах
<ul><li><a href="/upload/docs/Logo_golden_texture.jpg" rel="nofollow">.jpg</a></li>
<li><a href="/upload/docs/Logo_golden_texture.zip" rel="nofollow">.psd</a></li>
</ul></td>
</tr></tbody></table></div>
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
<h2 class="title comment-form" id="commento">Добавить комментарий</h2>
<hr>
<?$APPLICATION->IncludeComponent(
	"bitrix:forum.topic.reviews", 
	"comment_fiz", 
	array(
		"AJAX_POST" => "Y",
		"CACHE_TIME" => "0",
		"CACHE_TYPE" => "A",
		"DATE_TIME_FORMAT" => "j F Y G:i",
		"EDITOR_CODE_DEFAULT" => "Y",
		"ELEMENT_ID" => "106766",
		"FILES_COUNT" => "",
		"FORUM_ID" => "8",
		"IBLOCK_ID" => "20",
		"IBLOCK_TYPE" => "company",
		"MESSAGES_PER_PAGE" => "10",
		"NAME_TEMPLATE" => "",
		"PAGE_NAVIGATION_TEMPLATE" => "",
		"PREORDER" => "Y",
		"RATING_TYPE" => "standart",
		"SHOW_AVATAR" => "Y",
		"SHOW_LINK_TO_FORUM" => "N",
		"SHOW_MINIMIZED" => "N",
		"SHOW_RATING" => "N",
		"URL_TEMPLATES_DETAIL" => "",
		"URL_TEMPLATES_PROFILE_VIEW" => "",
		"URL_TEMPLATES_READ" => "",
		"USE_CAPTCHA" => "Y",
		"COMPONENT_TEMPLATE" => "comment_fiz"
	),
	false
);?> 
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>