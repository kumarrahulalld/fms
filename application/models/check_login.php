<?php
class check_login extends CI_Model
{
     function check($data)
    {
        $q=$this->db->select("*")
                ->where('EMAIL',$data['email'])
                ->where('PASSWORD',$data['password'])
                ->get('Users');
        if($q->num_rows()==1){
            return $q->row();
        }
        else return null;
    }
}
?>