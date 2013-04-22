<?php

    class Error extends Controller{
        function __construct(){
            parent::__construct();
        }
        function index($error,$type){
            switch($type){
                case 'controller': $this->msg='Контроллер <b>\'' .$error. '\'</b> не существует!';
                case 'method': $this->msg='Метод <b>\'' .$error. '\'</b> не существует!';
            }
            $this->render('error/index');
        }

    }

?>