<?php
/**
*
*/
class blog_model extends CI_Model
{

   public function __construct()
   {
       parent::__construct();
       $this->load->database();
   }
   
   
   public function get_blog()
   {
	    $limitStart=$_POST['page'];
		$d['page']=$limitStart;
		$limitCount = 10;
		//return $this->db->get("select* from  order by id desc limit $limitStart,$limitCount")->result();
		return $this->db->get('tbl_blog',$limitStart,$limitCount)->result();
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
      
	    $title=$this->input->post('title');
	    $subtitle=$this->input->post('subtitle');
	    $descr=$this->input->post('descr');
	    $this->db->select_max('node_order');
        $res1 = $this->db->get('tbl_blog');
	    $result = $res1->row();
        $node_order = $result + 1;
	   //$image=$_FILES['image']['name'];
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
			
			if(file_exists("uploads/blogs_cover//$file_name"))
			{
			//Rename the file automatically by appending 1,2,3...with the basename
			//File Extension
				$efilename = explode('.', $file_name);
				$ext = $efilename[count($efilename) - 1];			
				//Index of .
				$pos=strpos($file_name,".");
				$str=substr($file_name,0,$pos);			
			$j=0;	
			while(file_exists("uploads/blogs_cover//$file_name"))
			{			
				
				$j++;					
				$file_name=$str.$j.".".$ext;
				
				
			}						
							
		  }
			
			move_uploaded_file($file_tmp,"uploads/blogs_cover/".$file_name);
			
			$big_path='uploads/blogs_cover/'.$file_name;
			$thumb_path='uploads/blogs_cover/thumb/'.$file_name;
			$this->resize_crop_image(684, true, $big_path, $thumb_path);
	 
	 $data = array(
						'cover_img'=>$file_name,
						'title'=>$title,
						'subtitle'=>$subtitle,
						'descr'=>$descr,
						'node_order'=>$node_order
						
					);
					$this->db->insert('tbl_blog',$data);					
	  
  }
  
        
} 


 public function edit_form($id)
   {
      
	    $title=$this->input->post('title');
	    $subtitle=$this->input->post('subtitle');
	    $descr=$this->input->post('descr');
	    $this->db->select_max('node_order');
        $res1 = $this->db->get('tbl_blog');
	    $result = $res1->row();
        $node_order = $result + 1;
	   //$image=$_FILES['image']['name'];
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
			
			if(file_exists("uploads/blogs_cover//$file_name"))
			{
			//Rename the file automatically by appending 1,2,3...with the basename
			//File Extension
				$efilename = explode('.', $file_name);
				$ext = $efilename[count($efilename) - 1];			
				//Index of .
				$pos=strpos($file_name,".");
				$str=substr($file_name,0,$pos);			
			$j=0;	
			while(file_exists("uploads/blogs_cover//$file_name"))
			{			
				
				$j++;					
				$file_name=$str.$j.".".$ext;
				
				
			}						
							
		  }
			
			move_uploaded_file($file_tmp,"uploads/blogs_cover/".$file_name);
			
			$big_path='uploads/blogs_cover/'.$file_name;
			$thumb_path='uploads/blogs_cover/thumb/'.$file_name;
			$this->resize_crop_image(684, true, $big_path, $thumb_path);
	 
	        $data = array(
						'cover_img'=>$file_name
					);
		    $this->db->where('id', $id);
			$this->db->update('tbl_blog',$data);					
	  
     }
  
             $data1 = array(
						'title'=>$title,
						'subtitle'=>$subtitle,
						'descr'=>$descr
					);
		     $this->db->where('id', $id);
			$this->db->update('tbl_blog',$data1);	
  
  
  
        
} 
   
   public function get_blogs($id)
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
	 $cover_img=$q->cover_img;
	 if(file_exists('uploads/blogs_cover/'.$cover_img))
		 {
				$this->db->query("delete from tbl_blog where id='$id'"); 
				unlink('uploads/blogs_cover/'.$cover_img);
		 }
   }
   
   
   
   public function get_cat_id($cat_id)
   {
     
	 $q = $this->db->query("select * from  tbl_portfolio_cat where id='$cat_id'");
	 if($q->num_rows()>0)
	 {
	    return $q->row();
	 }
   }
   public function get_img($id)
   {
     $query = $this->db->get_where('tbl_projects_img', array('project_temp_id' => $id));
	 return $query=$query->result();
   }

   public function remove_pjt_img()
   {
   
     $id=$this->input->post('id');
	 $q = $this->db->query("select * from tbl_banner where id='$id'")->row();
	 $name=$q->img;
	 if(file_exists('uploads/banner/'.$name))
		 {
				$this->db->query("delete from tbl_banner where id='$id'"); 
				unlink('uploads/banner/'.$name);
		 }
   }
   
   public function insert_projects()
   {
      $title=$this->input->post('title');
	  $descr=$this->input->post('descr');
	  $myid=$this->input->post('myid');
	  $cover_img=$this->input->post('cover_img');
	  $cat=$this->input->post('cat');
	  $sector=$this->input->post('sector');
	  $location=$this->input->post('location');
	  $time_scale=$this->input->post('time_scale');
	  $project_scope=$this->input->post('project_scope');
	  $q=$this->db->query("select MAX(node_order) as max_order from tbl_projects where cat_id='$cat'")->row();
	  $node_order=$q->max_order+1;
	  $data = array(
					 'title'=>$title,
					 'descr'=>$descr,
					 'project_temp_id'=>$myid,
					 'cover_img'=>$cover_img,
					 'cat_id'=>$cat,
					 'sector'=>$sector,
					 'location'=>$location,
					 'time_scale'=>$time_scale,
					 'project_scope'=>$project_scope,
					 'node_order'=>$node_order
						
					);
	  $this->db->insert('tbl_projects',$data);
	}
   
    public function edit_projects($id)
    {
              
					
      $title=$this->input->post('title');
	  $descr=$this->input->post('descr');
	  $myid=$this->input->post('myid');
	  $cover_img=$this->input->post('cover_img');
	  $cat=$this->input->post('cat');
	  $sector=$this->input->post('sector');
	  $location=$this->input->post('location');
	  $time_scale=$this->input->post('time_scale');
	  $project_scope=$this->input->post('project_scope');
	  
	  $data = array(
					 'title'=>$title,
					 'descr'=>$descr,
					 'project_temp_id'=>$myid,
					 'cover_img'=>$cover_img,
					 'cat_id'=>$cat,
					 'sector'=>$sector,
					 'location'=>$location,
					 'time_scale'=>$time_scale,
					 'project_scope'=>$project_scope
					 
					);
				$this->db->where('id', $id);
				$this->db->update('tbl_projects',$data);
		      	
    }
   
   
   public function total_count()
   {
     
	  $q = $this->db->get_where('tbl_image')->num_rows();
	  if($q>0)
	  {
	   return $q;
	  }
	  else
	  {
	  return 0;
	  }
	  
   }
   
   
   
   public function get($id)
   {
     return $q=$this->db->query("select * from tbl_projects where id='$id'")->row();
   }
   
   
   public function delete_projects()
   {
	  
	      //echo "select * from  tbl_projects where id='$id'";
		  $id=$_REQUEST['id'];
		  $q=$this->db->query("select * from  tbl_projects where id='$id'")->row();
		  $img_id=$q->project_temp_id;
		  $this->db->where('project_temp_id', $img_id);
		  $this->db->delete('tbl_projects_img');
		  $this->db->where('id', $id);
		  $this->db->delete('tbl_projects');
		  $i=1;
		  $cat_id=$_REQUEST['cat_id'];
		  $sel=$this->db->query("select * from tbl_projects where cat_id='$cat_id' order by node_order asc")->result();;
		  foreach($sel as $value)
		  {
		   $val_id=$value->id;
		   $q=$this->db->query("update tbl_projects set node_order='$i' where id='$val_id'");
		   $i++;
		  }
	   
   }
   

   
}
?>