<?php
class Controller{
    function __construct(){
        $this->view = new View();
    }

    public function loadModel($name){

        if(Bootstrap::$useModule==null)
        $pathL = 'app/models/'.$name.'_model.php';
        else
        $pathL = 'app/modules/'.Bootstrap::$useModule.'/models/'.$name.'_model.php';
        if(file_exists($pathL)){
            require $pathL;
            $modelName=$name.'_Model';
            $this->model = new $modelName;
        }

    }
}
?>