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
<div class="news-list">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
<?php /*
print "<pre>";
print_r($arItem);
print "</pre>";*/
?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="news-item views-row views-row-even" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>			
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img
						class="preview_picture"
						border="0"
						src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
						width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
						height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
						alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
						title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
						style="float:left"
						/></a>
				</h2>				
			<?else:?>
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
			<?endif;?>
		<?endif?>

		<?/*if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
			<span class="news-date-time"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
		<?endif*/?>
		<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
			<h2 class="node-title">	<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a></h2><br />
			<?else:?>
				<b><?echo $arItem["NAME"]?></b><br />
			<?endif;?>
		<?endif;?>
<?if($arItem['IBLOCK_SECTION_ID']==89 || $arItem['IBLOCK_SECTION_ID']==90){?> 
 <?echo $arItem["~PREVIEW_TEXT"];?>
<?}else{?>
     
		<?if(empty($arItem["PREVIEW_TEXT"])):?>
		
			<?//echo $arItem["PREVIEW_TEXT"];
			
			
    $str = $arItem["~DETAIL_TEXT"];


   // preg_match_all('/<p.*>([^\<]+)<\/p\s*>/i',$str,$matches);
    //for inside html like a comment sais:
    preg_match_all('/<p[^\>]*>(.*)<\/p\s*>/i',$str,$match);
    //echo($match);	
	echo($match[0][0]);	
	echo($match[0][1]);		
			?>
 <?else:?>  
 <?echo $arItem["~PREVIEW_TEXT"];?>
<?endif;?>
<?}?>  
		<?if(!empty($arItem['DISPLAY_PROPERTIES']['LANG']['NAME'])):?>
<div class="form-item form-type-item">
	<strong><?echo $arItem['DISPLAY_PROPERTIES']['LANG']['NAME']?>:</strong><br />
	<?echo $arItem['DISPLAY_PROPERTIES']['LANG']['VALUE']?>	
</div>	
<?endif;?>
<br />
<br />

<?if($arItem['IBLOCK_SECTION_ID']!=89 && $arItem['IBLOCK_SECTION_ID']!=90){?>
<span class="submitted-by">
	Апублікавана: <?if(!empty($arItem['PROPERTIES']['PUBLIC_DATE']['VALUE'])){?>
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
<?/*if(!empty($arItem['DISPLAY_PROPERTIES']['AUTHOR']['~VALUE'])){?>
| аўтар: <?echo $arItem['DISPLAY_PROPERTIES']['AUTHOR']['~VALUE'] ?>
<?}*/?>
    | аўтар: Ірына Рэут
</span>	
<?}?>	
<ul class="links inline">
<li class="node-readmore first"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>">Больш падрабязна</a>	</li>
<li class="comment-add"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>#commento" title="Дадаць новы каментар да гэтае старонкі.">Дадаць каментар</a></li>
<!--<li class="quote"><a href="/comment/reply/174709?quote=1#comment-form" title="Цитировать это сообщение в своем ответе" class="js-quote" data-name="">цитировать</a></li>-->
<li class="jsquote last"></li>
</ul>

		<?//endif;?>
		<?/*if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<div style="clear:both"></div>
		<?endif?>
		<?foreach($arItem["FIELDS"] as $code=>$value):?>
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
	</div>
<br />
<br />	
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
