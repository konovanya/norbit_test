<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentParameters = array(
	"GROUPS" => array(),
	"PARAMETERS" => array(
		"RATE_CODE" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("CURRENCY_RATE_CODE"),
			"TYPE" => "STRING",
			"MULTIPLE" => "Y",
			"REQUIRED" => "Y",
		),
		"CACHE_TIME"  =>  array("DEFAULT" => 3600),
		),
);
