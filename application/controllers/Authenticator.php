<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('GoogleAuthenticator.php');

class Authenticator extends CI_Controller {

    public function index()
	{
        if($this->session->userdata('isa')==""){
        redirect("Welcome/index");
        }
        else{
            $ga = new GoogleAuthenticator();

            $user=$this->session->userdata('USER');
            $secret=$this->session->userdata('SECU');
            $this->session->set_userdata('secr',$secret);
            
            $qrCodeUrl 	= $ga->getQRCodeGoogleUrl($user, $secret,'fms.allduniv.ac.in');
            $this->session->set_userdata('bcode',$qrCodeUrl);
		$this->load->view('two_factor');
        }
    }
    public function panel()
    {
        if($this->session->userdata('USER')!=null)
        $this->load->view('panel');
        else
        redirect("Welcome/index");

    }
    public function check()
    {
		$this->form_validation->set_rules("password","Password","required|min_length[6]|max_length[6]");
		if($this->form_validation->run())
		{
            $ga = new GoogleAuthenticator();
            $user="kumarrahul.allduniv@gmail.com";
            $secret=$this->session->userdata('secr');
            $key=$this->input->post('password');
            $checkResult = $ga->verifyCode($secret, $key, 2000);
            if($checkResult)
            {
                if($this->session->userdata('isa')->isAdmin==1)
                $this->load->view('panel');
                else
                {
                    $this->load->view('upanel');  
                }
            }
            else{
                echo "<script>alert('Invalid Code Provided.')</script>";
                $this->index();

            }
		}
		else{
			$this->index();
		}
		
    }
}