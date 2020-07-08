<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('GoogleAuthenticator.php');
class User extends CI_Controller {
    public function index()
	{
        
        $this->load->model('User_Model');
        $data['dep'] = $this->User_Model->get_dep();
        $data['role'] = $this->User_Model->get_role();
        $this->load->view('addUser',$data);
      
		//$this->login();
    }

public function select()
{
    $this->load->model('User_Model');
        $data['user'] = $this->User_Model->get_user();
        $this->load->view('selectUser',$data);
}

public function addacc()
{
    $this->load->model('User_Model');
        $data['user'] = $this->User_Model->get_user();
        $data['dep'] = $this->User_Model->get_dep();
        $data['role'] = $this->User_Model->get_role();
        $this->load->view('addaccess',$data);
}



public function remacc()
{
    $this->load->model('User_Model');
        $data['user'] = $this->User_Model->get_user();
        $this->load->view('removeaccess',$data);
}
public function get_dep()
{
    $this->load->model('User_Model');
    echo $this->User_Model->get_adep($this->input->post('user'));
}

public function get_role()
{
    $this->load->model('User_Model');
    echo $this->User_Model->get_arole($this->input->post('user'),$this->input->post('dep'));
}
public function forgot()
{
    $this->load->model('User_Model');
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
        echo "<script>alert('Email Sended Successfully.')</script>";
            
    } 
    else 
    {
        show_error($this->email->print_debugger());
    }
}
public function active()
{
    $this->load->model('User_Model');
        $data['user'] = $this->User_Model->get_decuser();
        $this->load->view('actUser',$data);
}
public function deactive()
{
    $this->load->model('User_Model');
        $data['user'] = $this->User_Model->get_actuser();
        $this->load->view('decUser',$data);
}
public function activate()
{
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    $this->form_validation->set_rules("user","User","required");
    if($this->form_validation->run())
    {
        $this->load->library('session');
        
        $uid= $this->input->post('user');
        $this->session->set_userdata('uid',$uid);
        $this->load->model('User_Model');
 if($this->User_Model->act($uid))
 
    {
        echo "<script>alert('User Activated Successfully.')</script>";
        $this->load->view('actUser');
    }
    else{
        echo "<script>alert('Try Again .')</script>";
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
    $this->load->view('addRole');
}

public function adddepart()
{
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    $this->form_validation->set_rules("dep","Department Name","required|alpha|is_unique[department.Department]");
    if($this->form_validation->run())
    {
        $this->load->model('User_Model');
        $data=array("Department"=>$this->input->post('dep'));
        if($this->User_Model->AddDepart($data))
        {
            echo "<script>alert('Department Added Successfully.')</script>";
            $this->load->view('addDep');
        }
        else{
            echo "<script>alert('Try Again .')</script>";
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
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    $this->form_validation->set_rules("role","Role Name","required|alpha|is_unique[roles.Role]");
    if($this->form_validation->run())
    {
        $this->load->model('User_Model');
        $data=array("Role"=>$this->input->post('role'));
        if($this->User_Model->AddRol($data))
        {
            echo "<script>alert('Role Added Successfully.')</script>";
            $this->load->view('addRole');
        }
        else{
            echo "<script>alert('Try Again .')</script>";
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
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    $this->form_validation->set_rules("user","User","required");
    if($this->form_validation->run())
    {
        $this->load->library('session');
        
        $uid= $this->input->post('user');
        $this->session->set_userdata('uid',$uid);
        $this->load->model('User_Model');
        if($this->User_Model->dct($uid))
        {
            echo "<script>alert('User Deactivated Successfully.')</script>";
            $this->load->view('decUser');
        }
        else{
            echo "<script>alert('Try Again .')</script>";
            $this->load->view('decUser');
        }
    }
    else{
        $this->load->view('decUser');
    }
}

public function proceed()
{
    $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules("user","User","required");
        if($this->form_validation->run())
		{
            $this->load->library('session');
            
            $uid= $this->input->post('user');
            $this->session->set_userdata('uid',$uid);
            $this->load->model('User_Model');
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
    $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules("user","User","required");
        $this->form_validation->set_rules("dep","Department","required");
        $this->form_validation->set_rules("role","Role","required");
        if($this->form_validation->run())
		{
            $this->load->model('User_Model');
            $user=$this->input->post('user');
            $dep=$this->input->post('dep');
            $role=$this->input->post('role');
            $val=$this->User_Model->addac($user,$dep,$role);
            if($val==-1)
            {
                echo "<script>alert('This Access Has Already Been Assigned To The User.')</script>";
                $this->addacc();
            }
            elseif($val==1)
            {
                echo "<script>alert('Access Successfully Assigned To The User.')</script>";
                $this->addacc();
            }
            else
            {
                echo "<script>alert('Something Went Wrong Try Again.')</script>";
                $this->addacc();
            }
        }
        else{
            $this->addacc();
        }
}


public function rAccess()
{
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    $this->form_validation->set_rules("user","User","required");
    $this->form_validation->set_rules("dep","Department","required");
    $this->form_validation->set_rules("role","Role","required");
    if($this->form_validation->run())
    {
        $this->load->model('User_Model');
        $user=$this->input->post('user');
        $dep=$this->input->post('dep');
        $role=$this->input->post('role');
        $val=$this->User_Model->remac($user,$dep,$role);
        if($val==1)
        {
            echo "<script>alert('Access Removed Successfully.')</script>";
            $this->remacc();
        }
        else
        {
            echo "<script>alert('Something Went Wrong Try Again.')</script>";
            $this->remacc();
        }
    }
    else{
        $this->remacc();
    }  
}

    public function update()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
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
            $this->load->model('User_Model');
            if($this->User_Model->updateUser($data))
            {
                echo "<script>alert('User Updated Successfully.')</script>";
            }
            else{
                echo "<script>alert('Try Again Something Went Wrong.')</script>";
            }



        }
        else{
                $this->load->view('updateUser');
        }
    }
    public function add()
	{
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
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
                "gauthkey"=>$secret,
                "Status"=>1
				
            );
            $this->load->model('User_Model');
            if($this->User_Model->add($data))
            {
            $qrCodeUrl 	= $ga->getQRCodeGoogleUrl($this->input->post("email"), $secret,'fms.allduniv.ac.in');
            $this->session->set_userdata('qcode',$qrCodeUrl);  
            $this->load->view('acc_success'); 
            }
            else{
                echo "<script>alert('Can't Process Your Request Try Again.')</script>";
                $this->index();
            }
    }
        else{
            $this->index();

        }
	}
}