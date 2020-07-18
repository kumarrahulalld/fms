<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('GoogleAuthenticator.php');
class User extends CI_Controller {
    function __construct()
	{
	parent::__construct();
	if($this->session->userdata('USER')==null)
	redirect('/');
	}
    public function index()
	{
        
        
        $data['dep'] = $this->User_Model->get_dep();
        $this->load->view('addUser',$data);
      
		//$this->login();
    }


    public function logout()
    {
        $this->session->unset_userdata('USER');
        $this->session->sess_destroy();
        redirect('/');
    }

public function select()
{
    
        $data['user'] = $this->User_Model->get_user();
        $this->load->view('selectUser',$data);
}

public function addacc()
{
    
        $data['user'] = $this->User_Model->get_user();
        $data['dep'] = $this->User_Model->get_dep();
        $data['role'] = $this->User_Model->get_role();
        $this->load->view('addaccess',$data);
}

public function get_suser()
{
    
    echo $this->User_Model->get_showuser($this->input->post('user'));
}

public function get_saccess()
{
    
    echo $this->User_Model->get_showaccess($this->input->post('dep'),$this->input->post('role'));
}

public function get_sdep()
{
    
    echo $this->User_Model->get_showdep($this->input->post('dep'));
}


public function get_srole()
{
    
    echo $this->User_Model->get_showrole($this->input->post('role'),$this->input->post('dep'));
}

public function remacc()
{
    
        $data['user'] = $this->User_Model->get_dep();
        $this->load->view('removeaccess',$data);
}
public function get_dep()
{
    
    echo $this->User_Model->get_adep($this->input->post('user'));
}

public function get_role()
{
    
    echo $this->User_Model->get_arole($this->input->post('dep'));
}
public function get_tdep()
{
    
    echo $this->User_Model->get_tdep($this->input->post('dep'),$this->input->post('role'));
}

public function get_trole()
{
    
    echo $this->User_Model->get_arole($this->input->post('dep'));
}


public function get_torole()
{
    
    echo $this->User_Model->get_trole($this->input->post('dep'),$this->input->post('role'),$this->input->post('tdep'));
}

public function get_addrole()
{
    
    echo $this->User_Model->get_addrole($this->input->post('dep'));
}
public function forgot()
{
    
        $data['user'] = $this->User_Model->get_user();
        $this->session->set_userdata('usr',$data['user'][0]->PASSWORD);
        $this->load->view('forgotpass',$data);
}
public function sendmail()
{
    $this->load->config('email');
    $this->load->library('email');
    
    $from = $this->config->item('smtp_user');
    $to = $this->input->post('user');
    $subject = "Password Recovery For FMS UoA.";
    $message = "Dear User , We Have Received A Request From You About Forgot Password For FMS UoA Portal. Your Password is - ".$this->session->userdata('usr');

    $this->email->set_newline("\r\n");
    $this->email->from($from);
    $this->email->to($to);
    $this->email->subject($subject);
    $this->email->message($message);

    if ($this->email->send()) 
    {
        $this->session->set_flashdata('response',"Email Sent Successfully.");
        redirect('https://filetracking.velomia.tech//User/forgot');
            
    } 
    else 
    {
        $this->session->set_flashdata('response',"Some Error Occured.");
redirect('https://filetracking.velomia.tech//User/forgot');
    }
}
public function active()
{
    
        $data['user'] = $this->User_Model->get_decuser();
        $this->load->view('actUser',$data);
}
public function deactive()
{
    
        $data['user'] = $this->User_Model->get_actuser();
        $this->load->view('decUser',$data);
}
public function activate()
{
    
    
    $this->form_validation->set_rules("user","User","required");
    if($this->form_validation->run())
    {
        
        
        $uid= $this->input->post('user');
        $this->session->set_userdata('uid',$uid);
        
 if($this->User_Model->act($uid))
 
    {
        $this->session->set_flashdata('response',"User Added Successfully.");
        $this->load->view('actUser');
    }
    else{
        $this->session->set_flashdata('response',"Some Error Occured.");
        $this->load->view('actUser');
    }
    }
    else{
        $this->load->view('actUser');
    }
}

public function AddDep()
{
    $this->load->view('addDep');
}


public function Addrol()
{
    
        $data['user'] = $this->User_Model->get_dep();
    $this->load->view('addRole',$data);
}

public function adddepart()
{
    
    
    $this->form_validation->set_rules("dep","Department Name","required|alpha|is_unique[department.Department]");
    if($this->form_validation->run())
    {
        
        $data=array("Department"=>$this->input->post('dep'));
        if($this->User_Model->AddDepart($data))
        {
            $this->session->set_flashdata('response',"Department Added Successfully.");
            $this->load->view('addDep');
        }
        else{
            $this->session->set_flashdata('response',"Some Error Occured.");
            $this->load->view('addDep');
        }
    }
    else
    {
        $this->load->view('addDep');
    }
}



public function addrole()
{
    
    
    $this->form_validation->set_rules("dep","Department Name","required");
    $this->form_validation->set_rules("role","Role Name","required|alpha");
    if($this->form_validation->run())
    {
        
        $data=array("Role"=>$this->input->post('role'),"Department"=>$this->input->post('dep'));
        $r=$this->User_Model->AddRol($data,$this->input->post('dep'),$this->input->post('role'));
        if($r==1)
        {
            $this->session->set_flashdata('response',"Role Added Successfully.");
            $this->load->view('addRole');
        }
        else if($r==-1){
            $this->session->set_flashdata('response',"Role Already Exists.");
            $this->load->view('addRole');
        }
        else
        {
            $this->session->set_flashdata('response',"Some Error Occured.");
            $this->load->view('addRole');
        }
    }
    else
    {
        $this->load->view('addRole');
    }
}


public function deactivate()
{
    
    
    $this->form_validation->set_rules("user","User","required");
    if($this->form_validation->run())
    {
        
        
        $uid= $this->input->post('user');
        $this->session->set_userdata('uid',$uid);
        
        if($this->User_Model->dct($uid))
        {
            $this->session->set_flashdata('response',"User Deactivated Successfully.");
            $this->load->view('decUser');
        }
        else{
            $this->session->set_flashdata('response',"Some Error Occured.");
            $this->load->view('decUser');
        }
    }
    else{
        $this->load->view('decUser');
    }
}

public function proceed()
{
    
        
        $this->form_validation->set_rules("user","User","required");
        if($this->form_validation->run())
		{
            
            
            $uid= $this->input->post('user');
            $this->session->set_userdata('uid',$uid);
            
            $data['udata']=$this->User_Model->getUdetail($uid);
            $data['dep'] = $this->User_Model->get_dep();
        $data['role'] = $this->User_Model->get_role();
        $this->load->view('updateUser',$data);
        }
        else{
            $this->index();
        }
}


public function aAccess()
{
    
        
        $this->form_validation->set_rules("dep","From Department","required");
        $this->form_validation->set_rules("role","From Role","required");
        $this->form_validation->set_rules("tdep","To Department","required");
        $this->form_validation->set_rules("trole","To Role","required");
        if($this->form_validation->run())
		{
            
            $dep=$this->input->post('dep');
            $role=$this->input->post('role');
            $tdep=$this->input->post('tdep');
            $trole=$this->input->post('trole');
            $val=$this->User_Model->addac($dep,$role,$tdep,$trole);
            if($val==-1)
            {
                $this->session->set_flashdata('This Access Has Already Been Assigned To The User.');
                $this->addacc();
            }
            elseif($val==1)
            {
                $this->session->set_flashdata('Access Successfully Assigned To The User.');
                $this->addacc();
            }
            else
            {
                $this->session->set_flashdata('Something Went Wrong Try Again.');

                $this->addacc();
            }
        }
        else{
            $this->addacc();
        }
}


public function rAccess()
{
    
    
    $this->form_validation->set_rules("dep","From Department","required");
    $this->form_validation->set_rules("role","From Role","required");
    $this->form_validation->set_rules("tdep","To Department","required");
    $this->form_validation->set_rules("trole","To Role","required");
    if($this->form_validation->run())
    {
        
        $dep=$this->input->post('dep');
        $role=$this->input->post('role');
        $tdep=$this->input->post('tdep');
        $trole=$this->input->post('trole');
        $val=$this->User_Model->remac($dep,$role,$tdep,$trole);
        if($val==1)
        {
            $this->session->set_flashdata('Access Removed Successfully.');
            $this->remacc();
        }
        else
        {
            $this->session->set_flashdata('Some Error Occured.');
            $this->remacc();
        }
    }
    else{
        $this->remacc();
    }  
}

public function suser()
{
    
        $data['user'] = $this->User_Model->get_user();
        $this->load->view('showUser',$data);
}

public function saccess()
{
    
    $data['user'] = $this->User_Model->get_dep();
        $this->load->view('showAccess',$data);
}

public function srole()
{
    
        $data['user'] = $this->User_Model->get_role();
        $this->load->view('showRole',$data);
}

public function sdep()
{
    
        $data['user'] = $this->User_Model->get_dep();
        $this->load->view('showDep',$data);
}

    public function update()
    {
        
        
        $this->form_validation->set_rules("name","Name","required|alpha");
		$this->form_validation->set_rules("phone","Phone","required|min_length[10]|max_length[10]|numeric");
        $this->form_validation->set_rules("dep","Department","required");
        $this->form_validation->set_rules("role","Role","required");
        if($this->form_validation->run())
		{
            $data=array(
                "name"=>$this->input->post("name"),
                "email"=>$this->input->post("email"),
                "phone"=>$this->input->post("phone"),
                "department"=>$this->input->post("dep"),
                "role"=>$this->input->post("role"),
				
            );
            
            if($this->User_Model->updateUser($data))
            {
                $this->session->set_flashdata('User Updated Successfully.');
            }
            else{
                $this->session->set_flashdata('Something Went Wrong Try Again.');
            }



        }
        else{
                $this->load->view('updateUser');
        }
    }
    public function add()
	{
        
        
        $this->form_validation->set_rules("fname","First Name","required|alpha");
        $this->form_validation->set_rules("lname","Last Name","required|alpha");
		$this->form_validation->set_rules("phone","Phone","required|min_length[10]|max_length[10]|numeric|is_unique[users.phone]");
        $this->form_validation->set_rules("dep","Department","required");
        $this->form_validation->set_rules("role","Role","required");
		$this->form_validation->set_rules("email","Email","required|valid_email|is_unique[users.email]");
        $this->form_validation->set_rules("password","Password","required|min_length[8]|max_length[8]");
        $this->form_validation->set_rules("cpassword","Confirm Password","required|min_length[8]|max_length[8]|matches[password]");

		if($this->form_validation->run())
		{
            $ga = new GoogleAuthenticator();
            $secret=$ga->createSecret();
            $data=array(
                "name"=>$this->input->post("fname").$this->input->post("lname"),
                "email"=>$this->input->post("email"),
                "phone"=>$this->input->post("phone"),
                "department"=>$this->input->post("dep"),
                "password"=>$this->input->post("password"),
                "role"=>$this->input->post("role"),
                "isAdmin"=>0,
                "gauthkey"=>$secret,
                "Status"=>1
				
            );
            
            if($this->User_Model->add($data))
            {
            $qrCodeUrl 	= $ga->getQRCodeGoogleUrl($this->input->post("email"), $secret,'fms.allduniv.ac.in');
            $this->session->set_userdata('qcode',$qrCodeUrl);  
            $this->load->view('acc_success'); 
            }
            else{
                $this->session->set_flashdata('Something Went Wrong Try Again.');
                $this->index();
            }
    }
        else{
            $this->index();

        }
	}
}