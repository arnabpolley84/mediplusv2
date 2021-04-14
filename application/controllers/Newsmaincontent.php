<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsmaincontent extends CI_Controller {

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
	public function index($page=false)
	{
		$condimglists=array(
	    			'content.content_page' => 'news',
	    			'news_content_imglists.news_content_imglists_deleted' => '0'
	    		);
		
		
	    $result['about_fourth_section_data'] = $this->generic_model->get_record_about('news_content_imglists',$condimglists);

		//$this->template->layout('admin','admincontentnewsview',$result);

		$condcont=array(
	    			'slider.slider_deleted' => '0',
	    			'content.content_page' => 'news'
	    		);

	    $result['slider_data'] = $this->generic_model->get_record_slider('slider',$condcont);

		$this->template->layout('','newscontentview',$result);
	}
}
