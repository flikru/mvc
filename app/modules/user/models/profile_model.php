<?php
class Profile_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }


    public function getData($id){
        if($_SESSION['loggedIn']==true){

            $data=$this->db->select('users','id,login,role,avatar,name,family',"id='".$id."'",'fetch');
            return $data;
        }
    }

    public function getMsg($id){
        $data=$this->db->select('message','id,id_who,id_whom,text,date','id_whom="'.$id.'"');
        return $data;
    }

    public function addAvatar(){
        $upload= new Upload('upload/');
        $imgname=$upload->uploads($_FILES['avatarAdd']);
        $login="'".$_SESSION['login']."'";
        $this->db->update('users',array('avatar'=>$imgname), "login = ".$login);

    }
    public function editData(){
        $name=$_POST['name'];
        $family=$_POST['family'];
        $login="'".$_SESSION['login']."'";
        $this->db->update('users',array('name'=>$name,'family'=>$family), "login = ".$login);

    }


    public function addMessage($id){
        $this->db->insert('message',array('id_who'=>Session::get('id'),'id_whom'=>$id,'text'=>$_POST['msg'],'date'=>date( 'Y-m-d h:i:s', time() )));

        if($id==Session::get('id'))
            header('location:'.URL.'profile');
        else
            header('location:'.URL.'profile/show/'.$id);
    }
}
?>