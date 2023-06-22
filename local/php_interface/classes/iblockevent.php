<?
use Bitrix\Main\Loader;

Loader::includeModule("iblock");

class IblockEvent
{
    public static function OnBeforeIBlockElementUpdateHandler(&$arFields)
    {
    	if($arFields["ACTIVE"] == "N"){
	    	$iblockId = $arFields["IBLOCK_ID"];
			$elementId = $arFields["ID"];
			$iblock = \Bitrix\Iblock\Iblock::wakeUp($iblockId);
			$dataClass = $iblock->getEntityDataClass();
			$element = $dataClass::getByPrimary($elementId, [
			    'select' => ['SHOW_COUNTER'],
			])->fetchObject();

			$viewCount = $element->get('SHOW_COUNTER');
	    	
		    if($viewCount > 2){
		    	global $APPLICATION;
		    	$APPLICATION->ThrowException("Товар невозможно деактивировать, у него $viewCount просмотров");
		    	return false;
		    }
    	}
    	return $result;
    }
}
