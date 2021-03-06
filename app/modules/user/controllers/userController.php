<?php

class User extends Controller {

	public function __construct() {
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');
		$role = Session::get('role');
		
		//if ($logged == false || $role != 'owner') {
        if ($logged == false) {
			Session::destroy();
			header('location: ../login');
			exit;
		}
			
	}
	
	public function index(){
		$this->userList = $this->model->userList();
		$this->render('user/index');
	}
	
	public function create(){
		$data = array();
		$data['login'] = $_POST['login'];
		$data['password'] = md5($_POST['password']);
		$data['role'] = $_POST['role'];
            $this->model->create($data);
            header('location: ' . URL . 'user');
	}
	
	public function edit($id) 
	{
		$this->user = $this->model->userSingleList($id);
		$this->render('user/edit');
	}
	
	public function editSave($id)
	{
		$data = array();
		$data['id'] = $id;
		$data['login'] = $_POST['login'];
		$data['password'] = md5($_POST['password']);
		$data['role'] = $_POST['role'];
		$this->model->editSave($data);
		header('location: ' . URL . 'user');
	}
	
	public function delete($id)
	{
		$this->model->delete($id);
		header('location: ' . URL . 'user');
	}
}