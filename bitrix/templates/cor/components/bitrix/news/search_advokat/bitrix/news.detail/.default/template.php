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
		if($year%10 >5 ||  $year%10 == 0){
			$year = $diff->format('%y'.' лет');				
		}elseif($year%10 ==1){
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
		if($day%100 >4 || $day%10 == 0){
			$day = $diff->format('%d'.' дней');				
		}elseif($day%10 ==1){
			$day = $diff->format('%d'.' день');						
		}else{
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
		if($year2%10 >5 ||  $year2%10 == 0){	
			$year2 = $diff2->format('%y'.' лет');					
		}elseif($year2%10 ==1){	
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
		if($day2%100 >4 ||  $day2%10 == 0){
			$day2 = $diff2->format('%d'.' дней');					
		}elseif($day2%10 ==1){
			$day2 = $diff2->format('%d'.' день');					
		}else{		
			$day2 = $diff2->format('%d'.' дня');				
		}		
	}else{
		$day2="";		
	} 		
?>
<div class="news-detail">

<div class="adv_stats_prof">
<?
$res = CUser::GetByID($arResult['DISPLAY_PROPERTIES']['USER']['VALUE']);
if($ar_res = $res->GetNext())
/*print "<pre>";
print_r($ar_res);
print "</pre>";*/
//$resa = CUser::GetByID($arResult["PROPERTIES"]["USER"]["VALUE"]);
			//if($ar_resta = $resa->GetNext())	
				 $arFilter = Array("IBLOCK_ID"=>16,"PROPERTY_USER"=>$arResult["PROPERTIES"]["USER"]["VALUE"]);	
					$res = CIBlockElement::GetList(Array('SORT' => 'ASC', 'ID' => 'DESC'),$arFilter, false, Array(), Array());				
					while ($ob = $res->GetNextElement()){
						$arFields = $ob->GetFields(); // поля элемента
						$arProps = $ob->GetProperties();
						$ar_res["COUNT"][] = $arFields["ID"];
					}	
?>
<img width="100%" src="<?=CFile::GetPath($ar_res['PERSONAL_PHOTO'])?>" alt="<?=$ar_res['LOGIN']?>"><br>
<span>
<?
if(!empty($ar_res["COUNT"])){
	echo count($ar_res["COUNT"]);
}else{
	echo '0';
}
?>
</span> ответов<br>
<span>0</span> комментариев<br>
<span>0</span> статей<br>
<span>0</span> благодарностей 
<?/*
<a href=""> <?if(!empty($ar_res["UF_ROLE"])){?><?=$ar_res["UF_ROLE"]?><?}?>						  
<?if(!empty($ar_res['LAST_NAME'])){?><?=$ar_res['LAST_NAME']?><?}?>		
<?if(!empty($ar_res['NAME'])){?><?=$ar_res['NAME']?><?}?>	
<?if(!empty($ar_res['SECOND_NAME'])){?><?=$ar_res['SECOND_NAME']?><?}?></a>,<br><?=FormatDate('d F Y',MakeTimeStamp($arResult['DISPLAY_PROPERTIES']['PUBLIC_DATE']['VALUE']), time())?>
<div class="contacts">		
<?if(!empty($ar_res['PERSONAL_PHONE'])){?>			
				<span>Телефон:</span><?=$ar_res['PERSONAL_PHONE']?><br>
<?}?>	
<?if(!empty($ar_res['UF_SKYPE'])){?>					
				<span>Skype:</span><?=$ar_res['UF_SKYPE']?><br>
<?}?>	
<?if(!empty($ar_res['PERSONAL_ICQ'])){?>					
				<span>ISQ:</span><?=$ar_res['PERSONAL_ICQ']?><br>
<?}?>				
</div>
<div class="collegies">
<?if(!empty($ar_res['UF_COLLEGIA'])){?>					
				<a href=""><?=$ar_res['UF_COLLEGIA']?></a><?if(!empty($ar_res['UF_BURO'])){?>,<?}?>			
<?}?>
<?if(!empty($ar_res['UF_BURO'])){?>					
				<a href=""><?=$ar_res['UF_BURO']?></a>
<?}?>			
</div>
*/?>
</div>	
<?if(!empty($ar_res['PERSONAL_PHONE'])){?>	
	<div class="field field-name-field-phone field-type-text field-label-inline clearfix">
		<div class="field-label">Телефон:&nbsp;</div>
		<div class="field-items">
			<div class="field-item even"><?=$ar_res['PERSONAL_PHONE']?></div>
		</div>
	</div>
<?}?>	
<?if(!empty($arResult['PROPERTIES']["NOM_LIC"]["VALUE"])){?>	
	<div class="field field-name-field-phone field-type-text field-label-inline clearfix">
		<div class="field-label"><?=$arResult['PROPERTIES']["NOM_LIC"]["NAME"]?>:&nbsp;</div>
		<div class="field-items">
			<div class="field-item even"><?=$arResult['PROPERTIES']["NOM_LIC"]["VALUE"]?></div>
		</div>
	</div>	
<?}?>	
<?if(!empty($arResult['PROPERTIES']['DATA_LIC']["VALUE"])){?>	
	<div class="field field-name-field-phone field-type-text field-label-inline clearfix">
		<div class="field-label"><?=$arResult['PROPERTIES']["DATA_LIC"]["NAME"]?>:&nbsp;</div>
		<div class="field-items">
			<div class="field-item even"><?=FormatDate('d F Y',MakeTimeStamp($arResult['PROPERTIES']['DATA_LIC']["VALUE"]), time())?></div>
		</div>
	</div>	
<?}?>	
<?if(!empty($arResult['PROPERTIES']['REG_NOM']["VALUE"])){?>	
	<div class="field field-name-field-phone field-type-text field-label-inline clearfix">
		<div class="field-label"><?=$arResult['PROPERTIES']["REG_NOM"]["NAME"]?>:&nbsp;</div>
		<div class="field-items">
			<div class="field-item even"><?=$arResult['PROPERTIES']["REG_NOM"]["VALUE"]?></div>
		</div>
	</div>	
<?}?>	
<?if(!empty($arResult['PROPERTIES']['NOM_MEDIAT']["VALUE"])){?>	
	<div class="field field-name-field-phone field-type-text field-label-inline clearfix">
		<div class="field-label"><?=$arResult['PROPERTIES']["NOM_MEDIAT"]["NAME"]?>:&nbsp;</div>
		<div class="field-items">
			<div class="field-item even"><?=$arResult['PROPERTIES']["NOM_MEDIAT"]["VALUE"]?></div>
		</div>
	</div>	
<?}?>
<?if(!empty($arResult['PROPERTIES']['DATA_YUR']["VALUE"])){?>
<??>
	<div class="field field-name-field-phone field-type-text field-label-inline clearfix">
		<div class="field-label">Стаж работы по специальности:&nbsp;</div>
		<div class="field-items">
			<div class="field-item even"><?//=$arResult['PROPERTIES']["DATA_YUR"]["VALUE"]?>
			<?=$year." ".$month." ".$day; ?>				
			</div>
		</div>
	</div>	
<?}?>	



<?if(!empty($arResult['PROPERTIES']['DATA_ADV']["VALUE"])){
	?>	
	<div class="field field-name-field-phone field-type-text field-label-inline clearfix">
		<div class="field-label">Стаж работы в адвокатуре:&nbsp;</div>
		<div class="field-items">
			<div class="field-item even">
			<?//=$year." ".$month; //=FormatDate("Ydiff", MakeTimeStamp($arResult['PROPERTIES']['DATA_ADV']["VALUE"], CSite::GetDateFormat()));?>
			<?=$year2." ".$month2." ".$day2; ?>				
			</div>
		</div>
	</div>	
<?}?>	
<?if(!empty($arResult['PROPERTIES']['SFERA']["VALUE"])){
	?>	
	<div class="field field-name-field-phone field-type-text field-label-inline clearfix">
		<div class="field-label"><?=$arResult['PROPERTIES']["SFERA"]["NAME"]?>:&nbsp;</div>
		<div class="field-items">
			<div class="field-item even"><?=$arResult['PROPERTIES']["SFERA"]["VALUE"]["TEXT"]?></div>			
		</div>
	</div>	
<?}?>
<?if(!empty($arResult['PROPERTIES']['DOP_SFERA']["VALUE"])){
	?>	
	<div class="field field-name-field-phone field-type-text field-label-inline clearfix">
		<div class="field-label"><?=$arResult['PROPERTIES']["DOP_SFERA"]["NAME"]?>:&nbsp;</div>
		<div class="field-items">
			<div class="field-item even"><?=$arResult['PROPERTIES']["DOP_SFERA"]["VALUE"]["TEXT"]?></div>			
		</div>
	</div>	
<?}?>
<?if(!empty($arResult['PROPERTIES']['SITE_LINK']["VALUE"])){
	?>	
	<div class="field field-name-field-phone field-type-text field-label-inline clearfix">
		<div class="field-label"><?=$arResult['PROPERTIES']["SITE_LINK"]["NAME"]?>:&nbsp;</div>
		<div class="field-items">
			<div class="field-item even"><a href="<?=$arResult['PROPERTIES']["SITE_LINK"]["VALUE"]?>"><?=$arResult['PROPERTIES']["SITE_LINK"]["VALUE"]?></a></div>			
		</div>
	</div>	
<?}?>
<?if(!empty($arResult['PROPERTIES']['LANG']["VALUE"])){
	?>	
	<div class="field field-name-field-phone field-type-text field-label-inline clearfix">
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
<div class="field field-name-field-phone field-type-text field-label-inline clearfix">
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
<div class="field field-name-field-phone field-type-text field-label-inline clearfix">
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
<div class="field field-name-field-phone field-type-text field-label-inline clearfix">
	<div class="field-label"><?=$arResult['PROPERTIES']['ZAM_CONS']['NAME']?>:&nbsp;</div>
	<div class="field-items">
		<div class="field-item even">
			<a href="/kollegies/<?=$section['CODE']?>/"><?=$section['NAME']?></a>
		</div>
	</div>
</div>					
<?}}}?>
<?
/*
print "<pre>";
print_r($arResult['PROPERTIES']['SFERA']);
print "</pre>";
*/
?>	
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
<?php/*
print "<pre>";
print_r($arResult["MORE_PHOTO"]);
print "</pre>";*/
?>
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
	<?/*foreach($arResult["FIELDS"] as $code=>$value):
		if ('PREVIEW_PICTURE' == $code || 'DETAIL_PICTURE' == $code)
		{
			?><?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?
			if (!empty($value) && is_array($value))
			{
				?><img border="0" src="<?=$value["SRC"]?>" width="<?=$value["WIDTH"]?>" height="<?=$value["HEIGHT"]?>"><?
			}
		}
		else
		{
			?><?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?><?
		}
		?><br />
	<?endforeach;
	foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>

		<?=$arProperty["NAME"]?>:&nbsp;
		<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
			<?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
		<?else:?>
			<?=$arProperty["DISPLAY_VALUE"];?>
		<?endif?>
		<br />
	<?endforeach;*/
	/*if(array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y")
	{
		?>
		<div class="news-detail-share" style="float: left;width: 20%;">
			<noindex>
			<?
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
			?>
			</noindex>
		
		</div>
		<?
	}
	*/?>
	<?/*<a href="" title="Читать последние записи в блоге пользователя <?=$ar_res['LOGIN']?>.">Блог						  
				  <?if(!empty($ar_res['LAST_NAME'])){?>
					<?=$ar_res['LAST_NAME']?>
				  <?}?>		
				  <?if(!empty($ar_res['NAME'])){?>
					<?=$ar_res['NAME']?>
				  <?}?>	
				  <?if(!empty($ar_res['SECOND_NAME'])){?>
					<?=$ar_res['SECOND_NAME']?>
				  <?}?>
	</a>*/?>	
</div>
<?


				 $arFilter = Array("IBLOCK_ID"=>15, /*"ID"=>$ElementID*/);
					$res = CIBlockElement::GetList(Array(), $arFilter);
					while ($ob = $res->GetNextElement()){;
						$arFields = $ob->GetFields(); // поля элемента
						$arProps = $ob->GetProperties(); // свойства элемента
						
			if(in_array($arResult['PROPERTIES']["USER"]["VALUE"],$arProps["ADVOKATS"]["VALUE"])){?>		
<h2><a href="<?=$arFields["DETAIL_PAGE_URL"]?>"><?=$arFields["NAME"]?></a></h2>			
<div class="field field-name-field-phone field-type-text field-label-inline clearfix">
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
<?$db_list = CIBlockSection::GetList(array(), array('GLOBAL_ACTIVE' => 'Y', "IBLOCK_ID" => 15), true, array("ID", "NAME","UF_S_OLD_ID","SECTION_PAGE_URL","SECTION_ID"));
		while($section = $db_list->Fetch()) {
			if(strpos($arFields["DETAIL_PAGE_URL"], $section['CODE'])){?>
		<h2><a href="/kollegies/<?=$section['CODE']?>/"><?=$section['NAME']?></a></h2>		
<?}}?>			
				
<?				
			}


					   }
					   

/*					   
print "<pre>";
print_r($arFilter);
print "</pre>";		*/			   
?>

<div id="block-views-user-page-block-1" class="block block-views contextual-links-region first last odd">
<?					
if(!empty($ar_resta["COUNT"])){	?><h2 class="block-title">Ответы на вопросы</h2><?}?>		
     <div class="view-content">	<?
			$resq = CUser::GetByID($arResult["PROPERTIES"]["USER"]["VALUE"]);
			if($ar_rest = $resq->GetNext())	
				 //$arSort = array('SORT' => 'ASC', 'ID' => 'DESC');				
				 $arFilter = Array("IBLOCK_ID"=>16,"PROPERTY_USER"=>$arResult["PROPERTIES"]["USER"]["VALUE"]);
					//$res = CIBlockElement::GetList(Array(), $arFilter);
					$rest = CIBlockElement::GetList(Array('SORT' => 'ASC', 'ID' => 'DESC'),$arFilter, false, Array(), Array());				
					while ($ob = $rest->GetNextElement()){
						$arFields = $ob->GetFields(); // поля элемента
						$arProps = $ob->GetProperties(); // свойства элемента	
/*print "<pre>";
print_r($ar_rest["COUNT"]);
print "</pre>";	*/											
						$ar_rest["Q_LINKS"]=$arFields["DETAIL_PAGE_URL"];
						$ar_rest["Q_NAMES"]=$arFields["NAME"];
						$ar_rest["Q_TEXT"]=$arFields["~DETAIL_TEXT"];
						$ar_rest["COUNT"][] = $arFields["ID"];
						$arResult["COUNT"][] = $arFields["ID"];
/*print "<pre>";
print_r($ar_rest["COUNT"]);
print "</pre>";*/		?>	

		<div class="views-row views-row-3">   
			  <div class="views-field views-field-title">
				  <span class="field-content">
					<a href="<?=$ar_rest["Q_LINKS"]?>" ><?=$ar_rest["Q_NAMES"]?></a>
				  </span>  
			  </div>  
			  <div class="views-field views-field-body">        
				  <div class="field-content">
						<?=$ar_rest["Q_TEXT"]?>
				  </div> 
			  </div>  
		</div>				
					<?}?>


	</div>	
<?if(!empty($ar_rest["COUNT"])){	?>
<div class="more-link" style="text-align: right;" >
  <a href="" style="color: white!important;">Все вопросы</a>
</div>	
<div class="view-footer">Всего ответов:<?=count($ar_rest["COUNT"])?></div>
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