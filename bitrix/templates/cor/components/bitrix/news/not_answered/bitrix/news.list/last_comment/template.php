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
use Bitrix\Main\Type\DateTime;
?>
<h2 class="block-title">Последние комментарии</h2>
<div class="news-list">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>

	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

    $date2 = date("d.m.Y H:i:s");
    $dater1 = date_create($date2);
   /* if(!empty($arItem["PROPERTIES"]["PUBLIC_DATE"]["VALUE"])){
        $dater2 = date_create($arItem["PROPERTIES"]["PUBLIC_DATE"]["VALUE"]);
    }else{*/
        $dater2 = date_create($arItem["DISPLAY_ACTIVE_FROM"]);
   // }
    $diff = date_diff($dater1, $dater2);
    $year = $diff->format('%y');
    $month = $diff->format('%m');
    $day = $diff->format('%d');
    $hour = $diff->format('%h');
    $minuts = $diff->format('%i');

    if ($day!=0){
        if($day%10 >5 ||  $day%10 == 0 ||  $day == 11 || $day == 12 || $day == 13 || $day == 14 || preg_match("/(5|6|7|8|9|0)$/",$day)){
            $day = $diff->format('%d'.' дней');
        }elseif($day%10 ==1 || preg_match("|(1)$|",$day)){
            $day = $diff->format('%d'.' день');
        }else{
            $day = $diff->format('%d'.' дня');
        }
    }else{
        $day="";
    }
    if ($hour!=0){
        if($hour == 11 || $hour == 12 || $hour == 13 || $hour == 14 || preg_match("/(5|6|7|8|9|0)$/",$hour)){
            $hour = $diff->format('%h'.' часов');
        }elseif($hour%10 ==1 || preg_match("|(1)$|",$hour)){
            $hour = $diff->format('%h'.' час');
        }else{
            $hour = $diff->format('%h'.' часа');
        }
    }else{
        $hour="";
    }
    if ($minuts!=0){
        if($minuts%10 >5 ||  $minuts%10 == 0 ||  $minuts == 11 || $minuts == 12 || $minuts == 13 || $minuts == 14 || preg_match("/(5|6|7|8|9|0)$/",$minuts)){
            $minuts = $diff->format('%i'.' минут');
        }elseif($minuts%10 ==1 || preg_match("|(1)$|",$minuts)){
            $minuts = $diff->format('%i'.' минуту');
        }else{
            $minuts = $diff->format('%i'.' минуты');
        }
    }else{
        $minuts="";
    }


	?>
	<div class="news-item" style="margin: 10px 0px 10px 0px;" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
				<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><b><?echo $arItem["NAME"]?></b></a><br />
			<?else:?>
				<b><?echo $arItem["NAME"]?></b><br />
			<?endif;?>
		<?endif;?>
        <?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
            <span class="news-date-time"><?echo $day ." ".$hour ." ". $minuts. " назад";?></span>
        <?endif?>
		<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
			<?echo $arItem["~DETAIL_TEXT"];?>
		<?endif;?>
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<div style="clear:both"></div>
		<?endif?>
	</div>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
