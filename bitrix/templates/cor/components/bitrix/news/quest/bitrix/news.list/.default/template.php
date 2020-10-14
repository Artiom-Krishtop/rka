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
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="news-item views-row views-row-even" id="<?=$this->GetEditAreaId($arItem['ID']);?>" style="margin-bottom:20px;">
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
				<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><? echo $arItem["~PREVIEW_TEXT"]//$arItem["NAME"]//echo substr($arItem["~PREVIEW_TEXT"],-500)?></a>
			<?else:?>
				<b><?echo $arItem["NAME"]?></b>
			<?endif;?>
		<?endif;?>
		<div class="list-text" >
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
                  
 <?if(!empty($arItem['PROPERTIES']['OTR_PRAVO']["VALUE"])){?>	   
	<div class="field field-name-field-phone field-type-text field-label-inline clearfix">
		<div class="field-items">
			<div class="field-item even">
             <div class="quest_theme">Отрасль права:
    <?foreach($arItem['PROPERTIES']['OTR_PRAVO']["VALUE"] as $arPravo){
    $resfera = CIBlockElement::GetByID($arPravo);
    if($ar_resfera = $resfera->GetNext())
    if($arPravo != end($arItem['PROPERTIES']['OTR_PRAVO']["VALUE"])){?>
     <a href="<?=$ar_resfera['DETAIL_PAGE_URL']?>"><?=strtolower($ar_resfera['NAME'])?></a>,
    <?}else{?>
     <a href="<?=$ar_resfera['DETAIL_PAGE_URL']?>"><?=strtolower($ar_resfera['NAME'])?></a>
    <?}
    }?>
 </div> 
            
            </div>			
		</div>
	</div>	
<?}?>

</div>
</div>

<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
</div>