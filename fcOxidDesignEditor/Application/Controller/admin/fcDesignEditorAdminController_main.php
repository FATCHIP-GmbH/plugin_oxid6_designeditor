<?php
namespace FATCHIP\fcOxidDesignEditor\Application\Controller\admin;

use FATCHIP\fcOxidDesignEditor\Application\Model\fcDesignEdit_data;
use oxadmindetails;
use OxidEsales\Eshop\Application\Controller\Admin\AdminDetailsController;
use OxidEsales\Eshop\Application\Controller\Admin\ShopConfiguration;
use OxidEsales\Eshop\Application\Controller\Admin\ThemeConfiguration;
use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\EshopCommunity\Core\Config;
use stdClass;
use \OxidEsales\Eshop\Core\Registry;
use FATCHIP\fcSupportForm\Core\Events;

class fcDesignEditorAdminController_main extends ShopConfiguration
{
    /**
     * Current class template name
     *
     * @var string
     */
    protected $_sThisTemplate = 'fcdesigneditoradmin_main.tpl';


    /**
     * return theme filter for config variables
     *
     * @return string
     */
    protected function _getModuleForConfigVars()
    {
        return Config::OXMODULE_THEME_PREFIX . $this->getConfig()->getConfigParam('sTheme');
    }

//    public function render()
//    {
//        parent::render();
//    }

    /**
     * Saves changed selected action parameters
     */
    public function save()
    {
        parent::save();
        $config = Registry::getConfig();
        $params = $config->getRequestParameter("confstrs");
        $name = $params["sLogoFile"];
        $tmp_name = $_FILES["logotitleupload"]["tmp_name"];
        if(is_uploaded_file($tmp_name)){
            move_uploaded_file($tmp_name, getShopBasePath() . "out/" . $config->getConfigParam('sTheme') . "/img/".$name);
        }
        $name = $params["sEmailLogo"];
        $tmp_name = $_FILES["logoemailupload"]["tmp_name"];
        if(is_uploaded_file($tmp_name)) {
            move_uploaded_file($tmp_name, getShopBasePath() . "out/" . $config->getConfigParam('sTheme') . "/img/".$name);
        }
    }







}
