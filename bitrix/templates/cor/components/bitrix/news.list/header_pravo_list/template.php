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
<br>
<ul class="quicklinks">

<?foreach($arResult["ITEMS"] as $arItem):?>
	<li class="leaf" style="color: #000000;"><a href="<?=$arItem['DETAIL_PAGE_URL']?>" title="<?=$arItem['NAME']?>"><span style="font-family: Arial, Helvetica; font-size: 11pt;"><?=$arItem['NAME']?></span></a></li>
<?endforeach;?>
	<li class="more" style="color: #000000;"><a href="<?=$arResult['NAV_PARAM']['BASE_LINK']?>" class="button"><span style="font-family: Arial, Helvetica; font-size: 11pt;"><?=GetMessage('CT_BNL_ALL_PRAVO')?></span></a></li>
</ul> 
