<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if ($arResult["isFormErrors"] == "Y"):?><div class="ernote"><?=$arResult["FORM_ERRORS_TEXT"];?></div><?endif;?>

<div class="formnote"><?=$arResult["FORM_NOTE"]?></div>
<?=$arResult["FORM_HEADER"]?>
<div class="row mainform"><?
	?><div class="col col-md-12"><?
		?><div class="inner-wrap"><?
			?>
            <?if ($arParams['HIDE_CAPTION']!='Y'):?>			
			<h3><?=$arResult['arForm']['NAME']?></h3>
            <?endif;?>
			<?
			?><span><?=$arResult['arForm']['DESCRIPTION']?></span><?
				?><div class="webform clearfix">
                <div class="row">
                    <div class="col col-md-6">
                    <?
					$rowCounter = 0;
					foreach ($arResult['QUESTIONS'] as $code => $arField) {
					   if ($code!='SIMPLE_QUESTION_344' && $code!='SIMPLE_QUESTION_641' && $code!='SIMPLE_QUESTION_209' ) continue;


						/* INPUT TYPE ___TEXT___ */
						if ($arField['STRUCTURE'][0]['FIELD_TYPE']=='text') {
							if ($rowCounter%2==0) {
								?><div class="row"><?
							} 
							?><div class="col col-md-12 form-group field-wrap text-wrap <?if ($arField['REQUIRED']=="Y") {?>req<?}?>"><?
								
								?><input type="text" id="form_text_<?=$arField['STRUCTURE'][0]['ID']?>" name="form_text_<?=$arField['STRUCTURE'][0]['ID']?>" class="<?if ($arField['REQUIRED']=="Y") {?>req-input<?}?> form-control" value="<?=$arResult['arrVALUES']['form_text_'.$arField['STRUCTURE'][0]['ID']]?>" placeholder="<?/*=$arField['CAPTION']*/?>"><?
							    ?><label class="control-label" for="form_text_<?=$arField['STRUCTURE'][0]['ID']?><?/*=$code*/?>"><?
									?><?=$arField['CAPTION']?><?if ($arField['REQUIRED']=="Y") {?><span class="required"> <?=$arResult['REQUIRED_SIGN']?></span><?}?><?
								?></label><?
							
							?></div><?
							if ($rowCounter%2!=0) {
								?></div><?
							}
							$rowCounter++;
						/* INPUT TYPE ___DATE___ */
						} else if ($arField['STRUCTURE'][0]['FIELD_TYPE']=='date') {
							if ($rowCounter%2==0) { 
								?><div class="row"><?
							} 
							?><div class="col col-md-12 calendar-wrap form-group field-wrap <?if ($arField['REQUIRED']=="Y") {?>req<?}?>"><?
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
								?><div class="col col-md-12 field-wrap textarea-wrap <?if ($arField['REQUIRED']=="Y") {?>req<?}?>"><?
									?><label class="control-label" for="<?=$code?>"><?
										?><?=$arField['CAPTION']?><?if ($arField['REQUIRED']=="Y") {?><span class="required"> <?=$arResult['REQUIRED_SIGN']?></span><?}?><?
									?></label><?
									?><textarea name="form_textarea_<?=$arField['STRUCTURE'][0]['ID']?>" class="form-control <?if ($arField['REQUIRED']=="Y") {?>req-input<?}?>" placeholder="<?=$arField['CAPTION']?>"><?=$arResult['arrVALUES']['form_textarea_'.$arField['STRUCTURE'][0]['ID']]?></textarea><?/*<div class="text-triangle"><div class="inner-triangle"></div></div>*/?><?
								?></div><?
							/*<div class="row">
								<div class="col col-md-5 load-avatar">
									<div class="avatar-wrap"><img src="<?=SITE_DIR?>avatar-simple.png"></div>
									<a href="javascript:void(0)">????????? ??????</a>
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
							?><div class="col col-md-12 field-wrap radio-group choice-wrap <?if ($arField['REQUIRED']=="Y") {?>req<?}?>"><?
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
							?><div class="col col-md-12 field-wrap choice-wrap <?if ($arField['REQUIRED']=="Y") {?>req<?}?>"><?
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
							?><div class="col col-md-12 field-wrap select-wrap <?if ($arField['REQUIRED']=="Y") {?>req<?}?>"><?
								?><label class="control-label" for="<?=$code?>"><?
									?><?=$arField['CAPTION']?><?if ($arField['REQUIRED']=="Y") {?><span class="required"> <?=$arResult['REQUIRED_SIGN']?></span><?}?><?
								?></label><?
								?><select class="form-control" name="form_dropdown_<?=$code?>" id="form_dropdown_<?=$code?>"><?
									foreach ($arField['STRUCTURE'] as $variables) {
										?><option value="<?=$variables['ID']?>" <? if ($variables['FIELD_PARAM']!="") echo "selected"; ?>><?=$variables['MESSAGE']?></option><?
									}
								?></select><?
							?></div><?
							
							if ($rowCounter%2!=0) {
								?></div><?
							}
							$rowCounter++;
						/* INPUT TYPE ___EMAIL___ */
						} if ($arField['STRUCTURE'][0]['FIELD_TYPE']=='email') {
							if ($rowCounter%2==0) { 
								?><div class="row"><?
							}
							?><div class="col col-md-12 form-group field-wrap text-wrap <?if ($arField['REQUIRED']=="Y") {?>req<?}?>"><?
								
								?><input type="text" id="form_email_<?=$arField['STRUCTURE'][0]['ID']?>" value="<?=$arResult['arrVALUES']['form_email_'.$arField['STRUCTURE'][0]['ID']]?>" name="form_email_<?=$arField['STRUCTURE'][0]['ID']?>" class="<?if ($arField['REQUIRED']=="Y") {?>req-input<?}?> form-control" placeholder="<?/*=$arField['CAPTION']*/?>"><?
							
							    ?><label class="control-label" for="form_email_<?=$arField['STRUCTURE'][0]['ID']?><?/*=$code*/?>"><?
									?><?=$arField['CAPTION']?><?if ($arField['REQUIRED']=="Y") {?><span class="required"> <?=$arResult['REQUIRED_SIGN']?></span><?}?><?
								?></label><?
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
							?><div class="col col-md-12 form-group field-wrap text-wrap <?if ($arField['REQUIRED']=="Y") {?>req<?}?>"><?
								
								?><input type="text" name="form_url_<?=$arField['STRUCTURE'][0]['ID']?>" class="<?if ($arField['REQUIRED']=="Y") {?>req-input<?}?> form-control"><?
								?><label class="control-label" for="<?=$code?>"><?
										?><?=$arField['CAPTION']?><?if ($arField['REQUIRED']=="Y") {?><span class="required"> <?=$arResult['REQUIRED_SIGN']?></span><?}?><?
								?></label><?
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
							?><div class="col col-md-12 form-group field-wrap select-wrap <?if ($arField['REQUIRED']=="Y") {?>req<?}?>"><?
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
							?><div class="col col-md-12 form-group field-wrap file-wrap <?if ($arField['REQUIRED']=="Y") {?>req<?}?>"><?
								?><label class="control-label" for="<?=$code?>"><?
									?><?=$arField['CAPTION']?><?if ($arField['REQUIRED']=="Y") {?><span class="required"> <?=$arResult['REQUIRED_SIGN']?></span><?}?><?
								?></label><?
								?><div class="file_upload"><?
									?><a href="javascript:void(0)" class="file-link"><?=GetMessage('MONOP_LOAD_'.$arField['STRUCTURE'][0]['FIELD_TYPE'])?></a><?
									?><input class="<?if ($arField['REQUIRED']=="Y") {?>req-input<?}?>" type="file" name="form_file_<?=$arField['STRUCTURE'][0]['ID']?>"><?
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
				
				?>
                    </div>
                    <div class="col col-md-6">
                    <?
					$rowCounter = 0;
					foreach ($arResult['QUESTIONS'] as $code => $arField) {
						/* INPUT TYPE ___TEXT___ */
                        
                        if ($code!='SIMPLE_QUESTION_669' && $code!='SIMPLE_QUESTION_367' ) continue;
						if ($arField['STRUCTURE'][0]['FIELD_TYPE']=='text') {
							if ($rowCounter%2==0) {
								?><div class="row"><?
							} 
							?><div class="col col-md-12 form-group field-wrap text-wrap <?if ($arField['REQUIRED']=="Y") {?>req<?}?>"><?
								
								?><input type="text" id="form_text_<?=$arField['STRUCTURE'][0]['ID']?>" name="form_text_<?=$arField['STRUCTURE'][0]['ID']?>" class="<?if ($arField['REQUIRED']=="Y") {?>req-input<?}?> form-control" value="<?=$arResult['arrVALUES']['form_text_'.$arField['STRUCTURE'][0]['ID']]?>" placeholder="<?/*=$arField['CAPTION']*/?>"><?
							
							    ?><label class="control-label" for="form_text_<?=$arField['STRUCTURE'][0]['ID']?>"><?
									?><?=$arField['CAPTION']?><?if ($arField['REQUIRED']=="Y") {?><span class="required"> <?=$arResult['REQUIRED_SIGN']?></span><?}?><?
								?></label><?
							?></div><?
							if ($rowCounter%2!=0) {
								?></div><?
							}
							$rowCounter++;
						/* INPUT TYPE ___DATE___ */
						} else if ($arField['STRUCTURE'][0]['FIELD_TYPE']=='date') {
							if ($rowCounter%2==0) { 
								?><div class="row"><?
							} 
							?><div class="col col-md-12 calendar-wrap form-group field-wrap <?if ($arField['REQUIRED']=="Y") {?>req<?}?>"><?
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
								?><div class="col col-md-12 field-wrap textarea-wrap <?if ($arField['REQUIRED']=="Y") {?>req<?}?>"><?
									
									?><textarea name="form_textarea_<?=$arField['STRUCTURE'][0]['ID']?>" id="form_textarea_<?=$arField['STRUCTURE'][0]['ID']?>" rows=5" class="form-control <?if ($arField['REQUIRED']=="Y") {?>req-input<?}?>" placeholder="<?/*=$arField['CAPTION']*/?> "><?=$arResult['arrVALUES']['form_textarea_'.$arField['STRUCTURE'][0]['ID']]?></textarea><?/*<div class="text-triangle"><div class="inner-triangle"></div></div>*/?><?
								    ?><label class="control-label" for="form_textarea_<?=$arField['STRUCTURE'][0]['ID']?><?/*=$code*/?>"><?
										?><?=$arField['CAPTION']?><?if ($arField['REQUIRED']=="Y") {?><span class="required"> <?=$arResult['REQUIRED_SIGN']?></span><?}?><?
									?></label><?
								?></div><?
							/*<div class="row">
								<div class="col col-md-5 load-avatar">
									<div class="avatar-wrap"><img src="<?=SITE_DIR?>avatar-simple.png"></div>
									<a href="javascript:void(0)">????????? ??????</a>
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
							?><div class="col col-md-12 field-wrap radio-group choice-wrap <?if ($arField['REQUIRED']=="Y") {?>req<?}?>"><?
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
							?><div class="col col-md-12 field-wrap choice-wrap <?if ($arField['REQUIRED']=="Y") {?>req<?}?>"><?
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
							?><div class="col col-md-12 field-wrap select-wrap <?if ($arField['REQUIRED']=="Y") {?>req<?}?>"><?
								?><label class="control-label" for="<?=$code?>"><?
									?><?=$arField['CAPTION']?><?if ($arField['REQUIRED']=="Y") {?><span class="required"> <?=$arResult['REQUIRED_SIGN']?></span><?}?><?
								?></label><?
								?><select class="form-control" name="form_dropdown_<?=$code?>" id="form_dropdown_<?=$code?>"><?
									foreach ($arField['STRUCTURE'] as $variables) {
										?><option value="<?=$variables['ID']?>" <? if ($variables['FIELD_PARAM']!="") echo "selected"; ?>><?=$variables['MESSAGE']?></option><?
									}
								?></select><?
							?></div><?
							
							if ($rowCounter%2!=0) {
								?></div><?
							}
							$rowCounter++;
						/* INPUT TYPE ___EMAIL___ */
						} if ($arField['STRUCTURE'][0]['FIELD_TYPE']=='email') {
							if ($rowCounter%2==0) { 
								?><div class="row"><?
							}
							?><div class="col col-md-12 form-group field-wrap text-wrap <?if ($arField['REQUIRED']=="Y") {?>req<?}?>"><?
							
					
				
								?><input type="text" id="form_email_<?=$arField['STRUCTURE'][0]['ID']?>" value="<?=$arResult['arrVALUES']['form_email_'.$arField['STRUCTURE'][0]['ID']]?>" name="form_email_<?=$arField['STRUCTURE'][0]['ID']?>" class="<?if ($arField['REQUIRED']=="Y") {?>req-input<?}?> form-control"><?
							    ?><label class="control-label" for="form_email_<?=$arField['STRUCTURE'][0]['ID']?> <?/*=$code*/?>"><?
									?><?=$arField['CAPTION']?><?if ($arField['REQUIRED']=="Y") {?><span class="required"> <?=$arResult['REQUIRED_SIGN']?></span><?}?><?
								?></label><?
							
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
							?><div class="col col-md-12 form-group field-wrap text-wrap <?if ($arField['REQUIRED']=="Y") {?>req<?}?>"><?
							
								?><input type="text" name="form_url_<?=$arField['STRUCTURE'][0]['ID']?>" class="<?if ($arField['REQUIRED']=="Y") {?>req-input<?}?> form-control"><?
							    ?><label class="control-label" for="<?=$code?>"><?
									?><?=$arField['CAPTION']?><?if ($arField['REQUIRED']=="Y") {?><span class="required"> <?=$arResult['REQUIRED_SIGN']?></span><?}?><?
								?></label><?
							
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
							?><div class="col col-md-12 form-group field-wrap select-wrap <?if ($arField['REQUIRED']=="Y") {?>req<?}?>"><?
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
							?><div class="col col-md-12 form-group field-wrap file-wrap <?if ($arField['REQUIRED']=="Y") {?>req<?}?>"><?
								?><label class="control-label" for="<?=$code?>"><?
									?><?=$arField['CAPTION']?><?if ($arField['REQUIRED']=="Y") {?><span class="required"> <?=$arResult['REQUIRED_SIGN']?></span><?}?><?
								?></label><?
								?><div class="file_upload"><?
									?><a href="javascript:void(0)" class="file-link"><?=GetMessage('MONOP_LOAD_'.$arField['STRUCTURE'][0]['FIELD_TYPE'])?></a><?
									?><input class="<?if ($arField['REQUIRED']=="Y") {?>req-input<?}?>" type="file" name="form_file_<?=$arField['STRUCTURE'][0]['ID']?>"><?
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
				
				?>
                    </div>

                </div>
                </div><?
				?><div class="row"><?
					if($arResult["isUseCaptcha"] == "1") {
						?><div class="captcha_wrap col col-md-6 form-group field-wrap req"><?
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
						?><div class="col col-md-6 col-sm-6 col-xs-12"><?
							?><span><?=GetMessage('MSG_REQUIRED_FIELDS')?> </span><span class="required"> <?=$arResult['REQUIRED_SIGN']?></span><?
						?></div><?
						?><div class="col col-md-6 col-sm-6 col-xs-12"><?
							?><input type="hidden" name="PARAMS_HASH"><?
							?><input type="submit" class="btn btn-primary btn-group-lg col col-md-10" name="web_form_submit" value="<?=GetMessage('MSG_SEND_BUTTON')?>"><?
					     ?></div><?
					
					?></div><?
				?></div><?
			?></div><?
	?></div>
    <?=$arResult["FORM_FOOTER"]?>
    <?
?></div>
<script>
jQuery( document ).ready(function() {
   jQuery('input[type=text]').each(function(){
        if(jQuery(this).val() == ''){
			 jQuery(this).next().show();
		  }else{
			 jQuery(this).next().hide();
		  }
    });
    jQuery('textarea').each(function(){
        if(jQuery(this).val() == ''){
			 jQuery(this).next().show();
		  }else{
			 jQuery(this).next().hide();
		  }
    });
    
});
</script>