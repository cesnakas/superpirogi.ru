
<!-- sitemap -->
    <section class="sitemap center d-flex">
      <div class="sitemap_item">
        <div class="sitemap_heading">
          Заказать
        </div>
		<? if (CModule::IncludeModule("iblock")){$result = CIBlockElement::GetList(Array("sort"=>"asc"), Array('IBLOCK_ID'=>11), false, Array("nPageSize"=>50), Array("CODE","NAME"));while($res = $result->GetNext()){?>
        <ul class="sitemap_list">
          <li><a href="<?=$res['CODE']?>">
            <?=$res['NAME']?>
          </a></li>
        </ul>
		<?}}?>
      </div>
      <div class="sitemap_item">
        <div class="sitemap_heading">
          О компании
        </div>
		<? if (CModule::IncludeModule("iblock")){$result = CIBlockElement::GetList(Array("sort"=>"asc"), Array('IBLOCK_ID'=>12), false, Array("nPageSize"=>50), Array("CODE","NAME"));while($res = $result->GetNext()){?>
        <ul class="sitemap_list">
          <li><a href="<?=$res['CODE']?>">
             <?=$res['NAME']?>
          </a></li>
        </ul>
		<?}}?>
      </div>
      <div class="sitemap_item sitemap_item-payment">
        <div class="sitemap_heading">
          Способы оплаты
        </div>
        <div class="payment_types d-flex">
		<? if (CModule::IncludeModule("iblock")){$result = CIBlockElement::GetList(Array("sort"=>"asc"), Array('IBLOCK_ID'=>13), false, Array("nPageSize"=>50), Array("PREVIEW_TEXT"));while($res = $result->GetNext()){?>
		<?=$res['PREVIEW_TEXT']?>
		  <?}}?>
        </div>
      </div>
      <div class="sitemap_item">
        <div class="sitemap_heading">
          Контакты
        </div>
<? if (CModule::IncludeModule("iblock")){$result = CIBlockElement::GetList(Array("sort"=>"asc"), Array('IBLOCK_ID'=>14), false, Array("nPageSize"=>50), Array("PREVIEW_TEXT"));while($res = $result->GetNext()){?>
		<?=$res['PREVIEW_TEXT']?>
		  <?}}?>
      </div>
    </section>
  <!-- sitemap -->
  <!-- footer -->
    <footer class="footer center d-flex">
      <a href="/" class="logo">
        <? if (CModule::IncludeModule("iblock")){$res = CIBlockElement::GetList(Array(), Array("IBLOCK_ID"=>15,"ID"=>350));while($ob = $res->GetNext()){?><?print_r($ob["PREVIEW_TEXT"]);?><?}} ?>
      </a>
      <p class="copyright">
        <? if (CModule::IncludeModule("iblock")){$res = CIBlockElement::GetList(Array(), Array("IBLOCK_ID"=>15,"ID"=>351));while($ob = $res->GetNext()){?><?print_r($ob["PREVIEW_TEXT"]);?><?}} ?>
      </p>
      <p class="policy">
        <? if (CModule::IncludeModule("iblock")){$res = CIBlockElement::GetList(Array(), Array("IBLOCK_ID"=>15,"ID"=>352));while($ob = $res->GetNext()){?><?print_r($ob["PREVIEW_TEXT"]);?><?}} ?>
      </p>
    </footer>
  <!-- footer -->
</div>
<!-- scripts -->
  <script
    src="https://code.jquery.com/jquery-3.4.0.min.js"
    integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
    crossorigin="anonymous">
  </script> <!-- jQuery -->
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="/js/main.js"></script>
<script src="/js/jquery.lazyload.min.js"></script>  <!-- main scripts -->
<!-- scripts -->
<form    id="call_formrew"   enctype="multipart/form-data" class="contact_form center sk_call_form" onsubmit="submit_buttonn(this);return false;">
	<span class="subscribe_form-heading rewqas">Оставьте отзыв</span>
  <span class="sk_call_close" onclick="$('#'+this.parentNode.id).fadeOut();"></span>
  <div id="sk_call_form_container">
    <p id="sk_call_error"></p>
    <label class="input_wrap reew">
      <input type="text" name="Имя" placeholder="Имя *" required="required">
    </label>
    <label class="input_wrap reew">
		  <input type="text" name="Почта" placeholder="E-mail *" required="required">
    </label>
    <label class="input_wrap reew">
      <textarea name="Отзыв" placeholder="Ваш отзыв"></textarea>
    </label>
    <input type="hidden" name="site" value="superpirogi.ru">
    <input type="hidden" name="href" value="<?=$_SERVER['REQUEST_URI']?>">
    <input type="hidden" name="type" value="Новый отзыв на сайте!!">
    <input type="hidden" name="mail" value="info@superpirogi.ru">
    <input type="hidden" name="g-recaptcha-response" value="true">
    <input class="btn btn-gold" type="submit" value="Отправить" onclick="yaCounter64629202.reachGoal('ostavit-otzyv'); return true;">
	</div>
</form>
<form    id="call_formrewq"   enctype="multipart/form-data" class="contact_form center sk_call_form" onsubmit="submit_buttonnn(this);return false;">
	<span class="subscribe_form-heading rewqas">Заказать звонок!</span>
  <span class="sk_call_close" onclick="$('#'+this.parentNode.id).fadeOut();"></span>
  <div id="sk_call_form_container">
    <p id="sk_call_error"></p>
    <label class="input_wrap reew">
      <input type="text" name="Имя" placeholder="Имя *" required="required">
    </label>
    <label class="input_wrap reew">
		  <input type="tel" name="Номер" placeholder="Номер *" required="required">
    </label>
    <label class="input_wrap reew">
      <textarea name="Сообщение" placeholder="Ваше сообщение"></textarea>
    </label>
    <input type="hidden" name="site" value="superpirogi.ru">
    <input type="hidden" name="href" value="<?=$_SERVER['REQUEST_URI']?>">
    <input type="hidden" name="type" value="Новая заявка обратного звонка!!">
    <input type="hidden" name="mail" value="info@superpirogi.ru">
    <input type="hidden" name="g-recaptcha-response" value="true">
    <input class="btn btn-gold" type="submit" value="Отправить" onclick="yaCounter64629202.reachGoal('ostavit-otzyv'); return true;">
	</div>
</form>
	<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(64629202, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true,
        ecommerce:"dataLayer"
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/64629202" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<script >
$('.btn-gold').on('click', function(){
    var that = $(this).closest('.catalog_item').find('img');
    var bascket = $(".mobfly");
    var w = that.width();
    that.clone()
        .css({'width' : w,
        'position' : 'absolute',
        'z-index' : '9999',
		'border-radius' : '50%',
        top: that.offset().top,
        left:that.offset().left})
        .appendTo("body")
        .animate({opacity: 0.05,
            left: bascket.offset()['left'],
            top: bascket.offset()['top'],
            width: 20}, 1000, function() {
                $(this).remove();
            });
});

$('body').on('click', '#metro_show', function(){
  $('.list_delivery_area').addClass('show_metro');
  $(this).addClass('dnone');
  console.log('fewf');
});

$('#soa-property-1').attr("placeholder", "Ф.И.О");
$('#soa-property-20').attr("placeholder", "Ваш Email");
$('#soa-property-3').attr("placeholder", "Ваш телефон");
$('#soa-property-7').attr("placeholder", "Адрес доставки");
$('#orderDescription').attr("placeholder", "Комментарии к заказу");
$('#soa-property-22').attr("placeholder", "Введите дату и время доставки в формате '08.09.2020 16:00' или воспользуйтесь формой справа.");
</script>
<script>
$(function() {
    $("img.lazy").lazyload();
});
</script>
<style>
span.size_choose-text.cats:hover {border-bottom: 0 !important;}
span.size_choose-text.cats:hover {border: 0 !important;padding: 0px !important;border-radius: 5px !important;background: #edd081;}
li.product-item-scu-item-text-container.selected span:hover {background: #edd08100 !important;}
.input-group-append.bx-no-alter-margin {cursor: pointer;}
</style>
<div itemscope itemtype="http://schema.org/Organization">
<meta itemprop="name" content="Супер Пироги">
<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
<meta itemprop="addressLocality" content="Москва">
<meta itemprop="streetAddress" content="улица Александра Солженицына, 40с2.">
<meta itemprop="postalCode" content="109004">
</div>
<meta itemprop="telephone" content="+7(495)015-30-45">
<meta itemprop="email" content="info@superpirogi.ru">
</div>
<style>@media(max-width:555px){form#call_formrewq {left: 57%;}}</style>
</body>
</html>