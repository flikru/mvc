<?php

class Register extends Controller {

	function __construct() {
		parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        if ($logged == true) {
            header('location: '.URL.'index');
            exit;
        }
	}
	
	function index(){
		$this->render('register/index');
	}

    function add(){
       if(!empty($_POST))
       $this->model->run();
        else
       header('location: ../register');
    }

}
?>