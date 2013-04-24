<?php
class User_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function userList()
    {
        return $this->db->select('users','id,login,role');
    }

    public function userSingleList($id)
    {
        return $this->db->select('users','id,login,role','id='.$id,'fetch');
    }

    public function create($data)
    {
        $this->db->insert('users', array(
            'login' => $data['login'],
            'password' => $data['password'],
            'role' => $data['role']
        ));
    }

    public function editSave($data)
    {
        $postData = array(
            'login' => $data['login'],
            'password' => md5($data['password']),
            'role' => $data['role']
        );

        $this->db->update('users', $postData, "`id` = {$data['id']}");
    }

    public function delete($id)
    {
        $this->db->delete('users','id='.$id);
    }
}
?>