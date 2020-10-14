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

/*print "<pre>";
print_r($arResult);
print "</pre>";*/
?>
<?foreach($arResult["ITEMS"] as $arSection):?>

<?if($arSection["ID"] ==87){?>
<div class="news-list">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arSection["ELEMENTS"] as $key=> $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	
                    $renderImage = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], Array("width" => 60, "height" => 60), BX_RESIZE_IMAGE_EXACT, false);		
	?>
	
	<div class="news-item views-row views-row-even" id="<?=$this->GetEditAreaId($arItem['ID']);?>" style="width: 16.6%;float: left;text-align: center;">	


		<?//if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<?//if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>			
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>/">
				<div class="img-inner"><img
						class="preview_picture"
						border="0"
						src="<?=$renderImage["src"]?>"
						alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
						title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
						/>
				</div>		
					<div><?echo $arItem["NAME"]?></div>							
						</a>
						
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
			<?endif;?>
		<?endif*/?>

		<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
			<span class="news-date-time"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
		<?endif?>
		<?/*if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
					<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a>
			<?else:?>
				<b><?echo $arItem["NAME"]?></b>
			<?endif;?>
		<?endif;*/?>
		<?//if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
		<div class="list-text" style="margin-bottom: 20px;">
			<?echo $arItem["~PREVIEW_TEXT"];?>
		</div>			
</div>	
<?endforeach;?>
</div>
<?}?>
<?endforeach;?>
<style>

.news-list{
	overflow:hidden;
}
.news-item{
    height: 141px;
    text-align: center;	
}
div.news-list img.preview_picture{
	float:none;
}

</style>