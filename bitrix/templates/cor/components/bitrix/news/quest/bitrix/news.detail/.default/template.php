<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="news-detail">
    <?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
        <span class="news-date-time"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></span>
    <?endif;?>
<div class="submitted-faq">
<?
//$resr = CUser::GetByID($arResult['DISPLAY_PROPERTIES']['USER']['VALUE']);
//if($ar_res = $resr->GetNext())


?>
    <a href="<?=$arResult["LINKS"]?>">
        <img width="100%" src="<?=CFile::GetPath($arResult["FOTO"])?>" alt="<?=$arResult["NAME_AVDO"]?>">
    </a>
    <br>
    <div id="is-online" class="online"></div>
    Ответил(а) <a href="<?=$arResult["LINKS"]?>"> адвокат <?=$arResult["NAME_AVDO"]?></a>,
    <br><?=FormatDate('d F Y',MakeTimeStamp($arResult['ACTIVE_FROM']), time())?>
    <div class="contacts">
        <?if(!empty($arResult["PHONE"])){?><span>Телефон:</span><?=$arResult["PHONE"]?><br><?}?>
        <?if(!empty($arResult["SKYPE"])){?><?=$arResult["SKYPE"]?><br><?}?>
        <?if(!empty($arResult["ISQ"])){?><?=$arResult["ISQ"]?><br><?}?>
    </div>
    <div class="contacts" id="lawyer-statistic" style="padding:10px 15px;">
        <div class="lawyer-card-loading"></div>
    </div>
    <div class="collegies">
        <?php
       /* print "<pre>";
        print_r($arResult['PROPERTIES']['F_COLLEG']);
        print "</pre>";*/
        ?>
        <?if(!empty($arResult["KOLLEG"])){?>
          <a href="<?=$arResult["KOLLEG_LINK"]?>"><?=$arResult["KOLLEG"]?></a><?if(!empty($arResult["UR_NAME"])){?>,<?}?>
        <?}?>
        <?if(!empty($arResult["UR_NAME"])){?>
            <a href="<?=$arResult["UR_LINK"]?>"><?=$arResult["UR_NAME"]?></a>
        <?}?>
    </div>
    <?//$vopro = '['.$arResult['ID'].'] '.$arResult['NAME'];?>
    <?$advo = '['.$arResult['DISPLAY_PROPERTIES']['USER']['VALUE'].'] '.$arResult["NAME_AVDO"];?>


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
 if(!empty($USER->GetID())){
     $id_user = $USER->GetID();
     $filter = Array("ID"=>$id_user);
     $rsUsers = CUser::GetList(($by="ID"), ($order="desc"),$filter); // выбираем пользователей
     $is_filtered = $rsUsers->is_filtered; // отфильтрована ли выборка ?
     $rsUsers->NavStart(10000); // разбиваем постранично по 50 записей
     //while($arUser = $rsUsers->Fetch()) {
     if($arUser = $rsUsers->Fetch()) {
         if(!empty($arUser["LAST_NAME"]) || !empty($arUser["NAME"]) ||!empty($arUser["SECOND_NAME"]) ){
             $name_user = $arUser["LAST_NAME"]." ".$arUser["NAME"]." ".$arUser["SECOND_NAME"];
         }else{
             $name_user = $arUser["LOGIN"];
         }

     }
 }

    ?>
    <?
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = @$_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP)) $ip = $client;
    elseif(filter_var($forward, FILTER_VALIDATE_IP)) $ip = $forward;
    else $ip = $remote;
   // echo $ip;

    ?>
<form method="post" name="calculate" action="" class="form" id="modal-form" style="display:none;">
    <input type="hidden" id="user_id" name="user_id" value="<?=$id_user?>">
    <input type="hidden" id="ip" name="ip" value="<?=$ip?>">
    <input type="hidden" name="QUESTION_ID" value="<?=$arResult['ID']?>">
    <div id="success" style="display: none;color:green;text-align: center;font-size: 20px;">Ваша благодарость отправлена.</div>  
      <label for="name" class="form__label"><?=$props_info["BLAG_NAME"]["NAME"]?>:</label>
      <input type="text" name="NAME" id="NAME" class="form__field" value="<?=$name_user?>" required />
      <label for="ADVOKAT" class="form__label"><?=$props_info["BLAG_ADVO"]["NAME"]?>:</label>
      <input type="text" name="ADVOKAT" id="ADVOKAT" class="form__field" value="<?=CUtil::JSEscape($advo)?>" readonly />
    <?/* <label for="VOPROS" class="form__label"><?=$props_info["BLAG_VOPRO"]["NAME"]?>:</label>
      <input type="text" name="VOPROS" id="VOPROS" value="<?=CUtil::JSEscape($vopro)?>" class="form__field" readonly /> */?>
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
             formData.append('user_id', jQuery('#user_id').val());
             formData.append('ADVOKAT', jQuery('#ADVOKAT').val());
             formData.append('ip', jQuery('#ip').val());
             //formData.append('VOPROS', jQuery('#VOPROS').val());
             formData.append('MESSAGE', jQuery('#MESSAGE').val());    
             //console.log(formData);    
            var xhr = new XMLHttpRequest();
    			xhr.open("POST", "/forms/thank.php");
    
    			xhr.onreadystatechange = function() {
    				if (xhr.readyState == 4) {
    					if(xhr.status == 200) {
    						data = xhr.responseText;
    						if(data == 0) {
                                setThanksCount();
                                jQuery('#modal-form input').remove();
                                jQuery('#modal-form textarea').remove();
                                jQuery('#modal-form label').remove();
                                jQuery("#modal-form #success").show();
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
<div class="detail-text"><?echo $arResult["~DETAIL_TEXT"];?></div>
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
<div class="field field-name-field-kollegia field-type-node-reference">
	<div class="field-label" style="float: left;">Кому:&nbsp;</div>
	<div class="field-items">
		<div class="field-item even">
            <a href="<?=$arResult["KOLLEG_LINK"]?>"><?=$arResult["KOLLEG_NAME"]?></a>
		</div>
	</div>
</div>
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
<script>
    $().ready(function(){
        getAdvokatThanks(<?=$arResult['PROPERTIES']['USER']['VALUE']?>, 'question', <?=$arResult['ID']?>);
    })
</script>