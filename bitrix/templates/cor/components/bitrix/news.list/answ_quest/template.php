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

$date_min=$_REQUEST["date_filter_min"];
$date_min=$DB->FormatDate($date_min, "YYYY-MM-DD", "DD.MM.YYYY");
$date_max=$_REQUEST ["date_filter_max"];
$date_max=$DB->FormatDate($date_max, "YYYY-MM-DD", "DD.MM.YYYY");
?>

<div class="news-list">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
<div id="coont" class="view-header">
	<?=$arResult["NAV_STRING"]?><br />
</div>

<?if(!empty($arResult["PDF_ITEMS"])):?>
<div id="save_otchet" class="">
        <a id="save_pdf" href="javascript:void(0);" style="color:#fff" class="add_bloger save_pdf">Скачать отчет</a>
</div>
<?endif;?>
    <script src='/bitrix/templates/cor/components/bitrix/main.profile/profile/js/pdfmake.min.js'></script>
    <script src='/bitrix/templates/cor/components/bitrix/main.profile/profile/js/vfs_fonts.js'></script>
    <script>
        jQuery(document).ready(function ($) {
            jQuery("#save_pdf").on("click", function(){
                event.preventDefault();
                var docInfo = {
                    info: {
                        title:'Отчет с <?=$date_min?> по <?=$date_max?>',
                        author:'<?=$USER->GetID()?>',
                        subject:'',
                        keywords:''
                    },
                    pageSize:'A4',
                    pageOrientation:'portrait',//'portrait'
                    pageMargins:[50,50,30,60],

                    header:function(currentPage,pageCount) {
                        return {
                            //text: currentPage.toString() + 'из' + pageCount,
                            //alignment:'right',
                           // margin:[0,30,10,50]
                        }
                    },
                    footer:[
                        {
                            text:'Сгенерировано на rka.by | Разработано Artismedia.by',
                            alignment:'center',//left  right
                            margin:[20,0,0,0]
                        }
                    ],
                    content: [
                        {
                            text:'- Отчет с <?=$date_min?> по <?=$date_max?> -',
                            fontSize:20,
                            margin:[10,10,0,0]
                            //pageBreak:'after'
                        },
                        {
                            text:'-----------------------------------------------------------------------------------',
                            fontSize:20,
                            margin:[0,0,20,0]
                            //pageBreak:'after'
                        },
                        <? $count=1;
                        foreach($arResult["PDF_ITEMS"] as $arItems):
                       // $text = htmlentities(strip_tags($arItem["PREVIEW_TEXT"]), ENT_DISALLOWED);
                        $text = strip_tags($arItems["PREVIEW_TEXT"]);
                        $text = str_replace("\n", " ", $text);
                        $text = str_replace("&laquo;", "«", $text);
                        $text = str_replace("&raquo;", "»", $text);
                        $text = str_replace("&amp;", "", $text);
                        $text = str_replace("nbsp;", "", $text);
                        $text = str_replace("&&", "", $text);
                        $text = str_replace("&#40;", "", $text);
                        $text = str_replace("&#41;", "", $text);
                        $text = str_replace("&quot;", "", $text);

                        $text_detail = strip_tags($arItems["~DETAIL_TEXT"]);
                        $text_detail = str_replace(array("\r\n", "\r", "\n"), " ", $text_detail);
                        $text_detail = str_replace("&laquo;", "«", $text_detail);
                        $text_detail = str_replace("&raquo;", "»", $text_detail);
                        $text_detail = str_replace("&amp;", "", $text_detail);
                        $text_detail = str_replace("nbsp;", "", $text_detail);
                        $text_detail = str_replace("&&", "", $text_detail);
                        $text_detail = str_replace("&#40;", "", $text_detail);
                        $text_detail = str_replace("&#41;", "", $text_detail);
                        $text_detail = str_replace("&quot;", "", $text_detail);
                        ?>
                        {
                            text: [
                                '',
                                { text: '                                                                        ', margin:"10,10,0,0"}

                            ]
                        },
                        {
                            text: [
                                '',
                                { text: '<?echo $arItems["DISPLAY_ACTIVE_FROM"]?>', color:'grey', margin:"10,10,0,0"}

                            ]
                        },
                        {
                            text: [
                                '',
                                { text: 'Вопрос <?//echo $count?>', fontWeight:"bold", fontSize:16, color:'black', margin:"10,10,0,0"}

                            ]
                        },
                        {
                            text: [
                                '',
                                { text: '<?echo $text?>', margin:"10,10,0,0"}

                            ]
                        },
                        {
                            text: [
                                '',
                                { text: '                                                                        ', margin:"10,10,0,0"}

                            ]
                        },
                        {
                            text: [
                                '',
                                { text: 'Ваш ответ:', fontWeight:"bold", fontSize:16, color:'black', margin:"10,10,0,0"}

                            ]
                        },
                        {
                            text: [
                                '',
                                { text: '<?echo $text_detail?>', margin:"10,10,0,0"}

                            ]
                        },
                        {
                            text: [
                                '',
                                { text: '                                                                        ', margin:"10,10,0,0"}

                            ]
                        },
                        {
                            text: [
                                '',
                                { text: '                                                                        ', margin:"10,10,0,0"}

                            ]
                        },
                    <? $count++;
                        endforeach;?>
                    ],
                    styles: {
                        header: {
                            fontSize:25,
                            bold:true,
                            alignment:'right'
                        }
                    }
                }

                pdfMake.createPdf(docInfo).download('otchet-<?=$_REQUEST["date_filter_min"]?>_<?=$_REQUEST["date_filter_max"]?>.pdf');

            });
        });

    </script>
<?endif;
/*print "<pre>";
print_r($arResult);
print "</pre>";*/
?>
<ol>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<li class="news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
			<span class="news-date-time"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
		<?endif?>
		<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
				<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><b><?echo $arItem["NAME"]?></b></a><br />
			<?else:?>
				<b><?echo $arItem["NAME"]?></b><br />
			<?endif;?>
		<?endif;?>
		<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
			<?echo $arItem["~DETAIL_TEXT"];?>
		<?endif;?>
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<div style="clear:both"></div>
		<?endif?>
	</li>
<?endforeach;?>
</ol>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
<style>
    #coont font.text:nth-child(2){display:none;}
    #coont {display: inline-block;}
    a.add_bloger {
        background-color: #85092D;
        color: #FFFFFF;
        display: block;
        font-family: "Times New Roman",serif;
        font-size: 18px;
        font-style: italic;
        line-height: 28px;
        text-decoration: none;
        width: 200px;
        height: 29px;
        text-align: center;
    }
    #save_otchet{
        float: right;
        display: inline-block;
    }

</style>