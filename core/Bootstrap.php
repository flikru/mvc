<?php
class Bootstrap {
    function __construct() {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);


        if (empty($url[0])){
            require 'app/controllers/index.php';
            $controller = new Index();
            $controller->index();
            return false;
        }

        $fileLoad = 'app/controllers/' . $url[0] . '.php';
        $fileModule = 'app/modules/'.$url[0].'/controllers/' . $url[0] . '.php';
        if (file_exists($fileLoad)) {
            require $fileLoad;
        }
            else
        if(file_exists($fileModule))
        {
            require $fileModule;
        }
        else $this->error();

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
        require 'app/controllers/error.php';
        $controller = new Error();
        $controller->index();
        return false;
    }

}
?>