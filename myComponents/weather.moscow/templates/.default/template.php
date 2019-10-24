<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */
global $APPLICATION;

header("Access-Control-Allow-Origin: *");
setlocale(LC_ALL, "ru_RU");
date_default_timezone_set("Europe/Moscow");

$opts = array(
  "http" => array(
    "method" => "GET",
    "timeout" => .5,
    "header" => "X-Yandex-API-Key: {$arResult[API_KEY]}"
  )
);

$url = "https://api.weather.yandex.ru/v1/forecast?lat=55.750171&lon=37.616360&limit=1&hours=false&extra=false";
$context = stream_context_create($opts);
$contents = file_get_contents($url, false, $context);
$clima = json_decode($contents);

if($clima == false) echo "Информация недоступна";
else
{
    $temp = $clima->fact->temp;
    $humidity = $clima->fact->humidity;
    $wind_speed = $clima->fact->wind_speed;
    $wind_dir = $clima->fact->wind_dir;
    $pressure = $clima->fact->pressure_mm;
    $condition = $clima->fact->condition;
    $icon = $clima->fact->icon . ".svg";

    switch ($wind_dir) {
        case 'nw':
            $wind_dir = 'северо-западное';
            break;
        case 'n':
            $wind_dir = 'северное';
            break;
        case 'ne':
            $wind_dir = 'северо-восточное';
            break;
        case 'e':
            $wind_dir = 'восточное';
            break;
        case 'se':
            $wind_dir = 'юго-восточное';
            break;
        case 's':
            $wind_dir = 'южное';
            break;
        case 'sw':
            $wind_dir = 'юго-западное';
            break;
        case 'w':
            $wind_dir = 'западное';
            break;
        case 'c':
            $wind_dir = 'штиль';
            break;  
    }

    switch ($condition) {
        case 'clear':
            $condition = 'ясно';
            break;
        case 'partly-cloudy':
            $condition = 'малооблачно';
            break;
        case 'cloudy':
            $condition = 'облачно с прояснениями';
            break;
        case 'overcast':
            $condition = 'пасмурно';
            break;
        case 'partly-cloudy-and-light-rain':
            $condition = 'небольшой дождь';
            break;
        case 'partly-cloudy-and-rain':
            $condition = 'дождь';
            break;
        case 'overcast-and-rain':
            $condition = 'сильный дождь';
            break;
        case 'overcast-thunderstorms-with-rain':
            $condition = 'сильный дождь, гроза';
            break;
        case 'cloudy-and-light-rain':
            $condition = 'небольшой дождь';
            break;
        case 'overcast-and-light-rain':
            $condition = 'небольшой дождь';
            break;
        case 'cloudy-and-rain':
            $condition = 'дождь';
            break;
        case 'overcast-and-wet-snow':
            $condition = 'дождь со снегом';
            break;
        case 'partly-cloudy-and-light-snow':
            $condition = 'небольшой снег';
            break;
        case 'partly-cloudy-and-snow':
            $condition = 'снег';
            break;
        case 'overcast-and-snow':
            $condition = 'снегопад';
            break;
        case 'cloudy-and-light-snow':
            $condition = 'небольшой снег';
            break;
        case 'overcast-and-light-snow':
            $condition = 'небольшой снег';
            break;
        case 'cloudy-and-snow':
            $condition = 'снег';
            break;
    }

    echo "Температура: " . $temp . " &deg;C<br>";
    echo "Влажность: " . $humidity . " %<br>";
    echo "Скорость ветра: " . $wind_speed . " м/с<br>";
    echo "Направление ветра: " . $wind_dir . "<br>";
    echo "Давление: " . $pressure . " мм р/с<br>";
    echo "На улице " . $condition . " ";
    echo "<img src='https://yastatic.net/weather/i/icons/blueye/color/svg/" . $icon . "'/ width='50'>";
}
?>