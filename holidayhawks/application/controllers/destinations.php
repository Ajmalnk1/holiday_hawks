<?php

	class Destinations extends MY_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('form');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->model('destinations_model');
			//$this->load->model('admin_file_model');
		}
		
		public function index()
		{
		    $data['banner']=$this->destinations_model->get_banner();
			$data['get_detls_text']=$this->destinations_model->get_detls_text();
			$this->load->view('destinations',$data);
			
		}
		
		public function load_data()
		{
		    //echo $limitStart;
			$limitStart=$_POST['page'];
		    $data['page']=$limitStart;
			$data['destinations']= $this->destinations_model->get_all();
			$this->load->view('load_data_destinations',$data);
		}
		
		public function detail($name)
		{
		    $data['name']=str_replace("-"," ",$name);
		    $data['hand_picked']=$this->destinations_model->get_desti_id($name);
			$data['exp_desti']=$this->destinations_model->get_exp_desti($name);
			$data['acti_desti']=$this->destinations_model->get_acti_desti($name);
			$data['banner']=$this->destinations_model->get_banner();
			$data['main_detls']=$this->destinations_model->get_desti($name);
			$data['get_detls_text']=$this->destinations_model->get_detls_text();
			
			$this->load->view('destination_detail',$data);
		}
		
		
		
	}
?>