<?php
class User_Model extends CI_Model
{
     function get_dep()
    {
        $query = $this->db->query("SELECT * FROM Department ");
        return $query->result();
    }

    function get_role()
    {
        $query = $this->db->query("SELECT * FROM Roles ");
        return $query->result();
    }

    function get_user()
    {
        $query = $this->db->query("SELECT * FROM Users ");
        return $query->result();
    }

    function get_decuser()
    {
        $query = $this->db->query("SELECT * FROM Users WHERE Status='0'");
        return $query->result();
    }

    function get_actuser()
    {
        $query = $this->db->query("SELECT * FROM Users WHERE Status='1'");
        return $query->result();
    }

    function getUdetail($uid)
    {
        $query = $this->db->query("SELECT * FROM Users WHERE ID='$uid' ");
        return $query->result();
    }

    function updateUser($data)
    {
        $this->db->where('id', $this->session->userdata('uid'));
if($this->db->update('Users', $data))
return 1;
else 
return 0;
    }

    public function act($uid)
    {
        $data=array(
            "Status"=>"1"
        );
        $this->db->where('id', $uid);
        if($this->db->update('Users', $data))
        return 1;
        else 
        return 0;
    }
public function AddDepart($data)
{
    if($this->db->insert('department',$data))
    return 1;
    else
    return 0;
}


public function AddRol($data)
{
    if($this->db->insert('roles',$data))
    return 1;
    else
    return 0;
}

    public function dct($uid)
    {
        $data=array(
            "Status"=>"0"
        );
        $this->db->where('id', $uid);
        if($this->db->update('Users', $data))
        return 1;
        else 
        return 0;
    }
    function add($data)
    {
        if($this->db->insert('Users',$data))
        return 1;
        else
        return 0;
    }
}
?>