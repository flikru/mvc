<?php
class Bootstrap {
    public static $db;
    public static $ok=false;
    public static $useModule=null;
    public static $_config;

    function __construct() {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        $this->_config = require 'config.php';
        $this->modules=$this->_config['Modules'];
        self::$db=$this->_config['DB'];
        $defaultController=$this->_config['defaultController'];


        if (empty($url[0])){
            require 'app/controllers/'.$defaultController.'Controller.php';
            $controller = new Index();
            $controller->index();
            return false;
        }

        $fileLoad = 'app/controllers/' . $url[0] . 'Controller.php';
        if (file_exists($fileLoad)) {
            self::$ok=true;
            require $fileLoad;
        }
            else
        foreach($this->modules as $item1)
            {
                $fileModule = 'app/modules/'.$item1.'/controllers/' . $url[0] . 'Controller.php';
                if(file_exists($fileModule))
                {
                    self::$useModule=$item1;
                    self::$ok=true;
                    require $fileModule;
                    break;
                }

            }
        if(self::$ok==false)
        {
            $this->error();
        exit;
        }

                $controller = new $url[0];
                $controller->loadModel($url[0]);

        if (isset($url[2])) {
            if (method_exists($controller, $url[1])) {
                $controller->{$url[1]}($url[2]);
            } else {
                $this->error();
            }
        } else {
            if (isset($url[1])) {
                if (method_exists($controller, $url[1])) {
                    $controller->{$url[1]}();
                } else {
                    $this->error();
                }
            } else {
                $controller->index();
            }
        }


    }

    function error() {
        require 'app/controllers/errorController.php';
        $controller = new Error();
        $controller->index();
        return false;
    }

}
?>