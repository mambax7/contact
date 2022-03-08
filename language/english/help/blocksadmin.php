<?php declare(strict_types=1);
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
 * @copyright    XOOPS Project https://xoops.org/
 * @license      GNU GPL 2.0 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @since
 * @author       XOOPS Development Team
 */
$moduleDirName      = \basename(\dirname(__DIR__, 2));
$moduleDirNameUpper = \mb_strtoupper($moduleDirName);
// Blocks & Groups Admin
\define('CO_' . $moduleDirNameUpper . '_' . 'TOPPAGE', 'Top Page');
\define('CO_' . $moduleDirNameUpper . '_' . 'ALLPAGES', 'All Pages');
\define('CO_' . $moduleDirNameUpper . '_' . 'TITLE', 'Title');
\define('CO_' . $moduleDirNameUpper . '_' . 'SIDE', 'Side');
\define('CO_' . $moduleDirNameUpper . '_' . 'WEIGHT', 'Weight');
\define('CO_' . $moduleDirNameUpper . '_' . 'VISIBLE', 'Visible');
\define('CO_' . $moduleDirNameUpper . '_' . 'VISIBLEIN', 'Visible In');
\define('CO_' . $moduleDirNameUpper . '_' . 'ACTION', 'Action');
\define('CO_' . $moduleDirNameUpper . '_' . 'LATESTNEWS_TITLE', 'Title');
\define('CO_' . $moduleDirNameUpper . '_' . 'LATESTNEWS_WEIGHT', 'Weight');
\define('CO_' . $moduleDirNameUpper . '_' . 'BCACHETIME', 'Cache time');
\define('CO_' . $moduleDirNameUpper . '_' . 'LATESTNEWS_ACTION', 'Action');
\define('CO_' . $moduleDirNameUpper . '_' . 'ACTIVERIGHTS', 'Module administration rights');
\define('CO_' . $moduleDirNameUpper . '_' . 'ACCESSRIGHTS', 'Module access rights');
\define('CO_' . $moduleDirNameUpper . '_' . 'BADMIN', 'Blocks administration');
\define('CO_' . $moduleDirNameUpper . '_' . 'ADGS', 'Groups');
\define('CO_' . $moduleDirNameUpper . '_' . 'ALLMODULEPAGES', 'Groups');
\define('CO_' . $moduleDirNameUpper . '_' . 'SYSTEMLEVEL', '_AM_SYSTEMLEVEL');
\define('CO_' . $moduleDirNameUpper . '_' . 'ADMINBLOCK', '_AM_ADMINBLOCK');

\define('CO_' . $moduleDirNameUpper . '_' . 'BLOCKTAG1', '%s will print %s');
\define('CO_' . $moduleDirNameUpper . '_' . 'ADDBLOCK', 'Add Block');
\define('CO_' . $moduleDirNameUpper . '_' . 'NOTSELNG', 'Not Sel');
