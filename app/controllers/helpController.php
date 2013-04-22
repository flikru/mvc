<?php
class Help extends Controller{

     function __construct(){
         parent::__construct();
     }

   function index(){
        $this->render('/help/index');
   }
    public function other($arg = false){


        require 'app/models/help_model.php';
        $model = new Help_Model();

    }

}