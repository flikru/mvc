<?php
//db
 /*
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'mvc');
define('DB_USER', 'root');
define('DB_PASS', '');         */

//path
define('URL','http://localhost/engine/');
define('LIBS','core/');

//all

define('HASH_GENERAL_KEY', 'MixitUp200');
define('HASH_PASSWORD_KEY', 'catsFLYhigh2000miles');

return array(
    'DB'=> array('DB_TYPE' => 'mysql','DB_HOST' => 'localhost','DB_USER' => 'root','DB_PASS' => '','DB_NAME' => 'mvc'),
    'Modules'=> array('user','login')
);
?>
