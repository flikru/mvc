<?php

class Login extends Controller {

	function __construct() {
		parent::__construct();	
	}
	
	function index(){
        $this->render('login/index');
	}
	
	function run(){
        if(!empty($_POST['login']) and !empty($_POST['password'])){
            if($this->model->run()==true)
            header('location: ../dashboard');
                else
            header('location: ../login');
        }
        else header('location: ../login');
	}
	

}
?>