<?php
class Help extends Controller{

     function __construct(){
         parent::__construct();
     }

   function index(){
        $this->view->render('views/help/index');
   }
    public function other($arg = false){


        require 'app/models/help_model.php';
        $model = new Help_Model();
        $this->view->blah = $model->blah();

    }

}