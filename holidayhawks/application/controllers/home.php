<?php
class Home extends CI_Controller 
{
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('form');
			$this->load->model('home_model');
		}
        
        /*public function index()
		{
			
			 $this->load->view('index');
			  
		}*/
		
		public function index()
		{
		  $data['banners']= $this->home_model->get_banner();
		  $data['exp_stays']= $this->home_model->get_exp_stays();
		  $data['activities']= $this->home_model->get_activities();
		  $data['pkg_cats']= $this->home_model->get_pkg_cats();
		  $data['destinations']= $this->home_model->get_destination();
		  $data['pkg_text']= $this->home_model->home_text_pkg();
		  $data['desti_text']= $this->home_model->home_text_desti();
		  $data['exp_text']= $this->home_model->home_text_exp();
		  $data['act_text']= $this->home_model->home_text_act();
		  $data['vectors']= $this->home_model->vectors();
		  $data['blogs']= $this->home_model->blogs();
		  //$data['exp_stays']= $this->home_model->get_blog();
		  $this->load->view('home',$data);
		  
		}
		

		
}
?>