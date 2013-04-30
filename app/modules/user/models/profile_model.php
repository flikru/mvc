<?php
class Profile_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }


   /* public function getData(){
        if($_SESSION['loggedIn']==true){
            $login = $_SESSION['login'];
            $data=$this->db->select('users','id,login,role,avatar,name,family,message',"login='".$login."'",'fetch');
            $data['message']=explode('||',$data['message']);
            return $data;
        }
    }     */
    public function getData($id){
        if($_SESSION['loggedIn']==true){

            $data=$this->db->select('users','id,login,role,avatar,name,family,message',"id='".$id."'",'fetch');
            $data['message']=explode('||',$data['message']);
            return $data;
        }
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

        $sql=$this->db->select('users','id,message',"id='".$id."'",'fetch');
            $message='';
        $msg=explode('||',$sql['message']);
            foreach($msg as $value)
                if($value!='')
                $message=$message.$value."||";
        $message=$message.$_POST['msg'].'||';
        $this->db->update('users',array('message'=>$message), "id = ".$id);
        if($id==Session::get('id'))
            header('location:'.URL.'profile');
        else
        header('location:'.URL.'profileID/show/'.$id);
    }

}
?>