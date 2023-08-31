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
   
   public function get_page_title()
   { 
	    $blog_title=$this->db->get_where('tbl_pages',array('pgalias'=>'blog'))->row();
		$data['page_title']=$blog_title->pgtitle;
		$data['page_desc']=$blog_title->pgdescription;
		return $data;
   }
   
   public function get_banner()
   { 
	    $banner=$this->db->query("select img from tbl_banner where page_id in (select pageid from tbl_pages where pgname='Blog' and pgtype=1)");
		if($banner->num_rows()>0)
		{
		  $banner=$banner->row();
		  return $banner->img;
		}
		
		
		//return $data;
   }
   public function get_blog($catname=0)
   {
        if(isset($_POST['page']))
		{
		  $limitStart=$_POST['page'];
	      $d['page']=$limitStart;
		}
		else
		{
		  $limitStart=0;
	      $d['page']=$limitStart;
		}
		$limitCount = 30;
		//echo $catname;
		//return $this->db->get("select* from  order by id desc limit $limitStart,$limitCount")->result();
		if($catname!='')
		{
		 
		 $this->db->select('id');
     	 $this->db->where('name', $catname);
    	 $query = $this->db->get('tbl_blog_category');
		 $cat_id = array();
		 foreach ($query->result() as $val)
    	 {
           $cat_id[] = $val->id;
    	 }
		 $this->db->order_by('node_order', 'ASC');
		 $this->db->limit($limitCount,$limitStart);
		 $this->db->where_in('cat_id', $cat_id); //pass array of 'id' from above query
    	 $blogs = $this->db->get('tbl_blog');
		 //echo $this->db->last_query();
		 //$blogs=$this->db->get_where('tbl_blog',array('cat_id'=>$catid),$limitCount,$limitStart);
		 
		}else
		{
		 $this->db->order_by('node_order', 'ASC');
		 $blogs=$this->db->get('tbl_blog',$limitCount,$limitStart);
		}
        $d = array();
		$k = 0;
		
		if($blogs->num_rows()>0){
		
		
		foreach($blogs->result() as $blog)
		{
		   
		   
		   $temp = array();
		   $temp['id'] = $blog->id;
		   $temp['title'] = $blog->title;
		   $temp['subtitle'] = $blog->subtitle;
		   $temp['cover_img'] = $blog->cover_img;
		   $temp['content'] = $blog->descr;
		   $this->db->where('id',$blog->cat_id);
		   $subquery = $this->db->get('tbl_blog_category');
		   $temp['cat_name']='';
		   if($subquery->num_rows()>0)
		   {
		     
			 $subquery=$subquery->row();
             $temp['cat_name']=$subquery->name;
		   }
		   $d[$k++] = $temp;
		}
		
		return $data['blogs'] = $d;
		}
   }
   
   public function get_blog_id($name)
   {
     $q = $this->db->get_where('tbl_blog', array('title'=>str_replace("-"," ",$name)));
	 if($q->num_rows()>0)
	 {
	    $row=$q->row();
		$data['id'] = $row->id;
		$data['title'] = $row->title;
		$data['cover_img'] = $row->cover_img;
		$data['banner_img'] = $row->banner_img;
		$data['subtitle'] = $row->subtitle;
		$data['page_title'] = $row->page_title;
		$data['page_desc'] = $row->page_desc;
		$data['content'] = preg_replace('/[\S\s]*?>/i','',$row->descr,1); 
		$this->db->where("id !=",$row->id);
		$this->db->order_by("id", "desc");
		$subquery = $this->db->get('tbl_blog',5);
		if($subquery->num_rows()>0)
		{
		  $data['other_blog']=$subquery->result();
		}
		$q1=$this->db->query("SELECT a.id,a.name,count(b.cat_id) as count_cat from tbl_blog_category a left join  tbl_blog b on a.id=b.cat_id where a.id in (select cat_id from tbl_blog)group by a.id order by a.name asc");
		if($q1->num_rows()>0)
		{
		  $q1=$q1->result();
		  $data['catgeories']=$q1;
		}
		$this->db->where("blog_id",$row->id);
		$query_blog = $this->db->get('tbl_blog_comment');
		if($query_blog->num_rows()>0)
		{
		   $query_blog=$query_blog->result();
		   $data['comments']=$query_blog;
		}
		return $data;
	 }
   }
   
   public function submit_comment()
   {
     $name_cmnt=$this->input->post('name_cmnt');
	 $email_cmnt=$this->input->post('email_cmnt');
	 $ph_cmnt=$this->input->post('ph_cmnt');
	 $msg_cmnt=$this->input->post('msg_cmnt');
	 $blog_id=$this->input->post('blog_id');
	 $now = date('d.m.Y');
	 $data=array(
	              'name'=>$name_cmnt,
				  'email'=>$email_cmnt,
				  'ph'=>$ph_cmnt,
				  'comment'=>$msg_cmnt,
				  'blog_id'=>$blog_id,
				  'created_date'=>$now
	             );
				$this->db->insert('tbl_blog_comment', $data); 
	 
   }
   
   
   /*public function get_blog()
   {
	    $limitStart=$_POST['page'];
		$d['page']=$limitStart;
		$limitCount = 30;
		//return $this->db->get("select* from  order by id desc limit $limitStart,$limitCount")->result();
		return $this->db->get('tbl_blog',$limitStart,$limitCount)->result();
   }*/
   
   
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