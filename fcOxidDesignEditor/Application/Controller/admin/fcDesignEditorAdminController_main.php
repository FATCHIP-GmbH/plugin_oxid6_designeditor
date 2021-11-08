<?php
namespace FATCHIP\fcOxidDesignEditor\Application\Controller\admin;

use FATCHIP\fcOxidDesignEditor\Application\Model\fcDesignEdit_data;
use OxidEsales\Eshop\Application\Controller\Admin\AdminDetailsController;
use OxidEsales\Eshop\Core\DatabaseProvider;
use PHPUnit\Util\Annotation\Registry;
use stdClass;
use \OxidEsales\Eshop\Core\Registry;
use FATCHIP\fcSupportForm\Core\Events;

class fcDesignEditorAdminController_main extends AdminDetailsController
{
    /**
     * Current class template name
     *
     * @var string
     */
    protected $_sThisTemplate = 'fcdesigneditoradmin_main.tpl';

    /**
     * renders the main Tab in admin
     * and populates the fields if an item from the list is selected
     * @return string
     */
    public function render()
    {
        parent::render();
        $oPlugins = oxNew(fcDesignEdit_data::class);

        $oPluginsID = $this->getEditObjectId();

        $this->_aViewData["edit"] = $oPlugins;
        $this->_aViewData["oxid"] = $oPluginsID;


        if (isset($oPluginsID) && $oPluginsID != "-1") {
            // load object
            $oPlugins->loadInLang($this->_iEditLang, $oPluginsID);
            $oOtherLang = $oPlugins->getAvailableInLangs();

            if (!isset($oOtherLang[$this->_iEditLang])) {
                // echo "language entry doesn't exist! using: ".key($oOtherLang);
                $oPlugins->loadInLang(key($oOtherLang), $oPluginsID);
            }

            // remove already created languages
            $aLang = array_diff(\OxidEsales\Eshop\Core\Registry::getLang()->getLanguageNames(), $oOtherLang);

            if (count($aLang)) {
                $this->_aViewData["posslang"] = $aLang;
            }

            foreach ($oOtherLang as $id => $language) {
                $oLang = new stdClass();
                $oLang->sLangDesc = $language;
                $oLang->selected = ($id == $this->_iEditLang);
                $this->_aViewData["otherlang"][$id] = clone $oLang;
            }
        }
        return $this->_sThisTemplate;
    }

    /**
     * Saves changed selected action parameters
     */
    public function save()
    {
        $config= Registry::getConfig();
        $aParams = $config->getRequestParameter("editval");

        foreach($aParams as $key => $value){
            if (!isset($aParams['fcdesignedit__active'])) {
                $aParams['fcdesignedit__active'] = 0;
            }
            $config->setConfigParam($key,$value);
        }




//        parent::save();
//
//        $soxId = $this->getEditObjectId();
//        $aParams = \OxidEsales\Eshop\Core\Registry::getConfig()->getRequestParameter("editval");
//
//        $oPluginList = oxNew(fcDesignEdit_data::class);
//
//        if ($soxId != "-1") {
//            $oPluginList->loadInLang($this->_iEditLang, $soxId);
//        } else {
//            $aParams['fcsupportform_plugins__oxid'] = 1+ DatabaseProvider::getDb()->getOne("SELECT MAX(OXID) FROM ".Events::$fcsupportformTable_Plugins);
//            $aParams['fcsupportform_plugins__oxisform'] = 1;
//        }
//
//        // checkbox handling
//        if (!isset($aParams['fcsupportform_plugins__oxactive'])) {
//            $aParams['fcsupportform_plugins__oxactive'] = 0;
//        }
//        if (!isset($aParams['fcsupportform_plugins__oxisoxidshop'])) {
//            $aParams['fcsupportform_plugins__oxisoxidshop'] = 0;
//        }
//
//        $oPluginList->setLanguage(0);
//        $oPluginList->assign($aParams);
//        $oPluginList->setLanguage($this->_iEditLang);
//        $oPluginList = \OxidEsales\Eshop\Core\Registry::getUtilsFile()->processFiles($oPluginList);
//        $oPluginList->save();
//
//        // set oxid if inserted
//        $this->setEditObjectId($oPluginList->getId());
    }

    /**
     * Saves changed selected action parameters in different language.
     */
    public function saveinnlang()
    {
        $this->save();
    }

    /**
     * creates new object of Database Table
     * @return object
     */
    protected function createModelObject()
    {
        $plugin = oxNew(fcdesigneditdata::class);

        return $plugin;
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
