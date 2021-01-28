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
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

        if(!empty($arItem["~PREVIEW_TEXT"]) && !preg_match('/^<[^<]+>/i', $arItem["~PREVIEW_TEXT"]))
            $arItem["~PREVIEW_TEXT"] = '<p>'.$arItem["~PREVIEW_TEXT"].'</p>';
        ?>
        <div class="news-item views-row views-row-even" id="<?=$this->GetEditAreaId($arItem['ID']);?>">

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
                    <?
                    $str = $arItem["~DETAIL_TEXT"];
                    preg_match_all('/<p[^\>]*>(.*)<\/p\s*>/i',$str,$match);
                    echo($match[0][0]);
                    echo($match[0][1]);
                    ?>
                <?else:?>
                    <?echo $arItem["~PREVIEW_TEXT"];?>
                <?endif;?>
            <?}?>
            <?if(!empty($arItem['DISPLAY_PROPERTIES']['LANG']['NAME'])):?>
                <div class="form-item form-type-item">
                    <strong><?echo $arItem['DISPLAY_PROPERTIES']['LANG']['NAME']?>:</strong> <?echo $arItem['DISPLAY_PROPERTIES']['LANG']['VALUE']?>
                </div>
            <?endif;?>
            <?
            $create_name=$arItem["CREATED_USER_NAME"];
            $create_name=preg_replace('~\(.*\)~ ','',$create_name);
            ?>
            <?if($arItem['IBLOCK_SECTION_ID']!=89 && $arItem['IBLOCK_SECTION_ID']!=90){?>
                <span class="submitted-by">
                    Опубликовано: <?if(!empty($arItem['PROPERTIES']['PUBLIC_DATE']['VALUE'])){?>
                        <?echo $arItem['PROPERTIES']['PUBLIC_DATE']['VALUE'] ?>
                    <?}else{?>
                        <?=FormatDate('d F Y',MakeTimeStamp($arItem['DISPLAY_ACTIVE_FROM']), time())?>
                    <?}?>
                    | автор: <?=$create_name?>
                </span>
            <?}else{?>
                <?=FormatDate('d F Y',MakeTimeStamp($arItem['DISPLAY_ACTIVE_FROM']), time())?>
            <?}?>
            <ul class="links inline">
                <li class="node-readmore first"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>">Подробнее</a>	</li>
                <li class="comment-add"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>#commento" title="Добавить комментарий к этой странице.">Добавить комментарий</a></li>
                <li class="jsquote last"></li>
            </ul>
        </div>
        <br />
    <?endforeach;?>
    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
        <br /><?=$arResult["NAV_STRING"]?>
    <?endif;?>
</div>
