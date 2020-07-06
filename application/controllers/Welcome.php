<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function index()
	{
		
		$this->load->view('welcome_message');
		//$this->login();
	}

		
		public function invalid()
		{
			echo "Check Credentials Again";
		}
	public function login()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules("email","Email","required|valid_email");
		$this->form_validation->set_rules("password","Password","required|min_length[8]|max_length[8]");
		if($this->form_validation->run())
		{
			$this->load->model('check_login');
			$data=array(
				"email"=>$this->input->post("email"),
				"password"=>$this->input->post("password")
			);
			$id=$this->check_login->check($data);
			if($id!=null){
				$this->load->library('session');
				$this->session->set_userdata('ROLE', $id->ROLE);
				$this->session->set_userdata('USER', $id->EMAIL);
				$this->session->set_userdata('SECU', $id->gauthkey);
				if($id->ROLE==2)
				redirect('Authenticator/index');
				else
				print_r($id);

			

			}
			else{
				redirect("Welcome/invalid");

			}
		}
		else{
			$this->index();
		}
		

	}
}
