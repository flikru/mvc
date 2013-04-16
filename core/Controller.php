<?php
class Controller{
    function __construct(){
        $this->view = new View();
    }

    public function loadModel($name){
        $pathL = 'app/models/'.$name.'_model.php';
        $pathM = 'app/modules/'.$name.'/models/'.$name.'_model.php';
        if(file_exists($pathL)){
            require $pathL;
            $modelName=$name.'_Model';
            $this->model = new $modelName;
        }
        else if(file_exists($pathM))
        {
            require $pathM;
            $modelName=$name.'_Model';
            $this->model = new $modelName;
        }
    }
}
?>