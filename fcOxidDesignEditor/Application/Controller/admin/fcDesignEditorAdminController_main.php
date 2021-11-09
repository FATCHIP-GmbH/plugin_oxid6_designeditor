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

//    public function render()
//    {
//
//
//        $sShopId = $myConfig->getShopId();
//
//        if (!isset($sTheme)) {
//            $sTheme = $this->_sTheme = $this->getConfig()->getConfigParam('sTheme');
//        }
//
//        $oTheme = oxNew(\OxidEsales\Eshop\Core\Theme::class);
//        if ($oTheme->load($sTheme)) {
//            $this->_aViewData["oTheme"] = $oTheme;
//
//            try {
//                $aDbVariables = $this->loadConfVars($sShopId, $this->_getModuleForConfigVars());
//                $this->_aViewData["var_constraints"] = $aDbVariables['constraints'];
//                $this->_aViewData["var_grouping"] = $aDbVariables['grouping'];
//                foreach ($this->_aConfParams as $sType => $sParam) {
//                    $this->_aViewData[$sParam] = $aDbVariables['vars'][$sType];
//                }
//            } catch (\OxidEsales\Eshop\Core\Exception\StandardException $oEx) {
//                \OxidEsales\Eshop\Core\Registry::getUtilsView()->addErrorToDisplay($oEx);
//                $oEx->debugOut();
//            }
//        } else {
//            \OxidEsales\Eshop\Core\Registry::getUtilsView()->addErrorToDisplay(oxNew(\OxidEsales\Eshop\Core\Exception\StandardException::class, 'EXCEPTION_THEME_NOT_LOADED'));
//        }
//
//        return 'theme_config.tpl';
//    }

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
//        $config = $this->getConfig();
//        $confVars = new stdClass();
//        error_log($config->getConfigParam("sLogoFile"));
//        $confVars->sLogoFile = $config->getConfigParam("sLogoFile");
//
//        $this->_aViewData["confstrs"] = $confVars;
//
//
//        return $this->_sThisTemplate;
//    }

    /**
     * Saves changed selected action parameters
     */
    public function save()
    {
        parent::save();
        $config = Registry::getConfig();

        $name = $_FILES["userfile"]["name"];
        $tmp_name = $_FILES["userfile"]["tmp_name"];

        error_log(Config::OXMODULE_THEME_PREFIX . $config->getConfigParam('sTheme'));
        error_log( getShopBasePath() . "out/" . $config->getConfigParam('sTheme') . "/img/" . $name);
        move_uploaded_file($tmp_name, getShopBasePath() . "out/" . $config->getConfigParam('sTheme') . "/img/" . $name);

        foreach ($aParams as $key => $value) {
            $config->saveShopConfVar("str", $key, $value, 1, Config::OXMODULE_THEME_PREFIX . $config->getConfigParam('sTheme'));
        }
    }






    /**
     * Deletes Item Out Of List
     */
    public function delete(){
        $soxId = $this->getEditObjectId();
        $oPluginList = oxNew(fcdesigneditdata::class);
        if ($soxId != "-1") {
            $oPluginList->loadInLang($this->_iEditLang, $soxId);
        } else {
            $aParams['fcsupportform_plugins__oxid'] = null;
        }
        $oPluginList->delete($soxId);
    }

}
