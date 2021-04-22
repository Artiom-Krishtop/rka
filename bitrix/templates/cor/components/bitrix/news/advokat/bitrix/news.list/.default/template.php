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
<ul style="flex-wrap: wrap;">
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
    $renderImage = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], Array("width" => 105, "height" => 105), BX_RESIZE_IMAGE_EXACT, false);	    
	?>
	<li class="views-row-odd" id="<?=$this->GetEditAreaId($arItem['ID']);?>" >
        <?  global $USER;
        if(CUser::IsOnLine($arItem['PROPERTIES']['USER']['VALUE'], 120)) {?>
            <div class="online" style="margin-top: 0px;"></div>
        <?}?>
        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                <?
                $pic_def = strpos($renderImage['src'], 'picture-default');
                if(!empty($renderImage['src']) && empty($pic_def)){?>
                <img width="105" height="105" src="<?=$renderImage['src']?>" alt="<?=$arItem['NAME']?>">      
                <?}else{?>
                <img width="105" height="105" src="/bitrix/templates/cor/images/rka-photo.png" alt="<?=$arItem['NAME']?>">
                <?}?>                
                </a>
                <a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a>	
             <?$db_list = CIBlockSection::GetList(array(), array('GLOBAL_ACTIVE' => 'Y', "IBLOCK_ID" => 15), true, array("ID", "NAME","UF_S_OLD_ID","SECTION_PAGE_URL","SECTION_ID"));
                    while($section = $db_list->Fetch()) {    
                        if($arItem["PROPERTIES"]["KOLLEG"]["VALUE"]==$section['NAME']){?>
                    <a href="/kollegies/<?=$section['CODE']?>/"  class="sm_koll"><?=$section['NAME']?></a>	     
            <?}}?>                
	</li>	
<?endforeach;?>
</ul>
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