<?php
/**
*
*/
error_reporting(0);
class admin_blog_model extends CI_Model
{

   public function __construct()
   {
       parent::__construct();
       $this->load->database();
   }
   
   
   public function get_all_blog($limitStart)
   {
	   //echo "select * from  tbl_banner  order by node_order asc limit $limitStart, 100"; 
		 $blogs = $this->db->query("select * from  tbl_blog  order by node_order asc limit $limitStart, 100")->result();
		 $s = array();
		 $j = 0;
		 foreach($blogs as $blog)
		 {
		    $temp  = array();
			$temp['title'] = $blog->title;
			$temp['subtitle'] = $blog->subtitle;
			$temp['page_title'] = $blog->page_title;
			$temp['page_desc'] = $blog->page_desc;
			$temp['id'] = $blog->id;
			$temp['descr'] = $blog->descr;
			$temp['cover_img'] = $blog->cover_img;
			$s[$j++] = $temp;
		 }
		 
		 return  $data['blogs'] = $s;
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
      
	    $title=mysql_real_escape_string($this->input->post('title').trim());
	    $subtitle=mysql_real_escape_string($this->input->post('subtitle').trim());
		$pg_title=mysql_real_escape_string($this->input->post('pg_title').trim());
		$pg_desc=mysql_real_escape_string($this->input->post('pg_desc').trim());
		$img_type_cover=$this->input->post('img_type_cover');
		$preview_cover=$this->input->post('preview');
		$img_type_banner=$this->input->post('img_type_banner');
		$preview_banner=$this->input->post('preview_banner');
	    $descr=$this->input->post('descr');
		$cat=$this->input->post('cat');
	    //$this->db->select_max('node_order');
        //$res1 = $this->db->get('tbl_blog');
		$q=$this->db->query("select MAX(node_order) as max_order from tbl_blog ")->row();
	    $node_order=$q->max_order+1;
	    //$result = $res1->row();
        //$node_order = $result + 1;
	   //$image=$_FILES['image']['name'];
	    if($_FILES['image_banner']['error'] == UPLOAD_ERR_OK)
		{
			$file_name1 = $_FILES['image_banner']['name'];
			$file_size1 =$_FILES['image_banner']['size'];
			$file_tmp1 =$_FILES['image_banner']['tmp_name'];
			$file_type1=$_FILES['image_banner']['type'];   
			$file_ext1=strtolower(end(explode('.',$_FILES['image_banner']['name'])));
			$extensions1 = array("jpeg","jpg","png"); 		
			if(in_array($file_ext1,$extensions1 )=== false){
				$errors1[]="extension not allowed, please choose a JPEG or PNG file.";
			}
			if($file_size1 > 1048576){
				$errors1[]='File size grater than 1 MB';
			}
			
							
			 if(empty($errors1)==true){
				
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
			$img_banner=base_url("uploads/".$file_name1);
		   }
	    }
		else if($img_type_banner=='banner') 
		{
		   $img_banner=$preview_banner;
		}
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
			if($file_size > 1048576){
				$errors[]='File size grater than 1 MB';
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
				$img_cover=base_url("uploads/".$file_name);
			  }
		  }
		  else if($img_type_cover=='cover')
		  {
		     
		      $img_cover=$preview_cover;
		  }
		  
			//$big_path='uploads/'.$file_name;
			//$thumb_path='uploads/blogs_cover/thumb/'.$file_name;
			//$this->resize_crop_image(684, true, $big_path, $thumb_path);
	 
	        $data = array(
						'cover_img'=>$img_cover,
						'title'=>$title,
						'subtitle'=>$subtitle,
						'descr'=>$descr,
						'cat_id'=>$cat,
						'page_title'=>$pg_title,
						'page_desc'=>$pg_desc,
						'page_desc'=>$pg_desc,
						'banner_img'=>$img_banner,
						'node_order'=>$node_order
						
					);
					$this->db->insert('tbl_blog',$data);					
	  
  
  
        
} 


 public function edit_form($id)
   {
      
	    $title=mysql_real_escape_string($this->input->post('title').trim());
	    $subtitle=mysql_real_escape_string($this->input->post('subtitle').trim());
		$pg_title=mysql_real_escape_string($this->input->post('pg_title').trim());
		$pg_desc=mysql_real_escape_string($this->input->post('pg_desc').trim());
	    $descr=$this->input->post('descr');
		$img_type_cover=$this->input->post('img_type_cover');
		$preview_cover=$this->input->post('preview');
		$img_type_banner=$this->input->post('img_type_banner');
		$preview_banner=$this->input->post('preview_banner');
		$cat=$this->input->post('cat');
	    $this->db->select_max('node_order');
        $res1 = $this->db->get('tbl_blog');
	    $result = $res1->row();
        $node_order = $result + 1;
		if($_FILES['image_banner']['error'] == UPLOAD_ERR_OK)
		{
			$file_name1 = $_FILES['image_banner']['name'];
			$file_size1 =$_FILES['image_banner']['size'];
			$file_tmp1 =$_FILES['image_banner']['tmp_name'];
			$file_type1=$_FILES['image_banner']['type'];   
			$file_ext1=strtolower(end(explode('.',$_FILES['image_banner']['name'])));
			$extensions1 = array("jpeg","jpg","png"); 		
			if(in_array($file_ext1,$extensions1 )=== false){
				$errors1[]="extension not allowed, please choose a JPEG or PNG file.";
			}
			if($file_size1 > 1048576){
				$errors1[]='File size grater than 1 MB';
			}
			
							
			 if(empty($errors1)==true){
				
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
				while(file_exists("uploads/$file_name1"))
				{			
					
					$k++;					
					$file_name1=$str1.$k.".".$ext1;
					
					
				}
			  }						
								
			  
				
			move_uploaded_file($file_tmp1,"uploads/".$file_name1);
			$img_banner=base_url("uploads/".$file_name1);
			}
		}
		else if($img_type_banner=='banner')
		{
		     
		      $img_banner=$preview_banner;
		}
		if($img_banner!='')
		{
			$data = array(
							'banner_img'=>$img_banner
						);
				$this->db->where('id', $id);
				$this->db->update('tbl_blog',$data);
	   }
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
		if($file_size > 1048576){
			$errors[]='File size grater than 1 MB';
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
			 $img_cover=base_url("uploads/".$file_name);
		    }
		  }
		  else if($img_type_cover=='cover')
		  {
		     
		      $img_cover=$preview_cover;
		  }
			//$big_path='uploads/'.$file_name;
			//$thumb_path='uploads/blogs_cover/thumb/'.$file_name;
			//$this->resize_crop_image(684, true, $big_path, $thumb_path);
	     if($img_cover!='')
		 {
	 
	        $data = array(
						'cover_img'=>$img_cover
					);
		    $this->db->where('id', $id);
			$this->db->update('tbl_blog',$data);					
	     }
     
  
             $data1 = array(
						'title'=>$title,
						'subtitle'=>$subtitle,
						'cat_id'=>$cat,
						'descr'=>$descr,
						'page_title'=>$pg_title,
						'page_desc'=>$pg_desc
						
					);
		     $this->db->where('id', $id);
			 $this->db->update('tbl_blog',$data1);	
  
  
  
        
} 
   
   public function get_blog($id)
   {
     
	 $q = $this->db->query("select * from  tbl_blog where id='$id'");
	 if($q->num_rows()>0)
	 {
	    return $q->row();
	 }
   }
   
   
   public function remove_blog()
   {
   
     $id=$this->input->post('id');
	 $q = $this->db->query("select * from tbl_blog where id='$id'")->row();
	 /*$cover_img=$q->cover_img;
	 if(file_exists($cover_img))
		 {
				*/
				$this->db->query("delete from tbl_blog where id='$id'"); 
				/*unlink($cover_img);
		 }*/
   }
   
   
   
   
   
   

   
}
?>