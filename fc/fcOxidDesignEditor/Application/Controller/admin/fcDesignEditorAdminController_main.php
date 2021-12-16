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
    public $upload_message = [];


    /**
     * return theme filter for config variables
     *
     * @return string
     */
    protected function _getModuleForConfigVars()
    {
        $sTheme = $this->getsTheme();
        return Config::OXMODULE_THEME_PREFIX . $sTheme;
    }

    public function getsTheme()
    {
        $config = Registry::getConfig();
        $sTheme = $config->getConfigParam('sTheme');
        if($config->getConfigParam('sCustomTheme')){
            $sTheme = $config->getConfigParam('sCustomTheme');
        }

        return $sTheme;
    }

    /**
     * Saves changed selected action parameters
     */
    public function save()
    {
        $config = Registry::getConfig();
        $sTheme = $this->getsTheme();

        $params = $config->getRequestParameter("confstrs");
        $name = $params["sLogoFile"];
        $tmp_name = $_FILES["logotitleupload"]["tmp_name"];
        if (is_uploaded_file($tmp_name)) {
            if(move_uploaded_file($tmp_name, getShopBasePath() . "out/" . $sTheme . "/img/" . $name)){
                $this->upload_message["success"][] = "FCDESIGNEDITOR_MAIN_LOGOTITLEUPLOAD_SUCCESS";
            }else{
                $this->upload_message["errors"][] = "FCDESIGNEDITOR_MAIN_LOGOTITLEUPLOAD_ERROR";
            }
        }

        $name = $params["sEmailLogo"];
        $tmp_name = $_FILES["logoemailupload"]["tmp_name"];
        if (is_uploaded_file($tmp_name)) {
            if(move_uploaded_file($tmp_name, getShopBasePath() . "out/" . $sTheme . "/img/" . $name)){
                $this->upload_message["success"][] = "FCDESIGNEDITOR_MAIN_LOGOEMAILUPLOAD_SUCCESS";
            }else{
                $this->upload_message["errors"][] = "FCDESIGNEDITOR_MAIN_LOGOEMAILUPLOAD_ERROR";
            }
        }
        $name = $params["sFaviconFile"];
        $tmp_name = $_FILES["faviconupload"]["tmp_name"];
        $fileStatus = $_FILES["faviconupload"]["error"];
        $fileType = $_FILES["faviconupload"]["type"];
        if ($fileStatus === UPLOAD_ERR_OK && $fileType == "image/x-icon") {
            if (is_uploaded_file($tmp_name)) {
                if(move_uploaded_file($tmp_name, getShopBasePath() . "out/" . $sTheme . "/img/favicons/" . $name)){
                    $this->upload_message["success"][] = "FCDESIGNEDITOR_MAIN_FAVICONUPLOAD_SUCCESS";
                }else{
                    $this->upload_message["errors"][] = "FCDESIGNEDITOR_MAIN_FAVICONUPLOAD_ERROR";
                }
            }
        } elseif ($fileStatus === UPLOAD_ERR_OK && $fileType != "image/x-icon") {
            $this->upload_message["errors"][] = "FCDESIGNEDITOR_MAIN_FAVICONUPLOAD_NOTRIGHTFILE";
        }
        parent::save();
    }








}
