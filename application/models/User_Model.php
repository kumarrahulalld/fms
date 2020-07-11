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

    function addac($dep,$role,$tdep,$trole)
    {
        $q=$this->db->select("*")
        ->where('fdepartment', $dep)
        ->where('frole', $role)
        ->where('tdepartment', $tdep)
        ->where('trole', $trole)
        ->get('access');
        if($q->num_rows()==1){
            return -1;
        }
        else{
            $data=array(
                "fdepartment"=>$dep,
                "frole"=>$role,
                "tdepartment"=>$tdep,
                "trole"=>$trole
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

function remac($dep,$role,$tdep,$trole)
{
    $this->db->where('fdepartment', $dep);
    $this->db->where('frole', $role);
    $this->db->where('tdepartment', $tdep);
    $this->db->where('trole', $trole);
if($this->db->delete('access'))
return 1;
else
return 0;
//DELETE FROM employee_master WHERE emp_ID = $id
}

function get_arole($dep){
    $q=$this->db->select("frole")
        ->where('fdepartment', $dep)
        ->get('access');
        $out='<option value="" disabled>Select Role</option>';
        foreach($q->result() as $row)
        {
            $out.='<option value="'.$row->frole.'">'.$row->frole.'</option>';
        }
        return $out;

}


function get_tdep($dep,$role){
    $q=$this->db->select("tdepartment")
        ->where('fdepartment', $dep)
        ->where('frole', $role)
        ->get('access');
        $out='<option value="" disabled>Select To Department</option>';
        foreach($q->result() as $row)
        {
            $out.='<option value="'.$row->tdepartment.'">'.$row->tdepartment.'</option>';
        }
        return $out;

}


function get_trole($dep,$role,$tdep){
    $q=$this->db->select("trole")
        ->where('fdepartment', $dep)
        ->where('frole', $role)
        ->where('tdepartment', $tdep)
        ->get('access');
        $out='<option value="" disabled>Select To Role</option>';
        foreach($q->result() as $row)
        {
            $out.='<option value="'.$row->trole.'">'.$row->trole.'</option>';
        }
        return $out;

}


function get_addrole($dep){
    $q=$this->db->select("*")
        ->where('Department', $dep)
        ->get('roles');
        $out='<option value="" disabled>Select Role</option>';
        foreach($q->result() as $row)
        {
            $out.='<option value="'.$row->Role.'">'.$row->Role.'</option>';
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



function get_showaccess($dep,$role)
{

    if($roles==="all")
    {
        $q=$this->db->select("*")
        ->where('fdepartment',$dep)
        ->get('access');
    }
    else{
$q=$this->db->select("*")
->where('fdepartment',$dep)
->where('frole',$role)
->get('access');
    }
    $out='  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">From Department</th>
      <th scope="col">From Role</th>
      <th scope="col">To Department</th>
      <th scope="col">To Role</th>
    </tr>
  </thead> <tbody>';
    foreach($q->result() as $row)
    {
        $out.='<tr>
        <th>"'.$row->ID.'"</th>
        <th>"'.$row->fdepartment.'"</th>
        <th>"'.$row->frole.'"</th>
        <th>"'.$row->tdepartment.'"</th>
        <th>"'.$row->trole.'"</th>
      </tr>';
    }
    $out.='</tbody>';
    return $out;

}




function get_showrole($role,$dep)
{

    if($role==="all")
    {
        $q=$this->db->select("*")
        ->where('department',$dep)
        ->get('roles');
    }
    else{
$q=$this->db->select("*")
->where('role',$role)
->where('department',$dep)
->get('roles');
    }
    $out='  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Department</th>
      <th scope="col">Role</th>
    </tr>
  </thead> <tbody>';
    foreach($q->result() as $row)
    {
        $out.='<tr>
        <th>"'.$row->ID.'"</th>
        <th>"'.$row->Department.'"</th>
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


public function AddRol($data,$dep,$role)
{


    $q=$this->db->select("*")
        ->where('Role', $role)
        ->where('Department', $dep)
        ->get('roles');
        if($q->num_rows()>0){
            return -1;
        }
else{
    if($this->db->insert('roles',$data))
    return 1;
    else
    return 0;
}
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