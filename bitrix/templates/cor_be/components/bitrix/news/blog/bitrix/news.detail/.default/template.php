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
<div class="submitted-faq">
<?
$res = CUser::GetByID($arResult['DISPLAY_PROPERTIES']['USER']['VALUE']);
if($ar_res = $res->GetNext())
	
				 $arFilter = Array("IBLOCK_ID"=>17,"PROPERTY_USER"=>$arResult['DISPLAY_PROPERTIES']['USER']['VALUE']);
					//$res = CIBlockElement::GetList(Array(), $arFilter);
					$res = CIBlockElement::GetList(Array(),$arFilter, false, Array(), Array());				
					while ($ob = $res->GetNextElement()){
						$arFields = $ob->GetFields(); // поля элемента
						$arProps = $ob->GetProperties(); // свойства элемента
	if($arProps["USER"]["VALUE"]==$ar_res['ID']){							
						$arResult["LINKS"]=$arFields["DETAIL_PAGE_URL"];	
					}
					}
/*print "<pre>";
print_r($ar_res);
print "</pre>";*/
?>
<a href="<?=$arResult["LINKS"]?>"><img width="100%" src="<?=CFile::GetPath($ar_res['PERSONAL_PHOTO'])?>" alt="<?=$ar_res['LOGIN']?>"></a><br>
<a href="<?=$arResult["LINKS"]?>"> <?if(!empty($ar_res["UF_ROLE"])){?><?=$ar_res["UF_ROLE"]?><?}?>						  
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
<?$db_list = CIBlockSection::GetList(array(), array('GLOBAL_ACTIVE' => 'Y', "IBLOCK_ID" => 15), true, array("ID", "NAME","UF_S_OLD_ID","SECTION_PAGE_URL","SECTION_ID"));
		while($section = $db_list->Fetch()) {
			if($section['NAME']==$ar_res['UF_COLLEGIA']){?>
		<a href="/kollegies/<?=$section['CODE']?>/"><?=$section['NAME']?></a><?if(!empty($ar_res['UF_BURO'])){?>,<?}?>			
<?}}?>				
				<?/*<a href=""><?=$ar_res['UF_COLLEGIA']?></a><?if(!empty($ar_res['UF_BURO'])){?>,<?}*/?>			
<?}?>
<?if(!empty($ar_res['UF_BURO'])){
				 $arFilter = Array("IBLOCK_ID"=>15,"NAME"=>$ar_res['UF_BURO']);
					//$res = CIBlockElement::GetList(Array(), $arFilter);
					$res = CIBlockElement::GetList(Array(),$arFilter, false, Array(), Array());				
					while ($ob = $res->GetNextElement()){
						$arFields = $ob->GetFields(); // поля элемента
						$arProps = $ob->GetProperties(); // свойства элемента
	if($arFields["NAME"]==$ar_res['UF_BURO']){							
						$arResult["B_LINKS"]=$arFields["DETAIL_PAGE_URL"];	
					}
					}	
	
	?>	
				
				<a href="<?=$arResult["B_LINKS"]?>"><?=$ar_res['UF_BURO']?></a>
<?}?>
<?if(!empty($ar_res['UF_CONSULT'])){?>	
<?				 $arFilter = Array("IBLOCK_ID"=>15,"NAME"=>$ar_res['UF_CONSULT']);
					//$res = CIBlockElement::GetList(Array(), $arFilter);
					$rest = CIBlockElement::GetList(Array(),$arFilter, false, Array(), Array());				
					while ($ob = $rest->GetNextElement()){
						$arFields = $ob->GetFields(); // поля элемента
						$arProps = $ob->GetProperties(); // свойства элемента			
	if($arFields["NAME"]==$ar_res['UF_CONSULT']){							
						$ar_res["C_LINKS"]=$arFields["DETAIL_PAGE_URL"];	
					}
					}	?>			
				<a href="<?=$ar_res["C_LINKS"]?>"><?=$ar_res['UF_CONSULT']?></a>			
<?}?>			
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
	<?/*if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
		<span class="news-date-time"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></span>
	<?endif;*/?>
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
		<?echo $arResult["~DETAIL_TEXT"];?>
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
	if(array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y")
	{
		?>
		<div class="news-detail-share" style="float: left;padding-right: 20px;">
			<noindex>
<script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
<script src="https://yastatic.net/share2/share.js"></script>
<div class="ya-share2" data-services="vkontakte,facebook,twitter,lj,linkedin,odnoklassniki,whatsapp,evernote,telegram" data-size="s"></div>           
			<?/*
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
			*/?>
			</noindex>
		</div>
		<?
	}
	?>
    <?$link_blog = '?blog='.$arResult['PROPERTIES']['USER']['VALUE'].'';?>
	<a href="/blogs/<?=$link_blog?>" title="Читать последние записи в блоге пользователя <?=$ar_res['LOGIN']?>.">Блог
				  <?if(!empty($ar_res['LAST_NAME'])){?>
					<?=$ar_res['LAST_NAME']?>
				  <?}?>		
				  <?if(!empty($ar_res['NAME'])){?>
					<?=$ar_res['NAME']?>
				  <?}?>	
				  <?if(!empty($ar_res['SECOND_NAME'])){?>
					<?=$ar_res['SECOND_NAME']?>
				  <?}?>
	</a>	
 <?
$pi = explode(", ", $arResult['PROPERTIES']['OT_PRAVO']['VALUE']);
$pw=[];
	 $arFilterw = Array("IBLOCK_ID"=>21);
		$rw = CIBlockElement::GetList(Array(), $arFilterw);
		while ($obw = $rw->GetNextElement()){
			$arFieldw = $obw->GetFields(); // поля элемента
			$arPropw = $obw->GetProperties();	
            if (in_array($arFieldw["NAME"], $pi)) {
                array_push($pw, $arFieldw["ID"]);
            }                     
        }           	
//CIBlockElement::SetPropertyValuesEx($arResult['ID'], 14, array("OTR_PRAVO" => $pw));     
 ?>   
</div>