<?php

	class Admin_activities extends MY_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('form');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->model('admin_activities_model');
			$this->load->model('admin_file_model');
		}
		
		public function index()
		{
		    if($this->session->userdata('id'))
			{
			  
			  $this->load->view('admin/activities');
			}
			else
			{
			  redirect('admin');
			}
		}
		public function pkg_text()
		{
		    if($this->session->userdata('id'))
			{
			  $data['home_text']= $this->admin_activities_model->pkg_text();
			  $this->load->view('admin/act_pkg_text',$data);
			}
			else
			{
			  redirect('admin');
			}
		}
		
		public function view_pkg_text_form()
		{
		    if($this->session->userdata('id'))
			{
			  //echo $_SERVER['DOCUMENT_ROOT'];
			  $data='';
			
			  
			  
			     $text=$this->admin_activities_model->get_pkg_text();
				 $data['id']=$text->id;
				 /*$data['title']=$blog->title;
				 $data['subtitle']=$blog->subtitle;*/
				 
				 $data['descr']=$text->act_desc;
				 $data['type']=$text->type;
				 
			  
			  $this->load->view('admin/act_pkg_text_form',$data);
			}
		  
		}
		public function edit_pkg_text_form()
		{
		  $q=$this->admin_activities_model->edit_pkg_text_form();
		  redirect('admin_activities/pkg_text');
		  
		}
		
		
		
		
		
		public function home_text()
		{
		    if($this->session->userdata('id'))
			{
			  $data['home_text']= $this->admin_activities_model->home_text();
			  $this->load->view('admin/act_home_text',$data);
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
			
			  
			  
			     $text=$this->admin_activities_model->get_text();
				 $data['id']=$text->id;
				 /*$data['title']=$blog->title;
				 $data['subtitle']=$blog->subtitle;*/
				 $data['title']=$text->title;
				 $data['descr']=$text->descr;
				$data['type']=$text->type;
				 
			  
			  $this->load->view('admin/act_home_text_form',$data);
			}
		  
		}
		public function edit_text_form()
		{
		  $q=$this->admin_activities_model->edit_text_form();
		  redirect('admin_activities/home_text');
		  
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
			     $banner=$this->admin_activities_model->get_id($id);
				 $data['id']=$id;
				 /*$data['title']=$blog->title;
				 $data['subtitle']=$blog->subtitle;*/
				 $data['img']=$banner->img;
				 $data['name']=$banner->name;
				 $data['descr']=$banner->descr;
				 $data['banner']=$banner->banner;
				 $data['pg_title']=$banner->pg_title;
				 $data['pg_desc']=$banner->pg_desc;
				 $data['detail_img']=$banner->detail_img;
				 $data['detail_name']=$banner->detail_name;
				 $data['detail_descr1']=$banner->detail_descr1;
				 $data['detail_descr2']=$banner->detail_descr2;
				 $data['is_home']=$banner->display_home;
				 
			  }
			  $this->load->view('admin/activities_form',$data);
			}
		  
		}
		
		
		public function edit_form($id)
		{
		  $q=$this->admin_activities_model->edit_form($id);
		  redirect('admin_activities');
		  
		}
		
		public function submit_form()
		{
		  $q=$this->admin_activities_model->submit_form();
		  redirect('admin_activities');
		  
		}
		
		
		
		public function load_data($limitStart)
		{
		    //echo $limitStart;
			$data['exps']= $this->admin_activities_model->get($limitStart);
			$this->load->view('admin/load_data_activities',$data);
		}
		
		public function remove()
		{
		
		   $q=$this->admin_activities_model->remove();
		   redirect('admin_activities');
		}
		
		public function sort_exp_stays()
		{
		
		    $i = 1;
			//explode('cat[]=',$_POST['cat_id'] ;
			$cat_id=str_replace('section[]=', '', $_POST['cat_id']);
			$cat_id=explode('&',$cat_id);
			foreach ($cat_id as $value) 
			{
			//echo "update  irti_learning_plan_section set node_order='$i' where id='$value'";
			mysql_query("update  tbl_activities set node_order='$i' where id='$value'");
			$i++;
			}
		}
		
	}
?>