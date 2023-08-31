<?php ob_start();?>
<?php
class Enquiry extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		//$this->load->model('enquiry_model');
		$this->load->helper('text');
		//$this->load->model('view_profile_model'); 
		$this->load->library('user_agent');
		
		
	}
	
	
	public function submit_form()
	{
	  $name=$this->input->post('name');
	  $email=$this->input->post('email');
	  $phone=$this->input->post('phone');
	  $now = date('d.m.Y');
	  
	  $msg='<body><div style="width:812px;height:auto;margin:0 auto;background:#b7b7b7;;padding:0 0 26px;">
	<div style="width:100%;margin:30px 0 0 0;text-align:center; float:left;"><img src="http://holidayhawks.in/images/logo.png" alt="" /></div>
	<div style="float:left;width:100%;">
		<p style="font-family: Open Sans, sans-serif;font-size:30px;color:#FFF;font-weight:700px;padding:0 0 0 30px;margin:29px 0 0; text-align:center;"><span>Enquiry</span></p>
	</div>
	<div style="padding:10px 0 0;display:inline-block;width:775px;margin:0 0 0 16px;">
		<div style="width:100%;float:left;height:auto;background:#FFF;padding:10px 0 14px 0;">
			<div style="float:left;width:782px;">
				<div style="float: left; height: auto; min-height: 90px; position: relative; width: 744px;cursor: pointer; padding: 16px 10px 10px; margin-left:10px;margin-top:16px; ">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr >
							<td style="border: 1px solid #c4c4c4;border-bottom:0;" width="50%" height="40">
								<h2 style="color: #010000; float: left; font-size: 16px; height: auto; margin: 0 0 0; padding: 0; text-align: left; width: 90%; font-family: Open Sans,sans-serif; font-weight: 500; padding-left:5%;">Name </h2>
							</td>
							<td style="border: 1px solid #c4c4c4; border-left:0; border-bottom:0;">
								<h2 style="color: #010000; float: left; font-size: 16px; height: auto; margin: 0 0 0; padding: 0; text-align: left; width: 90%; font-family: Open Sans,sans-serif; font-weight: 500; padding-left:5%;">'.$name.'</h2>
							</td>
						</tr>
						<tr>
							<td  style="border: 1px solid #c4c4c4;border-bottom:0;"height="40">
								<h2 style="color: #010000; float: left; font-size: 16px; height: auto; margin: 0 0 0; padding: 0; text-align: left; width: 90%; font-family: Open Sans,sans-serif; font-weight: 500; padding-left:5%;">Email</h2>
							</td>
							<td style="border: 1px solid #c4c4c4; border-left:0; border-bottom:0;">
								<h2 style="color: #010000; float: left; font-size: 16px; height: auto; margin: 0 0 0; padding: 0; text-align: left; width: 90%; font-family: Open Sans,sans-serif; font-weight: 500; padding-left:5%;">'.$email.'</h2>
							</td>
						</tr>
						<tr>
							<td style="border: 1px solid #c4c4c4;border-bottom:0;" height="40">
								<h2 style="color: #010000; float: left; font-size: 16px; height: auto; margin: 0 0 0; padding: 0; text-align: left; width: 90%; font-family: Open Sans,sans-serif; font-weight: 500; padding-left:5%;">Mobile No</h2>
							</td>
							<td style="border: 1px solid #c4c4c4;border-left:0; border-bottom:0;">
								<h2 style="color: #010000; float: left; font-size: 16px; height: auto; margin: 0 0 0; padding: 0; text-align: left; width: 90%; font-family: Open Sans,sans-serif; font-weight: 500; padding-left:5%;">'.$phone.'</h2>
							</td>
						</tr>
						
						
						<tr>
							<td height="40" style="border-top: 1px solid #c4c4c4;border-bottom:0;">&nbsp;</td>
							<td style="border-top: 1px solid #c4c4c4;border-left:0; border-bottom:0;">&nbsp;</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div></body>';

	   $this->load->library('email');
	   $config = array (
                              'mailtype' => 'html',
                              'charset'  => 'utf-8',
                              'priority' => '1'
                               );
       $this->email->initialize($config);
	  $this->email->from($email, $name);
	  $this->email->to('hai@holidayhawks.in');
      $this->email->subject('Holiday Hawks: Enquiry');
      $this->email->message($msg);
	  $this->email->send();
	}
	
	
	
}
?>