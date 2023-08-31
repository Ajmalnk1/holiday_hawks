<?php
/**
*
*/
error_reporting(0);
class admin_pkg_category_details_model extends CI_Model
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
	 
	 $q = $this->db->query("select a.*,b.name as cat_name from tbl_pkg_category_detail a left join tbl_pkg_category b on a.pkg_cat_id=b.id order by node_order asc limit $limitStart, 30");
	 if($q->num_rows()>0)
	 {
	   return $q->result();
	 }
	 
   }
   
   public function delete_high()
   {
     $id=$this->input->post('id');
	 $this->db->where(array('id'=>$id));
	 $this->db->delete('tbl_pkg_category_highlights');
   }
   
   public function  get_pkg_detail_about($act_id)
   {
     $query = $this->db->get_where('tbl_pkg_category_about',array('pkg_id'=>$act_id));
	 if($query->num_rows()>0)
	 {
	   $query=$query->row();
	   return $query->about;
	 }
   }
   public function  get_act_detail_avail($act_id)
   {
     $query = $this->db->get_where('tbl_activities_avail',array('act_id'=>$act_id));
	 if($query->num_rows()>0)
	 {
	   $query=$query->row();
	   return $query->avail;
	 }
   }
   public function  get_act_detail_things($act_id)
   {
     $query = $this->db->get_where('tbl_activities_things',array('act_id'=>$act_id));
	 if($query->num_rows()>0)
	 {
	   $query=$query->row();
	   return $query->things;
	 }
   }
   public function  get_pkg_detail_info($pkg_id)
   {
     $query = $this->db->get_where('tbl_pkg_category_info',array('pkg_id'=>$pkg_id));
	 if($query->num_rows()>0)
	 {
	   return $query=$query->result();
	   //return $query->inclusion;
	 }
   }
   public function  get_pkg_detail_inclu($pkg_id)
   {
     $query = $this->db->get_where(' tbl_pkg_category_itenary',array('pkg_id'=>$pkg_id));
	 if($query->num_rows()>0)
	 {
	   return $query=$query->result();
	   //return $query->inclusion;
	 }
   }
  /* public function  get_act_detail_about_gallery($act_id)
   {
     $query = $this->db->get_where('tbl_activities_about_images',array('act_id'=>$act_id));
	 if($query->num_rows()>0)
	 {
	   return $query=$query->result();
	    
	 }
   }*/
   public function  get_pkg_detail_gallery($pkg_id)
   {
     $query = $this->db->get_where('tbl_pkg_category_gallery',array('pkg_id'=>$pkg_id));
	 if($query->num_rows()>0)
	 {
	   return $query=$query->result();
	    
	 }
   }
   
   public function  get_pkg_detail_high($pkg_id)
   {
     $query = $this->db->get_where('tbl_pkg_category_highlights',array('pkg_id'=>$pkg_id));
	 if($query->num_rows()>0)
	 {
	   return $query=$query->result();
	    
	 }
   }
   public function remove()
   {
   
     $id=$this->input->post('id');
	 //echo "delete from tbl_banner where id='$id'";
	 $this->db->query("delete from tbl_pkg_category_detail where id='$id'"); 
				
   }
   
   
    public function remove_pjt_img_itn()
  {
   
     $id=$this->input->post('id');
	 //$q = $this->db->query("select * from tbl_exp_stays_about_images where id='$id'")->row();
	// $name=$q->image;
	 //echo "delete from tbl_exp_stays_about_images where id='$id'";
	 $this->db->query("delete from tbl_pkg_category_itn_images where id='$id'"); 
	 unlink($name);
		 
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
	 $q = $this->db->query("select * from  tbl_pkg_category_gallery where id='$id'")->row();
	 $name=$q->image;
	 //echo "delete from tbl_exp_stays_about_images where id='$id'";
	 $this->db->query("delete from  tbl_pkg_category_gallery where id='$id'"); 
	 unlink($name);
		 
  } 
  public function remove_pjt_img_gallery_itn()
  {
   
     $id=$this->input->post('id');
	 $q = $this->db->query("select * from  tbl_pkg_category_itn_images where id='$id'")->row();
	 $name=$q->image;
	 //echo "delete from tbl_exp_stays_about_images where id='$id'";
	 $this->db->query("delete from  tbl_pkg_category_itn_images where id='$id'"); 
	 unlink($name);
		 
  } 
  public function pkg_cats()
  {
    
	$this->db->order_by('name', 'asc');
	return $query = $this->db->get('tbl_pkg_category')->result();
   }
  
  public function save_about()
  {
    $pkg_id=$this->input->post('pkg_id');
	$pkg_cat_id=$this->input->post('pkg_cat_id');
	$desc=$this->input->post('desc');
	$this->db->query("delete from tbl_pkg_category_about where pkg_id='$pkg_id'"); 
	$data=array('pkg_id'=>$pkg_id,'pkg_cat_id'=>$pkg_cat_id,'about'=>$desc);
	$this->db->insert('tbl_pkg_category_about',$data);
	
  } 
  
  public function save_gallery()
  {
    $pkg_id=$this->input->post('pkg_id');
	$this->db->query("update tbl_pkg_category_gallery set status=1 where pkg_id='$pkg_id'");
  } 
  
  public function save_high()
  {
     $pkg_id=$this->input->post('pkg_id');
	 $pkg_cat_id=$this->input->post('pkg_cat_id');
	 $points=explode(',',$this->input->post('points'));
	 $this->db->where(array('pkg_id'=>$pkg_id));
	 $this->db->delete('tbl_pkg_category_highlights');
	 foreach($points as $point)
	 {
	     if($point.trim()!='')
		 {
		   $point=$point.trim();
		   $data=array('pkg_id'=>$pkg_id,'pkg_cat_id'=>$pkg_cat_id,'highlight'=>$point);
	       $this->db->insert('tbl_pkg_category_highlights',$data);
		 }
	 }
	 
  } 
  
  public function save_info()
  {
     $pkg_id=$this->input->post('pkg_id');
	 $pkg_cat_id=$this->input->post('pkg_cat_id');
	 $info_title=$this->input->post('info_title');
	 $info_desc=$this->input->post('info_desc');
	 
	 $info_title1=$this->input->post('info_title1');
	 $info_desc1=$this->input->post('info_desc1');
	 
	 $info_title2=$this->input->post('info_title2');
	 $info_desc2=$this->input->post('info_desc2');
	 
	 $info_title3=$this->input->post('info_title3');
	 $info_desc3=$this->input->post('info_desc3');
	 
	 $info_title4=$this->input->post('info_title4');
	 $info_desc4=$this->input->post('info_desc4');
	 
	 $this->db->where(array('pkg_id'=>$pkg_id));
	 $this->db->delete('tbl_pkg_category_info');
	 
	 $data=array('pkg_id'=>$pkg_id,'pkg_cat_id'=>$pkg_cat_id,'title'=>$info_title,'descr'=>$info_desc);
	 $this->db->insert('tbl_pkg_category_info',$data);
	 
	 if($info_title1!='')
	 {
	   $data1=array('pkg_id'=>$pkg_id,'pkg_cat_id'=>$pkg_cat_id,'title'=>$info_title1,'descr'=>$info_desc1);
	   $this->db->insert('tbl_pkg_category_info',$data1);
	 }
	 if($info_title2!='')
	 {
	   $data2=array('pkg_id'=>$pkg_id,'pkg_cat_id'=>$pkg_cat_id,'title'=>$info_title2,'descr'=>$info_desc2);
	   $this->db->insert('tbl_pkg_category_info',$data2);
	 }
	 if($info_title3!='')
	 {
	   $data3=array('pkg_id'=>$pkg_id,'pkg_cat_id'=>$pkg_cat_id,'title'=>$info_title3,'descr'=>$info_desc3);
	   $this->db->insert('tbl_pkg_category_info',$data3);
	 }
	 if($info_title4!='')
	 {
	   $data4=array('pkg_id'=>$pkg_id,'pkg_cat_id'=>$pkg_cat_id,'title'=>$info_title4,'descr'=>$info_desc4);
	   $this->db->insert('tbl_pkg_category_info',$data4);
	 }
	 
	 
  } 
   public function save_inclu()
  {
     $pkg_id=$this->input->post('pkg_id');
	 $pkg_cat_id=$this->input->post('pkg_cat_id');
	 //echo var_dump($_POST['info_title']);
	 $info_title_ar=json_decode($_POST['info_title']);
	 //echo var_dump($info_title_ar);
	 $this->db->where(array('pkg_id'=>$pkg_id));
	 $this->db->delete('tbl_pkg_category_itenary');
	 //$info_title_ar=explode(',',$info_title_ar);
	 for($k=0;$k<=16;$k++)
	 {
	   if($info_title_ar[$k]!='')
	   {
	      $title=$info_title_ar[$k].trim();
		  $l=$k+1;
		  $info_desc=$this->input->post('info_desc'.$l);
		  $itn=$this->input->post('itn'.$l);
		  $data=array('pkg_id'=>$pkg_id,'pkg_cat_id'=>$pkg_cat_id,'title'=>$title,'descr'=>$info_desc);
		  $this->db->insert('tbl_pkg_category_itenary',$data);
		  $itn_id1=$this->db->insert_id();
		  $data_img['itn_id']=$itn_id1;
		  $this->db->where('temp_id',$itn);
		  $this->db->update('tbl_pkg_category_itn_images',$data_img);
	   }
	 }
	 
	 
	/* $info_desc=$this->input->post('info_desc');
	 
	 $itn1=$this->input->post('itn1');
	 $itn2=$this->input->post('itn2');
	 $itn3=$this->input->post('itn3');
	 
	 $info_title1=$this->input->post('info_title1').trim();
	 $info_desc1=$this->input->post('info_desc1');
	 
	 $info_title2=$this->input->post('info_title2').trim();
	 $info_desc2=$this->input->post('info_desc2');
	 
	 
	 
	 
	 
	 
	 $data=array('pkg_id'=>$pkg_id,'pkg_cat_id'=>$pkg_cat_id,'title'=>$info_title,'descr'=>$info_desc);
	 $this->db->insert('tbl_pkg_category_itenary',$data);
	 $itn_id1=$this->db->insert_id();
	 $data_img['itn_id']=$itn_id1;
	 $this->db->where('temp_id',$itn1);
	 $this->db->update('tbl_pkg_category_itn_images',$data_img);
	 
	 if($info_title1!='')
	 {
	   $data1=array('pkg_id'=>$pkg_id,'pkg_cat_id'=>$pkg_cat_id,'title'=>$info_title1,'descr'=>$info_desc1);
	   $this->db->insert('tbl_pkg_category_itenary',$data1);
	   $itn_id2=$this->db->insert_id();
	   $data_img['itn_id']=$itn_id2;
	   $this->db->where('temp_id',$itn2);
	   $this->db->update('tbl_pkg_category_itn_images',$data_img);
	 }
	 if($info_title2!='')
	 {
	   $data2=array('pkg_id'=>$pkg_id,'pkg_cat_id'=>$pkg_cat_id,'title'=>$info_title2,'descr'=>$info_desc2);
	   $this->db->insert('tbl_pkg_category_itenary',$data2);
	   $itn_id3=$this->db->insert_id();
	   $data_img['itn_id']=$itn_id3;
	   $this->db->where('temp_id',$itn3);
	   $this->db->update('tbl_pkg_category_itn_images',$data_img);
	 }
	 */
	 
	 
  } 
 /* public function save_inclu()
  {
     $act_id=$this->input->post('act_id');
	 $act_cat_id=$this->input->post('act_cat_id');
	 $inclu_desc=$this->input->post('inclu_desc');
	 $this->db->where(array('act_id'=>$act_id));
	 $this->db->delete('tbl_activities_things');
	 $data=array('act_id'=>$act_id,'act_cat_id'=>$act_cat_id,'things'=>$inclu_desc);
	 $this->db->insert('tbl_activities_things',$data);
  } */
  public function get_id($id)
  {
    return $query = $this->db->get_where('tbl_pkg_category_detail', array('id'=>$id))->row();
  }
  public function get_id_desti($cat_id)
  {
    $q=$this->db->query("SELECT * FROM `tbl_destination` WHERE id in (select distinct destination_id from tbl_destination_pkg where pkg_id='$cat_id')");
	if($q->num_rows()>0)
	   {
	     return $q->result();
	   }
  }
  public function get_pkg_cat_id($id)
  {
    return $q=$this->db->query("select a.*,b.name from  tbl_pkg_category_detail a left join tbl_pkg_category b on a.pkg_cat_id=b.id where a.id='$id'")->row();
  }
  public function get_desti()
  {
	   $cat_id=$this->input->post('cat_id');
	   $q=$this->db->query("SELECT * FROM `tbl_destination` WHERE id in (select distinct destination_id from  tbl_destination_pkg where pkg_id='$cat_id')");
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
		$pkg_cat=$this->input->post('cat');
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
		$q=$this->db->query("select MAX(node_order) as max_order from tbl_pkg_category_detail")->row();
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
						'pkg_cat_id'=>$pkg_cat,
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
			  $this->db->insert('tbl_pkg_category_detail',$data);
			  return $insert_id = $this->db->insert_id();
		} 
        
}  
   
   
   public function edit_form($id)
   {
        $pkg_cat=$this->input->post('cat');
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
				$this->db->update('tbl_pkg_category_detail',$data);
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
			$this->db->update('tbl_pkg_category_detail',$data);
			 }
			  
		  }
		  
		
		  
		  
		  
		  
		    $data1 = array(
						'pkg_cat_id'=>$pkg_cat,
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
			 $this->db->update('tbl_pkg_category_detail',$data1);
		  
		 
		 
   }
   
   
   
   

   
}
?>