<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>
<?if ($_SESSION['answer_text']!=''):?>
    <?=$_SESSION['answer_text']; unset($_SESSION['answer_text']);?>
<?else:?>
    <?=$arResult["FORM_HEADER"]?>
    <div class="row mainform el-appeal">
        <div class="col col-md-12">
            <div class="inner-wrap">
                <?if ($arParams['HIDE_CAPTION']!='Y'):?>
                    <h3><?=$arResult['arForm']['NAME']?></h3>
                <?endif;?>
                <span><?=$arResult['arForm']['DESCRIPTION']?></span>
                <div class="webform clearfix">
                    <?
                    $rowCounter = 0;
                    $phone_name = 'phone';
                    foreach ($arResult['QUESTIONS'] as $code => $arField) {
                        if($code == 'SIMPLE_QUESTION_692')
                            $phone_name = 'form_text_'.$arField['STRUCTURE'][0]['ID'];
                        /* INPUT TYPE ___TEXT___ */
                        if ($arField['STRUCTURE'][0]['FIELD_TYPE']=='text') {
                            if ($rowCounter%2==0) {
                                ?><div class="row"><?
                            }
                            ?><div class="col col-md-12 form-group field-wrap text-wrap <?if ($arField['REQUIRED']=="Y") {?>req<?}?>"><div class="input"><?
                            ?><label class="control-label" for="<?=$code?>"><?
                            ?><?=$arField['CAPTION']?><?if ($arField['REQUIRED']=="Y") {?><span class="required"> <?=$arResult['REQUIRED_SIGN']?></span><?}?><?
                            ?></label><?
                            ?><input type="text" name="form_text_<?=$arField['STRUCTURE'][0]['ID']?>" class="<?if ($arField['REQUIRED']=="Y") {?>req-input<?}?> form-control<?=($code=='SIMPLE_QUESTION_692' ? ' phone' : '');?>" value="<?=$arResult['arrVALUES']['form_text_'.$arField['STRUCTURE'][0]['ID']]?>"<?=($arField['REQUIRED']=="Y" ? ' required' : '');?>><?
                            ?></div></div><?
                            if ($rowCounter%2!=0) {
                                ?></div><?
                            }
                            $rowCounter++;
                        /* INPUT TYPE ___DATE___ */
                        } else if ($arField['STRUCTURE'][0]['FIELD_TYPE']=='date') {
                            if ($rowCounter%2==0) {
                                ?><div class="row"><?
                            }
                            ?><div class="col col-md-6 calendar-wrap form-group field-wrap <?if ($arField['REQUIRED']=="Y") {?>req<?}?>"><div class="input"><?
                            ?><label class="control-label" for="<?=$code?>"><?
                            ?><?=$arField['CAPTION']?><?if ($arField['REQUIRED']=="Y") {?><span class="required"> <?=$arResult['REQUIRED_SIGN']?></span><?}?><?
                            ?></label><?
                            $APPLICATION->IncludeComponent("bitrix:main.calendar","cor",Array(
                                    "SHOW_INPUT" => "Y",
                                    "FORM_NAME" => $arResult['arForm']['SID'],
                                    "INPUT_NAME" => "form_date_".$arField['STRUCTURE'][0]['ID'],
                                    "INPUT_NAME_FINISH" => "-",
                                    "INPUT_VALUE" => $arField['VALUE'],
                                    "INPUT_VALUE_FINISH" => "",
                                    "SHOW_TIME" => "Y",
                                    "HIDE_TIMEBAR" => "Y",
                                    "REQUIRED" => $arField['REQUIRED']
                                )
                            );
                            ?></div></div><?
                            if ($rowCounter%2!=0) {
                                ?></div><?
                            }
                            $rowCounter++;
                        /* INPUT TYPE ___TEXTAREA___ */
                        } else if ($arField['STRUCTURE'][0]['FIELD_TYPE']=='textarea') {
                            if ($rowCounter%2==0) {
                                ?><div class="row"><?
                            }
                            ?><div class="col col-md-12 field-wrap textarea-wrap <?if ($arField['REQUIRED']=="Y") {?>req<?}?>"><div class="input"><?
                            ?><label class="control-label" for="<?=$code?>"><?
                            ?><?=$arField['CAPTION']?><?if ($arField['REQUIRED']=="Y") {?><span class="required"> <?=$arResult['REQUIRED_SIGN']?></span><?}?><?
                            ?></label><?
                            ?><textarea name="form_textarea_<?=$arField['STRUCTURE'][0]['ID']?>" class="form-control <?if ($arField['REQUIRED']=="Y") {?>req-input<?}?>"<?=($arField['REQUIRED']=="Y" ? ' required' : '');?>><?=$arResult['arrVALUES']['form_textarea_'.$arField['STRUCTURE'][0]['ID']]?></textarea><?/*<div class="text-triangle"><div class="inner-triangle"></div></div>*/?><?
                            ?></div></div><?
                            /*<div class="row">
                                <div class="col col-md-5 load-avatar">
                                    <div class="avatar-wrap"><img src="<?=SITE_DIR?>avatar-simple.png"></div>
                                    <a href="javascript:void(0)">Загрузить аватар</a>
                                </div>
                            </div>*/
                            if ($rowCounter%2!=0) {
                                ?></div><?
                            }
                            $rowCounter++;
                        /* INPUT TYPE ___RADIO___ */
                        } else if ($arField['STRUCTURE'][0]['FIELD_TYPE']=='radio') {
                            if ($rowCounter%2==0) {
                                ?><div class="row"><?
                            }
                            ?><div class="col col-md-6 field-wrap radio-group choice-wrap <?if ($arField['REQUIRED']=="Y") {?>req<?}?>"><?
                            ?><label class="control-label" for="<?=$code?>"><?
                            ?><?=$arField['CAPTION']?><?if ($arField['REQUIRED']=="Y") {?><span class="required"> <?=$arResult['REQUIRED_SIGN']?></span><?}?><?
                            ?></label><?
                            foreach ($arField['STRUCTURE'] as $variables) {
                                ?><div class="col col-md-12 radio"><?
                                ?><input type="radio" <?if ($variables['FIELD_PARAM']!="") {?>checked="checked"<?}?> name="form_radio_<?=$code?>" id="<?=$variables['ID']?>" value="<?=$variables['ID']?>"><?
                                ?><label for="<?=$variables['ID']?>"><?=$variables['MESSAGE']?></label><?
                                ?></div><?
                            }
                            ?></div><?
                            if ($rowCounter%2!=0) {
                                ?></div><?
                            }
                            $rowCounter++;
                        /* INPUT TYPE ___CHECKBOX___ */
                        } else if ($arField['STRUCTURE'][0]['FIELD_TYPE']=='checkbox') {
                            if ($rowCounter%2==0) {
                                ?><div class="row"><?
                            }
                            ?><div class="col col-md-6 field-wrap choice-wrap <?if ($arField['REQUIRED']=="Y") {?>req<?}?>"><?
                            ?><label class="control-label" for="<?=$code?>"><?
                            ?><?=$arField['CAPTION']?><?if ($arField['REQUIRED']=="Y") {?><span class="required"> <?=$arResult['REQUIRED_SIGN']?></span><?}?><?
                            ?></label><?
                            foreach ($arField['STRUCTURE'] as $variables) {
                                ?><div class="col col-md-12 checkbox"><?
                                ?><input type="checkbox" <?if (in_array($variables['ID'], $arResult['arrVALUES']['form_checkbox_'.$code])) {?>checked<?}?> name="form_checkbox_<?=$code?>[]" id="<?=$variables['ID']?>" value="<?=$variables['ID']?>"><?
                                ?><label for="<?=$variables['ID']?>"><?=$variables['MESSAGE']?></label><?
                                ?></div><?
                            }
                            ?></div><?
                            if ($rowCounter%2!=0) {
                                ?></div><?
                            }
                            $rowCounter++;
                        /* INPUT TYPE ___DROPDOWN___ */
                        } else if ($arField['STRUCTURE'][0]['FIELD_TYPE']=='dropdown') {
                            if ($rowCounter%2==0) {
                                ?><div class="row"><?
                            }
                            ?><div class="col col-md-6 field-wrap select-wrap <?if ($arField['REQUIRED']=="Y") {?>req<?}?>"><div class="input"><?
                            ?><label class="control-label" for="<?=$code?>"><?
                            ?><?=$arField['CAPTION']?><?if ($arField['REQUIRED']=="Y") {?><span class="required"> <?=$arResult['REQUIRED_SIGN']?></span><?}?><?
                            ?></label><?
                            ?><select class="form-control" name="form_dropdown_<?=$code?>" id="form_dropdown_<?=$code?>"<?=($arField['REQUIRED']=="Y" ? ' required' : '');?>><?
                            foreach ($arField['STRUCTURE'] as $variables) {
                                ?><option value="<?=$variables['ID']?>" <? if ($variables['FIELD_PARAM']!="") echo "selected"; ?>><?=$variables['MESSAGE']?></option><?
                            }
                            ?></select><?
                            ?></div></div><?
                            /*<div class="col col-md-6 field-wrap dropdown <?if ($arField['REQUIRED']=="Y") {?>req<?}?>">
                                <span>
                                    <?=$arField['CAPTION']?><?if ($arField['REQUIRED']=="Y") {?><span class="required"> <?=$arResult['REQUIRED_SIGN']?></span><?}?>
                                </span>
                                <div class="btn-group row col col-md-12">
                                    <button class="btn btn-default <?if ($arField['REQUIRED']=="Y") {?>req-input <?}?>col col-md-12 btn-sm dropdown-toggle dropdown-button" type="button" data-toggle="dropdown" aria-expanded="false">
                                        <?=$arField['STRUCTURE'][0]['MESSAGE']?> <span class="right-arrow-caret"></span>
                                    </button>
                                    <ul class="dropdown-menu col col-md-9" role="menu">
                                        <? foreach ($arField['STRUCTURE'] as $variables) { ?>
                                            <li><a href="javascript:void(0)" class="variable" data-value="<?=$variable['MESSAGE']?>"><?=$variables['MESSAGE']?></a></li>
                                            <? if ($variable['FIELD_PARAM']=="SELECTED") {
                                                $selected = $variable;
                                            }?>
                                        <? } ?>
                                    </ul>
                                </div>
                                <input type="hidden" name="<?=$code?>" value="<?=$selected['MESSAGE']?>">
                            </div>*/
                            if ($rowCounter%2!=0) {
                                ?></div><?
                            }
                            $rowCounter++;
                        /* INPUT TYPE ___EMAIL___ */
                        } if ($arField['STRUCTURE'][0]['FIELD_TYPE']=='email') {
                            if ($rowCounter%2==0) {
                                ?><div class="row"><?
                            }
                            ?><div class="col col-md-12 form-group field-wrap text-wrap <?if ($arField['REQUIRED']=="Y") {?>req<?}?>"><div class="input"><?
                            ?><label class="control-label" for="<?=$code?>"><?
                            ?><?=$arField['CAPTION']?><?if ($arField['REQUIRED']=="Y") {?><span class="required"> <?=$arResult['REQUIRED_SIGN']?></span><?}?><?
                            ?></label><?
                            ?><input type="email" value="<?=$arResult['arrVALUES']['form_email_'.$arField['STRUCTURE'][0]['ID']]?>" name="form_email_<?=$arField['STRUCTURE'][0]['ID']?>" class="<?if ($arField['REQUIRED']=="Y") {?>req-input<?}?> form-control"<?=($arField['REQUIRED']=="Y" ? ' required' : '');?>><?
                            ?></div></div><?
                            if ($rowCounter%2!=0) {
                                ?></div><?
                            }
                            $rowCounter++;
                            /* INPUT TYPE ___URL___ */
                        } else if ($arField['STRUCTURE'][0]['FIELD_TYPE']=='url') {
                            if ($rowCounter%2==0) {
                                ?><div class="row"><?
                            }
                            ?><div class="col col-md-6 form-group field-wrap text-wrap <?if ($arField['REQUIRED']=="Y") {?>req<?}?>"><div class="input"><?
                            ?><label class="control-label" for="<?=$code?>"><?
                            ?><?=$arField['CAPTION']?><?if ($arField['REQUIRED']=="Y") {?><span class="required"> <?=$arResult['REQUIRED_SIGN']?></span><?}?><?
                            ?></label><?
                            ?><input type="text" name="form_url_<?=$arField['STRUCTURE'][0]['ID']?>" class="<?if ($arField['REQUIRED']=="Y") {?>req-input<?}?> form-control"<?=($arField['REQUIRED']=="Y" ? ' required' : '');?>><?
                            ?></div></div><?
                            if ($rowCounter%2!=0) {
                                ?></div><?
                            }
                            $rowCounter++;
                        /* INPUT TYPE ___MYLTISELECT___ */
                        } else if ($arField['STRUCTURE'][0]['FIELD_TYPE']=='multiselect') {
                            if ($rowCounter%2==0) {
                                ?><div class="row"><?
                            }
                            ?><div class="col col-md-6 form-group field-wrap select-wrap <?if ($arField['REQUIRED']=="Y") {?>req<?}?>"><div class="input"><?
                            ?><label class="control-label" for="<?=$code?>"><?
                            ?><?=$arField['CAPTION']?><?if ($arField['REQUIRED']=="Y") {?><span class="required"> <?=$arResult['REQUIRED_SIGN']?></span><?}?><?
                            ?></label><?
                            ?><select multiple class="form-control" name="form_multiselect_<?=$code?>[]" id="form_multiselect_<?=$code?>[]"<?=($arField['REQUIRED']=="Y" ? ' required' : '');?>><?
                            foreach ($arField['STRUCTURE'] as $variables) {
                                ?><option <? if ($variables['FIELD_PARAM']!="") echo "selected"; ?> value="<?=$variables['ID']?>"><?=$variables['MESSAGE']?></option><?
                            }
                            ?></select><?
                            ?></div></div><?
                            if ($rowCounter%2!=0) {
                                ?></div><?
                            }
                            $rowCounter++;
                        /* INPUT TYPE ___IMAGE___ */
                        } else if ($arField['STRUCTURE'][0]['FIELD_TYPE']=='image' || $arField['STRUCTURE'][0]['FIELD_TYPE']=='file') {
                            if ($rowCounter%2==0) {
                                ?><div class="row"><?
                            }
                            ?><div class="col col-md-6 form-group field-wrap file-wrap <?if ($arField['REQUIRED']=="Y") {?>req<?}?>"><div class="input"><?
                            ?><label class="control-label" for="<?=$code?>"><?
                            ?><?=$arField['CAPTION']?><?if ($arField['REQUIRED']=="Y") {?><span class="required"> <?=$arResult['REQUIRED_SIGN']?></span><?}?><?
                            ?></label><?
                            ?><div class="file_upload"><?
                            ?><a href="javascript:void(0)" class="file-link"><?=GetMessage('MONOP_LOAD_'.$arField['STRUCTURE'][0]['FIELD_TYPE'])?></a><?
                            ?><input class="<?if ($arField['REQUIRED']=="Y") {?>req-input<?}?>" type="file" name="form_<?=$arField['STRUCTURE'][0]['FIELD_TYPE']?>_<?=$arField['STRUCTURE'][0]['ID']?>"<?=($arField['REQUIRED']=="Y" ? ' required' : '');?>><?
                            ?></div></div><?
                            ?></div><?
                            if ($rowCounter%2!=0) {
                                ?></div><?
                            }
                            $rowCounter++;
                        }
                    }
                    if ($rowCounter%2!=0) {?></div><?}
                    ?>
                <?if($arResult["WEB_FORM_NAME"] == "SIMPLE_FORM_4"):?>
                    <div class="licence_block bx_filter">
                        <input type="checkbox" id="licenses_inline_<?=$arResult["arForm"]["ID"]?>" <?=(COption::GetOptionString("aspro.allcorp2", "LICENCE_CHECKED", "N") == "Y" ? "checked" : "");?> name="licenses_popup" required value="Y">
                        <label for="licenses_inline_<?=$arResult["arForm"]["ID"]?>">
                            <?$APPLICATION->IncludeFile(SITE_DIR."include/licenses_text.php", Array(), Array("MODE" => "html", "NAME" => "LICENSES")); ?>
                        </label>
                    </div>
                <?endif;?>
                </div>
                <div class="row">
                    <?
                    if($arResult["isUseCaptcha"])
                    {
                        ?><div class="captcha_wrap col col-md-6 form-group field-wrap req"><?
                            ?><label for="captcha_<?=$arResult['WEB_FORM_NAME']?>" class="col col-md-12"><?=GetMessage("MSG_CAPTHA")?>: <span class="required"><?=$arResult['REQUIRED_SIGN']?></span><br /></label><?
                            ?><div class="row"><?
                                echo $arResult['CAPTCHA'];
                                /*?><div class="col col-md-6"><img class="captchaImg" src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHACode"]?>" alt="CAPTCHA"></div><br /><?
                                ?><div class="col col-md-6"><input class="form-control req-input" id="captcha_<?=$arResult['WEB_FORM_NAME']?>" type="text" name="captcha_word" size="30" maxlength="50" value=""></div><?
                                ?><input type="hidden" class="captchaSid" name="captcha_sid" value="<?=$arResult["CAPTCHACode"]?>"><?
                                ?><a id="reloadCaptcha" class="reloadCaptcha"><?=GetMessage('AR.CORP.RELOAD_CAPTCHA')?></a><?*/
                            ?></div><?
                        ?></div><?
                    }
                    ?>
                    <div class="col col-md-6 buttons">
                        <input type="hidden" name="PARAMS_HASH">
                        <input type="submit" class="btn btn-primary btn-group-lg col col-md-5" name="web_form_submit" value="<?=GetMessage('MSG_SEND_BUTTON')?>">
                        <?/*<input type="reset" class="btn  btn-group-lg col col-md-5" value="Сбросить">*/?>
                    </div>
                </div>
                <?/*<span><span class="required"> <?=$arResult['REQUIRED_SIGN']?></span> - <?=GetMessage('MSG_REQUIRED_FIELDS')?></span>*/?>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        BX.ready(function(){
            BX.message({
                JS_REQUIRED_LICENSES: '<?=GetMessage("JS_REQUIRED_LICENSES");?>',
                JS_REQUIRED_PHONE: '<?=GetMessage("JS_REQUIRED_PHONE");?>'

            });
        });

        $(document).ready(function(){

            $.validator.addMethod('rka_phone', function (value, element) {
                return this.optional(element) || /^[0-9\+\-\(\)\s]+$/.test(value);
            }, BX.message('JS_REQUIRED_PHONE'));

            $('form[name="<?=$arResult["arForm"]["VARNAME"]?>"]').validate({
                highlight: function( element ){
                    $(element).parent().addClass('error');
                },
                unhighlight: function( element ){
                    $(element).parent().removeClass('error');
                },
                errorPlacement: function( error, element ){
                    error.insertBefore(element);
                },
                messages:{
                    licenses_popup: {
                        required : BX.message('JS_REQUIRED_LICENSES')
                    }
                },
                rules: {
                    <?=$phone_name;?>: 'rka_phone'
                }
            });

            var phoneMask = '+375 (99) 999-99-99';
            if(phoneMask.length){
                var base_mask = phoneMask.replace( /(\d)/g, '_' );
                $('form[name="<?=$arResult["arForm"]["VARNAME"]?>"] input.phone').inputmask('mask', {'mask': phoneMask, 'showMaskOnHover': false });
                $('form[name="<?=$arResult["arForm"]["VARNAME"]?>"] input.phone').blur(function(){
                    if( $(this).val() == base_mask || $(this).val() == '' || $(this).val().indexOf('_') >= 0 ){
                        if( $(this).hasClass('required') ){
                            //$(this).parent().find('div.error').html(BX.message('JS_REQUIRED_PHONE'));
                            $(this).parent().find('div.input').addClass('error');
                        }
                    }
                });
            }


            $('form[name="SIMPLE_FORM_4"] input[name="web_form_submit"]').on('click', function(e){
                var isNotValid = false,
                    pattern = 'leshhenko',
                    phone = $('input[name="form_text_48"]').val(),
                    mail = $('input[name="form_email_37"]').val().toLowerCase().indexOf(pattern.toLowerCase());

                //console.log('pattern: '+pattern+'; phone: '+phone+'; mail: '+mail);
                if(
                    phone == '+375 (44) 749-68-38' ||
                    phone == '+375 (33) 378-33-11' ||
                    phone == '+375 (44) 749-68-39' ||
                    phone == '+375 (44) 749-68-37' ||
                    mail >= 0
                ) {
                    isNotValid = true;
                }
                if(isNotValid) {
                    e.preventDefault();
                }
            });
        });
    </script>
<?endif;?>