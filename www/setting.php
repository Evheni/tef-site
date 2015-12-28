<?php
/**
 * Created by PhpStorm.
 * User: Evheni
 * Date: 12/25/2015
 * Time: 17:19
 */
ini_set( "display_errors", true );

define ('DIRSEP', DIRECTORY_SEPARATOR);
define( "DB_DSN", 'localhost'); //"mysql:host=localhost;dbname=cms"
define( "DB_NAME", "tef_db");
define( "DB_USERNAME", "u_tef_db" );
define( "DB_PASSWORD", "123456789" );
define( "CLASS_PATH", DIRSEP  . "classes" );
define( "CONTROLLER_PATH", DIRSEP  . "controllers" );
define( "TEMPLATE_PATH", DIRSEP  . "templates" );
define( "NUM_ARTICLES", 5 );
define( "EMAIL", "questions@tef.kpi.ua");
define( "SITE", "tef.free");

$site_path = realpath(dirname(__FILE__)) . DIRSEP;
define ('site_path', $site_path);

function my_autoloader($class_name) {
    $filename = $class_name . '.php';
    $file = site_path . CLASS_PATH . DIRSEP . $filename;
    if (file_exists($file)) {
        include_once($file);
    } else {
        return false;
    }
}

spl_autoload_register('my_autoloader');