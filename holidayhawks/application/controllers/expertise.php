<?php
class Expertise extends CI_Controller 
{
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('form');
			
		}
        
        public function index()
		{
		  $this->load->view('expertise');
		}
		
}
?>