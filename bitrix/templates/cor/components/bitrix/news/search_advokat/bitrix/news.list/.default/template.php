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
<div class="news-list" style="overflow: hidden;">

<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="news-item views-row views-row-even" id="<?=$this->GetEditAreaId($arItem['ID']);?>" style="width: 16.6%;float: left;text-align: center;height:170px;">
        <?  global $USER;
        if(CUser::IsOnLine($arItem['PROPERTIES']['USER']['VALUE'], 120)) {?>
            <div class="online" style="margin-left: 109px;margin-top: 0px;"></div>
        <?}?>
        <?
      $renderImage = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], Array("width" => 100, "height" => 100), BX_RESIZE_IMAGE_EXACT, false);
      $pic_def = strpos($renderImage['src'], 'picture-default');
?>	


		<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
			<span class="news-date-time"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
		<?endif?>
		<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
					<span class="user-picture">
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" title="Информация о пользователе.">
                            <img style="display: block;margin: 0 auto;" typeof="foaf:Image" <?if(!empty($arItem["PREVIEW_PICTURE"]) && empty($pic_def)){?>src="<?=$renderImage['src']?>"<?}else{?>src="/bitrix/templates/cor/images/rka-photo.png"<?}?> alt="Аватар пользователя <?=$arItem["NAME"]?>" title="Аватар пользователя <?=$arItem["NAME"]?>">
                        </a>
                    </span>
						<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a>
			<?else:?>
				<b><?echo $arItem["NAME"]?></b>
			<?endif;?>
		<?endif;?>
		<div class="list-text" style="margin-bottom: 20px;">
			<?//echo $arItem["~PREVIEW_TEXT"];?>
</div>		
	</div>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
