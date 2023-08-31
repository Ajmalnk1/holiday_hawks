<?php
/**
*
*/
class admin_model extends CI_Model
{

   public function __construct()
   {
       parent::__construct();
       $this->load->database();
   }

   public function admin_login($email_id,$pswd)
   {
       //$this->db->order_by('id ASC');
       //$this->db->limit($limit,$start);
	   $email_id = $this->input->post('uname');
	   $pswd = md5($this->input->post('pswd'));
	   $this->db->where(array('email' => $email_id,'pswd'=>$pswd));
       $result = $this->db->get('tbl_user');
       if($result->num_rows()>0)
	   {
	     
		 $result=$result->row();
		 $id=$result->id;
			   
			     $newdata = array(
	         	  'id'  => $id,
				 );
	          	 $this->session->set_userdata($newdata);
				 if($this->session->userdata('id'))
			     {
				   return 1;
				 }
	   }
	   else
	   {
	    return 0;
	   }
   }

   
}
?>