<?php
/**
*
*/
error_reporting(0);
class admin_blog_category_model extends CI_Model
{

   public function __construct()
   {
       parent::__construct();
       $this->load->database();
   }
   
   
   public function get_all_blog_category($limitStart)
   {
	   // echo "select * from  tbl_banner  order by node_order asc limit $limitStart, 100"; 
		 $blogs = $this->db->query("select * from  tbl_blog_category  order by id desc limit $limitStart, 100")->result();
		 $s = array();
		 $j = 0;
		 foreach($blogs as $blog)
		 {
		    $temp  = array();
			$temp['name'] = $blog->name;
			$temp['id'] = $blog->id;
			$s[$j++] = $temp;
		 }
		 
		 return  $data['blogs_cat'] = $s;
   }
   
   public function get_blog_category_view()
   {
	   // echo "select * from  tbl_banner  order by node_order asc limit $limitStart, 100"; 
		 return $blogs = $this->db->query("select * from  tbl_blog_category  order by id desc")->result();
		 $s = array();
		 $j = 0;
		 
		 
		 
   }
   public function submit_form()
   {
      
	    $title_ar=$this->input->post('name');
		foreach($title_ar as $title)
		{
	      if($title!='')
		  {
			  $data = array(
							
							'name'=>$title
							
						);
			  $this->db->insert('tbl_blog_category',$data);	
		  }				
	    }
  }
  
 public function remove_blog_category()
   {
   
     $id=$this->input->post('id');
	 //echo "select * from tbl_blog_category where id='$id'";
	 //$q = $this->db->query("delete from tbl_blog_category where id='$id'")->row();
	 $this->db->where('id', $id);
     $this->db->delete('tbl_blog_category');
	 
   }       



 public function edit_form($id)
   {
      
	    $title=$this->input->post('name');
	    $data1 = array(
						'name'=>$title
						
					);
		$this->db->where('id', $id);
		$this->db->update('tbl_blog_category',$data1);	
  
  
  
        
} 
   
   public function get_blog_category($id)
   {
     
	 $q = $this->db->query("select * from  tbl_blog_category where id='$id'");
	 if($q->num_rows()>0)
	 {
	    return $q->row();
	 }
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