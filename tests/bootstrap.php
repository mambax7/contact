<?php
// Define the XOOPS root path
define('XOOPS_ROOT_PATH', dirname(__DIR__, 2));

// Load the XOOPS main file
if (file_exists(XOOPS_ROOT_PATH . '/mainfile.php')) {
    require_once XOOPS_ROOT_PATH . '/mainfile.php';
} else {
    // If mainfile.php is not found, we can't run the tests.
    // We will define some basic constants to allow the unit tests to run.
    define('XOOPS_DB_HOST', 'localhost');
    define('XOOPS_DB_USER', 'root');
    define('XOOPS_DB_PASS', '');
    define('XOOPS_DB_NAME', 'xoops_test');
    define('XOOPS_DB_PREFIX', 'xoops');
    define('XOOPS_URL', 'http://localhost');
}

// Load the Composer autoloader
require_once dirname(__DIR__) . '/vendor/autoload.php';
