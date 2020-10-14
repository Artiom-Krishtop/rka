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

/*print "<pre>";
print_r($arResult);
print "</pre>";*/
?>
<?foreach($arResult["ITEMS"] as $arSection):?>

<?if($arSection["ID"] ==88){?>
<hr style="border-radius: 0 0 0 0; clear: both; background-color: #85092d; height: 10px; border: 0px;" size="10">
<h2 class="hsd" style="clear: both;"><?=$arSection['NAME']?></h2>
    <div class="section">	
<div class="news-list">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arSection["ELEMENTS"] as $key=> $arItem):?>
<?if($arItem["ID"] !=106749 && $arItem["ID"] !=106748 ){?>

	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
				<div class="img-inner"><img
						class="preview_picture"
						border="0"
						src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
						width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
						height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
						alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
						title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
						
						/></div>	
				<div>Исторические сведения о <h3><?echo str_replace('История ','',$arItem["NAME"])?></h3></div>						
						
						</a>
						
			<?else:?>
				<img
					class="preview_picture"
					border="0"
					src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
					width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
					height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
					alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
					title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
					style="float:left"
					/>
			<?endif;?>
		<?endif?>
		<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
			<span class="news-date-time"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
		<?endif?>
		<?/*if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
				<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><b><?echo $arItem["NAME"]?></b></a><br />
			<?else:?>
				<b><?echo $arItem["NAME"]?></b><br />
			<?endif;?>
		<?endif;*/?>
		<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
			<?echo $arItem["PREVIEW_TEXT"];?>
		<?endif;?>
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<div style="clear:both"></div>
		<?endif?>
		<?foreach($arItem["FIELDS"] as $code=>$value):?>
			<small>
			<?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?>
			</small><br />
		<?endforeach;?>
		<?/*foreach($arItem["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
			<small>
			<?=$arProperty["NAME"]?>:&nbsp;
			<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
				<?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
			<?else:?>
				<?=$arProperty["DISPLAY_VALUE"];?>
			<?endif?>
			</small><br />
		<?endforeach;*/?>
	</div>
<?}?>	
<?endforeach;?>
<?/*if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;*/?>
</div>
</div>
<?}else{
	
			
	?>
<hr style="border-radius: 0 0 0 0; clear: both; background-color: #85092d; height: 10px; border: 0px;" size="10">
<h2 style="clear: both;"><?=$arSection['NAME']?></h2>
<div class="view view-persons view-id-persons view-display-id-block view-dom-id-512189f127d0dc32a21247fb07f8e5de">
      <div class="view-content">
      <table class="views-view-grid cols-6">
  <tbody>
  <tr>
<?foreach($arSection["ELEMENTS"] as $key=> $arItem):
                    $renderImage = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], Array("width" => 60, "height" => 60), BX_RESIZE_IMAGE_EXACT, false);			   
?>		
<?if($key < 6){?>		

            <td>             
				 <div class="views-field views-field-field-foto">       
						<div class="field-content">
							<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
								<img typeof="foaf:Image" src="<?=$renderImage["src"]?>" alt="<?=$arItem["NAME"]?>">
							</a>
						</div>  
				</div>  
				<div class="views-field views-field-title"> 
					<span class="field-content">
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
					</span>  
				</div>          
			</td>	
<?}?>				
 <?endforeach;?>             
 </tr>
   <tr>
<?foreach($arSection["ELEMENTS"] as $key=> $arItem):
                    $renderImage = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], Array("width" => 60, "height" => 60), BX_RESIZE_IMAGE_EXACT, false);
?>		

<?if($key > 5){?>		
            <td>             
				 <div class="views-field views-field-field-foto">       
						<div class="field-content">
							<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
								<img typeof="foaf:Image" src="<?=$renderImage["src"]?>" alt="<?=$arItem["NAME"]?>">
							</a>
						</div>  
				</div>  
				<div class="views-field views-field-title"> 
					<span class="field-content">
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
					</span>  
				</div>          
			</td>	
<?}?>				
 <?endforeach;?>             
 </tr>
      </tbody>
</table>
    </div>
<div class="more-link">
  <a href="/museum/members/">
    Весь перечень почетных членов коллегии адвокатов  </a>
</div>
</div>	
<?}?>	
<?endforeach;?>
<style>
.more-link {
    text-align: right;
}
.more-link a {
    background: no-repeat right center url(/sites/all/themes/zen/beladvocate/image/button.svg) #85092D;
    border-radius: 5px;
    color: white;
    display: inline-block;
    line-height: 28px;
    text-decoration: none;
    padding: 0 10px;
}
.img-inner{
height: 180px;	
}
.news-list{
	overflow:hidden;
}
.news-item{
	margin-top:20px;
	width: 33.3%;
    float: left;
	height:250px;
    text-align: center;	
}
div.news-list img.preview_picture{
	float:none;
}
body h2.hsd{
	 line-height:1em;
}
</style>