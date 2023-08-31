<?php
class About extends CI_Controller 
{
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('form');
			$this->load->model('client_model');
		}
        
        public function index()
		{
			
			 $data['clients'] = $this->client_model->get_clients();
			 $this->load->view('about',$data);
			  
		}
		

		
}
?>