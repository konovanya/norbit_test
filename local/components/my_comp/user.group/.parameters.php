<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentParameters = array(
	"GROUPS" => array(),
	"PARAMETERS" => array(
		"PAGE_TITLE" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("USER_GROUPS_PAGE_TITLE_NAME"),
			"TYPE" => "STRING",
			"MULTIPLE" => "N",
			"DEFAULT" => "User Groups",
			),
		"CACHE_TIME"  =>  array("DEFAULT" => 3600),
		),
);
