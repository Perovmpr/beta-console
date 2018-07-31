<?

use \Bitrix\Main\Localization\Loc;
use \Bitrix\Main\Config as Conf;
use \Bitrix\Main\Config\Option;
use \Bitrix\Main\Loader;
use \Bitrix\Main\Entity\Base;
use \Bitrix\Main\Application;

Loc::loadMessages(__FILE__);
Class demo_console extends CModule
{

	function __construct()
	{
		$arModuleVersion = array();
		include(__DIR__."/version.php");

        

        $this->MODULE_ID = 'demo.console';
		$this->MODULE_VERSION = "1.0.1";
		$this->MODULE_VERSION_DATE = "2018-08-01 00:00:00";
		$this->MODULE_NAME = "Beta Console";
		$this->MODULE_DESCRIPTION = "Модуль для подключения Console Symfony";

		$this->PARTNER_NAME = "Perov Alexey";
		$this->PARTNER_URI = "https://github.com/Perovmpr/beta-console";

        $this->MODULE_SORT = 1;
        $this->SHOW_SUPER_ADMIN_GROUP_RIGHTS='Y';
        $this->MODULE_GROUP_RIGHTS = "Y";
	}

    //Определяем место размещения модуля
    public function GetPath($notDocumentRoot=false)
    {
        if($notDocumentRoot)
            return str_ireplace(Application::getDocumentRoot(),'',dirname(__DIR__));
        else
            return dirname(__DIR__);
    }

    //Проверяем что система поддерживает D7
    public function isVersionD7()
    {
        return CheckVersion(\Bitrix\Main\ModuleManager::getVersion('main'), '14.00.00');
    }

    function InstallDB()
    {
    }

    function UnInstallDB()
    {
    }

	function InstallEvents()
	{
       
	}

	function UnInstallEvents()
	{
   
	}





	function DoInstall()
	{
		global $APPLICATION;
        if($this->isVersionD7())
        {
            \Bitrix\Main\ModuleManager::registerModule($this->MODULE_ID);

        }
        else
        {
            $APPLICATION->ThrowException("Не праваильная версия битрикса");
        }

        
	}

	function DoUninstall()
	{
        global $APPLICATION;

        \Bitrix\Main\ModuleManager::unRegisterModule($this->MODULE_ID);

            
        
	}


}
?>