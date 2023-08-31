<?php

	class Experiential_stays extends MY_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('form');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->model('exp_stays_model');
			//$this->load->model('admin_file_model');
		}
		
		public function index()
		{
		    $data['banner']=$this->exp_stays_model->get_banner();
			$this->load->view('exp_stays',$data);
			
		}
		
		public function load_data()
		{
		    //echo $limitStart;
			$limitStart=$_POST['page'];
		    $data['page']=$limitStart;
			$data['exps']= $this->exp_stays_model->get_all();
			$this->load->view('load_data_exp_stays',$data);
		}
		
		public function detail($name)
	    {
			
			$data['exp']=$this->exp_stays_model->get_exp_id($name);
			$this->load->view('exp_detail_destination_page',$data);
		
		
	   }
	   
	   public function detail_desti($exp,$desti)
	   {
	       $data['exp_desti']=$this->exp_stays_model->get_exp_desti_id($exp,$desti);
		   $data['get_detls_text']=$this->exp_stays_model->get_detls_text();
		   $exp_name=ucwords(strtolower(str_replace("-"," ",$exp)));
		   $dest_name=ucwords(strtolower(str_replace("-"," ",$desti)));
		   $data['exp_dest_name']=$exp_name.' in '.$dest_name;
		   $this->load->view('exp_detail_destination_detail_page',$data);
	   }
	   
	   public function detail_page($name)
	   {
	       $data['exps']=$this->exp_stays_model->get_exp_detail_id($name);
		   $this->load->view('exp_detail_page',$data);
	   }
		
		
	}
?>