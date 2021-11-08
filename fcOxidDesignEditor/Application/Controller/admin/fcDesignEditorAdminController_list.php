<?php
namespace FATCHIP\fcOxidDesignEditor\Application\Controller\admin;

use FATCHIP\fcOxidDesignEditor\Application\Model\fcDesignEdit_data;
use FATCHIP\fcOxidDesignEditor\Core\Events;
use OxidEsales\Eshop\Application\Controller\Admin\AdminListController;
class fcDesignEditorAdminController_list extends AdminListController
{
    /**
     * Current class template name.
     *
     * @var string
     */
    protected $_sThisTemplate = 'fcdesigneditoradmin_list.tpl';

    /**
     * maxes out list because of pagination error
     * @var int
     */
    protected $_iViewListSize = 9999;

    /**
     * Name of chosen object class (default null).
     *
     * @var string
     */
    protected $_sListClass = fcDesignEdit_data::class;

    /**
     * Default SQL sorting parameter (default null).
     *
     * @var string
     */
    protected $_sDefSortField = "oxid";

    /**
     * Executes parent method parent::render() and returns name of template
     *
     * @return string
     */
    public function render()
    {
        parent::render();
        return $this->_sThisTemplate;
    }

    /**
     * Updates the views so tables and new Plugins that have been created are loaded into list
     *
     */
//    public function updateViews(){
//        Events::addAllPluginsToList();
//        Events::updateActiveInShop();
//        Events::updateDeletedArticles();
//        $oMetaData = oxNew(\OxidEsales\Eshop\Core\DbMetaDataHandler::class);
//        $oMetaData->updateViews();
//    }
}