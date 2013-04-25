<?php

class Profile extends Controller {

	function __construct() {
		parent::__construct();	
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