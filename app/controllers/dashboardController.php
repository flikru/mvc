<?php

class Dashboard extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        if ($logged == false) {
            Session::destroy();
            header('location: ../login');
            exit;
        }

        $this->js = array('dashboard/js/default.js');
    }

        function index(){
            $this->render('dashboard/index');
        }

    function logout(){
        Session::destroy();
        header('location: ' . URL .  'login');
        exit;
    }


        function xhrInsert(){
            $this->model->xhrInsert();
        }

    function xhrGetListings(){
        $this->model->xhrGetListings();
    }

        function xhrDeleteListing(){
            $this->model->xhrDeleteListing();
        }

}
?>