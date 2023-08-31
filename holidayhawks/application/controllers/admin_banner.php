<?php

	class Admin_banner extends MY_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('form');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->model('admin_banner_model');
			$this->load->model('admin_file_model');
		}
		
		public function home()
		{
		    if($this->session->userdata('id'))
			{
			  
			  $this->load->view('admin/banner_home');
			}
			else
			{
			  redirect('admin');
			}
		}
		
		public function pages()
		{
		    if($this->session->userdata('id'))
			{
			  
			  $this->load->view('admin/banner_pages');
			}
			else
			{
			  redirect('admin');
			}
		}
		
		public function view_form_banner($id=0)
		{
		    if($this->session->userdata('id'))
			{
			  //echo $_SERVER['DOCUMENT_ROOT'];
			  $data='';
			  $data['pages']= $this->admin_banner_model->get_pages();
			  if($id)
			  {
			     $banner=$this->admin_banner_model->get_banner_id($id);
				 $data['id']=$banner->id;
				 /*$data['title']=$blog->title;
				 $data['subtitle']=$blog->subtitle;*/
				 $data['banner_img']=$banner->img;
				
				 $data['cat_id']=$banner->page_id;
				 
			  }
			  $this->load->view('admin/banner_form',$data);
			}
		  
		}
		
		
		public function view_form_banner_home($id=0)
		{
		    if($this->session->userdata('id'))
			{
			  //echo $_SERVER['DOCUMENT_ROOT'];
			  $data='';
			  $data['pages']= $this->admin_banner_model->get_pages();
			  if($id)
			  {
			     $banner=$this->admin_banner_model->get_banner_id($id);
				 $data['id']=$id;
				 /*$data['title']=$blog->title;
				 $data['subtitle']=$blog->subtitle;*/
				 $data['banner_img']=$banner->img;
				 $data['subtitle']=$banner->subtitle;
				 $data['title']=$banner->title;
				 
			  }
			  $this->load->view('admin/banner_form_home',$data);
			}
		  
		}
		
		public function submit_form()
		{
		  $q=$this->admin_banner_model->submit_form();
		  redirect('admin_banner/pages');
		  
		}
		
		
		public function edit_form_home($id)
		{
		  $q=$this->admin_banner_model->edit_form_home($id);
		  redirect('admin_banner/home');
		  
		}
		
		public function submit_form_home()
		{
		  $q=$this->admin_banner_model->submit_form_home();
		  redirect('admin_banner/home');
		  
		}
		
		public function load_data_banner($limitStart)
		{
		    //echo $limitStart;
			$data['banners']= $this->admin_banner_model->get_banner($limitStart);
			$this->load->view('admin/load_data_banner',$data);
		}
		
		public function load_data_banner_home($limitStart)
		{
		    //echo $limitStart;
			$data['banners']= $this->admin_banner_model->get_banner_home($limitStart);
			$this->load->view('admin/load_data_banner_home',$data);
		}
		
		public function remove_banner()
		{
		
		   $q=$this->admin_banner_model->remove_banner();
		   redirect('admin_banner/pages');
		}
		public function remove_banner_home()
		{
		
		   $q=$this->admin_banner_model->remove_banner();
		   redirect('admin_banner/home');
		}
		
		public function sort_banner()
		{
		
		    $i = 1;
			//explode('cat[]=',$_POST['cat_id'] ;
			$cat_id=str_replace('section[]=', '', $_POST['cat_id']);
			$cat_id=explode('&',$cat_id);
			foreach ($cat_id as $value) 
			{
			//echo "update  irti_learning_plan_section set node_order='$i' where id='$value'";
			mysql_query("update  tbl_banner set node_order='$i' where id='$value'");
			$i++;
			}
		}
		
	}
?>