<?php

	class Admin_blog extends MY_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('form');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->model('admin_blog_model');
			$this->load->model('admin_blog_category_model');
		}
		
		public function index()
		{
		    if($this->session->userdata('id'))
			{
			  
			  $this->load->view('admin/blog');
			}
			else
			{
			  redirect('admin');
			}
		}
		
		
		public function load_data_blog($limitStart)
		{
		    
			$data['blogs']= $this->admin_blog_model->get_all_blog($limitStart);
			$this->load->view('admin/load_data_blog',$data);
		}
		
		public function sort_blog()
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
		}
		
		public function view_form_blog($id=0)
		{
		    if($this->session->userdata('id'))
			{
			  //echo $_SERVER['DOCUMENT_ROOT'];
			  $data='';
			  $data['cats']= $this->admin_blog_category_model->get_blog_category_view();
			  if($id)
			  {
			     $blog=$this->admin_blog_model->get_blog($id);
				 $data['id']=$blog->id;
				 $data['title']=$blog->title;
				 $data['subtitle']=$blog->subtitle;
				 $data['page_title']=$blog->page_title;
				 $data['page_desc']=$blog->page_desc;
				 $data['cover_img']=$blog->cover_img;
				 $data['banner_img']=$blog->banner_img;
				 $data['descr']=$blog->descr;
				 $data['cat_id']=$blog->cat_id;
				 
			  }
			  $this->load->view('admin/blog_form',$data);
			}
		  
		}
		
		
		
		
		
		
		
		
		public function submit_form()
		{
		  $q=$this->admin_blog_model->submit_form();
		  redirect('admin_blog');
		  
		}
		
		
		public function edit_form($id)
		{
		  $q=$this->admin_blog_model->edit_form($id);
		  redirect('admin_blog');
		  
		}
		
		public function remove_blog()
		{
		 $q=$this->admin_blog_model->remove_blog();
		 redirect('admin_blog');
		}
	    public function remove_pf_image()
	    {
	         $id=$this->input->post('id');
		     $this->admin_banner_model->remove_pjt_img();
		}	
		
	    public function post_projects()
	    {
			$portfolioid = $this->input->get('id');
			$config['upload_path'] = 'uploads/banner/';
			$config['allowed_types'] = 'jpg|png';
			$target_file = $config['upload_path'] . basename($_FILES["file"]["name"]);
			$filename =basename($_FILES['file']['name']);
			$basename=$filename;
		
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			if($_FILES["file"]["name"])
			{
			  if(file_exists("uploads/banner/$filename"))
				{
						//Rename the file automatically by appending 1,2,3...with the basename
						//File Extension
							$efilename = explode('.', $filename);
							$ext = $efilename[count($efilename) - 1];			
							//Index of .
							$pos=strpos($filename,".");
							$str=substr($basename,0,$pos);			
						$j=0;	
						while(file_exists("uploads/banner/$filename"))
						{			
							
							$j++;					
							$filename=$str.$j.".".$ext;
							
							
						}						
										
				}
			}
			$newtarget_file = $config['upload_path'] . $filename;
			move_uploaded_file($_FILES["file"]["tmp_name"], $newtarget_file);
			$this->load->library('upload', $config);
			
			$upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
			$file_name = basename($_FILES["file"]["name"]);
			
			//$this->db->set('project_temp_id', $portfolioid); 
			
			//$this->db->set('image', $file_name); 
			$this->db->set('name', $filename); 
			//$this->db->set('added_date','UTC_TIMESTAMP()',FALSE ); 
			$this->db->insert('tbl_banner'); 
			
			$img_id = $this->db->insert_id();
			echo $img_id;
		 

		
	  }
		
		
		/*public function submit_form($id=0)
		{
		  if($id==0)
		  {
		    
			  $this->admin_portfolio_category_model->insert();
			  redirect('admin_portfolio_category');
		  }
		  else
		  {
		    $this->admin_portfolio_category_model->edit($id);
			
		  }
		  
		}
		*/
		public function submit_form_projects($id=0,$cat_idnew)
		{
		  if($id==0)
		  {
		    
			  $this->admin_projects_model->insert_projects();
			  redirect(base_url('admin_projects/index/'.$cat_idnew));
		  }
		  else
		  {
		    $this->admin_projects_model->edit_projects($id);
			redirect(base_url('admin_projects/index/'.$cat_idnew));
			
		  }
		  
		}
		
		
		
		public function delete()
		{
		 $q=$this->admin_portfolio_category_model->delete();
		}
		
		public function get_img()
		{
		  $id = $this->input->get('id');
		  $q=$this->admin_projects_model->get_img($id);
		  $i=1;
		  foreach($q as $row)
		  { 
					if(!file_exists("uploads/projects/".$row->img)) continue;
			        $obj['name'] = base_url('uploads/projects/'.$row->img); 
			        $obj['size'] = filesize("uploads/projects/".$row->img); 
					$obj['id'] = $row->id; 
			        $d[$i++] = $obj; 
		  }
		  $data['images'] = $d;
		  return $this->output
	        ->set_status_header(200)
	        ->set_content_type('application/json', 'utf-8')
	        ->set_output(json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
		}
		
		
		
		
	}
?>