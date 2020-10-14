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
<div class="news-list" style="overflow: hidden;">

<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="news-item views-row views-row-even" id="<?=$this->GetEditAreaId($arItem['ID']);?>" style="width: 16.6%;float: left;text-align: center;height:170px;">	

<?
$resr = CUser::GetByID($arItem['DISPLAY_PROPERTIES']['USER']['VALUE']);
if($ar_res = $resr->GetNext())
				 $arFilter = Array("IBLOCK_ID"=>17,"PROPERTY_USER"=>$arItem['DISPLAY_PROPERTIES']['USER']['VALUE']);
					$res = CIBlockElement::GetList(Array(),$arFilter, false, Array(), Array());				
					while ($ob = $res->GetNextElement()){
						$arFields = $ob->GetFields(); // поля элемента
						$arProps = $ob->GetProperties(); // свойства элемента
	if($arProps["USER"]["VALUE"] == $arItem['DISPLAY_PROPERTIES']['USER']['VALUE']){							
						$ar_res["LINKS"]=$arFields["DETAIL_PAGE_URL"];	
					}
				}
	  $rImage = CFile::GetPath($ar_res["PERSONAL_PHOTO"]);
      $renderImage = CFile::ResizeImageGet($ar_res["PERSONAL_PHOTO"], Array("width" => 100, "height" => 100), BX_RESIZE_IMAGE_EXACT, false); 					
?>	


		<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
			<span class="news-date-time"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
		<?endif?>
		<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
									<span class="user-picture">
						<a href="<?=$ar_res["LINKS"]?>" title="Информация о пользователе."><img style="display: block;margin: 0 auto;" typeof="foaf:Image" <?if(!empty($ar_res["PERSONAL_PHOTO"])){?>src="<?=$renderImage['src']?>"<?}else{?>src="/images/picture-default.jpg"<?}?> alt="Аватар пользователя <?=$ar_res['LOGIN']?>" title="Аватар пользователя <?=$ar_res['LOGIN']?>"></a>  </span>
						<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a>
			<?else:?>
				<b><?echo $arItem["NAME"]?></b>
			<?endif;?>
		<?endif;?>
		<div class="list-text" style="margin-bottom: 20px;">
			<?echo $arItem["~PREVIEW_TEXT"];?>
</div>		
	</div>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
