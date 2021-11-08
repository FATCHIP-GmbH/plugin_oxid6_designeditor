<?php

namespace FATCHIP\fcOxidDesignEditor\Application\Model;

use oxDb;
use OxidEsales\Eshop\Core\Registry;

/**
 * Group manager.
 * Base class for user groups. Does nothing special yet.
 *
 */
class fcDesignEdit_data extends \OxidEsales\Eshop\Core\Model\MultiLanguageModel
{
    /**
     * Name of current class
     *
     * @var string
     */
    protected $_sClassName = 'fcdesignedit';

    /**
     * Class constructor, initiates parent constructor (parent::oxBase()).
     */
    public function __construct()
    {
        parent::__construct();
        Registry::getConfig()->setConfigParam("blSkipViewUsage",false);
        $this->init('fcdesignedit');
    }
}
