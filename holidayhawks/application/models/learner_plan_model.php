<?php
//require 'sendgridemail/vendor/autoload.php';
class learner_plan_model extends CI_Model
{

	   public function __construct()
	   {
		   parent::__construct();
		   $this->load->database();
	   }
	
	
	   public function get_plan($id)
	   {
	     $query = $this->db->get_where(' irti_learning_plan', array('id' => $id));
		 return $query->row();
	   }
	   
	   public function save_level()
	   {
	    $user_id=$this->session->userdata('id');
		$plan_id=$this->input->post('plan_id');
		$plan_for=$this->input->post('plan_for');
		if($plan_for)
		{
		 $this->db->set('plan_for',$plan_for);
		 $this->db->where('id', $plan_id);
		 $this->db->update('irti_learning_plan');
		 return md5($plan_id);
		}
	   }
	   
	   public function publish_plan()
	   {
	     $user_id=$this->session->userdata('id');
		 $plan_id=$this->input->post('plan_id');
		 date_default_timezone_set('Asia/Kolkata');
         $date=  date("Y-m-d H:i:s"); 
		 $this->db->set('status',1);
		 //$this->db->set('published_time',NOW());
		 $this->db->set('published_time',$date);
		 
		 $this->db->where('id',$plan_id);
		 $this->db->update('irti_learning_plan');
	   }
	   
	   public function del_section()
	   {
	   
	    $del_id=$this->input->post('del_id');
	    $user_id=$this->session->userdata('id');
		$this->db->where('id', $del_id);
        $this->db->delete('irti_learning_plan_section');
		$this->db->where('section_id', $del_id);
        $this->db->delete('irti_learning_plan_module');
		$this->db->where('section_id', $del_id);
        $this->db->delete('irti_learning_plan_lecture_assessment');
	   }
	   
	   public function del_module()
	   {
	   
	    $del_id=$this->input->post('del_id');
	    $user_id=$this->session->userdata('id');
		$this->db->where('id', $del_id);
        $this->db->delete('irti_learning_plan_module');
		$this->db->where('module_id', $del_id);
        $this->db->delete('irti_learning_plan_lecture_assessment');
	   }
	   
	   public function del_lect()
	   {
	   
	    $del_id=$this->input->post('del_id');
	    $user_id=$this->session->userdata('id');
		$this->db->where('id', $del_id);
        $this->db->delete('irti_learning_plan_lecture_assessment');
	   }
	   
	   public function get_all_section_plan($md5id)
	   {
	     $plan = $this->db->query("select * from    irti_learning_plan where id = '$md5id'")->row();
		 $data['plan_status']=$plan->status;
		 $sections = $this->db->query("select * from   irti_learning_plan_section where plan_id = '$md5id' order by node_order asc")->result();
		 $s = array();
		 $j = 0;
		 foreach($sections as $section)
		 {
		    $temp  = array();
			$temp['section_name'] = $section->section;
			$temp['section_id'] = $section->id;
			$modules = $this->db->query("select * from   irti_learning_plan_module where section_id = '{$section->id}' order by node_order asc")->result();
			$c = array();
			$i = 0;
			foreach($modules as $module)
			{
			    $temp1 = array();
				$temp1['module_name'] = $module->module;
				$temp1['module_id'] = $module->id;
				//echo "select * from   irti_learning_plan_lecture_assessment where module_id = '{$module->id}' order by node_order asc";
				$lect = $this->db->query("select * from   irti_learning_plan_lecture_assessment where module_id = '{$module->id}'  order by node_order asc")->result();
			    $d = array();
			    $k = 0;
				foreach($lect as $lect_asses)
			    {
				   
				   
				   $temp2 = array();
				   //echo $lect_asses->title;
				   $temp2['count_lect'] = $this->db->query("select * from   irti_learning_plan_lecture_assessment where module_id = '{$module->id}' and type='lecture'  order by node_order asc")->num_rows();
				    $temp2['count_assess'] = $this->db->query("select * from   irti_learning_plan_lecture_assessment where module_id = '{$module->id}' and type='assessment'  order by node_order asc")->num_rows();
				   $temp2['lect_title'] = $lect_asses->title;
				   $temp2['lect_id'] = $lect_asses->id;
				   $temp2['type'] = $lect_asses->type;
				   
				   $d[$k++] = $temp2;
				}
				
				$temp1['lect'] = $d;
				/*$assess = $this->db->query("select * from   irti_learning_plan_lecture_assessment where module_id = '{$module->id}' and type='assessment' order by node_order asc")->result();
			    $m = array();
			    $n = 0;
				foreach($assess as $asses)
			    {
				   $temp3 = array();
				   //echo $lect_asses->title;
				   $temp3['asses_title'] = $asses->title;
				   $temp3['asses_id'] = $asses->id;
				   $temp3['type'] = $asses->type;
				   
				   $m[$n++] = $temp3;
				}*/
				
				$temp1['lect'] = $d;
				//$temp1['asses'] = $m;
				$c[$i++] = $temp1;
			}
			$temp['modules'] = $c;
			$s[$j++] = $temp;
		 }
		 
		return  $data['sections'] = $s;
	   }
	   
	   public function input_section()
	   {
	      $input_section=$this->input->post('input_section');
		  $plan_id=$this->input->post('plan_id');
		  $user_id=$this->session->userdata('id');
		  $q=$this->db->query("select MAX(node_order) as max_order from irti_learning_plan_section where plan_id='$plan_id'")->row();
		  $node_order=$q->max_order+1;
		  $section_id=$this->input->post('section_id');
		  if(!$section_id)
		  {
		  	$this->db->insert('irti_learning_plan_section',array('user_id'=>$user_id,'plan_id'=>$plan_id,'section'=>$input_section,'node_order'=>$node_order));
		  	return $this->db->insert_id();
		  }
		  else
		  {
		  
		    $this->db->set('section',$input_section);
		    $this->db->where('id', $section_id);
		    $this->db->update('irti_learning_plan_section');
			return $section_id;
		  }
		  
	   }
	   
	  public function input_module()
	   {
	      $input_module=$this->input->post('input_module');
		  $plan_id=$this->input->post('plan_id');
		  $section_id=$this->input->post('section_id');
		  $module_id=$this->input->post('module_id');
		  $user_id=$this->session->userdata('id');
		  $q=$this->db->query("select MAX(node_order) as max_order from irti_learning_plan_module where section_id='$section_id'")->row();
		  $node_order=$q->max_order+1;
		  if($section_id)
		  {
			  if(!$module_id)
			  {
				$this->db->insert('irti_learning_plan_module',array('user_id'=>$user_id,'plan_id'=>$plan_id,'section_id'=>$section_id,'module'=>$input_module,'node_order'=>$node_order));
				return $this->db->insert_id();
			  
			  }
			  else
			  {
				$this->db->set('module',$input_module);
				$this->db->where('id', $module_id);
				$this->db->update('irti_learning_plan_module');
				return $module_id;
			  }
		  
		  }
		  
	   }
	   
	   public function input_lecture()
	   {
	      $input_lecture=$this->input->post('input_lect_assess');
		  $type=$this->input->post('type');
		  $plan_id=$this->input->post('plan_id');
		  $section_id=$this->input->post('section_id');
		  $module_id=$this->input->post('module_id');
		  $lecture_id=$this->input->post('lecture_id');
		  $user_id=$this->session->userdata('id');
		  if($module_id)
		  {
		  $q=$this->db->query("select MAX(node_order) as max_order from irti_learning_plan_lecture_assessment where module_id='$module_id'")->row();
		  $node_order=$q->max_order+1;
		  
			  if(!$lecture_id)
			  {
				$this->db->insert('irti_learning_plan_lecture_assessment',array('user_id'=>$user_id,'plan_id'=>$plan_id,'section_id'=>$section_id,'module_id'=>$module_id,'title'=>$input_lecture,'node_order'=>$node_order,'type'=>$type));
				return $this->db->insert_id();
			  
			  }
			  else
			  {
				$this->db->set('title',$input_lecture);
				$this->db->set('type',$type);
				$this->db->where('id', $lecture_id);
				$this->db->update('irti_learning_plan_lecture_assessment');
				return $lecture_id;
			  }
		  
		  }
		  
	   }
	   
	   public function save_plan($id=0)
	   {
	     
		 $user_id=$this->session->userdata('id');
		 $name=$this->input->post('name');
		 $obj=$this->input->post('obj');
		 $country='';$cat_hidden='';$skill_hidden='';
		 if($this->input->post('country_hidden').trim()!='')
		 {
		 	$country_hidden=$this->input->post('country_hidden');
		 	$country=explode(',',$country_hidden);
		 	$country=json_encode($country);
		 }
		 $from_age=$this->input->post('from_age');
		 $to_age=$this->input->post('to_age');
		 if($this->input->post('cat_hidden').trim()!='')
		 {
		 	$cat_hidden=$this->input->post('cat_hidden');
		 	$cat_hidden=explode(',',$cat_hidden);
		 }
		 if($this->input->post('skill_hidden').trim()!='')
		 {
		 	$skill_hidden=$this->input->post('skill_hidden');
		 	$skill_hidden=explode(',',$skill_hidden);
		 }
		 if($id==0)
		 {
			 $this->db->set('created_date', 'NOW()', FALSE);
			 $data=array("user_id"=>$user_id,'name'=>$name,'objective'=>$obj,'country'=>$country,'from_age'=>$from_age,'to_age'=>$to_age);
			 $this->db->insert('irti_learning_plan',$data);
			 $plan_id=$this->db->insert_id();
			 $datas['id']=$plan_id;
			 $datas['name']=$name;
			 foreach($cat_hidden as $cat_hidden_val)
			 {
			   $this->db->insert('irti_learning_plan_category',array('learning_plan_id'=>$plan_id,'cat_id'=>$cat_hidden_val));
			 }
			 foreach($skill_hidden as $skill_hidden_val)
			 {
			   $this->db->insert('irti_learning_plan_skills',array('learning_plan_id'=>$plan_id,'cat_id'=>$skill_hidden_val));
			 }
			 
			 return md5($plan_id);
		 }
		  else
		  {
		     $this->db->set('name',$name);
			 $this->db->set('objective',$obj);
			 $this->db->set('country',$country);
			 $this->db->set('from_age',$from_age);
			 $this->db->set('to_age',$to_age);
			 $this->db->where('id', $id);
			 $this->db->update('irti_learning_plan');
			 $datas['id']=$id;
			 $datas['name']=$name;
			 $this->db->where('learning_plan_id', $id);
             $this->db->delete('irti_learning_plan_category');
			 $this->db->where('learning_plan_id', $id);
             $this->db->delete('irti_learning_plan_skills');
			 foreach($cat_hidden as $cat_hidden_val)
			 {
			   $this->db->insert('irti_learning_plan_category',array('learning_plan_id'=>$id,'cat_id'=>$cat_hidden_val));
			 }
			 foreach($skill_hidden as $skill_hidden_val)
			 {
			   $this->db->insert('irti_learning_plan_skills',array('learning_plan_id'=>$id,'cat_id'=>$skill_hidden_val));
			 }
			 
			 $this->db->set('edit_time', 'NOW()', FALSE);
			 $this->db->insert('irti_learning_plan_edit_history',array('plan_id'=>$id));
			 return md5($id);
			 
		 }
		 
		 
	   }
	   
	   public function del_selected_cat()
	   {
	     $del_id=$this->input->post('del_id');
		 $this->db->where('id', $del_id);
         $this->db->delete('irti_learning_plan_section');
	   }
	   
	   public function get_section()
	   {
	      $id=$this->input->post('id');
		  $query = $this->db->get_where('irti_learning_plan_section', array('id' => $id));
		  $query=$query->row();
		  $data['title']=$query->section;
		  $data['descr']=$query->descr;
		  $topic_list=json_decode($query->topic_list);
		  if($topic_list){
		  $q=$this->db->query("select * from irti_category where id in (" . implode(",",$topic_list) . ")");
		  if($q->num_rows()>0)
		  {
			  $q=$q->result();
			  $i=0;
			  $s=array();
			  foreach($q as $cat)
			  {
				  $temp['cat_name']=$cat->category;
				  $temp['cat_id']=$cat->id;
				  $s[$i++] = $temp;
			  }
			  $data['cats']=$s;
		  }
		  }
		  return $this->output
				->set_status_header(200)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
	   }
	   
	   public function get_module()
	   {
	      $id=$this->input->post('id');
		  $query = $this->db->get_where('irti_learning_plan_module', array('id' => $id));
		  $query=$query->row();
		  $data['title']=$query->module;
		  $data['descr']=$query->descr;
		  $topic_list=json_decode($query->topic_list);
		  if($topic_list){
		  $q=$this->db->query("select * from irti_category where id in (" . implode(",",$topic_list) . ")");
		  if($q->num_rows()>0)
		  {
			  $q=$q->result();
			  $i=0;
			  $s=array();
			  foreach($q as $cat)
			  {
				  $temp['cat_name']=$cat->category;
				  $temp['cat_id']=$cat->id;
				  $s[$i++] = $temp;
			  }
			  $data['cats']=$s;
		  }
		  }
		  return $this->output
				->set_status_header(200)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
	   }
	   public function check_plan_publish()
	   {
	     $plan_id=$this->input->post('plan_id');$edit_mode=$this->input->post('edit_mode');
		 $query1 = $this->db->get_where(' irti_learning_plan', array('id' => $plan_id,'status'=>1,'edit_mode'=>0));
		 if($edit_mode=='on')
		 {
		  
		  //$this->db->set('created_date', 'NOW()', FALSE);
		  $this->db->set('edit_mode','0');
		  $this->db->where('id', $plan_id);
		  $this->db->update('irti_learning_plan');
		  return 3;
		 }
		 $query = $this->db->get_where('irti_learning_plan_lecture_assessment', array('plan_id' => $plan_id));
		 if($query->num_rows()>0)
		 {
		   return 1;
		 }
		 else if($query1->num_rows()>0)
		 {
		   return 2;
		 }
		 else
		 {
		 return 0;
		 }
	   }
	   
	   public function get_lecture()
	   {
	      $id=$this->input->post('id');
		  $query = $this->db->get_where('irti_learning_plan_lecture_assessment', array('id' => $id));
		  $query=$query->row();
		  $data['title']=$query->title;
		  $data['descr']=$query->descr;
		  $topic_list=json_decode($query->topic_list);
		  //echo var_dump($topic_list);
		  if(!empty($topic_list))
		  {
		  $q=$this->db->query("select * from irti_category where id in (" . implode(",",$topic_list) . ")");
		  if($q->num_rows()>0)
		  {
			  $q=$q->result();
			  $i=0;
			  $s=array();
			  foreach($q as $cat)
			  {
				  $temp['cat_name']=$cat->category;
				  $temp['cat_id']=$cat->id;
				  $s[$i++] = $temp;
			  }
			  $data['cats']=$s;
		  }
		  }
		  return $this->output
				->set_status_header(200)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
	   }
	   
	    public function save_each_desc()
	   {
	     $plan_id=$this->input->post('plan_id');
		 $user_id=$this->session->userdata('id');
		 $type=$this->input->post('type');
		 $id=$this->input->post('id');
		 $title_each=$this->input->post('title_each');
		 $desc_each=$this->input->post('desc_each');
		 $cat_each_plan_hidden=$this->input->post('cat_each_plan_hidden');
		 $cat_each_plan='';
		 if($cat_each_plan_hidden)
		 {
		   $cat_each_plan=explode(',',$cat_each_plan_hidden);
		   $cat_each_plan=json_encode($cat_each_plan);
		 }
		 if(!$id)
		 {
		     if($type=='section')
			 {
					
					$q=$this->db->query("select MAX(node_order) as max_order from irti_learning_plan_section where plan_id='$plan_id'")->row();
		            $node_order=$q->max_order+1;
					$this->db->insert('irti_learning_plan_section',array('user_id'=>$user_id,'plan_id'=>$plan_id,'section'=>$title_each,'topic_list'=>$cat_each_plan,'descr'=>$desc_each,'node_order'=>$node_order));
		  	        return $this->db->insert_id();
					
			 
			}
			
			else if($type=='module')
			{
					
					  $section_id=$this->input->post('section_id');
					  $q=$this->db->query("select MAX(node_order) as max_order from irti_learning_plan_module where section_id='$section_id'")->row();
					  $node_order=$q->max_order+1;
					  if($section_id)
					  {
						  
							$this->db->insert('irti_learning_plan_module',array('user_id'=>$user_id,'plan_id'=>$plan_id,'section_id'=>$section_id,'module'=>$title_each,'topic_list'=>$cat_each_plan,'descr'=>$desc_each,'node_order'=>$node_order));
							return $this->db->insert_id();
						  
					  }
								
					
			 
			}
			else if($type=='lecture')
			{
				  $section_id=$this->input->post('section_id');
				  $module_id=$this->input->post('module_id');
				  $lect_type=$this->input->post('lect_type');
				  if($module_id)
				  {
				  $q=$this->db->query("select MAX(node_order) as max_order from irti_learning_plan_lecture_assessment where module_id='$module_id'")->row();
				  $node_order=$q->max_order+1;
				  
					  
						$this->db->insert('irti_learning_plan_lecture_assessment',array('user_id'=>$user_id,'plan_id'=>$plan_id,'section_id'=>$section_id,'module_id'=>$module_id,'title'=>$title_each,'topic_list'=>$cat_each_plan,'descr'=>$desc_each,'node_order'=>$node_order,'type'=>$lect_type));
						return $this->db->insert_id();
					  
					  
				  
				  }
			   
			}
			
			
			
			
			
		 }
		 else
		 {
			 if($type=='section')
			 {
					echo 6;
					$this->db->set('section',$title_each);
					$this->db->set('topic_list',$cat_each_plan);
					$this->db->set('descr',$desc_each);
					$this->db->where('id', $id);
					$this->db->update('irti_learning_plan_section');
			 
			}
			else if($type=='module')
			{
					$this->db->set('module',$title_each);
					$this->db->set('topic_list',$cat_each_plan);
					$this->db->set('descr',$desc_each);
					$this->db->where('id', $id);
					$this->db->update('irti_learning_plan_module');
			}
			else
			{
					$this->db->set('title',$title_each);
					$this->db->set('topic_list',$cat_each_plan);
					$this->db->set('descr',$desc_each);
					$this->db->where('id', $id);
					$this->db->update('irti_learning_plan_lecture_assessment');
			}
		}
		 //$query = $this->db->get_where('irti_learning_plan', array('id'=>$plan_id));
		 //return $query;
		 //return $id;
		 /*return $this->output
				->set_status_header(200)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($datas, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));*/
		 
		 
	   }

   
}
?>