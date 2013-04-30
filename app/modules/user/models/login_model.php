<?php
class Login_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function run()
    {
        $login=$_POST['login'];
        $password = md5($_POST['password']);

        $data=$this->db->select('users','id,login,avatar,role',"login='".$login."' AND password = '".$password."'",'fetch');

        if ($data !=false) {
            // login
            Session::init();
            Session::set('id',$data['id']);
            Session::set('login',$data['login']);
            Session::set('role', $data['role']);
            Session::set('loggedIn', true);
            return true;

        } else {
            return false;
        }

    }


}
?>