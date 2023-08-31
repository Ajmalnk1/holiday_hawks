<?php
class Admin extends CI_Controller 
{
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('form');
			$this->load->model('admin_model');
		}
        
        public function index()
		{
			
			  if($this->session->userdata('id'))
			  {
			    redirect('admin_blog');
			  }
			  else
			  {
			     $this->load->view('admin/admin_login_form');
			  }
		}
		public function admin_login()
	    {
			$email_id = $this->input->post('uname');
	        $pswd = md5($this->input->post('pswd'));
			$res = $this->admin_model->admin_login($email_id,$pswd);
			if($res==1)
			{
			   echo 'suc';
			}
			else
			{
			  echo 'err';
			}
			/*if($res==1)
			{
			  if($this->session->userdata('id'))
			  {
			    redirect(base_url('admin_clients'));
			  }
			}
			else
			{
			 redirect('admin');
			}*/
			
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