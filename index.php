<?php
    require 'app/config/paths.php';
    require 'app/config/database.php';
    require 'app/config/constants.php';	
    function __autoload($class) {
       //echo LIBS . $class .".php";
        require LIBS . $class .".php";
    }
    $app = new Bootstrap();
?>