<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Условия для заказа и все возможные варианты оплаты - на этой странице.");
$APPLICATION->SetPageProperty("title", "Информация по доставке и оплате заказов в пекарне «Супер Пироги»");
$APPLICATION->SetTitle("Доставка и оплата");
?><script type="text/javascript" src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&coordorder=longlat&apikey=7905f89a-4485-4f78-a9fd-82c42015a9fa"></script> <script type="text/javascript" src="https://yandex.st/jquery/2.2.3/jquery.js"></script> <script src="/delivery_zones.js" type="text/javascript"></script> <section class="delivery center">
<div class="delivery_wrap d-flex">
	<div class="text_block">
		<h4 class="text_block_heading">
		Заказы принимаются </h4>
		<p>
			 Ежедневно с 7:00 до 20:00
		</p>
		<h4 class="text_block_heading">
		Доставка производится </h4>
		<p>
			 Ежедневно с 8:00 до 21:00
		</p>
		<h4 class="text_block_heading">
		Доставка на утро </h4>
		<p>
			 Оформление заявок на утреннюю доставку принимаются по стандартному расписанию с пометкой.
		</p>
	</div>
	<div class="text_block">
		<ul>
			<li>
			при оформлении заказа по телефону: банковской картой курьеру (необходимо об этом заранее предупредить оператора во время оформления заказа) или наличными курьеру при получении заказа </li>
			<li>
			при оформлении заказа через сайт: наличными курьеру при получении заказа </li>
			<li>
			при оформлении заказа через сайт: оплата банковской картой курьеру</li>
		</ul>
	</div>
</div>
<h3 class="section_subheading" align="center">Условия доставки </h3>
<form class="search_form">
 <label class="input_wrap"> <input type="email" name="email" required=""> <span class="placeholder">Поиск по адресу</span> <button> </button> </label>
</form>
 </section>
<!-- delivery -->
<div id="map">
</div>
 <style>
        html, body, #map {
            width: 100%;
            height: 100%;
            padding: 0;
            margin: 0;
        }
		#map {
			height:400px !important;
			    margin-bottom: 100px;
			}
</style> <!-- contact_form -->
<form id="call_formaa" enctype="multipart/form-data" class="contact_form center" onsubmit="submit_button(this);return false;">
	<div id="sk_call_form_container">
		<p id="sk_call_error">
		</p>
		<h3 class="subscribe_form-heading">
		Обратная связь </h3>
		<p class="subscribe_form-text">
			 Мы с радостью ответим на все Ваши вопросы и предложения!
		</p>
 <label class="input_wrap"> <input type="text" name="Имя" placeholder="Имя *" required="required"> </label> <label class="input_wrap"> <input type="text" name="Почта" placeholder="E-mail *" required="required"> </label> <label class="input_wrap"> <textarea name="Комментарий" placeholder="Ваше сообщение"></textarea> </label> <input type="hidden" name="site" value="superpirogi.ru"> <input type="hidden" name="href" value="<?=$_SERVER['REQUEST_URI']?>"> <input type="hidden" name="type" value="Сообщение из формы страницы Доставка и Оплата!"> <input type="hidden" name="mail" value="info@superpirogi.ru"> <input type="hidden" name="g-recaptcha-response" value="true"> <input onclick="yaCounter64629202.reachGoal('obratnaya-svyaz'); return true;" class="btn btn-gold" type="submit" value="Отправить">
	</div>
</form>
  <!-- contact_form --><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>