<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<br />
		<section class="index_moscow center" style="background: #F5F5F5;padding-top: 50px;padding-bottom: 50px;">


<ul>

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<li>
		<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a>
	</li>
<?endforeach;?>
</ul>

		</section>
<style>
h1 {padding-top: 0 !important;padding-bottom: 0 !important;margin: 0 !important;}
.offer_slide.asddzz img {clip-path: polygon(19% 0, 100% 0, 100% 0%, 100% 100%, 21% 100%, 0 65%);}
img.prev.slick-arrow {width: 62px;font-family: 'slick';font-size: 20px;line-height: 1;opacity: .75;color: black !important;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;position: absolute;top: 151px;left: -28px;cursor: pointer;z-index: 9999;}
img.next.slick-arrow {width: 62px;font-family: 'slick';font-size: 20px;line-height: 1;opacity: .75;color: black !important;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;position: absolute;top: 151px;cursor: pointer;z-index: 9999;right: -28px;}
p.catalog_item-about {font-size: 13px;}
</style>

		<style>
.product-item-info-container.product-item-hidden.ass {left: 66% !important;}
		</style>

<br>
<?require($_SERVER["DOCUMENT_ROOT"]."/include/form-subscribe.php");?>