<?php
/**
*
*/
error_reporting(0);
class admin_destination_model extends CI_Model
{

   public function __construct()
   {
       parent::__construct();
       $this->load->database();
   }
   
   public function pkg_text()
   {
      $this->db->where('type','destination');
	  return $q=$this->db->get('tbl_pkg_text')->row();
   }
   
   public function get_pkg_text()
   {
     return $query = $this->db->get_where('tbl_pkg_text', array('type'=>'destination'))->row();
   }
   
   public function delete_desti_img()
   {
     $type=$this->input->post('type');
	 $this->db->where('type',$type);
	 $data=array('img'=>'');
	 $this->db->update('tbl_home_text',$data);
   }
   
   public function edit_pkg_text_form()
   {
       
	   
	   $d['title']=mysql_real_escape_string($this->input->post('title')).trim();
	   $d['descr']=mysql_real_escape_string($this->input->post('descr')).trim();
       $this->db->where('type', 'destination');
	   $this->db->update('tbl_pkg_text',$d);
   }
   
   
   
   
    public function home_text()
   {
      $this->db->where('type','destination');
	  return $q=$this->db->get('tbl_home_text')->row();
   }
   
   public function get_text()
   {
     return $query = $this->db->get_where('tbl_home_text', array('type'=>'destination'))->row();
   }
   
   public function edit_text_form()
   {
       $d['title']=mysql_real_escape_string($this->input->post('title')).trim();
	   $d['descr']=mysql_real_escape_string($this->input->post('descr')).trim();
	   if($_FILES['image']['error'] == UPLOAD_ERR_OK)
	   {
	    $file_name = $_FILES['image']['name'];
		$file_size =$_FILES['image']['size'];
		$file_tmp =$_FILES['image']['tmp_name'];
		$file_type=$_FILES['image']['type'];   
		$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
		$extensions = array("jpeg","jpg","png"); 		
		if(in_array($file_ext,$extensions )=== false){
			$errors[]="extension not allowed, please choose a JPEG or PNG file.";
		}
		
		
						
		 if(empty($errors)==true){
			
			if(file_exists("uploads//$file_name"))
			{
			//Rename the file automatically by appending 1,2,3...with the basename
			//File Extension
				$efilename = explode('.', $file_name);
				$ext = $efilename[count($efilename) - 1];			
				//Index of .
				$pos=strpos($file_name,".");
				$str=substr($file_name,0,$pos);			
			$j=0;	
			while(file_exists("uploads//$file_name"))
			{			
				
				$j++;					
				$file_name=$str.$j.".".$ext;
				
				
			 }						
							
		    }
			
			 move_uploaded_file($file_tmp,"uploads/".$file_name);
			 $big_path='uploads/'.$file_name;
			 $thumb_path='uploads/'.$file_name;
			 $this->resize_crop_image(382, 200, $big_path, $thumb_path);
			 $img_cover=base_url("uploads/".$file_name);
			 $data = array(
						'img'=>$img_cover
					);
		    $this->db->where('type', 'destination');
			$this->db->update('tbl_home_text',$data);
		    }
			
		  }
       $this->db->where('type', 'destination');
	   $this->db->update('tbl_home_text',$d);
   }
   
   
   
   public function get_pkgs()
   {
      $this->db->order_by('name', 'asc');
	  $query = $this->db->get('tbl_pkg_category')->result();
	  return $query;
	  
   }
   public function get_pkgs_desti($id)
   {
      $this->db->where('destination_id',$id);
	  $query = $this->db->get('tbl_destination_pkg')->result();
	  //echo $this->db->last_query();
	  return $query;
	  
   }
   
   public function get_acts_desti($id)
   {
      $this->db->where('destination_id',$id);
	  $query = $this->db->get('tbl_destination_activities')->result();
	  //echo $this->db->last_query();
	  return $query;
   }
   
   public function get_exps_desti($id)
   {
      $this->db->where('destination_id',$id);
	  $query = $this->db->get('tbl_destination_exp_stays')->result();
	  //echo $this->db->last_query();
	  return $query;
   }
   
   public function get_activities()
   {
      $this->db->order_by('name', 'asc');
	  $query = $this->db->get('tbl_activities')->result();
	  return $query;
	  
   }
   public function get_exp()
   {
      $this->db->order_by('name', 'asc');
	  $query = $this->db->get('tbl_exp_stays')->result();
	  return $query;
	  
   }
   public function get($limitStart)
   {
     //echo $limitStart;
	 //echo "select a.*,b.pgname from tbl_banner a left join tbl_pages b on a.page_id=b.pageid order by node_order asc limit $limitStart, 100 ";
	 
	 $q = $this->db->query("select * from tbl_destination order by node_order asc limit $limitStart, 30");
	 if($q->num_rows()>0)
	 {
	   return $q->result();
	 }
	 
   }
   
   
   public function remove()
   {
   
     $id=$this->input->post('id');
	 //echo "delete from tbl_banner where id='$id'";
	 $this->db->query("delete from tbl_destination where id='$id'"); 
				
   }
   
  
   
   
   public function get_id($id)
   {
    return $query = $this->db->get_where('tbl_destination', array('id'=>$id))->row();
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
   
   public function submit_form()
   {
      
	    // $title=mysql_real_escape_string($this->input->post('title').trim());
	    //$subtitle=mysql_real_escape_string($this->input->post('subtitle').trim());
		
		$name=mysql_real_escape_string($this->input->post('name'));
		$pg_title=mysql_real_escape_string($this->input->post('pg_title'));
		$pg_desc=mysql_real_escape_string($this->input->post('pg_desc'));
		$descr=mysql_real_escape_string($this->input->post('descr'));
		$act_desc=mysql_real_escape_string($this->input->post('act_desc')).trim();
	    $exp_desc=mysql_real_escape_string($this->input->post('exp_desc')).trim();
	    $hand_picked_desc=mysql_real_escape_string($this->input->post('hand_picked_desc')).trim();
		$is_home=$_POST['is_home'];
		$pkg_cat=$_POST['pkg_cat'];
		$activities=$_POST['activities'];
		$exps=$_POST['exps'];
		$q=$this->db->query("select MAX(node_order) as max_order from tbl_destination")->row();
	    $node_order=$q->max_order+1;
	    //$result = $res1->row();
        //$node_order = $result + 1;
	   //$image=$_FILES['image']['name'];
	    
		if($_FILES['image']['error'] == UPLOAD_ERR_OK)
		{
			$file_name = $_FILES['image']['name'];
			$file_size =$_FILES['image']['size'];
			$file_tmp =$_FILES['image']['tmp_name'];
			$file_type=$_FILES['image']['type'];   
			$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
			$extensions = array("jpeg","jpg","png"); 		
			if(in_array($file_ext,$extensions )=== false){
				$errors[]="extension not allowed, please choose a JPEG or PNG file.";
			}
			
			
							
			 if(empty($errors)==true){
				
				if(file_exists("uploads//$file_name"))
				{
				//Rename the file automatically by appending 1,2,3...with the basename
				//File Extension
					$efilename = explode('.', $file_name);
					$ext = $efilename[count($efilename) - 1];			
					//Index of .
					$pos=strpos($file_name,".");
					$str=substr($file_name,0,$pos);			
				$j=0;	
				while(file_exists("uploads//$file_name"))
				{			
					
					$j++;					
					$file_name=$str.$j.".".$ext;
					
					
				}						
								
			  }
				
				move_uploaded_file($file_tmp,"uploads/".$file_name);
				$big_path='uploads/'.$file_name;
			    $thumb_path='uploads/'.$file_name;
			    $this->resize_crop_image(476, 347, $big_path, $thumb_path);
				$img_cover=base_url("uploads/".$file_name);
				//$this->db->query("delete from tbl_banner where page_id='$page_id'"); 
			 }
			  
		  }
		  if($_FILES['image_banner']['error'] == UPLOAD_ERR_OK)
		  {
			$file_name1 = $_FILES['image_banner']['name'];
			$file_size1 =$_FILES['image_banner']['size'];
			$file_tmp1 =$_FILES['image_banner']['tmp_name'];
			$file_type1=$_FILES['image_banner']['type'];   
			$file_ext1=strtolower(end(explode('.',$_FILES['image_banner']['name'])));
			$extensions1 = array("jpeg","jpg","png"); 		
			if(in_array($file_ext1,$extensions1 )=== false){
				$errors[]="extension not allowed, please choose a JPEG or PNG file.";
			}
			
			
							
			 if(empty($errors)==true){
				
				if(file_exists("uploads//$file_name1"))
				{
				//Rename the file automatically by appending 1,2,3...with the basename
				//File Extension
					$efilename1 = explode('.', $file_name1);
					$ext1 = $efilename1[count($efilename1) - 1];			
					//Index of .
					$pos1=strpos($file_name1,".");
					$str1=substr($file_name1,0,$pos1);			
				$k=0;	
				while(file_exists("uploads//$file_name1"))
				{			
					
					$k++;					
					$file_name1=$str1.$k.".".$ext1;
					
					
				}						
								
			  }
				
				move_uploaded_file($file_tmp1,"uploads/".$file_name1);
				$big_path1='uploads/'.$file_name1;
			    $thumb_path1='uploads/'.$file_name1;
			    $this->resize_crop_image(1948, 710, $big_path1, $thumb_path1);
				$img_cover1=base_url("uploads/".$file_name1);
				//$this->db->query("delete from tbl_banner where page_id='$page_id'"); 
			 }
			  
		  }
		  
		  
		  
		  if($img_cover&&$img_cover1)
		  {
		      $data = array(
						
						
						'name'=>$name,
						'content'=>$descr,
						'img'=>$img_cover,
						'banner'=>$img_cover1,
						'pg_title'=>$pg_title,
						'pg_desc'=>$pg_desc,
						'display_home'=>$is_home,
						'act_desc'=>$act_desc,
						'exp_desc'=>$exp_desc,
						'hand_picked_desc'=>$hand_picked_desc,
						'node_order'=>$node_order
						
					);
			  $this->db->insert('tbl_destination',$data);
			  $destination_id=$this->db->insert_id();
			  foreach($pkg_cat as $pkg_val)
			  {
			     //echo $pkg_val;
				 $data1=array('destination_id'=>$destination_id,'pkg_id'=>$pkg_val);
				 $this->db->insert('tbl_destination_pkg',$data1);
			  }
			  foreach($activities as $act_val)
			  {
			     $data2=array('destination_id'=>$destination_id,'activities_id'=>$act_val);
				 $this->db->insert('tbl_destination_activities',$data2);
			  }
			  foreach($exps as $exps_val)
			  {
			     $data3=array('destination_id'=>$destination_id,'exp_id'=>$exps_val);
				 $this->db->insert('tbl_destination_exp_stays',$data3);
			  }
			  
			  
		} 
        
}  
   
   
   public function edit_form($id)
   {
        $name=mysql_real_escape_string($this->input->post('name'));
		$pg_title=mysql_real_escape_string($this->input->post('pg_title'));
		$pg_desc=mysql_real_escape_string($this->input->post('pg_desc'));
		$descr=mysql_real_escape_string($this->input->post('descr'));
		$pkg_cat=$_POST['pkg_cat'];
		$activities=$_POST['activities'];
		$exps=$_POST['exps'];
	    $is_home=$_POST['is_home'];
	    $act_desc=mysql_real_escape_string($this->input->post('act_desc')).trim();
	    $exp_desc=mysql_real_escape_string($this->input->post('exp_desc')).trim();
	    $hand_picked_desc=mysql_real_escape_string($this->input->post('hand_picked_desc')).trim();
	   
       if($_FILES['image']['error'] == UPLOAD_ERR_OK)
	   {
	    $file_name = $_FILES['image']['name'];
		$file_size =$_FILES['image']['size'];
		$file_tmp =$_FILES['image']['tmp_name'];
		$file_type=$_FILES['image']['type'];   
		$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
		$extensions = array("jpeg","jpg","png"); 		
		if(in_array($file_ext,$extensions )=== false)
		{
			$errors[]="extension not allowed, please choose a JPEG or PNG file.";
		}
		
		
						
		 if(empty($errors)==true){
			
			if(file_exists("uploads//$file_name"))
			{
			//Rename the file automatically by appending 1,2,3...with the basename
			//File Extension
				$efilename = explode('.', $file_name);
				$ext = $efilename[count($efilename) - 1];			
				//Index of .
				$pos=strpos($file_name,".");
				$str=substr($file_name,0,$pos);			
			$j=0;	
			while(file_exists("uploads//$file_name"))
			{			
				
				$j++;					
				$file_name=$str.$j.".".$ext;
				
				
			 }						
							
		    }
			
			 move_uploaded_file($file_tmp,"uploads/".$file_name);
			 $big_path='uploads/'.$file_name;
			 $thumb_path='uploads/'.$file_name;
			 $this->resize_crop_image(476, 347, $big_path, $thumb_path);
			 $img_cover=base_url("uploads/".$file_name);
			 $data = array(
						'img'=>$img_cover
					);
		    $this->db->where('id', $id);
			$this->db->update('tbl_destination',$data);
		    }
			
		  }
		  
	   if($_FILES['image_banner']['error'] == UPLOAD_ERR_OK)
	   {
			$file_name1 = $_FILES['image_banner']['name'];
			$file_size1 =$_FILES['image_banner']['size'];
			$file_tmp1 =$_FILES['image_banner']['tmp_name'];
			$file_type1=$_FILES['image_banner']['type'];   
			$file_ext1=strtolower(end(explode('.',$_FILES['image_banner']['name'])));
			$extensions1 = array("jpeg","jpg","png"); 		
			if(in_array($file_ext1,$extensions1 )=== false){
				$errors[]="extension not allowed, please choose a JPEG or PNG file.";
			}
			
			
							
			 if(empty($errors)==true){
				
				if(file_exists("uploads//$file_name1"))
				{
				//Rename the file automatically by appending 1,2,3...with the basename
				//File Extension
					$efilename1 = explode('.', $file_name1);
					$ext1 = $efilename1[count($efilename1) - 1];			
					//Index of .
					$pos1=strpos($file_name1,".");
					$str1=substr($file_name1,0,$pos1);			
				$j=0;	
				while(file_exists("uploads//$file_name1"))
				{			
					
					$j++;					
					$file_name1=$str1.$j.".".$ext1;
					
					
				}						
								
			  }
				
				move_uploaded_file($file_tmp1,"uploads/".$file_name1);
				$big_path1='uploads/'.$file_name1;
			    $thumb_path1='uploads/'.$file_name1;
			    $this->resize_crop_image(1948, 710, $big_path1, $thumb_path1);
				$img_cover1=base_url("uploads/".$file_name1);
				//$this->db->query("delete from tbl_banner where page_id='$page_id'"); 
				$data = array(
						'banner'=>$img_cover1
					);
		    $this->db->where('id', $id);
			$this->db->update('tbl_destination',$data);
			 }
			  
		  }
		  
		$data1 = array(
						'name'=>$name,
						'content'=>$descr,
						'pg_desc'=>$pg_desc,
						'pg_title'=>$pg_title,
						'content'=>$descr,
						'display_home'=>$is_home,
						'act_desc'=>$act_desc,
						'exp_desc'=>$exp_desc,
						'hand_picked_desc'=>$hand_picked_desc
						
					);
		$this->db->where('id', $id);
		$this->db->update('tbl_destination',$data1);
		
		$this->db->where('destination_id',$id);
        $this->db->delete('tbl_destination_pkg');
		
		$this->db->where('destination_id',$id);
        $this->db->delete('tbl_destination_activities');
		
		$this->db->where('destination_id',$id);
        $this->db->delete('tbl_destination_exp_stays');
		
		foreach($pkg_cat as $pkg_val)
		{
		    $data1=array('destination_id'=>$id,'pkg_id'=>$pkg_val);
			$this->db->insert('tbl_destination_pkg',$data1); 
		} 
		foreach($activities as $act_val)
		{
			 $data2=array('destination_id'=>$id,'activities_id'=>$act_val);
			 $this->db->insert('tbl_destination_activities',$data2);
		}
		foreach($exps as $exps_val)
		{
			 $data3=array('destination_id'=>$id,'exp_id'=>$exps_val);
			 $this->db->insert('tbl_destination_exp_stays',$data3);
		}
		 	 
		  
		 
		 
   }
   
   
   
   

   
}
?>