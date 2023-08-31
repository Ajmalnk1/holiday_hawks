<?php

	class Admin_page extends MY_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('form');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->model('admin_page_model');
		}
		
		public function index()
		{
		    if($this->session->userdata('id'))
			{
			  
			  $this->load->view('admin/page');
			}
			else
			{
			  redirect('admin');
			}
		}
		
		
		public function load_data_page($limitStart)
		{
		    
			$data['pages']= $this->admin_page_model->get_all_page($limitStart);
			$this->load->view('admin/load_data_page',$data);
		}
		
		/*public function sort_blog()
		{
		
		    $i = 1;
			//explode('cat[]=',$_POST['cat_id'] ;
			$cat_id=str_replace('section[]=', '', $_POST['cat_id']);
			$cat_id=explode('&',$cat_id);
			foreach ($cat_id as $value) 
			{
			//echo "update  irti_learning_plan_section set node_order='$i' where id='$value'";
			mysql_query("update  tbl_blog set node_order='$i' where id='$value'");
			$i++;
			}
		}*/
		
		public function view_form_page($id=0)
		{
		    if($this->session->userdata('id'))
			{
			  //echo $_SERVER['DOCUMENT_ROOT'];
			  $data='';
			  if($id)
			  {
			     $page=$this->admin_page_model->get_pages($id);
				 $data['id']=$page->pageid;
				 $data['name']=$page->pgname;
				 $data['slug']=$page->pgalias;
				 $data['title']=$page->pgtitle;
				 $data['descr']=$page->pgdescription;
				 $data['content']=$page->pgcontent;
				 $data['type']=$page->pgtype;
				 
				 
			  }
			  $this->load->view('admin/page_form',$data);
			}
		  
		}
		
		
		
		
		
		
		
		
		public function submit_form()
		{
		  $q=$this->admin_page_model->submit_form();
		  redirect('admin_page');
		  
		}
		
		
		public function edit_form($id)
		{
		  $q=$this->admin_page_model->edit_form($id);
		  redirect('admin_page');
		  
		}
		
		public function remove_page()
		{
		 
		  $q=$this->admin_page_model->remove_page();
		  //redirect('admin_blog_category');
		}
	    
		
		
	}
?>