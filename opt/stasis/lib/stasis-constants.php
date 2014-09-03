<?php
/**
 * Created by PhpStorm.
 * User: nirsi_000
 * Date: 8/14/14
 * Time: 2:39 PM
 */

define('APP_LIBS', 'c:/xampp/htdocs/Stanley/opt/stasis/lib/configs');
define('TIMEZONE', 'Asia/Jerusalem');




/*
 * Over write the APP_LIBS constant for specific OS
 */
if (PHP_OS != "WINNT") {
    define('APP_LIBS', '/opt/stasis/lib/Stanley/configs');
}



?>