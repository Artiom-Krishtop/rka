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
		<div class="field-item even" property="schema:telephone"><a target="_blank" href="<?=$arResult["PROPERTIES"]["WEBSITE"]["VALUE"]?>"><?=$arResult["PROPERTIES"]["WEBSITE"]["VALUE"]?></a></div>
	</div>
	<?}?>	
</div>
<?if(!empty($arResult["PROPERTIES"]["EMAIL"]["VALUE"])){?>
<div class="field field-name-field-adress field-type-addressfield field-label-inline clearfix">
	<div class="field-label">Email:&nbsp;</div>
    <?
    $email = explode(";",$arResult["PROPERTIES"]["EMAIL"]["VALUE"]);
    /*print "<pre>";
    print_r($email);
    print "</pre>";*/
    ?>
	<div class="field-items">
        <?foreach($email as $em){?>
		<div class="field-item even" property="schema:telephone">
            <a href="mailto:<?=trim($em)//=$arResult["PROPERTIES"]["EMAIL"]["VALUE"]?>">
                <?=trim($em)//$arResult["PROPERTIES"]["EMAIL"]["VALUE"]?>
            </a>
        </div>
        <?}?>
	</div>	
</div>
<?}?>
    <?if(!empty($arResult["DETAIL_TEXT"])){?>
        <div class="field field-name-field-adress field-type-addressfield field-label-inline clearfix">
            <div class="field-items">
                <div class="field-item even" property="schema:telephone"><?=$arResult["~DETAIL_TEXT"]?></div>
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
</div>
<style>
.view-og-members img{
    margin-right: 0px;	
}
</style>