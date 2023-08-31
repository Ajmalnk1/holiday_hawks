<?php
/**
*
*/
class admin_projects_model extends CI_Model
{

   public function __construct()
   {
       parent::__construct();
       $this->load->database();
   }
   
   public function load_data_pjt($start,$per_page)
   {
     //order by id desc LIMIT $start, $per_page
	 //$this->db->limit($start,$per_page);
	 //$this->db->order_by("id", "desc");
	 $cat_id=$_POST['cat_id'];
	 $q = $this->db->query("select a.*,b.title as cat_name,c.img from  tbl_projects a left join tbl_portfolio_cat b  on a.cat_id=b.id left join tbl_projects_img c on a.cover_img=c.id  where a.cat_id='$cat_id'  order by a.node_order asc");
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
	 $q = $this->db->query("select * from tbl_projects_img where id='$id'")->row();
	 $name=$q->img;
	 if(file_exists('uploads/projects/'.$name))
		 {
				$this->db->query("delete from tbl_projects_img where id='$id'"); 
				unlink('uploads/projects/'.$name);
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
   
   
   public function total_count($cat_id)
   {
     
	  $q = $this->db->get_where('tbl_projects' ,array('cat_id' => $cat_id))->num_rows();
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