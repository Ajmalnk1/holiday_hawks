<?php
/**
*
*/
class portfolio_model extends CI_Model
{

   public function __construct()
   {
       parent::__construct();
       $this->load->database();
   }
   public function get_portfolio_cat()
   {     
         
		 $q=$this->db->query("select * from tbl_portfolio_cat order by node_order asc");
		 if($q->num_rows()>0)
		 {
			return $q->result();
		 }
   }
   
   public function get_portfolio_cat_name($cat_id)
   {     
         
		 $q=$this->db->query("select * from tbl_portfolio_cat  where id='$cat_id'");
		 if($q->num_rows()>0)
		 {
			$q=$q->row();
			return $q->title;
		 }
   }
   
   public function get_portfolio($cat_id)
   {
        
		 $q=$this->db->query("select a.id,a.cat_id,a.project_temp_id,a.title,a.descr,a.cover_img,b.img from tbl_projects a left join  tbl_projects_img b on a.cover_img=b.id where a.cat_id='$cat_id' order by a.node_order asc");
		 if($q->num_rows()>0)
		 {
			return $q->result();
		 }
   }
   public function next_link($node_order)
   {
   
        //echo "select node_order from tbl_projects where node_order=$node_order+1";
		$query = $this->db->query("select node_order,id from tbl_projects where node_order=$node_order+1");
		if($query ->num_rows()>0){
		 $query=$query->row(); return $query->id;
		}
		else
		{ return '';
		}
   }
	public function prev_link($node_order)
   {
   
        //echo "select node_order from tbl_projects where node_order=$node_order+1";
		$query = $this->db->query("select node_order,id from tbl_projects where node_order=$node_order-1");
		if($query ->num_rows()>0){
		 $query=$query->row(); return $query->id;
		}
		else
		{ return '';
		}
   }
   public function portfolio_detail($id)
   {
        $query = $this->db->get_where('tbl_projects', array('id' => $id));
		return $query=$query->row();
		
   }
   
   public function portfolio_detail_img($id)
   {
        $query = $this->db->get_where('tbl_projects_img', array('project_temp_id' => $id));
		return $query=$query->result();
   }

  
   
}
?>