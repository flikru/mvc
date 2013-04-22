<?php

class Login extends Controller {

	function __construct() {
		parent::__construct();	
	}
	
	function index(){
		$this->render('login/index');
	}
	
	function run(){
		$this->model->run();
	}
	

}
?>