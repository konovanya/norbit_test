<?php

use Bitrix\Main\Application;
use Bitrix\Main\Loader;
use Bitrix\Main\Entity\Base;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ModuleManager;

Loc::loadMessages(__FILE__);

class anna_rates extends CModule
{
    public function __construct()
    {

        $arModuleVersion = array();

        include __DIR__ . '/version.php';

        if (is_array($arModuleVersion) && array_key_exists('VERSION', $arModuleVersion)) {
            $this->MODULE_VERSION = $arModuleVersion['VERSION'];
            $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
        }

        $this->MODULE_ID = 'anna.rates';
        $this->MODULE_NAME = Loc::getMessage('ANNA_RATES_MODULE_NAME');
        $this->MODULE_DESCRIPTION = Loc::getMessage('ANNA_RATES_MODULE_DESCRIPTION');
        $this->MODULE_GROUP_RIGHTS = 'N';

        $this->PARTNER_NAME = Loc::getMessage('ANNA_RATES_MODULE_PARTNER_NAME');
        $this->PARTNER_URI = 'https://сайт';
    }

    public function doInstall()
    {
      
        $this->installDB();
        $this->InstallEvents();
        $this->InstallFiles();
        ModuleManager::registerModule($this->MODULE_ID);
    }

    public function doUninstall()
    {
        ModuleManager::unRegisterModule($this->MODULE_ID);
        $this->UnInstallFiles();
        $this->UnInstallEvents();
        $this->uninstallDB();
    }

    public function installDB()
    {
        return true;
    }

    public function uninstallDB()
    {
        return true;
    }
    public function InstallEvents()
    {
        return true;
    }
 
    public function UnInstallEvents()
    {
        return true;
    }
 
    public function InstallFiles()
    {
        CopyDirFiles( __DIR__ ."/components", $_SERVER["DOCUMENT_ROOT"]."/bitrix/components", true, true);
    }
 
    public function UnInstallFiles()
    {
        \Bitrix\Main\IO\Directory::deleteDirectory($_SERVER["DOCUMENT_ROOT"]."/bitrix/components/test");
        return true;
    }
}
