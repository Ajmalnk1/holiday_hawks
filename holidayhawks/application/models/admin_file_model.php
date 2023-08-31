<?php
/**
*
*/
class admin_file_model extends CI_Model
{

   public function __construct()
   {
       parent::__construct();
       $this->load->database();
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
	  $q = $this->db->query("select * from  tbl_image where folder='' order by id desc limit $limitStart, 100");

	 if($q->num_rows()>0)
	 {
	    return $q->result();
	 }
   }
   
   public function load_data_images_folder($limitStart)
   {
     //order by id desc LIMIT $start, $per_page
	 //$this->db->limit($start,$per_page);
	 //$this->db->order_by("id", "desc");
	  //$this->db->limit($start,$per_page);
	  ///$this->db->order_by('id', 'desc');
	  //$this->db->where('subid', $parentitem[$i]['id']);
	  ///$q = $this->db->get('tbl_image');
	  //$q = $this->db->get('tbl_image',  $limitStart, 50);
	  $q = $this->db->query("select * from  tbl_image where folder!='' group by folder order by id desc limit $limitStart, 100");

	 if($q->num_rows()>0)
	 {
	    return $q->result();
	 }
   }
   
   public function load_data_images_folder_all($limitStart)
   {
     //order by id desc LIMIT $start, $per_page
	 //$this->db->limit($start,$per_page);
	 //$this->db->order_by("id", "desc");
	  //$this->db->limit($start,$per_page);
	  ///$this->db->order_by('id', 'desc');
	  //$this->db->where('subid', $parentitem[$i]['id']);
	  ///$q = $this->db->get('tbl_image');
	  //$q = $this->db->get('tbl_image',  $limitStart, 50);
	  $foldername=$this->input->post('foldername');
	  $q = $this->db->query("select * from  tbl_image where folder='$foldername' order by id desc limit $limitStart, 100");

	 if($q->num_rows()>0)
	 {
	    return $q->result();
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
	 $q = $this->db->query("select * from tbl_image where id='$id'")->row();
	 $name=$q->img;
	 if(file_exists('uploads/images/'.$name))
		 {
				$this->db->query("delete from tbl_image where id='$id'"); 
				unlink('uploads/images/'.$name);
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