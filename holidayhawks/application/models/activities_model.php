<?php
/**
*
*/
class activities_model extends CI_Model
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
	 $q = $this->db->query("select * from tbl_activities order by node_order asc limit $limitStart, 12");
	 if($q->num_rows()>0)
	 {
	   return $q->result();
	 }
	 
   }
   
   public function get_detls_text()
   {
     $this->db->where('type','act');
     return  $this->db->get('tbl_pkg_text')->row();
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
   
   public function get_act_id($name)
   {
     $q = $this->db->get_where('tbl_activities', array('name'=>str_replace("-"," ",$name)));
	 if($q->num_rows()>0)
	 {
	    $row=$q->row();
		$data['id'] = $row->id;
		$data['title'] = $row->name;
		$data['detail_name'] = $row->detail_name;
		$data['cover_img'] = $row->detail_img;
		$data['banner_img'] = $row->banner;
		$data['descr'] = $row->descr;
		$data['detail_descr1'] = $row->detail_descr1;
		$data['detail_descr2'] = $row->detail_descr2;
		$data['page_title'] = $row->pg_title;
		$data['page_desc'] = $row->pg_desc;
		/*$data['content'] = preg_replace('/[\S\s]*?>/i','',$row->descr,1);*/
		
		$q1=$this->db->query("SELECT * from tbl_destination where id in(select distinct(destination_id) from tbl_destination_activities where activities_id='{$row->id}')");
		if($q1->num_rows()>0)
		{
		  $q1=$q1->result();
		  $data['destinations']=$q1;
		}
		
		return $data;
	 }
   }
   
   public function get_act_desti_id($act,$desti)
   {
      $q1 = $this->db->get_where('tbl_activities', array('name'=>str_replace("-"," ",$act)))->row();
	  $act_id=$q1->id;
	  $data['act_name']=str_replace("-"," ",$act);
	  $data['act_banner']=$q1->banner;
	  $data['detail_name']=$q1->detail_name;
	  $q2 = $this->db->get_where('tbl_destination', array('name'=>str_replace("-"," ",$desti)))->row();
	  $desti_id=$q2->id;
	  $data['desti_name']=ucwords($q2->name);
	  $q3 = $this->db->get_where('tbl_activities_detail', array('act_cat_id'=>$act_id,'destination_id'=>$desti_id))->result();
	  //echo $this->db->last_query();
	  $data['act_details']=$q3;
	  //$q4=$this->db->query("select * from tbl_activities where id in (select activities_id from tbl_destination_activities where destination_id='$desti_id') and id!='$act_id'")->result();
	  $q4=$this->db->query("select * from tbl_activities_detail where destination_id ='$desti_id' and act_cat_id!='$act_id'")->result();
	  $data['other_act']=$q4;
	  return $data;
	  
   }
   
   public function get_act_detail_id($name)
   {
       $q1 = $this->db->get_where('tbl_activities_detail', array('title'=>str_replace("-"," ",$name)))->row();
	   $act_id=$q1->id;
	   $data['main_detail']=$q1;
	   $q2 = $this->db->get_where('tbl_activities_about', array('act_id'=>$act_id))->row();
	   $data['about']=$q2;
	   $q3 = $this->db->get_where('tbl_activities_about_images', array('act_id'=>$act_id))->result();
	   $data['about_gallery']=$q3;
	   $q4 = $this->db->get_where('tbl_activities_gallery', array('act_id'=>$act_id,'status'=>1))->result();
	   $data['gallery']=$q4;
	   $q5 = $this->db->get_where('tbl_activities_avail', array('act_id'=>$act_id))->row();
	   $data['avail']=$q5;
	   $q6 = $this->db->get_where('tbl_activities_info', array('act_id'=>$act_id))->result();
	   $data['info']=$q6;
	   $q7 = $this->db->get_where('tbl_activities_things', array('act_id'=>$act_id))->row();
	   $data['things']=$q7;
	   return $data;
   }
   
   
   
   
}
?>