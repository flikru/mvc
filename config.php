<?php
//path
define('URL', 'http://'.$_SERVER['SERVER_NAME'].'/mvc/');
define('LIBS','core/');
//all

return array(
    'DB'=> array(
        'DB_TYPE' => 'mysql',
        'DB_HOST' => 'localhost',
        'DB_USER' => 'root',
        'DB_PASS' => '',
        'DB_NAME' => 'mvc'
    ),

    'Modules'=> array('user','login','test'),
    'defaultController'=>'index'
);
?>
