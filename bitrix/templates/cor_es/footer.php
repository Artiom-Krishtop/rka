<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?>
<?if (($APPLICATION->GetCurPage() != "/es/")){?>
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
            <li><a href="/" hreflang="ru"><img src="/bitrix/templates/cor_be/images/Russia_56.png" alt="" /> Русский</a></li>
            <li><a href="/be/" hreflang="by"><img src="/bitrix/templates/cor_be/images/Bel_56.png" alt="" /> Belarus</a></li>
            <li><a href="/en/" hreflang="en"><img src="/bitrix/templates/cor_be/images/UnitedKingsom_56.png" alt="" /> English</a></li>
            <li><a href="/fr/" hreflang="fr"><img src="/bitrix/templates/cor_be/images/France_56.png" alt="" /> French</a></li>
            <li><a href="/de/" hreflang="de"><img src="/bitrix/templates/cor_be/images/Germany_56.png" alt="" /> German</a></li>
            <li><a href="/pl/" hreflang="pl"><img src="/bitrix/templates/cor_be/images/Poland_56.png" alt="" /> Polish</a></li>
            <li><a href="/es/" hreflang="es"><img src="/bitrix/templates/cor_be/images/Spain_56.png" alt="" /> Spanish</a></li>
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