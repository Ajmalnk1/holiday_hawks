<?php
class Authentication extends CI_Controller 
{
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('form');
		}
        
       public function login()
	   {
	    $email_id = $this->input->post('email_id');
		$pswd = md5($this->input->post('pswd'));
		$q=$this->db->query("select * from irti_user where username='$email_id' and password='$pswd'");
		$q1=$q->num_rows();
		if($q1!=0)
		{
		   $q=$q->row();
		   $id=$q->id;
		   $role_id=$q->admin_role;
		   $newdata = array(
	         	'id'  => $id,
				'role_id'  => $role_id
	          	
	     	);
			$this->session->set_userdata($newdata);
		    echo 'suc';
		}
		else
		{
		    echo 'err';
		}
	   }
	   
	   
	   public function admin()
	   {
			if($this->session->userdata('id')&&$this->session->userdata('role_id')!=4)
			{
				 if($this->session->userdata('manage_link'))
				 {
					  redirect('admin_course');
				 }
				 else
				 {
					 $this->load->view('admin/admin_login_form');
				 } 
			  
			}
			else
			{
				redirect('home');
			}
			
		
	   }
	   
	   public function admin_login()
	   {
			$email_id = $this->input->post('uname');
			$pswd = md5($this->input->post('pswd'));
			$q=$this->db->query("select * from irti_user where username='$email_id' and password='$pswd'");
			$q1=$q->num_rows();
			if($q1!=0)
			{
			   $q=$q->row();
			   $id=$q->id;
			   if($id==$this->session->userdata('id'))
			   {
			     $newdata = array(
	         	  'manage_link'  => 1,
				 );
	          	 $this->session->set_userdata($newdata);
				 redirect('admin_course');
				 
			   }
			   else
			   {
				 echo 'Invalid User';
				 redirect('home');
			   }
	       }
		   else
		   {
		       redirect('home');
		   }
	   }
	   
	   
	   
	   public function check_user()
		{
			$email_id = $this->input->post('email_id');
			$login_paswd = md5($this->input->post('paswd'));
			//echo "select * from  gail_user where username='$email_id' and password='$login_paswd'";
			$query=$this->db->query("select * from  irti_user where username='$email_id' and password='$login_paswd'")->num_rows();
			
			if($query!= 0){
	
				echo 0;
			}
			else{
				echo  1;
			}
		
	   }
	   function logout()
		  {
			$this->load->driver('cache'); 
			$this->session->sess_destroy();
			$this->cache->clean(); 
			redirect('admin');
			ob_clean(); 
		  }

		
}
?>