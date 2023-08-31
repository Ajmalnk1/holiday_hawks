<?php

	class Admin_pkg_category extends MY_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('form');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->model('admin_pkg_category_model');
			$this->load->model('admin_file_model');
		}
		
		public function index()
		{
		    if($this->session->userdata('id'))
			{
			  $data['pkgs']= $this->admin_pkg_category_model->get($limitStart);
			  $this->load->view('admin/pkg_category',$data);
			}
			else
			{
			  redirect('admin');
			}
		}
		
		public function home_text()
		{
		    if($this->session->userdata('id'))
			{
			  $data['home_text']= $this->admin_pkg_category_model->home_text();
			  $this->load->view('admin/pkg_home_text',$data);
			}
			else
			{
			  redirect('admin');
			}
		}
		
		public function view_text_form()
		{
		    if($this->session->userdata('id'))
			{
			  //echo $_SERVER['DOCUMENT_ROOT'];
			  $data='';
			
			  
			  
			     $text=$this->admin_pkg_category_model->get_text();
				 $data['id']=$text->id;
				 /*$data['title']=$blog->title;
				 $data['subtitle']=$blog->subtitle;*/
				 $data['title']=$text->title;
				 $data['descr']=$text->descr;
				 $data['type']=$text->type;
				 
			  
			  $this->load->view('admin/pkg_home_text_form',$data);
			}
		  
		}
		
		
		public function view_form($id=0)
		{
		    if($this->session->userdata('id'))
			{
			  //echo $_SERVER['DOCUMENT_ROOT'];
			  $data='';
			  //$data['pages']= $this->admin_banner_model->get_pages();
			  if($id)
			  {
			     $banner=$this->admin_pkg_category_model->get_id($id);
				 $data['id']=$id;
				 /*$data['title']=$blog->title;
				 $data['subtitle']=$blog->subtitle;*/
				 $data['img']=$banner->img;
				 $data['name']=$banner->name;
				 $data['banner']=$banner->banner;
				 $data['pg_title']=$banner->pg_title;
				 $data['pg_desc']=$banner->pg_desc;
				 
				 $data['detail_name']=$banner->name_list;
				 $data['desc1']=$banner->desc1;
				 $data['desc2']=$banner->desc2;
				 
				 
			  }
			  $this->load->view('admin/pkg_category_form',$data);
			}
		  
		}
		
		
		public function edit_form($id)
		{
		  $q=$this->admin_pkg_category_model->edit_form($id);
		  redirect('admin_pkg_category');
		  
		}
		
		public function edit_text_form()
		{
		  $q=$this->admin_pkg_category_model->edit_text_form();
		  redirect('admin_pkg_category/home_text');
		  
		}
		
		public function load_data($limitStart)
		{
		    //echo $limitStart;
			$data['pkgs']= $this->admin_pkg_category_model->get($limitStart);
			$this->load->view('admin/load_data_pkg_category',$data);
		}
		
		public function remove()
		{
		
		   $q=$this->admin_pkg_category_model->remove();
		   redirect('admin_pkg_category');
		}
		
		public function sort_pkg()
		{
		
		    $i = 1;
			//explode('cat[]=',$_POST['cat_id'] ;
			$cat_id=str_replace('section[]=', '', $_POST['cat_id']);
			$cat_id=explode('&',$cat_id);
			foreach ($cat_id as $value) 
			{
			//echo "update  irti_learning_plan_section set node_order='$i' where id='$value'";
			mysql_query("update  tbl_pkg_category set node_order='$i' where id='$value'");
			$i++;
			}
		}
		
	}
?>