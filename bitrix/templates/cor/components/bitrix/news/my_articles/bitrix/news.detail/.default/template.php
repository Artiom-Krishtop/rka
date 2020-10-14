<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="news-detail">

<div class="submitted-faq">
<?
$resr = CUser::GetByID($arResult['DISPLAY_PROPERTIES']['USER']['VALUE']);
if($ar_res = $resr->GetNext())
					 $arFilter = Array("IBLOCK_ID"=>17,"PROPERTY_USER"=>$arResult['DISPLAY_PROPERTIES']['USER']['VALUE']);
					//$res = CIBlockElement::GetList(Array(), $arFilter);
					$res = CIBlockElement::GetList(Array(),$arFilter, false, Array(), Array());				
					while ($ob = $res->GetNextElement()){
						$arFields = $ob->GetFields(); // поля элемента
						$arProps = $ob->GetProperties(); // свойства элемента
	if($arProps["USER"]["VALUE"]==$arResult['DISPLAY_PROPERTIES']['USER']['VALUE']){							
						$ar_res["LINKS"]=$arFields["DETAIL_PAGE_URL"];	
					}
				}

/*print "<pre>";
print_r($ar_res);
print "</pre>";*/
?>
<a href="<?=$ar_res["LINKS"]?>"><img width="100%" src="<?=CFile::GetPath($ar_res['PERSONAL_PHOTO'])?>" alt="<?=$ar_res['LOGIN']?>"></a><br>
Ответил(а) <a href="<?=$ar_res["LINKS"]?>"> <?if(!empty($ar_res["UF_ROLE"])){?><?=$ar_res["UF_ROLE"]?><?}?>						  
<?if(!empty($ar_res['LAST_NAME'])){?><?=$ar_res['LAST_NAME']?><?}?>		
<?if(!empty($ar_res['NAME'])){?><?=$ar_res['NAME']?><?}?>	
<?if(!empty($ar_res['SECOND_NAME'])){?><?=$ar_res['SECOND_NAME']?><?}?></a>,<br><?=FormatDate('d F Y',MakeTimeStamp($arResult['DISPLAY_PROPERTIES']['PUBLIC_DATE']['VALUE']), time())?>
<div class="contacts">		
<?if(!empty($ar_res['PERSONAL_PHONE'])){?>			
				<span>Телефон:</span><?=$ar_res['PERSONAL_PHONE']?><br>
<?}?>	
<?if(!empty($ar_res['UF_SKYPE'])){?>					
				<?=$ar_res['UF_SKYPE']?><br>
<?}?>	
<?if(!empty($ar_res['PERSONAL_ICQ'])){?>					
				<?=$ar_res['PERSONAL_ICQ']?><br>
<?}?>				
</div>
<div class="collegies">
<?if(!empty($ar_res['UF_COLLEGIA'])){?>		
<?$db_list = CIBlockSection::GetList(array(), array('GLOBAL_ACTIVE' => 'Y', "IBLOCK_ID" => 15), true, array("ID", "NAME","UF_S_OLD_ID","SECTION_PAGE_URL","SECTION_ID"));
		while($section = $db_list->Fetch()) {
			if($section['NAME']==$ar_res['UF_COLLEGIA']){?>
		<a href="/kollegies/<?=$section['CODE']?>/"><?=$section['NAME']?></a><?if(!empty($ar_res['UF_BURO'])){?>,<?}?>			
<?}}?>							
<?}?>
<?if(!empty($ar_res['UF_BURO'])){?>		
<?				 $arFilter = Array("IBLOCK_ID"=>15,"NAME"=>$ar_res['UF_BURO']);
					$rest = CIBlockElement::GetList(Array(),$arFilter, false, Array(), Array());				
					while ($ob = $rest->GetNextElement()){
						$arFields = $ob->GetFields(); // поля элемента
						$arProps = $ob->GetProperties(); // свойства элемента			
	if($arFields["NAME"]==$ar_res['UF_BURO']){							
						$ar_res["B_LINKS"]=$arFields["DETAIL_PAGE_URL"];	
					}
					}	?>			
				<a href="<?=$ar_res["B_LINKS"]?>"><?=$ar_res['UF_BURO']?></a>
<?}?>
<?if(!empty($ar_res['UF_CONSULT'])){?>	
<?				 $arFilter = Array("IBLOCK_ID"=>15,"NAME"=>$ar_res['UF_CONSULT']);
					$rest = CIBlockElement::GetList(Array(),$arFilter, false, Array(), Array());				
					while ($ob = $rest->GetNextElement()){
						$arFields = $ob->GetFields(); // поля элемента
						$arProps = $ob->GetProperties(); // свойства элемента			
	if($arFields["NAME"]==$ar_res['UF_CONSULT']){							
						$ar_res["C_LINKS"]=$arFields["DETAIL_PAGE_URL"];	
					}
					}	?>			
				<a href="<?=$ar_res["C_LINKS"]?>"><?=$ar_res['UF_CONSULT']?></a>			
<?}?>			
</div>
<?$vopro = '['.$arResult['ID'].'] '.$arResult['NAME'];?>
<?$advo = '['.$arResult['DISPLAY_PROPERTIES']['USER']['VALUE'].'] '.$ar_res['LAST_NAME'].' '.$ar_res['NAME'].' '.$ar_res['SECOND_NAME'];?>

<div class="thank" ><a data-fancybox data-src="#modal-form" href="#" class="fancyboxer"style="color:white;">Поблагодарить</a></div>
 <?
     $props_info = array();
                    $properties = CIBlockProperty::GetList(Array("sort"=>"asc", "name"=>"asc"), Array("ACTIVE"=>"Y", "IBLOCK_ID"=>22));
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
     
<form method="post" name="calculate" action="" class="form" id="modal-form" style="display:none;">
    <div id="success" style="display: none;color:green;text-align: center;font-size: 20px;">Ваша благодарость отправлена.</div>  
      <label for="name" class="form__label"><?=$props_info["BLAG_NAME"]["NAME"]?>:</label>
      <input type="text" name="NAME" id="NAME" class="form__field" required />    
      <label for="ADVOKAT" class="form__label"><?=$props_info["BLAG_ADVO"]["NAME"]?>:</label>
      <input type="text" name="ADVOKAT" id="ADVOKAT" class="form__field" value="<?=CUtil::JSEscape($advo)?>" readonly /> 
      <label for="VOPROS" class="form__label"><?=$props_info["BLAG_VOPRO"]["NAME"]?>:</label>
      <input type="text" name="VOPROS" id="VOPROS" value="<?=CUtil::JSEscape($vopro)?>" class="form__field" readonly /> 
      <label for="MESSAGE" class="form__label"><?=$props_info["BLAG_TEXT"]["NAME"]?>:</label>
      <textarea type="text" name="MESSAGE" id="MESSAGE" class="form__field"></textarea>   
      <input type="submit" class="btn btn-primary btn-group-lg" name="submit" value="Отправить">      
    </form>   
<style>
#modal-form{
    width: 50%;
} 
#modal-form input,#modal-form textarea{
    display:block;
    width: 100%;
    margin:0 0 20px 0;
}
#modal-form input.btn{
    width: 20%;
    padding: 10px;
    float: right;
}   
</style>
<script>            
jQuery("#modal-form").submit(function (e) { // Устанавливаем событие отправки для формы с id=form
           e.preventDefault();
             var form = document.forms.calculate;
             var formData = new FormData(form);              
             formData.append('NAME', jQuery('#NAME').val());            
             formData.append('ADVOKAT', jQuery('#ADVOKAT').val());
             formData.append('VOPROS', jQuery('#VOPROS').val());         
             formData.append('MESSAGE', jQuery('#MESSAGE').val());    
             //console.log(formData);    
 var xhr = new XMLHttpRequest();
    			xhr.open("POST", "/forms/thank.php");
    
    			xhr.onreadystatechange = function() {
    				if (xhr.readyState == 4) {
    					if(xhr.status == 200) {
    						data = xhr.responseText;
                            console.log(data);
    						if(data == 0) {
                              jQuery('#modal-form input').remove();
                              jQuery('#modal-form textarea').remove();
                              jQuery('#modal-form label').remove();
                              jQuery("#modal-form #success").show();
    						  //jQuery('#modal-form').remove();
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
</div>	
<blockquote>
<?=$arResult["~PREVIEW_TEXT"] ?>
  </blockquote>
<?echo $arResult["~DETAIL_TEXT"];?>  
<p style="margin:0px">Если что-то осталось неясным или есть другие вопросы по этой же теме:</p>
<ul style="margin-top:0px"><li>для максимально быстрого решения вопроса, созвонитесь с адвокатом и договоритесь о личной консультации;</li>
		<li>или напишите комментарий к ответу с уточняющими вопросами по этой теме. Не создавайте новый вопрос!</li> 
	</ul>
    
 <?if(!empty($arResult['PROPERTIES']['OTR_PRAVO']["VALUE"])){?>	   
<div class="field field-name-field-activity field-type-taxonomy-term-reference" style="overflow:hidden;">
	<div class="field-label" style="float: left;">Отрасль права:&nbsp;</div>
	<div class="field-items">
		<div class="field-item even" style="float: left;">
<?foreach($arResult['PROPERTIES']['OTR_PRAVO']["VALUE"] as $arPravo){ 
$resfera = CIBlockElement::GetByID($arPravo);
if($ar_resfera = $resfera->GetNext())?>  
 <a style="display:block" href="<?=$ar_resfera['DETAIL_PAGE_URL']?>"><?=$ar_resfera['NAME']?></a>
<?}?>               
		</div>
	</div>
</div>		
<?}?>
    

<?if(!empty($arResult['PROPERTIES']['F_COLLEG']['VALUE'])){?>

	<?$db_list = CIBlockSection::GetList(array(), array('GLOBAL_ACTIVE' => 'Y', "IBLOCK_ID" => 15), true, array("ID", "NAME","UF_S_OLD_ID","SECTION_PAGE_URL"));
		while($section = $db_list->Fetch()) {
		$filter = $section['UF_S_OLD_ID'];	
			if($section['UF_S_OLD_ID'] == $arResult['PROPERTIES']['F_COLLEG']['VALUE']){
?>
<div class="field field-name-field-kollegia field-type-node-reference">
	<div class="field-label" style="float: left;">Кому:&nbsp;</div>
	<div class="field-items">
		<div class="field-item even">
			<a href="/kollegies/<?=$section['CODE']?>/"><?=$section['NAME']?></a>
		</div>
	</div>
</div>
					
<?			}
		}	
	
	?>

<?}?>
<?if(array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y")
	{
		?>
		<div class="news-detail-share" style="margin-top:30px;">   
			<noindex>
<script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
<script src="https://yastatic.net/share2/share.js"></script>
<div class="ya-share2" data-services="vkontakte,facebook,twitter,lj,linkedin,odnoklassniki,whatsapp,evernote,telegram" data-size="s"></div>
			</noindex>
		</div>
		<?
	}?>
	<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
	<?if($arResult["DETAIL_PICTURE"]["WIDTH"] > 300):?>
		<img
			class="detail_picture"
			border="0"
			src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
			width="44%"
			height="auto"
			alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
			title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
			/>
	<?else:?>		
		<img
			class="detail_picture"
			border="0"
			src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
			width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
			height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
			alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
			title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
			/>	
	<?endif?>	
	<?endif?>
	<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arResult["FIELDS"]["PREVIEW_TEXT"]):?>
		<p><?=$arResult["FIELDS"]["PREVIEW_TEXT"];unset($arResult["FIELDS"]["PREVIEW_TEXT"]);?></p>
	<?endif;?>
	<?if($arResult["NAV_RESULT"]):?>
		<?if($arParams["DISPLAY_TOP_PAGER"]):?><?=$arResult["NAV_STRING"]?><br /><?endif;?>
		<?echo $arResult["NAV_TEXT"];?>
		<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?endif;?>
	<?elseif(strlen($arResult["DETAIL_TEXT"])>0):?>
		<?//echo $arResult["~DETAIL_TEXT"];?>
	<?else:?>
		<?//echo $arResult["PREVIEW_TEXT"];?>
	<?endif?>
	<div style="clear:both"></div>
	<br />
<div class="dop-image">	

<? $dopimage = str_replace(',','', $arResult['PROPERTIES']['DOP_PHOTO']['~VALUE']['TEXT'])?>
	 <?echo $dopimage ?>
	 
<?if(count($arResult["MORE_PHOTO"])>0):?>  
      <?foreach($arResult["MORE_PHOTO"] as $PHOTO):?> 
	  
	<?if($PHOTO["WIDTH"] > 300):?>
         <? $file = CFile::ResizeImageGet($PHOTO, array('width'=>'100%', 'height'=>'auto'), BX_RESIZE_IMAGE_EXACT, true); ?>  
            <a href="<?=$PHOTO["SRC"]?>" name="more_photo">  
               <img class="drt" border="0" src="<?=$file["src"]?>" width="<?=$file["width"]?>" height="<?=$file["height"]?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>" />  
            </a>
	<?else:?>		
            <a href="<?=$PHOTO["SRC"]?>" name="more_photo">  
               <img border="0" src="<?=$PHOTO["SRC"]?>" width="<?=$PHOTO["WIDTH"]?>" height="<?=$PHOTO["HEIGHT"]?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>" />  
            </a>
	<?endif?>		  

      <?endforeach?>  
   <?endif?>	 
</div>
	
</div>