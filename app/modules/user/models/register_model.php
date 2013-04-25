<?php
class Register_model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function register($data)
    {
        $this->db->insert('users', array('login' => $data['login'],'password' => md5($data['password']),'avatar'=>'default.jpg'));
    }
    public function run()
    {
                $result = $this->rightData($_POST);
                if($result==true){
                    $this->register($_POST);
                    Session::init();
                    Session::set('login',$_POST['login']);
                    Session::set('role','default');
                    Session::set('loggedIn',true);
                    header('location: ../profile');
                }
                    else
                {
                    header('location: ../register');
                }
    }

    public function DuplicateDate($login)
    {
        $result=$this->db->select('users','login ','login = \''.$login.'\'');
        if(count($result)==0){
             return true;
        }else false;
    }

    public function rightData($data){
        $result = $this->DuplicateDate($data['login']);
        if($result==true)
        foreach($data as $value)
        {
            echo $value;
                if(!empty($value) and Validator::Validate(array($value,'minLength:4','maxLength:10'))==true);

            else
                return false;
        }
       else return false;

       return true;
    }

}
?>