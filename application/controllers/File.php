<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File extends CI_Controller {

	function __construct()
	{
	parent::__construct();

	if($this->session->userdata('USER')==null || $this->session->userdata('tfa')==null )
	redirect('/');
	else if($this->session->userdata('isa')->isAdmin==1)
	redirect('/Authenticator/panel');
	}
    public function index()
	{
		$data['sfile']=$this->File_Model->get_received();
		$this->load->view('upanel',$data);
		//$this->login();
	}
  public function logout()
    {
        $this->session->unset_userdata('USER');
        $this->session->sess_destroy();
        redirect('/');
    }
  
  
  
  public function get_order()
    {
		   $new_name=$this->input->post('dep');
    $r=$this->File_Model->get_pdfdesc($new_name);
  $this->session->set_userdata('note',$r);
    $s=$this->File_Model->get_pdfcribe($new_name);
    $pf=$this->File_Model->get_all($new_name);
    $out='<section class="indent-1"><section><div style=" float:left;"> <blockquote class="blockquote bq-success">
  <p class="bq-title">File Notings</p>
  <p style="background-color:lightgreen;" class="html-content" id="note" name="note">"'. $r .'"
  </p>
</blockquote></div> </section><section><div><embed src="https://172.1696.251//files/'.$new_name.'.pdf" height="600px" width="500px" 
			type="application/pdf"></div></section>';
			foreach($pf as $row)
{
    if($row->draft!="NULL")
    $out.='<section><div><embed src="https://172.1696.251//files/'.$row->draft.'.pdf" height="600px" width="500px" 
			type="application/pdf"></div></section>';
}
			   $out.='</section>';



			echo $out;	    
  	}
  
  public function genorder()
    {
   		 $data['user']=$this->File_Model->get_genord();
		$this->load->view('generateOrders',$data);
  	}

	public function newfile()
	{
		
		$this->load->view('addFile');
		//$this->login();
	}

	public function chngpass()
	{
		$this->form_validation->set_rules("pass","Password","required|min_length[8]");
		if($this->form_validation->run())
		{
				if($this->File_Model->changePass()){
					echo "<script>
alert('Password Changed Successfully.');
window.location.href='https://172.1696.251/File/cpass';
</script>";
				}
				else{
				echo "<script>
alert('Some Error Occured.');
window.location.href='https://172.1696.251/File/cpass';
</script>";
				}
			}
		else
		{
			$this->load->view('changePass');
		}
	}






	public function uploadfor() 
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
			$r1= '<embed src="https://172.1696.251//files/'.$new_name.'.pdf" width="600px"  height="700px" 
			type="application/pdf">';
			echo $r1;
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
			$r1= '<embed src="https://172.1696.251//files/'.$new_name.'.pdf" width="500" style="margin-top:48px;" height="375" 
			type="application/pdf">';
			$r1.=$r;
			echo $r1;
        }
    }
    
    
    
    
    

	public function addFile()
	{
		
		$this->form_validation->set_rules("title","File Title","required");
		$this->form_validation->set_rules("desc","File Noting","required");
		$this->form_validation->set_rules("cribe","File Subject","required");
		$this->form_validation->set_rules('fward','Forward To','required');
		//$this->form_validation->set_rules("ufile","PDF File","required");
		if($this->form_validation->run())
		{
		    if($this->File_Model->checktitle()!=0)
		    {
				if($this->File_Model->forward_file()){
				    
				  $this->load->config('email');
    $this->load->library('email');
    
    $from = $this->config->item('smtp_user');
    $to = $this->input->post('fward');
    $subject = "New File Received.";
    $message = "Dear User ,".$this->session->userdata('usr')."Have Forwarded a File To You Please Check It Out. Thanks.";

    $this->email->set_newline("\r\n");
    $this->email->from($from);
    $this->email->to($to);
    $this->email->subject($subject);
    $this->email->message($message);

    if ($this->email->send()) 
    {
       echo "<script>
alert('File Added Successfully.');
window.location.href='https://172.1696.251/File/newfile';
</script>";
            
    } 
    else 
    {
       echo "<script>
alert('Some Error Occured.');
window.location.href='https://172.1696.251/File/newfile';
</script>";
    }   
				    
				}    
				    
				 		else
		{
						    				echo "<script>
alert('Error Occured 1.');
window.location.href='https://172.1696.251/File/newfile';
</script>";
		}   
				
			}
			else
			{
			    				echo "<script>
alert('Wrong Title Provided Employee Id Doesnt Macth..');
window.location.href='https://172.1696.251/File/newfile';
</script>";
			}
		}
		else
		{
			    				echo "<script>
alert('Some Error Occured .....');
window.location.href='https://172.1696.251/File/newfile';
</script>";
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

public function get_pdf()
{
    $new_name=$this->input->post('sfiles');
    $r=$this->File_Model->get_pdfdesc($new_name);
  $a=$this->File_Model->get_add($new_name);
  $this->session->set_userdata('note',$r);
  $this->session->set_userdata('fid',$new_name);
  $this->session->set_userdata('add',$a);
    $s=$this->File_Model->get_pdfcribe($new_name);
    $pf=$this->File_Model->get_all($new_name);
    $out='<section class="indent-1"><section><div style=" float:left;"><blockquote class="blockquote bq-primary">
  <p class="bq-title">File Description</p>
  <p  id="note1">"'. $s .'"
  </p>
</blockquote>  <blockquote class="blockquote bq-success">
  <p class="bq-title">File Notings</p>
  <p style="background-color:lightgreen;" id="note">"'. $r .'"
  </p>
</blockquote></div> </section><section><div><embed src="https://172.1696.251//files/'.$new_name.'.pdf" height="600px" width="500px" 
			type="application/pdf"></div></section>';
			foreach($pf as $row)
{
    if($row->draft!="NULL")
    $out.='<section><div><embed src="https://172.1696.251//files/'.$row->draft.'.pdf" height="600px" width="500px" 
			type="application/pdf"></div></section>';
}
			   $out.='</section>';



			echo $out;
}

public function get_Forward()
{
	$out= $this->File_Model->get_access();
	$out.='</br><button type="submit" class="btn btn-outline-lime">Forward File</button>';
	echo $out;
}

public function forwardComp()
{
	$this->form_validation->set_rules("desc","File Description","required");
	$this->form_validation->set_rules("fward","File Forwarding To","required");
	if($this->form_validation->run())
	{
	  
			if($this->File_Model->forwardComp_file()){
 $this->load->config('email');
    $this->load->library('email');
    
    $from = $this->config->item('smtp_user');
    $to = $this->input->post('fward');
    $subject = "New File Received.";
    $message = "Dear User ,".$this->session->userdata('USER')."Have Forwarded a File to you Please Check-it Out. Thanks.";

    $this->email->set_newline("\r\n");
    $this->email->from($from);
    $this->email->to($to);
    $this->email->subject($subject);
    $this->email->message($message);

    if ($this->email->send()) 
    {
       echo "<script>
alert('File Forwarded Successfully.');
window.location.href='https://172.1696.251/File/receivedFiles';
</script>";
            
    } 
    else 
    {
       echo "<script>
alert('Some Error Occured.');
window.location.href='https://172.1696.251/File/receivedFiles';
</script>";
    }   
		}
	else
	{
		$this->load->view('receivedFiles');
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
      $r=$this->File_Model->revert_file();
		echo $r;
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
  
  
  
  public function approveFile()
{
	if( $this->File_Model->approve()==1)
      {
		echo "1";
    }
    
    	else
	{
		redirect("/");
	}
}



public function receivedFiles()
{
			$data['sfile']=$this->File_Model->get_received();
			$this->load->view('receivedFiles',$data);
}

}