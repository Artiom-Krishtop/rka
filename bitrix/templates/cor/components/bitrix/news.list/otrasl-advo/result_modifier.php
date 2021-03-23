<?
//if (($APPLICATION->GetCurPage() == "/avto-i-gai/")){
    foreach ($arParams["USER_ID"] as $val)
    {
        //$arResult["TID"][] = $val;
        foreach ($arResult["ITEMS"] as $arItem)
        {
            if ($arItem["ID"] == $val)
            {
                $arResult["NEWITEMS"][] = $arItem;

            }
        }
    }
    $arResult["ITEMS"] = $arResult["NEWITEMS"];

//}



?> 