<?php
/**
*
*/
class admin_topmenu_model extends CI_Model
{

   public function __construct()
   {
       parent::__construct();
       $this->load->database();
   }
   public function get_all_topmenu()
   {
	     
		 $menus = $this->db->query("select * from  tbl_topmenu  order by node_order asc")->result();
		 $s = array();
		 $j = 0;
		 foreach($menus as $menu)
		 {
		    $temp  = array();
			$temp['name'] = $menu->name;
			$temp['id'] = $menu->id;
			$s[$j++] = $temp;
		 }
		 
		 return  $data['menus'] = $s;
   }
   
   
   public function get_all_page()
   { 
     return $q = $this->db->get('tbl_pages')->result();
   }
   
   public function get_menu()
   { 
     $id=$this->input->post('id');
	 return $q = $this->db->get_where('tbl_topmenu',array('id'=>$id))->row();
   }
   
   public function input_menu()
   {
	      $input_menu=$this->input->post('title');
		  $page=$this->input->post('page');
		  $user_id=$this->session->userdata('id');
		  $q=$this->db->query("select MAX(node_order) as max_order from tbl_topmenu")->row();
		  $node_order=$q->max_order+1;
		  $menu_id=$this->input->post('id');
		  if(!$menu_id)
		  {
		  	$this->db->insert('tbl_topmenu',array('name'=>$input_menu,'url'=>$page,'node_order'=>$node_order));
		  	return $this->db->insert_id();
		  }
		  else
		  {
		  
		    $this->db->set('name',$input_menu);
			$this->db->set('url',$page);
		    $this->db->where('id', $menu_id);
		    $this->db->update('tbl_topmenu');
			return $menu_id;
		  }
		  
	} 

    public function del_menu()
	{
	   
	    $del_id=$this->input->post('del_id');
	    $user_id=$this->session->userdata('id');
		$this->db->where('id', $del_id);
        $this->db->delete('tbl_topmenu');
		
        
	}


  
   public function total_count()
   {
      $q = $this->db->get('tbl_clients')->num_rows();
	  if($q>0)
	  {
	   return $q;
	  }
	  else
	  {
	  return 0;
	  }
	  
   }
   
   public function client_insert()
   {
              $image=$_FILES['image']['name'];
			  $filename =basename($_FILES['image']['name']);
			  $basename=$filename;
			  $image_info = getimagesize($_FILES["image"]["tmp_name"]);
			  $image_width = $image_info[0];
			  $image_height = $image_info[1];
			  if($filename)
			  {
						$img=trim($image);
						if(!empty($image))
					
						{
							if(file_exists("uploads/clients//$filename"))
							{
							//Rename the file automatically by appending 1,2,3...with the basename
							//File Extension
								$efilename = explode('.', $filename);
								$ext = $efilename[count($efilename) - 1];			
								//Index of .
								$pos=strpos($filename,".");
								$str=substr($basename,0,$pos);			
							$j=0;	
							while(file_exists("uploads/clients//$filename"))
							{			
								
								$j++;					
								$filename=$str.$j.".".$ext;
								
								
							}						
											
						  }
						}
							if(!empty($img))
							{
									$userfile_name=$_FILES['image']['name'];
									$userfile_tmp_name=$_FILES['image']['tmp_name'];
									//$userfile_size=$_FILES[$userfile1]['size'];
									//$userfile_type=$_FILES[$userfile1]['type'];
										if(isset($_ENV['WIDIR']))
										{
										$userfile=str_replace("\\\\","\\",$_FILES['image']['name']);
										}	
									
								//if($userfile_type!=("image/pjpeg" or "image/gif")) die("Pls select .JPG/.GIF pictures only");
								//if($userfile_size<0 || $userfile_size>100000) die ("Please upload pictures with less than 100 KB");								
								if(!move_uploaded_file($userfile_tmp_name,"uploads/clients//$filename") ) {die ("Cant' copy $userfile_name");	}
					}
					$data = array(
						'img'=>$filename
						
					);
					$this->db->insert('tbl_clients',$data);
		      }	
   }
   
   
   public function delete_clients()
   {
	   $del_id=$this->input->post('chk_status');
	   $del_id=explode(',',$del_id);
	   foreach($del_id as $val)
	   {
		  $this->db->where('id', $val);
		  $this->db->delete('tbl_clients');
	   }
   }

   
}
?>