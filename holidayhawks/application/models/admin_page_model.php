<?php
/**
*
*/
error_reporting(0);
class admin_page_model extends CI_Model
{

   public function __construct()
   {
       parent::__construct();
       $this->load->database();
   }
   
   
   public function get_all_page($limitStart)
   {
	   // echo "select * from  tbl_banner  order by node_order asc limit $limitStart, 100"; 
		 $pages = $this->db->query("select * from  tbl_pages  order by pageid desc limit $limitStart, 100")->result();
		 $s = array();
		 $j = 0;
		 foreach($pages as $page)
		 {
		    $temp  = array();
			$temp['name'] = $page->pgname;
			$temp['id'] = $page->pageid;
			$temp['type'] = $page->pgtype;
			$s[$j++] = $temp;
		 }
		 
		 return  $data['pages'] = $s;
   }
   
   function gen_seo_friendly_titles($title) {

    $replace_what = array('  ', ' - ', ' ',    ', ', ',');

     $replace_with = array(' ', '-', '-', ',', '-');

  
    $title = strtolower($title);

     $title = str_replace($replace_what, $replace_with, $title);

     return $title;

   
  }
   public function submit_form()
   {
      
	    $name=$this->input->post('name');
		$slug=$this->gen_seo_friendly_titles($this->input->post('slug'));
		$title=$this->input->post('title');
		$descr=$this->input->post('descr');
		$content=$this->input->post('content');
		
		$data = array(
						
						'pgname'=>$name,
						'pgalias'=>$slug,
						'pgtitle'=>$title,
						'pgdescription'=>$descr,
						'pgcontent'=>$content,
						
					);
		$this->db->insert('tbl_pages',$data);
		$insert_id = $this->db->insert_id();
        $pgurl="page/index/$insert_id";
		$data1 = array(
						'pglink'=>$pgurl
						
					);
		$this->db->where('pageid', $insert_id);
		$this->db->update('tbl_pages',$data1);	
		  				
	    
  }
  
 public function remove_page()
   {
   
     $id=$this->input->post('id');
	 //echo "select * from tbl_blog_category where id='$id'";
	 //$q = $this->db->query("delete from tbl_blog_category where id='$id'")->row();
	 $this->db->where('pageid', $id);
     $this->db->delete('tbl_pages');
	 
   }       



 public function edit_form($id)
   {
      
	    $name=$this->input->post('name');
		$slug=$this->gen_seo_friendly_titles($this->input->post('slug'));
		$title=$this->input->post('title');
		$descr=$this->input->post('descr');
		$content=$this->input->post('content');
		if($slug):
		$data1 = array(
						
						'pgname'=>$name,
						'pgalias'=>$slug,
						'pgtitle'=>$title,
						'pgdescription'=>$descr,
						'pgcontent'=>$content,
						
					);
		else:
		$data1 = array(
						
						'pgname'=>$name,
						'pgtitle'=>$title,
						'pgdescription'=>$descr,
						'pgcontent'=>$content,
						
					);
		
		endif;			
					
		$this->db->where('pageid', $id);
		$this->db->update('tbl_pages',$data1);	
  
  
  
        
} 
   
   public function get_pages($id)
   {
     
	 $q = $this->db->query("select * from  tbl_pages where pageid='$id'");
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