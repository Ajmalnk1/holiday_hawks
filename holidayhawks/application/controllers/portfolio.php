<?php
class Portfolio extends CI_Controller 
{
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('form');
			$this->load->model('portfolio_model');
		}
        
        public function index()
		{
			$data['portfolios'] = $this->portfolio_model->get_portfolio_cat();
			$this->load->view('portfolio',$data);
			  
		}
		public function portfolio_list($cat_id)
		{
		    $data['portfolio_cat_name'] = $this->portfolio_model->get_portfolio_cat_name($cat_id);
			$data['portfolios'] = $this->portfolio_model->get_portfolio($cat_id);
			$data['cat_all'] = $this->portfolio_model->get_portfolio_cat();
			$data['cat_id'] = $cat_id;
			$this->load->view('portfolio_list',$data);
		  
		}
		
		public function details($id)
		{
		  
		  $detail= $this->portfolio_model->portfolio_detail($id);
		  $data['title']= $detail->title;
		  $data['descr']= $detail->descr;
		  $data['sector']= $detail->sector;
		  $data['location']= $detail->location;
		  $data['time_scale']= $detail->time_scale;
		  $data['project_scope']= $detail->project_scope;
		  $data['cat_all'] = $this->portfolio_model->get_portfolio_cat();
		  $data['cat_id'] = $detail->cat_id;
		  $data['cat_name'] = $this->portfolio_model->get_portfolio_cat_name($detail->cat_id);
		  $data['img_list']= $this->portfolio_model->portfolio_detail_img($detail->project_temp_id);
		  $data['next_link']=$this->portfolio_model->next_link($detail->node_order);
		  $data['prev_link']=$this->portfolio_model->prev_link($detail->node_order);
		  $this->load->view('portfolio_details',$data);
		}
		
		

		
}
?>