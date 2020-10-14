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
<div class="region region-online">
<div id="block-views-month-active-block" class="block block-views contextual-links-region first last odd">
<div class="view view-month-active view-id-month_active view-display-id-block view-dom-id-c1fce8fbef67f8ebba7c1c8ff431040f">
<div class="view-content">
<div class="item-list">

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
    $renderImage = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], Array("width" => 60, "height" => 60), BX_RESIZE_IMAGE_EXACT, false);
    $link = str_replace("/kollegies/","/advokat/",$arItem["DETAIL_PAGE_URL"]);
    $pic_def = strpos($renderImage['src'], 'picture-default');
	?>


        <div style="width:33.3%;float:left;margin-bottom: 20px;" id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="individs-item">
			<span class="user-picture adv-pic">
				<a href="<?=$link;?>" title="Информация о пользователе.">
                    <img typeof="foaf:Image"
                         <?if(!empty($arItem["PREVIEW_PICTURE"]) && empty($pic_def)){?>
                             src="<?=$renderImage['src']?>"
                         <?}else{?>
                             src="/bitrix/templates/cor/images/rka-photo.png"
                         <?}?>
                         alt="Аватар пользователя <?echo $arItem["NAME"]?>" title="Аватар пользователя <?echo $arItem["NAME"]?>">
                </a>
            </span>
            <div class="adv-dsc" style="display: inline-block;">
                <a class="d" href="<?=$link;?>">
                    <?echo $arItem["NAME"]?>
                </a>
                <div style="width: 197px;">
                    <?=$arItem['PROPERTIES']['PHONE']['VALUE']?>
                </div>
            </div>
            <div class="clearfix"></div>

        </div>
<?endforeach;?>
</div>
</div>
</div>
</div>
</div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<div><?=$arResult["NAV_STRING"]?></div>
<?endif;?>
<style>
#block-views-month-active-block ul li a.sm_koll {
    font-size: 10px;
}
</style>