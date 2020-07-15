<?php
class File_Model extends CI_Model
{
    function get_access()
    {
        $this->load->library('session');
        $q=$this->db->select("*")
        ->where('frole',$this->session->userdata('ROLE'))
        ->where('fdepartment',$this->session->userdata('DEPARTMENT'))
        ->get('access');
        $out='';
        foreach($q->result() as $row)
        {
            $q1=$this->db->select("*")
        ->where('role',$row->trole)
        ->where('department',$row->tdepartment)
        ->get('users'); 
        foreach($q1->result() as $row1)
        {
                $out.='</br><input type="radio" id="'.$row1->EMAIL.'" value="'.$row1->EMAIL.'" name="spdf"> <label for="'.$row1->EMAIL.'">'."ROLE-".$row1->ROLE."   DEP-".$row1->DEPARTMENT."     NAME-".$row1->NAME.'</label>';
        }


        }
        return $out;

    }
}