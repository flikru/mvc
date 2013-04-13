<?php
    require 'config/paths.php';
    require 'config/database.php';
    require 'config/constants.php';

    function __autoload($class) {
        echo LIBS . $class .".php";
        require LIBS . $class .".php";
    }
    $app = new Bootstrap();
?>