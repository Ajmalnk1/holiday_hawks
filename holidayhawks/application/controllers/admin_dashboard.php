<?php
class Admin_dashboard extends CI_Controller 
{
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('form');
			//$this->load->model('admin_dashboard_model');
		}
        
        public function index()
		{
			
			
			  if($this->session->userdata('id'))
			  {
			    $this->load->view('admin/dashboard');
			  }
			  else
			  {
			     redirect('admin');
			  }
		}
		
		
}
?>