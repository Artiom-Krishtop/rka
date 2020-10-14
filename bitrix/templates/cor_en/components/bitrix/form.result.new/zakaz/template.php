<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
//echo "<pre>";print_r($arResult);echo "</pre>";
if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>

<?=$arResult["FORM_NOTE"]?>
<? $laststep = array('11', '12', '13', '14', '15')?>
<?=$arResult["FORM_HEADER"]?>
<div class="row mainform"><?
	?><div class="col col-md-12"><?
		?><div class=""><?
			?><!--<h3><?//=$arResult['arForm']['NAME']?></h3>--><?
			?><span><?=$arResult['arForm']['DESCRIPTION']?></span><?
				?><div class="webform zakaz-webform clearfix"><?
					$rowCounter = 0;
					foreach ($arResult['QUESTIONS'] as $code => $arField) {
					   
						/* INPUT TYPE ___TEXT___ */
						if ($arField['STRUCTURE'][0]['FIELD_TYPE']=='text') {
							if ($rowCounter%2==0) {
								?>	
									<?if ($arField['STRUCTURE'][0]['QUESTION_ID']=='11' ) { ?><div class="row inner-wrap your-info hidden laststep"><h2>Ваши данные</h2><? } ?>								
								<div class="row">

								<?
							} 
							?>
							<div <?if ($arField['STRUCTURE'][0]['QUESTION_ID']=='17'):?>style="display: none;"<?endif;?> class="col <?if ($arField['STRUCTURE'][0]['QUESTION_ID']=='3' or $arField['STRUCTURE'][0]['QUESTION_ID']=='8'):?>col-md-12 inner-wrap<?else:?>col-md-6<?endif;?> form-group field-wrap  text-wrap <?if ($arField['REQUIRED']=="Y") {?>req<?}?> <?if (in_array($arField['STRUCTURE'][0]['QUESTION_ID'], $laststep)):?>laststep<?else:?>firststep<?endif;?>"><?
								?><label class="control-label" for="<?=$code?>"><?
									?><?=$arField['CAPTION']?><?if ($arField['REQUIRED']=="Y") {?><span class="required"> <?=$arResult['REQUIRED_SIGN']?></span><?}?><?
								?></label><?
								?>
								<?if ($arField['STRUCTURE'][0]['QUESTION_ID']=='3' or $arField['STRUCTURE'][0]['QUESTION_ID']=='8'):?>
									<div class="number">
									<span class="minus">-</span>
								<?endif;?>
								<input <?if ($arField['STRUCTURE'][0]['QUESTION_ID']=='17'):?>id="custom_c"<?endif;?> <?if ($arField['STRUCTURE'][0]['QUESTION_ID']=='3' or $arField['STRUCTURE'][0]['QUESTION_ID']=='8'):?>type="text" <?else:?>type="text"<?endif;?> name="form_text_<?=$arField['STRUCTURE'][0]['ID']?>" class="<?if ($arField['REQUIRED']=="Y") {?>req-input<?}?> form-control" <?if ($arField['STRUCTURE'][0]['FIELD_ID']=='3' or $arField['STRUCTURE'][0]['FIELD_ID']=='8'):?>value="1"<?else:?> value="<?=$arResult["arrVALUES"]["form_text_".$arField['STRUCTURE'][0]['ID']]?>"<?endif;?>  ><?
							?>
							<?if ($arField['STRUCTURE'][0]['QUESTION_ID']=='3' or $arField['STRUCTURE'][0]['QUESTION_ID']=='8'):?>
									<span class="plus">+</span>
								</div>
							<?endif;?>
							</div>
							<?
							if ($rowCounter%2!=0) {
								?></div><?
							}
							$rowCounter++;
						/* INPUT TYPE ___DATE___ */
						} else if ($arField['STRUCTURE'][0]['FIELD_TYPE']=='date') {
							if ($rowCounter%2==0) { 
								?><div class="row"><?
							} 
							?><div class="col col-md-6 calendar-wrap form-group field-wrap <?if ($arField['REQUIRED']=="Y") {?>req<?}?> <?if (in_array($arField['STRUCTURE'][0]['QUESTION_ID'], $laststep)):?>laststep<?else:?>firststep<?endif;?>"><?
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
							?></div><?
							if ($rowCounter%2!=0) { 
								?></div><?
							}
							$rowCounter++;
						/* INPUT TYPE ___TEXTAREA___ */
						} else if ($arField['STRUCTURE'][0]['FIELD_TYPE']=='textarea') {
							if ($rowCounter%2==0) { 
								?><div class="row"><?
							}
								?><div class="col col-md-12 field-wrap textarea-wrap <?if ($arField['REQUIRED']=="Y") {?>req<?}?> <?if (in_array($arField['STRUCTURE'][0]['QUESTION_ID'], $laststep)):?>laststep<?else:?>firststep<?endif;?>"><?
									?><label class="control-label" for="<?=$code?>"><?
										?><?=$arField['CAPTION']?><?if ($arField['REQUIRED']=="Y") {?><span class="required"> <?=$arResult['REQUIRED_SIGN']?></span><?}?><?
									?></label><?
									?><textarea name="form_textarea_<?=$arField['STRUCTURE'][0]['ID']?>" class="form-control <?if ($arField['REQUIRED']=="Y") {?>req-input<?}?>"><?=$arResult["arrVALUES"]["form_textarea_".$arField['STRUCTURE'][0]['ID']]?></textarea><?/*<div class="text-triangle"><div class="inner-triangle"></div></div>*/?><?
								?></div><?
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
							?><div class="col col-md-12 field-wrap radio-group choice-wrap inner-wrap <?if ($code=="SIMPLE_QUESTION_357"):?>custom_radio<?endif;?> <?if ($arField['REQUIRED']=="Y") {?>req<?}?> <?if (in_array($arField['STRUCTURE'][0]['QUESTION_ID'], $laststep)):?>laststep<?else:?>firststep<?endif;?>"><?
								?><label class="control-label" for="<?=$code?>"><?
									?><?=$arField['CAPTION']?><?if ($arField['REQUIRED']=="Y") {?><span class="required"> <?=$arResult['REQUIRED_SIGN']?></span><?}?><?
								?></label><?
								foreach ($arField['STRUCTURE'] as $variables) {
									?><?if($variables['ID'] == "24"):?><div class="col col-md-9 radio"><?else:?><div class="col col-md-3 radio" <?if($variables['ID']=='40'):?>style="display: none;"<?endif;?>><?endif;?><?
										?><input type="radio" <?if ($variables['FIELD_PARAM']!="") {?>checked="checked"<?}?> name="form_radio_<?=$code?>" id="<?=$variables['ID']?>" value="<?=$variables['ID']?>"><?
										?><label for="<?=$variables['ID']?>"><?=$variables['MESSAGE']?></label><?
									?></div><?
								}
                                if ($code=="SIMPLE_QUESTION_357") {?>
                                <div class="col col-md-12 custom_text-wrapper  radio">
									<label class="control-label" for="form_radio_SIMPLE_QUESTION_357">Другое (кг):</label>
									<input type="text"  name="custom" id="custom_text" value="" >
								</div>
                                <?}
							?></div>
                            
                            <?
							if ($rowCounter%2!=0) {
								?></div><?
							}
							$rowCounter++;
						/* INPUT TYPE ___CHECKBOX___ */
						} else if ($arField['STRUCTURE'][0]['FIELD_TYPE']=='checkbox') {
							if ($rowCounter%2==0) {
								?><div class="row"><?
							}				
							?><div class="col col-md-6 field-wrap choice-wrap <?if ($arField['REQUIRED']=="Y") {?>req<?}?> <?if (in_array($arField['STRUCTURE'][0]['QUESTION_ID'], $laststep)):?>laststep<?else:?>firststep<?endif;?>"><?
								?><label class="control-label" for="<?=$code?>"><?
									?><?=$arField['CAPTION']?><?if ($arField['REQUIRED']=="Y") {?><span class="required"> <?=$arResult['REQUIRED_SIGN']?></span><?}?><?
								?></label><?
								foreach ($arField['STRUCTURE'] as $variables) {
									?><div class="col col-md-12 checkbox"><?
										?><input type="checkbox" <?if ($variables['FIELD_PARAM']!='') {?>checked<?}?> name="form_checkbox_<?=$code?>[]" id="<?=$variables['ID']?>" value="<?=$variables['ID']?>"><?
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
							?><div class="col col-md-6 field-wrap select-wrap <?if ($arField['REQUIRED']=="Y") {?>req<?}?> <?if (in_array($arField['STRUCTURE'][0]['QUESTION_ID'], $laststep)):?>laststep<?else:?>firststep<?endif;?>"><?
								?><label class="control-label" for="<?=$code?>"><?
									?><?=$arField['CAPTION']?><?if ($arField['REQUIRED']=="Y") {?><span class="required"> <?=$arResult['REQUIRED_SIGN']?></span><?}?><?
								?></label><?
								?><select class="form-control" name="form_dropdown_<?=$code?>" id="form_dropdown_<?=$code?>">
                                    <option value="">Выбрать</option>
                                    <?
									foreach ($arField['STRUCTURE'] as $variables) {
										?><option value="<?=$variables['ID']?>" <? if ($arResult["arrVALUES"]["form_dropdown_".$arField['STRUCTURE'][0]['ID']]==$variables['ID']) echo "selected"; ?>><?=$variables['MESSAGE']?></option><?
									}
								?></select><?
							?></div><?
							/*<div class="col col-md-6 field-wrap dropdown <?if ($arField['REQUIRED']=="Y") {?>req<?}?> <?if (in_array($arField['STRUCTURE'][0]['QUESTION_ID'], $laststep)):?>laststep<?else:?>firststep<?endif;?>">
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
							?><div class="col col-md-6 form-group field-wrap text-wrap <?if ($arField['REQUIRED']=="Y") {?>req<?}?> <?if (in_array($arField['STRUCTURE'][0]['QUESTION_ID'], $laststep)):?>laststep<?else:?>firststep<?endif;?>"><?
								?><label class="control-label" for="<?=$code?>"><?
									?><?=$arField['CAPTION']?><?if ($arField['REQUIRED']=="Y") {?><span class="required"> <?=$arResult['REQUIRED_SIGN']?></span><?}?><?
								?></label><?
								?><input type="text" name="form_email_<?=$arField['STRUCTURE'][0]['ID']?>" class="<?if ($arField['REQUIRED']=="Y") {?>req-input<?}?> form-control req-input-email" value="<?=$arResult["arrVALUES"]["form_email_".$arField['STRUCTURE'][0]['ID']]?>"><?
							?></div><?
							if ($rowCounter%2!=0) {
								?></div><?
							}
							$rowCounter++;
						/* INPUT TYPE ___URL___ */
						} else if ($arField['STRUCTURE'][0]['FIELD_TYPE']=='url') {
							if ($rowCounter%2==0) {
								?><div class="row"><?
							}
							?><div class="col col-md-6 form-group field-wrap text-wrap <?if ($arField['REQUIRED']=="Y") {?>req<?}?> <?if (in_array($arField['STRUCTURE'][0]['QUESTION_ID'], $laststep)):?>laststep<?else:?>firststep<?endif;?>"><?
								?><label class="control-label" for="<?=$code?>"><?
									?><?=$arField['CAPTION']?><?if ($arField['REQUIRED']=="Y") {?><span class="required"> <?=$arResult['REQUIRED_SIGN']?></span><?}?><?
								?></label><?
								?><input type="text" name="form_url_<?=$arField['STRUCTURE'][0]['ID']?>" class="<?if ($arField['REQUIRED']=="Y") {?>req-input<?}?> form-control"><?
							?></div><?
							if ($rowCounter%2!=0) { 
								?></div><?
							}	
							$rowCounter++;
						/* INPUT TYPE ___MYLTISELECT___ */
						} else if ($arField['STRUCTURE'][0]['FIELD_TYPE']=='multiselect') {
							if ($rowCounter%2==0) {
								?><div class="row"><?
							}
							?><div class="col col-md-6 form-group field-wrap select-wrap <?if ($arField['REQUIRED']=="Y") {?>req<?}?> <?if (in_array($arField['STRUCTURE'][0]['QUESTION_ID'], $laststep)):?>laststep<?else:?>firststep<?endif;?>"><?
								?><label class="control-label" for="<?=$code?>"><?
									?><?=$arField['CAPTION']?><?if ($arField['REQUIRED']=="Y") {?><span class="required"> <?=$arResult['REQUIRED_SIGN']?></span><?}?><?
								?></label><?
								?><select multiple class="form-control" name="form_multiselect_<?=$code?>[]" id="form_multiselect_<?=$code?>[]"><?
									foreach ($arField['STRUCTURE'] as $variables) {
										?><option <? if ($variables['FIELD_PARAM']!="") echo "selected"; ?> value="<?=$variables['ID']?>"><?=$variables['MESSAGE']?></option><?
									}
								?></select><?
							?></div><?
							if ($rowCounter%2!=0) {
								?></div><?
							}
							$rowCounter++;
						/* INPUT TYPE ___IMAGE___ */
						} else if ($arField['STRUCTURE'][0]['FIELD_TYPE']=='image' || $arField['STRUCTURE'][0]['FIELD_TYPE']=='file') {
							if ($rowCounter%2==0) {
								?><div class="row"><?
							}
							?><div class="col col-md-6 form-group field-wrap file-wrap <?if ($arField['REQUIRED']=="Y") {?>req<?}?> <?if (in_array($arField['STRUCTURE'][0]['QUESTION_ID'], $laststep)):?>laststep<?else:?>firststep<?endif;?>"><?
								?><label class="control-label" for="<?=$code?>"><?
									?><?=$arField['CAPTION']?><?if ($arField['REQUIRED']=="Y") {?><span class="required"> <?=$arResult['REQUIRED_SIGN']?></span><?}?><?
								?></label><?
								?><div class="file_upload"><?
									?><a href="javascript:void(0)" class="file-link"><?=GetMessage('MONOP_LOAD_'.$arField['STRUCTURE'][0]['FIELD_TYPE'])?></a><?
									?><input class="<?if ($arField['REQUIRED']=="Y") {?>req-input<?}?>" type="file" name="form_image_<?=$arField['STRUCTURE'][0]['ID']?>"><?
								?></div><?
							?></div><?
							if ($rowCounter%2!=0) {
								?></div><?
							}
							$rowCounter++;
						}
					}
					if ($rowCounter%2!=0) {
						?></div><?
					}
				
				?><?
				?></div><div class="row"><?
					if($arResult["isUseCaptcha"] == "1") {
						?><div class="captcha_wrap col col-md-8 form-group field-wrap req"><?
							?><label for="captcha_<?=$arResult['WEB_FORM_NAME']?>" class="col col-md-12"><?=GetMessage("MSG_CAPTHA")?>: <span class="required"><?=$arResult['REQUIRED_SIGN']?></span><br /></label><?
							?><div class="row"><?
								?><div class="col col-md-6"><img class="captchaImg" src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHACode"]?>" alt="CAPTCHA"></div><br /><?
								?><div class="col col-md-6"><input class="form-control req-input" id="captcha_<?=$arResult['WEB_FORM_NAME']?>" type="text" name="captcha_word" size="30" maxlength="50" value=""></div><?
								?><input type="hidden" class="captchaSid" name="captcha_sid" value="<?=$arResult["CAPTCHACode"]?>"><?
								?><a id="reloadCaptcha" class="reloadCaptcha"><?=GetMessage('AR.CORP.RELOAD_CAPTCHA')?></a><?
							?></div><?
						?></div><?
					}
					?><div class="col col-md-12 buttons"><?
						?><span><span class="required"> <?=$arResult['REQUIRED_SIGN']?></span> - <?=GetMessage('MSG_REQUIRED_FIELDS')?></span><?
						?>
						<input type="hidden" name="PARAMS_HASH"><?
						?><input type="submit" class="btn btn-primary btn-group-lg col col-md-8" name="web_form_submit" value="<?=GetMessage('MSG_SEND_BUTTON')?>"><?
					?></div><?
				?></div><?
			?></div><?
	?></div><?
?></div></div>
<script>

$( document ).ready(function() {
    $(document).on('click', '.btn.btn-primary', function() {
		submittedFlag = false;
		$(this).parents('form').find('.field-wrap.req').each(function() {
			if ( ($(this).find('input.req-input').val()=="" && $(this).hasClass('text-wrap')) || 
				 ($(this).find('select option:selected').length==0 && $(this).hasClass('select-wrap')) || 
				 ($(this).find('input.req-input').val()=="" && $(this).hasClass('calendar-wrap')) || 
				 ($(this).find('textarea').val()=="" && $(this).hasClass('textarea-wrap')) || 
				 ($(this).find('input.req-input').val()=="" && $(this).hasClass('file-wrap')) || 
				 ($(this).find('input:checked').length==0 && $(this).hasClass('choice-wrap') && !$(this).hasClass('custom_radio')) ||
                 ($(this).find('input:checked').length==0 && $(this).hasClass('choice-wrap') && $(this).hasClass('custom_radio') && $('#custom_text').val()=='')
                  
			    ) {
				$(this).addClass('has-error');
				submittedFlag = true;
			} else {
				$(this).removeClass('has-error');
			}
		});
        console.log(submittedFlag);
		if (submittedFlag) {
			return false;
		}
        else {
            return true;
        }
	});
    var allfield = true;
	
    /*$('.firststep input[type=text], .firststep input[type=number], .firststep input[type=radio], .firststep select').each(function(index, elem) {
       valu = $(elem).val();
    	//if ( $(' .firststep input[type=radio]').is(":checked")){
		//if ( $(this).is(":checked")){
		
       if (valu=='') {
            allfield=false;
       }
    });*/
   var check=0;
   if ($('#custom_text').val()!='') {
        $('#40').prop( "checked", true );
        $('#custom_c').val($('#custom_text').val());
       // check=1;
     }
     else {
        $('#40').prop( "checked", false );
        $('#custom_c').val();
     }
    $('.firststep input[type=radio]').each(function(index, elem) {
       // count++;
        if ( $(elem).is(":checked")){
			check++;
		} 
    });
    if (8!=check) {
        allfield=false;
    }
    if (allfield) {
        //$('.firststep').addClass('hidden');
        $('.laststep').removeClass('hidden');
		$('.your-info').removeClass('hidden');		
    }
    else {
        $('.firststep').removeClass('hidden');
        $('.laststep').addClass('hidden');
    }
});
$('.firststep input[type=text], .firststep input[type=number], .firststep input[type=radio],  .firststep select').change(function() {
    var allfield = true;
	/* $(' .firststep input[type=radio]').each(function() {
		if ( $(this).is(":checked")){
			allfield=true;
		} else {
			allfield=false;
        }
    });
	 
    $('.firststep input[type=text], .firststep input[type=number], .firststep select').each(function(index, elem) {
       valu = $(elem).val();
       if (valu=='') {
            allfield=false;
       }
    });*/
     var check=0;
     if ($('#custom_text').val()!='') {
        $('#40').prop( "checked", true );
        $('#40').attr('checked', 'checked');
        $('#custom_c').val($('#custom_text').val());        
        //check=1;
     }
     else {
        $('#40').prop( "checked", false );
        $('#40').removeAttr('checked');
        $('#custom_c').val();
     }
    $('.firststep input[type=radio]').each(function(index, elem) {
        //count++;
        if ( $(elem).is(":checked")){
			check++;
		} 
    });
    
    if (8!=check) {
        allfield=false;
    }
    if (allfield) {
        //$('.firststep').addClass('hidden');
        $('.laststep').removeClass('hidden');
		$('.your-info').removeClass('hidden');		
    }
    else {
        $('.firststep').removeClass('hidden');
        $('.laststep').addClass('hidden');
    }
    
});
 $(document).ready(function() {
$('.minus').click(function () {
	var $input = $(this).parent().find('input');
	var count = parseInt($input.val()) - 1;
	count = count < 1 ? 1 : count;
	$input.val(count);
	$input.change();
	return false;
});
$('.plus').click(function () {
	var $input = $(this).parent().find('input');
	$input.val(parseInt($input.val()) + 1);
	$input.change();
	return false;
});
});
</script>

<?