<?php

	class Admin_vector extends MY_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('form');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->model('admin_vector_model');
			$this->load->model('admin_file_model');
		}
		
		public function index()
		{
		    if($this->session->userdata('id'))
			{
			  $data['vectors']= $this->admin_vector_model->get($limitStart);
			  $this->load->view('admin/vector',$data);
			}
			else
			{
			  redirect('admin');
			}
		}
		
		public function load_data($limitStart)
		{
		    //echo $limitStart;
			$data['vectors']= $this->admin_vector_model->get($limitStart);
			$this->load->view('admin/load_data_vector',$data);
		}
		
		
		public function view_form($id=0)
		{
		    if($this->session->userdata('id'))
			{
			  //echo $_SERVER['DOCUMENT_ROOT'];
			  $data='';
			 $data['links']= $this->admin_vector_model->get_links();
			  
			  if($id)
			  {
			     $vector=$this->admin_vector_model->get_id($id);
				 $data['id']=$id;
				 /*$data['title']=$blog->title;
				 $data['subtitle']=$blog->subtitle;*/
				 $data['img']=$vector->img;
				 $data['name']=$vector->name;
				 $data['link_db']=$vector->link;
				 
			  }
			  $this->load->view('admin/vector_form',$data);
			}
		  
		}
		
		
		public function edit_form($id)
		{
		  $q=$this->admin_vector_model->edit_form($id);
		  redirect('admin_vector');
		  
		}
		
		
		
		
		
		
		public function remove()
		{
		
		   $q=$this->admin_vector_model->remove();
		   redirect('admin_vector');
		}
		
		public function sort_vector()
		{
		
		    $i = 1;
			//explode('cat[]=',$_POST['cat_id'] ;
			$cat_id=str_replace('section[]=', '', $_POST['cat_id']);
			$cat_id=explode('&',$cat_id);
			foreach ($cat_id as $value) 
			{
			//echo "update  irti_learning_plan_section set node_order='$i' where id='$value'";
			mysql_query("update  tbl_vectors set node_order='$i' where id='$value'");
			$i++;
			}
		}
		
		
	}
?>