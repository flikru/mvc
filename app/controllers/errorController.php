<?php

    class Error extends Controller{
        function __construct(){
            parent::__construct();
        }
        function index(){
            $this->msg='This page doesnt exist';
            $this->render('error/index');
        }

    }

?>