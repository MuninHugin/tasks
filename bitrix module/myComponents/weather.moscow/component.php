<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$arResult = $arParams;
if ($this->StartResultCache($arParams['CACHE_TIME'], $additionalCacheID))
{
$this->IncludeComponentTemplate();
}
?>