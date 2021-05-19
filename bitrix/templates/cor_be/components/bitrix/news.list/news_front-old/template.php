<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<h2 class="block-title"><?$APPLICATION->IncludeComponent(
        "bitrix:main.include",
        ".default",
        Array(
            "AREA_FILE_SHOW" => "file",
            "PATH" => SITE_DIR."include/main_news.php",
            "EDIT_TEMPLATE" => ""
        )
    );?></h2>
    
  <div class="view view-news-on-mainpage view-id-news_on_mainpage view-display-id-block view-dom-id-02d3cd7afa0f44a2fd931e51cd0f005a">

<div class="news-list view-content">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
<ul class="lastnews">  
<?foreach($arResult["ITEMS"] as $arItem):?>

	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<li class="news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?//if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<?//if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
<span class="date">
<?if(!empty($arItem['PROPERTIES']['PUBLIC_DATE']['VALUE'])){?>
<?echo $arItem['PROPERTIES']['PUBLIC_DATE']['VALUE'] ?>
<?}else{?>
<?$date=FormatDate('d F Y',MakeTimeStamp($arItem['DISPLAY_ACTIVE_FROM']), time());
   $date=str_replace("Ноября","Лiстапада",$date);
   $date=str_replace("Декабря","Снежаня",$date);
    $date=str_replace("Января","Студзеня",$date);
    $date=str_replace("Февраля","Лютага",$date);
    $date=str_replace("Марта","Сакавiка",$date);
    $date=str_replace("Апреля","Красавiка",$date);
    $date=str_replace("Июня","Чэрвеня",$date);
    $date=str_replace("Июля","Лiпеня",$date);
    $date=str_replace("Августа","Жнiўня",$date);
    $date=str_replace("Сентября","Верасеня",$date);
    $date=str_replace("Октября","Кастрычнiка",$date);
   echo $date;?>
<?

//echo $arItem['DISPLAY_ACTIVE_FROM']?>
<?}?>
</span>                        
			<?/*else:?>
				<img
					class="preview_picture"
					border="0"
					src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
					width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
					height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
					alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
					title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
					style="float:left"
					/>
			<?endif;*/?>
		<?//endif?>
		<?/*if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
			<span class="news-date-time"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
		<?endif*/?>
		<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
				<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><b><?echo $arItem["NAME"]?></b></a>
			<?else:?>
				<b><?echo $arItem["NAME"]?></b><br />
			<?endif;?>
		<?endif;?>
		<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
			<?echo $arItem["PREVIEW_TEXT"];?>
		<?endif;?>
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<div style="clear:both"></div>
		<?endif?>
        <div>
			<?//echo $arItem["PREVIEW_TEXT"];
			
			
    $str = $arItem["~DETAIL_TEXT"];


   // preg_match_all('/<p.*>([^\<]+)<\/p\s*>/i',$str,$matches);
    //for inside html like a comment sais:
    preg_match_all('/<p[^\>]*>(.*)<\/p\s*>/i',$str,$match);



	echo($match[0][0]);	
	//echo($match[0][1]);		
			?>        
        </div>
		<?/*foreach($arItem["FIELDS"] as $code=>$value):?>
			<small>
			<?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?>
			</small><br />
		<?endforeach;?>
		<?foreach($arItem["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
			<small>
			<?=$arProperty["NAME"]?>:&nbsp;
			<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
				<?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
			<?else:?>
				<?=$arProperty["DISPLAY_VALUE"];?>
			<?endif?>
			</small><br />
		<?endforeach;*/?>
	</li>
<?endforeach;?>
</ul>
<?/*if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;*/?>
</div>
<div class="more-link">
  <a href="/be/news/">
      Усе навіны адвакатуры  </a>
</div>
</div>