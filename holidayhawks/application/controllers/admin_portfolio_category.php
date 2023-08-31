<?php

	class Admin_portfolio_category extends MY_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('form');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->model('admin_portfolio_category_model');
		}
		
		public function index()
		{
		    if($this->session->userdata('id'))
			{
			  $this->load->view('admin/pcategory');
			}                                                                                                                                                                                                                         
			else
			{
			  redirect('admin');
			}
		}
		
		public function load_data_pcategory()
		{
		    if($_POST['page'])
			{
			  $page = $_POST['page'];}
			else 
			{
			  $page=1;
			}
			$cur_page = $page;
			$page -= 1;
			$per_page = 7;
			$start = $page * $per_page;
			$q=$this->admin_portfolio_category_model->load_data_pcat($start,$per_page);
			$total_count=$this->admin_portfolio_category_model->total_count();
			$pagination=$this->pagination($page,$total_count);
			$data['pagination']=$pagination;
			$data['pcats']=$q;
			$data['total_count']=$total_count;
			$this->load->view('admin/load_data_pcategory',$data);
			/*$no_of_paginations = ceil($total_count / $per_page);

			
			if ($cur_page >= 7) {
				$start_loop = $cur_page - 3;
				if ($no_of_paginations > $cur_page + 3)
					$end_loop = $cur_page + 3;
				else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
					$start_loop = $no_of_paginations - 6;
					$end_loop = $no_of_paginations;
				} else {
					$end_loop = $no_of_paginations;
				}
			} else {
				$start_loop = 1;
				if ($no_of_paginations > 7)
					$end_loop = 7;
				else
					$end_loop = $no_of_paginations;
			}
			
			$msg1 = "<tr><td colspan=8><div class='pagination'><ul>";
			
			// FOR ENABLING THE FIRST BUTTON
			if ($first_btn && $cur_page > 1) {
				$msg1 .= "<li p='1' class='active'>First</li>";
			} else if ($first_btn) {
				$msg1 .= "<li p='1' class='inactive'>First</li>";
			}
			
			// FOR ENABLING THE PREVIOUS BUTTON
			if ($previous_btn && $cur_page > 1) {
				$pre = $cur_page - 1;
				$msg1 .= "<li p='$pre' class='active'>Previous</li>";
			} else if ($previous_btn) {
				$msg1 .= "<li class='inactive'>Previous</li>";
			}
			for ($i = $start_loop; $i <= $end_loop; $i++) {
			
				if ($cur_page == $i)
					$msg1 .= "<li p='$i' style='color:#fff;background-color:#3fc86f;' class='active'>{$i}</li>";
				else
					$msg1 .= "<li p='$i' class='active'>{$i}</li>";
			}
			
			// TO ENABLE THE NEXT BUTTON
			if ($next_btn && $cur_page < $no_of_paginations) {
				$nex = $cur_page + 1;
				$msg1 .= "<li p='$nex' class='active'>Next</li>";
			} else if ($next_btn) {
				$msg1 .= "<li class='inactive'>Next</li>";
			}
			
			// TO ENABLE THE END BUTTON
			if ($last_btn && $cur_page < $no_of_paginations) {
				$msg1 .= "<li p='$no_of_paginations' class='active'>Last</li>";
			} else if ($last_btn) {
				$msg1 .= "<li p='$no_of_paginations' class='inactive'>Last</li>";
			}
			$goto = "<input type='text' class='goto' size='1' style='margin-top:-1px;margin-left:60px;'/><input type='button' id='go_btn' class='go_button' value='Go'/>";
			$total_string = "<span class='total' a='$no_of_paginations'>Page <b>" . $cur_page . "</b> of <b>$no_of_paginations</b></span>";
			$msg1.='</div></td></tr>';*/
			

		}
		public function sort_projects_cat()
		{
		
		    $i = 1;
			//explode('cat[]=',$_POST['cat_id'] ;
			$cat_id=str_replace('cat[]=', '', $_POST['cat_id']);
			$cat_id=explode('&',$cat_id);
			foreach ($cat_id as $value) 
			{
			  
			  // echo "update tbl_projects set node_order='$i' where id='$pjtid' and cat_id='$catid'";
			  $this->db->query("update tbl_portfolio_cat set node_order='$i' where id='$value'");
			  $i++;
			}
		}
		
		
		public function view_form_pcategory($id=0)
		{
		    if($this->session->userdata('id'))
			{
			  $data='';
			  if($id)
			  {
			   $q=$this->admin_portfolio_category_model->get($id);
			   $data['title']=$q->title;
			   $data['img']=$q->img;
			   $data['id']=$id;
			  }
			  $this->load->view('admin/pcat_form',$data);
			}
		  
		}
		
		public function submit_form($id=0)
		{
		  if($id==0)
		  {
		    
			  $this->admin_portfolio_category_model->insert();
			  redirect('admin_portfolio_category');
		  }
		  else
		  {
		    $this->admin_portfolio_category_model->edit($id);
			redirect('admin_portfolio_category');
			
		  }
		  
		}
		
		public function delete()
		{
		 $q=$this->admin_portfolio_category_model->delete();
		}
		
		/*public function delete_cat($id)
		{
		 $q=$this->admin_portfolio_category_model->delete();
		 redirect('admin_portfolio_category');
		}*/
		
		
		
		
		
	}
?>