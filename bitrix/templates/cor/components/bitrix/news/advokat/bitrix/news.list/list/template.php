<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if(count($arResult["ITEMS"])>0):?>
<h2 class="block-title">Ответы на вопросы</h2>
                     <div class="view-content">
		                <?foreach($arResult["ITEMS"] as $arItem):?>
                            <?$link = str_replace("advokat","question",$arItem["DETAIL_PAGE_URL"]);

                            ?>
                             <div class="views-row views-row-3">
                              <div class="views-field views-field-title">
                                  <span class="field-content">
                                    <a href="<?=$link?>" ><?=$arItem["NAME"]?></a>
                                  </span>
                              </div>
                              <div class="views-field views-field-body">
                                  <div class="field-content">
                                        <?=$arItem["~DETAIL_TEXT"]?>
                                  </div>
                              </div>
                            </div>
                        <?endforeach;?>
                    </div>
<?endif?>
