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
<?/*<div class="submitted-faq">
<?
$res = CUser::GetByID($arResult['DISPLAY_PROPERTIES']['USER']['VALUE']);
if($ar_res = $res->GetNext())
print "<pre>";
print_r($ar_res);
print "</pre>";
?>
<a href=""><img width="100%" src="<?=CFile::GetPath($ar_res['PERSONAL_PHOTO'])?>" alt="<?=$ar_res['LOGIN']?>"></a><br>
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
</div>*/
/*print "<pre>";
print_r($arResult);
print "</pre>";*/
?>	
<div class="field field-name-field-phone field-type-text field-label-inline clearfix">
	<?if(!empty($arResult["PROPERTIES"]["PHONE"]["VALUE"])){?>
	<div class="field-label">Телефон:&nbsp;</div>
	<div class="field-items">
		<div class="field-item even" property="schema:telephone"><?=$arResult["PROPERTIES"]["PHONE"]["VALUE"]?></div>
	</div>
	<?}?>	
</div>
<div class="field field-name-field-adress field-type-addressfield field-label-inline clearfix">
	<div class="field-label">Адрес:&nbsp;</div>
	<div class="field-items">
		<?echo $arResult["~PREVIEW_TEXT"];?>
	</div>
</div>
<div class="field field-name-field-adress field-type-addressfield field-label-inline clearfix">
	<?if(!empty($arResult["PROPERTIES"]["WEBSITE"]["VALUE"])){?>
	<div class="field-label">Веб-сайт:&nbsp;</div>
	<div class="field-items">
		<div class="field-item even" property="schema:telephone"><?=$arResult["PROPERTIES"]["WEBSITE"]["VALUE"]?></div>
	</div>
	<?}?>	
</div>
	<?if(!empty($arResult["PROPERTIES"]["EMAIL"]["VALUE"])){?>
<div class="field field-name-field-adress field-type-addressfield field-label-inline clearfix">
	<div class="field-label">Email:&nbsp;</div>
	<div class="field-items">
		<div class="field-item even" property="schema:telephone"><?=$arResult["PROPERTIES"]["EMAIL"]["VALUE"]?></div>
	</div>	
</div>
<?}?>
<div class="field field-name-field-maps field-type-field-yamaps field-label-hidden">
	<div class="field-items">
		<div class="field-item even">
			<? $arProperty = $arResult["DISPLAY_PROPERTIES"]; ?> 
			<? if (isset($arProperty['MAP'])):?> 
			<? $arPos = explode(",", $arProperty['MAP']['VALUE']);?> 
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
			'TEXT' => $arResult["NAME"], 
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
<div class="field field-name-field-sdfsdf field-type-node-reference field-label-hidden">
	<div class="field-items">
		<div class="field-item even">
			<a href="<?=$arResult ['SECTION']['PATH'][0]['SECTION_PAGE_URL']?>"><?=$arResult ['SECTION']['PATH'][0]['NAME']?></a>
		</div>
	</div>
</div>

<div class="region region-under-content">
	<div id="block-views-og-members-block-3" class="block block-views contextual-links-region first last odd">
<?if(!empty($arResult["PROPERTIES"]["ADVOKATS"]["VALUE"])):?>	
		<h2 class="block-title">Адвокаты</h2>	
<?endif;?>		
		<div class="view view-og-members view-id-og_members view-display-id-block_3">
			<div class="view-content">	
			<div class="views-view-grid cols-3">
					<div class="overflow:hidden">
					
<?
//$dfm = str_replace('»','"',$arResult["NAME"]);
$filter = Array(
     //"UF_CONSULT" => strpos($arResult["NAME"],"Транспорт и право")
     //"UF_BURO" => $arResult["NAME"]." "	 
    "UF_CONSULT" => $arResult["NAME"]	 
	 //"UF_CONSULT" => str_replace('«','"',$dfm)
);
$rsUsers = CUser::GetList(
    ($by = "id"),
    ($order = "desc"), 
    $filter,
    array('SELECT' => array('UF_CONSULT'))
);
	



while ($arUser = $rsUsers->NavNext(true, "f_")) :



$dsd[] = $arUser["ID"];

/*print "<pre>";
print_r($dsd);
print "</pre>";	*/


			
/*print "<pre>";
print_r($arResult['ID']);
print "</pre>";*/
		  
//CIBlockElement::SetPropertyValuesEx($arResult['ID'], 15, array("ADVOKATS" => $dsd));
//CIBlockElement::SetPropertyValuesEx($arFields['ID'], 15, array("MAP" =>$data[2].",".$data[3]));
		 
/*print "<pre>";
print_r($arLoadProductSERVICE);
print "</pre>";	 */ 
$PRODUCT_ID = 3905;  // изменяем элемент с кодом (ID) 2

//$res = $el->Update($PRODUCT_ID, $arLoadProductSERVICE);
/*if(!$res){
  echo $el->LAST_ERROR;	  
}*/
endwhile;

//}

?>		

			
					
<?foreach($arResult["PROPERTIES"]["ADVOKATS"]["VALUE"] as $arAdvo):

//$res = CUser::GetByID($arAdvo);
//if($ar_res = $res->GetNext())
/*print "<pre>";
print_r($ar_res);
print "</pre>";*/
		$resr = CUser::GetByID($arAdvo);
		if($ar_res = $resr->GetNext())
				 $arFilter = Array("IBLOCK_ID"=>17,"PROPERTY_USER"=>$arAdvo);
					//$res = CIBlockElement::GetList(Array(), $arFilter);
					$res = CIBlockElement::GetList(Array(),$arFilter, false, Array(), Array());				
					while ($ob = $res->GetNextElement()){
						$arFields = $ob->GetFields(); // поля элемента
						$arProps = $ob->GetProperties(); // свойства элемента
	if(in_array($arProps["USER"]["VALUE"],$arResult["PROPERTIES"]["ADVOKATS"]["VALUE"])){							
						$ar_res["LINKS"]=$arFields["DETAIL_PAGE_URL"];	
					}
				}	

/*print "<pre>";
print_r($arProps["USER"]["VALUE"]);
print "</pre>";*/


	  $rImage = CFile::GetPath($ar_res["PERSONAL_PHOTO"]);
      $renderImage = CFile::ResizeImageGet($ar_res["PERSONAL_PHOTO"], Array("width" => 60, "height" => 60), BX_RESIZE_IMAGE_EXACT, false); 		
		
		?>											
						<div style="width:33.3%;float:left;margin-bottom: 20px;" id="<?=$arProps["USER"]["VALUE"]?>">
							<span class="user-picture adv-pic">
							<a href="<?=$ar_res["LINKS"]?>" title="Информация о пользователе."><img typeof="foaf:Image" <?if(!empty($ar_res["PERSONAL_PHOTO"])){?>src="<?=$renderImage['src']?>"<?}else{?>src="/images/picture-default.jpg"<?}?> alt="Аватар пользователя <?=$ar_res['LOGIN']?>" title="Аватар пользователя <?=$ar_res['LOGIN']?>"></a>  </span>
							<div class="adv-dsc" style="display: inline-block;"><a class="d" href="<?=$ar_res["LINKS"]?>"><?=$arFields["NAME"]?><?/*if(!empty($ar_res['LAST_NAME'])){?> <?=$ar_res['LAST_NAME']?> <?}?><?if(!empty($ar_res['NAME'])){?> <?=$ar_res['NAME']?> <?}?><?if(!empty($ar_res['SECOND_NAME'])){?> <?=$ar_res['SECOND_NAME']?> <?}*/?></a><div style="width: 197px;"><?=$ar_res['PERSONAL_PHONE']?></div></div>
						    <div class="clearfix"></div>
						</div>	
						
		<?	

	//}					

	  
     // echo '<img alt="'.$arItem["NAME"].'" src="'.$renderImage['src'] .'" />'; 
?>

	<?//}}?>					
<?endforeach?>					
<?




//foreach ?>					

						
					</div>				
			</div>			
			</div>
		</div>	
	</div>
</div>

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
		<?//echo $arResult["~DETAIL_TEXT"];?>
	<?else:?>
		<?//echo $arResult["PREVIEW_TEXT"];?>
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
	}*/
	/*?>
	<a href="" title="Читать последние записи в блоге пользователя <?=$ar_res['LOGIN']?>.">Блог						  
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
<style>
.view-og-members img{
    margin-right: 0px;	
}
</style>