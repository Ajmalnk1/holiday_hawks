<?php
/**
*
*/
class admin_portfolio_category_model extends CI_Model
{

   public function __construct()
   {
       parent::__construct();
       $this->load->database();
   }
   public function load_data_pcat($start,$per_page)
   {
     //order by id desc LIMIT $start, $per_page
	 //$this->db->limit($start,$per_page);
	 //$this->db->order_by("id", "desc");
	 $q = $this->db->query("select * from tbl_portfolio_cat order by node_order asc limit $start,$per_page");
	 if($q->num_rows()>0)
	 {
	    return $q->result();
	 }
   }

  
   public function total_count()
   {
      $q = $this->db->get('tbl_portfolio_cat')->num_rows();
	  if($q>0)
	  {
	   return $q;
	  }
	  else
	  {
	  return 0;
	  }
	  
   }
   
   public function insert()
   {
              $title=$this->input->post('title');
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
							if(file_exists("uploads/pcat//$filename"))
							{
							//Rename the file automatically by appending 1,2,3...with the basename
							//File Extension
								$efilename = explode('.', $filename);
								$ext = $efilename[count($efilename) - 1];			
								//Index of .
								$pos=strpos($filename,".");
								$str=substr($basename,0,$pos);			
							$j=0;	
							while(file_exists("uploads/pcat//$filename"))
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
								if(!move_uploaded_file($userfile_tmp_name,"uploads/pcat//$filename") ) {die ("Cant' copy $userfile_name");	}
					}
					
					$q=$this->db->query("select MAX(node_order) as max_order from tbl_portfolio_cat")->row();
	                $node_order=$q->max_order+1;
					$data = array(
						'img'=>$filename,
						'title'=>$title,
						'node_order'=>$node_order
						
					);
					$this->db->insert('tbl_portfolio_cat',$data);
		      }	
   }
   public function edit($id)
   {
              $title=$this->input->post('title');
			  //if(isset($_FILES['image']['name'])):
			  $image=$_FILES['image']['name'];
			  //echo 2;
			  if($image):
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
							if(file_exists("uploads/pcat//$filename"))
							{
							//Rename the file automatically by appending 1,2,3...with the basename
							//File Extension
								$efilename = explode('.', $filename);
								$ext = $efilename[count($efilename) - 1];			
								//Index of .
								$pos=strpos($filename,".");
								$str=substr($basename,0,$pos);			
							$j=0;	
							while(file_exists("uploads/pcat//$filename"))
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
								if(!move_uploaded_file($userfile_tmp_name,"uploads/pcat//$filename") ) {die ("Cant' copy $userfile_name");	}
					}
					
					$data = array(
					   'img'=>$filename
					);
					$this->db->where('id', $id);
					$this->db->update('tbl_portfolio_cat',$data);
				}
				
			  endif;
			  $data = array(
				
				'title'=>$title
				
			  );
			  $this->db->where('id', $id);
			  $this->db->update('tbl_portfolio_cat',$data);
		      	
   }
   public function get($id)
   {
     return $q=$this->db->query("select * from tbl_portfolio_cat where id='$id'")->row();
   }
   
   /*public function delete()
   {
	   $del_id=$this->input->post('chk_status');
	   $del_id=explode(',',$del_id);
	   foreach($del_id as $val)
	   {
		  $this->db->where('id', $val);
		  $this->db->delete('tbl_portfolio_cat');
	   }
   }*/

   public function delete()
   {
	   $id=$this->input->post('id');
	   $this->db->where('id', $id);
	   $this->db->delete('tbl_portfolio_cat');
	   
   }

}
?>