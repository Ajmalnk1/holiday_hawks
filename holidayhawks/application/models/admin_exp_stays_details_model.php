<?php
/**
*
*/
error_reporting(0);
class admin_exp_stays_details_model extends CI_Model
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
	 
	 $q = $this->db->query("select a.*,b.name as cat_name from tbl_exp_stays_detail a left join tbl_exp_stays b on a.exp_cat_id=b.id order by node_order asc limit $limitStart, 30");
	 if($q->num_rows()>0)
	 {
	   return $q->result();
	 }
	 
   }
   
   public function  get_exp_detail_about($exp_id)
   {
     $query = $this->db->get_where('tbl_exp_stays_about',array('exp_id'=>$exp_id));
	 if($query->num_rows()>0)
	 {
	   $query=$query->row();
	   return $query->about;
	 }
   }
   public function  get_exp_detail_amn($exp_id)
   {
     $query = $this->db->get_where('tbl_exp_stays_aminities',array('exp_id'=>$exp_id));
	 if($query->num_rows()>0)
	 {
	   $query=$query->row();
	   return $query->amn;
	 }
   }
   public function  get_exp_detail_inclu($exp_id)
   {
     $query = $this->db->get_where('tbl_exp_stays_inclusion',array('exp_id'=>$exp_id));
	 if($query->num_rows()>0)
	 {
	   $query=$query->row();
	   return $query->inclusion;
	 }
   }
   public function  get_exp_detail_info($exp_id)
   {
     $query = $this->db->get_where('tbl_exp_stays_info',array('exp_id'=>$exp_id));
	 if($query->num_rows()>0)
	 {
	   return $query=$query->result();
	   //return $query->inclusion;
	 }
   }
   public function  get_exp_detail_about_gallery($exp_id)
   {
     $query = $this->db->get_where('tbl_exp_stays_about_images',array('exp_id'=>$exp_id));
	 if($query->num_rows()>0)
	 {
	   return $query=$query->result();
	    
	 }
   }
   public function  get_exp_detail_gallery($exp_id)
   {
     $query = $this->db->get_where(' tbl_exp_stays_gallery',array('exp_id'=>$exp_id));
	 if($query->num_rows()>0)
	 {
	   return $query=$query->result();
	    
	 }
   }
   public function remove()
   {
   
     $id=$this->input->post('id');
	 //echo "delete from tbl_banner where id='$id'";
	 $this->db->query("delete from tbl_exp_stays_detail where id='$id'"); 
				
   }
   
  public function remove_pjt_img()
  {
   
     $id=$this->input->post('id');
	 $q = $this->db->query("select * from tbl_exp_stays_about_images where id='$id'")->row();
	 $name=$q->image;
	 //echo "delete from tbl_exp_stays_about_images where id='$id'";
	 $this->db->query("delete from tbl_exp_stays_about_images where id='$id'"); 
	 unlink($name);
		 
  } 
  public function remove_pjt_img_gallery()
  {
   
     $id=$this->input->post('id');
	 $q = $this->db->query("select * from  tbl_exp_stays_gallery where id='$id'")->row();
	 $name=$q->image;
	 //echo "delete from tbl_exp_stays_about_images where id='$id'";
	 $this->db->query("delete from  tbl_exp_stays_gallery where id='$id'"); 
	 unlink($name);
		 
  } 
  public function exp_cats()
  {
    
	$this->db->order_by('name', 'asc');
	return $query = $this->db->get('tbl_exp_stays')->result();
   }
  
  public function save_about()
  {
    $exp_id=$this->input->post('exp_id');
	$exp_cat_id=$this->input->post('exp_cat_id');
	$desc=$this->input->post('desc');
	$this->db->query("delete from tbl_exp_stays_about where exp_id='$exp_id'"); 
	$data=array('exp_id'=>$exp_id,'exp_cat_id'=>$exp_cat_id,'about'=>$desc);
	$this->db->insert('tbl_exp_stays_about',$data);
	
  } 
  
  public function save_gallery()
  {
    $exp_id=$this->input->post('exp_id');
	$this->db->query("update tbl_exp_stays_gallery set status=1 where exp_id='$exp_id'");
  } 
  
  public function save_amn()
  {
     $exp_id=$this->input->post('exp_id');
	 $exp_cat_id=$this->input->post('exp_cat_id');
	 $ami=$this->input->post('ami');
	 $this->db->where(array('exp_id'=>$exp_id));
	 $this->db->delete('tbl_exp_stays_aminities');
	 $data=array('exp_id'=>$exp_id,'exp_cat_id'=>$exp_cat_id,'amn'=>$ami);
	 $this->db->insert('tbl_exp_stays_aminities',$data);
	 
  } 
  
  public function save_info()
  {
     $exp_id=$this->input->post('exp_id');
	 $exp_cat_id=$this->input->post('exp_cat_id');
	 $info_title=$this->input->post('info_title');
	 $info_desc=$this->input->post('info_desc');
	 $info_title2=$this->input->post('info_title2');
	 $info_desc2=$this->input->post('info_desc2');
	 $info_title3=$this->input->post('info_title3');
	 $info_desc3=$this->input->post('info_desc3');
	 
	 $this->db->where(array('exp_id'=>$exp_id));
	 $this->db->delete('tbl_exp_stays_info');
	 
	 $data=array('exp_id'=>$exp_id,'exp_cat_id'=>$exp_cat_id,'title'=>$info_title,'descr'=>$info_desc);
	 $this->db->insert('tbl_exp_stays_info',$data);
	 if($info_title2!='')
	 {
	   $data2=array('exp_id'=>$exp_id,'exp_cat_id'=>$exp_cat_id,'title'=>$info_title2,'descr'=>$info_desc2);
	   $this->db->insert('tbl_exp_stays_info',$data2);
	 }
	 if($info_title3!='')
	 {
	   $data3=array('exp_id'=>$exp_id,'exp_cat_id'=>$exp_cat_id,'title'=>$info_title3,'descr'=>$info_desc3);
	   $this->db->insert('tbl_exp_stays_info',$data3);
	 }
  } 
  public function save_inclu()
  {
     $exp_id=$this->input->post('exp_id');
	 $exp_cat_id=$this->input->post('exp_cat_id');
	 $inclu_desc=$this->input->post('inclu_desc');
	 $this->db->where(array('exp_id'=>$exp_id));
	 $this->db->delete('tbl_exp_stays_inclusion');
	 $data=array('exp_id'=>$exp_id,'exp_cat_id'=>$exp_cat_id,'inclusion'=>$inclu_desc);
	 $this->db->insert('tbl_exp_stays_inclusion',$data);
  } 
  public function get_id($id)
  {
    return $query = $this->db->get_where('tbl_exp_stays_detail', array('id'=>$id))->row();
  }
  public function get_id_desti($cat_id)
  {
    $q=$this->db->query("SELECT * FROM `tbl_destination` WHERE id in (select distinct destination_id from tbl_destination_exp_stays where exp_id='$cat_id')");
	if($q->num_rows()>0)
	   {
	     return $q->result();
	   }
  }
  public function get_exp_cat_id($id)
  {
    return $q=$this->db->query("select a.*,b.name from  tbl_exp_stays_detail a left join tbl_exp_stays b on a.exp_cat_id=b.id where a.id='$id'")->row();
  }
  public function get_desti()
  {
	   $cat_id=$this->input->post('cat_id');
	   $q=$this->db->query("SELECT * FROM `tbl_destination` WHERE id in (select distinct destination_id from tbl_destination_exp_stays where exp_id='$cat_id')");
	   if($q->num_rows()>0)
	   {
	     return $q->result();
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
   
   
   public function submit_form()
   {
      
	   // $title=mysql_real_escape_string($this->input->post('title').trim());
	    //$subtitle=mysql_real_escape_string($this->input->post('subtitle').trim());
		$exp_cat=$this->input->post('cat');
		$desti=$this->input->post('desti');
		$name=mysql_real_escape_string($this->input->post('name'));
		$descr=mysql_real_escape_string($this->input->post('descr'));
		$pg_title=mysql_real_escape_string($this->input->post('pg_title'));
		$pg_desc=mysql_real_escape_string($this->input->post('pg_desc'));
		$price=mysql_real_escape_string($this->input->post('price'));
		$theme=mysql_real_escape_string($this->input->post('theme'));
		$location=mysql_real_escape_string($this->input->post('location'));
		$suitable_for=mysql_real_escape_string($this->input->post('suitable_for'));
		$meal_type=mysql_real_escape_string($this->input->post('meal_type'));
		$stays=mysql_real_escape_string($this->input->post('stays'));
		$hand_picked=$this->input->post('hand_picked');
		
		$date=date('Y-m-d H:i:s');
		$q=$this->db->query("select MAX(node_order) as max_order from tbl_exp_stays_detail")->row();
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
			/*if($file_size > 1048576){
				$errors[]='File size grater than 1 MB';
			}*/
			
							
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
			    $this->resize_crop_image(300, 378, $big_path, $thumb_path);
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
						'exp_cat_id'=>$exp_cat,
						'destination_id'=>$desti,
						'title'=>$name,
						'pg_title'=>$pg_title,
						'pg_desc'=>$pg_desc,
						'descr'=>$descr,
						'price'=>$price,
						'cover_img'=>$img_cover,
						'banner_img'=>$img_cover1,
						'theme'=>$theme,
						'location_type'=>$location,
						'suitable_for'=>$suitable_for,
						'meal_type'=>$meal_type,
						'stays'=>$stays,
						'created_date'=>$date,
						'hand_picked_pkg'=>$hand_picked,
						'node_order'=>$node_order
						
					);
			  $this->db->insert('tbl_exp_stays_detail',$data);
			  return $insert_id = $this->db->insert_id();
		} 
        
}  
   
   
   public function edit_form($id)
   {
        $exp_cat=$this->input->post('cat');
		$desti=$this->input->post('desti');
		$name=mysql_real_escape_string($this->input->post('name'));
		$descr=mysql_real_escape_string($this->input->post('descr'));
		$pg_title=mysql_real_escape_string($this->input->post('pg_title'));
		$pg_desc=mysql_real_escape_string($this->input->post('pg_desc'));
		$price=mysql_real_escape_string($this->input->post('price'));
		$theme=mysql_real_escape_string($this->input->post('theme'));
		$location=mysql_real_escape_string($this->input->post('location'));
		$suitable_for=mysql_real_escape_string($this->input->post('suitable_for'));
		$meal_type=mysql_real_escape_string($this->input->post('meal_type'));
		$stays=mysql_real_escape_string($this->input->post('stays'));
		$hand_picked=$this->input->post('hand_picked');
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
			/*if($file_size > 1048576){
				$errors[]='File size grater than 1 MB';
			}*/
			
							
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
			     $this->resize_crop_image(300, 378, $big_path, $thumb_path);
				 $img_cover=base_url("uploads/".$file_name);
				 $data = array(
							'cover_img'=>$img_cover
						);
				$this->db->where('id', $id);
				$this->db->update('tbl_exp_stays_detail',$data);
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
						'banner_img'=>$img_cover1
					);
		    $this->db->where('id', $id);
			$this->db->update('tbl_exp_stays_detail',$data);
			 }
			  
		  }
		  
		   if($_FILES['image_banner1']['error'] == UPLOAD_ERR_OK)
		  {
			$file_name2 = $_FILES['image_banner1']['name'];
			$file_size2 =$_FILES['image_banner1']['size'];
			$file_tmp2 =$_FILES['image_banner1']['tmp_name'];
			$file_type2=$_FILES['image_banner1']['type'];   
			$file_ext2=strtolower(end(explode('.',$_FILES['image_banner1']['name'])));
			$extensions2 = array("jpeg","jpg","png"); 		
			if(in_array($file_ext2,$extensions2 )=== false){
				$errors[]="extension not allowed, please choose a JPEG or PNG file.";
			}
			/*if($file_size2 > 1048576){
				$errors[]='File size grater than 1 MB';
			}*/
			
							
			 if(empty($errors)==true){
				
				if(file_exists("uploads//$file_name2"))
				{
				//Rename the file automatically by appending 1,2,3...with the basename
				//File Extension
					$efilename2 = explode('.', $file_name2);
					$ext2 = $efilename2[count($efilename2) - 1];			
					//Index of .
					$pos2=strpos($file_name2,".");
					$str2=substr($file_name21,0,$pos2);			
				$j=0;	
				while(file_exists("uploads//$file_name2"))
				{			
					
					$j++;					
					$file_name2=$str2.$j.".".$ext2;
					
					
				}						
								
			  }
				
				move_uploaded_file($file_tmp2,"uploads/".$file_name2);
				
				$img_cover2=base_url("uploads/".$file_name2);
				$data = array(
						'detail_img'=>$img_cover2
					);
		    $this->db->where('id', $id);
			$this->db->update('tbl_exp_stays',$data);
				//$this->db->query("delete from tbl_banner where page_id='$page_id'"); 
			 }
			  
		  }
		  
		  
		  
		  
		    $data1 = array(
						'exp_cat_id'=>$exp_cat,
						'destination_id'=>$desti,
						'title'=>$name,
						'pg_title'=>$pg_title,
						'pg_desc'=>$pg_desc,
						'descr'=>$descr,
						'price'=>$price,
						'theme'=>$theme,
						'location_type'=>$location,
						'suitable_for'=>$suitable_for,
						'meal_type'=>$meal_type,
						'stays'=>$stays,
						'hand_picked_pkg'=>$hand_picked,
						
						
					);
		     $this->db->where('id', $id);
			 $this->db->update('tbl_exp_stays_detail',$data1);
		  
		 
		 
   }
   
   
   
   

   
}
?>