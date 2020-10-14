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
		if($year%10 >5 ||  $year%10 == 0 ||  $year == 11 || $$year == 12 || $year == 13 || $year == 14 || preg_match("/(5|6|7|8|9|0)$/",$year)){
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
?>
<div class="news-detail profile">
<?php /*
print "<pre>";
print_r($arResult);
print "</pre>";*/
?>
    <div class="adv_stats_prof">
            <? if(!empty($arResult['PREVIEW_PICTURE'])) {?>    
                <img width="100%" src="<?=$arResult['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arResult['NAME']?>">
            <?}?>         
            <?  
            global $USER;
            if(CUser::IsOnLine($arResult['DISPLAY_PROPERTIES']['USER']['VALUE'], 10)) {?>
                <div class="online">сейчас на сайте</div>
            <?}?>
            <span><?if(!empty($arResult["COUNT"])){ echo count($arResult["COUNT"]);}else{echo '0';}?></span>
            <?if(preg_match("/(5|6|7|8|9|0|11|12|13|14)$/",count($arResult["COUNT"]))){
                        $comment='ответов';			
                    }elseif(preg_match("|(1)$|",count($arResult["COUNT"]))){
                        $comment='ответ';						
                    }elseif(preg_match("/(2|3|4)$/",count($arResult["COUNT"]))){
                        $comment='ответа';	
                    }   
                    echo $comment;
             ?><br>
            <span>0</span>комментариев<br>
            <span><?if(!empty($arResult["COUNT_BLOG"])){echo count($arResult["COUNT_BLOG"]);}else{echo '0';}?></span>
            <?if(preg_match("/(5|6|7|8|9|0|11|12|13|14)$/",count($arResult["COUNT_BLOG"]))){
                        $comment='статей';			
                    }elseif(preg_match("|(1)$|",count($arResult["COUNT_BLOG"]))){
                        $comment='статья';						
                    }elseif(preg_match("/(2|3|4)$/",count($arResult["COUNT_BLOG"]))){
                        $comment='статьи';	
                    }   
                    echo $comment;
             ?><br>
            <span><?if(!empty($arResult["COUNT_BLAGOD"])){echo $arResult["COUNT_BLAGOD"];}else{echo '0';}?></span>
            <?if(preg_match("/(5|6|7|8|9|0|11|12|13|14)$/",count($arResult["COUNT_BLOG"]))){
                        $comment='благодарностей';			
                    }elseif(preg_match("|(1)$|",count($arResult["COUNT_BLOG"]))){
                        $comment='благодарность';						
                    }elseif(preg_match("/(2|3|4)$/",count($arResult["COUNT_BLOG"]))){
                        $comment='благодарности';	
                    }   
                    echo $comment;
             ?>               
    </div>	
    <?if(!empty($arResult['PERSONAL_PHONE'])){?>	
        <div class="field field-name-field-phone field-type-text field-label-inline">
            <div class="field-label">Телефон:&nbsp;</div>
            <div class="field-items">
                <div class="field-item even"><?=$arResult['PERSONAL_PHONE']?></div>
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
    <?if(!empty($arResult['PROPERTIES']['PREDS']['VALUE'])){
        $db_list = CIBlockSection::GetList(array(), array('GLOBAL_ACTIVE' => 'Y', "IBLOCK_ID" => 15), true, array("ID", "NAME","UF_S_OLD_ID","SECTION_PAGE_URL"));
            while($section = $db_list->Fetch()) {
            $filter = $section['UF_S_OLD_ID'];	
            if($section['UF_S_OLD_ID'] == $arResult['PROPERTIES']['PREDS']['VALUE']){?>
        <div class="field field-name-field-phone field-type-text field-label-inline ">
            <div class="field-label"><?=$arResult['PROPERTIES']['PREDS']['NAME']?>:&nbsp;</div>
            <div class="field-items">
                <div class="field-item even">
                    <a href="/kollegies/<?=$section['CODE']?>/"><?=$section['NAME']?></a>
                </div>
            </div>
        </div>					
    <?}}}?>
    <?if(!empty($arResult['PROPERTIES']['ZAM_PREDS']['VALUE'])){
        $db_list = CIBlockSection::GetList(array(), array('GLOBAL_ACTIVE' => 'Y', "IBLOCK_ID" => 15), true, array("ID", "NAME","UF_S_OLD_ID","SECTION_PAGE_URL"));
            while($section = $db_list->Fetch()) {
            $filter = $section['UF_S_OLD_ID'];	
            if($section['UF_S_OLD_ID'] == $arResult['PROPERTIES']['ZAM_PREDS']['VALUE']){?>
    <div class="field field-name-field-phone field-type-text field-label-inline">
        <div class="field-label"><?=$arResult['PROPERTIES']['ZAM_PREDS']['NAME']?>:&nbsp;</div>
        <div class="field-items">
            <div class="field-item even">
                <a href="/kollegies/<?=$section['CODE']?>/"><?=$section['NAME']?></a>
            </div>
        </div>
    </div>					
    <?}}}?>
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

		<div style="float:left"><?echo $arResult["~DETAIL_TEXT"];?></div>
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
<?  $arFilter = Array("IBLOCK_ID"=>15, /*"ID"=>$ElementID*/);
		$res = CIBlockElement::GetList(Array(), $arFilter);
			while ($ob = $res->GetNextElement()){;
				$arFields = $ob->GetFields(); // поля элемента
				$arProps = $ob->GetProperties(); // свойства элемента
						
			if(in_array($arResult['PROPERTIES']["USER"]["VALUE"],$arProps["ADVOKATS"]["VALUE"])){?>		
                <h2><a href="<?=$arFields["DETAIL_PAGE_URL"]?>"><?=$arFields["NAME"]?></a></h2>			
                <div class="field  field-type-text field-label-inline clearfix">
                    <?if(!empty($arProps["PHONE"]["VALUE"])){?>
                    <div class="field-label">Телефон:&nbsp;</div>
                    <div class="field-items">
                        <div class="field-item even" property="schema:telephone"><?=$arProps["PHONE"]["VALUE"]?></div>
                    </div>
                    <?}?>	
                </div>
                <div class="field field-name-field-adress field-type-addressfield field-label-inline clearfix">
                    <div class="field-label">Адрес:&nbsp;</div>
                    <div class="field-items">
                        <?echo $arFields["~PREVIEW_TEXT"];?>
                    </div>
                </div>
                <div class="field field-name-field-adress field-type-addressfield field-label-inline clearfix">
                    <?if(!empty($arProps["WEBSITE"]["VALUE"])){?>
                    <div class="field-label">Веб-сайт:&nbsp;</div>
                    <div class="field-items">
                        <div class="field-item even" property="schema:telephone"><?=$arProps["WEBSITE"]["VALUE"]?></div>
                    </div>
                    <?}?>	
                </div>			
                <div class="field field-name-field-maps field-type-field-yamaps field-label-hidden">
                    <div class="field-items">
                        <div class="field-item even">
                            <? $arProperty = $arResult["DISPLAY_PROPERTIES"]; ?> 
                            <? if (isset($arProps['MAP'])):?> 
                            <? $arPos = explode(",", $arProps['MAP']['VALUE']);?> 
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
                            'TEXT' => $arFields["NAME"], 
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
<?}}
$db_list = CIBlockSection::GetList(array(), array('GLOBAL_ACTIVE' => 'Y', "IBLOCK_ID" => 15), true, array("ID", "NAME","UF_S_OLD_ID","SECTION_PAGE_URL","SECTION_ID"));
		while($section = $db_list->Fetch()) {    
			if($arResult["PROPERTIES"]["KOLLEG"]["VALUE"]==$section['NAME']){?>
		<h2><a href="/kollegies/<?=$section['CODE']?>/"><?=$section['NAME']?></a></h2>	     
<?}}?>

<div id="block-views-user-page-block-1" class="block block-views contextual-links-region first last odd">

<?
print "<pre>";
print_r($arResult["COUNT_ACTIVE"]);
print "</pre>";
if(!empty($arResult["NAV_COUNT"])){	?><h2 class="block-title">Ответы на вопросы</h2><?}?>
                     <div class="view-content">
                    <?foreach($arResult["QUESTION"] as $q => $arQuest){	?>
                         <?if($arQuest["Q_ACTIVE"]=="Y"){	?>
                             <div class="views-row views-row-3">
                              <div class="views-field views-field-title">
                                  <span class="field-content">
                                    <a href="<?=$arQuest["Q_LINKS"]?>" ><?=$arQuest["Q_NAMES"]?></a>
                                  </span>  
                              </div>  
                              <div class="views-field views-field-body">        
                                  <div class="field-content">
                                        <?=$arQuest["Q_TEXT"]?>
                                  </div> 
                              </div>  
                        </div>

                     <?}}?>
                        <?echo $arResult["NAV_STR"];?>
                    </div>	
	
        <?if(!empty($arResult["NAV_COUNT"])){	?>
            <div class="more-link" style="text-align: right;" >
              <a href="/question/" style="color: white!important;">Все вопросы</a>
            </div>	
            <div class="view-footer">Всего ответов:<?=$arResult["NAV_COUNT"]?></div>
        <?}?>
</div>

<div id="block-views-user-page-block-1" class="block block-views contextual-links-region first last odd">
<?					if(!empty($arResult["COUNT_BLOG"])){	?><h2 class="block-title">Блог</h2><?}?>	
                     <div class="view-content">
                    <?foreach($arResult["BLOG"] as $ber => $arBlo){	?>	                     
                        <div class="views-row views-row-3">   
                              <div class="views-field views-field-title">
                                  <span class="field-content">
                                    <a href="<?=$arBlo["Q_LINKS"]?>" ><?=$arBlo["Q_NAMES"]?></a>
                                  </span>  
                              </div>  
                              <div class="views-field views-field-body">        
                                  <div class="field-content">
                                        <?=substr($arBlo["Q_TEXT"],0,200);?>...
                                  </div> 
                              </div>  
                        </div>	
                     <?}?>   
                        <?echo $arResult["NAV_STRB"];?>
                    </div>	
	
        <?if(!empty($arResult["NAV_COUNTB"])){	?>
            <?$link_blog = '?blog='.$arResult['DISPLAY_PROPERTIES']['USER']['VALUE'].'';?>
            <div class="more-link" style="text-align: right;" >
              <a href="/blogs/<?=$link_blog?>" style="color: white!important;">Читать блог</a>
            </div>	
            <div class="view-footer">Всего статей:<?=$arResult["NAV_COUNTB"]?></div>
        <?}?>
</div>			

<style>
.field-name-field-phone .field-label{
    width: 240px;	
}
.field-name-field-phone .field-items{
	width: 272px;
    text-align: left;
}
.news-detail .field-type-text.field-label-inline{
	text-align: right;
    display: block;
    width: 65%;
    height: 20px;
    margin: 0 auto;	
	margin-left: 0px;	
}
</style>