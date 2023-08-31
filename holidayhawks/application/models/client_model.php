<?php
/**
*
*/
class client_model extends CI_Model
{

   public function __construct()
   {
       parent::__construct();
       $this->load->database();
   }
   public function get_clients()
   {
     //order by id desc LIMIT $start, $per_page
	 //$this->db->limit($start,$per_page);
	 //$this->db->order_by("id", "desc");
	 $q = $this->db->query("select * from tbl_clients order by id desc ");
	 if($q->num_rows()>0)
	 {
	    return $q->result();
	 }
   }

  
   
}
?>