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
<div class="news-list view view-faq view-id-faq view-display-id-page">
<div class="view-content">
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
 <blockquote><?=$arItem["~PREVIEW_TEXT"] ?></blockquote>
		<div class="list-text" style="margin-bottom: 20px;">
			<?/*echo $arItem["~PREVIEW_TEXT"];	*/
    //$str = $arItem["~DETAIL_TEXT"];

   // preg_match_all('/<p.*>([^\<]+)<\/p\s*>/i',$str,$matches);
    //for inside html like a comment sais:
    //preg_match_all('/<p[^\>]*>(.*)<\/p\s*>/i',$str,$match);
    //echo($match);	
	//echo($match[0][0]);	
	//echo($match[0][1]);		
			?>
</div>	
<div class="author">
    <?
    $pi = explode(" ", $arItem["NAME_ADVO"]);
    $Fname = $pi[0];
    $NName = mb_substr($pi[1],0,1);
    $Sname = mb_substr($pi[2],0,1);
    $Name = $Fname." ".$NName.".".$Sname.".";
    ?>
    Ответил(а) <a href="<?=$arItem["LINKS"]?>"><?=$Name?></a>
		<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
<div class="quest_theme" style="font-style: initial!important;font-size: 14px!important;">            
				<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>">Читать ответ</a><br />
 </div>                 
			<?else:?>
				<b><?echo $arItem["NAME"]?></b><br />
			<?endif;?>
		<?endif;?>
</div>
	</div>
<br />
<br />	
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
</div>