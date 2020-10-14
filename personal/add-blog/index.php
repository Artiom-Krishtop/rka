<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "");
$APPLICATION->SetPageProperty("description", "");
$APPLICATION->SetTitle("Создать Запись в блог");
?>

<?CModule::IncludeModule("iblock");   
     $props_info = array();
                    $properties = CIBlockProperty::GetList(Array("sort"=>"asc", "name"=>"asc"), Array("ACTIVE"=>"Y", "IBLOCK_ID"=>14));
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
    ?>
<?php /*
print "<pre>";
print_r($props_info);
print "</pre>";*/
?>	
    <div id="success" style="display: none;">Запись доблена в Ваш блог.</div>
<form class="node-form node-faq-form" name="quest" enctype="multipart/form-data" action="/personal/add-blog/" method="post" id="faq-node-form2" accept-charset="UTF-8" onsubmit="SaveResults(); return false;">
		<input type="hidden" name="changed" value="">
		<input type="hidden" name="form_build_id" value="">
		<input type="hidden" name="form_id" value="faq_node_form">
        <input type="hidden" id="user_id" name="user_id" value="<?=$USER->GetID()?>">
	<div>
		<div class="form-item form-type-textarea form-item-detailed-question">
			<label for="edit-detailed-question">Заголовок<span class="form-required" style="color:red;" title="Обязательное поле">*</span></label>
                 <input required type="text" id="blog_title" name="blog_title" value="" size="100%" maxlength="128" class="form-text">
			 <div class="description">Введите заголовок статьи блога</div>
		</div>
        <div class="form-item form-type-textarea form-item-detailed-question">
            <label for="edit-detailed-question">Анонс<span class="form-required" style="color:red;" title="Обязательное поле">*</span></label>
            <div class="form-textarea-wrapper resizable textarea-processed resizable-textarea">
            <?$APPLICATION->IncludeComponent(
                    "bitrix:fileman.light_editor",
                    "",
                    array(
                        "CONTENT" => "",
                        "INPUT_NAME" => "blog_anons",
                        "INPUT_ID" => "blog_anons",
                        "WIDTH" => "100%",
                        "HEIGHT" => "200px",
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
            <div class="description">Введите анонс статьи блога</div>
        </div>
        <div class="form-item form-type-textarea form-item-detailed-question">
            <label for="edit-detailed-question">Содержимое<span class="form-required" style="color:red;" title="Обязательное поле">*</span></label>
            <div class="form-textarea-wrapper resizable textarea-processed resizable-textarea">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:fileman.light_editor",
                    "",
                    array(
                        "CONTENT" => "",
                        "INPUT_NAME" => "blog_detail",
                        "INPUT_ID" => "blog_detail",
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
            <div class="description">Введите содержание статьи блога</div>
        </div>
        <?$arFilterw = Array("IBLOCK_ID"=>21);
                $rw = CIBlockElement::GetList(Array(), $arFilterw);
                while ($obw = $rw->GetNextElement()){
                $arFieldw = $obw->GetFields(); // поля элемента
                $pravo[$arFieldw["ID"]]=$arFieldw["NAME"];
                }
        /*print "<pre>";
        print_r( $props_info);
        print "</pre>";*/
        ?>
        <div class="views-exposed-widget views-widget-filter-field_activity_tid law-field">
            <label for="edit-field-activity-tid"> Отрасль права</label>
            <div class="views-widget">
                <div class="form-item form-type-select form-item-field-activity-tid">
                    <select  multiple="multiple" size="9" name="PRAVO[]" id="PRAVO"  class="form-select">
                        <?foreach ($pravo as $keys => $arPr) {?>
                            <option <?if ($_REQUEST["PRAVO"]==$keys):?>selected=''<?endif;?> value="<?=$keys?>"><?=$arPr?></option>
                        <?}?>
                    </select>
                </div>
            </div>
        </div>
	<input class="mollom-content-id" type="hidden" name="mollom[contentId]" value="">
	<input class="mollom-captcha-id" type="hidden" name="mollom[captchaId]" value="">
	<div style="display: none;">
		<div class="form-item form-type-textfield form-item-mollom-homepage">
		  <label for="edit-mollom-homepage">Главная страница </label>
			<input autocomplete="off" type="text" id="edit-mollom-homepage" name="mollom[homepage]" value="" size="60" maxlength="128" class="form-text">
		</div>
	</div>
	<input type="hidden" name="mollom[fba]" value="" class="jquery-once-2-processed">
	<div class="form-actions form-wrapper" id="edit-actions">
			<input type="submit" id="edit-submit" name="op" value="Сохранить" class="form-submit">
		</div>	
	</div>
</form>

<script>
        function SaveResults() {
             var form = document.forms.quest;
             var formData = new FormData(form);  
             //$('#wait_block').show();
             formData.append('user_id', jQuery('#user_id').val());
             formData.append('blog_title', jQuery('#blog_title').val());
             formData.append('blog_anons', jQuery('#blog_anons').val());
             formData.append('blog_detail', jQuery('#blog_detail').val());
			jQuery('select[name="PRAVO[]"]').change(function(){
			if(jQuery('select[name="PRAVO[]"] option').attr("selected", "selected")){
				formData.append(jQuery(this).val());
			}
			});			 

             console.log(formData);
			 
             var xhr = new XMLHttpRequest();
    			xhr.open("POST", "<?=$APPLICATION->GetCurPage()?>ajax.php");
    
    			xhr.onreadystatechange = function() {
    				if (xhr.readyState == 4) {
    					if(xhr.status == 200) {
    						data = xhr.responseText;
                            console.log(data);
    						if(data == 0) {
    						  jQuery('#faq-node-form2').remove();
                              //$('#wait_block').hide();
                              jQuery("#success").show();
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












					
 <?/*$APPLICATION->IncludeComponent(
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
</style>*/?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>