<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "");
$APPLICATION->SetPageProperty("description", "");
$APPLICATION->SetTitle("Ответ на вопрос");
?>
<style>
    div.status {
        background-image: url(/bitrix/templates/cor/components/bitrix/news/not_answered/bitrix/news.list/.default/message-24-ok.png);
        border-color: #be7;
        background-color:#f8fff0;
    }
    div.messages {
        background-position: 8px 8px;
        background-repeat: no-repeat;
        border: 1px solid;
        padding: 10px 10px 10px 50px;
        margin-bottom: 20px;
    }
    div.status, .ok {
        color: #234600;
    }
    #no_active{
        display:inline-block;
        float:left;
    }
</style>
<?CModule::IncludeModule("iblock");
$arFilter = Array("IBLOCK_ID"=>16, "ID"=>$_REQUEST["answer"], "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter);
if ($ob = $res->GetNextElement()){;
    $arFields = $ob->GetFields(); // поля элемента
    $arProps = $ob->GetProperties(); // свойства элемента
}
$orig_user =  $arProps['F_NAME']['VALUE'];
$orig_phone =  $arProps['F_PHONE']['VALUE'];
$resr = CUser::GetByID($USER->GetID());
//$resr = CUser::GetByID(13525);
/*if($ar_res = $resr->GetNext()){
    $arNAME = $ar_res;
}
$name = $arNAME['LAST_NAME'].' '.$arNAME['NAME'].' '.$arNAME['SECOND_NAME'];*/
if($arFields["ACTIVE"]=="Y") {
    ?>
    <div id="success" style="display: none;">Ответ отредактирован.</div>
    <div id="error" style="display: none; color:red;">Пожалуйста, удалите Ваш ответ перед снятием с публикации.</div>
    <form class="node-form node-faq-form" name="otvet" enctype="multipart/form-data"
          action="/faq_ask/unanswered/index_ans.php" method="post" id="faq-node-form3" accept-charset="UTF-8"
          onsubmit="SaveResults(); return false;">
        <input type="hidden" name="changed" value="">
        <input type="hidden" name="form_build_id" value="">
        <input type="hidden" name="form_id" value="faq_node_form">
        <input type="hidden" id="advo_id" name="advo_id" value="<?= $USER->GetID() ?>">
        <input type="hidden" id="elem_id" name="elem_id" value="<?= $arFields['ID'] ?>">
        <input type="hidden" id="colleg_id" name="colleg_id" value="<?= $arProps['F_COLLEG']['VALUE'] ?>">
        <input type="hidden" id="email_id" name="email_id" value="<?= $arProps['F_EMAIL']['VALUE'] ?>">
        <input type="hidden" id="pub_id" name="pub_id" value="<?= $arProps['PUBLIC_DATE']['VALUE'] ?>">
        <div>
            <div class="form-item form-type-textarea form-item-detailed-question">
                <input type="checkbox" id="no_active" name="no_active" value="Y">
                <label for="edit-detailed-question"><h4>Снять с публикации</h4></label>
                <div class="description">Перед тем, как снять вопрос с публикации, удалите Ваш ответ.</div>
            </div>
            <div class="form-item form-type-textarea form-item-detailed-question">
                <label for="edit-detailed-question"><h4>Вопрос</h4></label>
                <?= $arFields['~PREVIEW_TEXT'] ?>
            </div>
            <div class="form-item form-type-textarea form-item-detailed-question">
                <label for="edit-detailed-question"><h4>Содержимое<span class="form-required" style="color:red;"
                                                                        title="Обязательное поле">*</span></h4></label>
                <div class="form-textarea-wrapper resizable textarea-processed resizable-textarea">
                    <?
                    $APPLICATION->IncludeComponent(
                        "bitrix:fileman.light_editor",
                        "",
                        array(
                            "CONTENT" => $arFields['~DETAIL_TEXT'],
                            "INPUT_NAME" => "otvet_detail",
                            "INPUT_ID" => "otvet_detail",
                            "WIDTH" => "100%",
                            "HEIGHT" => "300px",
                            "RESIZABLE" => "Y",
                            "AUTO_RESIZE" => "Y",
                            "VIDEO_ALLOW_VIDEO" => "Y",
                            "VIDEO_MAX_WIDTH" => "640",
                            "VIDEO_MAX_HEIGHT" => "480",
                            "VIDEO_BUFFER" => "20",
                            "VIDEO_LOGO" => "",
                            "VIDEO_WMODE" => "transparent",
                            "VIDEO_WINDOWLESS" => "Y",
                            "VIDEO_SKIN" => "/bitrix/components/bitrix/player/mediaplayer/skins/bitrix.swf",
                            "USE_FILE_DIALOGS" => "Y",
                            "ID" => "",
                            "JS_OBJ_NAME" => ""
                        ),
                        false
                    );
                    ?>
                    <div class="grippie"></div>
                </div>
                <div class="description">Введите ответ на вопрос</div>
            </div>
            <?
            $arFilterw = Array("IBLOCK_ID" => 21);
            $rw = CIBlockElement::GetList(Array(), $arFilterw);
            while ($obw = $rw->GetNextElement()) {
                $arFieldw = $obw->GetFields(); // поля элемента
                $pravo[$arFieldw["ID"]] = $arFieldw["NAME"];
            }
            foreach ($arProps['OTR_PRAVO']['VALUE'] as $key => $arPravo) {
                $arPravos[] = $arPravo;
            }
            ?>
            <div class="views-exposed-widget views-widget-filter-field_activity_tid law-field">
                <label for="edit-field-activity-tid"><h4> Отрасль права<span class="form-required" style="color:red;"
                                                                             title="Обязательное поле">*</span></h4>
                </label>
                <div class="views-widget">
                    <div class="form-item form-type-select form-item-field-activity-tid">
                        <select required multiple="multiple" size="9" name="PRAVO[]" id="PRAVO" class="form-select">
                            <?

                            foreach ($pravo as $keys => $arPr) { ?>
                                <option <?
                                        if ($_REQUEST["PRAVO"] == $keys || in_array($keys, $arPravos)): ?>selected=''<?
                                endif; ?> value="<?= $keys ?>"><?= $arPr ?></option>
                                <?
                            } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-item form-type-textarea form-item-detailed-question">
                <label for="edit-field-activity-tid"><h4><?= $arProps['F_NAME']['NAME'] ?>:</h4></label>
                <input style="width: 40%;" type="text" name="ORIG_NAME" id="ORIG_NAME" class="form__field"
                       value="<?= CUtil::JSEscape($orig_user) ?>" readonly/>
            </div>
            <div class="form-item form-type-textarea form-item-detailed-question">
                <label for="edit-field-activity-tid"><h4><?= $arProps['F_PHONE']['NAME'] ?>:</h4></label>
                <input style="width: 40%;" type="text" name="ORIG_PHONE" id="ORIG_PHONE" class="form__field"
                       value="<?= CUtil::JSEscape($orig_phone) ?>" readonly/>
            </div>
            <input type="submit" class="btn btn-primary btn-group-lg" name="submit" value="Отправить">

    </form>

    <script>
        function SaveResults() {
            var form = document.forms.otvet;
            var formData = new FormData(form);
            //$('#wait_block').show();
            formData.append('advo_id', jQuery('#advo_id').val());
            formData.append('elem_id', jQuery('#elem_id').val());
            formData.append('colleg_id', jQuery('#colleg_id').val());
            formData.append('email_id', jQuery('#email_id').val());
            formData.append('pub_id', jQuery('#pub_id').val());
            formData.append('ORIG_NAME', jQuery('#ORIG_NAME').val());
            formData.append('ORIG_PHONE', jQuery('#ORIG_PHONE').val());
            formData.append('otvet_detail', jQuery('#otvet_detail').val());
            jQuery("no_active[0].checked").each(function () {
                formData.append(jQuery(this).val());
            });
            jQuery('select[name="PRAVO[]"]').change(function () {
                if (jQuery('select[name="PRAVO[]"] option').attr("selected", "selected")) {
                    formData.append(jQuery(this).val());
                }
            });

            console.log(formData);

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "/personal/my-answers/ajax.php");

            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        data = xhr.responseText;
                        var result = jQuery.parseJSON(data);
                        console.log(data);
                        if (data == 0) {
                            jQuery('#faq-node-form3').remove();
                            jQuery('.messages.status').remove();
                            jQuery("#error").remove();
                            //$('#wait_block').hide();
                            jQuery("#success").show();
                            return false;
                        }
                        else if (data == 1) {
                            //jQuery('#faq-node-form3').remove();
                            //jQuery('.messages.status').remove();
                            jQuery("#error").show();
                            return false;
                        }
                        else {
                            return false;
                        }
                    }
                }
            };

            xhr.send(formData);
        }


        //jQuery('textarea[name="detailed_question]');
        function startDrag(e) {
            staticOffset = textarea.height() - e.pageY;
            textarea.css('opacity', 0.25);
            $(document).mousemove(performDrag).mouseup(endDrag);
            return false;
        }

        //return typeof c !== "undefined" && !c.event.triggered ? c.event.handle.apply(o.elem,
        //  arguments) : B
    </script>


    <? /*$APPLICATION->IncludeComponent(
	"bitrix:form.result.new",
	"cormessage",
	array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"COMPONENT_TEMPLATE" => "cormessage",
		"EDIT_URL" => "",
		"HIDE_CAPTION" => "Y",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"LIST_URL" => "",
		"SEF_MODE" => "N",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "N",
		"WEB_FORM_ID" => "3",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false
);
<script>
var jert = jQuery('form[name="SIMPLE_FORM_3"]');
if(!jert){
console.log(jert);
	//jQuery(".field-item.even").css("display","none");
	jQuery(".field-item.even").addClass('js-hidden');
}
</script>
<style>
.js-hidden {
	display:none;
}
</style>*/
    /*}else{?>
        <p>Ответ на этот вопрос уже дан</p>
    <?}*/
}?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>