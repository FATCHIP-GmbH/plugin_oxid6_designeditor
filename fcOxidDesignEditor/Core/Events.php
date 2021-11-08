<?php

namespace FATCHIP\fcOxidDesignEditor\Core;

use OxidEsales\Eshop\Core\DatabaseProvider;

/**
 * Activation and deactivation handler
 */
class Events
{
    public static $fcDesignEditTable = "fcdesignedit";
    public static $fcDesignEditTable_Query = "
        CREATE TABLE fcdesignedit (
            OXID varchar(32) NOT NULL,
            OXVALNAME varchar(255) NOT NULL DEFAULT '',
            OXVALUE varchar(255) DEFAULT NULL,
            PRIMARY KEY (OXID)
        ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;";

    public static $fcDesignEditTable_BaseData_KeyValue=[
            "OXID"=> "6044e1b77e91b4fe89b4880b3c5fad15",
            "OXVALNAME"=>"LOGO"
    ];

    public static function onActivate()
    {
        self::addDatabaseStructure();
        self::clearTmp();
    }

    /**
     * Execute action on deactivate event.
     *
     * @return void
     */
    public static function onDeactivate()
    {
        self::clearTmp();
    }

    protected static function addDatabaseStructure()
    {
        self::addTableIfNotExists(self::$fcDesignEditTable, self::$fcDesignEditTable_Query);
        self::insertRowIfNotExists(self::$fcDesignEditTable,self::$fcDesignEditTable_BaseData_KeyValue);
    }

    /**
     * Adds Table To database if it does not exists
     *
     * @param $sTableName    string
     * @param $sQuery    string
     * @return bool
     * @throws \OxidEsales\Eshop\Core\Exception\DatabaseConnectionException
     * @throws \OxidEsales\Eshop\Core\Exception\DatabaseErrorException
     */
    protected static function addTableIfNotExists($sTableName, $sQuery)
    {
        $aTables = DatabaseProvider::getDb()->getAll("SHOW TABLES LIKE '{$sTableName}'");
        if (!$aTables || count($aTables) == 0) {
            DatabaseProvider::getDb()->Execute($sQuery);
            return true;
        }
        return false;
    }


    protected static function insertRowIfNotExists($sTableName, $aKeyValue, $sQuery = null)
    {
        $insertQuery = "INSERT INTO " . $sTableName . "(";
        if (empty($aKeyValue)) {
            return false;
        }
        $sCheckQuery = "SELECT * FROM {$sTableName} WHERE 1 AND OXID = '{$aKeyValue['OXID']}'";
        if (!DatabaseProvider::getDb()->getOne($sCheckQuery)) {
            $insertQueryKeys = "";
            $insertQueryValues = "";
            foreach ($aKeyValue as $key => $value) {
                $insertQueryKeys .= $key . ",";
                $insertQueryValues .= "'{$value}',";
            }
            if ($sQuery !== null) {
                try {
                    DatabaseProvider::getDb()->Execute($sQuery);
                } catch (Exception $e) {
                    echo $e;
                    return false;
                }
            } else {
                try {
                    DatabaseProvider::getDb()->Execute($insertQuery . rtrim($insertQueryKeys, ",") . ") VALUES(" . rtrim($insertQueryValues, ",") . ")");
                } catch (Exception $e) {
                    echo $e;
                    return false;
                }
            }
        }
        return false;
    }


    /**
     * Clear tmp dir and smarty cache.
     *
     * @return void
     */
    protected static function clearTmp()
    {
        $sTmpDir = getShopBasePath() . "/tmp/";
        $sSmartyDir = $sTmpDir . "smarty/";

        foreach (glob($sTmpDir . "*.txt") as $sFileName) {
            @unlink($sFileName);
        }
        foreach (glob($sSmartyDir . "*.php") as $sFileName) {
            @unlink($sFileName);
        }
    }
}