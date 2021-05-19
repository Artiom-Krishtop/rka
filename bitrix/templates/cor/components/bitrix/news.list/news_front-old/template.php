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
$pev_txt = false;
?>
<h2 class="block-title">Новости адвокатуры</h2>
<div class="view view-news-on-mainpage view-id-news_on_mainpage view-display-id-block view-dom-id-02d3cd7afa0f44a2fd931e51cd0f005a">
    <div class="news-list view-content">
        <?if($arParams["DISPLAY_TOP_PAGER"]):?>
            <?=$arResult["NAV_STRING"]?>
        <?endif;?>
        <ul class="lastnews">
            <?foreach($arResult["ITEMS"] as $arItem):?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                // preview image
                $bImage = false;
                if( !empty($arItem["PREVIEW_PICTURE"]["SRC"]) || !empty($arItem["DETAIL_PICTURE"]["SRC"]) )
                {
                    if (strlen($arItem["PREVIEW_PICTURE"]["SRC"]))
                        $bImage = $arItem["PREVIEW_PICTURE"]["ID"];
                    elseif (strlen($arItem["DETAIL_PICTURE"]["SRC"]))
                        $bImage = $arItem["DETAIL_PICTURE"]["ID"];
                }
                $arImage = ($bImage ? CFile::ResizeImageGet($bImage, array('width' => 105, 'height' => 10000), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true) : array());
                $imageSrc = ($bImage ? $arImage['src'] : '');
                ?>
                <li class="news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                    <?if($imageSrc):?>
                        <span class="foto" style="float:left">
                            <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                                <img class="preview_picture" src="<?=$imageSrc?>" alt="<?=($bImage ? $arItem['PREVIEW_PICTURE']['ALT'] : $arItem['NAME'])?>" title="<?=($bImage ? $arItem['PREVIEW_PICTURE']['TITLE'] : $arItem['NAME'])?>" />
                            </a>
                        </span>
                    <?endif;?>
                    <div class="body-info<?=($imageSrc ? ' with_img_left' : '');?>">
                        <span class="date">
                            <?
                            if(!empty($arItem['PROPERTIES']['PUBLIC_DATE']['VALUE'])){
                                echo $arItem['PROPERTIES']['PUBLIC_DATE']['VALUE'];
                            }else{
                                echo FormatDate('d F Y',MakeTimeStamp($arItem['DISPLAY_ACTIVE_FROM']), time());
                            }
                            ?>
                        </span>
                        <?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
                            <?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
                                <a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><b><?echo $arItem["NAME"]?></b></a>
                            <?else:?>
                                <b><?echo $arItem["NAME"]?></b><br />
                            <?endif;?>
                        <?endif;?>
                        <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
                            <?echo $arItem["PREVIEW_TEXT"];?>
                        <?endif;?>
                        <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
                            <div style="clear:both"></div>
                        <?endif?>
                        <?if(strlen(trim($arItem["~DETAIL_TEXT"])) && $pev_txt):?>
                            <div><?
                                $str = $arItem["~DETAIL_TEXT"];
                                preg_match_all('/^<p[^>]*>.*?<\/p>/ims', $str, $match);
                                echo($match[0][0]);
                                ?></div>
                        <?endif;?>
                    </div>
                </li>
            <?endforeach;?>
        </ul>
    </div>
    <div class="more-link"><a href="/news/">Все новости адвокатуры</a></div>
</div>