<?php

	class Admin_clients extends MY_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('form');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->model('admin_clients_model');
		}
		
		public function index()
		{
		    if($this->session->userdata('id'))
			{
			  $this->load->view('admin/clients');
			}
			else
			{
			  redirect('admin');
			}
		}
		
		public function load_data_clients()
		{
		    if($_POST['page'])
			{
			  $page = $_POST['page'];}
			else 
			{
			  $page=1;
			}
			$cur_page = $page;
			$page -= 1;
			$per_page = 10;
			$start = $page * $per_page;
			$q=$this->admin_clients_model->load_data_clients($start,$per_page);
			$total_count=$this->admin_clients_model->total_count();
			$pagination=$this->pagination($page,$total_count);
			$data['pagination']=$pagination;
			$data['clients']=$q;
			$data['total_count']=$total_count;
			$this->load->view('admin/load_data_clients',$data);
			
			

		}
		
		public function view_form_clients()
		{
		    if($this->session->userdata('id'))
			{
			  $this->load->view('admin/clients_form');
			}
		  
		}
		
		public function submit_form($id=0)
		{
		  if($id==0)
		  {
		    
			  $this->admin_clients_model->client_insert();
			  redirect('admin_clients');
		  }
		  
		}
		
		public function delete_clients()
		{
		 $q=$this->admin_clients_model->delete_clients();
		}
		
		
		
		
		
	}
?>