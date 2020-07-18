<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File extends CI_Controller {

	function __construct()
	{
	parent::__construct();
	if($this->session->userdata('USER')==null)
	redirect('/');
	}
    public function index()
	{
		
		$this->load->view('upanel');
		//$this->login();
	}


	public function newfile()
	{
		
		$this->load->view('addFile');
		//$this->login();
	}

	public function chngpass()
	{
		$this->form_validation->set_rules("pass","Password","required|min_length[8]|max_length[8]");
		if($this->form_validation->run())
		{
				if($this->File_Model->changePass()){
					$this->session->set_flashdata('Password Changed Successfully.');
				}
				else{
					$this->session->set_flashdata('Something Went Wrong Try Again.');
				}
			}
		else
		{
			$this->load->view('changePass');
		}
	}


	public function upload() 
	{
		//if($this->session->userdata('file')!=null)
		//unlink($this->session->userdata('file'));
        $config['upload_path'] = 'files/';
        $config['allowed_types'] = 'pdf';
		$config['max_size'] = 200000;
		$new_name = time()."";
		$config['file_name'] = $new_name;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

        if (!$this->upload->do_upload('ufile')) 
		{
            $error = array('error' => $this->upload->display_errors());

			$this->load->view('addFile', $error);
			print_r($error);
        } 
		else 
		{
			$this->session->set_userdata('file',$new_name);
			$r=$this->File_Model->get_access();
			$r1= '<embed src="https://filetracking.velomia.tech//files/'.$new_name.'.pdf" width="500" height="375" 
			type="application/pdf">';
			$r1.=$r;
			echo $r1;
        }
    }

	public function addFile()
	{
		
		$this->form_validation->set_rules("title","File Title","required");
		$this->form_validation->set_rules("desc","File Description","required");
		$this->form_validation->set_rules('fward','Forward To','required');
		//$this->form_validation->set_rules("ufile","PDF File","required");
		if($this->form_validation->run())
		{
				if($this->File_Model->forward_file()){
					$this->session->set_flashdata('File Added Successfully.');
				}
				else{
					$this->session->set_flashdata('Something Went Wrong Try Again.');
				}
			}
		else
		{
			$this->load->view('addFile');
		}
	}


	public function cpass()
	{
		$this->load->view('changePass');
	}


	public function tfile()
	{
		$data['sfile']=$this->File_Model->get_tfile();
		$this->load->view('showTrack',$data);
	}

	public function vfile()
	{
		$data['sfile']=$this->File_Model->get_tfile();
		$this->load->view('showView',$data);
	}

	public function addedFile()
	{
			$data['sfile']=$this->File_Model->get_added();
			$this->load->view('addedFiles',$data);
	}


public function get_addedFiles()
{
	echo $this->File_Model->get_addedFile();
}

public function get_Forward()
{
	$out= $this->File_Model->get_access();
	$out.='<button type="submit" class="btn btn-outline-lime">Forward File</button>';
	echo $out;
}

public function forwardComp()
{
	$this->form_validation->set_rules("desc","File Description","required");
	$this->form_validation->set_rules("fward","File Forwarding To","required");
	if($this->form_validation->run())
	{
			if($this->File_Model->forwardComp_file()){
				$this->session->set_flashdata('File Forwarded Successfully.');
			}
			else{
				$this->session->set_flashdata('Something Went Wrong Try Again.');
			}
		}
	else
	{
		$this->load->view('receivedFiles');
	}
}


public function get_Revert()
{
	$desc=$this->input->post('desc');
	if($desc!=null)
	{
			if($this->File_Model->revert_file()==1){
			echo '<p class="text-success">File Reverted Successfully.</p>';
			$this->load->view('receivedFiles');
			}
			else{
			echo '<p class="text-danger">Some Error Occured..</p>';
			$this->load->view('receivedFiles');
			}
		}
	else
	{
		$this->load->view('receivedFiles');
	}
	
}

public function get_trackFile()
{
	echo $this->File_Model->get_track();
}



public function receivedFiles()
{
			$data['sfile']=$this->File_Model->get_received();
			$this->load->view('receivedFiles',$data);
}

}