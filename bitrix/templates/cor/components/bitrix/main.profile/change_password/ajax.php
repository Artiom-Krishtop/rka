<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
?> 
  
<?if ($_POST['query']=='change_pass') {
    
      CModule::IncludeModule("iblock");

    $user_id = $_POST["ID"];
    $login = $_POST["LOGIN"];
    $OLD_PASSWORD = $_POST["old_pass"];
    $PASSWORD = $_POST["NEW_PASSWORD"];
    $CONFIRM_PASSWORD = $_POST["NEW_PASSWORD_CONFIRM"];


    function changePassword($login,$OLD_PASSWORD,$PASSWORD ,$CONFIRM_PASSWORD ){
        global  $USER;
        $mass_ret=array();
        $arAuthResult = $USER->Login($login, $OLD_PASSWORD, "Y");
        if( $arAuthResult==1){
            if($PASSWORD ==$CONFIRM_PASSWORD ){
                //test@test.ru
                //123456
                $user = new CUser;
                $fields = Array(
                    "PASSWORD"          => $PASSWORD,
                    "CONFIRM_PASSWORD"  => $CONFIRM_PASSWORD ,
                );
                //$user->Update(  $USER->GetID(), $fields);
                $strError = $user->LAST_ERROR;
                if(empty($strError)){
                    $mass_ret['success']='Сохранено';
                }else{
                    $mass_ret['error']=$strError;
                }
            }else{
                $mass_ret['error']='Пароли не совпадают';
                $mass_ret['n_iput']=2;
            }

        }else{

            $mass_ret['error']='неправильный пароль';
            $mass_ret['n_iput']=1;
        }
        return $mass_ret;
    }
    changePassword($login,$OLD_PASSWORD,$PASSWORD ,$CONFIRM_PASSWORD );
   /* print "<pre>";
    print_r($arLoadProductSERVICE);
    print "</pre>";
*/
    $user = new CUser;
    $fields = Array(
        "NAME"             => $name,
        "LAST_NAME"             => $last_name,
    );
    //$user->Update($user_id, $fields);

    $test=1;
    echo json_encode($test);
    exit();
}
else {
                $test=0;
                echo json_encode($test);
                exit();
}
 ?>
<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>