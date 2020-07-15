<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File extends CI_Controller {

	function __construct()
	{
	parent::__construct();
	//load Helper for Form
	$this->load->helper('url', 'form');	
	$this->load->library('form_validation');
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


	public function upload() 
	{
		$this->load->helper("file");
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
			$this->session->set_userdata('file','"files/'.$new_name.'.pdf"');
			$this->load->model('File_Model');
			$r=$this->File_Model->get_access();
			$r1= '<embed src="http://localhost/fms/files/'.$new_name.'.pdf" width="500" height="375" 
			type="application/pdf">';
			$r1.=$r;
			echo $r1;
        }
    }

	public function addFile()
	{
		
	}




}