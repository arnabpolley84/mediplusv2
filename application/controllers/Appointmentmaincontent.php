<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointmentmaincontent extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	

	public function index(){
		/*print '<pre>';
		print_r($_SERVER);
		exit();*/
	   if($this->input->post('sendmessage') == 'Send Message'){
	   	/*print '<pre>';
	   	print_r($_POST);
	   	print '</pre>';
	   	exit();*/
		$checkcontentres=$this->generic_model->check_content_appointment($this->input->post('email'),'appointment');
		//echo $this->db->last_query();
		$checkcontentstatus=(!empty($checkcontentres['result']['statusid'])) ? $checkcontentres['result']['statusid'] : '';
		
		$content_id=(!empty($checkcontentres['result']['aid'])) ? $checkcontentres['result']['aid'] : '';
		$content_msg=(!empty($checkcontentres['result']['msg'])) ? $checkcontentres['result']['msg'] : '';
		if($content_msg){
			$content_msg=$content_msg.'<br><br>'.trim($this->input->post('msg'));
		}else{
			$content_msg=trim($this->input->post('msg'));
		}

		
		//echo 'checkcontentstatus: '.$checkcontentstatus;
		//exit();
		

		if($checkcontentstatus=='100'){ //content home there in content table only
			//echo 'kjhkjhkkkooooo';exit();
			/*echo date('Y-m-d',strtotime($this->input->post('date'))) .'<br>';
			echo $this->input->post('time') .'<br>';
			echo date('H:i:s',strtotime($this->input->post('time'))) .'<br>';
			exit();*/
			$appointment_data=array(
						        'appointment_fname'=>trim($this->input->post('fname')),
						        'appointment_lname'=>trim($this->input->post('lname')),
						        'appointment_email'=>trim($this->input->post('email')),
						        'appointment_date'=>date('Y-m-d',strtotime($this->input->post('date'))),
						        'appointment_time'=>date('H:i:s',strtotime($this->input->post('time'))),
						        'appointment_msg'=>trim($this->input->post('msg')),
						        'appointment_type'=>trim($this->input->post('appointment_type')),
						        'appointment_status'=>'1',
						        'appointment_deleted'=>'0',
						        'appointment_createdon'=>date('Y-m-d H:i:s')
						    );

			
			/*print '<pre>';
		   	print_r($appointment_data);
		   	print '</pre>';*/
		   	//exit();
			$resultcontentdetails = $this->generic_model->generic_insert('appointment',$appointment_data);
			$notification_data=array(
						        'notification_app_id'=>$this->db->insert_id(),
						        'notification_read'=>'0',
						        'notification_createdon'=>date('Y-m-d H:i:s')
						    );
			$resultcontentdetailsnot = $this->generic_model->generic_insert('notification',$notification_data);
			/*echo $this->db->last_query();
			exit();*/
			if($resultcontentdetails){
		    	if($_SERVER['HTTP_HOST'] == 'localhost'){
		    		$session_data = array(
							'message' => 'Appointment has successfully been created.'
							);
		    	}else{
		    		$resemail=$this->send_email($appointment_data);
			    	if($resemail){

			    	    $session_data = array(
							'message' => 'Appointment has successfully been created.'
							);


			    	}else{
			    		$session_data = array(
							'message' => 'Appointment has successfully been created. Unable to reach Doctor.'
							);
			    	}
		    	}
		    	
		    	$this->session->set_userdata('content', $session_data);
		    	
		    	//echo 'kjhkjhkkk';exit();
		    	/*print '<pre>';
		    	print_r($_SESSION);
		    	print '<pre>';
		    	exit();*/
		    	redirect('contact');
					
		    }else{
		    	$session_data = array(
						'message' => 'There went something wrong.'
						);
		    	//$this->session->set_userdata('content', $session_data);
		    	$result['content']['message']=$session_data['message'];
		    	
		    	$this->template->layout('','contactcontentview',$result);
		    }

		}

		if($checkcontentstatus=='102'){ //content home and section there in content details table only
			//echo 'kjhkjhkkkyyyy';exit();
				$appointment_data=array(
						        'appointment_fname'=>trim($this->input->post('fname')),
						        'appointment_lname'=>trim($this->input->post('lname')),
						        'appointment_email'=>trim($this->input->post('email')),
						        'appointment_date'=>date('Y-m-d',strtotime($this->input->post('date'))),
						        'appointment_time'=>date('H:i:s',strtotime($this->input->post('time'))),
						        'appointment_msg'=>$content_msg,
						        'appointment_type'=>trim($this->input->post('appointment_type')),
						        'appointment_modifiedon'=>date('Y-m-d H:i:s')
						    );

				
	    
			    $resultcontentdetails=$this->generic_model->generic_update_tbl('appointment',$content_id,'appointment_id',$appointment_data); 
			    $notification_data=array(
						        'notification_read'=>'0',
						        'notification_modifiedon'=>date('Y-m-d H:i:s')
						    );
			    /*$resultcontentdetailsnot = $this->generic_model->generic_insert('notification',$notification_data);*/
			    $resultcontentdetailsnot = $this->generic_model->generic_update_tbl('notification',$content_id,'notification_app_id',$notification_data);
			    //$qry=$this->db->last_query();
			    /*echo $qry;
			    exit();*/

			    if($resultcontentdetails){
			    	if($_SERVER['HTTP_HOST'] == 'localhost'){
			    		$session_data = array(
								'message' => 'Appointment has successfully been created.'
								);
			    	}else{
			    		$resemail=$this->send_email($appointment_data);
				    	if($resemail){

				    	    $session_data = array(
								'message' => 'Appointment has successfully been created.'
								);


				    	}else{
				    		$session_data = array(
								'message' => 'Appointment has successfully been created. Unable to reach Doctor.'
								);
				    	}
			    	}
			    	$this->session->set_userdata('content', $session_data);
			    	/*print '<pre>';
			    	print_r($_SESSION);
			    	print '<pre>';
			    	exit();*/
			    	redirect('contact');
						
			    }else{
			    	$session_data = array(
							'message' => 'There went something wrong.'
							);
			    	//$this->session->set_userdata('content', $session_data);
			    	
			    	$result['content']['message']=$session_data['message'];
			    	$this->template->layout('','contactcontentview',$result);
			    }
	    
		}

	  }
	}

	public function appointmentmaincontentreply(){
		/*print '<pre>';
		print_r($_SERVER);
		exit();*/
	   if($this->input->post('sendmessage') == 'Send Reply'){
	   	/*print '<pre>';
	   	print_r($_POST);
	   	print '</pre>';
	   	exit();*/
		$checkcontentres=$this->generic_model->check_content_appointment($this->input->post('email'),'appointment_reply');
		//echo $this->db->last_query();
		$checkcontentstatus=(!empty($checkcontentres['result']['statusid'])) ? $checkcontentres['result']['statusid'] : '';
		
		$content_id=(!empty($checkcontentres['result']['aid'])) ? $checkcontentres['result']['aid'] : '';
		$content_msg=(!empty($checkcontentres['result']['msg'])) ? $checkcontentres['result']['msg'] : '';
		if($content_msg){
			$content_msg=$content_msg.'<br><br>'.trim($this->input->post('msg'));
		}else{
			$content_msg=trim($this->input->post('msg'));
		}

		
		//echo 'checkcontentstatus: '.$checkcontentstatus;
		//exit();
		

		if($checkcontentstatus=='100'){ //content home there in content table only
			//echo 'kjhkjhkkkooooo';exit();
			/*echo date('Y-m-d',strtotime($this->input->post('date'))) .'<br>';
			echo $this->input->post('time') .'<br>';
			echo date('H:i:s',strtotime($this->input->post('time'))) .'<br>';
			exit();*/
			$appointment_data=array(
						        'appointment_reply_aid'=>trim($this->input->post('app_idr')),
						        'appointment_reply_msg'=>trim($this->input->post('appointment_message')),
						        'appointment_reply_status'=>'1',
						        'appointment_reply_deleted'=>'0',
						        'appointment_reply_createdon'=>date('Y-m-d H:i:s')
						    );
			/*print '<pre>';
		   	print_r($appointment_data);
		   	print '</pre>';*/
		   	//exit();
			$resultcontentdetails = $this->generic_model->generic_insert('appointment_reply',$appointment_data);
			/*echo $this->db->last_query();
			exit();*/
			if($resultcontentdetails){
		    	if($_SERVER['HTTP_HOST'] == 'localhost'){
		    		$session_data = array(
							'message' => 'Appointment has successfully been replied.'
							);
		    	}else{
		    		$resemail=$this->send_email($appointment_data);
			    	if($resemail){

			    	    $session_data = array(
							'message' => 'Appointment has successfully been replied.'
							);


			    	}else{
			    		$session_data = array(
							'message' => 'Appointment has successfully been replied. Unable to reach patient.'
							);
			    	}
		    	}
		    	
		    	$this->session->set_userdata('content', $session_data);
		    	
		    	//echo 'kjhkjhkkk';exit();
		    	/*print '<pre>';
		    	print_r($_SESSION);
		    	print '<pre>';
		    	exit();*/
		    	redirect('admin/content/appointment');
					
		    }else{
		    	$session_data = array(
						'message' => 'There went something wrong.'
						);
		    	//$this->session->set_userdata('content', $session_data);
		    	$result['content']['message']=$session_data['message'];
		    	
		    	$this->template->layout('','admincontentappointmentview',$result);
		    }

		}

		

	  }
	}

	public function send_email($mail_data=array()){

		print '<pre>';
		print_r($mail_data);
		print '</pre>';
		//exit();
		$sender_email='arnb.p6084@gmail.com';
		$user_password='65125217#abcd123565125217';
		$username='arnabpolley';
		$receiver_email='arnabpolley84@gmail.com';
		$subject='test subject';
		$message='test message';
		//sending mail to admin and doctors
		// Configure email library
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.googlemail.com';
		$config['smtp_port'] = 465;
		$config['smtp_user'] = 'arnb.p6084@gmail.com';
		$config['smtp_pass'] = '65125217#abcd123565125217';

		// Load email library and passing configured values to email library
		$this->load->library('email', $config);
		$this->email->set_newline("rn");

		// Sender email address
		$this->email->from($sender_email, $username);
		// Receiver email address
		$this->email->to($receiver_email);
		// Subject of email
		$this->email->subject($subject);
		// Message in email
		$this->email->message($message);

		if ($this->email->send()) {
		echo 'Email Successfully Send !';
		exit();
		} else {
		echo '<p class="error_msg">Invalid Gmail Account or Password !</p>';
		print_r(error_get_last());
		exit();
		}

		//return true;
	}
	
}
