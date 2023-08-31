<?php
error_reporting(0);
class admin_banner_model extends CI_Model
{

   public function __construct()
   {
       parent::__construct();
       $this->load->database();
   }
   public function edit_form_home($id)
   {
      // $title=mysql_real_escape_string($this->input->post('title'));
	  // $subtitle=mysql_real_escape_string($this->input->post('subtitle'));
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
		//if($file_size > 1048576){
//			$errors[]='File size grater than 1 MB';
//		}
		
						
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
			 $data = array(
						'img'=>$img_cover
					);
		    $this->db->where('id', $id);
			$this->db->update('tbl_banner',$data);
		    }
		  }
		  /*
		   $data1 = array(
						'title'=>$title,
						'subtitle'=>$subtitle,
					);
		     $this->db->where('id', $id);
			 $this->db->update('tbl_banner',$data1);*/
	}
   public function load_data_images($limitStart)
   {
     //order by id desc LIMIT $start, $per_page
	 //$this->db->limit($start,$per_page);
	 //$this->db->order_by("id", "desc");
	  //$this->db->limit($start,$per_page);
	  ///$this->db->order_by('id', 'desc');
	  //$this->db->where('subid', $parentitem[$i]['id']);
	  ///$q = $this->db->get('tbl_image');
	  //$q = $this->db->get('tbl_image',  $limitStart, 50);
	  $q = $this->db->query("select * from  tbl_banner order by id desc limit $limitStart, 100");

	 if($q->num_rows()>0)
	 {
	    return $q->result();
	 }
   }
   
   public function get_banner($limitStart)
   {
     //echo $limitStart;
	 //echo "select a.*,b.pgname from tbl_banner a left join tbl_pages b on a.page_id=b.pageid  where a.pg_type!='home' order by node_order asc limit $limitStart, 30 ";
	 //echo "select a.*,b.pgname from tbl_banner a left join tbl_pages b on a.page_id=b.pageid order by node_order asc limit $limitStart, 100 ";
	 $q = $this->db->query("select a.*,b.pgname from tbl_banner a left join tbl_pages b on a.page_id=b.pageid  where a.pg_type!='home' order by node_order asc limit $limitStart, 30 ");
	 if($q->num_rows()>0)
	 {
	   return $q->result();
	 }
   }
   
   public function get_banner_home($limitStart)
   {
     //echo $limitStart;
	 //echo "select a.*,b.pgname from tbl_banner a left join tbl_pages b on a.page_id=b.pageid order by node_order asc limit $limitStart, 100 ";
	 
	 $q = $this->db->query("select a.*,b.pgname from tbl_banner a left join tbl_pages b on a.page_id=b.pageid  where a.pg_type='home' order by node_order asc limit $limitStart, 30");
	 if($q->num_rows()>0)
	 {
	   return $q->result();
	 }
	 
   }
   
   
   public function remove_banner()
   {
   
     $id=$this->input->post('id');
	 //echo "delete from tbl_banner where id='$id'";
	 $this->db->query("delete from tbl_banner where id='$id'"); 
				
   }
   
   public function get_pages()
   {
    $this->db->where("pglink <>",'home');
    return $query = $this->db->get_where('tbl_pages', array('pgtype'=>1))->result();
   }
   
   
   public function get_banner_id($id)
   {
    return $query = $this->db->get_where('tbl_banner', array('id'=>$id))->row();
   }
   
   
   public function submit_form()
   {
      
	   // $title=mysql_real_escape_string($this->input->post('title').trim());
	    //$subtitle=mysql_real_escape_string($this->input->post('subtitle').trim());
		$page_id=mysql_real_escape_string($this->input->post('page_id'));
		$q=$this->db->query("select MAX(node_order) as max_order from tbl_banner ")->row();
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
			}
			*/
							
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
				$this->db->query("delete from tbl_banner where page_id='$page_id'"); 
				
				$data = array(
						'img'=>$img_cover,
						'page_id'=>$page_id,
						'node_order'=>$node_order
						
					);
					$this->db->insert('tbl_banner',$data);
					
					
				
			  }
			  
			  
			  
			  
		  }
		  
		  
			//$big_path='uploads/'.$file_name;
			//$thumb_path='uploads/blogs_cover/thumb/'.$file_name;
			//$this->resize_crop_image(684, true, $big_path, $thumb_path);
	 
	        					
	  
  
  
        
} 
   
   
   
   
   public function submit_form_home()
   {
      
	   // $title=mysql_real_escape_string($this->input->post('title').trim());
	    //$subtitle=mysql_real_escape_string($this->input->post('subtitle').trim());
		$page_id=mysql_real_escape_string($this->input->post('page_id'));
		//$title=mysql_real_escape_string($this->input->post('title'));
		//$subtitle=mysql_real_escape_string($this->input->post('subtitle'));
		$q=$this->db->query("select MAX(node_order) as max_order from tbl_banner where pg_type='home'")->row();
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
				$img_cover=base_url("uploads/".$file_name);
				//$this->db->query("delete from tbl_banner where page_id='$page_id'"); 
				
				$data = array(
						
						'page_id'=>1,
						'pg_type'=>'home',
						//'title'=>$title,
						//'subtitle'=>$subtitle,
						'img'=>$img_cover,
						'node_order'=>$node_order
						
					);
					$this->db->insert('tbl_banner',$data);
					
					
				
			  }
			  
			  
			  
			  
		  }
		  
		  
			//$big_path='uploads/'.$file_name;
			//$thumb_path='uploads/blogs_cover/thumb/'.$file_name;
			//$this->resize_crop_image(684, true, $big_path, $thumb_path);
	 
	        					
	  
  
  
        
}  
public function get_all_banner($limitStart)
   {
	   // echo "select * from  tbl_banner  order by node_order asc limit $limitStart, 100"; 
		 $banners = $this->db->query("select * from  tbl_banner  order by node_order asc limit $limitStart, 100")->result();
		 $s = array();
		 $j = 0;
		 foreach($banners as $banner)
		 {
		    $img_id=$banner->img_id;
			$query = $this->db->get_where('tbl_image', array('id'=>$img_id));
			
			$temp  = array();
			$temp['title'] = $banner->title;
			$temp['subtitle'] = $banner->subtitle;
			$temp['id'] = $banner->id;
			if($query->num_rows()>0)
			{
			  $query=$query->row();
			  $temp['img']=$query->name;
			}
			$s[$j++] = $temp;
		 }
		 
		 return  $data['menus'] = $s;
   }
   
   
   public function submit_form_banner()
   {
       $check_banner=$this->input->post('banner_chk');
	   //$descr=$this->input->post('descr');
	   //$myid=$this->input->post('myid');
	   $title_banner=$this->input->post('title_banner');
	   $subtitle_banner=$this->input->post('subtitle_banner');
	   //$this->db->empty_table('tbl_banner');
	   if($check_banner)
	   {
	     $this->db->query("delete from tbl_banner where img_id in (". implode(',', $check_banner) .")");
	   }
	   $i=0;
	   foreach($check_banner as $check_banner_img_id)
	   {
	        $q=$this->db->query("select MAX(node_order) as max_order from tbl_banner ")->row();
	        $node_order=$q->max_order+1;
			$data = array(
					 'img_id'=>$check_banner_img_id,
					 'node_order'=>$node_order,
					 'title'=>$title_banner[$i],
					 'subtitle'=>$subtitle_banner[$i]	
					);
	        $this->db->insert('tbl_banner',$data);
			
		   $i++;	
	   }
	   
	   $check_banner_folder=$this->input->post('banner_chk_folder');
	   //$descr=$this->input->post('descr');
	   //$myid=$this->input->post('myid');
	   $title_banner_folder=$this->input->post('title_banner_folder');
	   $subtitle_banner_folder=$this->input->post('subtitle_banner_folder');
	   if($check_banner_folder)
	   {
	     $this->db->query("delete from tbl_banner where img_id in (". implode(',', $check_banner_folder) .")");
	   }
	   $j=0;
	   foreach($check_banner_folder as $check_banner_folder_img_id)
	   {
	        $q=$this->db->query("select MAX(node_order) as max_order from tbl_banner ")->row();
	        $node_order=$q->max_order+1;
			$data = array(
					 'img_id'=>$check_banner_folder_img_id,
					 'node_order'=>$node_order,
					 'title'=>$title_banner_folder[$j],
					 'subtitle'=>$subtitle_banner_folder[$j]	
					);
	        $this->db->insert('tbl_banner',$data);
			
		   $j++;	
	   }
	  
	}
   
   
   public function get_cats()
   {
     
	 $q = $this->db->query("select * from  tbl_portfolio_cat order by id asc");
	 if($q->num_rows()>0)
	 {
	    return $q->result();
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