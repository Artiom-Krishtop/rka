<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Медиация");
?><b><span style="font-size: 13pt; font-family: &quot;Times New Roman&quot;, Times;">Что такое медиация? </span></b><br>
 <span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 13pt;">Медиация — способ урегулирования споров с участием третьей (нейтральной, беспристрастной, не заинтересованной в данном конфликте) стороны — медиатора, который помогает сторонам выработать взаимоприемлемое соглашение по спору. При этом, стороны полностью контролируют процесс принятия решения по урегулированию спора и условия его разрешения. Медиация может быть проведена как до обращения сторон в суд в порядке гражданского или хозяйственного судопроизводства, так и после возбуждения производства по делу в суде. <br>
 </span><span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 13pt;"><b>Кто такой медиатор?</b></span><br>
 <span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 13pt;">Медиатор — физическое лицо, участвующее в переговорах сторон в качестве незаинтересованного лица в целях содействия им в урегулировании спора. Многие адвокаты одновременно являются и медиаторами. Удобство для клиентов в данном случае очевидно: в случае, если стороны не пришли к заключению медитативного соглашения с помощью медиатора, - клиенту нет необходимости искать адвоката для разрешения данного спора в суде. </span><br>
 <b><span style="font-size: 13pt; font-family: &quot;Times New Roman&quot;, Times;">Какие споры могут быть разрешены с помощью медиации? </span></b><br>
 <span style="font-size: 13pt; font-family: &quot;Times New Roman&quot;, Times;">В частности, это могут быть следующие споры: </span><br>
 <span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 13pt;"> в сфере бизнеса – неисполнение договора, раздел бизнеса, конфликты в управлении компанией и т.д., <br>
 </span><span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 13pt;">в семейных делах – вопросы расторжения брака, раздела имущества, споры о воспитании детей, конфликты между родственниками, споры о наследстве и т.д., <br>
 </span><span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 13pt;">в гражданских делах – споры о земельных участках, о защите прав потребителей, споры в сфере жилищных отношений, споры по исполнению гражданско-правовых договоров и т.д., <br>
 </span><span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 13pt;">в трудовых отношениях – конфликты между нанимателями и работниками.<br>
 Также стало возможным примирение обвиняемого с потерпевшим по уголовному делу&nbsp;путем заключения медиативного соглашения.<br>
 <br>
 <span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 13pt;">Подробнее о медиации Вы можете прочитать в Законе Республики Беларусь от 12.07.2013 N 58-З </span><a target="_blank" href="https://pravo.by/document/?guid=3871&p0=H11300058"><span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 13pt;">"О медиации"</span></a><br>
 <br>
 <br>
 <span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 13pt;">
&nbsp; &nbsp;</span><?$APPLICATION->IncludeComponent(
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
);?><span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 13pt;"> </span><?$APPLICATION->IncludeComponent(
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
);?><br>
</span><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>