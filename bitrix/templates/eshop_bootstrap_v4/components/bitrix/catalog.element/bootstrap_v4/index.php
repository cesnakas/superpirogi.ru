<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Супер пироги");
?>
<style>
h1 {
    padding-top: 0 !important;
    padding-bottom: 0 !important;
    margin: 0 !important;
}
</style>
<!--- slider  -->
<section class="offer">
               <div class="offer_slider">
			   <? if (CModule::IncludeModule("iblock")){$result = CIBlockElement::GetList(Array("sort"=>"asc"), Array('IBLOCK_ID'=>4), false, Array("nPageSize"=>50), Array("PREVIEW_TEXT","DETAIL_TEXT","DETAIL_PICTURE"));while($res = $result->GetNext()){?>
				<div class="offer_slide">
					<img src="<?=CFile::GetPath($res["DETAIL_PICTURE"])?>" alt="#">
					<div class="offer_slider-content ">
						<h2 class="offer_slide-name"><?=$res['PREVIEW_TEXT']?></h2>
						<p class="offer_slide-description gold_text"><?=$res['DETAIL_TEXT']?></p>
					</div>
				</div>
				<?}}?>
			</div>
		</section>
	<!-- categories -->
		<section class="categories center">

				<? if (CModule::IncludeModule("iblock")){$result = CIBlockSection::GetList(Array("sort"=>"asc"), Array('IBLOCK_ID'=>2,'ACTIVE'=>'Y'), false, Array("SECTION_PAGE_URL","NAME","PICTURE"));;while($res = $result->GetNext()){?>
				<a href="<?=$res['SECTION_PAGE_URL']?>" class="categories_item">
				<h2 class="categories_name"><?=$res['NAME']?></h2>
				<img src="<?=CFile::GetPath($res["PICTURE"])?>" alt="">
				</a>
			<?}}?>
		</section>
	<!-- categories -->
	<!-- sales_slider -->
		<section class="sales_slider center">
			<h2 class="sales_slider_heading">
				Акции и новости
			</h2>
			<div class="sales_slider_wrap">
			<? if (CModule::IncludeModule("iblock")){$result = CIBlockElement::GetList(Array("sort"=>"asc"), Array('IBLOCK_ID'=>6), false, Array("nPageSize"=>50), Array("PREVIEW_TEXT","DETAIL_TEXT","DETAIL_PICTURE","CODE"));while($res = $result->GetNext()){?>
				<div class="sales_item">
					<div class="sales_item-content">
						<h2 class="sales_item-name"><?=$res['PREVIEW_TEXT']?></h2>
						<div class="sales_item-description"><?=$res['DETAIL_TEXT']?></div>
						<a href="<?=$res['CODE']?>" class="btn btn-bordered btn-bordered-black">
							Подробнее
						</a>
					</div>
					<img src="<?=CFile::GetPath($res["DETAIL_PICTURE"])?>" alt="">
				</div>
				<?}}?>
			</div>
		</section>
	<!-- sales_slider -->
	
	<!-- subscribe_form -->
		<form class="subscribe_form center d-flex">
			<h3 class="subscribe_form-heading">
				Узнавай первым!
			</h3>
			<p class="subscribe_form-text">
				Получай на почту информацию о новых акциях!
			</p>
			<label class="input_wrap">
				<input type="email" name="email" required="">
				<span class="placeholder">Ваша почта</span>
				<button>
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M0.75 3.25V21.25H23.25V3.25H0.75ZM11.1 14.013C11.348 14.199 11.661 14.311 12 14.311C12.339 14.311 12.652 14.199 12.904 14.01L12.9 14.013L14 13.188L21.75 19.001V19.751H2.25V19.001L10 13.188L11.1 14.013ZM12 12.813L2.25 5.5V4.75H21.75V5.5L12 12.813ZM2.25 7.375L8.75 12.25L2.25 17.125V7.375ZM21.75 17.125L15.25 12.25L21.75 7.375V17.125Z" fill="#333333"/>
					</svg>
				</button>
			</label>
		</form>
	<!-- subscribe_form -->

	<!-- index_history -->
		<section class="index_history center">
			<div class="history_block d-flex">
			<? if (CModule::IncludeModule("iblock")){$result = CIBlockElement::GetList(Array("sort"=>"asc"), Array('IBLOCK_ID'=>9), false, Array("nPageSize"=>50), Array("PREVIEW_TEXT","PREVIEW_PICTURE","CODE","NAME"));while($res = $result->GetNext()){?>
				<div class="history_img">
					<img src="<?=CFile::GetPath($res["PREVIEW_PICTURE"])?>" alt="#">
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
	<!-- index_history -->
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>