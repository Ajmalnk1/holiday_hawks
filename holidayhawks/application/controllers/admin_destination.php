<?php

	class Admin_destination extends MY_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('form');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->model('admin_destination_model');
			$this->load->model('admin_file_model');
		}
		
		public function index()
		{
		    if($this->session->userdata('id'))
			{
			  
			  $this->load->view('admin/destination');
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
			  $data['home_text']= $this->admin_destination_model->pkg_text();
			  $this->load->view('admin/destination_pkg_text',$data);
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
			
			  
			  
			     $text=$this->admin_destination_model->get_pkg_text();
				 $data['id']=$text->id;
				 /*$data['title']=$blog->title;
				 $data['subtitle']=$blog->subtitle;*/
				 $data['title']=$text->title;
				 $data['descr']=$text->descr;
				 
				 $data['type']=$text->type;
				 
			  
			  $this->load->view('admin/destination_pkg_text_form',$data);
			}
		  
		}
		public function edit_pkg_text_form()
		{
		  $q=$this->admin_destination_model->edit_pkg_text_form();
		  redirect('admin_destination/pkg_text');
		  
		}
		
		
		public function home_text()
		{
		    if($this->session->userdata('id'))
			{
			  $data['home_text']= $this->admin_destination_model->home_text();
			  $this->load->view('admin/destination_home_text',$data);
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
			
			  
			  
			     $text=$this->admin_destination_model->get_text();
				 $data['id']=$text->id;
				 /*$data['title']=$blog->title;
				 $data['subtitle']=$blog->subtitle;*/
				 $data['title']=$text->title;
				 $data['descr']=$text->descr;
				 $data['type']=$text->type;
				 $data['img']=$text->img;
			  
			  $this->load->view('admin/destination_home_text_form',$data);
			}
		  
		}
		public function edit_text_form()
		{
		  $q=$this->admin_destination_model->edit_text_form();
		  redirect('admin_destination/home_text');
		  
		}
		
		
		public function view_form($id=0)
		{
		    if($this->session->userdata('id'))
			{
			  //echo $_SERVER['DOCUMENT_ROOT'];
			  $data='';
			  $data['pkgs']= $this->admin_destination_model->get_pkgs();
			  $data['activities']= $this->admin_destination_model->get_activities();
			  $data['exps']= $this->admin_destination_model->get_exp();
			  if($id)
			  {
			     $desti=$this->admin_destination_model->get_id($id);
				 $pkgs=$this->admin_destination_model->get_pkgs_desti($id);
				 $acts=$this->admin_destination_model->get_acts_desti($id);
				 $exps=$this->admin_destination_model->get_exps_desti($id);
				 $data['id']=$id;
				 /*$data['title']=$blog->title;
				 $data['subtitle']=$blog->subtitle;*/
				 $data['img']=$desti->img;
				 $data['name']=$desti->name;
				 $data['content']=$desti->content;
				 $data['pg_title']=$desti->pg_title;
				 $data['pg_desc']=$desti->pg_desc;
				 $data['banner']=$desti->banner;
				 $data['pkg_desti']=$pkgs;
				 $data['act_desti']=$acts;
				 $data['exp_desti']=$exps;
				 $data['is_home']=$desti->display_home;
				 $data['exp_desc']=$desti->exp_desc;
				 $data['act_desc']=$desti->act_desc;
				 $data['hand_picked_desc']=$desti->hand_picked_desc;
				 
			  }
			  $this->load->view('admin/destination_form',$data);
			}
		  
		}
		
		
		public function edit_form($id)
		{
		  $q=$this->admin_destination_model->edit_form($id);
		  redirect('admin_destination');
		  
		}
		
		public function submit_form()
		{
		  $q=$this->admin_destination_model->submit_form();
		  redirect('admin_destination');
		  
		}
		
		public function delete_desti_img()
		{
		 $q=$this->admin_destination_model->delete_desti_img();
		}
		
		
		public function load_data($limitStart)
		{
		    //echo $limitStart;
			$data['destinations']= $this->admin_destination_model->get($limitStart);
			$this->load->view('admin/load_data_destination',$data);
		}
		
		public function remove()
		{
		
		   $q=$this->admin_destination_model->remove();
		   redirect('admin_destination');
		}
		
		public function sort_destination()
		{
		
		    $i = 1;
			//explode('cat[]=',$_POST['cat_id'] ;
			$cat_id=str_replace('section[]=', '', $_POST['cat_id']);
			$cat_id=explode('&',$cat_id);
			foreach ($cat_id as $value) 
			{
			//echo "update  irti_learning_plan_section set node_order='$i' where id='$value'";
			mysql_query("update  tbl_destination set node_order='$i' where id='$value'");
			$i++;
			}
		}
		
	}
?>