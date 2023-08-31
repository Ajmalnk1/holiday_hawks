<?php
/**
*
*/
class destinations_model extends CI_Model
{

   public function __construct()
   {
       parent::__construct();
       $this->load->database();
   }
   
   public function get_all()
   {
     //echo $limitStart;
	 //echo "select a.*,b.pgname from tbl_banner a left join tbl_pages b on a.page_id=b.pageid order by node_order asc limit $limitStart, 100 ";
	 if(isset($_POST['page']))
	 {
		  $limitStart=$_POST['page'];
	     
	 }
	 else
	 {
		  $limitStart=0;
	      
	 }
	 //echo "select * from tbl_exp_stays order by node_order asc limit $limitStart, 12";
	 $q = $this->db->query("select * from tbl_destination order by node_order asc limit $limitStart, 30");
	 if($q->num_rows()>0)
	 {
	   return $q->result();
	 }
	 
   }
   
   public function get_detls_text()
   {
     $this->db->where('type','destination');
     return  $this->db->get('tbl_pkg_text')->row();
   }
   
   
   public function get_banner()
   { 
	    
		$banner=$this->db->query("select img from tbl_banner where page_id in (select pageid from tbl_pages where pgalias='destinations' and pgtype=1)");
		if($banner->num_rows()>0)
		{
		  $banner=$banner->row();
		  return $banner->img;
		}
		
		
		//return $data;
   }
   
   
   public function get_desti($name)
   {
   
      $q = $this->db->get_where('tbl_destination', array('name'=>str_replace("-"," ",$name)));
	  if($q->num_rows()>0)
	  {
	   return  $row=$q->row();
		
	  }
	}  	
   
      
   public function get_desti_id($name)
   {
   
     /* $q = $this->db->get_where('tbl_destination', array('name'=>str_replace("-"," ",$name)));
	  if($q->num_rows()>0)
	  {
	    $row=$q->row();
		$desti_id=$row->id;
		$hand_picked=$this->db->query("SELECT a.price,a.id,a.title,1 as activities,a.cover_img,a.descr from tbl_activities_detail a  where a.destination_id='$desti_id' and a.hand_picked_pkg=1 union SELECT b.price,b.id,b.title,2 as exp,b.cover_img,b.descr from tbl_exp_stays_detail b where b.destination_id='$desti_id' and b.hand_picked_pkg=1 union SELECT c.price,c.id,c.title,3 as pkg,c.cover_img,c.descr from tbl_pkg_category_detail c where c.destination_id='$desti_id' and c.hand_picked_pkg=1");
		if($hand_picked->num_rows()>0)
		{
		return $hand_picked=$hand_picked->result();
		}
		
	  }	*/
	  
	  $q = $this->db->get_where('tbl_destination', array('name'=>str_replace("-"," ",$name)));
	  if($q->num_rows()>0)
	  {
	    $row=$q->row();
		$desti_id=$row->id;
		$this->db->where(array('destination_id'=>$desti_id));
		$exp=$this->db->get('tbl_pkg_category_detail');
		if($exp->num_rows()>0)
		{
		return $exp->result();
		}
		
	  }	
	  
   }
   
   public function get_exp_desti($name)
   {
   
      $q = $this->db->get_where('tbl_destination', array('name'=>str_replace("-"," ",$name)));
	  if($q->num_rows()>0)
	  {
	    $row=$q->row();
		$desti_id=$row->id;
		$this->db->where(array('destination_id'=>$desti_id));
		$exp=$this->db->get('tbl_exp_stays_detail');
		if($exp->num_rows()>0)
		{
		return $exp->result();
		}
		
	  }	
   }
   
   public function get_acti_desti($name)
   {
   
      $q = $this->db->get_where('tbl_destination', array('name'=>str_replace("-"," ",$name)));
	  if($q->num_rows()>0)
	  {
	    $row=$q->row();
		$desti_id=$row->id;
		$this->db->where(array('destination_id'=>$desti_id));
		$acti=$this->db->get('tbl_activities_detail');
		if($acti->num_rows()>0)
		{
		return $acti=$acti->result();
		}
		
	  }	
   }
   
   
}
?>