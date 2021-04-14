<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aboutmaincontent extends CI_Controller {

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
		$condlists=array(
	    			'content.content_page' => 'about',
	    			'about_content_lists.about_content_lists_deleted' => '0'
	    		);
		$condimg=array(
	    			'content.content_page' => 'about'
	    		);
		
		$condthird=array(
	    			'content.content_page' => 'about',
	    			'about_content_details.about_content_details_section' => '3'
	    		);
		
		$condimglists=array(
	    			'content.content_page' => 'about',
	    			'about_content_imglists.about_content_imglists_deleted' => '0'
	    		);

		$condfifth=array(
	    			'content.content_page' => 'about',
	    			'about_content_details.about_content_details_section' => '5'
	    		);

		$result['about_first_section_data'] = $this->generic_model->get_record_about('about_content_lists',$condlists);
	    $result['about_second_section_data'] = $this->generic_model->get_record_about('about_content_images',$condimg);
	    $result['about_third_section_data'] = $this->generic_model->get_record_about('about_content_details',$condthird);
	    $result['about_fourth_section_data'] = $this->generic_model->get_record_about('about_content_imglists',$condimglists);
	    $result['about_fifth_section_data'] = $this->generic_model->get_record_about('about_content_details',$condfifth);

	    $condcont=array(
	    			'slider.slider_deleted' => '0',
	    			'content.content_page' => 'about'
	    		);

	    $result['slider_data'] = $this->generic_model->get_record_slider('slider',$condcont);

		$this->template->layout('','aboutcontentview',$result);
	}
}
