<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
"NAME" => GetMessage("Погода в Москве"),
"DESCRIPTION" => GetMessage("Выводим текущую погоду в Москве"),
	"PATH" => array(
	"ID" => "weatherMoscow",
	"CHILD" => array(
	"ID" => "weather",
	"NAME" => "Виджет погоды в Москве")
),
"ICON" => "/images/icon.gif",
);
?>