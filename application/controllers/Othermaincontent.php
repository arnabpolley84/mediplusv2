<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Othermaincontent extends CI_Controller {

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
	public function index($id=false)
	{
		/*echo "kkk";
		exit();*/

		$condlists=array(
		    			'content_details_cid' => $id,
		    			'content_details_deleted' => '0',
		    			'content_details_status' => '1'
		    		);
	    $result['other_section_data'] = $this->generic_model->get_record('content_details',$condlists);
	    /*echo $this->db->last_query();
	    print '----<pre>';
	    print_r($result['other_section_data']);*/
	    $result['contentdetails_cid'] = $id;
	    

	    $condcont=array(
	    			'slider.slider_deleted' => '0',
	    			'content.content_id' => $id
	    		);

	    $result['slider_data'] = $this->generic_model->get_record_slider('slider',$condcont);


	    $condlistsamneties=array(
	    			'other_content_lists_cid' => $id,
	    			'other_content_lists_deleted' => '0'
	    		);
	  	
	    $result['other_second_section_data'] = $this->generic_model->get_record_about('other_content_lists',$condlistsamneties);
	    /*echo $this->db->last_query();
	    print '<pre>';
	    print_r($result['other_second_section_data']);
	    print '</pre>';
	    exit();*/


		$this->template->layout('','othercontentview',$result);	 
		//$this->template->layout('','othercontentview','');
	}

	/*public function abc($id=false){
		echo $id;

	}*/
}
