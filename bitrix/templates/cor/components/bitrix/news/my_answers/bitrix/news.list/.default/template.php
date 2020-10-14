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
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="news-item views-row views-row-even" id="<?=$this->GetEditAreaId($arItem['ID']);?>" >
            <?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
                <?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
                    <div class="ques"><b>Вопрос:</b> <?echo $arItem["~PREVIEW_TEXT"]?>...<br /></div>
                    <div class="ques"><b>Ваш ответ:</b> <?echo $arItem["~DETAIL_TEXT"]?><br /></div>
                <?else:?>
                    <b><?echo $arItem["NAME"]?></b><br />
                <?endif;?>
            <?endif;?>
            <div class="list-text" style="margin-bottom: 20px;">
    </div>
        <div class="">
            <a href="index_ans.php?answer=<?=$arItem['ID']?>" >редактировать</a> |
            <?
            $public_date = FormatDate('d F Y',MakeTimeStamp($arItem['PUBLIC_DATE']['VALUE']), time());
            $active_date = FormatDate('d F Y',MakeTimeStamp($arItem['ACTIVE_FROM']), time());
            if(!empty($arItem['PUBLIC_DATE']['VALUE'])){?>
            <span><?=$public_date?></span>
            <?}else{?>
            <span><?=$active_date?></span>
            <?}?>
        </div>
        </div>
    <?endforeach;?>
    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
        <br /><?=$arResult["NAV_STRING"]?>
    <?endif;?>
    </div>
</div>