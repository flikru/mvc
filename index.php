<?php
	require 'app/const.php';	
    function __autoload($class) {
        require LIBS . $class .".php";
		echo LIBS . $class .".php";

    }
    $app = new Bootstrap();
?>