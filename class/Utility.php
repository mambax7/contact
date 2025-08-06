<?php declare(strict_types=1);

namespace XoopsModules\Contact;

use RuntimeException;

/**
 * Class Utility
 */
class Utility extends Common\SysUtility
{
    //--------------- Custom module methods -----------------------------
    /**
     * Function responsible for checking if a directory exists, we can also write in and create an index.html file
     *
     * @param string $folder The full path of the directory to check
     *
     * @return void
     */
    public static function createFolder($folder): void
    {
        //        try {
        //            if (!mkdir($folder) && !is_dir($folder)) {
        //                throw new \RuntimeException(sprintf('Unable to create the %s directory', $folder));
        //            } else {
        //                file_put_contents($folder . '/index.html', '<script>history.go(-1);</script>');
        //            }
        //        }
        //        catch (Exception $e) {
        //            echo 'Caught exception: ', $e->getMessage(), "\n", '<br>';
        //        }
        try {
            if (!\is_dir($folder)) {
                if (!\mkdir($folder) && !\is_dir($folder)) {
                    throw new RuntimeException(\sprintf('Unable to create the %s directory', $folder));
                }
                file_put_contents($folder . '/index.html', '<script>history.go(-1);</script>');
            }
        } catch (\Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n", '<br>';
        }
    }

    /**
     * @param $src
     * @param $dst
     */
    public static function recurseCopy($src, $dst): void
    {
        $dir = \opendir($src);
        //    @mkdir($dst);
        while (false !== ($file = \readdir($dir))) {
            if (('.' !== $file) && ('..' !== $file)) {
                if (\is_dir($src . '/' . $file)) {
                    self::recurseCopy($src . '/' . $file, $dst . '/' . $file);
                } else {
                    \copy($src . '/' . $file, $dst . '/' . $file);
                }
            }
        }
        \closedir($dir);
    }

    /**
     * Verifies XOOPS version meets minimum requirements for this module
     * @static
     * @param \XoopsModule $module
     *
     * @return bool true if meets requirements, false if not
     */
    //    public static function checkVerXoops(XoopsModule $module)
    //    {
    //        $currentVersion  = strtolower(str_replace('XOOPS ', '', XOOPS_VERSION));
    //        $requiredVersion = strtolower($module->getInfo('min_xoops'));
    //        $vc              = version_compare($currentVersion, $requiredVersion);
    //        $success         = ($vc >= 0);
    //        if (false === $success) {
    //            xoops_loadLanguage('admin', $module->dirname());
    //            $module->setErrors(sprintf(_AM_XOOPSFAQ_ERROR_BAD_XOOPS, $requiredVersion, $currentVersion));
    //        }
    //
    //        return $success;
    //    }

    /**
     * Verifies PHP version meets minimum requirements for this module
     * @static
     * @param \XoopsModule $module
     *
     * @return bool true if meets requirements, false if not
     */
    //    public static function checkVerPhp(XoopsModule $module)
    //    {
    //        xoops_loadLanguage('admin', $module->dirname());
    //        // check for minimum PHP version
    //        $success = true;
    //        $verNum  = PHP_VERSION;
    //        $reqVer  =& $module->getInfo('min_php');
    //        if (false !== $reqVer && '' !== $reqVer) {
    //            if (version_compare($verNum, $reqVer, '<')) {
    //                $module->setErrors(sprintf(_AM_CONTACT_ERROR_BAD_PHP, $reqVer, $verNum));
    //                $success = false;
    //            }
    //        }
    //
    //        return $success;
    //    }

    /**
     * @param $dirname
     */
    public function convertToInnoDB($dirname)
    {
        $xoopsDB = \XoopsDatabaseFactory::getDatabaseConnection();
        $sql = "SELECT ENGINE FROM information_schema.TABLES WHERE TABLE_SCHEMA = '" . XOOPS_DB_NAME . "' AND TABLE_NAME = '" . $xoopsDB->prefix('contact') . "'";
        $result = $xoopsDB->query($sql);
        $row = $xoopsDB->fetchRow($result);
        if ('myisam' === strtolower($row[0])) {
            $sql = 'ALTER TABLE ' . $xoopsDB->prefix('contact') . ' ENGINE=InnoDB';
            $xoopsDB->queryF($sql);
        }
    }
}
