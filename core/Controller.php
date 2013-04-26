<?php
class Controller{

    function __construct(){

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

    public function render($name,$data=null,$noInclude = false)
    {

        if($noInclude == true){
            require 'app/views/'.$name.'.php';
        }  else
        {
            require 'views/header.php';
            if(Bootstrap::$useModule==null or $name=='error/index')
                require 'app/views/'.$name.'.php';
            else
                require 'app/modules/'.Bootstrap::$useModule.'/views/'.$name.'.php';

            require 'views/footer.php';
        }
    }
}
?>