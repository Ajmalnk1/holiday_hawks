<?php
/**
*
*/
error_reporting(0);
class admin_pkg_category_model extends CI_Model
{

   public function __construct()
   {
       parent::__construct();
       $this->load->database();
   }
   
   
   
   
   
   public function get($limitStart)
   {
     //echo $limitStart;
	 //echo "select a.*,b.pgname from tbl_banner a left join tbl_pages b on a.page_id=b.pageid order by node_order asc limit $limitStart, 100 ";
	 
	 $q = $this->db->query("select * from tbl_pkg_category order by node_order asc ");
	 if($q->num_rows()>0)
	 {
	   return $q->result();
	 }
	 
   }
   
   public function home_text()
   {
      $this->db->where('type','pkg');
	  return $q=$this->db->get('tbl_home_text')->row();
   }
    
   
   
   public function remove()
   {
   
     $id=$this->input->post('id');
	 //echo "delete from tbl_banner where id='$id'";
	 $this->db->query("delete from tbl_pkg_category where id='$id'"); 
				
   }
   
  
   public function get_text()
   {
     return $query = $this->db->get_where('tbl_home_text', array('type'=>'pkg'))->row();
   }
   
   public function get_id($id)
   {
    return $query = $this->db->get_where('tbl_pkg_category', array('id'=>$id))->row();
   }
   
      
    
   public function edit_text_form()
   {
       $d['title']=mysql_real_escape_string($this->input->post('title')).trim();
	   $d['descr']=mysql_real_escape_string($this->input->post('descr')).trim();
	   
       $this->db->where('type', 'pkg');
	   $this->db->update('tbl_home_text',$d);
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
   public function edit_form($id)
   {
       $name=mysql_real_escape_string($this->input->post('name'));
	   $pg_title=mysql_real_escape_string($this->input->post('pg_title'));
	   $pg_desc=mysql_real_escape_string($this->input->post('pg_desc'));
	   $name_detail=mysql_real_escape_string($this->input->post('name_detail'));
	   $descr1=$this->input->post('descr1');
	   $descr2=$this->input->post('descr2');
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
			 $this->resize_crop_image(370, 479, $big_path, $thumb_path);
			 $img_cover=base_url("uploads/".$file_name);
			 $data = array(
						'img'=>$img_cover
					);
		    $this->db->where('id', $id);
			$this->db->update('tbl_pkg_category',$data);
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
			/*if($file_size1 > 1048576){
				$errors[]='File size grater than 1 MB';
			}*/
			
							
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
			$this->db->update('tbl_pkg_category',$data);
			 }
			  
		  }
		  
		  
		  
		  
		  $data1 = array(
						'name'=>$name,
						
						'name_list'=>$name_detail,
						'desc1'=>$descr1,
						'pg_title'=>$pg_title,
						'pg_desc'=>$pg_desc,
						'desc2'=>$descr2
						
					);
		     $this->db->where('id', $id);
			 $this->db->update('tbl_pkg_category',$data1);
		  
		 
		 
   }
   
   
   
   

   
}
?>