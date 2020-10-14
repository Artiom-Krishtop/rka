<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<div id="book-navigation-4" class="book-navigation">  
<ul class="menu">
<?
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
	<?if($arItem["SELECTED"]):?>
		<li><a href="<?=$arItem["LINK"]?>" class="selected"><?=$arItem["TEXT"]?></a></li>
	<?else:?>
		<li <?if($arItem["LINK"]=='/about/zakon-respubliki-belarus/' || $arItem["LINK"]=='/about/poryadok-i-usloviya-okazaniya/' || $arItem["LINK"]=='/about/poryadok-i-usloviya-okazaniya/nopay/'):?>class="collapsed"<?endif?>><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
	<?endif?>
<?endforeach?>
</ul>
  </div>
<?endif?>