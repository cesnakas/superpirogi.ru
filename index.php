<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Настоящие осетинские пироги 🥧 из печи от пекарни «Супер Пироги». Бесплатная доставка по Москве за 1 час! Закажи свежую выпечку сейчас: 📱 +7 (495) 015-30-45.");
$APPLICATION->SetTitle("Осетинские пироги с доставкой на дом по Москве");
$APPLICATION->SetPageProperty("title", "Осетинские пироги заказать в Москве - купить осетинские пироги недорого с доставкой");
?>
	<style>
        h1 {padding-top: 0 !important;padding-bottom: 0 !important;margin: 0 !important;}
        .offer_slide.asddzz img {clip-path: polygon(19% 0, 100% 0, 100% 0%, 100% 100%, 21% 100%, 0 65%);}
        img.prev.slick-arrow {width: 62px;font-family: 'slick';font-size: 20px;line-height: 1;opacity: .75;color: black !important;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;position: absolute;top: 151px;left: -28px;cursor: pointer;z-index: 9999;}
        img.next.slick-arrow {width: 62px;font-family: 'slick';font-size: 20px;line-height: 1;opacity: .75;color: black !important;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;position: absolute;top: 151px;cursor: pointer;z-index: 9999;right: -28px;}
        p.catalog_item-about {font-size: 13px;}
	</style>
	<!--- slider -->
	<section class="offer">
		<div class="offer_slider">
			<? if (CModule::IncludeModule("iblock")){$result = CIBlockElement::GetList(Array("sort"=>"asc"), Array('IBLOCK_ID'=>4,'ACTIVE'=>'Y'), false, Array("nPageSize"=>50), Array("PREVIEW_TEXT","DETAIL_TEXT","DETAIL_PICTURE", "PROPERTY_ORIGIMG"));while($res = $result->GetNext()){
				$asddzz = $res['PROPERTY_ORIGIMG_VALUE'];?>
				<? if ($asddzz != "да" ) {?>
					<div class="offer_slide">
						<img src="<?=CFile::GetPath($res["DETAIL_PICTURE"])?>" alt="#">
						<div class="offer_slider-content ">
							<p class="offer_slide-name"><?=$res['PREVIEW_TEXT']?></p>
							<p class="offer_slide-description gold_text"><?=$res['DETAIL_TEXT']?></p>
						</div>
					</div>
				<?}else{?>
					<div class="offer_slide asddzz">
						<div class="offer_slider-content asddzzas">
							<p class="offer_slide-name newnammme"><?=$res['PREVIEW_TEXT']?></p>
							<p class="offer_slide-description gold_text newdeesc"><?=$res['DETAIL_TEXT']?></p>
						</div>
						<img class="newvzs" src="<?=CFile::GetPath($res["DETAIL_PICTURE"])?>" alt="#">
					</div>
				<?}}}?>
		</div>
		<style>
            .offer_slider-content.asddzzas {max-width: 100%;}
            h2.offer_slide-name.newnammme {text-align: right;}
            p.offer_slide-description.gold_text.newdeesc {text-align: right;}
            .offer_slider-content.asddzzas {margin-right: 30px;}
		</style>
	</section>
	<h1>Осетинские пироги с доставкой на дом по Москве</h1>
	<br />
	<!-- categories -->
	<section class="categories center">
		<? if (CModule::IncludeModule("iblock")){$result = CIBlockSection::GetList(Array("sort"=>"asc"), Array('IBLOCK_ID'=>2,"ID"=>array(23,17,18,20,21,22),'ACTIVE'=>'Y'), false, Array("SECTION_PAGE_URL","NAME","PICTURE","UF_ANCORMENU","ID"));;while($res = $result->GetNext()){?>
			<?if ($res['ID'] == '23') {?>
				<a href="<?=$res['SECTION_PAGE_URL']?>" class="categories_item">
					<div class="categories_name">Пироги с мясом</div>
					<img class="lazy" data-original="<?=CFile::GetPath($res["PICTURE"])?>" alt="<?=$res['NAME']?>">
				</a>
			<?}else{?>
				<a href="<?=$res['SECTION_PAGE_URL']?>" class="categories_item">
					<div class="categories_name"><?=$res['UF_ANCORMENU']?></div>
					<img class="lazy" data-original="<?=CFile::GetPath($res["PICTURE"])?>" alt="<?=$res['NAME']?>">
				</a>
			<?}}}?>
	</section>
	<!-- categories -->
	<section class="center">
		<div>
			<!--- с грибами  -->
			<?global $arrFilter;
			$arrFilter = array("PROPERTY_ACRIVEINDEX_VALUE" => "да");?>
			<?$APPLICATION->IncludeComponent(
				"bitrix:catalog.section",
				"glav",
				array(
					"ACTION_VARIABLE" => "action",
					"ADD_PICT_PROP" => "-",
					"ADD_PROPERTIES_TO_BASKET" => "Y",
					"ADD_SECTIONS_CHAIN" => "N",
					"ADD_TO_BASKET_ACTION" => "ADD",
					"AJAX_MODE" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"BACKGROUND_IMAGE" => "UF_BACKGROUND_IMAGE",
					"BASKET_URL" => "/personal/basket.php",
					"BRAND_PROPERTY" => "BRAND_REF",
					"BROWSER_TITLE" => "-",
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "Y",
					"CACHE_TIME" => "36000000",
					"CACHE_TYPE" => "A",
					"COMPATIBLE_MODE" => "Y",
					"CONVERT_CURRENCY" => "Y",
					"CURRENCY_ID" => "RUB",
					"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[{\"CLASS_ID\":\"CondIBProp:2:63\",\"DATA\":{\"logic\":\"Equal\",\"value\":50}}]}",
					"DATA_LAYER_NAME" => "dataLayer",
					"DETAIL_URL" => "",
					"DISABLE_INIT_JS_IN_COMPONENT" => "N",
					"DISCOUNT_PERCENT_POSITION" => "bottom-right",
					"DISPLAY_BOTTOM_PAGER" => "Y",
					"DISPLAY_TOP_PAGER" => "N",
					"ELEMENT_SORT_FIELD" => "sort",
					"ELEMENT_SORT_FIELD2" => "id",
					"ELEMENT_SORT_ORDER" => "asc",
					"ELEMENT_SORT_ORDER2" => "desc",
					"ENLARGE_PRODUCT" => "PROP",
					"ENLARGE_PROP" => "NEWPRODUCT",
					"FILTER_NAME" => "arrFilter",
					"HIDE_NOT_AVAILABLE" => "N",
					"HIDE_NOT_AVAILABLE_OFFERS" => "N",
					"IBLOCK_ID" => "2",
					"IBLOCK_TYPE" => "catalog",
					"INCLUDE_SUBSECTIONS" => "Y",
					"LABEL_PROP" => array(
						0 => "NEWPRODUCT",
					),
					"LABEL_PROP_MOBILE" => array(
					),
					"LABEL_PROP_POSITION" => "top-left",
					"LAZY_LOAD" => "Y",
					"LINE_ELEMENT_COUNT" => "3",
					"LOAD_ON_SCROLL" => "N",
					"MESSAGE_404" => "",
					"MESS_BTN_ADD_TO_BASKET" => "В корзину",
					"MESS_BTN_BUY" => "Купить",
					"MESS_BTN_DETAIL" => "Подробнее",
					"MESS_BTN_LAZY_LOAD" => "Показать ещё",
					"MESS_BTN_SUBSCRIBE" => "Подписаться",
					"MESS_NOT_AVAILABLE" => "Нет в наличии",
					"META_DESCRIPTION" => "-",
					"META_KEYWORDS" => "-",
					"OFFERS_CART_PROPERTIES" => array(
						0 => "ARTNUMBER",
						1 => "COLOR_REF",
						2 => "SIZES_SHOES",
						3 => "SIZES_CLOTHES",
					),
					"OFFERS_FIELD_CODE" => array(
						0 => "",
						1 => "",
					),
					"OFFERS_LIMIT" => "5",
					"OFFERS_PROPERTY_CODE" => array(
						0 => "COLOR_REF",
						1 => "SIZES_SHOES",
						2 => "SIZES_CLOTHES",
						3 => "",
					),
					"OFFERS_SORT_FIELD" => "sort",
					"OFFERS_SORT_FIELD2" => "id",
					"OFFERS_SORT_ORDER" => "asc",
					"OFFERS_SORT_ORDER2" => "desc",
					"OFFER_ADD_PICT_PROP" => "-",
					"OFFER_TREE_PROPS" => array(
						0 => "COLOR_REF",
						1 => "SIZES_SHOES",
						2 => "SIZES_CLOTHES",
					),
					"PAGER_BASE_LINK_ENABLE" => "N",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "N",
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_TEMPLATE" => ".default",
					"PAGER_TITLE" => "Товары",
					"PAGE_ELEMENT_COUNT" => "6",
					"PARTIAL_PRODUCT_PROPERTIES" => "N",
					"PRICE_CODE" => array(
						0 => "BASE",
					),
					"PRICE_VAT_INCLUDE" => "Y",
					"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons,compare",
					"PRODUCT_DISPLAY_MODE" => "Y",
					"PRODUCT_ID_VARIABLE" => "id",
					"PRODUCT_PROPERTIES" => array(
						0 => "NEWPRODUCT",
						1 => "MATERIAL",
					),
					"PRODUCT_PROPS_VARIABLE" => "prop",
					"PRODUCT_QUANTITY_VARIABLE" => "",
					"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':true}]",
					"PRODUCT_SUBSCRIPTION" => "Y",
					"PROPERTY_CODE" => array(
						0 => "NEWPRODUCT",
						1 => "",
					),
					"PROPERTY_CODE_MOBILE" => array(
					),
					"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
					"RCM_TYPE" => "personal",
					"SECTION_CODE" => "pants",
					"SECTION_ID" => "25",
					"SECTION_ID_VARIABLE" => "SECTION_ID",
					"SECTION_URL" => "",
					"SECTION_USER_FIELDS" => array(
						0 => "",
						1 => "",
					),
					"SEF_MODE" => "Y",
					"SET_BROWSER_TITLE" => "N",
					"SET_LAST_MODIFIED" => "N",
					"SET_META_DESCRIPTION" => "N",
					"SET_META_KEYWORDS" => "N",
					"SET_STATUS_404" => "N",
					"SET_TITLE" => "N",
					"SHOW_404" => "N",
					"SHOW_ALL_WO_SECTION" => "Y",
					"SHOW_CLOSE_POPUP" => "N",
					"SHOW_DISCOUNT_PERCENT" => "Y",
					"SHOW_FROM_SECTION" => "N",
					"SHOW_MAX_QUANTITY" => "N",
					"SHOW_OLD_PRICE" => "N",
					"SHOW_PRICE_COUNT" => "1",
					"SHOW_SLIDER" => "Y",
					"SLIDER_INTERVAL" => "3000",
					"SLIDER_PROGRESS" => "N",
					"TEMPLATE_THEME" => "blue",
					"USE_ENHANCED_ECOMMERCE" => "Y",
					"USE_MAIN_ELEMENT_SECTION" => "N",
					"USE_PRICE_COUNT" => "N",
					"USE_PRODUCT_QUANTITY" => "Y",
					"COMPONENT_TEMPLATE" => "glav",
					"DISPLAY_COMPARE" => "N",
					"SEF_RULE" => "",
					"SECTION_CODE_PATH" => ""
				),
				false
			);?>
			<!--- с рыбой  -->
			<?global $arrFilter;
			$arrFilter = array("PROPERTY_ACRIVEINDEX_VALUE" => "да");?>
			<?$APPLICATION->IncludeComponent(
				"bitrix:catalog.section",
				"glav",
				array(
					"ACTION_VARIABLE" => "action",
					"ADD_PICT_PROP" => "-",
					"ADD_PROPERTIES_TO_BASKET" => "Y",
					"ADD_SECTIONS_CHAIN" => "N",
					"ADD_TO_BASKET_ACTION" => "ADD",
					"AJAX_MODE" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"BACKGROUND_IMAGE" => "UF_BACKGROUND_IMAGE",
					"BASKET_URL" => "/personal/basket.php",
					"BRAND_PROPERTY" => "BRAND_REF",
					"BROWSER_TITLE" => "-",
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "Y",
					"CACHE_TIME" => "36000000",
					"CACHE_TYPE" => "A",
					"COMPATIBLE_MODE" => "Y",
					"CONVERT_CURRENCY" => "Y",
					"CURRENCY_ID" => "RUB",
					"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[{\"CLASS_ID\":\"CondIBProp:2:63\",\"DATA\":{\"logic\":\"Equal\",\"value\":51}}]}",
					"DATA_LAYER_NAME" => "dataLayer",
					"DETAIL_URL" => "",
					"DISABLE_INIT_JS_IN_COMPONENT" => "N",
					"DISCOUNT_PERCENT_POSITION" => "bottom-right",
					"DISPLAY_BOTTOM_PAGER" => "Y",
					"DISPLAY_TOP_PAGER" => "N",
					"ELEMENT_SORT_FIELD" => "sort",
					"ELEMENT_SORT_FIELD2" => "id",
					"ELEMENT_SORT_ORDER" => "asc",
					"ELEMENT_SORT_ORDER2" => "desc",
					"ENLARGE_PRODUCT" => "PROP",
					"ENLARGE_PROP" => "NEWPRODUCT",
					"FILTER_NAME" => "arrFilter",
					"HIDE_NOT_AVAILABLE" => "N",
					"HIDE_NOT_AVAILABLE_OFFERS" => "N",
					"IBLOCK_ID" => "2",
					"IBLOCK_TYPE" => "catalog",
					"INCLUDE_SUBSECTIONS" => "Y",
					"LABEL_PROP" => array(
						0 => "NEWPRODUCT",
					),
					"LABEL_PROP_MOBILE" => array(
					),
					"LABEL_PROP_POSITION" => "top-left",
					"LAZY_LOAD" => "Y",
					"LINE_ELEMENT_COUNT" => "3",
					"LOAD_ON_SCROLL" => "N",
					"MESSAGE_404" => "",
					"MESS_BTN_ADD_TO_BASKET" => "В корзину",
					"MESS_BTN_BUY" => "Купить",
					"MESS_BTN_DETAIL" => "Подробнее",
					"MESS_BTN_LAZY_LOAD" => "Показать ещё",
					"MESS_BTN_SUBSCRIBE" => "Подписаться",
					"MESS_NOT_AVAILABLE" => "Нет в наличии",
					"META_DESCRIPTION" => "-",
					"META_KEYWORDS" => "-",
					"OFFERS_CART_PROPERTIES" => array(
						0 => "ARTNUMBER",
						1 => "COLOR_REF",
						2 => "SIZES_SHOES",
						3 => "SIZES_CLOTHES",
					),
					"OFFERS_FIELD_CODE" => array(
						0 => "",
						1 => "",
					),
					"OFFERS_LIMIT" => "5",
					"OFFERS_PROPERTY_CODE" => array(
						0 => "COLOR_REF",
						1 => "SIZES_SHOES",
						2 => "SIZES_CLOTHES",
						3 => "",
					),
					"OFFERS_SORT_FIELD" => "sort",
					"OFFERS_SORT_FIELD2" => "id",
					"OFFERS_SORT_ORDER" => "asc",
					"OFFERS_SORT_ORDER2" => "desc",
					"OFFER_ADD_PICT_PROP" => "-",
					"OFFER_TREE_PROPS" => array(
						0 => "COLOR_REF",
						1 => "SIZES_SHOES",
						2 => "SIZES_CLOTHES",
					),
					"PAGER_BASE_LINK_ENABLE" => "N",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "N",
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_TEMPLATE" => ".default",
					"PAGER_TITLE" => "Товары",
					"PAGE_ELEMENT_COUNT" => "6",
					"PARTIAL_PRODUCT_PROPERTIES" => "N",
					"PRICE_CODE" => array(
						0 => "BASE",
					),
					"PRICE_VAT_INCLUDE" => "Y",
					"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons,compare",
					"PRODUCT_DISPLAY_MODE" => "Y",
					"PRODUCT_ID_VARIABLE" => "id",
					"PRODUCT_PROPERTIES" => array(
						0 => "NEWPRODUCT",
						1 => "MATERIAL",
					),
					"PRODUCT_PROPS_VARIABLE" => "prop",
					"PRODUCT_QUANTITY_VARIABLE" => "",
					"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':true}]",
					"PRODUCT_SUBSCRIPTION" => "Y",
					"PROPERTY_CODE" => array(
						0 => "NEWPRODUCT",
						1 => "",
					),
					"PROPERTY_CODE_MOBILE" => array(
					),
					"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
					"RCM_TYPE" => "personal",
					"SECTION_CODE" => "pants",
					"SECTION_ID" => "31",
					"SECTION_ID_VARIABLE" => "SECTION_ID",
					"SECTION_URL" => "",
					"SECTION_USER_FIELDS" => array(
						0 => "",
						1 => "",
					),
					"SEF_MODE" => "Y",
					"SET_BROWSER_TITLE" => "N",
					"SET_LAST_MODIFIED" => "N",
					"SET_META_DESCRIPTION" => "N",
					"SET_META_KEYWORDS" => "N",
					"SET_STATUS_404" => "N",
					"SET_TITLE" => "N",
					"SHOW_404" => "N",
					"SHOW_ALL_WO_SECTION" => "Y",
					"SHOW_CLOSE_POPUP" => "N",
					"SHOW_DISCOUNT_PERCENT" => "Y",
					"SHOW_FROM_SECTION" => "N",
					"SHOW_MAX_QUANTITY" => "N",
					"SHOW_OLD_PRICE" => "N",
					"SHOW_PRICE_COUNT" => "1",
					"SHOW_SLIDER" => "Y",
					"SLIDER_INTERVAL" => "3000",
					"SLIDER_PROGRESS" => "N",
					"TEMPLATE_THEME" => "blue",
					"USE_ENHANCED_ECOMMERCE" => "Y",
					"USE_MAIN_ELEMENT_SECTION" => "N",
					"USE_PRICE_COUNT" => "N",
					"USE_PRODUCT_QUANTITY" => "Y",
					"COMPONENT_TEMPLATE" => "glav",
					"DISPLAY_COMPARE" => "N",
					"SEF_RULE" => "",
					"SECTION_CODE_PATH" => ""
				),
				false
			);?>
			<!--- с капустой  -->
			<?global $arrFilter;
			$arrFilter = array("PROPERTY_ACRIVEINDEX_VALUE" => "да");?>
			<?$APPLICATION->IncludeComponent(
				"bitrix:catalog.section",
				"glav",
				array(
					"ACTION_VARIABLE" => "action",
					"ADD_PICT_PROP" => "-",
					"ADD_PROPERTIES_TO_BASKET" => "Y",
					"ADD_SECTIONS_CHAIN" => "N",
					"ADD_TO_BASKET_ACTION" => "ADD",
					"AJAX_MODE" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"BACKGROUND_IMAGE" => "UF_BACKGROUND_IMAGE",
					"BASKET_URL" => "/personal/basket.php",
					"BRAND_PROPERTY" => "BRAND_REF",
					"BROWSER_TITLE" => "-",
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "Y",
					"CACHE_TIME" => "36000000",
					"CACHE_TYPE" => "A",
					"COMPATIBLE_MODE" => "Y",
					"CONVERT_CURRENCY" => "Y",
					"CURRENCY_ID" => "RUB",
					"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[{\"CLASS_ID\":\"CondIBProp:2:63\",\"DATA\":{\"logic\":\"Equal\",\"value\":52}}]}",
					"DATA_LAYER_NAME" => "dataLayer",
					"DETAIL_URL" => "",
					"DISABLE_INIT_JS_IN_COMPONENT" => "N",
					"DISCOUNT_PERCENT_POSITION" => "bottom-right",
					"DISPLAY_BOTTOM_PAGER" => "Y",
					"DISPLAY_TOP_PAGER" => "N",
					"ELEMENT_SORT_FIELD" => "sort",
					"ELEMENT_SORT_FIELD2" => "id",
					"ELEMENT_SORT_ORDER" => "asc",
					"ELEMENT_SORT_ORDER2" => "desc",
					"ENLARGE_PRODUCT" => "PROP",
					"ENLARGE_PROP" => "NEWPRODUCT",
					"FILTER_NAME" => "arrFilter",
					"HIDE_NOT_AVAILABLE" => "N",
					"HIDE_NOT_AVAILABLE_OFFERS" => "N",
					"IBLOCK_ID" => "2",
					"IBLOCK_TYPE" => "catalog",
					"INCLUDE_SUBSECTIONS" => "Y",
					"LABEL_PROP" => array(
						0 => "NEWPRODUCT",
					),
					"LABEL_PROP_MOBILE" => array(
					),
					"LABEL_PROP_POSITION" => "top-left",
					"LAZY_LOAD" => "Y",
					"LINE_ELEMENT_COUNT" => "3",
					"LOAD_ON_SCROLL" => "N",
					"MESSAGE_404" => "",
					"MESS_BTN_ADD_TO_BASKET" => "В корзину",
					"MESS_BTN_BUY" => "Купить",
					"MESS_BTN_DETAIL" => "Подробнее",
					"MESS_BTN_LAZY_LOAD" => "Показать ещё",
					"MESS_BTN_SUBSCRIBE" => "Подписаться",
					"MESS_NOT_AVAILABLE" => "Нет в наличии",
					"META_DESCRIPTION" => "-",
					"META_KEYWORDS" => "-",
					"OFFERS_CART_PROPERTIES" => array(
						0 => "ARTNUMBER",
						1 => "COLOR_REF",
						2 => "SIZES_SHOES",
						3 => "SIZES_CLOTHES",
					),
					"OFFERS_FIELD_CODE" => array(
						0 => "",
						1 => "",
					),
					"OFFERS_LIMIT" => "5",
					"OFFERS_PROPERTY_CODE" => array(
						0 => "COLOR_REF",
						1 => "SIZES_SHOES",
						2 => "SIZES_CLOTHES",
						3 => "",
					),
					"OFFERS_SORT_FIELD" => "sort",
					"OFFERS_SORT_FIELD2" => "id",
					"OFFERS_SORT_ORDER" => "asc",
					"OFFERS_SORT_ORDER2" => "desc",
					"OFFER_ADD_PICT_PROP" => "-",
					"OFFER_TREE_PROPS" => array(
						0 => "COLOR_REF",
						1 => "SIZES_SHOES",
						2 => "SIZES_CLOTHES",
					),
					"PAGER_BASE_LINK_ENABLE" => "N",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "N",
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_TEMPLATE" => ".default",
					"PAGER_TITLE" => "Товары",
					"PAGE_ELEMENT_COUNT" => "6",
					"PARTIAL_PRODUCT_PROPERTIES" => "N",
					"PRICE_CODE" => array(
						0 => "BASE",
					),
					"PRICE_VAT_INCLUDE" => "Y",
					"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons,compare",
					"PRODUCT_DISPLAY_MODE" => "Y",
					"PRODUCT_ID_VARIABLE" => "id",
					"PRODUCT_PROPERTIES" => array(
						0 => "NEWPRODUCT",
						1 => "MATERIAL",
					),
					"PRODUCT_PROPS_VARIABLE" => "prop",
					"PRODUCT_QUANTITY_VARIABLE" => "",
					"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':true}]",
					"PRODUCT_SUBSCRIPTION" => "Y",
					"PROPERTY_CODE" => array(
						0 => "NEWPRODUCT",
						1 => "",
					),
					"PROPERTY_CODE_MOBILE" => array(
					),
					"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
					"RCM_TYPE" => "personal",
					"SECTION_CODE" => "pants",
					"SECTION_ID" => "26",
					"SECTION_ID_VARIABLE" => "SECTION_ID",
					"SECTION_URL" => "",
					"SECTION_USER_FIELDS" => array(
						0 => "",
						1 => "",
					),
					"SEF_MODE" => "Y",
					"SET_BROWSER_TITLE" => "N",
					"SET_LAST_MODIFIED" => "N",
					"SET_META_DESCRIPTION" => "N",
					"SET_META_KEYWORDS" => "N",
					"SET_STATUS_404" => "N",
					"SET_TITLE" => "N",
					"SHOW_404" => "N",
					"SHOW_ALL_WO_SECTION" => "Y",
					"SHOW_CLOSE_POPUP" => "N",
					"SHOW_DISCOUNT_PERCENT" => "Y",
					"SHOW_FROM_SECTION" => "N",
					"SHOW_MAX_QUANTITY" => "N",
					"SHOW_OLD_PRICE" => "N",
					"SHOW_PRICE_COUNT" => "1",
					"SHOW_SLIDER" => "Y",
					"SLIDER_INTERVAL" => "3000",
					"SLIDER_PROGRESS" => "N",
					"TEMPLATE_THEME" => "blue",
					"USE_ENHANCED_ECOMMERCE" => "Y",
					"USE_MAIN_ELEMENT_SECTION" => "N",
					"USE_PRICE_COUNT" => "N",
					"USE_PRODUCT_QUANTITY" => "Y",
					"COMPONENT_TEMPLATE" => "glav",
					"DISPLAY_COMPARE" => "N",
					"SEF_RULE" => "",
					"SECTION_CODE_PATH" => ""
				),
				false
			);?>
			<!--- пироги с мясом  -->
			<?global $arrFilter;
			$arrFilter = array("PROPERTY_ACRIVEINDEX_VALUE" => "да");?>
			<?$APPLICATION->IncludeComponent(
				"bitrix:catalog.section",
				"glav",
				array(
					"ACTION_VARIABLE" => "action",
					"ADD_PICT_PROP" => "-",
					"ADD_PROPERTIES_TO_BASKET" => "Y",
					"ADD_SECTIONS_CHAIN" => "N",
					"ADD_TO_BASKET_ACTION" => "ADD",
					"AJAX_MODE" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"BACKGROUND_IMAGE" => "UF_BACKGROUND_IMAGE",
					"BASKET_URL" => "/personal/basket.php",
					"BRAND_PROPERTY" => "BRAND_REF",
					"BROWSER_TITLE" => "-",
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "Y",
					"CACHE_TIME" => "36000000",
					"CACHE_TYPE" => "A",
					"COMPATIBLE_MODE" => "Y",
					"CONVERT_CURRENCY" => "Y",
					"CURRENCY_ID" => "RUB",
					"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[{\"CLASS_ID\":\"CondIBProp:2:63\",\"DATA\":{\"logic\":\"Equal\",\"value\":53}}]}",
					"DATA_LAYER_NAME" => "dataLayer",
					"DETAIL_URL" => "",
					"DISABLE_INIT_JS_IN_COMPONENT" => "N",
					"DISCOUNT_PERCENT_POSITION" => "bottom-right",
					"DISPLAY_BOTTOM_PAGER" => "Y",
					"DISPLAY_TOP_PAGER" => "N",
					"ELEMENT_SORT_FIELD" => "sort",
					"ELEMENT_SORT_FIELD2" => "id",
					"ELEMENT_SORT_ORDER" => "asc",
					"ELEMENT_SORT_ORDER2" => "desc",
					"ENLARGE_PRODUCT" => "PROP",
					"ENLARGE_PROP" => "NEWPRODUCT",
					"FILTER_NAME" => "arrFilter",
					"HIDE_NOT_AVAILABLE" => "N",
					"HIDE_NOT_AVAILABLE_OFFERS" => "N",
					"IBLOCK_ID" => "2",
					"IBLOCK_TYPE" => "catalog",
					"INCLUDE_SUBSECTIONS" => "Y",
					"LABEL_PROP" => array(
						0 => "NEWPRODUCT",
					),
					"LABEL_PROP_MOBILE" => array(
					),
					"LABEL_PROP_POSITION" => "top-left",
					"LAZY_LOAD" => "Y",
					"LINE_ELEMENT_COUNT" => "3",
					"LOAD_ON_SCROLL" => "N",
					"MESSAGE_404" => "",
					"MESS_BTN_ADD_TO_BASKET" => "В корзину",
					"MESS_BTN_BUY" => "Купить",
					"MESS_BTN_DETAIL" => "Подробнее",
					"MESS_BTN_LAZY_LOAD" => "Показать ещё",
					"MESS_BTN_SUBSCRIBE" => "Подписаться",
					"MESS_NOT_AVAILABLE" => "Нет в наличии",
					"META_DESCRIPTION" => "-",
					"META_KEYWORDS" => "-",
					"OFFERS_CART_PROPERTIES" => array(
						0 => "ARTNUMBER",
						1 => "COLOR_REF",
						2 => "SIZES_SHOES",
						3 => "SIZES_CLOTHES",
					),
					"OFFERS_FIELD_CODE" => array(
						0 => "",
						1 => "",
					),
					"OFFERS_LIMIT" => "5",
					"OFFERS_PROPERTY_CODE" => array(
						0 => "COLOR_REF",
						1 => "SIZES_SHOES",
						2 => "SIZES_CLOTHES",
						3 => "",
					),
					"OFFERS_SORT_FIELD" => "sort",
					"OFFERS_SORT_FIELD2" => "id",
					"OFFERS_SORT_ORDER" => "asc",
					"OFFERS_SORT_ORDER2" => "desc",
					"OFFER_ADD_PICT_PROP" => "-",
					"OFFER_TREE_PROPS" => array(
						0 => "COLOR_REF",
						1 => "SIZES_SHOES",
						2 => "SIZES_CLOTHES",
					),
					"PAGER_BASE_LINK_ENABLE" => "N",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "N",
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_TEMPLATE" => ".default",
					"PAGER_TITLE" => "Товары",
					"PAGE_ELEMENT_COUNT" => "6",
					"PARTIAL_PRODUCT_PROPERTIES" => "N",
					"PRICE_CODE" => array(
						0 => "BASE",
					),
					"PRICE_VAT_INCLUDE" => "Y",
					"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons,compare",
					"PRODUCT_DISPLAY_MODE" => "Y",
					"PRODUCT_ID_VARIABLE" => "id",
					"PRODUCT_PROPERTIES" => array(
						0 => "NEWPRODUCT",
						1 => "MATERIAL",
					),
					"PRODUCT_PROPS_VARIABLE" => "prop",
					"PRODUCT_QUANTITY_VARIABLE" => "",
					"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':true}]",
					"PRODUCT_SUBSCRIPTION" => "Y",
					"PROPERTY_CODE" => array(
						0 => "NEWPRODUCT",
						1 => "",
					),
					"PROPERTY_CODE_MOBILE" => array(
					),
					"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
					"RCM_TYPE" => "personal",
					"SECTION_CODE" => "pants",
					"SECTION_ID" => "23",
					"SECTION_ID_VARIABLE" => "SECTION_ID",
					"SECTION_URL" => "",
					"SECTION_USER_FIELDS" => array(
						0 => "",
						1 => "",
					),
					"SEF_MODE" => "Y",
					"SET_BROWSER_TITLE" => "N",
					"SET_LAST_MODIFIED" => "N",
					"SET_META_DESCRIPTION" => "N",
					"SET_META_KEYWORDS" => "N",
					"SET_STATUS_404" => "N",
					"SET_TITLE" => "N",
					"SHOW_404" => "N",
					"SHOW_ALL_WO_SECTION" => "Y",
					"SHOW_CLOSE_POPUP" => "N",
					"SHOW_DISCOUNT_PERCENT" => "Y",
					"SHOW_FROM_SECTION" => "N",
					"SHOW_MAX_QUANTITY" => "N",
					"SHOW_OLD_PRICE" => "N",
					"SHOW_PRICE_COUNT" => "1",
					"SHOW_SLIDER" => "Y",
					"SLIDER_INTERVAL" => "3000",
					"SLIDER_PROGRESS" => "N",
					"TEMPLATE_THEME" => "blue",
					"USE_ENHANCED_ECOMMERCE" => "Y",
					"USE_MAIN_ELEMENT_SECTION" => "N",
					"USE_PRICE_COUNT" => "N",
					"USE_PRODUCT_QUANTITY" => "Y",
					"COMPONENT_TEMPLATE" => "glav",
					"DISPLAY_COMPARE" => "N",
					"SEF_RULE" => "",
					"SECTION_CODE_PATH" => ""
				),
				false
			);?>
			<!--- пироги с сыром  -->
			<?global $arrFilter;
			$arrFilter = array("PROPERTY_ACRIVEINDEX_VALUE" => "да");?>
			<?$APPLICATION->IncludeComponent(
				"bitrix:catalog.section",
				"glav",
				array(
					"ACTION_VARIABLE" => "action",
					"ADD_PICT_PROP" => "-",
					"ADD_PROPERTIES_TO_BASKET" => "Y",
					"ADD_SECTIONS_CHAIN" => "N",
					"ADD_TO_BASKET_ACTION" => "ADD",
					"AJAX_MODE" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"BACKGROUND_IMAGE" => "UF_BACKGROUND_IMAGE",
					"BASKET_URL" => "/personal/basket.php",
					"BRAND_PROPERTY" => "BRAND_REF",
					"BROWSER_TITLE" => "-",
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "Y",
					"CACHE_TIME" => "36000000",
					"CACHE_TYPE" => "A",
					"COMPATIBLE_MODE" => "Y",
					"CONVERT_CURRENCY" => "Y",
					"CURRENCY_ID" => "RUB",
					"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[{\"CLASS_ID\":\"CondIBProp:2:63\",\"DATA\":{\"logic\":\"Equal\",\"value\":54}}]}",
					"DATA_LAYER_NAME" => "dataLayer",
					"DETAIL_URL" => "",
					"DISABLE_INIT_JS_IN_COMPONENT" => "N",
					"DISCOUNT_PERCENT_POSITION" => "bottom-right",
					"DISPLAY_BOTTOM_PAGER" => "Y",
					"DISPLAY_TOP_PAGER" => "N",
					"ELEMENT_SORT_FIELD" => "sort",
					"ELEMENT_SORT_FIELD2" => "id",
					"ELEMENT_SORT_ORDER" => "asc",
					"ELEMENT_SORT_ORDER2" => "desc",
					"ENLARGE_PRODUCT" => "PROP",
					"ENLARGE_PROP" => "NEWPRODUCT",
					"FILTER_NAME" => "arrFilter",
					"HIDE_NOT_AVAILABLE" => "N",
					"HIDE_NOT_AVAILABLE_OFFERS" => "N",
					"IBLOCK_ID" => "2",
					"IBLOCK_TYPE" => "catalog",
					"INCLUDE_SUBSECTIONS" => "Y",
					"LABEL_PROP" => array(
						0 => "NEWPRODUCT",
					),
					"LABEL_PROP_MOBILE" => array(
					),
					"LABEL_PROP_POSITION" => "top-left",
					"LAZY_LOAD" => "Y",
					"LINE_ELEMENT_COUNT" => "3",
					"LOAD_ON_SCROLL" => "N",
					"MESSAGE_404" => "",
					"MESS_BTN_ADD_TO_BASKET" => "В корзину",
					"MESS_BTN_BUY" => "Купить",
					"MESS_BTN_DETAIL" => "Подробнее",
					"MESS_BTN_LAZY_LOAD" => "Показать ещё",
					"MESS_BTN_SUBSCRIBE" => "Подписаться",
					"MESS_NOT_AVAILABLE" => "Нет в наличии",
					"META_DESCRIPTION" => "-",
					"META_KEYWORDS" => "-",
					"OFFERS_CART_PROPERTIES" => array(
						0 => "ARTNUMBER",
						1 => "COLOR_REF",
						2 => "SIZES_SHOES",
						3 => "SIZES_CLOTHES",
					),
					"OFFERS_FIELD_CODE" => array(
						0 => "",
						1 => "",
					),
					"OFFERS_LIMIT" => "5",
					"OFFERS_PROPERTY_CODE" => array(
						0 => "COLOR_REF",
						1 => "SIZES_SHOES",
						2 => "SIZES_CLOTHES",
						3 => "",
					),
					"OFFERS_SORT_FIELD" => "sort",
					"OFFERS_SORT_FIELD2" => "id",
					"OFFERS_SORT_ORDER" => "asc",
					"OFFERS_SORT_ORDER2" => "desc",
					"OFFER_ADD_PICT_PROP" => "-",
					"OFFER_TREE_PROPS" => array(
						0 => "COLOR_REF",
						1 => "SIZES_SHOES",
						2 => "SIZES_CLOTHES",
					),
					"PAGER_BASE_LINK_ENABLE" => "N",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "N",
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_TEMPLATE" => ".default",
					"PAGER_TITLE" => "Товары",
					"PAGE_ELEMENT_COUNT" => "100",
					"PARTIAL_PRODUCT_PROPERTIES" => "N",
					"PRICE_CODE" => array(
						0 => "BASE",
					),
					"PRICE_VAT_INCLUDE" => "Y",
					"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons,compare",
					"PRODUCT_DISPLAY_MODE" => "Y",
					"PRODUCT_ID_VARIABLE" => "id",
					"PRODUCT_PROPERTIES" => array(
						0 => "NEWPRODUCT",
						1 => "MATERIAL",
					),
					"PRODUCT_PROPS_VARIABLE" => "prop",
					"PRODUCT_QUANTITY_VARIABLE" => "",
					"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':true}]",
					"PRODUCT_SUBSCRIPTION" => "Y",
					"PROPERTY_CODE" => array(
						0 => "NEWPRODUCT",
						1 => "",
					),
					"PROPERTY_CODE_MOBILE" => array(
					),
					"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
					"RCM_TYPE" => "personal",
					"SECTION_CODE" => "pants",
					"SECTION_ID" => "24",
					"SECTION_ID_VARIABLE" => "SECTION_ID",
					"SECTION_URL" => "",
					"SECTION_USER_FIELDS" => array(
						0 => "",
						1 => "",
					),
					"SEF_MODE" => "Y",
					"SET_BROWSER_TITLE" => "N",
					"SET_LAST_MODIFIED" => "N",
					"SET_META_DESCRIPTION" => "N",
					"SET_META_KEYWORDS" => "N",
					"SET_STATUS_404" => "N",
					"SET_TITLE" => "N",
					"SHOW_404" => "N",
					"SHOW_ALL_WO_SECTION" => "Y",
					"SHOW_CLOSE_POPUP" => "N",
					"SHOW_DISCOUNT_PERCENT" => "Y",
					"SHOW_FROM_SECTION" => "N",
					"SHOW_MAX_QUANTITY" => "N",
					"SHOW_OLD_PRICE" => "N",
					"SHOW_PRICE_COUNT" => "1",
					"SHOW_SLIDER" => "Y",
					"SLIDER_INTERVAL" => "3000",
					"SLIDER_PROGRESS" => "N",
					"TEMPLATE_THEME" => "blue",
					"USE_ENHANCED_ECOMMERCE" => "Y",
					"USE_MAIN_ELEMENT_SECTION" => "N",
					"USE_PRICE_COUNT" => "N",
					"USE_PRODUCT_QUANTITY" => "Y",
					"COMPONENT_TEMPLATE" => "glav",
					"DISPLAY_COMPARE" => "N",
					"SEF_RULE" => "",
					"SECTION_CODE_PATH" => ""
				),
				false
			);?>
			<!--- пироги с курицей  --->
			<?global $arrFilter;
			$arrFilter = array("PROPERTY_ACRIVEINDEX_VALUE" => "да");?>
			<?$APPLICATION->IncludeComponent(
				"bitrix:catalog.section",
				"glav",
				array(
					"ACTION_VARIABLE" => "action",
					"ADD_PICT_PROP" => "-",
					"ADD_PROPERTIES_TO_BASKET" => "Y",
					"ADD_SECTIONS_CHAIN" => "N",
					"ADD_TO_BASKET_ACTION" => "ADD",
					"AJAX_MODE" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"BACKGROUND_IMAGE" => "UF_BACKGROUND_IMAGE",
					"BASKET_URL" => "/personal/basket.php",
					"BRAND_PROPERTY" => "BRAND_REF",
					"BROWSER_TITLE" => "-",
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "Y",
					"CACHE_TIME" => "36000000",
					"CACHE_TYPE" => "A",
					"COMPATIBLE_MODE" => "Y",
					"CONVERT_CURRENCY" => "Y",
					"CURRENCY_ID" => "RUB",
					"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[{\"CLASS_ID\":\"CondIBProp:2:63\",\"DATA\":{\"logic\":\"Equal\",\"value\":55}}]}",
					"DATA_LAYER_NAME" => "dataLayer",
					"DETAIL_URL" => "",
					"DISABLE_INIT_JS_IN_COMPONENT" => "N",
					"DISCOUNT_PERCENT_POSITION" => "bottom-right",
					"DISPLAY_BOTTOM_PAGER" => "Y",
					"DISPLAY_TOP_PAGER" => "N",
					"ELEMENT_SORT_FIELD" => "sort",
					"ELEMENT_SORT_FIELD2" => "id",
					"ELEMENT_SORT_ORDER" => "asc",
					"ELEMENT_SORT_ORDER2" => "desc",
					"ENLARGE_PRODUCT" => "PROP",
					"ENLARGE_PROP" => "NEWPRODUCT",
					"FILTER_NAME" => "arrFilter",
					"HIDE_NOT_AVAILABLE" => "N",
					"HIDE_NOT_AVAILABLE_OFFERS" => "N",
					"IBLOCK_ID" => "2",
					"IBLOCK_TYPE" => "catalog",
					"INCLUDE_SUBSECTIONS" => "Y",
					"LABEL_PROP" => array(
						0 => "NEWPRODUCT",
					),
					"LABEL_PROP_MOBILE" => array(
					),
					"LABEL_PROP_POSITION" => "top-left",
					"LAZY_LOAD" => "Y",
					"LINE_ELEMENT_COUNT" => "3",
					"LOAD_ON_SCROLL" => "N",
					"MESSAGE_404" => "",
					"MESS_BTN_ADD_TO_BASKET" => "В корзину",
					"MESS_BTN_BUY" => "Купить",
					"MESS_BTN_DETAIL" => "Подробнее",
					"MESS_BTN_LAZY_LOAD" => "Показать ещё",
					"MESS_BTN_SUBSCRIBE" => "Подписаться",
					"MESS_NOT_AVAILABLE" => "Нет в наличии",
					"META_DESCRIPTION" => "-",
					"META_KEYWORDS" => "-",
					"OFFERS_CART_PROPERTIES" => array(
						0 => "ARTNUMBER",
						1 => "COLOR_REF",
						2 => "SIZES_SHOES",
						3 => "SIZES_CLOTHES",
					),
					"OFFERS_FIELD_CODE" => array(
						0 => "",
						1 => "",
					),
					"OFFERS_LIMIT" => "5",
					"OFFERS_PROPERTY_CODE" => array(
						0 => "COLOR_REF",
						1 => "SIZES_SHOES",
						2 => "SIZES_CLOTHES",
						3 => "",
					),
					"OFFERS_SORT_FIELD" => "sort",
					"OFFERS_SORT_FIELD2" => "id",
					"OFFERS_SORT_ORDER" => "asc",
					"OFFERS_SORT_ORDER2" => "desc",
					"OFFER_ADD_PICT_PROP" => "-",
					"OFFER_TREE_PROPS" => array(
						0 => "COLOR_REF",
						1 => "SIZES_SHOES",
						2 => "SIZES_CLOTHES",
					),
					"PAGER_BASE_LINK_ENABLE" => "N",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "N",
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_TEMPLATE" => ".default",
					"PAGER_TITLE" => "Товары",
					"PAGE_ELEMENT_COUNT" => "6",
					"PARTIAL_PRODUCT_PROPERTIES" => "N",
					"PRICE_CODE" => array(
						0 => "BASE",
					),
					"PRICE_VAT_INCLUDE" => "Y",
					"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons,compare",
					"PRODUCT_DISPLAY_MODE" => "Y",
					"PRODUCT_ID_VARIABLE" => "id",
					"PRODUCT_PROPERTIES" => array(
						0 => "NEWPRODUCT",
						1 => "MATERIAL",
					),
					"PRODUCT_PROPS_VARIABLE" => "prop",
					"PRODUCT_QUANTITY_VARIABLE" => "",
					"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':true}]",
					"PRODUCT_SUBSCRIPTION" => "Y",
					"PROPERTY_CODE" => array(
						0 => "NEWPRODUCT",
						1 => "",
					),
					"PROPERTY_CODE_MOBILE" => array(
					),
					"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
					"RCM_TYPE" => "personal",
					"SECTION_CODE" => "pants",
					"SECTION_ID" => "32",
					"SECTION_ID_VARIABLE" => "SECTION_ID",
					"SECTION_URL" => "",
					"SECTION_USER_FIELDS" => array(
						0 => "",
						1 => "",
					),
					"SEF_MODE" => "Y",
					"SET_BROWSER_TITLE" => "N",
					"SET_LAST_MODIFIED" => "N",
					"SET_META_DESCRIPTION" => "N",
					"SET_META_KEYWORDS" => "N",
					"SET_STATUS_404" => "N",
					"SET_TITLE" => "N",
					"SHOW_404" => "N",
					"SHOW_ALL_WO_SECTION" => "Y",
					"SHOW_CLOSE_POPUP" => "N",
					"SHOW_DISCOUNT_PERCENT" => "Y",
					"SHOW_FROM_SECTION" => "N",
					"SHOW_MAX_QUANTITY" => "N",
					"SHOW_OLD_PRICE" => "N",
					"SHOW_PRICE_COUNT" => "1",
					"SHOW_SLIDER" => "Y",
					"SLIDER_INTERVAL" => "3000",
					"SLIDER_PROGRESS" => "N",
					"TEMPLATE_THEME" => "blue",
					"USE_ENHANCED_ECOMMERCE" => "Y",
					"USE_MAIN_ELEMENT_SECTION" => "N",
					"USE_PRICE_COUNT" => "N",
					"USE_PRODUCT_QUANTITY" => "Y",
					"COMPONENT_TEMPLATE" => "glav",
					"DISPLAY_COMPARE" => "N",
					"SEF_RULE" => "",
					"SECTION_CODE_PATH" => ""
				),
				false
			);?>
			<!--- пироги с курицей  --->
			<?global $arrFilter;
			$arrFilter = array("PROPERTY_ACRIVEINDEX_VALUE" => "да");?>
			<?$APPLICATION->IncludeComponent(
				"bitrix:catalog.section",
				"glav",
				array(
					"ACTION_VARIABLE" => "action",
					"ADD_PICT_PROP" => "-",
					"ADD_PROPERTIES_TO_BASKET" => "Y",
					"ADD_SECTIONS_CHAIN" => "N",
					"ADD_TO_BASKET_ACTION" => "ADD",
					"AJAX_MODE" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"BACKGROUND_IMAGE" => "UF_BACKGROUND_IMAGE",
					"BASKET_URL" => "/personal/basket.php",
					"BRAND_PROPERTY" => "BRAND_REF",
					"BROWSER_TITLE" => "-",
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "Y",
					"CACHE_TIME" => "36000000",
					"CACHE_TYPE" => "A",
					"COMPATIBLE_MODE" => "Y",
					"CONVERT_CURRENCY" => "Y",
					"CURRENCY_ID" => "RUB",
					"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[{\"CLASS_ID\":\"CondIBProp:2:63\",\"DATA\":{\"logic\":\"Equal\",\"value\":56}}]}",
					"DATA_LAYER_NAME" => "dataLayer",
					"DETAIL_URL" => "",
					"DISABLE_INIT_JS_IN_COMPONENT" => "N",
					"DISCOUNT_PERCENT_POSITION" => "bottom-right",
					"DISPLAY_BOTTOM_PAGER" => "Y",
					"DISPLAY_TOP_PAGER" => "N",
					"ELEMENT_SORT_FIELD" => "sort",
					"ELEMENT_SORT_FIELD2" => "id",
					"ELEMENT_SORT_ORDER" => "asc",
					"ELEMENT_SORT_ORDER2" => "desc",
					"ENLARGE_PRODUCT" => "PROP",
					"ENLARGE_PROP" => "NEWPRODUCT",
					"FILTER_NAME" => "arrFilter",
					"HIDE_NOT_AVAILABLE" => "N",
					"HIDE_NOT_AVAILABLE_OFFERS" => "N",
					"IBLOCK_ID" => "2",
					"IBLOCK_TYPE" => "catalog",
					"INCLUDE_SUBSECTIONS" => "Y",
					"LABEL_PROP" => array(
						0 => "NEWPRODUCT",
					),
					"LABEL_PROP_MOBILE" => array(
					),
					"LABEL_PROP_POSITION" => "top-left",
					"LAZY_LOAD" => "Y",
					"LINE_ELEMENT_COUNT" => "3",
					"LOAD_ON_SCROLL" => "N",
					"MESSAGE_404" => "",
					"MESS_BTN_ADD_TO_BASKET" => "В корзину",
					"MESS_BTN_BUY" => "Купить",
					"MESS_BTN_DETAIL" => "Подробнее",
					"MESS_BTN_LAZY_LOAD" => "Показать ещё",
					"MESS_BTN_SUBSCRIBE" => "Подписаться",
					"MESS_NOT_AVAILABLE" => "Нет в наличии",
					"META_DESCRIPTION" => "-",
					"META_KEYWORDS" => "-",
					"OFFERS_CART_PROPERTIES" => array(
						0 => "ARTNUMBER",
						1 => "COLOR_REF",
						2 => "SIZES_SHOES",
						3 => "SIZES_CLOTHES",
					),
					"OFFERS_FIELD_CODE" => array(
						0 => "",
						1 => "",
					),
					"OFFERS_LIMIT" => "5",
					"OFFERS_PROPERTY_CODE" => array(
						0 => "COLOR_REF",
						1 => "SIZES_SHOES",
						2 => "SIZES_CLOTHES",
						3 => "",
					),
					"OFFERS_SORT_FIELD" => "sort",
					"OFFERS_SORT_FIELD2" => "id",
					"OFFERS_SORT_ORDER" => "asc",
					"OFFERS_SORT_ORDER2" => "desc",
					"OFFER_ADD_PICT_PROP" => "-",
					"OFFER_TREE_PROPS" => array(
						0 => "COLOR_REF",
						1 => "SIZES_SHOES",
						2 => "SIZES_CLOTHES",
					),
					"PAGER_BASE_LINK_ENABLE" => "N",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "N",
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_TEMPLATE" => ".default",
					"PAGER_TITLE" => "Товары",
					"PAGE_ELEMENT_COUNT" => "6",
					"PARTIAL_PRODUCT_PROPERTIES" => "N",
					"PRICE_CODE" => array(
						0 => "BASE",
					),
					"PRICE_VAT_INCLUDE" => "Y",
					"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons,compare",
					"PRODUCT_DISPLAY_MODE" => "Y",
					"PRODUCT_ID_VARIABLE" => "id",
					"PRODUCT_PROPERTIES" => array(
						0 => "NEWPRODUCT",
						1 => "MATERIAL",
					),
					"PRODUCT_PROPS_VARIABLE" => "prop",
					"PRODUCT_QUANTITY_VARIABLE" => "",
					"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':true}]",
					"PRODUCT_SUBSCRIPTION" => "Y",
					"PROPERTY_CODE" => array(
						0 => "NEWPRODUCT",
						1 => "",
					),
					"PROPERTY_CODE_MOBILE" => array(
					),
					"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
					"RCM_TYPE" => "personal",
					"SECTION_CODE" => "pants",
					"SECTION_ID" => "27",
					"SECTION_ID_VARIABLE" => "SECTION_ID",
					"SECTION_URL" => "",
					"SECTION_USER_FIELDS" => array(
						0 => "",
						1 => "",
					),
					"SEF_MODE" => "Y",
					"SET_BROWSER_TITLE" => "N",
					"SET_LAST_MODIFIED" => "N",
					"SET_META_DESCRIPTION" => "N",
					"SET_META_KEYWORDS" => "N",
					"SET_STATUS_404" => "N",
					"SET_TITLE" => "N",
					"SHOW_404" => "N",
					"SHOW_ALL_WO_SECTION" => "Y",
					"SHOW_CLOSE_POPUP" => "N",
					"SHOW_DISCOUNT_PERCENT" => "Y",
					"SHOW_FROM_SECTION" => "N",
					"SHOW_MAX_QUANTITY" => "N",
					"SHOW_OLD_PRICE" => "N",
					"SHOW_PRICE_COUNT" => "1",
					"SHOW_SLIDER" => "Y",
					"SLIDER_INTERVAL" => "3000",
					"SLIDER_PROGRESS" => "N",
					"TEMPLATE_THEME" => "blue",
					"USE_ENHANCED_ECOMMERCE" => "Y",
					"USE_MAIN_ELEMENT_SECTION" => "N",
					"USE_PRICE_COUNT" => "N",
					"USE_PRODUCT_QUANTITY" => "Y",
					"COMPONENT_TEMPLATE" => "glav",
					"DISPLAY_COMPARE" => "N",
					"SEF_RULE" => "",
					"SECTION_CODE_PATH" => ""
				),
				false
			);?>
		</div>
	</section>
	<!-- sales_slider -->
	<section class="sales_slider center">
		<div class="sales_slider_heading">
			Акции и новости
		</div>
		<div class="sales_slider_wrap">
			<? if (CModule::IncludeModule("iblock")){$result = CIBlockElement::GetList(Array("sort"=>"asc"), Array('IBLOCK_ID'=>6), false, Array("nPageSize"=>50), Array("PREVIEW_TEXT","DETAIL_TEXT","DETAIL_PICTURE","CODE","PROPERTY_SSLACTIVE"));while($res = $result->GetNext()){
				$acssl = $res['PROPERTY_SSLACTIVE_VALUE'];?>
				<? if ($acssl != "да" ) {?>
					<div class="sales_item">
						<div class="sales_item-content">
							<p class="sales_item-name"><?=$res['PREVIEW_TEXT']?></p>
							<div class="sales_item-description"><?=$res['DETAIL_TEXT']?></div>
						</div>
						<img class="imgcross" src="<?=CFile::GetPath($res["DETAIL_PICTURE"])?>" alt="<?=$res['PREVIEW_TEXT']?>">
					</div>
				<?}else{?>
					<div class="sales_item">
						<div class="sales_item-content">
							<a href="<?=$res['CODE']?>">
								<p class="sales_item-name"><?=$res['PREVIEW_TEXT']?></p>
								<div class="sales_item-description"><?=$res['DETAIL_TEXT']?></div>
								<span class="btn btn-bordered btn-bordered-black">
							Подробнее
						</span>
						</div>
						<img class="imgcross" src="<?=CFile::GetPath($res["DETAIL_PICTURE"])?>" alt="<?=$res['PREVIEW_TEXT']?>">
						</a>
					</div>
				<?}}}?>
		</div>

        <div class="pt-5">
		<?$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"",
			Array(
				"AREA_FILE_SHOW" => "file",
				"PATH" => SITE_DIR."include/main_sections-links.php"
			)
		);?>
        </div>

	</section>

	<section class="index_history index_history2 center">
		<h2 class="sales_slider_heading">
			Доставка по районам и метро Москвы
		</h2>
		<div class="index_history_flex50">

			<div class="">
				<h3>
					Районы Москвы
				</h3>
				<div class="list_delivery_area2">
					<? if (CModule::IncludeModule("iblock")){$result = CIBlockElement::GetList(Array("name"=>"asc"), Array('IBLOCK_ID'=>20), false, Array("nPageSize"=>1000), Array("NAME","CODE"));while($res = $result->GetNext()){
						$acssl = $res['PROPERTY_SSLACTIVE_VALUE'];?>
						<li>
							<a href="/rayony-moskvy/<?=$res['CODE']?>/"><?=$res['NAME']?></a>
						</li>
						<?
					}
					}?>
				</div>
			</div>
			<div class="">
				<h3>
					Округа Москвы
				</h3>
				<div class="list_delivery_area2">
					<li><a href="/area/tsao/">Центральный</a></li>
					<li><a href="/area/sao/">Северный</a></li>
					<li><a href="/area/svao/">Северо-Восточный</a></li>
					<li><a href="/area/vao/">Восточный</a></li>
					<li><a href="/area/yuao/">Южный</a></li>
					<li><a href="/area/yuvao/">Юго-Восточный</a></li>
					<li><a href="/area/zao/">Западный</a></li>
					<li><a href="/area/szao/">Северо-Западный</a></li>
					<li><a href="/area/yuzao/">Юго-Западный</a></li>
				</div>
			</div>
		</div>

		<h3>
			Метро Москвы
		</h3>
		<div class="list_delivery_area">
			<? if (CModule::IncludeModule("iblock")){$result = CIBlockElement::GetList(Array("name"=>"asc"), Array('IBLOCK_ID'=>19), false, Array("nPageSize"=>1000), Array("NAME","CODE"));while($res = $result->GetNext()){
				$acssl = $res['PROPERTY_SSLACTIVE_VALUE'];?>
				<li>
					<a href="/moscow/<?=$res['CODE']?>/"><?=$res['NAME']?></a>
				</li>
				<?
			}
			}?>
		</div>
		<span class="btn btn-bordered btn-bordered-black" id="metro_show">
				Показать еще
			</span>
	</section>

	<!-- sales_slider -->
	<span class="titlekr"><div>Популярные категории</div></span>
	<section class="categories center">
		<? if (CModule::IncludeModule("iblock")){$result = CIBlockSection::GetList(Array("sort"=>"asc"), Array('IBLOCK_ID'=>2,"ID"=>array(25,31,26,24,32,27),'ACTIVE'=>'Y'), false, Array("SECTION_PAGE_URL","NAME","PICTURE","UF_ANCORMENU","ID"));;while($res = $result->GetNext()){?>
			<a href="<?=$res['SECTION_PAGE_URL']?>" class="categories_item">
				<div class="categories_name"><?=$res['UF_ANCORMENU']?></div>
				<img class="lazy" data-original="<?=CFile::GetPath($res["PICTURE"])?>" alt="<?=$res['NAME']?>">
			</a>
		<?}}?>
	</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/include/form-subscribe.php");?>

	<!-- index_history -->
	<section class="index_history center">
		<div class="history_block d-flex">
			<? if (CModule::IncludeModule("iblock")){$result = CIBlockElement::GetList(Array("sort"=>"asc"), Array('IBLOCK_ID'=>9), false, Array("nPageSize"=>50), Array("PREVIEW_TEXT","PREVIEW_PICTURE","CODE","NAME"));while($res = $result->GetNext()){?>
				<div class="history_img">
					<img src="<?=CFile::GetPath($res["PREVIEW_PICTURE"])?>" alt="<?=$res['NAME']?>">
				</div>
				<div class="history_content">
					<h3 class="history_item-name">
						<?=$res['NAME']?>
					</h3>
					<p class="history_item-text">
						<?=$res['PREVIEW_TEXT']?>
					</p>
					<a href="<?=$res['CODE']?>" class="btn btn-bordered btn-bordered-gold">
						Узнать больше
					</a>
				</div>
			<?}}?>
		</div>
		<? if (CModule::IncludeModule("iblock")){$result = CIBlockElement::GetList(Array("sort"=>"asc"), Array('IBLOCK_ID'=>10), false, Array("nPageSize"=>50), Array("PREVIEW_TEXT","PREVIEW_PICTURE","CODE","NAME"));while($res = $result->GetNext()){?>
			<h4 class="page_subheading">
				<?=$res['NAME']?>
			</h4>
			<?=$res['PREVIEW_TEXT']?>
		<?}}?>
	</section>
	<style>
        .product-item-info-container.product-item-hidden.ass {left: 66% !important;}
	</style>
	<!-- index_history -->
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>