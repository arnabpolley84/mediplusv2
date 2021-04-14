<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


Class Generic_model extends CI_Model {

	// Insert registration data in database
	public function generic_register($table,$data) {

		// Query to check whether username already exist or not
		$condition = "user_name =" . "'" . $data['user_name'] . "'";
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {

			// Query to insert data in database
			$this->db->insert($table, $data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}
		} else {
			return false;
		}
	}

	// Check for content exists
	public function check_content_home($pageid=false,$secId=false,$tbl=false){

		$output=array();
		//checking for content if there
			$cond_cont=array(
						'content_id' => $pageid
						);
			$this->db->select('content_id');
			$this->db->from('content');
			$this->db->where($cond_cont);
			//$this->db->limit(1);
			$query = $this->db->get();
			if ($query->num_rows() != 0) {
					$output['result']['statusid']='101';
			} else {
					$output['result']['statusid']='100';
			}
		//checking for home content details if there
			$cond_sec=array(
						$tbl.'_cid' => $pageid,
						$tbl.'_section' => $secId
						);
			$this->db->select($tbl.'_id');
			$this->db->from($tbl);
			$this->db->where($cond_sec);
			//$this->db->limit(1);
			$query=$this->db->get();
			$queryres = $query->result_array();
			/*print '<pre>';
			print_r($query);
			exit();*/
			if ($query->num_rows() != 0) {
					$output['result']['statusid']='102';
					$output['result']['cdid']=$queryres[0][$tbl.'_id'];
			} else {

				
			}
			//$condition = "content_page =" . "'" . $page . "'";

			/*print '<pre>';
			print_r($this->db->last_query());
			print_r($output);
			print '</pre>';
	  		exit();*/

				return $output;

	}

	// Check for content exists
	public function check_content_about($pagenm=false,$secId=false,$tbl=false){

		$output=array();
		$pageid='';
		//checking for content if there
			$cond_cont=array(
						'content_page' => $pagenm
						);
			$this->db->select('content_id');
			$this->db->from('content');
			$this->db->where($cond_cont);
			//$this->db->limit(1);
			$query = $this->db->get();
			$queryres = $query->result_array();
			/*print '<pre>';
			print_r($queryres);
			print '</pre>';*/

			if ($query->num_rows() != 0) {
					$output['result']['statusid']='101';
					$pageid=$queryres[0]['content_id'];
					$output['result']['cid']=$pageid;
			} else {
					$output['result']['statusid']='100';
			}
			//checking for home content details if there
			if($pageid){
				$cond_sec=array(
							$tbl.'_cid' => $pageid,
							$tbl.'_section' => $secId
							);
				$this->db->select($tbl.'_id');
				$this->db->from($tbl);
				$this->db->where($cond_sec);
				//$this->db->limit(1);
				$query=$this->db->get();
				$queryres = $query->result_array();
				/*print '<pre>';
				print_r($query);
				exit();*/
				if ($query->num_rows() != 0) {
						$output['result']['statusid']='102';
						$output['result']['cdid']=$queryres[0][$tbl.'_id'];
				} else {

					
				}
				//$condition = "content_page =" . "'" . $page . "'";

				/*print '<pre>';
				print_r($this->db->last_query());
				print_r($output);
				print '</pre>';
		  		exit();*/
	  		}

				return $output;

	}

	public function check_content_home_lists($pageid=false,$secId=false,$tbl=false,$listid=false){

		$output=array();
		//checking for content if there
			$cond_cont=array(
						'content_id' => $pageid
						);
			$this->db->select('content_id');
			$this->db->from('content');
			$this->db->where($cond_cont);
			//$this->db->limit(1);
			$query = $this->db->get();
			if ($query->num_rows() != 0) {
					$output['result']['statusid']='101';
			} else {
					$output['result']['statusid']='100';
			}
		//checking for home content details if there
			$cond_sec=array(
						$tbl.'_cid' => $pageid,
						$tbl.'_listid' => $listid
						);
			$this->db->select($tbl.'_id');
			$this->db->from($tbl);
			$this->db->where($cond_sec);
			//$this->db->limit(1);
			$query=$this->db->get();
			$queryres = $query->result_array();
			/*print '<pre>';
			print_r($query);
			exit();*/
			if ($query->num_rows() != 0) {
					$output['result']['statusid']='102';
					$output['result']['cdid']=$queryres[0][$tbl.'_id'];
			} else {

				
			}
			//$condition = "content_page =" . "'" . $page . "'";

			/*print '<pre>';
			print_r($this->db->last_query());
			print_r($output);
			print '</pre>';
	  		exit();*/

				return $output;

	}

	public function check_content_appointment($email=false,$tbl=false){

		/*echo $pagenm.'<br>';
		echo $secId.'<br>';
		echo $tbl.'<br>';
		echo $listid.'<br>';
		exit();*/
		$output=array();
		//checking for content if there
			$cond_cont=array(
						'appointment_email' => $email
						);
			$this->db->select('appointment_id,appointment_msg');
			$this->db->from('appointment');
			$this->db->where($cond_cont);
			//$this->db->limit(1);
			$query = $this->db->get();
			$queryres = $query->result_array();
			if ($query->num_rows() != 0) {
					$output['result']['statusid']='102';
					$pageid=$output['result']['aid']=$queryres[0]['appointment_id'];
					$pageid=$output['result']['msg']=$queryres[0]['appointment_msg'];
			} else {
					$output['result']['statusid']='100';
			}
		
			//$condition = "content_page =" . "'" . $page . "'";

			/*print '<pre>';
			print_r($this->db->last_query());
			print_r($output);
			print '</pre>';
	  		exit();*/

				return $output;

	}

	//$checkcontentres=$this->generic_model->check_content_about_lists('other',$secId,'other_content_lists',$listid);

	public function check_content_amnetis_lists($pageid=false,$secId=false,$tbl=false,$listid=false){

		/*echo $pagenm.'<br>';
		echo $secId.'<br>';
		echo $tbl.'<br>';
		echo $listid.'<br>';
		exit();*/
		$output=array();
		//checking for content if there
			$cond_cont=array(
						'content_id' => $pageid
						);
			$this->db->select('content_id');
			$this->db->from('content');
			$this->db->where($cond_cont);
			//$this->db->limit(1);
			$query = $this->db->get();
			$queryres = $query->result_array();
			if ($query->num_rows() != 0) {
					$output['result']['statusid']='101';
					$pageid=$output['result']['cid']=$queryres[0]['content_id'];
			} else {
					$output['result']['statusid']='100';
			}
		//checking for home content details if there
			$cond_sec=array(
						$tbl.'_cid' => $pageid,
						$tbl.'_listid' => $listid
						);
			$this->db->select($tbl.'_id');
			$this->db->from($tbl);
			$this->db->where($cond_sec);
			//$this->db->limit(1);
			$query=$this->db->get();
			$queryres = $query->result_array();
			/*print '<pre>';
			print_r($query);
			exit();*/
			if ($query->num_rows() != 0) {
					$output['result']['statusid']='102';
					$output['result']['cdid']=$queryres[0][$tbl.'_id'];
			} else {

				
			}
			//$condition = "content_page =" . "'" . $page . "'";

			/*print '<pre>';
			print_r($this->db->last_query());
			print_r($output);
			print '</pre>';
	  		exit();*/

				return $output;

	}

	public function check_content_about_lists($pagenm=false,$secId=false,$tbl=false,$listid=false){

		/*echo $pagenm.'<br>';
		echo $secId.'<br>';
		echo $tbl.'<br>';
		echo $listid.'<br>';
		exit();*/
		$output=array();
		//checking for content if there
			$cond_cont=array(
						'content_page' => $pagenm
						);
			$this->db->select('content_id');
			$this->db->from('content');
			$this->db->where($cond_cont);
			//$this->db->limit(1);
			$query = $this->db->get();
			$queryres = $query->result_array();
			if ($query->num_rows() != 0) {
					$output['result']['statusid']='101';
					$pageid=$output['result']['cid']=$queryres[0]['content_id'];
			} else {
					$output['result']['statusid']='100';
			}
		//checking for home content details if there
			$cond_sec=array(
						$tbl.'_cid' => $pageid,
						$tbl.'_listid' => $listid
						);
			$this->db->select($tbl.'_id');
			$this->db->from($tbl);
			$this->db->where($cond_sec);
			//$this->db->limit(1);
			$query=$this->db->get();
			$queryres = $query->result_array();
			/*print '<pre>';
			print_r($query);
			exit();*/
			if ($query->num_rows() != 0) {
					$output['result']['statusid']='102';
					$output['result']['cdid']=$queryres[0][$tbl.'_id'];
			} else {

				
			}
			//$condition = "content_page =" . "'" . $page . "'";

			/*print '<pre>';
			print_r($this->db->last_query());
			print_r($output);
			print '</pre>';
	  		exit();*/

				return $output;

	}

	public function check_content_news_lists($pagenm=false,$secId=false,$tbl=false,$listid=false){

		$output=array();
		//checking for content if there
			$cond_cont=array(
						'content_page' => $pagenm
						);
			$this->db->select('content_id');
			$this->db->from('content');
			$this->db->where($cond_cont);
			//$this->db->limit(1);
			$query = $this->db->get();
			$queryres = $query->result_array();
			if ($query->num_rows() != 0) {
					$output['result']['statusid']='101';
					$pageid=$output['result']['cid']=$queryres[0]['content_id'];
			} else {
					$output['result']['statusid']='100';
			}
		//checking for home content details if there
			$cond_sec=array(
						$tbl.'_cid' => $pageid,
						$tbl.'_listid' => $listid
						);
			$this->db->select($tbl.'_id');
			$this->db->from($tbl);
			$this->db->where($cond_sec);
			//$this->db->limit(1);
			$query=$this->db->get();
			$queryres = $query->result_array();
			/*print '<pre>';
			print_r($query);
			exit();*/
			if ($query->num_rows() != 0) {
					$output['result']['statusid']='102';
					$output['result']['cdid']=$queryres[0][$tbl.'_id'];
			} else {

				
			}
			//$condition = "content_page =" . "'" . $page . "'";

			/*print '<pre>';
			print_r($this->db->last_query());
			print_r($output);
			print '</pre>';
	  		exit();*/

				return $output;

	}

	public function check_content_other($pageid=false,$tbl=false){

		$output=array();
		//checking for content if there
			$cond_cont=array(
						'content_id' => $pageid
						);
			$this->db->select('content_id');
			$this->db->from('content');
			$this->db->where($cond_cont);
			//$this->db->limit(1);
			$query = $this->db->get();
			if ($query->num_rows() != 0) {
					$output['result']['statusid']='101';
			} else {
					$output['result']['statusid']='100';
			}
		//checking for other content details if there
			$cond_sec=array(
						$tbl.'_cid' => $pageid
						);
			$this->db->select($tbl.'_id');
			$this->db->from($tbl);
			$this->db->where($cond_sec);
			//$this->db->limit(1);
			$query=$this->db->get();
			$queryres = $query->result_array();
			/*print '<pre>';
			print_r($query);
			exit();*/
			if ($query->num_rows() != 0) {
					$output['result']['statusid']='102';
					$output['result']['cdid']=$queryres[0][$tbl.'_id'];
			} else {
			}
			
			/*print '<pre>';
			print_r($this->db->last_query());
			print_r($output);
			print '</pre>';
	  		exit();*/
			return $output;

	}

	public function check_content($page=false) {

		$condition = "content_page =" . "'" . $page . "'";
		$this->db->select('*');
		$this->db->from('content');
		$this->db->where($condition);
		//$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
				return false;
		} else {
				return true;
		}
	}

	public function generic_insert($table=false,$data=array()) {

			// Query to insert data in database
			$this->db->insert($table, $data);
			if ($this->db->affected_rows() > 0) {
				return true;
			} else {
				return false;
			}
	}

	public function generic_insertoncontent($contentdata=array(),$contentdetailsdata=array()) {

			// Query to insert data in database
			$this->db->insert('content', $contentdata);
			if ($this->db->affected_rows() > 0) {
				$this->db->insert('content_details', $contentdetailsdata);
				if ($this->db->affected_rows() > 0) {
					return true;
				} else {
					return false;
				}
			} else {
				return false;
			}
	}

	// Read data using username and password
	public function login($data) {

		$condition = "user_name =" . "'" . $data['username'] . "' AND " . "user_password =" . "'" . md5($data['password']) . "'";
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}

	// Read data from database to show data in admin page
	public function read_user_information($username) {

		$condition = "user_name =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function get_record($table=false,$condition=array()) {

		//$condition = "user_name =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from($table);
		if($condition){
			$this->db->where($condition);
		}
		//$this->db->limit(1);
		$query = $this->db->get();
		$reslt = $query->result_array();
		/*$qry=$this->db->last_query();
		print '<pre>';
		print_r($qry);
		print_r($reslt);
		print '</pre>';
		exit();*/

		if ($query->num_rows() > 0) {
			//$reslt['num']=$query->num_rows();
			return $reslt;
		} else {
			return false;
		}
	}

	public function get_notify_record($condition=array()) {

		//$condition = "user_name =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from('appointment');
		if($condition){
			$this->db->where($condition);
		}
		$this->db->join('notification', 'notification.notification_app_id = appointment.appointment_id', 'inner');
		//$this->db->limit(1);
		$query = $this->db->get();
		$reslt = $query->result_array();
		/*$qry=$this->db->last_query();
		print '<pre>';
		print_r($qry);
		print_r($reslt);
		print '</pre>';
		exit();*/

		if ($query->num_rows() > 0) {
			//$reslt['num']=$query->num_rows();
			return $reslt;
		} else {
			return false;
		}
	}

	public function get_record_slider($table=false,$condition=array()) {

		//$condition = "user_name =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from($table);
		if($condition){
			$this->db->where($condition);
		}
		$this->db->join('content','content.content_id='.$table.'_cid','inner');
		//$this->db->limit(1);
		$query = $this->db->get();
		$reslt = $query->result_array();
		/*$qry=$this->db->last_query();
		print '<pre>';
		print_r($qry);
		print_r($reslt);
		print '</pre>';
		exit();*/

		if ($query->num_rows() > 0) {
			//$reslt['num']=$query->num_rows();
			return $reslt;
		} else {
			return false;
		}
	}

	public function get_record_about($table=false,$condition=array()) {

		//$condition = "user_name =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from($table);
		if($condition){
			$this->db->where($condition);
		}
		$this->db->join('content','content.content_id='.$table.'_cid','inner');
		//$this->db->limit(1);

		$query = $this->db->get();
		$reslt = $query->result_array();
		/*$qry=$this->db->last_query();
		print '<pre>';
		print_r($qry);
		print_r($reslt);
		print '</pre>';
		exit();*/

		if ($query->num_rows() > 0) {
			return $reslt;
		} else {
			return false;
		}
	}

	public function get_record_oncontent($pageid=false) {

		$this->db->select("
			content.content_id,
			content.content_page,
			content.content_status,
			content.content_deleted,
			content_details.content_details_title,
			content_details.content_details_desc,
			content_details.content_details_more_desc,
			content_details.content_details_status,
			content_details.content_details_deleted");
        $this->db->from('content');
        $this->db->join('content_details', 'content_details.content_details_cid = content.content_id');
        if($pageid){
        	$condition=array(
        					'content.content_id' => $pageid
        				);
			$this->db->where($condition);
		}
        $query = $this->db->get();
        //$this->db->limit(1);
        $reslt = $query->result_array();
        /*$qry=$this->db->last_query();
		print '<pre>';
		print_r($qry);
		print_r($reslt);
		print '</pre>';
		exit();*/
		if ($query->num_rows() > 0) {
			return $reslt;
		} else {
			return false;
		}
	}

	public function update_status($table=false,$id=false,$status=false,$type=false){
		/*echo 'type='.$type;
		echo 'id='.$id;*/
		if($type=='status'){
		    $data[$table.'_status'] = $status;
		}else if($type=='delete'){
			$data[$table.'_deleted'] = $status;
		}else{

		}
		$this->db->where($table.'_id', $id);
		$this->db->update($table,$data);
		if(($table=='menu') || ($table=='fmenu')){
			$this->db->where($table.'_pid', $id);
			$this->db->update($table,$data);
		}
		  /*$qry=$this->db->last_query();
		  echo $qry.'kkkk';*/
		if ($this->db->affected_rows() > 0) {
					return true;
		}else{
		  			return false;
		}
	}

	public function generic_update($table=false,$id=false,$slider_data=array()){
		/*echo 'type='.$type;
		echo 'id='.$id;*/
		
		$this->db->where('slider_id', $id);
		$this->db->update($table,$slider_data);
		  /*$qry=$this->db->last_query();
		  echo $qry.'kkkk';*/
		if ($this->db->affected_rows() > 0) {
					return true;
		}else{
		  			return false;
		}
	}

	public function generic_update_tbl($table=false,$id=false,$field=false,$data=array()){
		/*echo 'type='.$type;
		echo 'id='.$id;*/
		
		$this->db->where($field, $id);
		$this->db->update($table,$data);
		  /*$qry=$this->db->last_query();
		  echo $qry.'kkkk';
		  exit();*/
		  /*echo 'jjj'.$this->db->last_query();
		  exit();*/
		if ($this->db->affected_rows() > 0) {
					return true;
		}else{
		  			return false;
		}
	}

	public function update_statusoncontent($cid=false,$status=false,$type=false){
		
		if($type=='status'){
		    $datac['content_status'] = $status;
		    $datacd['content_details_status'] = $status;
		}else if($type=='delete'){
			$datac['content_details_deleted'] = $status;
			$datacd['content_details_deleted'] = $status;
		}else{

		}
		//changing status of content
		$this->db->where('content_id', $cid);
		$this->db->update('content',$datac);
		//changing status of content details
		$this->db->where('content_details_cid', $cid);
		$this->db->update('content_details',$datacd);
		  /*$qry=$this->db->last_query();
		  echo $qry.'kkkk';*/
		if ($this->db->affected_rows() > 0) {
					return true;
		}else{
		  			return false;
		}
	}

	public function update_statusoncontentdetails($cdid=false,$status=false,$type=false){
		
		if($type=='status'){
		    $data['content_details_status'] = $status;
		}else if($type=='delete'){
			$data['content_details_deleted'] = $status;
		}else{

		}
		$this->db->where('content_details_id', $cdid);
		$this->db->update('content_details',$data);
		  /*$qry=$this->db->last_query();
		  echo $qry.'kkkk';*/
		if ($this->db->affected_rows() > 0) {
					return true;
		}else{
		  			return false;
		}
	}

	public function generic_updateoncontentdetails($cdid=false,$contentdetailsdata=array()){
		
		$this->db->where('content_details_id', $cdid);
		$this->db->update('content_details',$contentdetailsdata);
		  /*$qry=$this->db->last_query();
		  echo $qry.'kkkk';*/
		if ($this->db->affected_rows() > 0) {
					return true;
		}else{
		  			return false;
		}
	}
}

?>