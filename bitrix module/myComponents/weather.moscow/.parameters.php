<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
 $arComponentParameters = array(
	"GROUPS" => array(),
	"PARAMETERS" => array(
		"API_KEY" => array(
			"PARENT" => "BASE",
			"NAME" => "API-ключ",
			"TYPE" => "STRING",
			"DEFAULT" => "dbd32ea7-ce63-41c4-a32e-baa1f9d3acce"
		),		
		'CACHE_TIME'  =>  array('DEFAULT'=>3600),
	),
);