<!-- ВСТАВЛЯЕМ В ХЕДЕР -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="/callback/scriptes.js"></script><!-- Подключаем наши скрипты -->
<link rel="stylesheet" href="/callback/styles.css"/>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>   
<script type="text/javascript">
    var onloadCallback = function() {
        mysitekey = '6Letzy4UAAAAAHHAh52Thb8GEz3jF3Vv3jHCk2aa'; // ВСТАВЛЯЕМ УНИКАЛЬНЫЙ КЛЮЧ
        grecaptcha.render('recaptcha1', {'sitekey' : mysitekey}); // ЕСЛИ НУЖНО БОЛЬШЕ КАПЧ - КЛОНИРУЕМ ДАННУЮ СТРОКУ И МЕНЯЕМ ID
    };
    $(document).ready(function($ss1) {
        $("#sk_mask_1").inputmask("+7(999)999-99-99");//ìàñêà
    });
</script> 

<!-- /// ВСТАВЛЯЕМ В ХЕДЕР -->



<!-- /// КНОПКА ПУСКА -->
ДОБАВЛЯЕМ В СПАН ИЛИ ССЫЛКУ АТРИБУТ 

onclick="$('#'+'call_form').fadeIn();"

<!-- /// КНОПКА ПУСКА -->










<!-- ОБЯЗАТЕЛЬНО МЕНЯЕМ ID ФОРМЫ НА УНИКАЛЬНЫЙ -->
<form    id="call_form"   enctype="multipart/form-data" class="sk_call_form" onsubmit="submit_button(this);return false;">
<!-- Если нужно сделать не всплывающую форму добавляем к классу формы "sk_call_opened" -->


    <!-- НАЗВАНИЕ И КНОПКА ЗАКРЫТЬ -->
    <span class="sk_call_title">Обратный звонок</span>
    <span class="sk_call_close" onclick="$('#'+this.parentNode.id).fadeOut();"></span>
    

<div id="sk_call_form_container">


    <!-- БЛОК ВЫВОДА ОШИБОК -->
    <p id="sk_call_error"></p>


    <!-- Поле для информации ОБЯЗАТЕЛЬНО ВСТАВЛЯЕМ "NAME" на РУССКОМ -->
    <input type="text" name="Имя" placeholder="Ваше имя *" required="required">
    <input type="text" name="Телефон" placeholder="Ваш телефон *" id="sk_mask_1" required="required">
    <textarea name="Комментарий" placeholder="Комментарий к сообщению"></textarea>
    <?$APPLICATION->IncludeComponent(
                              "bitrix:menu",
                              "select",
                              Array(
                                "ROOT_MENU_TYPE" => "left",
                                "MENU_CACHE_TYPE" => "A",
                                "MENU_CACHE_TIME" => "3600",
                                "MENU_CACHE_USE_GROUPS" => "Y",
                                "MENU_CACHE_GET_VARS" => "",
                                "MAX_LEVEL" => "1",
                                "CHILD_MENU_TYPE" => "",
                                "USE_EXT" => "Y",
                                "DELAY" => "N",
                                "ALLOW_MULTI_SELECT" => "N",
                              )
    );?>
    <!-- !!!!!!!!!!!!!!!!!!!!! -->
    <!-- Копируем столько полей "INPUT", "SELECT", "TEXTAREA" сколько нужно -->
    <!-- !!!!!!!!!!!!!!!!!!!!! -->


    <!-- Блок отправки файлов, файлы добавляются автоматически, максимум 3 файла! -->
    <div class="sk_files_array">
        <input id="sk_file" type="file" name="file"/>
    </div>    
    <div class="sk_files_dostup">(Доступные типы файлов: doc, gif, jpg, mpg, pdf, png, txt, zip, xlsm, dwg)</div>  
   

    <!-- СЛУЖЕБНЫЕ ПОЛЯ ОБЯЗАТЕЛЬНО!!!! -->
    <input type="hidden" name="site" value="site.ru">
    <input type="hidden" name="href" value="<?=$_SERVER['REQUEST_URI']?>">
    <input type="hidden" name="type" value="Сообщение из формы обратной связи!">
    <input type="hidden" name="mail" value="почта@mail.ru">


    <!-- СОГЛАШЕНИЕ И КАПЧА (ОБЯЗАТЕНО МЕНЯЕМ ССЫЛКУ В СОГЛАШЕНИИ) -->
    <div class="sk_call_private">
        <input type="checkbox" id="sk_private_check" required="required"> 
        <label for="sk_private_check">Я согласен с условиями <a href="МЕНЯЕМ_ЗДЕСЬ_ССЫЛКУ" target="__blank">пользовательского соглашения</a>.</label>
    </div>
    <div class="g-recaptcha" id="recaptcha1"></div>


    <!-- КНОПКА ОТПРАВИТЬ -->
    <input type="submit" value="Отправить" onclick="">   


</div>


</form>


код капчи для плазмы - 6LcnTDMUAAAAAHgevMoQlSxfJr0AjAizRbqiWBse