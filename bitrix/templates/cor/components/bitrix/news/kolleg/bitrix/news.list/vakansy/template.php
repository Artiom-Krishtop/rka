<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

if(is_array($arResult["ITEMS"]) && count($arResult["ITEMS"])>0) {
	if( $arParams['ARCORP_SHOW_BLOCK_NAME']=='Y' ) {
		?><h2 class="coolHeading"><span class="secondLine"><?
			if( $arParams['ARCORP_BLOCK_NAME_IS_LINK']=='Y' && $arResult['LIST_PAGE_URL']!='' ) {
				?><a href="<?=( str_replace('//','/', str_replace('#SITE_DIR#',SITE_DIR,$arResult['LIST_PAGE_URL']) ) )?>"><?=$arResult["NAME"]?></a><?
			} else {
				?><?=$arResult["NAME"]?><?
			}
		?></span></h2><?
	}
	?><div class="row procedures vacancies"><?
		?><div class="col col-md-12"><?
			// filter
			if( is_array($arResult['FILTER']['VALUES']) && count($arResult['FILTER']['VALUES'])>0 ) {
				?><div class="row"><?
					?><div class="col col-md-12 filter"><?
						foreach( $arResult['FILTER']['VALUES'] as $arValue ) {
							?><button class="btn btn-default" type="button" data-filter="<?=htmlspecialcharsbx($arValue['XML_ID'])?>"><?=$arValue['VALUE']?></button><?
						}
						?><button class="btn btn-primary" type="button" data-filter=""><?=GetMessage('AR.CORP.FILTER_ALL')?></button><?
					?></div><?
				?></div><?
			}
			// /filter
			if($arParams["DISPLAY_TOP_PAGER"]) {
				echo $arResult["NAV_STRING"];
			}?>
<?foreach($arResult["ITEMS"] as $arSection):?>
<?php /*
print "<pre>";
print_r($arSection);
print "</pre>";*/
?>	
    <div class="section">
<?if($arSection['ID']>71 ) {continue;}?>		
<a href="<?=$arSection['SECTION_PAGE_URL']?>" id="<?=$arSection['ID']?>" ><h3 class="underline"><?=$arSection['NAME']?></h3></a>		
			<?/*<div class="panel-group" role="tablist" aria-multiselectable="true"><?
				$index = 0;
				foreach($arSection["ELEMENTS"] as $key=> $arItem) {
					$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
					
					?><div <?
						?>class="item panel panel-default filter<?=$arItem['DISPLAY_PROPERTIES'][$arParams['ARCORP_PROP_VACANCY_TYPE']]['VALUE_XML_ID']?>" <?
						?>id="<?=$this->GetEditAreaId($arItem['ID']);?>" <?
						?>><?
						?><div class="panel-heading" role="tab" id="heading<?=$index.$arItem['ID']?>"><?
							?><div class="panel-title roboto" id="<?=$arItem['ID']?>"><?
								?><a <?
									?>class="collapsed<?/*if($index>0):?>collapsed<?endif;?>" <?
									?>data-toggle="collapse" <?
									?>data-parent="#accordion<?=$index.$arItem['ID']?>" <?
									?>href="#collapseOne<?=$index.$arItem['ID']?>" <?
									?>aria-expanded="true" <?
									?>aria-controls="collapseOne<?=$index.$arItem['ID']?>" <?
								?>><?
									?><span class="wert"><?=$arItem['NAME']?></span><?
									if( $arParams['ARCORP_PROP_SIGNATURE']!='' && $arItem['DISPLAY_PROPERTIES'][$arParams['ARCORP_PROP_SIGNATURE']]['DISPLAY_VALUE']!='' ) {
										?><span class="right"><?=$arItem['DISPLAY_PROPERTIES'][$arParams['ARCORP_PROP_SIGNATURE']]['DISPLAY_VALUE']?></span><?
									}
								?><p class="textsp"><?=$arItem["PROPERTIES"]["PAY"]["NAME"]?>: <?=$arItem["PROPERTIES"]["PAY"]["VALUE"]?></p></a><?
							?></div>
							<?
						?></div><?
						?><div id="collapseOne<?=$index.$arItem['ID']?>" class="panel-collapse collapse<?/*if($index==0):?> in<?endif;?>" role="tabpanel" aria-labelledby="heading<?=$index?>"><?
							?><div class="panel-body">
<?php /*
print "<pre>";
print_r($arItem["PROPERTIES"]);
print "</pre>";*/
?>								
						
							
							<?
								?><?=$arItem['PREVIEW_TEXT']?><?
								/*?><div class="row"><?
									?><div class="col col-md-6"><?
										?><a class="btn-respond btn btn-primary" href="#vacancyForm" data-vacancy="<?=CUtil::JSEscape($arItem['NAME'])?>"><?=GetMessage('AR.CORP.BTN_RESPOND_VACANCY')?></a><?
									?></div><?
									?><div class="col col-md-6 yashare"><?
										?><span><?=GetMessage("AR.CORP.YASHARE")?>:</span><?
										?><div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="none" data-yashareQuickServices="facebook,twitter,gplus"></div><?
									?></div><?
								?></div><?
							?></div><?
						?></div><?
					?></div><?
					$index++;
				}
			?></div>*/?>
			</div> <? endforeach?><?
			/*if($arParams["DISPLAY_BOTTOM_PAGER"]) {
				echo $arResult["NAV_STRING"];
			}*/
		?></div><?
	?></div>
	<style>
/*.table-wrapper table tr {
    border-bottom: 1px solid #a0afc1;
    border-left: 1px solid #a0afc1;
	border-right:  1px solid #a0afc1;
}	
.table-wrapper table td {
    width: auto;
    padding: 0px;
    max-width:auto;
    position: relative;
    font-size: 14px;
}
.table-wrapper table td p{
    padding: 0px 10px;
    margin: 0;
}	
.panel-heading {
    padding: 0px 19px;
}
.panel-body {
    padding: 10px 17px;
}	
.panel-group .panel-heading + .panel-collapse > .panel-body{
	border-right: none;
    border-bottom:none;
    border-left: none;
}*/

.underline {
    display: inline-block;
    margin-bottom: 20px;
    padding-bottom: 11px;
    border-bottom: 2px solid #154270 !important;
}
.textsp{
	float: right;
    margin-right: 40px;
}

.wert{
	display: inline;
    line-height: 18px;
    text-decoration: none;
   
   
}
.panel-default > .panel-heading a:after {
top: auto;
}
	</style><?
}