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
$filter_url = explode('?', $_SERVER['REQUEST_URI']);?>
<ul>
<div>
	<ul id="nav" class="d-flex filters onnnak">
	<?foreach ($arResult["ITEMS"] as $arItem) {
		if($arItem["CODE"]=='NACHINKA'){
			if($arItem['VALUES']!=Array()){?>
			<li><a href="<?=$filter_url[0]?>">Все</a></li>
				<?foreach($arItem['VALUES'] as $value){?>
				<li><a href="<?=$filter_url[0]?>?filter=<?=$value['VALUE']?>"><?=$value['VALUE']?></a></li>
				<?}}}}?>
	</ul>
</div>
<script type="text/javascript">
	var smartFilter = new JCSmartFilter('<?echo CUtil::JSEscape($arResult["FORM_ACTION"])?>', '<?=CUtil::JSEscape($arParams["FILTER_VIEW_MODE"])?>', <?=CUtil::PhpToJSObject($arResult["JS_FILTER_PARAMS"])?>);
</script>
<style>
ul.d-flex.filters.onnnak li a {margin-right: 40px;padding: 5px 10px;text-align: center;text-transform: uppercase;letter-spacing: 0.1em;font-size: 12px;font-weight: 500;border-radius: 25px;background: transparent;border: none;transition: 0.5s;cursor: pointer;white-space: nowrap;margin: 5px 40px 5px 0;display: block;}
a.act {
    background: #EDD081 !important;
}
.onnnak li a {
    text-decoration: none;
}
</style>
<script type="text/javascript">
try{
var el=document.getElementById('nav').getElementsByTagName('a');
var url=document.location.href;
for(var i=0;i<el.length; i++){
if (url==el[i].href){
el[i].className += ' act';
};
};
}catch(e){}
</script>