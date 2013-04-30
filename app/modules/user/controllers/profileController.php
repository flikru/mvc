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
        $data=$this->model->getData($_SESSION['id']);
		$this->render('profile/index',$data);
	}
	
	function run(){
		$this->model->run();
	}

    function addAvatar()
    {
        if(isset($_FILES['avatarAdd']))
        if(!empty($_FILES['avatarAdd']['name'])){
            $this->model->addAvatar();
            header('location: ../profile');
        }  else header('location: '.URL.'profile');
    }

    public function editData(){
        $this->model->editData();
        header('location: ../profile');
    }

    public function addMessage($id){
        $this->model->addMessage($id);
    }

    function show($id){
        $data=$this->model->getData($id);
        $this->render('profile/indexID',$data);
    }



}
?>