<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if(count($arResult["ITEMS"])>0):?>
	<div class="news-list yur-consult">
		<div style=" overflow: hidden;">
		<?foreach($arResult["ITEMS"] as $arItem):?>
		<?if($arItem['PROPERTIES']['YUR_CONS']['VALUE_XML_ID'] == "Y"):?>		
		<div style="width:50%;float: left;" class="yur-consult-item">
		
		
		<?//foreach($arResult["SECTION"] as $arSec):?>	
<?
/*print "<pre>";
print_r($arItem['PROPERTIES']['YUR_CONS']['VALUE_XML_ID']);
print "</pre>";	*/
?>			
		<?//endforeach;?>
		
			<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
			<div class="views-field views-field-field-phone">    
				<span class="views-label views-label-field-phone">Телефон:</span>    
				<span class="field-content"><?=$arItem["PROPERTIES"]["PHONE"]["VALUE"]?></span> 
			</div>			
			<div class="views-field views-field-field-adress" style="margin-bottom:20px;">    
				<span class="views-label views-label-field-adress">Адрес:</span>   
				<div class="field-content" style="margin-left: 84px;"><?=$arItem["~PREVIEW_TEXT"]?></div>  
			</div>			
		</div>
		<?endif;?>			
		<?endforeach;?>
		</div>
	
	</div>
<?			//if($arParams["DISPLAY_BOTTOM_PAGER"]) {
				//echo $arResult["NAV_STRING"];
			//}	?>
<?endif?>
