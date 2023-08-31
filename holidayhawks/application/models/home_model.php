<?php
/**
*
*/
class home_model extends CI_Model
{

   public function __construct()
   {
       parent::__construct();
       $this->load->database();
   }
   public function vectors()
   {
      $this->db->order_by('node_order','asc');
	  return $vect=$this->db->get('tbl_vectors')->result();
   }
   public function blogs()
   {
      //$this->db->order_by('node_order','asc');
	  //$this->db->limit('3');
	  //return $vect=$this->db->get('tbl_blog')->result();
	  $q=$this->db->query("select a.*,b.name as catname from tbl_blog a left join tbl_blog_category b on a.cat_id=b.id order by a.node_order asc limit 3");
	  if($q->num_rows()>0)
	  {
	    return $q->result();
	  }
	  
   }
   public function home_text_pkg()
   {
      return $pkg_text=$this->db->get_where('tbl_home_text',array('type'=>'pkg'))->row();
   }
   public function home_text_desti()
   {
      return $pkg_text=$this->db->get_where('tbl_home_text',array('type'=>'destination'))->row();
   }
   
   public function home_text_exp()
   {
      return $pkg_text=$this->db->get_where('tbl_home_text',array('type'=>'exp_stays'))->row();
   }
   public function home_text_act()
   {
      return $pkg_text=$this->db->get_where('tbl_home_text',array('type'=>'act'))->row();
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
	    $this->db->order_by("node_order", "asc");
		$banners=$this->db->get_where('tbl_banner',array('pg_type'=>'home'))->result();
		return $banners;
		
    }
   public function get_exp_stays()
   { 
	    $this->db->order_by("node_order", "asc");
		$this->db->where('display_home',1);
		$exp_stays=$this->db->get('tbl_exp_stays')->result();
		return $exp_stays;
		
   }  
   
   public function get_activities()
   { 
	    $this->db->order_by("node_order", "asc");
		$this->db->where('display_home',1);
		$activities=$this->db->get('tbl_activities')->result();
		return $activities;
		
   }  
   
   public function get_pkg_cats()
   { 
	    $this->db->order_by("node_order", "asc");
		$pkg_cats=$this->db->get('tbl_pkg_category')->result();
		return $pkg_cats;
		
   } 
   public function get_destination()
   {
        $this->db->order_by("node_order", "asc");
		$this->db->where('display_home',1);
		$destination=$this->db->get('tbl_destination')->result();
		return $destination;
   } 
   
}
?>