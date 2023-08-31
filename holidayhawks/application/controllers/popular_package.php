<?php

	class Popular_package extends MY_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('form');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->model('popular_package_model');
			//$this->load->model('admin_file_model');
		}
		
		public function index($name)
		{
		  $data['basic_info']=$this->popular_package_model->get_basic($name);
		  $data['destinations_pkg']=$this->popular_package_model->get_desti($name);
		  
		  $this->load->view('popular_package',$data);
		  
		}
		
		public function load_data()
		{
		  
		  
		  $d['pkg_lists']=$this->popular_package_model->pkg_lists();
		  
		
		  //$d['blogs']=$this->db->query("select* from  order by id desc limit $limitStart,$limitCount")->result();
		  $this->load->view('load_data_popular_pkg',$d);
		}
		
		
		public function detail($name)
	    {
			
			
		   $data['pkg_detail']=$this->popular_package_model->get_detail_id($name);
		   $this->load->view('pkg_detail_page',$data);
		
		
	     }
	   
		
		
		
	}
?>