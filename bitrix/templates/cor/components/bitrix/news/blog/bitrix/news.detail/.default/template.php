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
<a href="<?=$arResult["LINKS"]?>"><img width="100%" src="<?=CFile::GetPath($arResult['FOTO'])?>" alt="<?=$arResult['NAME_ADVO']?>"></a><br>
<a href="<?=$arResult["LINKS"]?>">адвокат <?=$arResult['NAME_ADVO']?></a>,
<br>
    <?=FormatDate('d F Y',MakeTimeStamp($arResult['ACTIVE_FROM']), time())?>
<div class="contacts">		
<?if(!empty($arResult['PHONE'])){?>
				<span>Телефон:</span><?=$arResult['PHONE']?><br>
<?}?>	
<?if(!empty($arResult['SKYPE'])){?>
				<span>Skype:</span><?=$arResult['SKYPE']?><br>
<?}?>	
<?if(!empty($arResult['ISQ'])){?>
				<span>ISQ:</span><?=$arResult['ISQ']?><br>
<?}?>				
</div>
<div class="collegies">
    <?if(!empty($arResult["KOLLEG"])){?>
                <a href="<?=$arResult["KOLLEG_LINK"]?>"><?=$arResult["KOLLEG_NAME"]?></a><?if(!empty($arResult["UR_NAME"])){?>,<?}?>
    <?}?>
    <?if(!empty($arResult["UR_NAME"])){?>
        <a href="<?=$arResult["UR_LINK"]?>"><?=$arResult["UR_NAME"]?></a>
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
	<?
	if(array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y")
	{
		?>
		<div class="news-detail-share" style="float: left;padding-right: 20px;">
			<noindex>
<script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
<script src="https://yastatic.net/share2/share.js"></script>
<div class="ya-share2" data-services="vkontakte,facebook,twitter,lj,linkedin,odnoklassniki,whatsapp,evernote,telegram" data-size="s"></div>
			</noindex>
		</div>
		<?
	}
	?>
    <?$link_blog = '?blog='.$arResult['PROPERTIES']['USER']['VALUE'].'';?>
	<a href="/blogs/<?=$link_blog?>" title="Читать последние записи в блоге пользователя <?=$arResult['NAME_ADVO']?>.">Блог <?=$arResult['NAME_ADVO']?></a>
</div>