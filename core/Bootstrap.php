<?php
class Bootstrap {
    public static $db;
    public static $ok=false;
    public static $listModule;
    public static $useModule=null;
    public static $useController=null;
    public static $useMethod=null;
    public static $_config;

    function __construct() {
        $url=$this->getUrl();
        $this->_config=$this->getConfig();
        $defaultController=$this->_config['defaultController'];
         self::$listModule=$this->modules;
        if (empty($url[0])){
            self::$useController=$defaultController;
            require 'app/controllers/'.$defaultController.'Controller.php';
            $controller = new Index();
            $controller->index();
            return false;
        }
        self::$useController=$url['0'];
        $this->loadController($url);

        if(self::$ok==false)
        {
            $this->error($url[0],'controller');
            exit;
        }

        $controller = new $url[0];
        $controller->loadModel($url[0]);

        $this->getAction($url,$controller);
    }

    public function getAction($url,$controller){

        if (isset($url[2])) {
            if (method_exists($controller, $url[1])) {
                self::$useMethod=$url[1];
                $controller->{$url[1]}($url[2]);
            } else {
                $this->error($url[1],'method');
            }
        } else {
            if (isset($url[1])) {
                if (method_exists($controller, $url[1])) {
                    self::$useMethod=$url[1];
                    $controller->{$url[1]}();
                } else {
                    $this->error($url[1],'method');
                }
            } else {
                self::$useMethod='index';
                $controller->index();
            }
        }

    }

    public function loadController($url){
        $fileLoad = 'app/controllers/' . $url[0] . 'Controller.php';

        if (file_exists($fileLoad)) {
            self::$ok=true;
            require $fileLoad;
        }
        else
            foreach($this->modules as $item1){
                $fileModule = 'app/modules/'.$item1.'/controllers/' . $url[0] . 'Controller.php';
                if(file_exists($fileModule))
                {
                    self::$useModule=$item1;
                    self::$ok=true;
                    require $fileModule;
                    break;
                }
            }
    }

    public function getConfig(){
        $this->_config = require 'config.php';
        $this->modules=$this->_config['Modules'];
        self::$db=$this->_config['DB'];
        return $this->_config;
    }

    public function getUrl(){
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        return $url;
    }

    public static function info(){
        $info['modulelist']=self::$listModule;
        $info['usemodule']=self::$useModule;
        $info['usecontroller']=self::$useController;
        $info['usemethod']=self::$useMethod;
        return $info;
    }

    function error($error,$type) {
        require 'app/controllers/errorController.php';
        $controller = new Error();
        $controller->index($error,$type);
        return false;
    }

}
?>