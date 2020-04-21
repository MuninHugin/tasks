<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Страница вызова компонента виджета погоды в Москве");?>

<?$APPLICATION->IncludeComponent(
	"myComponents:weather.moscow",
	"",
	Array(
		"API_KEY" => "dbd32ea7-ce63-41c4-a32e-baa1f9d3acce",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "Y",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	)
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>