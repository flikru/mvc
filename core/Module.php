<?php
class Module{
 /*
    public function __construct(){
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);
    }


    public static $module;

    public function __construct()
    {

    }

    public function loadController($controller)
    {
        $path = 'app/modules/' . self::$module . '/controllers/' . $controller . 'Controller.php';
        if (file_exists($path)){
            require $path;
            $controllerName = $controller . 'Controller';
            $this->controller = new $controllerName;
        }
    }

    public static function loadModule($module_name)
    {
        $module_path = 'app/modules/' . $module_name . '/' . $module_name . 'Module.php';
        if (file_exists($module_path))
        {
            require $module_path;
            self::$module = $module_name;
            $moduleName = $module_name . 'Module';
            $module = new $moduleName;
        }
    }


    public function getURL()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        $this->url = $url;
    }
    */
}
?>