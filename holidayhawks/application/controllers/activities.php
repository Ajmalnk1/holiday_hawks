<?php

	class Activities extends MY_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('form');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->model('activities_model');
			//$this->load->model('admin_file_model');
		}
		
		public function index()
		{
		    $data['banner']=$this->activities_model->get_banner();
			$this->load->view('activities',$data);
			
		}
		
		public function load_data()
		{
		    //echo $limitStart;
			$limitStart=$_POST['page'];
		    $data['page']=$limitStart;
			$data['exps']= $this->activities_model->get_all();
			$this->load->view('load_data_activities',$data);
		}
		
		public function detail($name)
	    {
			
			$data['act']=$this->activities_model->get_act_id($name);
			$this->load->view('act_detail_destination_page',$data);
		
		
	   }
	   
	   public function detail_desti($act,$desti)
	   {
	       
		  // echo 9;
		   $data['act_desti']=$this->activities_model->get_act_desti_id($act,$desti);
		   $data['get_detls_text']=$this->activities_model->get_detls_text();
		   $act_name=ucwords(strtolower(str_replace("-"," ",$act)));
		   $dest_name=ucwords(strtolower(str_replace("-"," ",$desti)));
		   $data['act_dest_name']=$act_name.' in '.$dest_name;
		   $this->load->view('act_detail_destination_detail_page',$data);
	   }
	   
	   public function detail_page($name)
	   {
	       $data['acts']=$this->activities_model->get_act_detail_id($name);
		   $this->load->view('act_detail_page',$data);
	   }
		
		
		
	}
?>