<?php
class Portfolio_list extends CI_Controller 
{
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('form');
			
		}
        
        public function index()
		{
			
			 $this->load->view('portfolio_list');
			  
		}
		

		
}
?>