<?php
class Profile_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function run()
    {

    }

    public function getData(){
        if($_SESSION['loggedIn']==true){
            $login = $_SESSION['login'];
            return $this->db->select('users','id,login,role,avatar,name,family','login=\''.$login.'\'','fetch');
        }
    }

    public function addAvatar(){
        $upload= new Upload('upload/');
        $imgname=$upload->uploads($_FILES['avatarAdd']);
        $login='\''.$_SESSION['login'].'\'';
        $this->db->update('users',array('avatar'=>$imgname), "login = ".$login);

    }
    public function editData(){
        $name=$_POST['name'];
        $family=$_POST['family'];
        $login='\''.$_SESSION['login'].'\'';
        $this->db->update('users',array('name'=>$name,'family'=>$family), "login = ".$login);

    }

}
?>