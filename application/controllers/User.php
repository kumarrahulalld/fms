<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('GoogleAuthenticator.php');
class User extends CI_Controller {
    function __construct()
	{
	parent::__construct();
	if($this->session->userdata('USER')==null || $this->session->userdata('tfa')==null)
	redirect('/');
	else if($this->session->userdata('isa')->isAdmin==0)
	redirect('/File');
	}
    public function index()
	{
        
        
        $data['dep'] = $this->User_Model->get_dep();
        $this->load->view('addUser',$data);
      
		//$this->login();
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
        $this->load->view('addAccess',$data);
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
        $this->load->view('removeAccess',$data);
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


public function get_trackFile()
{
	echo $this->File_Model->get_track();
}


public function get_addedFiles()
{
	echo $this->File_Model->get_addedFile();
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
      echo $this->email->print_debugger();
       echo "<script>
alert('Email Sent Successfully.');

</script>";
            
    } 
    else 
    {
       echo "<script>
alert('Some Error Occured.');

</script>";
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
               echo "<script>
alert('User Added Successfully.');
window.location.href='https://172.1696.251/User/index';
</script>";
    }
    else{
        echo "<script>
alert('Some Error Occured.');
window.location.href='https://172.1696.251/User/index';
</script>";
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


function alpha_dash_space($fullname){
    if (! preg_match('/^[a-zA-Z\s]+$/', $fullname)) {
        $this->form_validation->set_message('alpha_dash_space', 'The %s field may only contain alpha characters & White spaces');
        return FALSE;
    } else {
        return TRUE;
    }
}

public function adddepart()
{
    
    
    $this->form_validation->set_rules("dep","Department Name","required|callback_alpha_dash_space|is_unique[department.Department]");
    if($this->form_validation->run())
    {
        
        $data=array("Department"=>$this->input->post('dep'));
        if($this->User_Model->AddDepart($data))
        {
                   echo "<script>
alert('Department Added Successfully.');
window.location.href='https://172.1696.251/User/AddDep';
</script>";
        }
        else{
              echo "<script>
alert('Some Error Occured.');
window.location.href='https://172.1696.251/User/AddDep';
</script>";
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
    $this->form_validation->set_rules("role","Role Name","required|callback_alpha_dash_space");
    if($this->form_validation->run())
    {
        
        $data=array("Role"=>$this->input->post('role'),"Department"=>$this->input->post('dep'));
        $r=$this->User_Model->AddRol($data,$this->input->post('dep'),$this->input->post('role'));
        if($r==1)
        {
                  echo "<script>
alert('Role Added Successfully.');
window.location.href='https://172.1696.251/User/Addrol';
</script>";
        }
        else if($r==-1){
                           echo "<script>
alert('Role Already Exists');
window.location.href='https://172.1696.251/User/Addrol';
</script>";
        }
        else
        {
                            echo "<script>
alert('Some Error Occured.');
window.location.href='https://172.1696.251/User/Addrol';
</script>";
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
                             echo "<script>
alert('User Deactivated Successfully.');
window.location.href='https://172.1696.251/User/Deactive';
</script>";
        }
        else{
                             echo "<script>
alert('Some Error Occured.');
window.location.href='https://172.1696.251/User/Deactive';
</script>";
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
        $data['role'] = $this->User_Model->get_disrole();
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
                                  echo "<script>
alert('Access Already Exists.');
window.location.href='https://172.1696.251/User/addacc';
</script>";
            }
            elseif($val==1)
            {
                              echo "<script>
alert('Access Assigned Successfully.');
window.location.href='https://172.1696.251/User/addacc';
</script>";
            }
            else
            {
                                echo "<script>
alert('Some Error Occured.');
window.location.href='https://172.1696.251/User/addacc';
</script>";
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
                             echo "<script>
alert('Access Removed Successfully.');
window.location.href='https://172.1696.251/User/remacc';
</script>";
        }
        else
        {
                           echo "<script>
alert('Some Error Occured.');
window.location.href='https://172.1696.251/User/remacc';
</script>";
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
    
        $data['user'] = $this->User_Model->get_drole();
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
                                  echo "<script>
alert('User Updated Successfully.');
window.location.href='https://172.1696.251/User/select';
</script>";
            }
            else{
                                  echo "<script>
alert('Some Error Occured.');
window.location.href='https://172.1696.251/User/select';
</script>";
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
        $this->form_validation->set_rules("password","Password","required|min_length[8]");
        $this->form_validation->set_rules("cpassword","Confirm Password","required|min_length[8]|matches[password]");

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
            
             $this->load->config('email');
    $this->load->library('email');
    
    $from = $this->config->item('smtp_user');
    $to = $this->input->post('email');
    $subject = "FMS - UoA , Account Created Successfully.";
    $message = "Dear User , A Account Has Been Successfully Created Using This Email Id At File Management System UoA. Your Password is - ".$this->input->post('password').". To Access Your Account , Firstly Download Google Authentictor App From Play Store or App Store And Scan The QR Code From This Link". $qrCodeUrl." Open This Link And Scan In The App And Login With Your Email And Password And Enter The Code In The Authenticator App At The Time Of Login.\n Thank You.";

    $this->email->set_newline("\r\n");
    $this->email->from($from);
    $this->email->to($to);
    $this->email->subject($subject);
    $this->email->message($message);

    if ($this->email->send()) 
    {
       echo "<script>
alert('User Added Successfully.');
window.location.href='https://172.1696.251/User/index';
</script>";
            
    } 
    else 
    {
       echo $this->email->print_debugger();
      /* echo "<script>
alert('Some Error Occured.');
window.location.href='https://172.1696.251/User/index';

</script>";*/
    }
            }
            else{
                                  echo "<script>
alert('Some Error Occured.');
window.location.href='https://172.1696.251/User/index';
</script>";
            }
    }
        else{
            $this->index();

        }
	}
}