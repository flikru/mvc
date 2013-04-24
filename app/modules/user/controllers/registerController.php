<?php

class Register extends Controller {

	function __construct() {
		parent::__construct();	
	}
	
	function index(){
		$this->render('register/index');
	}

    function add(){
       $this->model->run();
    }

}
?>