<?php

	class Admin_exp_stays_details extends MY_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('form');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->model('admin_exp_stays_details_model');
			$this->load->model('admin_file_model');
		}
		
		public function index()
		{
		    if($this->session->userdata('id'))
			{
			  
			  $this->load->view('admin/exp_stays_details');
			}
			else
			{
			  redirect('admin');
			}
		}
		
		
		
		
		public function view_form($id=0)
		{
		    if($this->session->userdata('id'))
			{
			  $data['exp_cats']=$this->admin_exp_stays_details_model->exp_cats();
			  if($id)
			  {
			     $banner=$this->admin_exp_stays_details_model->get_id($id);
				 
				 $data['id']=$id;
				 $data['desti_list']=$this->admin_exp_stays_details_model->get_id_desti($banner->exp_cat_id);
				 $data['cat_id']=$banner->exp_cat_id;
				 $data['desti_id']=$banner->destination_id;
				/* $data['subtitle']=$blog->subtitle;*/
				 $data['cover_img']=$banner->cover_img;
				 $data['title']=$banner->title;
				 $data['pg_title']=$banner->pg_title;
				 $data['pg_desc']=$banner->pg_desc;
				 $data['descr']=$banner->descr;
				 $data['banner_img']=$banner->banner_img;
				 $data['price']=$banner->price;
				 $data['theme']=$banner->theme;
				 $data['location_type']=$banner->location_type;
				 $data['suitable_for']=$banner->suitable_for;
				 $data['meal_type']=$banner->meal_type;
				 $data['stays']=$banner->stays;
				 $data['hand_picked_pkg']=$banner->hand_picked_pkg;
				 
			  }
			  $this->load->view('admin/exp_details_form',$data);
			}
		  
		}
		
		
		public function edit_form($id)
		{
		  $q=$this->admin_exp_stays_details_model->edit_form($id);
		  redirect('admin_exp_stays_details');
		  
		}
		
		public function submit_form()
		{
		   $exp_id=$this->admin_exp_stays_details_model->submit_form();
		  redirect('admin_exp_stays_details/exp_tab/'.$exp_id);
		  
		}
		public function get_desti()
		{
		  $data['desti']=$this->admin_exp_stays_details_model->get_desti();
		  $this->load->view('admin/list_desti_exp',$data);
		}
		
		public function exp_tab($exp_id)
		{
		  $data['exp_id']=$exp_id;
		  $data['exp_cat_details']=$this->admin_exp_stays_details_model->get_exp_cat_id($exp_id);
		  $data['about']=$this->admin_exp_stays_details_model->get_exp_detail_about($exp_id);
		  $data['about_gallery']=$this->admin_exp_stays_details_model->get_exp_detail_about_gallery($exp_id);
		  $data['gallery']=$this->admin_exp_stays_details_model->get_exp_detail_gallery($exp_id);
		  $data['amn']=$this->admin_exp_stays_details_model->get_exp_detail_amn($exp_id);
		  $data['inclu']=$this->admin_exp_stays_details_model->get_exp_detail_inclu($exp_id);
		  $data['info']=$this->admin_exp_stays_details_model->get_exp_detail_info($exp_id);
		  $this->load->view('admin/exp_tab',$data);
		}
		public function remove_pf_image()
	    {
	        echo  $id=$this->input->post('id');
		     $this->admin_exp_stays_details_model->remove_pjt_img();
		}
		public function remove_pf_image_gallery()
	    {
	        echo  $id=$this->input->post('id');
		     $this->admin_exp_stays_details_model->remove_pjt_img_gallery();
		}
		public function save_about()
		{
		  $this->admin_exp_stays_details_model->save_about();
		}
		public function resize_crop_image($max_width, $max_height, $source_file, $dst_dir, $quality = 80)
       { 
		$imgsize = getimagesize($source_file);
		$width = $imgsize[0];
		$height = $imgsize[1];
		$mime = $imgsize['mime'];
	 
		switch($mime){
			case 'image/gif':
				$image_create = "imagecreatefromgif";
				$image = "imagegif";
				break;
	 
			case 'image/png':
				$image_create = "imagecreatefrompng";
				$image = "imagepng";
				$quality = 7;
				break;
	 
			case 'image/jpeg':
				$image_create = "imagecreatefromjpeg";
				$image = "imagejpeg";
				$quality = 80;
				break;
	 
			default:
				return false;
				break;
		}
		 
		$dst_img = imagecreatetruecolor($max_width, $max_height);
		$src_img = $image_create($source_file);
		 
		$width_new = $height * $max_width / $max_height;
		$height_new = $width * $max_height / $max_width;
		//if the new width is greater than the actual width of the image, then the height is too large and the rest cut off, or vice versa
		if($width_new > $width){
			//cut point by height
			$h_point = (($height - $height_new) / 2);
			//copy image
			imagecopyresampled($dst_img, $src_img, 0, 0, 0, $h_point, $max_width, $max_height, $width, $height_new);
		}else{
			//cut point by width
			$w_point = (($width - $width_new) / 2);
			imagecopyresampled($dst_img, $src_img, 0, 0, $w_point, 0, $max_width, $max_height, $width_new, $height);
		}
		 
		$image($dst_img, $dst_dir, $quality);
	 
		if($dst_img)imagedestroy($dst_img);
		if($src_img)imagedestroy($src_img);
      }
		
		public function post_img_about()
	    {
			//$title = $this->input->get('title');
			//echo $folderName = $this->input->post('title');
			$exp_id=$this->input->post('exp_id');
			$exp_cat_id=$this->input->post('exp_cat_id');
            $pathToUpload = 'uploads/';
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
						while(file_exists($pathToUpload."$filename"))
						{			
							
							$j++;					
							$filename=$str.$j.".".$ext;
							
							
						}						
										
				}
			}
			$newtarget_file = $config['upload_path'] . $filename;
			move_uploaded_file($_FILES["file"]["tmp_name"], $newtarget_file);
			$big_path='uploads/'.$filename;
			$thumb_path='uploads/'.$filename;
			$newName='uploads/big/'.$filename;
			copy($big_path , $newName);
			$this->resize_crop_image('476', '347', $big_path, $thumb_path);
			$this->load->library('upload', $config);
			
			$upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
			$file_name = basename($_FILES["file"]["name"]);
			
			//$this->db->set('project_temp_id', $portfolioid); 
			
			//$this->db->set('image', $file_name); 
			$filename=base_url($pathToUpload.''.$filename);
			$data=array('exp_id'=>$exp_id,'exp_cat_id'=>$exp_cat_id,'image'=>$filename); 
			$this->db->insert('tbl_exp_stays_about_images',$data); 
			$img_id = $this->db->insert_id();
			echo $img_id;
		 

		
	  }
		
	   public function post_img_gallery()
	    {
			//$title = $this->input->get('title');
			//echo $folderName = $this->input->post('title');
			$exp_id=$this->input->post('exp_id');
			$exp_cat_id=$this->input->post('exp_cat_id');
            $pathToUpload = 'uploads/';
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
						while(file_exists($pathToUpload."$filename"))
						{			
							
							$j++;					
							$filename=$str.$j.".".$ext;
							
							
						}						
										
				}
			}
			$newtarget_file = $config['upload_path'] . $filename;
			move_uploaded_file($_FILES["file"]["tmp_name"], $newtarget_file);
			$big_path='uploads/'.$filename;
			$thumb_path='uploads/'.$filename;
			$newName='uploads/big/'.$filename;
			copy($big_path , $newName);
			$this->resize_crop_image('476', '347', $big_path, $thumb_path);
			$this->load->library('upload', $config);
			
			$upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
			$file_name = basename($_FILES["file"]["name"]);
			
			//$this->db->set('project_temp_id', $portfolioid); 
			
			//$this->db->set('image', $file_name); 
			$filename=base_url($pathToUpload.''.$filename);
			$data=array('exp_id'=>$exp_id,'exp_cat_id'=>$exp_cat_id,'file'=>$filename,'file_type'=>'image','status'=>0); 
			$this->db->insert('tbl_exp_stays_gallery',$data); 
			$img_id = $this->db->insert_id();
			echo $img_id;
		 

		
	  }	
		
	  public function save_gallery()
	  {
	       $this->admin_exp_stays_details_model->save_gallery();
	  }
	  
	  public function save_amn()
	  {
	       $this->admin_exp_stays_details_model->save_amn();
	  }	
	  public function save_info()
	  {
	       $this->admin_exp_stays_details_model->save_info();
	  }
	  public function save_inclu()
	  {
	       $this->admin_exp_stays_details_model->save_inclu();
	  }
	  public function load_data($limitStart)
	  {
		    //echo $limitStart;
			$data['exps']= $this->admin_exp_stays_details_model->get($limitStart);
			$this->load->view('admin/load_data_exp_stays_details',$data);
	   }
		
	  public function remove()
		{
		
		   $q=$this->admin_exp_stays_details_model->remove();
		   redirect('admin_exp_stays_details');
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
			mysql_query("update  tbl_exp_stays_details set node_order='$i' where id='$value'");
			$i++;
			}
		}
		
	}
?>