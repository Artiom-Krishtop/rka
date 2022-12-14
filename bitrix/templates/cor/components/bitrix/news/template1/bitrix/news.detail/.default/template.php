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
<div class="news-detail">
    <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
        <?if($arResult["DETAIL_PICTURE"]["WIDTH"] > 300):?>
            <img
                    class="detail_picture"
                    border="0"
                    src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
                    width="44%"
                    height="auto"
                    alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
                    title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
            />
        <?else:?>
            <img
                    class="detail_picture"
                    border="0"
                    src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
                    width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
                    height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
                    alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
                    title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
            />
        <?endif?>
    <?endif?>
    <?if($arResult['IBLOCK_SECTION_ID']!=89 && $arResult['IBLOCK_SECTION_ID']!=90){?>
        <?/*if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
		<span class="news-date-time"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></span>
	<?endif;*/?>
    <?}?>
    <?/*if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
		<h3><?=$arResult["NAME"]?></h3>
	<?endif;*/?>
    <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arResult["FIELDS"]["PREVIEW_TEXT"]):?>
        <p><?=$arResult["FIELDS"]["PREVIEW_TEXT"];unset($arResult["FIELDS"]["PREVIEW_TEXT"]);?></p>
    <?endif;?>
    <?if($arResult["NAV_RESULT"]):?>
        <?if($arParams["DISPLAY_TOP_PAGER"]):?><?=$arResult["NAV_STRING"]?><br /><?endif;?>
        <?echo $arResult["NAV_TEXT"];?>
        <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?endif;?>
    <?elseif(strlen($arResult["DETAIL_TEXT"])>0):?>
        <?if($arResult['IBLOCK_SECTION_ID']!=89 && $arResult['IBLOCK_SECTION_ID']!=90){?>
            <div>
                <strong><?echo $arResult['PROPERTIES']['LANG']['NAME']?>:</strong><br />
                <?echo $arResult['PROPERTIES']['LANG']['VALUE']?>
            </div>
        <?}?>
        <?echo $arResult["~DETAIL_TEXT"];?>
    <?else:?>
        <?echo $arResult["PREVIEW_TEXT"];?>
    <?endif?>
    <div style="clear:both"></div>
    <br />
    <?if(!empty($arResult['PROPERTIES']['ISTOCH']['VALUE'])){?>
        <b>????????????????:</b> <a href="<?=$arResult['PROPERTIES']['ISTOCH']['VALUE']?>"><?=$arResult['PROPERTIES']['ISTOCH']['VALUE']?></a>
        <?}?>

        <?if($arResult['IBLOCK_SECTION_ID']!=89 && $arResult['IBLOCK_SECTION_ID']!=90){?>
            <div>
                ????????????????????????:
                <?if(!empty($arResult['DISPLAY_ACTIVE_FROM'])){?>
                    <?echo $arResult['DISPLAY_ACTIVE_FROM'] ?>
                <?}?>
                <?
                $create_name=$arResult["CREATED_USER_NAME"];
                $create_name=preg_replace('~\(.*\)~ ','',$create_name);
                ?>
                | ??????????:<?=$create_name?>
            </div>
        <?}?>

        <div class="dop-image">
        <? $dopimage = str_replace(',','', $arResult['PROPERTIES']['DOP_PHOTO']['~VALUE']['TEXT'])?>
        <?echo $dopimage ?>
        <?if(count($arResult["MORE_PHOTO"])>0):?>
            <?foreach($arResult["MORE_PHOTO"] as $PHOTO):?>
                <?if($PHOTO["WIDTH"] > 300):?>
                    <? $file = CFile::ResizeImageGet($PHOTO, array('width'=>'100%', 'height'=>'auto'), BX_RESIZE_IMAGE_EXACT, true); ?>
                    <a href="<?=$PHOTO["SRC"]?>" name="more_photo">
                        <img class="drt" border="0" src="<?=$file["src"]?>" width="<?=$file["width"]?>" height="<?=$file["height"]?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>" />
                    </a>
                <?else:?>
                    <a href="<?=$PHOTO["SRC"]?>" name="more_photo">
                        <img border="0" src="<?=$PHOTO["SRC"]?>" width="<?=$PHOTO["WIDTH"]?>" height="<?=$PHOTO["HEIGHT"]?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>" />
                    </a>
                <?endif?>
            <?endforeach?>
        <?endif?>
    </div>
    <?if(array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y")
    {
        ?>
        <div class="news-detail-share" style="float: right;">
            <noindex>
                <script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
                <script src="https://yastatic.net/share2/share.js"></script>
                <div class="ya-share2" data-services="vkontakte,facebook,twitter,lj,linkedin,odnoklassniki,whatsapp,evernote,telegram" data-size="s"></div>
                <?/*
			$APPLICATION->IncludeComponent("bitrix:main.share", "", array(
					"HANDLERS" => $arParams["SHARE_HANDLERS"],
					"PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
					"PAGE_TITLE" => $arResult["~NAME"],
					"SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
					"SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
					"HIDE" => $arParams["SHARE_HIDE"],
				),
				$component,
				array("HIDE_ICONS" => "Y")
			);
			*/?>
            </noindex>
        </div>
        <?
    }
    ?>
</div>