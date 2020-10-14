<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (empty($arResult["VOTE"]) || empty($arResult["QUESTIONS"])):
	return true;
endif;
?>
<ol class="vote-items-list vote-question-list vote-question-list-main-page">
<?

$iCount = 0;
foreach ($arResult["QUESTIONS"] as $arQuestion):
	$iCount++;
?>
	<li class="vote-question-item <?/*=($iCount == 1 ? "vote-item-vote-first " : "")?><?
				?><?=($iCount == count($arResult["QUESTIONS"]) ? "vote-item-vote-last " : "")?><?
				?><?=($iCount%2 == 1 ? "vote-item-vote-odd " : "vote-item-vote-even ")?><?
				*/?>">
		<div class="vote-item-title vote-item-question"><?=$arQuestion["QUESTION"]?></div>
		<ol class="vote-items-list vote-answers-list">
<?
	foreach ($arQuestion["ANSWERS"] as $arAnswer):
?>
			<li class="vote-answer-item">
<?
		if ($arParams["THEME"] == ""):
        
/*print "<pre>";
print_r($arResult["QUESTIONS"]);
print "</pre>";   */
?>           <div class="quest-vote"><?=$arAnswer["MESSAGE"]?></div>
				<div class="graph-bar foreground" style="width: <?=$arAnswer["BAR_PERCENT"]?>%;<?/*background-color:#<?=htmlspecialcharsbx($arAnswer["COLOR"])*/?>">&nbsp;</div>
				
				<? if (isset($arResult['GROUP_ANSWERS'][$arAnswer['ID']])): 
						if (trim($arAnswer["MESSAGE"]) != '') 
							echo '&nbsp';
						echo '('.GetMessage('VOTE_GROUP_TOTAL') .')';
					endif; 
                    
if(preg_match("|(1)$|",$arAnswer["COUNTER"])){
        $comment='голос';
}   // Если число заканчивается на 2,3,4
elseif(preg_match("/(2|3|4)$/",$i)){
        $comment='голоса';
}else{
        $comment='голосов';
}                    
                    
                    ?>  <?=$arAnswer["PERCENT"]?>% (<?=$arAnswer["COUNTER"]?> <?=$comment?> )<br />

				<? if (isset($arResult['GROUP_ANSWERS'][$arAnswer['ID']])): ?>
					<? $arGroupAnswers = $arResult['GROUP_ANSWERS'][$arAnswer['ID']]; ?> 
					<?foreach ($arGroupAnswers as $arGroupAnswer):?>
						</li>
						<li class="vote-answer-item">
							<? if (trim($arAnswer["MESSAGE"]) != '') { ?>
								<span class='vote-answer-lolight'><?=$arAnswer["MESSAGE"]?>:&nbsp;</span>
							<? } ?>
							<?//=$arGroupAnswer["MESSAGE"]?> <?=$arGroupAnswer["PERCENT"]?>% (<?=($arGroupAnswer["COUNTER"] > 0?'&nbsp;':'')?><?=$arGroupAnswer["COUNTER"]?>)<br />
							<div class="graph-bar foreground" style="width: <?=$arGroupAnswer["PERCENT"]?>%;<?/*background-color:#<?=htmlspecialcharsbx($arAnswer["COLOR"])*/?>">&nbsp;</div>
					<?endforeach?>
				<? endif; // GROUP_ANSWERS ?>
<?
		else:
?>
				<?=$arAnswer["MESSAGE"]?>
				<? if (isset($arResult['GROUP_ANSWERS'][$arAnswer['ID']])): 
						if (trim($arAnswer["MESSAGE"]) != '') 
							echo '&nbsp';
						echo '('.GetMessage('VOTE_GROUP_TOTAL') .')';
					endif; ?>
				<div class="graph">
					<nobr class="bar" style="width: <?=(round($arAnswer["BAR_PERCENT"]))?>%;">
						<span><?=$arAnswer["COUNTER"]?> (<?=$arAnswer["PERCENT"]?>%)</span>
					</nobr>
				</div>
				<? if (isset($arResult['GROUP_ANSWERS'][$arAnswer['ID']])): ?>
					<? $arGroupAnswers = $arResult['GROUP_ANSWERS'][$arAnswer['ID']]; ?> 
					<?foreach ($arGroupAnswers as $arGroupAnswer):?>
						</li>
						<li class="vote-answer-item">
							<? if (trim($arAnswer["MESSAGE"]) != '') { ?>
								<span class='vote-answer-lolight'><?=$arAnswer["MESSAGE"]?>:&nbsp;</span>
							<? } ?>
							<?=$arGroupAnswer["MESSAGE"]?>
							<div class="graph">
								<nobr class="bar" style="width: <?=(round($arGroupAnswer["PERCENT"]))?>%;">
									<span><?=$arGroupAnswer["COUNTER"]?> (<?=$arGroupAnswer["PERCENT"]?>%)</span>
								</nobr>
							</div>
					<?endforeach?>
				<? endif; // GROUP_ANSWERS ?>
<?
		endif;
?>
			</li>
<?
	endforeach; 
?>
		</ol>
                        <div class="total">Всего голосов: <?=$arResult["QUESTIONS"][7]["COUNTER_SUM"]?>  </div>
	</li>
<?
endforeach; 
?>
</ol>