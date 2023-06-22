<?

\Bitrix\Main\Loader::registerAutoLoadClasses(null,
	[
 		'IblockEvent' => '/local/php_interface/classes/iblockevent.php',
 	]
);

\Bitrix\Main\EventManager::getInstance()->addEventHandler(
    "iblock",
    'OnBeforeIBlockElementUpdate',
    array(
        "IblockEvent",
        "OnBeforeIBlockElementUpdateHandler"
    )
);