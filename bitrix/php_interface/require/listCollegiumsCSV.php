<?php

class ListCollegiumsCSV
{
    private $iblockId = 15;

    public function __construct()
    {
        CModule::IncludeModule("iblock");
        $collegiums = $this->getSections();
        $consults = $this->getItems();
        $this->createCollegiumsCSV($collegiums, $consults);
        $this->createConsultationCSV($collegiums, $consults);
    }

    private function createCollegiumsCSV($collegiums, $consults)
    {
        $res = [implode(';', [
            'Название коллегии',
            'Номер(а) телефона(ов)',
            'Адрес коллегии',
            'Личный сайт коллегии',
            'Юридические консультации'
        ])];
        foreach ($collegiums as $collegium)
        {
            $item = [];
            foreach (['NAME', 'PHONE', 'ADDRESS', 'SITE'] as $field)
            {
                $item[] = $collegium[$field];
            }
            $cons = array_map(function ($a) { return $a['NAME']; },
                array_filter($consults, function ($a) use ($collegium) { return $a['SECTION'] == $collegium['SECTION']; })
            );
            $item[] = implode(', ', $cons);
            $res[] = implode(';', $item);
        }
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/file/krhtge4t6jlkhj', implode("\n", $res), LOCK_EX);
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/upload/collegium.csv', implode("\n", $res), LOCK_EX);
    }

    private function createConsultationCSV($collegiums, $consults)
    {
        $res = [implode(';', [
            'Название юридической консультации',
            'Телефон(ы)',
            'Адрес',
            'Сайт коллегии',
        ])];
        foreach ($consults as $consult)
        {
            $item = [];
            $item[] = $consult['NAME'];
            $item[] = $consult['PHONE'];

            $addr = $consult['COL_STREET'] . ' д.' . $consult['COL_HOUSE'];
            if (!empty($consult['COL_BUILDING'])) $addr .= ' к.' . $consult['COL_BUILDING'];
            if (!empty($consult['COL_ROOM'])) $addr .= ' каб.' . $consult['COL_ROOM'];
            $item[] = $addr . ', ' . $consult['COL_CITY'];

            $collegium = array_filter($collegiums, function ($a) use ($consult) { return $a['SECTION'] == $consult['SECTION']; });
            if (!empty($collegium)){
                $collegium = array_shift($collegium);
                $item[] = 'https://rka.by/kollegies/' . $collegium['CODE'] . '/' . $consult['CODE'] . '/';
            }else{
                $item[] = '';
            }

            $res[] = implode(';', $item);
        }
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/file/lklngsfhlyd56dg', implode("\n", $res), LOCK_EX);
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/upload/lawConsultation.csv', implode("\n", $res), LOCK_EX);
    }

    private function getSections()
    {
        $dbl = CIBlockSection::GetList(['NAME' => 'ASC'],
            ['IBLOCK_ID' => $this->iblockId, 'ACTIVE' => 'Y'],
            false,
            ['ID', 'IBLOCK_ID', 'NAME', 'UF_S_WEBSITE', 'UF_S_PHONE', 'UF_S_ADRES']
        );
        $matches = [];
        $res = [];
        while ($arr = $dbl->Fetch())
        {
            $info = [
                'ID' => $arr['ID'],
                'NAME' => $arr['NAME'],
                'PHONE' => strip_tags($arr['UF_S_PHONE']),
                'SITE' => $arr['UF_S_WEBSITE'],
                'ADDRESS' => '',
            ];
            $str = strip_tags(str_replace(["\n", "\r", "\t", "\v", "\0", ';', "&nbsp"], '', $arr['UF_S_ADRES']));
            if (preg_match('/(.*)(\d{6})(.*)Беларусь/', $str, $matches))
            {
                $info['ADDRESS'] = $matches[1] . ' ' . $matches[2] . ' ' . $matches[3] . ' Беларусь';
            }
            $res[] = $info;
        }

        $sectionIds = array_map(function ($a){ return $a['ID']; }, $res);
        $dbl = CIBlockSection::GetList(false,
            ['IBLOCK_ID' => $this->iblockId, 'SECTION_ID' => $sectionIds],
            false,
            ['ID', 'IBLOCK_ID', 'IBLOCK_SECTION_ID', 'NAME', 'CODE']
        );
        $sections = [];
        while ($arr = $dbl->Fetch())
        {
            $sections[$arr['IBLOCK_SECTION_ID']] = $arr;
        }

        $res = array_map(function ($a) use ($sections) {
            if (!empty($sections[$a['ID']]))
            {
                $a['SECTION'] = $sections[$a['ID']]['ID'];
                $a['CODE'] = $sections[$a['ID']]['CODE'];
            }else{
                $a['SECTION'] = '';
                $a['CODE'] = 0;
            }
            return $a;
        }, $res);

        return $res;
    }

    private function getItems()
    {
        $properties = ['PHONE', 'COL_CITY', 'COL_STREET', 'COL_HOUSE', 'COL_BUILDING', 'COL_ROOM'];
        $select = ['ID', 'IBLOCK_ID', 'NAME', 'IBLOCK_SECTION_ID', 'CODE'];
        foreach ($properties as $property) $select[] = "PROPERTY_$property";
        $dbl = CIBlockElement::GetList(['NAME' => 'ASC'],
            ['IBLOCK_ID' => $this->iblockId, 'ACTIVE' => 'Y'], false, false,
            $select
        );
        $res = [];
        while ($arr = $dbl->Fetch())
        {
            $info = [
                'NAME' => $arr['NAME'],
                'SECTION' => $arr['IBLOCK_SECTION_ID'],
                'CODE' => $arr['CODE'],
            ];
            foreach ($properties as $property) $info[$property] = trim($arr["PROPERTY_{$property}_VALUE"]);
            $res[] = $info;
        }
        return $res;
    }

}

function listCollegiumCSV()
{
    new ListCollegiumsCSV();
    return "listCollegiumCSV();";
}
