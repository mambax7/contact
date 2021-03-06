<?php
/*
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

/**
 * @copyright    XOOPS Project (https://xoops.org)
 * @license      GNU GPL 2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author      XOOPS Development Team
 */

use Xmf\Module\Admin;

require dirname(__DIR__, 3) . '/mainfile.php';

$moduleDirName      = \basename(\dirname(__DIR__));
$moduleDirNameUpper = mb_strtoupper($moduleDirName);

if (!defined($moduleDirNameUpper . '_DIRNAME')) {
    //if (!defined(constant($capsDirName . '_DIRNAME'))) {
    define($moduleDirNameUpper . '_DIRNAME', $GLOBALS['xoopsModule']->dirname());
    define($moduleDirNameUpper . '_PATH', XOOPS_ROOT_PATH . '/modules/' . constant($moduleDirNameUpper . '_DIRNAME'));
    define($moduleDirNameUpper . '_URL', XOOPS_URL . '/modules/' . constant($moduleDirNameUpper . '_DIRNAME'));
    define($moduleDirNameUpper . '_ADMIN', constant($moduleDirNameUpper . '_URL') . '/admin/index.php');
    define($moduleDirNameUpper . '_ROOT_PATH', XOOPS_ROOT_PATH . '/modules/' . constant($moduleDirNameUpper . '_DIRNAME'));
    define($moduleDirNameUpper . '_AUTHOR_LOGOIMG', constant($moduleDirNameUpper . '_URL') . '/assets/images/logoModule.png');
}

// Define here the place where main upload path

//$img_dir = $GLOBALS['xoopsModuleConfig']['uploaddir'];

define($moduleDirNameUpper . '_UPLOAD_URL', XOOPS_UPLOAD_URL . '/' . $moduleDirName); // WITHOUT Trailing slash
define($moduleDirNameUpper . '_UPLOAD_PATH', XOOPS_UPLOAD_PATH . '/' . $moduleDirName); // WITHOUT Trailing slash

//constant($cloned_lang . '_CATEGORY_NOTIFY')

//$uploadFolders = [
//    constant($capsDirName . '_UPLOAD_PATH'),
//    constant($capsDirName . '_UPLOAD_PATH') . '/images',
//    constant($capsDirName . '_UPLOAD_PATH') . '/images/thumbnails'
//];
//
//$copyFiles = [
//    constant($capsDirName . '_UPLOAD_PATH'),
//    constant($capsDirName . '_UPLOAD_PATH') . '/images',
//    constant($capsDirName . '_UPLOAD_PATH') . '/images/thumbnails'
//];
//
//$oldFiles = [
//    '/include/update_functions.php',
//    '/include/install_functions.php'
//];

/**
 * Class ModuleConfigurator
 */
class ContactConfigurator
{
    public $uploadFolders   = [];
    public $blankFiles      = [];
    public $templateFolders = [];
    public $oldFiles        = [];
    public $oldFolders      = [];
    public $renameTables    = [];
    public $name;

    /**
     * ModuleConfigurator constructor.
     */
    public function __construct()
    {
        $moduleDirName       = \basename(\dirname(__DIR__));
        $moduleDirNameUpper  = mb_strtoupper($moduleDirName);
        $this->name          = 'Contact Module Configurator';
        $this->uploadFolders = [
            //            constant($capsDirName . '_UPLOAD_PATH'),
            //            constant($capsDirName . '_UPLOAD_PATH') . '/midsize',
            //            constant($capsDirName . '_UPLOAD_PATH') . '/thumbs',
        ];
        $this->blankFiles    = [
            //            constant($capsDirName . '_UPLOAD_PATH'),
            //            constant($capsDirName . '_UPLOAD_PATH') . '/midsize',
            //            constant($capsDirName . '_UPLOAD_PATH') . '/thumbs',
        ];

        $this->templateFolders = [
            '/templates/',
            '/templates/blocks/',
            '/templates/admin/',
        ];
        $this->oldFiles        = [
            // '/include/functions.php',
            '/include/functions_update.php',
            '/LICENSE',
            '/readme.html',
        ];
        $this->oldFolders      = [
            '/images',
            '/css',
            '/js',
        ];
    }
}

// module information
$modCopyright = "<a href='https://xoops.org' title='XOOPS Project' target='_blank'>
                     <img src='" . Admin::iconUrl('xoopsmicrobutton.gif') . '\' alt=\'XOOPS Project\' ></a>';
