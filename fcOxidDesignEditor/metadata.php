<?php


$sMetadataVersion = '2.1';
$sImgUrl = "https://www.fatchip.de/out/flow/img/favicons/favicon_16x16.png";

$aModule = [
    'id' => 'fcOxidDesignEditor',
    'title' => '<img src="' . $sImgUrl . '" alt="FC"> FATCHIP Module OXID Design Editor',
    'description' => array (
        'de' => 'OXID Modul Design Editor.',


        'en' => 'OXID module design editor.',
    ),
    'thumbnail' => '',
    'version' => '1.0.0',
    'author' => 'FATCHIP GmbH',
    'email' => 'support@fatchip.de',
    'extend' => [
    ],
    'controllers' => [
        'fcDesignEditorAdminController_main'                     => FATCHIP\fcOxidDesignEditor\Application\Controller\admin\fcDesignEditorAdminController_main::class,
        'fcDesignEditorAdminController_view'                     => FATCHIP\fcOxidDesignEditor\Application\Controller\admin\fcDesignEditorAdminController_view::class,
        'fcDesignEditorAdminController_list'                     => FATCHIP\fcOxidDesignEditor\Application\Controller\admin\fcDesignEditorAdminController_list::class,

    ],
    'events'       => [
        'onActivate'     => 'FATCHIP\fcOxidDesignEditor\Core\Events::onActivate',
        'onDeactivate'   => 'FATCHIP\fcOxidDesignEditor\Core\Events::onDeactivate',
    ],
    'blocks' => [

    ],

    'templates' => [
        'fcdesigneditoradmin_view.tpl'       => 'fc/fcOxidDesignEditor/Application/views/admin/tpl/fcdesigneditoradmin_view.tpl',
        'fcdesigneditoradmin_main.tpl'       => 'fc/fcOxidDesignEditor/Application/views/admin/tpl/fcdesigneditoradmin_main.tpl',
        'fcdesigneditoradmin_list.tpl'       => 'fc/fcOxidDesignEditor/Application/views/admin/tpl/fcdesigneditoradmin_list.tpl',
    ],

    'settings'    => [

    ]
];