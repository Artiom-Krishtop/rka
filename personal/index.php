<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Персональный раздел");
LocalRedirect("/personal/profile/");
?>
  <p>На странице <b>Настройка пользователя</b> пользователь имеет возможность редактировать личные данные, регистрационную информацию, информацию о работе и т. д. Вывод данной формы осуществлен с помощью компонента <i>Параметры пользователя</i>. </p>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>