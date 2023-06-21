<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

class UserGroupsComponent extends \CBitrixComponent
{

	protected function getResult()
	{
		$groups = \Bitrix\Main\GroupTable::getList(array(
		    'select'  => array('NAME','ID','DESCRIPTION',),
		));

		while ($arGroup = $groups->fetch()) {
		    $this->arResult['USER_GROUPS'][] = $arGroup;

		}
	}
	

	public function executeComponent()
	{
		try
		{
			if ($this->StartResultCache()){
				$this->getResult();
				$this->includeComponentTemplate();
			}
			
			global $APPLICATION;
			$APPLICATION->SetTitle($this->arParams['PAGE_TITLE']);
		}
		catch (Exception $e)
		{
			$this->abortResultCache();
			ShowError($e->getMessage());
		}
	}
}
?>