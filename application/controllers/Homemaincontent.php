<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homemaincontent extends CI_Controller {

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
	public function index()
	{
		$condcont=array(
	    			'slider_deleted' => '0',
	    			'slider_cid' => '10'
	    		);
		$cond=array(
	    			'home_content_details_cid' => '10'
	    			
	    		);
		$condfirst=array(
	    			'home_content_details_cid' => '10',
	    			'home_content_details_section' => '1'
	    		);
		$condsecond=array(
	    			'home_content_details_cid' => '10',
	    			'home_content_details_section' => '2'
	    		);
		$condfifth=array(
	    			'home_content_details_cid' => '10',
	    			'home_content_details_section' => '5'
	    		);
	    
	    $condimg=array(
	    			'home_content_images_cid' => '10'
	    			
	    		);

	    $condlists=array(
	    			'home_content_lists_cid' => '10',
	    			'home_content_lists_deleted' => '0'
	    		);
	    $condimglists=array(
	    			'home_content_imglists_cid' => '10',
	    			'home_content_imglists_deleted' => '0'
	    		);
	    $condseventh=array(
	    			'home_content_details_cid' => '10',
	    			'home_content_details_section' => '7'
	    		);
	    $condeighth=array(
	    			'home_content_details_cid' => '10',
	    			'home_content_details_section' => '8'
	    		);
	    $condimglistssecond=array(
	    			'home_content_imglists_second_cid' => '10',
	    			'home_content_imglists_second_deleted' => '0'
	    		);
	    $condtenth=array(
	    			'home_content_details_cid' => '10',
	    			'home_content_details_section' => '10'
	    		);

		$result['slider_data'] = $this->generic_model->get_record('slider',$condcont);

		$result['home_first_section_data'] = $this->generic_model->get_record('home_content_details',$cond);

	    $result['home_frst_section_data'] = $this->generic_model->get_record('home_content_details',$condfirst);
	    $result['home_second_section_data'] = $this->generic_model->get_record('home_content_details',$condsecond);
	    $result['home_fifth_section_data'] = $this->generic_model->get_record('home_content_details',$condfifth);

	    $result['home_third_section_data'] = $this->generic_model->get_record('home_content_images',$condimg);
	    $result['home_fourth_section_data'] = $this->generic_model->get_record('home_content_lists',$condlists);
	    $result['home_sixth_section_data'] = $this->generic_model->get_record('home_content_imglists',$condimglists);
	    $result['home_seventh_section_data'] = $this->generic_model->get_record('home_content_details',$condseventh);
	    $result['home_eighth_section_data'] = $this->generic_model->get_record('home_content_details',$condeighth);
	    $result['home_ninth_section_data'] = $this->generic_model->get_record('home_content_imglists_second',$condimglistssecond);
	    $result['home_tenth_section_data'] = $this->generic_model->get_record('home_content_details',$condtenth);
		$this->template->layout('','homecontentview',$result);
	}

	/*public function firstsectiondetails()
	{
		
		$cond=array(
	    			'home_content_details_cid' => '10'
	    			
	    		);
		$condfirst=array(
	    			'home_content_details_cid' => '10',
	    			'home_content_details_section' => '1'
	    		);
		

		$result['home_first_section_data'] = $this->generic_model->get_record('home_content_details',$cond);

	    $result['home_frst_section_data'] = $this->generic_model->get_record('home_content_details',$condfirst);
	    

		$this->template->layout('','homecontentdetailsview',$result);
	}
	public function sixthsectiondetails()
	{
		
		$condimglists=array(
	    			'home_content_imglists_cid' => '10',
	    			'home_content_imglists_deleted' => '0'
	    		);

	    $result['home_sixth_section_data'] = $this->generic_model->get_record('home_content_imglists',$condimglists);
	    

		$this->template->layout('','homecontentdetailsview',$result);
	}

	public function seventhsectiondetails()
	{
		
		$condseventh=array(
	    			'home_content_details_cid' => '10',
	    			'home_content_details_section' => '7'
	    		);

	    $result['home_seventh_section_data'] = $this->generic_model->get_record('home_content_details',$condseventh);
	    

		$this->template->layout('','homecontentdetailsview',$result);
	}

	public function ninthsectiondetails()
	{
		
		$condimglistssecond=array(
	    			'home_content_imglists_second_cid' => '10',
	    			'home_content_imglists_second_deleted' => '0'
	    		);

	    $result['home_ninth_section_data'] = $this->generic_model->get_record('home_content_imglists_second',$condimglistssecond);
	    

		$this->template->layout('','homecontentdetailsview',$result);
	}*/
}
