<?
use Bitrix\Main\Localization\Loc;

if(!check_bitrix_sessid())
	return;

if($exception = $APPLICATION->getException()){
	echo CAdminMessage::showMessage([
		'TYPE' => 'ERROR',
		'MESSAGE' => Loc::getMessage('MOD_INST_ERR'),
		'DETAILS' => $exception->getString(),
		'HTML' => true,

		]);
} else{
	echo CAdminMessage::ShowNote(Loc::getMessage('MOD_INST_OK'));
}