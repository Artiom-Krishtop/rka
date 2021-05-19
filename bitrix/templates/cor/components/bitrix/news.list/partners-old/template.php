<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

if(is_array($arResult['ITEMS']) && count($arResult['ITEMS'])>0) {?>
	<div id="partners" class="flexslider banners ">  
	<div class="flex-viewport" style="overflow: hidden; position: relative;">	
	<ul class="slides">  	
    <?/*<div class="<?if($arParams['ARCORP_USE_OWL']=='Y'):?>owl flexslider banners<?else:?>row<?endif;?> partners" <?
		?>data-changespeed="<?if(IntVal($arParams["ARCORP_OWL_CHANGE_SPEED"])<1):?>2000<?else:?><?=$arParams["ARCORP_OWL_CHANGE_SPEED"]?><?endif;?>" <?
		?>data-changedelay="<?if(IntVal($arParams["ARCORP_OWL_CHANGE_DELAY"])<1):?>8000<?else:?><?=$arParams["ARCORP_OWL_CHANGE_DELAY"]?><?endif;?>" <?
		?>data-margin="0" <?
		?>data-responsive='{"0":{"items":"<?=(IntVal($arParams['ARCORP_OWL_PHONE'])>0?$arParams['ARCORP_OWL_PHONE']:1)?>"},"768":{"items":"<?=(IntVal($arParams['ARCORP_OWL_TABLET'])>0?$arParams['ARCORP_OWL_TABLET']:1)?>"},"991":{"items":"<?=(IntVal($arParams['ARCORP_OWL_PC'])>0?$arParams['ARCORP_OWL_PC']:1)?>"}}'<?
		?>><?	*/
		foreach($arResult["ITEMS"] as $arItem) {
			if( empty($arItem['PREVIEW_PICTURE']) || $arItem['PREVIEW_PICTURE']['SRC']=='' ) {
				continue;
			}
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

			?><li class="item<?if($arParams['ARCORP_USE_OWL']!='Y'):?> col col-md-<?=$arParams['ARCORP_COLS_IN_ROW']?><?endif;?> col-sm-12" id="<?=$this->GetEditAreaId($arItem['ID']);?>" style="vertical-align: middle; padding: inherit;"><?
				/*?><div class="row"><?
					?><div class="col col-md-12"><?*/
						?><div style="padding: 0 1rem;">
						<a class="clearfix" href="<?=$arItem['PROPERTIES']['LINK']['VALUE']?>" target="_blank" rel="nofollow" ><?
							/*?><div class="row image"><?
								?><div class="col col-md-12"><?*/
									if( $arItem['PREVIEW_PICTURE']['SRC']!='' ) {
										?><img u="image" border="0" <?
											?>src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" <?
											?>alt="<?=$arItem['PREVIEW_PICTURE']['ALT']?>" <?
											?>title="<?=$arItem['PREVIEW_PICTURE']['TITLE']?>" <?
										?> style="padding: 0;"/><?
									}
								/*?></div><?
							?></div><?*/
						?></a>
                        </div><?
					/*?></div><?
				?></div><?*/
			?></li><?
		}
	?></div><?
	?></div><?
	?></div><?
}?>



	  