<?php
class Profile_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function run()
    {
        $login=$_POST['login'];
        $password = md5($_POST['password']);
        $data=$this->db->select('users','id,login,role,avatar','login=\''.$login.'\' AND password = \''.$password.'\'','fetch');

        $count =  count($data);
        if ($count > 0) {
            // login
            Session::init();

            Session::set('role', $data['role']);

            Session::set('loggedIn', true);
            header('location: ../dashboard');
        } else {
            header('location: ../login');
        }

    }

    public function addAvatar(){
        Session::init();
        $upload= new Upload('upload/');
        $imgname=$upload->uploads($_FILES['avatarAdd']);
        $login='\''.$_SESSION['login'].'\'';
        $this->db->update('users',array('avatar'=>$imgname), "login = ".$login);

        Session::set('imgname',$imgname);

        header('location: ../profile');
    }

}
?>