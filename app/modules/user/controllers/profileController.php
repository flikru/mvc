<?php

class Profile extends Controller {

	function __construct() {
		parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        if ($logged == false) {
            Session::destroy();
            header('location: '.URL.'login');
            exit;
	}
    }
	
	function index(){
		$this->render('profile/index');
	}
	
	function run(){
		$this->model->run();
	}

    function addAvatar()
    {
        if(isset($_FILES['avatarAdd'])){
            $this->model->addAvatar();
        }
    }
	

}
?>