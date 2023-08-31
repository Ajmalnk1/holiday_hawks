<?php
/**
*
*/
error_reporting(0);
class admin_vector_model extends CI_Model
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
	 
	 $q = $this->db->query("select * from  tbl_vectors order by node_order asc ");
	 if($q->num_rows()>0)
	 {
	   return $q->result();
	 }
	 
   }
   
   
   public function remove()
   {
   
     $id=$this->input->post('id');
	 //echo "delete from tbl_banner where id='$id'";
	 $this->db->query("delete from tbl_vectors where id='$id'"); 
				
   }
   
  
   
   
   public function get_id($id)
   {
    return $query = $this->db->get_where('tbl_vectors', array('id'=>$id))->row();
   }
   
      
    
   public function get_links()
   {
     $q=$this->db->query("SELECT a.pgname as link_name,1 as page from tbl_pages a  where a.pgname!='Home' union SELECT b.name as link_name,2 as pkg from tbl_pkg_category b");
	 if($q->num_rows()>0)
	 {
	 return  $q=$q->result();
	 }
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
	   $link=mysql_real_escape_string($this->input->post('link'));
	   $link=str_replace(" ","-",$link);
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
			 $this->resize_crop_image(32, 32, $big_path, $thumb_path);
			 $img_cover=base_url("uploads/".$file_name);
			 $data = array(
						'img'=>$img_cover
					);
		    $this->db->where('id', $id);
			$this->db->update('tbl_vectors',$data);
		    }
			
		  }
		  
		  $data1 = array(
						'name'=>$name,
						'link'=>$link,
						
					);
		     $this->db->where('id', $id);
			 $this->db->update('tbl_vectors',$data1);
		  
		 
		 
   }
   
   
   
   

   
}
?>