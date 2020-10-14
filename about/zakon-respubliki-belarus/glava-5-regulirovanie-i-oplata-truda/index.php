<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Социальное страхование и социальное обеспечение адвокатов");
$APPLICATION->SetPageProperty("keywords", "Регулирование труда адвокатов, оплата труда адвокатов, социальные гарантии");
$APPLICATION->SetPageProperty("description", "Государственное регулирование труда и оплаты адвокатов. Обязательное государственное социальное страхование и социальное обеспечение адвокатов.");
$APPLICATION->SetTitle("Глава 5. Регулирование и оплата труда адвокатов, стажеров и помощников адвоката. Обязательное государственное социальное страхование и социальное обеспечение адвокатов");
?>
<div class="field-item even" property="content:encoded"><p class="ConsPlusNormal"><strong>Статья 34. Регулирование труда адвокатов, стажеров и помощников адвоката</strong></p>
<p class="ConsPlusNormal">1. Труд адвокатов, стажеров и помощников адвоката регулируется настоящим Законом, Правилами профессиональной этики адвоката, иными нормативными правовыми актами.</p>
<p class="ConsPlusNormal">На адвокатов, осуществляющих адвокатскую деятельность в юридических консультациях либо индивидуально, нормы законодательства о труде не распространяются.</p>
<p class="ConsPlusNormal">2. Труд адвокатов, стажеров и помощников адвоката в юридической консультации организуется в соответствии с правилами внутреннего трудового распорядка соответствующей территориальной коллегии адвокатов, а труд адвокатов, стажеров и помощников адвоката в адвокатском бюро - в соответствии с правилами внутреннего трудового распорядка адвокатского бюро.</p>
<p class="ConsPlusNormal">3. Адвокат, в том числе осуществляющий адвокатскую деятельность индивидуально, пользуется правом на отпуск продолжительностью не менее 24 календарных дней.</p>
<p class="ConsPlusNormal">Адвокат, осуществляющий адвокатскую деятельность индивидуально, обязан уведомить соответствующую территориальную коллегию адвокатов о начале и продолжительности предполагаемого отпуска за 15 дней до его наступления.</p>
<p class="ConsPlusNormal">Порядок и условия предоставления отпусков адвокатам юридической консультации устанавливаются уставом соответствующей территориальной коллегии адвокатов.</p>
<p class="ConsPlusNormal">&nbsp;</p>
<p class="ConsPlusNormal"><strong>Статья 35. Оплата труда адвокатов, стажеров адвоката, иных работников адвокатских образований</strong></p>
<p class="ConsPlusNormal">1. Труд адвокатов оплачивается за счет средств, поступивших от клиентов за оказанную им юридическую помощь, средств коллегий адвокатов, республиканского и (или) местного бюджетов.</p>
<p class="ConsPlusNormal">2. Размер оплаты труда адвоката за счет средств республиканского и (или) местного бюджетов определяется в порядке, установленном Советом Министров Республики Беларусь.</p>
<p class="ConsPlusNormal">3. Условия и размер оплаты труда адвоката при оказании юридической помощи за счет средств коллегий адвокатов, а также оплаты труда стажеров адвоката определяются Белорусской республиканской коллегией адвокатов в соответствии с законодательством и ее уставом.</p>
<p class="ConsPlusNormal">(в ред. Закона Республики Беларусь от 11.07.2017 N 42-З)</p>
<p class="ConsPlusNormal">4. Условия и размер оплаты труда иных работников адвокатских образований, в том числе помощников адвоката, определяются их нанимателями в соответствии с законодательством.</p>
<p class="ConsPlusNormal">&nbsp;</p>
<p class="ConsPlusNormal"><strong>Статья 36. Обязательное государственное социальное страхование и социальное обеспечение адвокатов</strong></p>
<p class="ConsPlusNormal">Обязательное государственное социальное страхование и социальное обеспечение адвокатов осуществляются в соответствии с законодательством.</p>
<p class="ConsPlusNormal">&nbsp;</p>
<p class="ConsPlusNormal">&nbsp;</p>
</div>
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
		"ELEMENT_ID" => "106762",
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