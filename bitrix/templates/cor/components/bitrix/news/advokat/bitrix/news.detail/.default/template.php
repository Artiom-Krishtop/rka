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

$date2 = date("d.m.Y");
$dater1 = date_create($date2);
$dater2 = date_create($arResult['PROPERTIES']["DATA_YUR"]["VALUE"]);
$diff = date_diff($dater1, $dater2);
$year = $diff->format('%y');
$month = $diff->format('%m');
$day = $diff->format('%d');
if ($year!=0){
    if($year%10 >5 ||  $year%10 == 0 ||  $year == 11 || $year == 12 || $year == 13 || $year == 14 || preg_match("/(5|6|7|8|9|0)$/",$year)){
        $year = $diff->format('%y'.' лет');
    }elseif($year%10 ==1 || preg_match("|(1)$|",$year)){
        $year = $diff->format('%y'.' год');
    }else{
        $year = $diff->format('%y'.' года');
    }
}else{
    $year="";
}
if ($month!=0){
    if($month%10 >4 ||  $month%10 == 0 ||  $month == 11||  $month == 12){
        $month = $diff->format('%m'.' месяцев');
    }elseif($month%10 ==1){
        $month = $diff->format('%m'.' месяц');
    }else{
        $month = $diff->format('%m'.' месяца');
    }
}else{
    $month="";
}
if ($day!=0){
    if($day == 11 || $day == 12 || $day == 13 || $day == 14 || preg_match("/(5|6|7|8|9|0)$/",$day)){
        $day = $diff->format('%d'.' дней');
    }elseif($day%10 ==1 || preg_match("|(1)$|",$day)){
        $day = $diff->format('%d'.' день');
    }elseif(preg_match("/(2|3|4)$/",$day)){
        $day = $diff->format('%d'.' дня');
    }
}else{
    $day="";
}

$dater3 = date_create($arResult['PROPERTIES']["DATA_ADV"]["VALUE"]);
$diff2 = date_diff($dater1, $dater3);
$year2 = $diff2->format('%y');
$month2 = $diff2->format('%m');
$day2 = $diff2->format('%d');
if ($year2!=0){
    if($year2%10 >5 ||  $year2%10 == 0 ||  $year2 == 11 || $$year2 == 12 || $year2 == 13 || $year2 == 14 || preg_match("/(5|6|7|8|9|0)$/",$year2)){
        $year2 = $diff2->format('%y'.' лет');
    }elseif($year2%10 ==1 || preg_match("|(1)$|",$year2)){
        $year2 = $diff2->format('%y'.' год');
    }else{
        $year2 = $diff2->format('%y'.' года');
    }
}else{
    $year2="";
}
if ($month2!=0){
    if($month2%10 >4 ||  $month2%10 == 0 ||  $month2 == 11||  $month2 == 12){
        $month2 = $diff2->format('%m'.' месяцев');
    }elseif($month2%10 ==1){
        $month2 = $diff2->format('%m'.' месяц');
    }else{
        $month2 = $diff2->format('%m'.' месяца');
    }
}else{
    $month2="";
}
if ($day2!=0){
    if($day2 == 11 || $day2 == 12 || $day2 == 13 || $day2 == 14 || preg_match("/(5|6|7|8|9|0)$/",$day2)){
        $day2 = $diff2->format('%d'.' дней');
    }elseif($day%10 ==1 || preg_match("|(1)$|",$day2)){
        $day2 = $diff2->format('%d'.' день');
    }elseif(preg_match("/(2|3|4)$/",$day2)){
        $day2 = $diff2->format('%d'.' дня');
    }
}else{
    $day2="";
}

if(strpos($arResult['PREVIEW_PICTURE']['SRC'], 'picture-default'))
{
    $ptime = getmicrotime();
    $io = CBXVirtualIo::GetInstance();
    if($arResult["PREVIEW_PICTURE"]["HEIGHT"] < 250 || $arResult["PREVIEW_PICTURE"]["WIDTH"] < 250)
    {
        CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/upload/picture-default.jpg", $_SERVER["DOCUMENT_ROOT"].$arResult["PREVIEW_PICTURE"]["SRC"]);

        $ToResizeImg = $_SERVER["DOCUMENT_ROOT"].$arResult["PREVIEW_PICTURE"]["SRC"];
        $tempFile = $_SERVER['DOCUMENT_ROOT']. '/upload/' .$arResult["PREVIEW_PICTURE"]["SUBDIR"]. 'temp.jpg';

        $rif = CFile::ResizeImageFile(
            $ToResizeImg,
            $tempFile,
            array('width' => 250,'height' => 250),
            BX_RESIZE_IMAGE_PROPORTIONAL,
            array(),
            false,
            false
        );

        if ($rif)
        {
            $arImageSize = CFile::GetImageSize($tempFile);

            $f = $io->GetFile($tempFile);
            $arImageSize[2] = $f->GetFileSize();

            unlink($ToResizeImg);
            rename($tempFile, $ToResizeImg);

            $DB->Query("UPDATE b_file SET FILE_SIZE='".round(floatval($arImageSize[2]))."', HEIGHT='".round(floatval($arImageSize[1]))."', WIDTH='".round(floatval($arImageSize[0]))."' WHERE ID=".intval($arResult["PREVIEW_PICTURE"]["ID"]));

        }
    }
}
?>
<div class="news-detail profile">
    <div class="adv_stats_prof">
            <? if(!empty($arResult['PREVIEW_PICTURE'])) {?>    
                <img width="100%" src="<?=$arResult['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arResult['NAME']?>">
            <?}?>         
            <?  
            global $USER;
            if(CUser::IsOnLine($arResult['DISPLAY_PROPERTIES']['USER']['VALUE'], 120)) {?>
                <div class="online">сейчас на сайте</div>
            <?}?>
        <div><?
                if(!empty($arResult["COUNT_OTVET"])){
                    if(preg_match("/(5|6|7|8|9|0|11|12|13|14)$/",$arResult["COUNT_OTVET"])){
                        $comment='ответов';
                    }elseif(preg_match("|(1)$|",$arResult["COUNT_OTVET"])){
                        $comment='ответ';
                    }elseif(preg_match("/(2|3|4)$/",$arResult["COUNT_OTVET"])){
                        $comment='ответа';
                    }
                    echo "<span>".$arResult["COUNT_OTVET"]."</span> ".$comment;
                }else{
                    echo "<span>0</span> ответов";
                }?><br>
            <?
            if(!empty($arResult["COUNT_COMMENT"])){
                if(preg_match("/(5|6|7|8|9|0|11|12|13|14)$/",$arResult["COUNT_COMMENT"])){
                    $comment='комментариев';
                }elseif(preg_match("|(1)$|",$arResult["COUNT_COMMENT"])){
                    $comment='комментарий';
                }elseif(preg_match("/(2|3|4)$/",$arResult["COUNT_COMMENT"])){
                    $comment='комментария';
                }
                echo "<span>".$arResult["COUNT_COMMENT"]."</span> ".$comment;
            }else{
                echo "<span>0</span> комментариев";
            }?><br>
            <?
            if(!empty($arResult["COUNT_BLOG"])){
                if(preg_match("/(5|6|7|8|9|0|11|12|13|14)$/",$arResult["COUNT_BLOG"])){
                    $comment='статей';
                }elseif(preg_match("|(1)$|",$arResult["COUNT_BLOG"])){
                    $comment='статья';
                }elseif(preg_match("/(2|3|4)$/",$arResult["COUNT_BLOG"])){
                    $comment='статьи';
                }
                echo "<span>".$arResult["COUNT_BLOG"]."</span> ".$comment;
            }else{
                echo "<span>0</span> статей";
            }?><br>
            <?
            if(!empty($arResult['PROPERTIES']["BLAGOD"]["VALUE"])){
                if(preg_match("/(5|6|7|8|9|0|11|12|13|14)$/",$arResult['PROPERTIES']["BLAGOD"]["VALUE"])){
                    $comment='благодарностей';
                }elseif(preg_match("|(1)$|",$arResult['PROPERTIES']["BLAGOD"]["VALUE"])){
                    $comment='благодарность';
                }elseif(preg_match("/(2|3|4)$/",$arResult['PROPERTIES']["BLAGOD"]["VALUE"])){
                    $comment='благодарности';
                }
                echo "<span>".$arResult['PROPERTIES']["BLAGOD"]["VALUE"]."</span> ".$comment;
            }else{
                echo "<span>0</span> благодарностей";
            }
             ?>
        </div>
    </div>	
    <?if(!empty($arResult['PROPERTIES']["PHONE"]["VALUE"])){?>
        <div class="field field-name-field-phone field-type-text field-label-inline">
            <div class="field-label">Телефон:&nbsp;</div>
            <div class="field-items">
                <div class="field-item even"><?=$arResult['PROPERTIES']["PHONE"]["VALUE"]?></div>
            </div>
        </div>
    <?}?>
    <?if(!empty($arResult['PROPERTIES']["EMAIL"]["VALUE"])){?>
        <div class="field field-name-field-phone field-type-text field-label-inline">
            <div class="field-label"><?=$arResult['PROPERTIES']["EMAIL"]["NAME"]?>:&nbsp;</div>
            <div class="field-items">
                <div class="field-item even"><a href="mailto:<?=$arResult['PROPERTIES']["EMAIL"]["VALUE"]?>"><?=$arResult['PROPERTIES']["EMAIL"]["VALUE"]?></a></div>
            </div>
        </div>
    <?}?>
    <?if(!empty($arResult['PROPERTIES']["SKYPE"]["VALUE"])){?>
        <div class="field field-name-field-phone field-type-text field-label-inline">
            <div class="field-label"><?=$arResult['PROPERTIES']["SKYPE"]["NAME"]?>:&nbsp;</div>
            <div class="field-items">
                <div class="field-item even"><?=$arResult['PROPERTIES']["SKYPE"]["VALUE"]?></div>
            </div>
        </div>
    <?}?>
    <?if(!empty($arResult['PROPERTIES']["ISQ"]["VALUE"])){?>
        <div class="field field-name-field-phone field-type-text field-label-inline">
            <div class="field-label"><?=$arResult['PROPERTIES']["ISQ"]["NAME"]?>:&nbsp;</div>
            <div class="field-items">
                <div class="field-item even"><?=$arResult['PROPERTIES']["ISQ"]["VALUE"]?></div>
            </div>
        </div>
    <?}?>
    <?if(!empty($arResult['PROPERTIES']["NOM_LIC"]["VALUE"])){?>	
        <div class="field field-name-field-phone field-type-text field-label-inline">
            <div class="field-label"><?=$arResult['PROPERTIES']["NOM_LIC"]["NAME"]?>:&nbsp;</div>
            <div class="field-items">
                <div class="field-item even"><?=$arResult['PROPERTIES']["NOM_LIC"]["VALUE"]?></div>
            </div>
        </div>	
    <?}?>	
    <?if(!empty($arResult['PROPERTIES']['DATA_LIC']["VALUE"])){?>	
        <div class="field field-name-field-phone field-type-text field-label-inline">
            <div class="field-label"><?=$arResult['PROPERTIES']["DATA_LIC"]["NAME"]?>:&nbsp;</div>
            <div class="field-items">
                <div class="field-item even"><?=FormatDate('d F Y',MakeTimeStamp($arResult['PROPERTIES']['DATA_LIC']["VALUE"]), time())?></div>
            </div>
        </div>	
    <?}?>	
    <?if(!empty($arResult['PROPERTIES']['REG_NOM']["VALUE"])){?>	
        <div class="field field-name-field-phone field-type-text field-label-inline">
            <div class="field-label"><?=$arResult['PROPERTIES']["REG_NOM"]["NAME"]?>:&nbsp;</div>
            <div class="field-items">
                <div class="field-item even"><?=$arResult['PROPERTIES']["REG_NOM"]["VALUE"]?></div>
            </div>
        </div>	
    <?}?>	
    <?if(!empty($arResult['PROPERTIES']['NOM_MEDIAT']["VALUE"])){?>	
        <div class="field field-name-field-phone field-type-text field-label-inline">
            <div class="field-label"><?=$arResult['PROPERTIES']["NOM_MEDIAT"]["NAME"]?>:&nbsp;</div>
            <div class="field-items">
                <div class="field-item even"><?=$arResult['PROPERTIES']["NOM_MEDIAT"]["VALUE"]?></div>
            </div>
        </div>	
    <?}?>
    <?if(!empty($arResult['PROPERTIES']['DATA_YUR']["VALUE"])){?>
        <div class="field field-name-field-phone field-type-text field-label-inline">
            <div class="field-label">Стаж работы по специальности:&nbsp;</div>
            <div class="field-items">
                <div class="field-item even"><?//=$arResult['PROPERTIES']["DATA_YUR"]["VALUE"]?>
                <?=$year." ".$month." ".$day; ?>				
                </div>
            </div>
        </div>	
    <?}?>	
    <?if(!empty($arResult['PROPERTIES']['DATA_ADV']["VALUE"])){?>	
        <div class="field field-name-field-phone field-type-text field-label-inline">
            <div class="field-label">Стаж работы в адвокатуре:&nbsp;</div>
            <div class="field-items">
                <div class="field-item even">
                <?=$year2." ".$month2." ".$day2; ?>				
                </div>
            </div>
        </div>	
    <?}?>	
    <?if(!empty($arResult['PROPERTIES']['SFERA_DET']["VALUE"])){?>	   
        <div class="field field-name-field-phone field-type-text field-label-inline">
            <div class="field-label"><?=$arResult['PROPERTIES']["SFERA_DET"]["NAME"]?>:&nbsp;</div>
            <div class="field-items">
                <div class="field-item even">
                <?foreach($arResult['PROPERTIES']['SFERA_DET']["VALUE"] as $arSfera){ 
                    $resfera = CIBlockElement::GetByID($arSfera);
                    if($ar_resfera = $resfera->GetNext())?>
                    <a style="display:block;" href="<?=$ar_resfera['DETAIL_PAGE_URL']?>"><?=$ar_resfera['NAME']?></a><?}?>               
                </div>			
            </div>
        </div>	
    <?}?>
    <?if(!empty($arResult['PROPERTIES']['DOP_SFERA']["VALUE"])){
        ?>	
        <div class="field field-name-field-phone field-type-text field-label-inline">
            <div class="field-label"><?=$arResult['PROPERTIES']["DOP_SFERA"]["NAME"]?>:&nbsp;</div>
            <div class="field-items">
                <div class="field-item even"><?=$arResult['PROPERTIES']["DOP_SFERA"]["VALUE"]["TEXT"]?></div>			
            </div>
        </div>	
    <?}?>
    <?if(!empty($arResult['PROPERTIES']['SITE_LINK']["VALUE"])){
        ?>	
        <div class="field field-name-field-phone field-type-text field-label-inline">
            <div class="field-label"><?=$arResult['PROPERTIES']["SITE_LINK"]["NAME"]?>:&nbsp;</div>
            <div class="field-items">
                <div class="field-item even"><a href="<?=$arResult['PROPERTIES']["SITE_LINK"]["VALUE"]?>"><?=$arResult['PROPERTIES']["SITE_LINK"]["VALUE"]?></a></div>			
            </div>
        </div>	
    <?}?>
    <?if(!empty($arResult['PROPERTIES']['LANG']["VALUE"])){
        ?>	
        <div class="field field-name-field-phone field-type-text field-label-inline">
            <div class="field-label"><?=$arResult['PROPERTIES']['LANG']["NAME"]?>:&nbsp;</div>
            <div class="field-items">
                <div class="field-item even"><?=$arResult['PROPERTIES']['LANG']["VALUE"]["TEXT"]?></div>			
            </div>
        </div>	
    <?}?>
    <?if($arResult['PROPERTIES']['PREDS']['VALUE']=="да"){?>
        <div class="field field-name-field-phone field-type-text field-label-inline ">
            <div class="field-label"><?=$arResult['PROPERTIES']['PREDS']['NAME']?>:&nbsp;</div>
            <div class="field-items">
                <div class="field-item even">
                    <a href="<?=$arResult["KOLLEG_LINK"]?>"><?=$arResult["KOLLEG_NAME"]?></a>
                </div>
            </div>
        </div>					
    <?}?>
    <?if($arResult['PROPERTIES']['ZAM_PREDS']['VALUE']=="да"){?>
    <div class="field field-name-field-phone field-type-text field-label-inline">
        <div class="field-label"><?=$arResult['PROPERTIES']['ZAM_PREDS']['NAME']?>:&nbsp;</div>
        <div class="field-items">
            <div class="field-item even">
                <a href="<?=$arResult["KOLLEG_LINK"]?>"><?=$arResult["KOLLEG_NAME"]?></a>
            </div>
        </div>
    </div>					
    <?}?>
    <?if(!empty($arResult['PROPERTIES']['ZAM_CONS']['VALUE'])){
        $db_list = CIBlockSection::GetList(array(), array('GLOBAL_ACTIVE' => 'Y', "IBLOCK_ID" => 15), true, array("ID", "NAME","UF_S_OLD_ID","SECTION_PAGE_URL"));
            while($section = $db_list->Fetch()) {
            $filter = $section['UF_S_OLD_ID'];	
            if($section['UF_S_OLD_ID'] == $arResult['PROPERTIES']['ZAM_CONS']['VALUE']){?>
    <div class="field field-name-field-phone field-type-text field-label-inline">
        <div class="field-label"><?=$arResult['PROPERTIES']['ZAM_CONS']['NAME']?>:&nbsp;</div>
        <div class="field-items">
            <div class="field-item even">
                <a href="/kollegies/<?=$section['CODE']?>/"><?=$section['NAME']?></a>
            </div>
        </div>
    </div>					
    <?}}}?>
	<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
		<span class="news-date-time"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></span>
	<?endif;?>
	<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arResult["FIELDS"]["PREVIEW_TEXT"]):?>
		<p><?=$arResult["FIELDS"]["PREVIEW_TEXT"];unset($arResult["FIELDS"]["PREVIEW_TEXT"]);?></p>
	<?endif;?>
	<?if($arResult["NAV_RESULT"]):?>
		<?if($arParams["DISPLAY_TOP_PAGER"]):?><?=$arResult["NAV_STRING"]?><br /><?endif;?>
		<?echo $arResult["NAV_TEXT"];?>
		<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?endif;?>
	<?elseif(strlen($arResult["DETAIL_TEXT"])>0):?>

		<div style="float:left">
            <?echo $arResult["~DETAIL_TEXT"];?></div>
	<?else:?>
		<?echo $arResult["PREVIEW_TEXT"];?>
	<?endif?>
	<div style="clear:both"></div>
	<br />
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
</div>
                <h2><a href="<?=$arResult["UR_LINK"]?>"><?=$arResult["UR_NAME"]?></a></h2>
                <div class="field  field-type-text field-label-inline clearfix">
                    <?if(!empty($arResult["UR_PHONE"])){?>
                    <div class="field-label">Телефон:&nbsp;</div>
                    <div class="field-items">
                        <div class="field-item even" property="schema:telephone"><?=$arResult["UR_PHONE"]?></div>
                    </div>
                    <?}?>	
                </div>
                <div class="field field-name-field-adress field-type-addressfield field-label-inline clearfix">
                    <?if(!empty($arResult["UR_ADRESS"])){?>
                    <div class="field-label">Адрес:&nbsp;</div>
                    <div class="field-items">
                        <?echo $arResult["UR_ADRESS"];?>
                    </div>
                    <?}?>
                </div>
                <div class="field field-name-field-adress field-type-addressfield field-label-inline clearfix">
                    <?if(!empty($arResult["UR_WEBSITE"])){?>
                    <div class="field-label">Веб-сайт:&nbsp;</div>
                    <div class="field-items">
                        <div class="field-item even" property="schema:telephone"><?=$arResult["UR_WEBSITE"]?></div>
                    </div>
                    <?}?>	
                </div>
                <?if(!empty($arResult["UR_MAP"])){?>
                <div class="field field-name-field-maps field-type-field-yamaps field-label-hidden">
                    <div class="field-items">
                        <div class="field-item even">
                            <? $arProperty = $arResult["DISPLAY_PROPERTIES"]; ?> 
                            <? if (!empty($arResult["UR_MAP"])):?>
                            <? $arPos = explode(",", $arResult["UR_MAP"]);?>
                            <div class="yandexmapa"> 
                            <?$APPLICATION->IncludeComponent( 
                            "bitrix:map.yandex.view", 
                            "detail", 
                            Array( 
                            "INIT_MAP_TYPE" => "MAP", 
                            "MAP_DATA" => serialize(array( 
                            'yandex_lat' => $arPos[0], 
                            'yandex_lon' => $arPos[1], 
                            'yandex_scale' => 15, 
                            'PLACEMARKS' => array ( 
                            array( 
                            'TEXT' => $arResult["UR_NAME"],
                            'LON' => $arPos[1], 
                            'LAT' => $arPos[0], 
                            ), 
                            ), 
                            )), 
                            "MAP_WIDTH" => "100%", 
                            "MAP_HEIGHT" => "300", 
                            "CONTROLS" => array("ZOOM", "MINIMAP", "TYPECONTROL", "SCALELINE"), 
                            "OPTIONS" => array("DESABLE_SCROLL_ZOOM", "ENABLE_DBLCLICK_ZOOM", "ENABLE_DRAGGING"), 
                            "MAP_ID" => "" 
                            ), 
                            false 
                            );?> 
                            </div> 
                            <?endif;?>
                        </div>
                    </div>
                </div>
                <?}?>
		<h2><a href="<?=$arResult["KOLLEG_LINK"]?>"><?=$arResult["KOLLEG_NAME"]?></a></h2>
<style>
    .field-name-field-phone .field-label{
        width: 50%;
    }
    .field-name-field-phone .field-items{
        width: 50%;
        text-align: left;
        padding-left: 1%;
    }
    .news-detail .field-type-text.field-label-inline{
        text-align: right;
        display: flex;
        width: 64%;
        /*height: 20px;*/
        margin: 0 auto;
        margin-left: 0px;
    }
</style>