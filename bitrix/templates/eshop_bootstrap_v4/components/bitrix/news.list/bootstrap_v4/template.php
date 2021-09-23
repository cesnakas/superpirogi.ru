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

$themeClass = isset($arParams['TEMPLATE_THEME']) ? ' bx-'.$arParams['TEMPLATE_THEME'] : '';
?>

				<div class="sales_wrap">
<? if (CModule::IncludeModule("iblock")){$result = CIBlockElement::GetList(Array("sort"=>"asc"), Array('IBLOCK_ID'=>1), false, Array("nPageSize"=>6), Array("DETAIL_PICTURE","DETAIL_TEXT","PREVIEW_TEXT","PREVIEW_PICTURE","CODE","NAME"));while($res = $result->GetNext()){?>
<div class="sales_item">
          <div class="sales_item-content">
            <h2 class="sales_item-name">
              <?=$res['NAME']?>
            </h2>
            <div class="sales_item-description">
             <?=$res['PREVIEW_TEXT']?>
            </div>
            <a href="<?=$res['CODE']?>/" class="btn btn-bordered btn-bordered-black">
              Подробнее
            </a>
          </div>
          <img src="<?=CFile::GetPath($res["PREVIEW_PICTURE"])?>" alt="">
        </div>
		<?}}?>
</div>		