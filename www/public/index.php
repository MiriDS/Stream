<?php

/**
 * PHP application
 *
 * @package mini
 * @author MiriDS
 */

date_default_timezone_set('Asia/Baku');

// set a constant that holds the project's folder path, like "/var/www/".
// DIRECTORY_SEPARATOR adds a slash to the end of the path
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
// set a constant that holds the project's "application" folder, like "/var/www/application".
define('APP', ROOT . 'application' . DIRECTORY_SEPARATOR);

// This is the (totally optional) auto-loader for Composer-dependencies (to load tools into your project).
// If you have no idea what this means: Don't worry, you don't need it, simply leave it like it is.
if (file_exists(ROOT . 'vendor/autoload.php')) {
    require ROOT . 'vendor/autoload.php';
}

// load application config (error reporting etc.)
require APP . 'config/config.php';

// FOR DEVELOPMENT: this loads PDO-debug, a simple function that shows the SQL query (when using PDO).
// If you want to load pdoDebug via Composer, then have a look here: https://github.com/panique/pdo-debug
require APP . 'libs/helper.php';

// start session
session_start();


if (isset($_GET['url']) && $_GET['url'] === '/init') {
    require ROOT . 'public/init.php';
    exit;
}

// load application class
require APP . 'core/application.php';
require APP . 'core/controller.php';

// start the application
$app = new Application();