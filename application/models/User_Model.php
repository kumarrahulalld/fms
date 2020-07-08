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
function get_showuser($user)
{

    if($user==="all")
    {
        $q=$this->db->select("*")
        ->get('users');
    }
    else{
$q=$this->db->select("*")
->where('ID',$user)
->get('users');
    }
    $out='  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Department</th>
      <th scope="col">Role</th>
      <th scope="col">Active</th>
    </tr>
  </thead> <tbody>';
    foreach($q->result() as $row)
    {
        $out.='<tr>
        <th>"'.$row->ID.'"</th>
        <th>"'.$row->NAME.'"</th>
        <th>"'.$row->EMAIL.'"</th>
        <th>"'.$row->PHONE.'"</th>
        <th>"'.$row->DEPARTMENT.'"</th>
        <th>"'.$row->ROLE.'"</th>
        <th>"'.$row->Status.'"</th>
      </tr>';
    }
    $out.='</tbody>';
    return $out;

}



function get_showaccess($user)
{

    if($user==="all")
    {
        $q=$this->db->select("*")
        ->get('access');
    }
    else{
$q=$this->db->select("*")
->where('user',$user)
->get('access');
    }
    $out='  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">User</th>
      <th scope="col">Department</th>
      <th scope="col">Role</th>
    </tr>
  </thead> <tbody>';
    foreach($q->result() as $row)
    {
        $out.='<tr>
        <th>"'.$row->ID.'"</th>
        <th>"'.$row->user.'"</th>
        <th>"'.$row->department.'"</th>
        <th>"'.$row->role.'"</th>
      </tr>';
    }
    $out.='</tbody>';
    return $out;

}




function get_showrole($user)
{

    if($user==="all")
    {
        $q=$this->db->select("*")
        ->get('roles');
    }
    else{
$q=$this->db->select("*")
->where('ID',$user)
->get('roles');
    }
    $out='  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Role</th>
    </tr>
  </thead> <tbody>';
    foreach($q->result() as $row)
    {
        $out.='<tr>
        <th>"'.$row->ID.'"</th>
        <th>"'.$row->Role.'"</th>
      </tr>';
    }
    $out.='</tbody>';
    return $out;

}




function get_showdep($dep)
{

    if($dep==="all")
    {
        $q=$this->db->select("*")
        ->get('department');
    }
    else{
$q=$this->db->select("*")
->where('ID',$dep)
->get('department');
    }
    $out='  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
    </tr>
  </thead> <tbody>';
    foreach($q->result() as $row)
    {
        $out.='<tr>
        <th>"'.$row->ID.'"</th>
        <th>"'.$row->Department.'"</th>
      </tr>';
    }
    $out.='</tbody>';
    return $out;

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