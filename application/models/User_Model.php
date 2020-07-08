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

    function addac($user,$dep,$role)
    {
        $q=$this->db->select("*")
        ->where('user', $user)
        ->where('department', $dep)
        ->where('role', $role)
        ->get('access');
        if($q->num_rows()==1){
            return -1;
        }
        else{
            $data=array(
                "user"=>$user,
                "department"=>$dep,
                "role"=>$role
            );
            if($this->db->insert('access',$data))
            return 1;
            else
            return 0;
        }
        
    }


function get_adep($user){
    $q=$this->db->select("department")
        ->where('user', $user)
        ->get('access');
        $out='<option value=""></option>';
        foreach($q->result() as $row)
        {
            $out.='<option value="'.$row->department.'">'.$row->department.'</option>';
        }
        return $out;

}

function remac($user,$dep,$role)
{
    $this->db->where('user', $user);
    $this->db->where('department', $dep);
    $this->db->where('role', $role);
if($this->db->delete('access'))
return 1;
else
return 0;
//DELETE FROM employee_master WHERE emp_ID = $id
}

function get_arole($user,$dep){
    $q=$this->db->select("role")
        ->where('user', $user)
        ->where('department', $dep)
        ->get('access');
        $out='<option value=""></option>';
        foreach($q->result() as $row)
        {
            $out.='<option value="'.$row->role.'">'.$row->role.'</option>';
        }
        return $out;

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