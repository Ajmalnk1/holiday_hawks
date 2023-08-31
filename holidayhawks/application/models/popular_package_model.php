<?php
/**
*
*/
class popular_package_model extends CI_Model
{

   public function __construct()
   {
       parent::__construct();
       $this->load->database();
   }
   
   
   
   public function get_banner()
   { 
	    
		$banner=$this->db->query("select img from tbl_banner where page_id in (select pageid from tbl_pages where pgalias='activities' and pgtype=1)");
		if($banner->num_rows()>0)
		{
		  $banner=$banner->row();
		  return $banner->img;
		}
		
		
		//return $data;
   }
   
   
   public function get_basic($name)
   {
     return $q1 = $this->db->get_where('tbl_pkg_category', array('name'=>str_replace("-"," ",$name)))->row();
	 
	 
	 
   }
   
   public function get_desti($name)
   {
     $q1 = $this->db->get_where('tbl_pkg_category', array('name'=>str_replace("-"," ",$name)))->row();
	 $id=$q1->id;
	 //$q2 = $this->db->get_where('tbl_destination_pkg', array('pkg_id'=>$id));
	 $q2 = $this->db->query("select * from tbl_destination where id in (select destination_id from tbl_destination_pkg where pkg_id='$id')");
	 if($q2->num_rows()>0)
	 {
	    return $q2->result();
	 }
	 
   }
   
   public function pkg_lists()
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
		$select_desti_id=$this->input->post('select_desti_id');
		$pkg_cat_id=$this->input->post('pkg_cat_id');
		if($select_desti_id)
		{
		  $this->db->where('destination_id',$select_desti_id);
		}
		$this->db->where('pkg_cat_id',$pkg_cat_id);
    	return $query = $this->db->get('tbl_pkg_category_detail')->result();
		
		
   }
   
   
   
   
  
   
   public function get_detail_id($name)
   {
       $q1 = $this->db->get_where('tbl_pkg_category_detail', array('title'=>str_replace("-"," ",$name)))->row();
	   $pkg_id=$q1->id;
	   $pkg_cat_id=$q1->pkg_cat_id;
	   $sql = $this->db->get_where('tbl_pkg_category', array('id'=>$pkg_cat_id))->row();
	   $data['pkg_cat_name']=$sql->name;
	   $data['main_detail']=$q1;
	   $q2 = $this->db->get_where('tbl_pkg_category_about', array('pkg_id'=>$pkg_id))->row();
	   $data['about']=$q2;
	   $q4 = $this->db->get_where(' tbl_pkg_category_gallery', array('pkg_id'=>$pkg_id,'status'=>1))->result();
	   $data['gallery']=$q4;
	   $q5 = $this->db->get_where('tbl_pkg_category_highlights', array('pkg_id'=>$pkg_id))->result();
	   $data['highlights']=$q5;
	   $q6 = $this->db->get_where('tbl_pkg_category_info', array('pkg_id'=>$pkg_id))->result();
	   $data['info']=$q6;
	   $q7 = $this->db->get_where('tbl_pkg_category_itenary', array('pkg_id'=>$pkg_id))->result();
	   $data['itns']=$q7;
	   //$q8 = $this->db->get_where('tbl_pkg_category_itenary', array('pkg_id'=>$pkg_id))->result();
	   
	   return $data;
   }
   
   
   
   
}
?>