<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Мы принимаем заказы с 7:00 до 18:30. Находимся по адресу Москва,1-я улица Бухвостова 12/11к20, телефон для связи: +7(495)015-30-45.");
$APPLICATION->SetPageProperty("title", "Контактная информация пекарни «Супер Пироги»");
$APPLICATION->SetTitle("Контакты");
?>
<section class="center contacts">
<? if (CModule::IncludeModule("iblock")){$res = CIBlockElement::GetList(Array(), Array("IBLOCK_ID"=>16,"ID"=>354));while($ob = $res->GetNext()){?><?print_r($ob["DETAIL_TEXT"]);?><?}} ?>
</section>
<form    id="call_form"   enctype="multipart/form-data" class="contact_form center" onsubmit="submit_button(this);return false;">
<div id="sk_call_form_container">
    <p id="sk_call_error"></p>
      <h3 class="subscribe_form-heading">
        Обратная связь
      </h3>
      <p class="subscribe_form-text">
        Мы с радостью ответим на все Ваши вопросы и предложения!
      </p>
      <label class="input_wrap">
	 <input type="text" name="Имя" placeholder="Имя *" required="required">
      </label>
      <label class="input_wrap">
		<input type="text" name="Почта" placeholder="E-mail *" required="required">
      </label>
      <label class="input_wrap">
        <textarea name="Комментарий" placeholder="Ваше сообщение"></textarea>
      </label>
	<input type="hidden" name="site" value="superpirogi.ru">
    <input type="hidden" name="href" value="<?=$_SERVER['REQUEST_URI']?>">
    <input type="hidden" name="type" value="Сообщение из формы страниц контактов!">
    <input type="hidden" name="mail" value="info@superpirogi.ru">
	<input type="hidden" name="g-recaptcha-response" value="true">
	<input class="btn btn-gold" type="submit" value="Отправить" onclick=""> 
	</div>
    </form>
	
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php")?>