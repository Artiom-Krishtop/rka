<?
/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();
?>

<div class="bx-auth-profile">

<?ShowError($arResult["strProfileError"]);?>
<?
if ($arResult['DATA_SAVED'] == 'Y')
	ShowNote(GetMessage('PROFILE_DATA_SAVED'));
?>
<script type="text/javascript">
<!--
var opened_sections = [<?
$arResult["opened"] = $_COOKIE[$arResult["COOKIE_PREFIX"]."_user_profile_open"];
$arResult["opened"] = preg_replace("/[^a-z0-9_,]/i", "", $arResult["opened"]);
if (strlen($arResult["opened"]) > 0)
{
	echo "'".implode("', '", explode(",", $arResult["opened"]))."'";
}
else
{
	$arResult["opened"] = "reg";
	echo "'reg'";
}
?>];
//-->

var cookie_prefix = '<?=$arResult["COOKIE_PREFIX"]?>';
</script>
<form method="post" name="form3" action="<?=$arResult["FORM_TARGET"]?>" enctype="multipart/form-data">
<?=$arResult["BX_SESSION_CHECK"]?>
<input type="hidden" name="lang" value="<?=LANG?>" />
<input type="hidden" name="ID" value=<?=$arResult["ID"]?> />

	<?
	if ($arResult["INCLUDE_FORUM"] == "Y")
	{
	?>

<div class="profile-link profile-user-div-link"><a title="<?=GetMessage("USER_SHOW_HIDE")?>" href="javascript:void(0)" onclick="SectionClick('forum')"><?=GetMessage("forum_INFO")?></a></div>
<div id="user_div_forum" class="profile-block-<?=strpos($arResult["opened"], "forum") === false ? "hidden" : "shown"?>">
<table class="data-table profile-table">
	<thead>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
	</thead>
	<tbody>
    

		<tr>
			<td><?=GetMessage("forum_SHOW_NAME")?></td>
			<td><input type="hidden" name="forum_SHOW_NAME" value="N" /><input type="checkbox" name="forum_SHOW_NAME" value="Y" <?if ($arResult["arForumUser"]["SHOW_NAME"]=="Y") echo "checked=\"checked\"";?> /></td>
		</tr>
    <tr>
        <td><?=GetMessage("forum_ALLOW_POST")?></td>
        <td><input type="hidden" name="forum_ALLOW_POST" value="N" /><input type="checkbox" name="forum_ALLOW_POST" value="Y" <?if ($arResult["arForumUser"]["ALLOW_POST"]=="Y") echo "checked=\"checked\"";?> /></td>
    </tr>
    <tr>
        <td>Не показывать в списке "Сейчас на форуме"</td>
        <td><input type="hidden" name="forum_HIDE_FROM_ONLINE" value="N" /><input type="checkbox" name="forum_HIDE_FROM_ONLINE" value="Y" <?if ($arResult["arForumUser"]["HIDE_FROM_ONLINE"]=="Y") echo "checked=\"checked\"";?> /></td>
    </tr>
    <tr>
        <td>Включать свои сообщения в рассылку</td>
        <td><input type="hidden" name="forum_SUBSC_GET_MY_MESSAGE" value="N" /><input type="checkbox" name="forum_SUBSC_GET_MY_MESSAGE" value="Y" <?if ($arResult["arForumUser"]["SUBSC_GET_MY_MESSAGE"]=="Y") echo "checked=\"checked\"";?> /></td>
    </tr>
		<tr>
			<td><?=GetMessage('forum_DESCRIPTION')?></td>
			<td><input type="text" name="forum_DESCRIPTION" maxlength="255" value="<?=$arResult["arForumUser"]["DESCRIPTION"]?>" /></td>
		</tr>
		<tr>
			<td><?=GetMessage('forum_INTERESTS')?></td>
			<td><textarea cols="30" rows="5" name="forum_INTERESTS"><?=$arResult["arForumUser"]["INTERESTS"]; ?></textarea></td>
		</tr>
		<tr>
			<td><?=GetMessage("forum_SIGNATURE")?></td>
			<td><textarea cols="30" rows="5" name="forum_SIGNATURE"><?=$arResult["arForumUser"]["SIGNATURE"]; ?></textarea></td>
		</tr>
		<tr>
			<td><?=GetMessage("forum_AVATAR")?></td>
			<td><?=$arResult["arForumUser"]["AVATAR_INPUT"]?>
			<?
			if (strlen($arResult["arForumUser"]["AVATAR"])>0)
			{
			?>
				<br /><?=$arResult["arForumUser"]["AVATAR_HTML"]?>
			<?
			}
			?></td>
		</tr>
	</tbody>
</table>
</div>

	<?
	}
	?>
	
    <div class="profile-link profile-user-div-link">
        <a href="/personal/add-blog/" class="root-item-selected">Написать в блог</a>
    </div>
    <div class="profile-link profile-user-div-link">
        <a href="/personal/your_comments/" class="root-item-selected">Читать комментарии к блогу</a>
    </div>
    <div class="profile-link profile-user-div-link">
        <a href="/personal/comments_quest/" class="root-item-selected">Читать комментарии к ответам</a>
    </div>
	<?if ($arResult["INCLUDE_LEARNING"] == "Y"):?>
	<div class="profile-link profile-user-div-link"><a title="<?=GetMessage("USER_SHOW_HIDE")?>" href="javascript:void(0)" onclick="SectionClick('learning')"><?=GetMessage("learning_INFO")?></a></div>
	<div id="user_div_learning" class="profile-block-<?=strpos($arResult["opened"], "learning") === false ? "hidden" : "shown"?>">
	<table class="data-table profile-table">
		<thead>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?=GetMessage("learning_PUBLIC_PROFILE");?>:</td>
				<td><input type="hidden" name="student_PUBLIC_PROFILE" value="N" /><input type="checkbox" name="student_PUBLIC_PROFILE" value="Y" <?if ($arResult["arStudent"]["PUBLIC_PROFILE"]=="Y") echo "checked=\"checked\"";?> /></td>
			</tr>
			<tr>
				<td><?=GetMessage("learning_RESUME");?>:</td>
				<td><textarea cols="30" rows="5" name="student_RESUME"><?=$arResult["arStudent"]["RESUME"]; ?></textarea></td>
			</tr>

			<tr>
				<td><?=GetMessage("learning_TRANSCRIPT");?>:</td>
				<td><?=$arResult["arStudent"]["TRANSCRIPT"];?>-<?=$arResult["ID"]?></td>
			</tr>
		</tbody>
	</table>
	</div>
	<?endif;?>
	<?if($arResult["IS_ADMIN"]):?>
	<div class="profile-link profile-user-div-link"><a title="<?=GetMessage("USER_SHOW_HIDE")?>" href="javascript:void(0)" onclick="SectionClick('admin')"><?=GetMessage("USER_ADMIN_NOTES")?></a></div>
	<div id="user_div_admin" class="profile-block-<?=strpos($arResult["opened"], "admin") === false ? "hidden" : "shown"?>">
	<table class="data-table profile-table">
		<thead>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?=GetMessage("USER_ADMIN_NOTES")?>:</td>
				<td><textarea cols="30" rows="5" name="ADMIN_NOTES"><?=$arResult["arUser"]["ADMIN_NOTES"]?></textarea></td>
			</tr>
		</tbody>
	</table>
	</div>
	<?endif;?>
    <div class="profile-link profile-user-div-link">
        <a href="/personal/subscribe/" class="root-item-selected">Подписка</a>
    </div>
    <p><?echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?></p>
    <?
        $arr = [
            'Январь',
            'Февраль',
            'Март',
            'Апрель',
            'Май',
            'Июнь',
            'Июль',
            'Август',
            'Сентябрь',
            'Октябрь',
            'Ноябрь',
            'Декабрь'
        ];
        $month = date('n')-1;
        $month_prev = date('n')-2;
        $month_prev2 = date('n')-3;
        $month_prev3 = date('n')-4;
        $month_prev4 = date('n')-10;
        $month_min = date("Y-m-01");
        $month_max = date("Y-m-d");
        $month_prev_min = date("Y-m-01", strtotime("-1 month"));
        $month_prev_max = date("Y-m-t", strtotime("-1 month"));
        $month_prev2_min = date("Y-m-01", strtotime("-2 month"));
        $month_prev2_max = date("Y-m-t", strtotime("-2 month"));
        $month_prev3_min = date("Y-m-01", strtotime("-9 month"));
        $month_prev3_max = date("Y-m-t", strtotime("-3 month"));
        
        ?>
    <?php
    if (strpos($month_prev_min, "-01-") != false) {$m = 'Январь';
    }elseif (strpos($month_prev_min, "-02-") != false) {$m = 'Февраль';
    }elseif (strpos($month_prev_min, "-03-") != false) {$m = 'Март';
    }elseif (strpos($month_prev_min, "-04-") != false) {$m = 'Апрель';
    }elseif (strpos($month_prev_min, "-05-") != false) {$m = 'Май';
    }elseif (strpos($month_prev_min, "-06-") != false) {$m = 'Июнь';
    }elseif (strpos($month_prev_min, "-07-") != false) {$m = 'Июль';
    }elseif (strpos($month_prev_min, "-08-") != false) {$m = 'Август';
    }elseif (strpos($month_prev_min, "-09-") != false) {$m = 'Сентябрь';
    }elseif (strpos($month_prev_min, "-10-") != false) {$m = 'Октябрь';
    }elseif (strpos($month_prev_min, "-11-") != false) {$m = 'Ноябрь';
    }elseif (strpos($month_prev_min, "-12-") != false) {$m = 'Декабрь';}

    if (strpos($month_prev2_min, "-01-") != false) {$m2 = 'Январь';
    }elseif (strpos($month_prev2_min, "-02-") != false) {$m2 = 'Февраль';
    }elseif (strpos($month_prev2_min, "-03-") != false) {$m2 = 'Март';
    }elseif (strpos($month_prev2_min, "-04-") != false) {$m2 = 'Апрель';
    }elseif (strpos($month_prev2_min, "-05-") != false) {$m2 = 'Май';
    }elseif (strpos($month_prev2_min, "-06-") != false) {$m2 = 'Июнь';
    }elseif (strpos($month_prev2_min, "-07-") != false) {$m2 = 'Июль';
    }elseif (strpos($month_prev2_min, "-08-") != false) {$m2 = 'Август';
    }elseif (strpos($month_prev2_min, "-09-") != false) {$m2 = 'Сентябрь';
    }elseif (strpos($month_prev2_min, "-10-") != false) {$m2= 'Октябрь';
    }elseif (strpos($month_prev2_min, "-11-") != false) {$m2 = 'Ноябрь';
    }elseif (strpos($month_prev2_min, "-12-") != false) {$m2 = 'Декабрь';}

    if (strpos($month_min, "-01-") != false) {$mm = 'Январь';
    }elseif (strpos($month_min, "-02-") != false) {$mm = 'Февраль';
    }elseif (strpos($month_min, "-03-") != false) {$mm = 'Март';
    }elseif (strpos($month_min, "-04-") != false) {$mm = 'Апрель';
    }elseif (strpos($month_min, "-05-") != false) {$mm = 'Май';
    }elseif (strpos($month_min, "-06-") != false) {$mm = 'Июнь';
    }elseif (strpos($month_min, "-07-") != false) {$mm = 'Июль';
    }elseif (strpos($month_min, "-08-") != false) {$mm = 'Август';
    }elseif (strpos($month_min, "-09-") != false) {$mm = 'Сентябрь';
    }elseif (strpos($month_min, "-10-") != false) {$mm= 'Октябрь';
    }elseif (strpos($month_min, "-11-") != false) {$mm = 'Ноябрь';
    }elseif (strpos($month_min, "-12-") != false) {$mm = 'Декабрь';}

    if (strpos($month_prev3_min, "-01-") != false) {$mm3 = 'Январь';
    }elseif (strpos($month_prev3_min, "-02-") != false) {$mm3 = 'Февраль';
    }elseif (strpos($month_prev3_min, "-03-") != false) {$mm3 = 'Март';
    }elseif (strpos($month_prev3_min, "-04-") != false) {$mm3 = 'Апрель';
    }elseif (strpos($month_prev3_min, "-05-") != false) {$mm3 = 'Май';
    }elseif (strpos($month_prev3_min, "-06-") != false) {$mm3 = 'Июнь';
    }elseif (strpos($month_prev3_min, "-07-") != false) {$mm3= 'Июль';
    }elseif (strpos($month_prev3_min, "-08-") != false) {$mm3 = 'Август';
    }elseif (strpos($month_prev3_min, "-09-") != false) {$mm3 = 'Сентябрь';
    }elseif (strpos($month_prev3_min, "-10-") != false) {$mm3 = 'Октябрь';
    }elseif (strpos($month_prev3_min, "-11-") != false) {$mm3 = 'Ноябрь';
    }elseif (strpos($month_prev3_min, "-12-") != false) {$mm3 = 'Декабрь';}

    if (strpos($month_prev3_max, "-01-") != false) {$m3 = 'Январь';
    }elseif (strpos($month_prev3_max, "-02-") != false) {$m3 = 'Февраль';
    }elseif (strpos($month_prev3_max, "-03-") != false) {$m3 = 'Март';
    }elseif (strpos($month_prev3_max, "-04-") != false) {$m3 = 'Апрель';
    }elseif (strpos($month_prev3_max, "-05-") != false) {$m3 = 'Май';
    }elseif (strpos($month_prev3_max, "-06-") != false) {$m3 = 'Июнь';
    }elseif (strpos($month_prev3_max, "-07-") != false) {$m3= 'Июль';
    }elseif (strpos($month_prev3_max, "-08-") != false) {$m3 = 'Август';
    }elseif (strpos($month_prev3_max, "-09-") != false) {$m3 = 'Сентябрь';
    }elseif (strpos($month_prev3_max, "-10-") != false) {$m3 = 'Октябрь';
    }elseif (strpos($month_prev3_max, "-11-") != false) {$m3 = 'Ноябрь';
    }elseif (strpos($month_prev3_max, "-12-") != false) {$m3 = 'Декабрь';}
    ?>
        <h2>Скачать отчет за: </h2>
        <div class="col-md-12" style="overflow: hidden;">
            <div class="col-md-6">
                <a target="_blank" id="save_pdf" href="/personal/answered/?search_date=Y&date_filter_min=<?echo $month_prev2_min?>&date_filter_max=<?echo $month_prev2_max?>" style="color:#fff" class="add_blog save_pdf"><?echo $m2//$arr[$month_prev2]?></a>
            </div>
            <div class="col-md-6">
                <a target="_blank" id="save_pdf" href="/personal/answered/?search_date=Y&date_filter_min=<?echo $month_prev_min?>&date_filter_max=<?echo $month_prev_max?>" style="color:#fff" class="add_blog save_pdf"><?echo $m //$arr[$month_prev]?></a>
            </div>
            <div class="col-md-6">
                <a target="_blank" id="save_pdf" href="/personal/answered/?search_date=Y&date_filter_min=<?echo $month_min?>&date_filter_max=<?echo $month_max?>" style="color:#fff" class="add_blog save_pdf"><?echo $mm //$arr[$month]?></a>
            </div>
        </div>
        <div class="col-md-12" style="overflow: hidden;">
            <div class="col-md-6">
                <a target="_blank" id="save_pdf" href="/personal/answered/?search_date=Y&date_filter_min=<?echo $month_prev3_min?>&date_filter_max=<?echo $month_prev3_max?>" style="color:#fff" class="add_blog save_pdf"> <?echo $mm3//$arr[$month_prev4]?> - <?echo $m3 //$arr[$month_prev3]?></a>
            </div>
        </div>
    <?/* <script src='/bitrix/templates/cor/components/bitrix/main.profile/profile/js/pdfmake.min.js'></script>
        <script src='/bitrix/templates/cor/components/bitrix/main.profile/profile/js/vfs_fonts.js'></script>
        <script>
            jQuery(document).ready(function ($) {
                jQuery(".save_pdf").on("click", function(){
                    event.preventDefault();
                    var docInfo = {
                        info: {
                            title:'Тестовый документ PDF',
                            author:'Viktor',
                            subject:'Theme',
                            keywords:'Ключевые слова'
                        },
                        pageSize:'A4',
                        pageOrientation:'portrait',//'portrait'
                        pageMargins:[50,50,30,60],

                        header:function(currentPage,pageCount) {
                            return {
                                text: currentPage.toString() + 'из' + pageCount,
                                alignment:'right',
                                margin:[0,30,10,50]
                            }
                        },
                        footer:[
                            {
                                text:'Сгенерировано на rka.by | Разработано Artismedia.by',
                                alignment:'center',//left  right
                            }
                        ],
                        content: [
                            {
                                text:'-Отчет за месяц-',
                                fontSize:20,
                                margin:[10,10,0,0]
                                //pageBreak:'after'
                            },
                            {
                                text:'-----------------------------------------------------------------------------',
                                fontSize:20,
                                margin:[0,0,20,0]
                                //pageBreak:'after'
                            },
                            {
                                text: [
                                    '',
                                    { text: 'Все вопросы', link: this.href, decoration: 'underline', cursor:'pointer', margin:"10,10,0,0"}

                                ]
                            },
                        ],
                        styles: {
                            header: {
                                fontSize:25,
                                bold:true,
                                alignment:'right'
                            }
                        }
                    }

                    pdfMake.createPdf(docInfo).download('name.pdf');
                    
                });
            });

        </script>*/?>


    <?/*<p><input type="submit" name="save" value="<?=(($arResult["ID"]>0) ? GetMessage("MAIN_SAVE") : GetMessage("MAIN_ADD"))?>"></p>*/?>
    <ul class="menu">
        <li class="leaf"><a href="/metodicheskie-rekomendacii/" title="Методические рекомендации утвержденные Советом РКА">Методические рекомендации утвержденные Советом РКА</a></li>
        <li class="leaf"><a href="/postanovleniya-soveta-rka/" title="Постановления Совета РКА">Постановления Совета РКА</a></li>
    </ul>
</form>
</div>