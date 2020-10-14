<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Отзывы о сайте rka.by");
?><div class="field-item even" property="content:encoded">
	<p>
 <span style="font-family: Georgia, serif; font-size: 13pt;">Rka.by - официальный сайт Белорусской республиканской коллегии адвокатов.&nbsp;</span>
	</p>
	<p>
 <span style="font-family: Georgia, serif; font-size: 13pt;">На данном сайте Вы можете: </span>
	</p>
 <span style="font-family: Georgia, serif; font-size: 13pt;"> </span>
	<p>
 <span style="font-family: Georgia, serif; font-size: 13pt;">
		найти сведения обо всех адвокатах республики; </span>
	</p>
 <span style="font-family: Georgia, serif; font-size: 13pt;"> </span>
	<p>
 <span style="font-family: Georgia, serif; font-size: 13pt;">
		изучить разъяснения адвокатов по наиболее актуальным юридическим вопросам; </span>
	</p>
 <span style="font-family: Georgia, serif; font-size: 13pt;"> </span>
	<p>
 <span style="font-family: Georgia, serif; font-size: 13pt;">
		получить актуальную информацию о деятельности адвокатского сообщества Беларуси; </span>
	</p>
 <span style="font-family: Georgia, serif; font-size: 13pt;"> </span>
	<p>
 <span style="font-family: Georgia, serif; font-size: 13pt;">
		в рамках </span><span style="font-family: Georgia, serif; font-size: 13pt;"><a href="http://www.rka.by/faq_ask" rel="nofollow"><span style="font-family: Georgia, serif;">бесплатной юридической онлайн-</span>консультации</a>&nbsp;</span><span style="font-family: Georgia, serif; font-size: 13pt;">получить предварительное разъяснение норм законодательства по вопросам, не требующим ознакомления с документами и иными материалами. </span>
	</p>
	<p>
		<span style="font-family: Georgia, serif; font-size: 13pt;">Просим оставить свои отзывы и предложения в отношении работы сайта, а также Ваше мнение об адвокатах, с которыми Вы сотрудничали.</span>
	</p>
</div>
 <?/*$APPLICATION->IncludeComponent(
	"bitrix:voting.result", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"VOTE_ID" => "4",
		"VOTE_ALL_RESULTS" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "1200",
		"QUESTION_DIAGRAM_6" => "-"
	),
	false
);*/?> &nbsp;<?$APPLICATION->IncludeComponent(
	"bitrix:voting.current",
	"vote",
	Array(
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHANNEL_SID" => "MNENIE",
		"COMPONENT_TEMPLATE" => ".default",
		"VOTE_ALL_RESULTS" => "N",
		"VOTE_ID" => "4"
	)
);?>
<h2 class="title comment-form" id="commento">Добавить комментарий</h2>
<hr>
 <?$APPLICATION->IncludeComponent(
	"bitrix:forum.topic.reviews",
	"otzyvy",
	Array(
		"AJAX_POST" => "Y",
		"CACHE_TIME" => "0",
		"CACHE_TYPE" => "A",
		"COMPONENT_TEMPLATE" => "otzyvy",
		"DATE_TIME_FORMAT" => "j F Y G:i",
		"EDITOR_CODE_DEFAULT" => "Y",
		"ELEMENT_ID" => "2665",
		"FILES_COUNT" => "",
		"FORUM_ID" => "14",
		"IBLOCK_ID" => "13",
		"IBLOCK_TYPE" => "company",
		"MESSAGES_PER_PAGE" => "10",
		"NAME_TEMPLATE" => "",
		"PAGE_NAVIGATION_TEMPLATE" => "",
		"PREORDER" => "N",
		"RATING_TYPE" => "standart",
		"SHOW_AVATAR" => "Y",
		"SHOW_LINK_TO_FORUM" => "N",
		"SHOW_MINIMIZED" => "N",
		"SHOW_RATING" => "N",
		"URL_TEMPLATES_DETAIL" => "",
		"URL_TEMPLATES_PROFILE_VIEW" => "",
		"URL_TEMPLATES_READ" => "",
		"USE_CAPTCHA" => "Y"
	)
);?> <style>
.voting-form-box{
	border: none; 
    padding: 0;
}	
.voting-form-box form{
	text-align: left;
	margin: 0 auto;
	display: table;
}
.vote-form-box-buttons.vote-vote-footer{
	text-align:center;
}
</style> <br>
 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"otzyv",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "otzyv",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"",1=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "13",
		"IBLOCK_TYPE" => "company",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(0=>"AUTHOR",1=>"PUBLIC_DATE",2=>"FORUM_MESSAGE_CNT",3=>"OLD_ID",4=>"FORUM_TOPIC_ID",5=>"",),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "ID",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N"
	)
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>