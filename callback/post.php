<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$array=$_POST;
$message='';
foreach($array as $value)
{
    $key = key($array);
    if($key=='file'){ // обработка файлов из сообщения

    } 
    elseif($key=='g-recaptcha-response'){ // проверка робот или нет
       
    }
    elseif($key=='href'){  // ссылка на страницу
        $ssilka=$value;
    }
    elseif($key=='type'){ // тип сообщения (заявки)
        $type_message=$value;
    }
    elseif($key=='mail'){ // отправитель
        $mail_adres=$value;
    }
    elseif($key=='undefined'){ // кнопка отправить ничего не делаем
    }
    elseif($key=='site'){ // адрес сайта
        $site=$value;
    }
    else{
        if($key!=''){ // Если значение не пустое
            $message.='<p>'.$key.': '.$value.'</p>';
        }
    } 
    next($array);   
}
if($ssilka!=''){
    $message.='<p>Ссылка на страницу: <a href="'.$site.$ssilka.'">'.$site.$ssilka.'</a></p>';
}
if(!empty($_FILES)){
    move_uploaded_file($_FILES['file']['tmp_name'],'upload/' . $_FILES['file']['name']);
    $message.='<p>Прикрепленный файл: <a href="'.$site.'/callback/upload/'.$_FILES['file']['name'].'" target="__blank">'.$site.'/callback/upload/'.$_FILES['file']['name'].'</a></p>';
}
$message='<html><head><title>'.$type_message.'</title></head><body>'.$message.'</body></html>';
$message = mb_convert_encoding($message, "UTF-8", "auto");
$subject = mb_convert_encoding($type_message, "UTF-8", "auto");
$headers  = "Content-type: text/html; charset=utf-8 \r\n"; //Кодировка письма
$headers .= "From: mail@".$site.""; //Наименование и почта отправителя
if($_POST['g-recaptcha-response']!=''){
    echo '1';
    mail($mail_adres, $subject, $message, $headers); //Отправка письма с помощью функции mail
}else{
    echo '0';  
}
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>