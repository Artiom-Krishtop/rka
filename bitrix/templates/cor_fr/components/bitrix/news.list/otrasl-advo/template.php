<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

if(is_array($arResult['ITEMS']) && count($arResult['ITEMS'])>0) {?>

	<div id="otrasl" class="flexslider otrasl">  
	<div class="flex-viewport" style="overflow: hidden; position: relative;">	
	<ul class="slides">  	
    <?/*<div class="<?if($arParams['ARCORP_USE_OWL']=='Y'):?>owl flexslider banners<?else:?>row<?endif;?> partners" <?
		?>data-changespeed="<?if(IntVal($arParams["ARCORP_OWL_CHANGE_SPEED"])<1):?>2000<?else:?><?=$arParams["ARCORP_OWL_CHANGE_SPEED"]?><?endif;?>" <?
		?>data-changedelay="<?if(IntVal($arParams["ARCORP_OWL_CHANGE_DELAY"])<1):?>8000<?else:?><?=$arParams["ARCORP_OWL_CHANGE_DELAY"]?><?endif;?>" <?
		?>data-margin="0" <?
		?>data-responsive='{"0":{"items":"<?=(IntVal($arParams['ARCORP_OWL_PHONE'])>0?$arParams['ARCORP_OWL_PHONE']:1)?>"},"768":{"items":"<?=(IntVal($arParams['ARCORP_OWL_TABLET'])>0?$arParams['ARCORP_OWL_TABLET']:1)?>"},"991":{"items":"<?=(IntVal($arParams['ARCORP_OWL_PC'])>0?$arParams['ARCORP_OWL_PC']:1)?>"}}'<?
		?>><?	*/
		foreach($arResult["ITEMS"] as $arItem) {
            
			//if(!empty($arItem['PROPERTIES']['SFERA_DET']['VALUE']) {
			//	continue;
			//}
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
/*print "<pre>";
print_r($arItem['PROPERTIES']['USER']['VALUE']);
print "</pre>";*/
			?><li class="item<?if($arParams['ARCORP_USE_OWL']!='Y'):?> col col-md-<?=$arParams['ARCORP_COLS_IN_ROW']?><?endif;?> col-sm-12" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <div>
            <?
				/*?><div class="row"><?
					?><div class="col col-md-12"><?*/
						?><a class="clearfix" href="<?=$arItem['DETAIL_PAGE_URL']?>" target="_blank" rel="nofollow" ><?
							/*?><div class="row image"><?
								?><div class="col col-md-12"><?*/
									//if( $arItem['PREVIEW_PICTURE']['SRC']!='' ) {
										?><?
                                      
$res = CUser::GetByID($arItem["PROPERTIES"]["USER"]["VALUE"]);
if($ar_res = $res->GetNext())	
				 /*$arFilter = Array("IBLOCK_ID"=>16,"PROPERTY_USER"=>$arItem["PROPERTIES"]["USER"]["VALUE"]);	
					$res = CIBlockElement::GetList(Array('SORT' => 'ASC', 'ID' => 'DESC'),$arFilter, false, Array(), Array());				
					while ($ob = $res->GetNextElement()){
						$arFields = $ob->GetFields(); // поля элемента
						$arProps = $ob->GetProperties();
						//$ar_res["COUNT"][] = $arFields["ID"];  
					}*/
	  $rImage = CFile::GetPath($ar_res["PERSONAL_PHOTO"]);
      //$renderImage = CFile::ResizeImageGet($ar_res["PERSONAL_PHOTO"], Array("width" => 105, "height" => 105), BX_RESIZE_IMAGE_EXACT, false);  
      $renderImage = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], Array("width" => 105, "height" => 105), BX_RESIZE_IMAGE_EXACT, false);    
?>
<?if(!empty($renderImage['src'])){?>
<img width="105" height="105" src="<?=$renderImage['src']?>" alt="<?=$ar_res['LOGIN']?>">      
<?}else{?>
<img width="105" height="105" src="/upload/picture-defaultw.jpg" alt="<?=$ar_res['LOGIN']?>">      
<?}?>
                                     
 <div><?=$ar_res['LAST_NAME']?> <?= mb_substr($ar_res['NAME'],0,1)."."?> <?= mb_substr($ar_res['SECOND_NAME'],0,1)."."?></div>                                      
                                        
                                        <?
									//}
								/*?></div><?
							?></div><?*/
						?></a><?
					/*?></div><?
				?></div><?*/
			?></div></li><?
         } 
//}         
	?></div><?
	?></div><?
	?></div><?
}?>



	  