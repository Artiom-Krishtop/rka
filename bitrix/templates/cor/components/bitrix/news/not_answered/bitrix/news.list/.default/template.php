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
<div class="news-list view view-faq view-id-faq view-display-id-page">
    <div class="view-content">
    <?if($arParams["DISPLAY_TOP_PAGER"]):?>
        <?=$arResult["NAV_STRING"]?><br />
    <?endif;?>
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="news-item views-row views-row-even" id="<?=$this->GetEditAreaId($arItem['ID']);?>" style="margin-bottom:30px;">
            <?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
                <?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
                    <?echo $arItem["~PREVIEW_TEXT"]?><br />
                <?else:?>
                    <b><?echo $arItem["NAME"]?></b><br />
                <?endif;?>
            <?endif;?>
            <div class="list-text" style="margin-bottom: 10px;">
                <?

                /*print "<pre>";
                print_r($prop_fields);
                print "</pre>";*/
                ?>
    </div>
        <div class="">
            <?$vopros =  $arItem['~PREVIEW_TEXT'];?>
            <?$orig_user =  $arItem['PROPERTIES']['F_NAME']['VALUE'];?>
            <?$orig_phone =  $arItem['PROPERTIES']['F_PHONE']['VALUE'];?>
            <?//$advo = '['.$arResult['DISPLAY_PROPERTIES']['USER']['VALUE'].'] '.$ar_res['LAST_NAME'].' '.$ar_res['NAME'].' '.$ar_res['SECOND_NAME'];?>
            <?
            $props_info = array();
            $properties = CIBlockProperty::GetList(Array("sort"=>"asc", "name"=>"asc"), Array("ACTIVE"=>"Y", "IBLOCK_ID"=>16));
            while ($prop_fields = $properties->GetNext())
            {
                $props_info[$prop_fields['CODE']]  = $prop_fields;
                if ($prop_fields['PROPERTY_TYPE']=='L') {
                    $cheboxes_ru = array();
                    $property_enums = CIBlockPropertyEnum::GetList(Array("SORT"=>"ASC"), Array("IBLOCK_ID"=>$prop_fields['IBLOCK_ID'], "CODE"=>$prop_fields['CODE']));
                    while($enum_fields = $property_enums->GetNext())
                    {
                        $cheboxes_ru[] = array("ID"=>$enum_fields["ID"], "NAME" => $enum_fields["VALUE"], "XML_ID" => $enum_fields["XML_ID"]);
                    }
                    $props_info[$prop_fields['CODE']]['VALUES'] = $cheboxes_ru;
                }

            }
            $resr = CUser::GetByID($USER->GetID());
            if($ar_res = $resr->GetNext()){
                $arNAME = $ar_res;
            }
            $name = $arNAME['LAST_NAME'].' '.$arNAME['NAME'].' '.$arNAME['SECOND_NAME'];
            ?>
            <form method="post" name="answer_<?=$arItem['ID']?>" action="" class="form answered" id="answered_<?=$arItem['ID']?>" style="display:none;">
                <input type="hidden" id="advo_id" name="advo_id" value="<?=$USER->GetID()?>">
                <input type="hidden" id="elem_id" name="elem_id" value="<?=$arItem['ID']?>">
                <div id="success" style="display: none;color:green;text-align: center;font-size: 20px;">Ваш ответ отправлен.</div>
                <div class="messages status">
                    Вопрос назначен пользователю <?=$name;?>.
                </div>
                <label for="QUEST" class="form__label">Вопрос:</label>
                <div class="prev_text"><?=$arItem['~PREVIEW_TEXT']?></div>
                <label for="detail" class="form__label">Ваш ответ:</label>
                <textarea required type="text" name="detail" id="detail" class="form__field"></textarea>
                <label for="q_answer" class="form__label">Выбирете отрасль права:</label>
                <?$arFilterw = Array("IBLOCK_ID"=>21);
                $rw = CIBlockElement::GetList(Array(), $arFilterw);
                while ($obw = $rw->GetNextElement()){
                    $arFieldw = $obw->GetFields(); // поля элемента
                    $pravo[$arFieldw["ID"]]=$arFieldw["NAME"];
                }
                ?>
                <div class="views-exposed-widget views-widget-filter-field_activity_tid law-field">
                    <div class="views-widget">
                        <div class="form-item form-type-select form-item-field-activity-tid">
                            <select required multiple="multiple" size="9" name="PRAVO[]" id="PRAVO"  class="form-select">
                                <?foreach ($pravo as $keys => $arPr) {?>
                                    <option <?if ($_REQUEST["PRAVO"]==$keys):?>selected=''<?endif;?> value="<?=$keys?>"><?=$arPr?></option>
                                <?}?>
                            </select>
                        </div>
                    </div>
                </div>
                <label for="ORIG_NAME" class="form__label"><?=$arItem['PROPERTIES']['F_NAME']['NAME']?>:</label>
                <input type="text" name="ORIG_NAME" id="ORIG_NAME" class="form__field" value="<?=CUtil::JSEscape($orig_user)?>" readonly />
                <label for="ORIG_PHONE" class="form__label"><?=$arItem['PROPERTIES']['F_PHONE']['NAME']?>:</label>
                <input type="text" name="ORIG_PHONE" id="ORIG_PHONE" class="form__field" value="<?=CUtil::JSEscape($orig_phone)?>" readonly />
                <input type="submit" class="btn btn-primary btn-group-lg" name="submit" value="Отправить">
            </form>
            <script>
                jQuery("#answered_<?=$arItem['ID']?>").submit(function (e) { // Устанавливаем событие отправки для формы с id=form
                    e.preventDefault();
                    var form = document.forms.answer_<?=$arItem['ID']?>;
                    var formData = new FormData(form);
                    formData.append('advo_id', jQuery('#advo_id').val());
                    formData.append('elem_id', jQuery('#elem_id').val());
                    formData.append('detail', jQuery('#detail').val());
                    jQuery('select[name="PRAVO[]"]').change(function(){
                        if(jQuery('select[name="PRAVO[]"] option').attr("selected", "selected")){
                            formData.append(jQuery(this).val());
                        }
                    });
                    //console.log(formData);
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "/forms/answered.php");

                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4) {
                            if(xhr.status == 200) {
                                data = xhr.responseText;
                                console.log(data);
                                if(data == 0) {
                                    jQuery('.answered input').remove();
                                    jQuery('.answered textarea').remove();
                                    jQuery('.answered label').remove();
                                    jQuery('.answered .messages').remove();
                                    jQuery('.answered .prev_text').remove();
                                    jQuery('.answered .views-exposed-widget').remove();
                                    jQuery(".answered #success").show();
                                    //jQuery('#modal-form').remove();ß
                                    //$('#resultblock').remove();
                                    //$('#send_email_form').remove();
                                    //$('#wait_block').hide();
                                    //jQuery("#success").show();
                                    return false;
                                }
                                else if (data == 1) {
                                    return false;
                                }
                                else {
                                    return false;
                                }
                            }
                        }
                    };

                    xhr.send(formData);
                    return false;
                });
            </script>
            <!--<a data-fancybox data-src="#answered_<?=$arItem['ID']?>" href="#" class="fancyboxer">ответить</a>-->
            <a href="index_ans.php?answer=<?=$arItem['ID']?>&user=<?=$USER->GetID()?>" >ответить</a> |
            <?
            $public_date = FormatDate('d F Y',MakeTimeStamp($arItem['PUBLIC_DATE']['VALUE']), time());
            $active_date = FormatDate('d F Y',MakeTimeStamp($arItem['ACTIVE_FROM']), time());
            if(!empty($arItem['PUBLIC_DATE']['VALUE'])){?>
            <span><?=$public_date?></span>
            <?}else{?>
            <span><?=$active_date?></span>
            <?}?>
        </div>
            <?$db_list = CIBlockSection::GetList(array(), array('GLOBAL_ACTIVE' => 'Y', "IBLOCK_ID" => 15), true, array("ID", "NAME","UF_S_OLD_ID","SECTION_PAGE_URL"));
            while($section = $db_list->Fetch()) {
            $filter = $section['UF_S_OLD_ID'];
            if($section['UF_S_OLD_ID'] == $arItem['PROPERTIES']['F_COLLEG']['VALUE'] ||
               $section['ID'] == $arItem['PROPERTIES']['F_COLLEG']['VALUE']
            ){
            ?>
                <div>Кому: <a href="/kollegies/<?=$section['CODE']?>/"><?=$section['NAME']?></a></div>
            <?}}?>

        </div>
   
    <?endforeach;?>
    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
        <br /><?=$arResult["NAV_STRING"]?>
    <?endif;?>
    </div>
</div>