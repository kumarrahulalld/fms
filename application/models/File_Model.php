<?php
class File_Model extends CI_Model
{
    function get_access()
    {
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
        ->where('Status',1)
        ->get('users'); 
        foreach($q1->result() as $row1)
        {
                $out.='</br><input type="radio" id="'.$row1->EMAIL.'" value="'.$row1->EMAIL.'" name="fward"> <label for="'.$row1->EMAIL.'">'."ROLE-".$row1->ROLE."   DEP-".$row1->DEPARTMENT."     NAME-".$row1->NAME.'</label>';
        }


        }
        
        return $out;

    }


    function forward_file()
    {
        $data=array("file_id"=>$this->session->userdata('file')
        , "file_title"=>$this->input->post('title')
        , "file_desc"=>$this->input->post('desc')
        , "file_adder"=>$this->session->userdata('USER')
        , "file_from"=>$this->session->userdata('USER')
        , "file_to"=>$this->input->post('fward')
        , "file_completed"=>0
        
    );

    if($this->db->insert('files',$data))
    {
        date_default_timezone_set('Asia/Kolkata');
$now = date('Y-m-d H:i:s');
        $dta=array(
            "user"=>$this->session->userdata('USER')
            , "file_id"=>$this->session->userdata('file')
            ,"operation"=>0
            , "description"=>$this->input->post('desc')
            ,"tstamp"=>$now
        );

        if($this->db->insert('track',$dta))
        return 1;
        else
        return 0;
    }
    else
    return 0;
    }


    function revert_file()
    {

        $q=$this->db->select("*")
        ->where('file_id',$this->input->post('sfiles'))
        ->get('files');
        $rs=$q->result();
        print_r($rs);
        $data=array(
            "file_from"=>$this->session->userdata('USER')
            ,"file_to"=>$rs[0]->file_from
    );
        if($this->db->where('file_id',$this->input->post('sfiles'))->update('files',$data))
        {
            date_default_timezone_set('Asia/Kolkata');
            $now = date('Y-m-d H:i:s');
        $dta=array(
            "user"=>$this->session->userdata('USER')
            , "file_id"=>$this->input->post('sfiles')
            ,"operation"=>2
            , "description"=>$this->input->post('desc')
            ,"tstamp"=>$now
        );
        if($this->db->insert('track',$dta))
        return 1;
        else
        return 0;
        }
        else
        return 0;
    }


    function forwardComp_file()
    {
        $data=array(
            "file_from"=>$this->session->userdata('USER')
            ,"file_to"=>$this->input->post('fward')
    );
        if($this->db->where('file_id',$this->input->post('sfiles'))->update('files',$data))
        {
            date_default_timezone_set('Asia/Kolkata');
            $now = date('Y-m-d H:i:s');
        $dta=array(
            "user"=>$this->session->userdata('USER')
            , "file_id"=>$this->input->post('sfiles')
            ,"operation"=>1
            , "description"=>$this->input->post('desc')
            ,"tstamp"=>$now
        );
        if($this->db->insert('track',$dta))
        return 1;
        else
        return 0;
        }
        else
        return 0;
    }



    function get_added()
    {
        $q=$this->db->select("*")
        ->where('file_adder',$this->session->userdata('USER'))
        ->get('files');
        //print_r($q->result());
        return $q->result();
    }


    function get_received()
    {
        $q=$this->db->select("*")
        ->where('file_to',$this->session->userdata('USER'))
        ->get('files');
        //print_r($q->result());
        return $q->result();
    }
    function get_addedFile()
    {
        $q=$this->db->select("*")
        ->where('file_id',$this->input->post('sfiles'))
        ->get('files');
        $res='<table class="table table-hover" > <thead> <tr> <td>File ID</td> <td>File Title</td> <td>File Description</td> <td>File Forwarded To</td></tr> </thead> <tbody>';
        foreach($q->result() as $row )
        {
                $res.='<tr> <td>"'.$row->file_id.'"</td> <td>"'.$row->file_title.'"</td> <td>"'.$row->file_desc.'"</td> <td>"'.$row->file_to.'"</td> </tr>';
        }
        $res.='</tbody></table><embed src="https://filetracking.velomia.tech//files/'.$row->file_id.'.pdf" width="500" height="375" 
        type="application/pdf">';
        return $res;
    }


    function get_tfile()
    {
        $q=$this->db->select("*")
        ->get('files');
        $out='<option value=""></option>';
        foreach($q->result() as $row)
        {
            $out.='<option value="'.$row->file_id.'">'.$row->file_title.'</option>';
        }
        return $out;
    }

    function changePass()
    {
        $data=array("PASSWORD"=>$this->input->post('pass'));
        if($this->db->where('EMAIL',$this->session->userdata('USER'))->update('users',$data))
        return 1;
        else
        return 0;
    }
    function get_track()
    {
        $q=$this->db->select("*")
        ->where('file_id',$this->input->post('sfiles'))
        ->get('track');
        $res='<div class="row align-items-center">
        <div class="col-md-12">
          <ul class="stepper stepper-vertical">';
        foreach($q->result() as $row )
        {
            $op='';
            if($row->operation==0)
            $op="Created File";
            else if($row->operation==1)
            $op="Forwarded File";
            else
            $op="Reverted File";
                $res.='<li class="completed">
                <a href="#!">
                  <span class="circle"><i class="fa fa-check-circle"></i></span>
                  <span class="label">User '.$row->user.'</span>
                  <span class="label">Opeartion  '.$op.'</span>
                  <span class="label"> Description '.$row->description.'</span>
                  <span class="label"> On '.$row->tstamp.'</span>
                </a>
              </li>';
        }
        $res.='</ul>
      </div>
    </div>';
        return $res;
    }
}