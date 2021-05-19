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
<h2 class="block-title"><?

    $APPLICATION->IncludeComponent(
        "bitrix:main.include",
        ".default",
        Array(
            "AREA_FILE_SHOW" => "file",
            "PATH" => "/es/include/main_active_advokat.php",
            "EDIT_TEMPLATE" => ""
        )
    );
//=$arParams["TITLE_BLOCK"]

?></h2>
<div class="view view-month-active view-id-month_active view-display-id-block view-dom-id-c1fce8fbef67f8ebba7c1c8ff431040f">
<div class="view-content">
<div class="item-list">
<ul>
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    $renderImage = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], Array("width" => 105, "height" => 105), BX_RESIZE_IMAGE_EXACT, false);	
    ?>
	<li class="views-row-odd" id="<?=$this->GetEditAreaId($arItem['ID']);?>">   
				<a href="<?=str_replace("/es/","/",$arItem["DETAIL_PAGE_URL"])?>">
                <?if(!empty($renderImage['src'])){?>
                <img width="105" height="105" src="<?=$renderImage['src']?>" alt="<?=$arItem['NAME']?>">      
                <?}else{?>
                <img width="105" height="105" src="/upload/picture-defaultw.jpg" alt="<?=$arItem['NAME']?>">      
                <?}?>                
                </a>
		<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
			<span class="news-date-time"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
		<?endif?>
            <?  global $USER;
            if(CUser::IsOnLine($arItem['PROPERTIES']['USER']['VALUE'], 10)) {?>
                <div class="online"></div>
            <?}?>
        <div class="act_upper">
            <a href="<?=str_replace("/es/","/",$arItem["DETAIL_PAGE_URL"])?>"><?echo $arItem["NAME"]?></a><br>
        </div>
        <?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
			<?/*if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
            <div class="act_upper">
                <a href="<?=str_replace("/be/","/",$arItem["DETAIL_PAGE_URL"])?>"><?echo $arItem["NAME"]?></a><br>
                <?foreach(getAdvokat() as $ke => $arOt):?>
                 <?if($ke == $arItem['DISPLAY_PROPERTIES']['USER']['VALUE']):?>               
                <strong><?=$arOt?> 
            <?if(preg_match("/(5|6|7|8|9|0|11|12|13|14)$/",$arOt)){
                        $comment='адказаў';
                    }elseif(preg_match("|(1)$|",$arOt)){
                        $comment='адказ';
                    }elseif(preg_match("/(2|3|4)$/",$arOt)){
                        $comment='адказу';
                    }   
                    echo $comment;
             ?></strong>
                <?endif;?>                 
                <?endforeach;?>                 
             </div> 
            <?$db_list = CIBlockSection::GetList(array(), array('GLOBAL_ACTIVE' => 'Y', "IBLOCK_ID" => 15), true, array("ID", "NAME","UF_S_OLD_ID","SECTION_PAGE_URL","SECTION_ID"));
                    while($section = $db_list->Fetch()) {    
                        if($arItem["PROPERTIES"]["KOLLEG"]["VALUE"]==$section['NAME']){?>
                    <a href="/kollegies/<?=$section['CODE']?>/"  class="sm_koll"><?=$section['NAME']?></a>	     
            <?}}?>                   
			<?else:?>
				<b><?echo $arItem["NAME"]?></b><br />
			<?endif;*/?>
		<?endif;?>
		<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
			<?echo $arItem["PREVIEW_TEXT"];?>
		<?endif;?>
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<div style="clear:both"></div>
		<?endif?>
	</li>
<?endforeach; ?>
</ul>
</div>
</div>
</div>