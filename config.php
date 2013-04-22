<?php
//path
define('URL', 'http://'.$_SERVER['SERVER_NAME'].'/mvc/');
define('LIBS','core/');
define('defaultController','index');
//all

define('HASH_GENERAL_KEY', 'MixitUp200');
define('HASH_PASSWORD_KEY', 'catsFLYhigh2000miles');

return array(
    'DB'=> array('DB_TYPE' => 'mysql','DB_HOST' => 'localhost','DB_USER' => 'root','DB_PASS' => '','DB_NAME' => 'mvc'),
    'Modules'=> array('user','login'),
    'defaultController'=>'index'
);
?>
