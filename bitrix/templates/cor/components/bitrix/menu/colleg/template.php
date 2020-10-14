<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

    <!--<li class="first leaf"><a href="/kollegies/brestskaya-oblastnaya">Брестская областная (БОКА)</a></li>
<li class="leaf"><a href="/kollegies/vitebskaya-oblastnaya">Витебская областная (ВОКА)</a></li>
<li class="leaf"><a href="/kollegies/gomelskaya-oblastnaya">Гомельская областная (ГОКА)</a></li>
<li class="leaf"><a href="/kollegies/grodnenskaya-oblastnaya" title="">Гродненская областная (ГрОКА)</a></li>
<li class="leaf"><a href="/kollegies/minskaya-gorodskaya">Минская городская (МГКА)</a></li>
<li class="leaf active-trail"><a href="/kollegies/minskaya-oblastnaya" title="" class="active">Минская областная (МОКА)</a></li>
<li class="last leaf"><a href="/kollegies/mogilevskaya-oblastnaya">Могилевская областная (МогОКА)</a></li>-->

<?if (!empty($arResult)):?>

<ul id="vertical-multilevel-menu" class="menu">

<?
$previousLevel = 0;
foreach($arResult as $arItem):?>

	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?if ($arItem["IS_PARENT"]):?>

		<?if ($arItem["DEPTH_LEVEL"] == 1):?>	
			<li class="leaf"><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><?=$arItem["TEXT"]?></a>
				<ul class="root-item">
		<?else:?>
			<li class="leaf"><a href="<?=$arItem["LINK"]?>" class="parent<?if ($arItem["SELECTED"]):?> item-selected<?endif?>"><?=$arItem["TEXT"]?></a>
				<ul>
		<?endif?>

	<?else:?>

		<?if ($arItem["PERMISSION"] > "D"):?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li><img class="drs" src="<?=$arItem["PARAMS"]["IMG"]?>" border="0" /><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li><a href="<?=$arItem["LINK"]?>" <?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?else:?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li><a href="" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li><a href="" class="denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?endif?>

	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>

</ul>
<?endif?>