<?php

	class Admin_file extends MY_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('form');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->model('admin_file_model');
		}
		
		public function index()
		{
		    if($this->session->userdata('id'))
			{
			  
			  $this->load->view('admin/images');
			}
			else
			{
			  redirect('admin');
			}
		}
		
		
		public function load_data_images($limitStart)
		{
		    
			$q=$this->admin_file_model->load_data_images($limitStart);
			$q_folder=$this->admin_file_model->load_data_images_folder($limitStart);
			$total_count=$this->admin_file_model->total_count();
			$data['images']=$q;$data['images_folder']=$q_folder;
			$data['total_count']=$total_count;
			$data['page_count']=$limitStart;
			$this->load->view('admin/load_data_images',$data);
		}
		
		public function load_data_images_folder($limitStart)
		{
		    
			$q=$this->admin_file_model->load_data_images_folder_all($limitStart);
			$data['fodler_name']=$this->input->post('foldername');;
			//$q_folder=$this->admin_file_model->load_data_images_folder($limitStart);
			//$total_count=$this->admin_file_model->total_count();
			$data['images']=$q;
			
			//$data['images_folder']=$q_folder;
			//$data['total_count']=$total_count;
			$this->load->view('admin/load_data_images_folder',$data);
		}
		
		public function sort_projects()
		{
		
		    $i = 1;
			//explode('cat[]=',$_POST['cat_id'] ;
			$cat_id=str_replace('cat[]=', '', $_POST['cat_id']);
			$cat_id=explode('&',$cat_id);
			foreach ($cat_id as $value) 
			{
			  $cat_id_ar=explode('$$',$value);
			  $pjtid=$cat_id_ar[0];
			  $catid=$cat_id_ar[1];
			 // echo "update tbl_projects set node_order='$i' where id='$pjtid' and cat_id='$catid'";
			  $this->db->query("update tbl_projects set node_order='$i' where id='$pjtid' and cat_id='$catid'");
			  $i++;
			}
		}
		
		
		
		
		
		public function view_form_projects($id=0,$cat_id_new)
		{
		    if($this->session->userdata('id'))
			{
			  $data='';
			  if($id)
			  {
			   $q=$this->admin_projects_model->get($id);
			   $data['title']=$q->title;
			   $data['descr']=$q->descr;
			   $data['id']=$id;
			   $data['cat_id']=$q->cat_id;
			   $data['project_temp_id']=$q->project_temp_id;
			   $data['cover_img']=$q->cover_img;
			   $data['sector']=$q->sector;
			   $data['location']=$q->location;
			   $data['time_scale']=$q->time_scale;
			   $data['project_scope']=$q->project_scope;
			   $data['imgs']=$this->admin_projects_model->get_img($q->project_temp_id);
			   
			   
			  }
			  $data['cat']=$this->admin_projects_model->get_cat_id($cat_id_new);
			 // $data['cats']=$this->admin_projects_model->get_cats();
			 
			  $this->load->view('admin/project_form',$data);
			}
			else
			{
			  redirect('admin');
			}
		  
		}
		
	    public function remove_pf_image()
	    {
	         $id=$this->input->post('id');
		     $this->admin_file_model->remove_pjt_img();
		}	
		
	    public function post_projects()
	    {
			//$title = $this->input->get('title');
			echo $folderName = $this->input->post('title');
            $pathToUpload = 'uploads/images/' . $folderName.'/';
			if ( ! file_exists($pathToUpload) )
			{
				$create = mkdir($pathToUpload, 0777);
				if ( !$create)
				return;
			}
			$config['upload_path'] = $pathToUpload;
			$config['allowed_types'] = 'jpg|png';
			$target_file = $config['upload_path'] . basename($_FILES["file"]["name"]);
			$filename =basename($_FILES['file']['name']);
			$basename=$filename;
		
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			if($_FILES["file"]["name"])
			{
			  if(file_exists($pathToUpload."$filename"))
				{
						//Rename the file automatically by appending 1,2,3...with the basename
						//File Extension
							$efilename = explode('.', $filename);
							$ext = $efilename[count($efilename) - 1];			
							//Index of .
							$pos=strpos($filename,".");
							$str=substr($basename,0,$pos);			
						$j=0;	
						while(file_exists($pathToUpload."uploads/images/filename"))
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
			if($folderName)
			{
			  $folder_filename=$folderName.'/'.$file_name;
			}
			else
			{
			  $folder_filename=$filename;
			}
			$this->db->set('name', $folder_filename); 
			$this->db->set('folder', $folderName); 
			//$this->db->set('added_date','UTC_TIMESTAMP()',FALSE ); 
			$this->db->insert('tbl_image'); 
			
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
		
		public function delete_projects($cat_idnew)
		{
		 $q=$this->admin_projects_model->delete_projects();
		 redirect('admin_projects/index/'.$cat_idnew);
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