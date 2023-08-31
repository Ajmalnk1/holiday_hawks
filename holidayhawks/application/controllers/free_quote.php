<?php
class Free_quote extends CI_Controller 
{
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('form');
			
		}
        
        public function index()
		{
			
			 $this->load->view('free-quote');
			  
		}
		

		
}
?>