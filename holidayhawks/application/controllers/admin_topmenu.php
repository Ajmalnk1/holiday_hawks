<?php

	class Admin_topmenu extends MY_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('form');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->model('admin_topmenu_model');
		}
		
		public function index()
		{
		    if($this->session->userdata('id'))
			{
			  
			  $data['pages']=$this->admin_topmenu_model->get_all_page();
			  $this->load->view('admin/topmenu',$data);
			}
			else
			{
			  redirect('admin');
			}
		}
		
		
		public function load_data_topmenu()
		{
		  
		    
			
			$data['get_all_topmenu']= $this->admin_topmenu_model->get_all_topmenu();
		    $this->load->view('admin/load_data_topmenu',$data);
		}
		  
		  
		public function load_menu_form()
		{
		  
			$data['menu_each_li']=$this->input->post('menu_each_li')+1;
		    $this->load->view('admin/load_menu_form',$data);
		  	
		}
		public function input_menu()
		{
		  //$input_section=$this->input->post('input_section');
		  echo $input_menu= $this->admin_topmenu_model->input_menu();
		}
		
		
		
		public function sort_menu()
		{
		
		    $i = 1;
			//explode('cat[]=',$_POST['cat_id'] ;
			$cat_id=str_replace('section[]=', '', $_POST['cat_id']);
			$cat_id=explode('&',$cat_id);
			foreach ($cat_id as $value) 
			{
			//echo "update  irti_learning_plan_section set node_order='$i' where id='$value'";
			mysql_query("update  tbl_topmenu set node_order='$i' where id='$value'");
			$i++;
			}
		}
	    public  function del_menu()
	    {
	         $del_plan= $this->admin_topmenu_model->del_menu();
	    }
		
		
		public function get_menu()
		{
		  
		  $get_menu= $this->admin_topmenu_model->get_menu();
		  $data['url'] =$get_menu->url;
		  $data['name'] =$get_menu->name;
		  return $this->output
              ->set_status_header(200)
              ->set_content_type('application/json', 'utf-8')
              ->set_output(json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
		  
		}
		
		
		
	}
?>