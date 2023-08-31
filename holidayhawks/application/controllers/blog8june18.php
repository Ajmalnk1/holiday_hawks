<?php ob_start();?>
<?php
class Blog extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('blog_model');
		$this->load->helper('text');
		//$this->load->model('view_profile_model'); 
		$this->load->library('user_agent');
		
	}
	
	public function index()
	{
	 //redirect(base_url());
	// $data['myClass'] = $this;
	 $data['blogs']=$this->db->query("select * from tbl_blog order by node_order asc  limit 0,30")->result();
	 //$q=$this->blog_model->get_blog();
	 $this->load->view('blog',$data);
	}
	
	
	public function load_data_blog()
	{
		$limitStart=$_POST['page'];
		$d['page']=$limitStart;
		$limitCount = 10;
		$d['blogs']=$this->blog_model->get_blog();
		//$d['blogs']=$this->db->query("select* from  order by id desc limit $limitStart,$limitCount")->result();
		$this->load->view('load_data_blog',$d);
	}
	
	
	
	
	public function catch_that_image( $str ) 
   {  
		  $output = preg_match_all('/<img[^>]+src=[\'"]([^\'"]+)[\'"][^>]*>/i', $str, $matches); 
		  if($output)
		  { 
		  return $matches[1][0]; 
		  } 
	} 
	public function get_random_profile_picture()
    {
    		$files = glob('coverimages/*.*');
		    $file = array_rand($files);
		    return base_url($files[$file]);
		    //return FALSE;
    }
	public function blogadd($id=0)
	{
	 if($this->session->userdata('userid'))
	 {
	    $data['notify_number'] = $this->notify_number();
		$coverimg = FCPATH."images/cover_image_new/".$this->session->userdata('userid').".png";
		if(file_exists($coverimg))
		{
			$data['coverimg'] = base_url("images/cover_image_new/".$this->session->userdata('userid').".png");
		}else{
			$data['coverimg'] = $this->get_random_profile_picture();
		}
		if($this->session->userdata('usergroup')==2)
		{
				  $userid=$this->session->userdata('userid');
				  $data['rec_jobs']=$this->db->query("select a.*,b.id,b.username,b.real_name,b.user_country,b.profile_pic  from spa_job_search a left join spa_users b on a.spa_id=b.id where a.parent_site='".URL."'  order by a.id desc limit 0,10")->result();
				  $data['job_title'] = '';
		
				 $x = $this->db->query("Select a.job_type,DATE_FORMAT( FROM_UNIXTIME( a.from_date ) ,  '%Y' ) AS frm, DATE_FORMAT( FROM_UNIXTIME( a.to_date ) ,  '%Y' ) AS tod from  spa_users_experience a  where a.user_id='{$this->session->userdata('userid')}' ORDER BY a.checkbox DESC,frm DESC , tod DESC  LIMIT 1"); 
				 if($x->num_rows()==1)
				 {
					$x  = $x->row();
					$x = $x->job_type;
					$data['job_title'] =  ucwords(strtolower($x));
				 }
		}
		if($id!=0)
		{
			$data['blog_id']=$id;
			$query=$this->db->query("select * from spa_blog where id='$id'")->row();
			$data['title']=$query->title;
			$data['subtitle']=$query->subtitle;
			$data['content']=$query->content;
			
		}
		else
		{
			$data['blog_id']='';
		}
	    $this->load->view('blog_form',$data);
	 }
	 else
	 {
	    redirect('home');
	 }
	 
	}
	
	public function blogcreate($id=0)
	{
	
	  
		if($this->session->userdata('userid')):
				$data['notify_number'] = $this->notify_number();
				if($id!=0)
				{
					$data['blog_id']=$id;
					$query=$this->db->query("select * from spa_blog where id='$id'")->row();
					$data['title']=$query->title;
					$data['subtitle']=$query->subtitle;
					$data['content']=$query->content;
				    
				}
				else
				{
					$data['blog_id']='';
				}
				$this->load->view('blogcreate', $data);
			
			else:
				$this->load->view('blogcreate');
			endif;
		
	}
	/*public function save_title()
	{
		 $data=array(
							'user_id' =>$this->session->userdata('userid'),
							'title' => ucwords($this->input->post('title')),
							'subtitle' => ucwords($this->input->post('subtitle')),
					);
		$this->db->set('created', 'UTC_TIMESTAMP()', FALSE);
		$this->db->insert('spa_blog', $data);
		
	}*/
	
	
	public function blog_detail($id)
	{
	      $query=$this->db->query("select * from spa_blog_comments where blog_id='$id'");
		   if($query->num_rows()>0)
		   {
		     $data['all_comment']=$query->num_rows();
		   }
		   else
		   {
		     $data['all_comment']='No';
           }
		   $query=$this->db->query("select sum(likes) as sum_like from spa_blog_likes where blog_id='$id'");
		    $result=$query->row();
			$no_like=$result->sum_like;
			if($no_like!=NULL)
			{
			$result=$query->row();
			$no_like=$result->sum_like;
			}
			else
			{
			$no_like='No';
			}
		   
		   
		   $query=$this->db->query("select sum(visits) as sum_visits from spa_blog_visits where blog_id='$id'");
		   if($query->num_rows()>0)
		   {
		     $result=$query->row();
		     $data['no_visits']=$result->sum_visits;
		   }
		   else
		   {
		     $data['no_visits']='No';
		   }
	}
	function check_your_connection($id){
    //$sql = "select connection_id from spa_connections where connection_from = {$_SESSION['userid']} and connection_to={$id}";
		if(!$this->session->userdata('userid')) return 0;
    $userid = $this->session->userdata('userid');
    $sql = "select connection_id from spa_connections where (connection_from = {$userid} and connection_to={$id} and del_status=0 and msg = '') or (connection_to={$userid} and connection_from = {$id} and del_status=0 and msg = '')";
    $result = mysql_query($sql);
    if($result && mysql_num_rows($result)==2) return 1;
    elseif($result && mysql_num_rows($result)==1) return -1;
   elseif($result && mysql_num_rows($result)==0) return 0;
}
	
	public function detail1($id)
	{
	
	
	if($this->session->userdata('userid')):
			$data['notify_number'] = $this->notify_number();
			endif;
	
	$query = $this->db->query("select a.*,b.real_name,b.username,b.user_group,b.profile_pic from spa_blog_comments a left join spa_users b on a.user_id = b.id  where a.blog_id = {$id}");
		   if($query->num_rows() > 0)
		   {
			 $data['comments_list']=$query->result();
		   }
		   else
		   {
			 $data['comments_list']='';
		   }
	
	   
		$query = $this->db->query("select a.*,b.real_name,b.username,b.user_group,b.profile_pic from spa_blog a left join spa_users b on a.user_id = b.id  where a.id = {$id}");
		if($query->num_rows() > 0)
		{
			$row = $query->row(); 
			$data['blog_first_img']='';
			$data['title'] = $row->title;
			if($row->thumb_img){
			$blogimg=explode('blogs/',$row->thumb_img);
			$data['blog_first_img'] = $blogimg['1'];
			}
			$data['subtitle'] = $row->subtitle;
			$data['content'] = preg_replace('/<img[\S\s]*?>/i','',$row->content,1); 
			$data['thumb_img'] = $row->thumb_img;
			if($row->user_group==2){
			  $data['username'] = $row->username;
			}
			else
			{
			  $data['username'] = $row->real_name;
			}
			$data['userpic'] = $row->profile_pic;
			$data['created'] = $row->created;
			$data['blog_id']=$row->id;
            $data['blog_userid']=$row->user_id;
			$data['my_group']=$row->user_group;
			$x = $this->db->query("Select a.job_type,DATE_FORMAT( FROM_UNIXTIME( a.from_date ) ,  '%Y' ) AS frm, DATE_FORMAT( FROM_UNIXTIME( a.to_date ) ,  '%Y' ) AS tod from  spa_users_experience a  where a.user_id=".$row->user_id." ORDER BY a.checkbox DESC,frm DESC , tod DESC  LIMIT 1");  
                   if($x->num_rows()==1)
                   {
                     $x  = $x->row();
                     $x = $x->job_type;
                     $data['jobtitle'] =  ucwords(strtolower($x));
                   }
                   else
                   {
                     $x = $this->db->query("Select skill_name from  spa_prof_skills a  where a.userid=".$row->user_id." LIMIT 1")->row(); 
                     if($x) 
                      $data['jobtitle'] = ucwords(strtolower($x->skill_name));
                     else
                      $data['jobtitle'] = 'Job title';
                   }
            $data['is_connected'] = $this->check_your_connection($row->user_id);
			if( $this->session->userdata('userid')){
				$to_id = $this->session->userdata('userid');
				$data['is_follow'] = $this->db->query("select connection_id from spa_connections where msg='following' and connection_to = {$row->user_id} and connection_from = {$to_id}")->num_rows();
			}
            if($this->session->userdata('userid'))
			{
			  $query=$this->db->query("select * from spa_users where id='{$this->session->userdata('userid')}'");
			  
			  if($query->num_rows()>0)
			  {
			    $row = $query->row();
				$data['mypic']=$row->profile_pic;
			  }
			}
           $query=$this->db->query("select * from spa_blog_comments where blog_id='$id'");
		   if($query->num_rows()>0)
		   {
		     $data['all_comment']=$query->result();
		   }
		   else
		   {
		     $data['all_comment']='';
           }
		   $query=$this->db->query("select sum(likes) as sum_like from spa_blog_likes where blog_id='$id'");
		   if($query->num_rows()>0)
		   {
		     $result=$query->row();
		     $data['no_like']=$result->sum_like;
		   }
		   else
		   {
		     $data['no_like']='';
		   }
		   /*$query=$this->db->query("select sum(visits) as sum_visits from spa_blog_visits where blog_id='$id'");
		   if($query->num_rows()>0)
		   {
		     $result=$query->row();
		     $data['no_visits']=$result->sum_visits;
		   }
		   else
		   {
		     $data['no_visits']='';
		   }*/
            if($this->session->userdata('userid'))
						 {
						 $query=$this->db->query("select * from spa_blog_likes where blog_id='$id' and user_id='{$this->session->userdata('userid')}'");
						 if($query->num_rows()>0)
							 {
							 $result=$query->row();
							 $likedbyuser=$result->likes;
							 $data['likedbyuser']=$likedbyuser;
							 }
							 else
							 {
							 $data['likedbyuser']=0;
							 }
						 }
			else
			{
			$data['likedbyuser']='';
			}
			
            $querys=$this->db->query("select * from spa_blog_visits where blog_id='$id'"); 
			 if($querys->num_rows()>0)
			 {
		          
				    
						 if($this->session->userdata('userid'))
						 {
						     $query=$this->db->query("select * from spa_blog_visits where blog_id='$id' and user_id='{$this->session->userdata('userid')}'"); 
							  if($query->num_rows()>0)
							  {
							   $result=$query->row();
							   $visits=$result->visits+1;
							   $id_visit=$result->id;
							   $data1=array(
												'user_id' =>$this->session->userdata('userid'),
												'blog_id' => $id,
												
												'visits' => $visits,
												//'draft' => $this->input->post('draft'),
												
												);
												$this->db->set('created', 'UTC_TIMESTAMP()', FALSE);
												$this->db->where('id', $id_visit);
												$this->db->update('spa_blog_visits', $data1);
												
												
												
							}
							else
							{
							  $visits=1;
							  $data1=array(
											'user_id' =>$this->session->userdata('userid'),
											'blog_id' => $id,
											'visits' => $visits,
											//'draft' => $this->input->post('draft'),
											
											
											);
									 $this->db->set('created', 'UTC_TIMESTAMP()', FALSE);
									 $this->db->insert('spa_blog_visits', $data1);
							}					
					  }						
				 
					 else
					 {
						$visits=1;
						$data1=array(
										'user_id' =>$this->session->userdata('userid'),
										'blog_id' => $id,
										'visits' => $visits,
										//'draft' => $this->input->post('draft'),
										
										
										);
								 $this->db->set('created', 'UTC_TIMESTAMP()', FALSE);
								 $this->db->insert('spa_blog_visits', $data1);
					 }
					 
				 
				 }
				 else
				 {
				    $visits=1;
					$data1=array(
									'user_id' =>$this->session->userdata('userid'),
									'blog_id' => $id,
									'visits' => $visits,
									//'draft' => $this->input->post('draft'),
									
									
									);
							 $this->db->set('created', 'UTC_TIMESTAMP()', FALSE);
							 $this->db->insert('spa_blog_visits', $data1);
				 }
				 
			$results=$this->db->query("select sum(visits) as sum_visits from spa_blog_visits where blog_id='$id'")->row();

            $data['total_visit']=$results->sum_visits;
            $data['footer_job']=$this->db->query("select * from spa_footer_links where category='job'")->result();
           $data['footer_talent']=$this->db->query("select * from spa_footer_links where category='talent'")->result();


			$this->load->view('blog_detail_view',$data);
		}
	}



    function time2str($ts)
	{
		if(!ctype_digit($ts))
			$ts = strtotime($ts);
	
		$diff = time() - $ts;
		if($diff == 0)
			return 'now';
		elseif($diff > 0)
		{
			$day_diff = floor($diff / 86400);
			if($day_diff == 0)
			{
				if($diff < 60) return 'just now';
				if($diff < 120) return '1 minute ago';
				if($diff < 3600) return floor($diff / 60) . ' minutes ago';
				if($diff < 7200) return '1 hour ago';
				if($diff < 86400) return floor($diff / 3600) . ' hours ago';
			}
			if($day_diff == 1) return 'Yesterday';
			if($day_diff < 7) return $day_diff . ' days ago';
			if($day_diff < 31) return ceil($day_diff / 7) . ' weeks ago';
			if($day_diff < 60) return 'last month';
			return date('F Y', $ts);
		}
		else
		{
			$diff = abs($diff);
			$day_diff = floor($diff / 86400);
			if($day_diff == 0)
			{
				if($diff < 120) return 'in a minute';
				if($diff < 3600) return 'in ' . floor($diff / 60) . ' minutes';
				if($diff < 7200) return 'in an hour';
				if($diff < 86400) return 'in ' . floor($diff / 3600) . ' hours';
			}
			if($day_diff == 1) return 'Tomorrow';
			if($day_diff < 4) return date('l', $ts);
			if($day_diff < 7 + (7 - date('w'))) return 'next week';
			if(ceil($day_diff / 7) < 4) return 'in ' . ceil($day_diff / 7) . ' weeks';
			if(date('n', $ts) == date('n') + 1) return 'next month';
			return date('F Y', $ts);
		}
	}
	public function detail($id)
	{
	
	
	
	   
		$query = $this->db->query("select * from tbl_blog  where id = {$id}");
		if($query->num_rows() > 0)
		{
			$row = $query->row(); 
			
			$data['title'] = $row->title;
			$data['cover_img'] = $row->cover_img;
			$data['subtitle'] = $row->subtitle;
			$data['content'] = preg_replace('/[\S\s]*?>/i','',$row->descr,1); 
			
			

			$this->load->view('blog_detail_view',$data);
		}
	}
	
	
	public function details($id)
	{
	
	
	
	
	$query = $this->db->query("select a.*,b.real_name,b.username,b.user_group,b.profile_pic from spa_blog_comments a left join spa_users b on a.user_id = b.id  where a.blog_id = {$id}");
		   if($query->num_rows() > 0)
		   {
			 $data['comments_list']=$query->result();
		   }
		   else
		   {
			 $data['comments_list']='';
		   }
	
	   
		$query = $this->db->query("select a.*,b.real_name,b.username,b.user_group,b.profile_pic from spa_blog a left join spa_users b on a.user_id = b.id  where a.id = {$id}");
		if($query->num_rows() > 0)
		{
			$row = $query->row(); 
			$data['blog_first_img']='';
			$data['title'] = $row->title;
			if($row->thumb_img){
			$blogimg=explode('blogs/',$row->thumb_img);
			$data['blog_first_img'] = $blogimg['1'];
			}
			$data['subtitle'] = $row->subtitle;
			$data['content'] = $row->content;
			if($row->user_group==2){
			  $data['username'] = $row->username;
			}
			else
			{
			  $data['username'] = $row->real_name;
			}
			$data['userpic'] = $row->profile_pic;
			$data['created'] = $row->created;
			$data['blog_id']=$row->id;
            $data['blog_userid']=$row->user_id;
			$data['my_group']=$row->user_group;
			$x = $this->db->query("Select a.job_type,DATE_FORMAT( FROM_UNIXTIME( a.from_date ) ,  '%Y' ) AS frm, DATE_FORMAT( FROM_UNIXTIME( a.to_date ) ,  '%Y' ) AS tod from  spa_users_experience a  where a.user_id=".$row->user_id." ORDER BY a.checkbox DESC,frm DESC , tod DESC  LIMIT 1");  
                   if($x->num_rows()==1)
                   {
                     $x  = $x->row();
                     $x = $x->job_type;
                     $data['jobtitle'] =  ucwords(strtolower($x));
                   }
                   else
                   {
                     $x = $this->db->query("Select skill_name from  spa_prof_skills a  where a.userid=".$row->user_id." LIMIT 1")->row(); 
                     if($x) 
                      $data['jobtitle'] = ucwords(strtolower($x->skill_name));
                     else
                      $data['jobtitle'] = 'Job title';
                   }
            $data['is_connected'] = $this->check_your_connection($row->user_id);
			if( $this->session->userdata('userid')){
				$to_id = $this->session->userdata('userid');
				$data['is_follow'] = $this->db->query("select connection_id from spa_connections where msg='following' and connection_to = {$row->user_id} and connection_from = {$to_id}")->num_rows();
			}
            if($this->session->userdata('userid'))
			{
			  $query=$this->db->query("select * from spa_users where id='{$this->session->userdata('userid')}'");
			  
			  if($query->num_rows()>0)
			  {
			    $row = $query->row();
				$data['mypic']=$row->profile_pic;
			  }
			}
           $query=$this->db->query("select * from spa_blog_comments where blog_id='$id'");
		   if($query->num_rows()>0)
		   {
		     $data['all_comment']=$query->result();
		   }
		   else
		   {
		     $data['all_comment']='';
           }
		   $query=$this->db->query("select sum(likes) as sum_like from spa_blog_likes where blog_id='$id'");
		   if($query->num_rows()>0)
		   {
		     $result=$query->row();
		     $data['no_like']=$result->sum_like;
		   }
		   else
		   {
		     $data['no_like']='';
		   }
		   /*$query=$this->db->query("select sum(visits) as sum_visits from spa_blog_visits where blog_id='$id'");
		   if($query->num_rows()>0)
		   {
		     $result=$query->row();
		     $data['no_visits']=$result->sum_visits;
		   }
		   else
		   {
		     $data['no_visits']='';
		   }*/
            if($this->session->userdata('userid'))
						 {
						 $query=$this->db->query("select * from spa_blog_likes where blog_id='$id' and user_id='{$this->session->userdata('userid')}'");
						 if($query->num_rows()>0)
							 {
							 $result=$query->row();
							 $likedbyuser=$result->likes;
							 $data['likedbyuser']=$likedbyuser;
							 }
							 else
							 {
							 $data['likedbyuser']=0;
							 }
						 }
			else
			{
			$data['likedbyuser']='';
			}
			
            $querys=$this->db->query("select * from spa_blog_visits where blog_id='$id'"); 
			 if($querys->num_rows()>0)
			 {
		          
				    
						 if($this->session->userdata('userid'))
						 {
						     $query=$this->db->query("select * from spa_blog_visits where blog_id='$id' and user_id='{$this->session->userdata('userid')}'"); 
							  if($query->num_rows()>0)
							  {
							   $result=$query->row();
							   $visits=$result->visits+1;
							   $id_visit=$result->id;
							   $data1=array(
												'user_id' =>$this->session->userdata('userid'),
												'blog_id' => $id,
												
												'visits' => $visits,
												//'draft' => $this->input->post('draft'),
												
												);
												$this->db->set('created', 'UTC_TIMESTAMP()', FALSE);
												$this->db->where('id', $id_visit);
												$this->db->update('spa_blog_visits', $data1);
												
												
												
							}
							else
							{
							  $visits=1;
							  $data1=array(
											'user_id' =>$this->session->userdata('userid'),
											'blog_id' => $id,
											'visits' => $visits,
											//'draft' => $this->input->post('draft'),
											
											
											);
									 $this->db->set('created', 'UTC_TIMESTAMP()', FALSE);
									 $this->db->insert('spa_blog_visits', $data1);
							}					
					  }						
				 
					 else
					 {
						$visits=1;
						$data1=array(
										'user_id' =>$this->session->userdata('userid'),
										'blog_id' => $id,
										'visits' => $visits,
										//'draft' => $this->input->post('draft'),
										
										
										);
								 $this->db->set('created', 'UTC_TIMESTAMP()', FALSE);
								 $this->db->insert('spa_blog_visits', $data1);
					 }
					 
				 
				 }
				 else
				 {
				    $visits=1;
					$data1=array(
									'user_id' =>$this->session->userdata('userid'),
									'blog_id' => $id,
									'visits' => $visits,
									//'draft' => $this->input->post('draft'),
									
									
									);
							 $this->db->set('created', 'UTC_TIMESTAMP()', FALSE);
							 $this->db->insert('spa_blog_visits', $data1);
				 }
				 
			$results=$this->db->query("select sum(visits) as sum_visits from spa_blog_visits where blog_id='$id'")->row();

            $data['total_visit']=$results->sum_visits;

            if($this->session->userdata('userid')):
			$data['notify_number'] = $this->notify_number();
			endif;
			$this->load->view('blog_detail_view_test',$data);
		}
	}
	
	
	
	public function like_blog()
	{
	
	 $blog_id=$_POST['blog_id'];
	 $query=$this->db->query("select * from spa_blog_likes where blog_id='$blog_id' and user_id='{$this->session->userdata('userid')}'"); 
			 if($query->num_rows()>0)
			 {
		          
				     $result=$query->row();
				 
					  $likes=$result->likes+1;
					  $id=$result->id;
					  $data=array(
										'user_id' =>$this->session->userdata('userid'),
										'blog_id' => $blog_id,
										
										'likes' => $likes,
										//'draft' => $this->input->post('draft'),
										
										);
										$this->db->set('created', 'UTC_TIMESTAMP()', FALSE);
										$this->db->where('id', $id);
										$this->db->update('spa_blog_likes', $data);
				 
				 }
				 else
				 {
				    $likes=1;
					$data=array(
									'user_id' =>$this->session->userdata('userid'),
									'blog_id' => $blog_id,
									'likes' => $likes,
									//'draft' => $this->input->post('draft'),
									
									
									);
							 $this->db->set('created', 'UTC_TIMESTAMP()', FALSE);
							 $this->db->insert('spa_blog_likes', $data);
				 }
				 
				 
				 
			
		$result=$this->db->query("select sum(likes) as sum_like from spa_blog_likes where blog_id='$blog_id'")->row();
	    echo $result->sum_like;
	
	
	}
	
	public function unlike_blog()
	{
	
	 $blog_id=$_POST['blog_id'];
	 $query=$this->db->query("select * from spa_blog_likes where blog_id='$blog_id' and user_id='{$this->session->userdata('userid')}'"); 
			 if($query->num_rows()>0)
			 {
		          
				     $result=$query->row();
				 
					  $likes=$result->likes-1;
					  $id=$result->id;
					  $data=array(
										'user_id' =>$this->session->userdata('userid'),
										'blog_id' => $blog_id,
										
										'likes' => $likes,
										//'draft' => $this->input->post('draft'),
										
										);
										$this->db->set('created', 'UTC_TIMESTAMP()', FALSE);
										$this->db->where('id', $id);
										$this->db->update('spa_blog_likes', $data);
				 
				 }
				 
				 
				 
				 
			
		$result=$this->db->query("select sum(likes) as sum_like from spa_blog_likes where blog_id='$blog_id'")->row();
	    echo $result->sum_like;
	
	
	}
	
	
	
	public function visit_blog()
	{
	
	 $blog_id=$_POST['blog_id'];
	 $query=$this->db->query("select * from spa_blog_visits where blog_id='$blog_id'"); 
			 if($query->num_rows()>0)
			 {
		          
				    
						 if($this->session->userdata('userid'))
						 {
						  $query=$this->db->query("select * from spa_blog_visits where blog_id='$blog_id' and user_id='{$this->session->userdata('userid')}'"); 
							  if($query->num_rows()>0)
							  {
							   $result=$query->row();
							   $visits=$result->visits+1;
							   $id=$result->id;
							   $data=array(
												'user_id' =>$this->session->userdata('userid'),
												'blog_id' => $blog_id,
												
												'visits' => $visits,
												//'draft' => $this->input->post('draft'),
												
												);
												$this->db->set('created', 'UTC_TIMESTAMP()', FALSE);
												$this->db->where('id', $id);
												$this->db->update('spa_blog_visits', $data);
												
												
												
							}
							else
							{
							  $visits=1;
							  $data=array(
											'user_id' =>$this->session->userdata('userid'),
											'blog_id' => $blog_id,
											'visits' => $visits,
											//'draft' => $this->input->post('draft'),
											
											
											);
									 $this->db->set('created', 'UTC_TIMESTAMP()', FALSE);
									 $this->db->insert('spa_blog_visits', $data);
							}					
					  }						
				 
					 else
					 {
						$visits=1;
						$data=array(
										'user_id' =>$this->session->userdata('userid'),
										'blog_id' => $blog_id,
										'visits' => $visits,
										//'draft' => $this->input->post('draft'),
										
										
										);
								 $this->db->set('created', 'UTC_TIMESTAMP()', FALSE);
								 $this->db->insert('spa_blog_visits', $data);
					 }
					 
				 
				 }
				 else
				 {
				    $visits=1;
					$data=array(
									'user_id' =>$this->session->userdata('userid'),
									'blog_id' => $blog_id,
									'visits' => $visits,
									//'draft' => $this->input->post('draft'),
									
									
									);
							 $this->db->set('created', 'UTC_TIMESTAMP()', FALSE);
							 $this->db->insert('spa_blog_visits', $data);
				 }
				 
				 
				 
				 
				 
				 
			
		$result=$this->db->query("select sum(visits) as sum_visits from spa_blog_visits where blog_id='$blog_id'")->row();
	    echo $result->sum_visits;
	
	
	}
	
	
	
	public function save_comments()
	{
	
	
	   $id_comment=$_POST['id_comment'];
	  if(isset($_POST['id_comment']))
	    {
		 $id_comment=$_POST['id_comment'];
		}
	 else
		{
		$id_comment=0;
		}
		
		
		if($id_comment!=0)
			  {
					 $data=array(
						'comments' => nl2br($this->input->post('text')),
						
						
						);
						$this->db->set('created', 'UTC_TIMESTAMP()', FALSE);
						$this->db->where('id', $id_comment);
						$this->db->update('spa_blog_comments', $data);
						$insert_id= $id_comment;
						$edit_flag=1;
			  }
			  
			  else
			  {
		
		
				   $data=array(
										'user_id' =>$this->session->userdata('userid'),
										'blog_id' => $this->input->post('id'),
										'comments' => nl2br($this->input->post('text')),
										'status'=>1,
								);
					$this->db->set('created', 'UTC_TIMESTAMP()', FALSE);
					$this->db->insert('spa_blog_comments', $data);
					$insert_id= $this->db->insert_id();
					$edit_flag=0;
		
		     }
		
		
		 $query=$this->db->query("select * from spa_users where id='{$this->session->userdata('userid')}'");
			  
			  if($query->num_rows()>0)
			  {
			    $row = $query->row();
				
				 $data['mypic']=base_url($row->profile_pic);
			  }
			 
		$query=$this->db->query("select * from spa_blog_comments where id='$insert_id'")->row();
		$data['cmnt_date']=	$query->created;  
		$data['cmnt_comments']=	$query->comments;
		$data['cmnt_id']=	$insert_id;
		$data['edit_flag']=	$edit_flag;
		
		
		
		return $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
		
	
	}
	public function delete_comment()
	{
	 if($this->session->userdata('userid')){
	   $cmnt_id=$_POST['id'];
	   $query=$this->db->query("delete from spa_blog_comments where id='$cmnt_id'")->row();
	 }
	}
	
	public function get_comment()
	{
	       $id=$_POST['id'];
	       $query=$this->db->query("select * from spa_blog_comments where id='$id'")->row();
		  
		   $data=array(
			   
			   'comments'=>$query->comments,
			   
		   
		   );
	        return $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
	}
	
	public function get_blog_all()
	{
	
	       $query=$this->db->query("select * from spa_blog")->result();
		  
		   $data=array(
			   'title'=>$query->title,
			   'subtitle'=>$query->subtitle,
			   'content'=>$query->content,
			   'draft'=>$query->draft,
		   
		   );
	        //return $this->output
            //->set_status_header(200)
            //->set_content_type('application/json', 'utf-8')
            //->set_output(json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
			
			$this->load->view('blogview');
	}
	
	public function get_blog()
	{
	       $blog_id=$_POST['blog_id'];
	       $query=$this->db->query("select * from spa_blog where id='$blog_id'")->row();
		  
		   $data=array(
			   'title'=>$query->title,
			   'subtitle'=>$query->subtitle,
			   'content'=>$query->content,
			   'draft'=>$query->draft,
		   
		   );
	        return $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
	}
	
	
	function Thumbnail($url, $filename, $width = 636, $height = true) {

	 // download and create gd image
	 $image = ImageCreateFromString(file_get_contents($url));
	
	 // calculate resized ratio
	 // Note: if $height is set to TRUE then we automatically calculate the height based on the ratio
	 $height = $height === true ? (ImageSY($image) * $width / ImageSX($image)) : $height;
	
	 // create image 
	 $output = ImageCreateTrueColor($width, $height);
	 ImageCopyResampled($output, $image, 0, 0, 0, 0, $width, $height, ImageSX($image), ImageSY($image));
	
	 // save image
	 ImageJPEG($output, $filename, 95); 
	
	 // return resized image
	 return $output; // if you need to use it
	}
	
	function Thumbnail_detail($url, $filename, $width = 684, $height = true) {

	 // download and create gd image
	 $image = ImageCreateFromString(file_get_contents($url));
	
	 // calculate resized ratio
	 // Note: if $height is set to TRUE then we automatically calculate the height based on the ratio
	 $height = $height === true ? (ImageSY($image) * $width / ImageSX($image)) : $height;
	
	 // create image 
	 $output = ImageCreateTrueColor($width, $height);
	 ImageCopyResampled($output, $image, 0, 0, 0, 0, $width, $height, ImageSX($image), ImageSY($image));
	
	 // save image
	 ImageJPEG($output, $filename, 95); 
	
	 // return resized image
	 return $output; // if you need to use it
	}
	public function test123()
	{
	$id=rand();
	$fileimg='http://cdn.cutestpaw.com/wp-content/uploads/2013/01/l-Cute-Kitten.jpg';
    $img='blogs/'.$id.'.png';
    $this->Thumbnail($fileimg, $img);
	}
	
	public function resize_crop_image($max_width, $max_height, $source_file, $dst_dir, $quality = 80)
	{
		$imgsize = getimagesize($source_file);
		$width = $imgsize[0];
		$height = $imgsize[1];
		$mime = $imgsize['mime'];
	 
		switch($mime){
			case 'image/gif':
				$image_create = "imagecreatefromgif";
				$image = "imagegif";
				break;
	 
			case 'image/png':
				$image_create = "imagecreatefrompng";
				$image = "imagepng";
				$quality = 7;
				break;
	 
			case 'image/jpeg':
				$image_create = "imagecreatefromjpeg";
				$image = "imagejpeg";
				$quality = 80;
				break;
	 
			default:
				return false;
				break;
		}
		 
		$dst_img = imagecreatetruecolor($max_width, $max_height);
		$src_img = $image_create($source_file);
		 
		$width_new = $height * $max_width / $max_height;
		$height_new = $width * $max_height / $max_width;
		//if the new width is greater than the actual width of the image, then the height is too large and the rest cut off, or vice versa
		if($width_new > $width){
			//cut point by height
			$h_point = (($height - $height_new) / 2);
			//copy image
			imagecopyresampled($dst_img, $src_img, 0, 0, 0, $h_point, $max_width, $max_height, $width, $height_new);
		}else{
			//cut point by width
			$w_point = (($width - $width_new) / 2);
			imagecopyresampled($dst_img, $src_img, 0, 0, $w_point, 0, $max_width, $max_height, $width_new, $height);
		}
		 
		$image($dst_img, $dst_dir, $quality);
	 
		if($dst_img)imagedestroy($dst_img);
		if($src_img)imagedestroy($src_img);
     }
		
	
	
	public function save_thumb()
	{
	
	
	    $fileimg=$_POST['imgs'];
		$id=trim($_POST['id']);
		unlink(base_url("blogs/".$id.'_thumb.png'));
		if($fileimg&&$fileimg!='undefined')
		{
		
		//$id=rand();
	    //$fileimg='http://cdn.cutestpaw.com/wp-content/uploads/2013/01/l-Cute-Kitten.jpg';
		$img='blogs/'.$id.'_thumb.png';
		$img_detail='blogs_detail/'.$id.'_thumb.png';
        //$this->Thumbnail($fileimg, $img);
		$big_path=$fileimg;
	    $thumb_path='blogs/'.$id.'_thumb.png';
		$this->resize_crop_image(684, 366, $big_path, $thumb_path);
		$this->Thumbnail_detail($fileimg, $img_detail);
		$query=$this->db->query("update spa_blog set thumb_img='$img' where id='$id'");
		echo 'suc';
		}
		else
		{
		echo 'noimg';
		$query=$this->db->query("update spa_blog set thumb_img='' where id='$id'");
		}
		
		
	}
	
	
	
 	public function save_blog()
	{
		if(isset($_POST['blog_id'])){
		 $id=$_POST['blog_id'];
		}
		else
		{
		$id=0;
		}
	   
			  if($id!=0)
			  {
					 $data=array(
						'user_id' =>$this->session->userdata('userid'),
						'title' => ucwords($this->input->post('title')),
						'subtitle' => ucwords($this->input->post('subtitle')),
						'content' => $this->input->post('content'),
						'parent_site' => URL
						//'draft' => $this->input->post('draft'),
						
						);
						$this->db->set('edited', 'UTC_TIMESTAMP()', FALSE);
						$this->db->where('id', $id);
						$this->db->update('spa_blog', $data);
						echo $insert_id=$id;
			  }
			  
			  else
			  {
			  
				  $data=array(
						'user_id' =>$this->session->userdata('userid'),
						'title' => ucwords($this->input->post('title')),
						'subtitle' => ucwords($this->input->post('subtitle')),
						'content' => $this->input->post('content'),
						'parent_site' => URL
						//'draft' => $this->input->post('draft'),
						
						
						);
				 $this->db->set('created', 'UTC_TIMESTAMP()', FALSE);
				 $this->db->insert('spa_blog', $data);
				 echo $insert_id=$this->db->insert_id();
			}
	
	}
	
	public function delete_blog()
	{
	  //$pdt_id=$this->input->post('pdt_id');
	  if($this->session->userdata('userid'))
	  {
	    $blog_id=$_POST['blog_id'];
		
	    $query=$this->db->query("delete from spa_blog where id='$blog_id'");
		
	  }
	}	
	



	
public function create_thumb($path,$filename,$cw=234, $ch=164)
	{
		$config['image_library'] = 'gd2';
		$config['source_image']	= $path.$filename;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['quality'] = '100%';
		
		$config['new_image'] = $path.$filename;
		list($width, $height) = getimagesize(base_url($path.$filename));
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		$thumnail = basename($filename,".".$ext).'_thumb.'.$ext;
		if($width==$height)
		{
			$config['width']	= $cw;
			$config['height']	= $cw;
			$this->load->library('image_lib', $config); 
			$resize = $this->image_lib->resize();
			$this->image_lib->clear();
			
			
			$config['width']	= $cw;
			$config['height']	= $ch;
			$config['image_library'] = 'gd2';
			$config['x_axis'] = 0;
        	$config['y_axis'] = 0;
        	$config['source_image']	= $path.$thumnail;
        	$config['create_thumb'] = TRUE;
        	// if($cw==704)
        	// 	$config['maintain_ratio'] = TRUE;
        	// else
			$config['maintain_ratio'] = FALSE;
			//$config['master_dim'] = 'width';
			$this->image_lib->initialize($config); 
			//$this->image_lib->initialize($config);
			$crop = $this->image_lib->crop();

		}
		elseif($width > $height)
		{
			$config['height']	= $ch;

			$w = round(($ch*$width)/$height);
			$config['width'] = $w;
			$this->load->library('image_lib', $config); 
			$resize = $this->image_lib->resize();
			$this->image_lib->clear();

			list($width_after_resize, $height_after_resize) = getimagesize(base_url($path.$thumnail));
			if($width_after_resize < $cw && $cw == 740) return $thumnail;
			
			$config['width']	= $cw;
			$config['height']	= $ch;
			$config['image_library'] = 'gd2';
			//$x_axis = $w-$cw;
			$x_axis = 0;
			// if($x_axis<0)
			// 	$x_axis = 0;

			// if(($w/2)-155 > 0)
			// 	$x_axis = $w/2;
			// elseif(($w/3)-155 > 0)
			// 	$x_axis = $w/3;
			// elseif(($w/4)-155 > 0)
			// 	$x_axis = $w/4;
			// elseif(($w/5)-155 > 0)
			// 	$x_axis = $w/5;
			$config['x_axis'] = $x_axis;
        	$config['y_axis'] = 0;
        	$config['source_image']	= $path.$thumnail;
        	$config['create_thumb'] = TRUE;
			// if($cw==704)
   //      		$config['maintain_ratio'] = TRUE;
   //      	else
			$config['maintain_ratio'] = FALSE;
			//$config['master_dim'] = 'width';
			$this->image_lib->initialize($config); 
			//$this->image_lib->initialize($config);
			$crop = $this->image_lib->crop();

		}
		elseif($width < $height)
		{
			$config['width']	= $cw;

			$h = round(($cw*$height)/$width);
			$config['height'] = $h;
			$this->load->library('image_lib', $config); 
			$resize = $this->image_lib->resize();
			$this->image_lib->clear();
			list($width_after_resize, $height_after_resize) = getimagesize(base_url($path.$thumnail));
			if($height_after_resize < $ch && $ch == 230) return $thumnail;
			
			$config['width']	= $cw;
			$config['height']	= $ch;
			$config['image_library'] = 'gd2';
			//$y_axis = $h-164;
			//if($y_axis<0)
				$y_axis = 0;

			// if(($w/2)-155 > 0)
			// 	$x_axis = $w/2;
			// elseif(($w/3)-155 > 0)
			// 	$x_axis = $w/3;
			// elseif(($w/4)-155 > 0)
			// 	$x_axis = $w/4;
			// elseif(($w/5)-155 > 0)
			// 	$x_axis = $w/5;
			$config['x_axis'] = 0;
        	$config['y_axis'] = 0;
        	$config['source_image']	= $path.$thumnail;
        	$config['create_thumb'] = TRUE;
			// if($cw==704)
   //      		$config['maintain_ratio'] = TRUE;
   //      	else
			$config['maintain_ratio'] = FALSE;
			//$config['master_dim'] = 'width';
			$this->image_lib->initialize($config); 
			//$this->image_lib->initialize($config);
			$crop = $this->image_lib->crop();
		}
		return $thumnail;

	}
	
public function notify_number()
	{
		$userid = $this->session->userdata('userid');
		return $this->db->query("select id from  spa_notify where toid={$userid} and status=0")->num_rows();
	}	
}
?>