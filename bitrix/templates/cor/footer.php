<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?> <!--</td><td class="right-column"><?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "sect", 
		"AREA_FILE_SUFFIX" => "inc", 
		"AREA_FILE_RECURSIVE" => "N", 
		"EDIT_MODE" => "html", 
		"EDIT_TEMPLATE" => "sect_inc.php" 
	)
);?> <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "page", 
		"AREA_FILE_SUFFIX" => "inc", 
		"AREA_FILE_RECURSIVE" => "N", 
		"EDIT_MODE" => "html", 
		"EDIT_TEMPLATE" => "page_inc.php" 
	)
);?> </td></tr>
  </tbody>
</table>-->
<?/*if(CSite::InDir('/about/')){?>
<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"about_menu", 
	array(
		"ROOT_MENU_TYPE" => "about",
		"MAX_LEVEL" => "1",
		"CHILD_MENU_TYPE" => "about",
		"USE_EXT" => "Y",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"COMPONENT_TEMPLATE" => "about_menu",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N"
	),
	false
);?> 
<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"", 
	array(
		"ROOT_MENU_TYPE" => "aboutsub",
		"MAX_LEVEL" => "1",
		"CHILD_MENU_TYPE" => "aboutsub",
		"USE_EXT" => "Y",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"COMPONENT_TEMPLATE" => "",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N"
	),
	false
);?> 
<?}*/?>
<?if (($APPLICATION->GetCurPage() != "/")){?>
			</section>
<?}?>			
</section>
</div>

<!--BANNER_BOTTOM-->

<!--<div id="footer">-->

<?/*$APPLICATION->IncludeFile(
			$APPLICATION->GetTemplatePath("include_areas/copyright.php"),
			Array(),
			Array("MODE"=>"html")
		);*/?> 
<!--</div>-->


<footer class="myfooter">
	<div class="container">
		<section class="socials">
			<?$APPLICATION->IncludeFile(
						$APPLICATION->GetTemplatePath("include_areas/footer_text3.php"),
						Array(),
						Array("MODE"=>"html")
			);?>			
		</section>
		<section class="footerinfo">
			<?$APPLICATION->IncludeFile(
						$APPLICATION->GetTemplatePath("include_areas/footer_text2.php"),
						Array(),
						Array("MODE"=>"html")
			);?>			
		</section>
		<section class="contacts">
			<?$APPLICATION->IncludeFile(
						$APPLICATION->GetTemplatePath("include_areas/footer_text1.php"),
						Array(),
						Array("MODE"=>"html")
			);?>			
		</section>

		<?/*<section class="socials">
			  <noindex><!-- Yandex.Metrika counter --><script type="text/javascript">(function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter22625827 = new Ya.Metrika({id:22625827, webvisor:true, clickmap:true, trackLinks:true, accurateTrackBounce:true}); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="//mc.yandex.ru/watch/22625827" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter -->
			</noindex>
		</section>*/?>
        
	</div>
</footer>
<div class="region region-bottom">
    <div id="block-block-24" class="block block-block contextual-links-region first last odd">


        <ul id="langnavigation">
            <li><a href="/" hreflang="ru"><img src="/bitrix/templates/cor/images/Russia_56.png" alt="" /> Русский</a></li>
            <li><a href="/be/" hreflang="by"><img src="/bitrix/templates/cor/images/Bel_56.png" alt="" /> Belarus</a></li>
            <li><a href="/en/" hreflang="en"><img src="/bitrix/templates/cor/images/UnitedKingsom_56.png" alt="" /> English</a></li>
            <li><a href="/fr/" hreflang="fr"><img src="/bitrix/templates/cor/images/France_56.png" alt="" /> French</a></li>
            <li><a href="/de/" hreflang="de"><img src="/bitrix/templates/cor/images/Germany_56.png" alt="" /> German</a></li>
            <li><a href="/pl/" hreflang="pl"><img src="/bitrix/templates/cor/images/Poland_56.png" alt="" /> Polish</a></li>
            <li><a href="/es/" hreflang="es"><img src="/bitrix/templates/cor/images/Spain_56.png" alt="" /> Spanish</a></li>
        </ul>
    </div><!-- /.block -->
</div><!-- /.region -->
<?
// подключать скрипт будем только залогиненным пользователям
if($GLOBALS['USER']->isAuthorized()) {
   ?><script type="text/javascript"><!--
      // <этот кусок можно вынести в отдельный файл>
      var CActivityUpdate = function(sActivityUrl, iActivityTime) {
         var _this = this;
         this.sActivityUrl = sActivityUrl;
         this.iActivityTime = iActivityTime;

         // определение ajax-функции
         if(typeof(window['jQuery']['get']) == 'function') {
            // jQuery
            this.funcAjax = jQuery.get;
         } else if(typeof(window['BX']['ajax']['get']) == 'function') {
            // Bitrix
            this.funcAjax = BX.ajax.get;
         }

         // получение значения cookie
         this.getCookie = function(name) {
            var cookie = " " + document.cookie;
            var search = " " + name + "=";
            var setStr = null;
            var offset = 0;
            var end = 0;
            if(cookie.length > 0) {
               offset = cookie.indexOf(search);
               if(offset != -1) {
                  offset += search.length;
                  end = cookie.indexOf(";", offset)
                  if(end == -1) {
                     end = cookie.length;
                  }
                  setStr = unescape(cookie.substring(offset, end));
               }
            }
            return(setStr);
         };

         // установка значения cookie
         this.setCookie = function(sName, sValue, sExpires, sPath, sDomain, bSecure) {
            var sCookie = '';
            sCookie += sName + '=' + escape(sValue);
            sCookie += sExpires ? '; expires=' + sExpires : '';
            sCookie += sPath ? '; path=' + sPath : '';
            sCookie += sDomain ? '; domain=' + sDomain : '';
            sCookie += bSecure ? '; secure' : '';
            document.cookie = sCookie;
         };
         
         // выполнение "холостого" хита для обновления даты активности пользователя
         this.updateActivity = function() {
            var funcAjax = _this.funcAjax;
            if(funcAjax && typeof(funcAjax) == 'function') {
               var iLastActivity = _this.getCookie('BX_activity');
               iLastActivity = iLastActivity ? parseInt(iLastActivity) : 0;
               var oDate = new Date();
               var iCurTime = oDate.getTime();
               var bNeedUpdate = iCurTime >= (iLastActivity + _this.iActivityTime) || iCurTime < (iLastActivity - _this.iActivityTime);
               if(bNeedUpdate) {
                  var sExpires = false; //'Mon, 01-Jan-2018 00:00:00 GMT'
                  _this.setCookie('BX_activity', iCurTime, sExpires, '/');
                  funcAjax(_this.sActivityUrl);
               }
            }
         };

         // запуск обновления даты активности пользователя с заданным интервалом
         this.startUpdating = function() {
            if(_this.funcAjax && typeof(_this.funcAjax) == 'function') {
               setInterval(_this.updateActivity, _this.iActivityTime);
            }
         };
      };
      // </этот кусок можно вынести в отдельный файл>

      // запрашиваемая страница - /ajax_user_activity_update.php
      // интервал обновления - две минуты (в миллисекундах)
      var appActivityUpdate = new CActivityUpdate('/ajax_user_activity_update.php', (1000*60*2));
      appActivityUpdate.startUpdating();
   //--></script><?
}
?>	
</body>
</html>