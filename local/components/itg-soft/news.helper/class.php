<?php
#components/bitrix/example/class.php

use Bitrix\Main\Engine\ActionFilter;
use \Bitrix\Main\Engine\Contract\Controllerable;
use Bitrix\Main\Loader;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

class NewsHelperComponent extends \CBitrixComponent implements Controllerable{

    protected $lawyerId;
    protected $questionId;

    public function configureActions()
    {
        //если действия не нужно конфигурировать, то пишем просто так. И будет конфиг по умолчанию 
        return [
            'getAdvokatInfo' => [
                'prefilters' => [
                    new ActionFilter\HttpMethod([
                        ActionFilter\HttpMethod::METHOD_POST
                    ])
                ],
				'postfilters' => []
            ],
        ];
    }

    public function getAdvokatInfoAction($lawyerId, $page, $questionId = 0){

        Loader::includeModule('iblock');
        Loader::IncludeModule("forum");

        $result = [];

        $this->lawyerId = $lawyerId;
        $this->questionId = $questionId;

        if($page == 'question' && intval($questionId) > 0){
        
            $thanksCount = $this->getCountThanksQuestion();
        }else {
            
            $thanksCount = $this->getCountThanks();
        }

        $answerCount = $this->getAnswerCount(); 
        $blogCount = $this->getBlogCount();
        $commentCount = $this->getCommentCount();

        $result['COUNTERS']['COUNT_BLAGOD'] = [$thanksCount, $this->makeSentece($thanksCount, ['благодарностей', 'благодарность', 'благодарности'])];
        $result['COUNTERS']['COUNT_BLOG'] = [$blogCount, $this->makeSentece($blogCount, ['статей', 'статья', 'статьи'])];
        $result['COUNTERS']['COUNT_COMMENT'] = [$commentCount, $this->makeSentece($commentCount, ['комментариев', 'комментарий', 'комментария'])];
        $result['COUNTERS']['COUNT_OTVET'] = [$answerCount, $this->makeSentece($answerCount, ['ответов', 'ответ', 'ответa'])];

        $result['IS_ONLINE'] = CUser::IsOnLine($this->lawyerId, 120);

        return $result;
    }

    /* Вывод количества ответов */
    public function getAnswerCount(){

        $answerCount = ListLawAnsw::getAnswerCout($this->lawyerId);

        if(empty($answerCount)){
            $answerCount = 0;
        }

        return $answerCount;
    }

     /* Вывод счётчика благодарностей */
    public function getCountThanks(){

        $counter = 0;

        $arFilter = [
            'IBLOCK_ID' => 16,
            'ACTIVE' => 'Y',
            'ACTIVE_DATE' => 'Y',
            'PROPERTY_USER' => $this->lawyerId
        ];

        $arSelect = [
            'PROPERTY_COUNTER_BLAGOD'
        ];

        $res = CIBlockElement::GetList(['SORT' => 'ASC'], $arFilter, false, false, $arSelect);

        while($rs = $res->Fetch()){
            if(!empty($rs['PROPERTY_COUNTER_BLAGOD_VALUE'])){
                $counter += $rs['PROPERTY_COUNTER_BLAGOD_VALUE'];
            }
        }

        /* Суммируем количество благодарностей, полученных по старой логике */
        $counter += $this->getOldLogicCountBlagod();
        
        return $counter;
    }

        /* Вывод счётчика благодарностей на странице с вопросами*/
    public function getCountThanksQuestion(){

        $counter = 0;

        $arFilter = [
            'ID' => $this->questionId,
            'IBLOCK_ID' => 16,
            'ACTIVE' => 'Y',
            'ACTIVE_DATE' => 'Y',
            'PROPERTY_USER' => $this->lawyerId
        ];

        $arSelect = [
            'PROPERTY_COUNTER_BLAGOD'
        ];

        $res = CIBlockElement::GetList(['SORT' => 'ASC'], $arFilter, false, false, $arSelect);

        while($rs = $res->Fetch()){
            if(!empty($rs['PROPERTY_COUNTER_BLAGOD_VALUE'])){
                $counter = $rs['PROPERTY_COUNTER_BLAGOD_VALUE'];
            }
        }

        return $counter;
    }

    /* вывод благодарностей по старой логике */
    protected function getOldLogicCountBlagod(){
        $counter = 0;

        $arFilter = [
            'IBLOCK_ID' => 17,
            '=PROPERTY_USER' => $this->lawyerId,
        ];

        $arSelect = [
            'PROPERTY_BLAGOD',
        ];

        $res = CIBlockElement::GetList(['SORT' => 'ASC'], $arFilter, false, false, $arSelect);

        while($rs = $res->Fetch()){
            if(!empty($rs['PROPERTY_BLAGOD_VALUE'])){
                $counter = intval($rs['PROPERTY_BLAGOD_VALUE']);
            }
        }

        return $counter;
    }

    /* Вывод счётчика статей */
    public function getBlogCount(){
        
        $resElemBl = CIBlockElement::GetList(
            false,      // сортировка
            array('IBLOCK_ID' => 14,"PROPERTY_USER"=>$this->lawyerId),   // фильтрация
            false,      // параметры группировки полей
            false,      // параметры навигации
            array("ID") // поля для выборки
        );

        $countBlog = $resElemBl -> SelectedRowsCount();

        if(empty($countBlog)){
            
            $countBlog = 0;
        }

        return $countBlog;
    }


    /* Вывод счётчика комментариев */
    public function getCommentCount(){
        
        $arm_Top = CForumMessage::GetList(array("ID" => "ASC"), array("AUTHOR_ID" => $this->lawyerId));

        $cont = 0;
        
        while ($arMes = $arm_Top->Fetch()) {
            $cont++;
        }
        
        return $cont;
    }


    /* Транслит слов */
    public function makeSentece($counter, array $words){

        if($counter > 0){

            if(preg_match("/(5|6|7|8|9|0|11|12|13|14)$/",$counter)){
                $word = $words[0];
            }elseif(preg_match("|(1)$|",$counter)){
                $word = $words[1];
            }elseif(preg_match("/(2|3|4)$/",$counter)){
                $word = $words[2];
            }
            
        }else {
            return $words[0];
        }

        return $word;
    }
}