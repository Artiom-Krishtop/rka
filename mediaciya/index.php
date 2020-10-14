<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Медиация");
?>&nbsp;<span style="font-family: Georgia, serif;"> &nbsp;<b><span style="font-size: 14pt;">Что такое медиация? </span></b></span><br>
 <span style="font-size: 14pt;"> </span><span style="font-family: Georgia, serif; font-size: 14pt;">&nbsp; &nbsp;Медиация — способ урегулирования споров с участием третьей (нейтральной, беспристрастной, не заинтересованной в данном конфликте) стороны — медиатора, который помогает сторонам выработать взаимоприемлемое соглашение по спору. При этом, стороны полностью контролируют процесс принятия решения по урегулированию спора и условия его разрешения. Медиация может быть проведена как до обращения сторон в суд в порядке гражданского или хозяйственного судопроизводства, так и после возбуждения производства по делу в суде. </span><br>
 <span style="font-size: 14pt;"> </span><br>
 <span style="font-size: 14pt;"> </span><span style="font-family: Georgia, serif;"><span style="font-size: 14pt;">&nbsp; &nbsp;</span><b><span style="font-size: 14pt;">Кто такой медиатор? </span></b></span><br>
 <span style="font-size: 14pt;"> </span><span style="font-family: Georgia, serif; font-size: 14pt;">&nbsp; &nbsp;Медиатор — физическое лицо, участвующее в переговорах сторон в качестве незаинтересованного лица в целях содействия им в урегулировании спора. Многие адвокаты одновременно являются и медиаторами. Удобство для клиентов в данном случае очевидно: в случае, если стороны не пришли к заключению медитативного соглашения с помощью медиатора, - клиенту нет необходимости искать адвоката для разрешения данного спора в суде. </span><br>
 <span style="font-size: 14pt;"> </span><br>
 <span style="font-size: 14pt;"> </span><span style="font-family: Georgia, serif;"><span style="font-size: 14pt;">&nbsp; &nbsp;</span><b><span style="font-size: 14pt;">Какие споры могут быть разрешены с помощью медиации? </span></b></span><br>
 <span style="font-size: 14pt;"> </span><span style="font-family: Georgia, serif;"><span style="font-size: 14pt;">&nbsp; &nbsp;Любые споры могут быть разрешены с помощью медиации. </span></span><span style="font-family: Georgia, serif;"><span style="font-size: 14pt;">В частности, это могут быть следующие споры: </span><br>
 </span><span style="font-family: Georgia, serif;"><span style="font-size: 14pt;">в сфере бизнеса – неисполнение договора, раздел бизнеса, конфликты в управлении компанией и т.д., </span><br>
 </span><span style="font-family: Georgia, serif;"><span style="font-size: 14pt;">в семейных делах – вопросы расторжения брака, раздела имущества, споры о воспитании детей, конфликты между родственниками, споры о наследстве и т.д., </span><br>
 </span><span style="font-family: Georgia, serif;"><span style="font-size: 14pt;">в гражданских делах – споры о земельных участках, о защите прав потребителей, споры в сфере жилищных отношений, споры по исполнению гражданско-правовых договоров и т.д., </span><br>
 </span><span style="font-family: Georgia, serif; font-size: 14pt;">в трудовых отношениях – конфликты между нанимателями и работниками.</span><br>
 <br>
&nbsp; &nbsp;<?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"about_menu",
	Array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "mediac",
		"COMPONENT_TEMPLATE" => "about_menu",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "mediac",
		"USE_EXT" => "Y"
	)
);?> <?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"aboutsub_menu",
	Array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "mediacsub",
		"COMPONENT_TEMPLATE" => "aboutsub_menu",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "mediacsub",
		"USE_EXT" => "Y"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>