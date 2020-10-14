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
<?/*
echo "<pre>";
print_r($arItem['DISPLAY_PROPERTIES']['USER']['VALUE']);
echo "</pre>";*/
?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="news-item views-row views-row-even" id="<?=$this->GetEditAreaId($arItem['ID']);?>" style="margin-bottom:40px;">	

<div class="submitted-faq">
<?

$res = CUser::GetByID($arItem['DISPLAY_PROPERTIES']['USER']['VALUE']);
if($ar_res = $res->GetNext())
/*print "<pre>";
print_r($ar_res);
print "</pre>";	*/
?>

				  <a href=""><img width="45%" src="<?=CFile::GetPath($ar_res['PERSONAL_PHOTO'])?>" alt="<?=$ar_res['LOGIN']?>"></a><br>
				
				  <a href=""> 
				  <?if(!empty($ar_res["UF_ROLE"])){?>
					<?=$ar_res["UF_ROLE"]?>
				  <?}?>						  
				  <?if(!empty($ar_res['LAST_NAME'])){?>
					<?=$ar_res['LAST_NAME']?>
				  <?}?>		
				  <?if(!empty($ar_res['NAME'])){?>
					<?=$ar_res['NAME']?>
				  <?}?>	
				  <?if(!empty($ar_res['SECOND_NAME'])){?>
					<?=$ar_res['SECOND_NAME']?>
				  <?}?>
				  </a>,<br><?=FormatDate('d F Y',MakeTimeStamp($arItem['DISPLAY_PROPERTIES']['PUBLIC_DATE']['VALUE']), time())?>

</div>	

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

		<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
			<span class="news-date-time"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
		<?endif?>
		<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
			<h2 class="node-title">	<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a></h2><br />
			<?else:?>
				<b><?echo $arItem["NAME"]?></b><br />
			<?endif;?>
		<?endif;?>
		<?//if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
		<div class="list-text" style="margin-bottom: 20px;">
			<?echo $arItem["~PREVIEW_TEXT"];	
    //$str = $arItem["~DETAIL_TEXT"];

   // preg_match_all('/<p.*>([^\<]+)<\/p\s*>/i',$str,$matches);
    //for inside html like a comment sais:
    //preg_match_all('/<p[^\>]*>(.*)<\/p\s*>/i',$str,$match);
    //echo($match);	
	//echo($match[0][0]);	
	//echo($match[0][1]);		
			?>
</div>	
<?/*<div class="form-item form-type-item">
	<strong><?echo $arItem['DISPLAY_PROPERTIES']['LANG']['NAME']?>:</strong><br />
	<?echo $arItem['DISPLAY_PROPERTIES']['LANG']['VALUE']?>	
</div>	
<br />
<br />
<?/*<span class="submitted-by">
	Опубликовано: <?echo $arItem['PROPERTIES']['PUBLIC_DATE']['VALUE'] ?> | автор: <?echo $arItem['DISPLAY_PROPERTIES']['AUTHOR']['~VALUE'] ?>

	
</span>	*/?>	
<ul class="links inline">
<li class="node-readmore first"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>">Подробнее</a>	</li>
<li class="comment-add"><a href="" title="Читать последние записи в блоге пользователя <?=$ar_res['LOGIN']?>.">Блог						  
				  <?if(!empty($ar_res['LAST_NAME'])){?>
					<?=$ar_res['LAST_NAME']?>
				  <?}?>		
				  <?if(!empty($ar_res['NAME'])){?>
					<?=$ar_res['NAME']?>
				  <?}?>	
				  <?if(!empty($ar_res['SECOND_NAME'])){?>
					<?=$ar_res['SECOND_NAME']?>
				  <?}?>
</a>
 </li>
<li class="comment-add"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>#commento" title="Добавить комментарий к этой странице.">Добавить комментарий</a></li>
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
