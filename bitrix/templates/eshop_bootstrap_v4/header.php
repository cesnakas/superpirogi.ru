<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/".SITE_TEMPLATE_ID."/header.php");
CJSCore::Init(array("fx"));

\Bitrix\Main\UI\Extension::load("ui.bootstrap4");

if (isset($_GET["theme"]) && in_array($_GET["theme"], array("blue", "green", "yellow", "red")))
{
	COption::SetOptionString("main", "wizard_eshop_bootstrap_theme_id", $_GET["theme"], false, SITE_ID);
}
$theme = COption::GetOptionString("main", "wizard_eshop_bootstrap_theme_id", "green", SITE_ID);

$curPage = $APPLICATION->GetCurPage(true);

$curCanDir = $APPLICATION->GetCurDir();
$arCurCanDir = explode("/", $curCanDir);

?><!DOCTYPE html>
<html xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>">
<head>
	<title><?$APPLICATION->ShowTitle()?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
	<link rel="shortcut icon" type="image/x-icon" href="<?=SITE_DIR?>favicon.ico" />
	<link rel="stylesheet" type="text/css" href="/css/normalize.css">
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="https://superpirogi.ru/css/style.css">
	<link rel="stylesheet" type="text/css" href="/css/media.css">
	<?if($arCurCanDir[1] != 'catalog'):?>
	<link rel="canonical" href="https://superpirogi.ru<?=$APPLICATION->GetCurDir();?>" />
	<?endif;?>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
<?if(strpos($_SERVER['REQUEST_URI'],'/?PAGEN')!==false){?><meta name="robots" content="noindex,follow" /> <?}?>
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-W786DJS');</script>
<!-- End Google Tag Manager -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-1NN364KKJJ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-1NN364KKJJ');
</script>
<link href="/bitrix/css/main/font-awesome.css?158436026528777" type="text/css" rel="stylesheet" />
	<? //$APPLICATION->ShowHead(); ?>
	<?=$APPLICATION->ShowHead()?>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="/callback/scriptes.js"></script><!-- Подключаем наши скрипты -->
<link rel="stylesheet" href="/callback/styles.css"/>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
<script type="text/javascript">
    var onloadCallback = function() {
        mysitekey = '6Letzy4UAAAAAHHAh52Thb8GEz3jF3Vv3jHCk2aa'; // ВСТАВЛЯЕМ УНИКАЛЬНЫЙ КЛЮЧ
        grecaptcha.render('recaptcha1', {'sitekey' : mysitekey}); // ЕСЛИ НУЖНО БОЛЬШЕ КАПЧ - КЛОНИРУЕМ ДАННУЮ СТРОКУ И МЕНЯЕМ ID
    };
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
<script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>
<script src='https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js'></script>
    <script src="/js/jssor.slider-28.0.0.min.js" type="text/javascript"></script>
<script src='/js/slick.min.js'></script>
<link rel="stylesheet" href="/css/slick-theme.css">
<link rel="stylesheet" type="text/css" href="/css/slick.css"/>
				<script>
				/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunctionn() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
$('.dropbtn').click(function (e) {
	e.preventDefault();
	$(this).find('#arrows').toggleClass('active');
});
				</script>
</head>
<body>
<?/*
<pre style="display: none;">
<?=var_dump($arCurCanDir);?>
</pre>*/?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W786DJS"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="wrapper">
<div id="panel"><? $APPLICATION->ShowPanel(); ?></div>
<!---<?$APPLICATION->IncludeComponent(
	"bitrix:eshop.banner",
	"",
	array()
);?>-->
<header class="header center">
			<ul class="header_nav d-flex">
			<? if (CModule::IncludeModule("iblock")){$result = CIBlockElement::GetList(Array("sort"=>"asc"), Array('IBLOCK_ID'=>8), false, Array("nPageSize"=>50), Array("NAME","CODE"));while($res = $result->GetNext()){?>
				<li>
					<a href="<?=$res['CODE']?>"><?=$res['NAME']?></a>
				</li>
				<?}}?>
				<li><a href="/news/">Статьи</a></li>
			</ul>
			<div class="header_main d-flex">
				<p class="header_main-text">
					<? if (CModule::IncludeModule("iblock")){$res = CIBlockElement::GetList(Array(), Array("IBLOCK_ID"=>7,"ID"=>325));while($ob = $res->GetNext()){?><?print_r($ob["PREVIEW_TEXT"]);?><?}} ?>
				</p>
				<p class="header_main-text callkr" onclick="$('#'+'call_formrewq').fadeIn();">
					Заказать звонок
				</p>
				<style>p.header_main-text.callkr {left: 0;color: #333333 !important;background: #EDD081 !important;padding: 3px;padding-left: 60px;padding-right: 60px;border-radius: 5px;text-transform: none;cursor: pointer;top: 104px;}
				.tel_link {top: -20px;}
				</style>
				<div class="header_main-delivery d-flex">
					<? if (CModule::IncludeModule("iblock")){$res = CIBlockElement::GetList(Array(), Array("IBLOCK_ID"=>7,"ID"=>326));while($ob = $res->GetNext()){?><?print_r($ob["PREVIEW_TEXT"]);?><?}} ?>
					<div class="delivery_info-block">
						<? if (CModule::IncludeModule("iblock")){$res = CIBlockElement::GetList(Array(), Array("IBLOCK_ID"=>7,"ID"=>327));while($ob = $res->GetNext()){?><?print_r($ob["PREVIEW_TEXT"]);?><?}} ?>
						<? if (CModule::IncludeModule("iblock")){$res = CIBlockElement::GetList(Array(), Array("IBLOCK_ID"=>7,"ID"=>328));while($ob = $res->GetNext()){?><?print_r($ob["PREVIEW_TEXT"]);?><?}} ?>
					</div>
				</div>
				<? if (CModule::IncludeModule("iblock")){$res = CIBlockElement::GetList(Array(), Array("IBLOCK_ID"=>7,"ID"=>329));while($ob = $res->GetNext()){?><?print_r($ob["PREVIEW_TEXT"]);?><?}} ?>
				<div class="header_main_btns d-flex">
					<div onClick="window.location='/personal/'" class="btn_block btn_block-login">
					<?if(!$USER->IsAuthorized()): // Если пользователь авторизован, то даем информацию?>
						<a href="/login/">Вход</a>
						<a href="/personal/">Личный кабинет</a>
						<?endif;?>
						<?if($USER->IsAuthorized()): // Если пользователь авторизован, то даем информацию?>
						<a href="/?logout=yes">Выйти</a>
						<a href="/personal/">Личный кабинет</a>
						<?endif;?>
					</div>
					<style>.btn_block {cursor: pointer;}</style>
					<div onClick="window.location='/personal/cart/'" class="btn_block btn_block-cart">
											<?$APPLICATION->IncludeComponent(
	"bitrix:sale.basket.basket.line",
	"bootstrap_v5",
	array(
		"PATH_TO_BASKET" => SITE_DIR."personal/cart/",
		"PATH_TO_PERSONAL" => SITE_DIR."personal/",
		"SHOW_PERSONAL_LINK" => "N",
		"SHOW_NUM_PRODUCTS" => "Y",
		"SHOW_TOTAL_PRICE" => "Y",
		"SHOW_PRODUCTS" => "N",
		"POSITION_FIXED" => "N",
		"SHOW_AUTHOR" => "Y",
		"PATH_TO_REGISTER" => SITE_DIR."login/",
		"PATH_TO_PROFILE" => SITE_DIR."personal/",
		"COMPONENT_TEMPLATE" => "bootstrap_v5",
		"PATH_TO_ORDER" => SITE_DIR."personal/order/make/",
		"SHOW_EMPTY_VALUES" => "Y",
		"PATH_TO_AUTHORIZE" => "",
		"SHOW_REGISTRATION" => "Y",
		"SHOW_DELAY" => "Y",
		"SHOW_NOTAVAIL" => "N",
		"SHOW_IMAGE" => "Y",
		"SHOW_PRICE" => "Y",
		"SHOW_SUMMARY" => "Y",
		"HIDE_ON_BASKET_PAGES" => "N",
		"MAX_IMAGE_SIZE" => "70"
	),
	false
);?>
					</div>
				</div>
			</div>
		</header>
<div class="trigger"></div>
		<nav class="center d-flex">
			<ul class="nav d-flex">
			<? if (CModule::IncludeModule("iblock")){$result = CIBlockSection::GetList(Array("sort"=>"asc"), Array('IBLOCK_ID'=>2,"ID"=>array(18,17,16,22,21,20),'ACTIVE'=>'Y'), false, Array("SECTION_PAGE_URL","NAME","PICTURE","UF_ANCORMENU"));;while($res = $result->GetNext()){?>
				<?if ($res['SECTION_PAGE_URL'] == '/catalog/osetinskie/'){?>
				<li><button onclick="myFunctionn()" class="dropbtn">
					<?=$res['UF_ANCORMENU']?> <img id="arrows" src="/arrow.png" alt="вверх" />
				</button>
				<ul id="myDropdown" class="sabul dropdown-content">
				<li class="sablinks"><a href="/catalog/s-gribami/">с грибами</a></li>
				<li class="sablinks"><a href="/catalog/s-kapustoy/">с капустой</a></li>
				<li class="sablinks"><a href="/catalog/s-kartofelem/">с картофелем</a></li>
				<li class="sablinks"><a href="/catalog/s_kuritsey/">с курицей</a></li>
				<li class="sablinks"><a href="/catalog/s-myasom/">с мясом</a></li>
				<li class="sablinks"><a href="/catalog/s-ryboy/">с рыбой</a></li>
				<li class="sablinks"><a href="/catalog/s-syrom/">с сыром</a></li>
				</ul>
				</li>
				<style>
				ul.sabul {display: none;}
.dropbtn {background-color: #333333;color: #edd081;border: none;cursor: pointer;text-transform: uppercase;display: block;padding: 20px 0;text-transform: uppercase;font-family: 'Leto Slab';font-weight: 500;color: #EDD081;transition: .5s;}
.dropdown {position: relative;display: inline-block;}
.dropdown-content {display: none;position: absolute;background-color: #f1f1f1;min-width: 160px;overflow: auto;box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);z-index: 1;}
.dropdown-content a {color: black;padding: 7px 16px;text-decoration: none;display: block;}
.dropdown a:hover {background-color: #ddd;}
.show {display: block !important;}
ul.nav.d-flex button:focus {outline: none !important;}
#arrows.active {transform: rotate(0);}
@media(max-width:800px) {ul.nav.d-flex.active li {line-height: 16px;}
.show {width: 100%;left: 0px;}}
button.dropbtn {display: flex;}
button.dropbtn img {width: 16px;transform: rotate(178deg);margin-left: 5px;margin-top: 4px;}
li.sablinks a {color: #edd081;}
ul#myDropdown {background: #333333ed;list-style: none;}

				</style>
				<?}else{?>
				<li><a href="<?=$res['SECTION_PAGE_URL']?>">
				<?=$res['UF_ANCORMENU']?>
				</a>
				</li>
				<?}?>
				<?}}?>
							<? if (CModule::IncludeModule("iblock")){$result = CIBlockElement::GetList(Array("sort"=>"asc"), Array('IBLOCK_ID'=>8), false, Array("nPageSize"=>50), Array("NAME","CODE"));while($res = $result->GetNext()){?>
				<li class="sda">
					<a href="<?=$res['CODE']?>"><?=$res['NAME']?></a>
				</li>
				<?}}?>
			</ul>
			<a href="/" class="logo_mob">
				<img src="/img/logo-mobile.svg" alt="#">
			</a>
			<div class="nav_main_btns d-flex">
				<a href="tel:+74950153045" class="tel_link" style="top:0">+7(495)015-30-45</a>
				<a href="tel:+74950153045" class="tel_link-mob">
					<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M40 20C40 31.0457 31.0457 40 20 40C8.9543 40 0 31.0457 0 20C0 8.9543 8.9543 0 20 0C31.0457 0 40 8.9543 40 20Z" fill="#EDD081"/>
					<path d="M29.7494 25.1219V27.8944C29.7505 28.1517 29.6976 28.4065 29.5943 28.6423C29.491 28.8781 29.3395 29.0898 29.1494 29.2638C28.9594 29.4378 28.7351 29.5703 28.4908 29.6527C28.2465 29.7352 27.9876 29.7658 27.7308 29.7427C24.8814 29.4337 22.1443 28.4619 19.7395 26.9055C17.5022 25.4866 15.6053 23.5935 14.1836 21.3606C12.6187 18.9497 11.6448 16.2048 11.3408 13.3482C11.3177 13.0927 11.3481 12.8351 11.4302 12.5919C11.5123 12.3488 11.6442 12.1253 11.8175 11.9358C11.9908 11.7463 12.2018 11.5949 12.437 11.4912C12.6722 11.3875 12.9264 11.3338 13.1835 11.3336H15.9615C16.4109 11.3292 16.8465 11.488 17.1873 11.7804C17.528 12.0729 17.7506 12.479 17.8135 12.9231C17.9307 13.8104 18.1482 14.6815 18.4617 15.52C18.5862 15.8508 18.6132 16.2102 18.5393 16.5558C18.4655 16.9014 18.2939 17.2187 18.045 17.4699L16.869 18.6436C18.1871 20.9573 20.1066 22.8729 22.4249 24.1885L23.6009 23.0148C23.8526 22.7664 24.1705 22.5951 24.5168 22.5214C24.8631 22.4477 25.2233 22.4746 25.5547 22.599C26.3948 22.9118 27.2677 23.1289 28.1567 23.2459C28.6065 23.3092 29.0173 23.5353 29.311 23.8812C29.6046 24.2271 29.7607 24.6687 29.7494 25.1219Z" stroke="#333333" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
				</a>
				<div onClick="window.location='/personal/cart/'" class="btn_block btn_block-cart mobfly">
				<a href="/personal/cart/">
					<?$APPLICATION->IncludeComponent(
	"bitrix:sale.basket.basket.line",
	"bootstrap_v5",
	array(
		"PATH_TO_BASKET" => SITE_DIR."personal/cart/",
		"PATH_TO_PERSONAL" => SITE_DIR."personal/",
		"SHOW_PERSONAL_LINK" => "N",
		"SHOW_NUM_PRODUCTS" => "Y",
		"SHOW_TOTAL_PRICE" => "Y",
		"SHOW_PRODUCTS" => "N",
		"POSITION_FIXED" => "N",
		"SHOW_AUTHOR" => "Y",
		"PATH_TO_REGISTER" => SITE_DIR."login/",
		"PATH_TO_PROFILE" => SITE_DIR."personal/",
		"COMPONENT_TEMPLATE" => "bootstrap_v5",
		"PATH_TO_ORDER" => SITE_DIR."personal/order/make/",
		"SHOW_EMPTY_VALUES" => "Y",
		"PATH_TO_AUTHORIZE" => "",
		"SHOW_REGISTRATION" => "Y",
		"SHOW_DELAY" => "Y",
		"SHOW_NOTAVAIL" => "N",
		"SHOW_IMAGE" => "Y",
		"SHOW_PRICE" => "Y",
		"SHOW_SUMMARY" => "Y",
		"HIDE_ON_BASKET_PAGES" => "N",
		"MAX_IMAGE_SIZE" => "70"
	),
	false
);?>
</a>
				</div>
				<button class="menu_btn">
					<span></span>
					<span></span>
					<span></span>
				</button>
			</div>
		</nav>
		<?if ( $APPLICATION->GetCurDir() != "/" ){?>
		<?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb",
	"main",
	array(
		"START_FROM" => "0",
		"PATH" => "",
		"SITE_ID" => SITE_ID,
		"COMPONENT_TEMPLATE" => "main"
	),
	false
);?>
		<?}
		?>

		<?if(strpos($_SERVER['REQUEST_URI'],'/catalog/')===false){?>
		<?if ( $APPLICATION->GetCurDir() != "/" ){?>
		<h1><?$APPLICATION->ShowTitle(false);?></h1>
		<?}}?>
