<?php
class Login_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function run()
    {
        $count=0;
        $login=$_POST['login'];
        $password = md5($_POST['password']);

        $data=$this->db->select('users','id,login,avatar,role','login=\''.$login.'\' AND password = \''.$password.'\'','fetch');
        if ($data !=false) {
            // login
            Session::init();
            Session::set('login',$data['login']);
            Session::set('imgname',$data['avatar']);
            Session::set('role', $data['role']);
            Session::set('loggedIn', true);
            header('location: ../dashboard');
        } else {
            header('location: ../login');
        }

    }

}
?>