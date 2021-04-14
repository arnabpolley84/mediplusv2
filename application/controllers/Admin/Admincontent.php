<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admincontent extends CI_Controller {

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
	    			'slider_deleted' => '0'
	    		);
		$result['slider_data'] = $this->generic_model->get_record_slider('slider',$condcont);
		$condcont=array(
	    			'content_deleted' => '0',
	    			'content_status' => '1'
	    		);
		$result['content_data'] = $this->generic_model->get_record('content',$condcont);
		/*print '<pre>';
		print_r($result);
		print '</pre>';
		exit();	*/
		$this->template->layout('admin','admincontentview',$result);
		//$this->load->view('admin/admincontentview');
	}

	public function upload()
	{
		print '<pre>';
		print_r($_FILES);
		print '</pre>';
		//$this->load->view('admin/admincontentview');
	}

	public function file_view(){
		$this->load->view('file_view', array('error' => ' ' ));
	}
	public function add_slider(){
		$config = array(
		'upload_path' => "./uploads/",
		'allowed_types' => "gif|jpg|png|jpeg|pdf",
		'overwrite' => TRUE,
		'encrypt_name' => TRUE,
		'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
		'max_height' => "975",
		'max_width' => "1920"
		);
		$this->load->library('upload', $config);
		if($this->upload->do_upload())
		{
			$data = array('upload_data' => $this->upload->data());
			
			//$this->load->view('admin/admincontentview',$data);$data = array(
			$slider_data=array(
						        'slider_title'=>trim($this->input->post('title')),
						        'slider_cid'=>trim($this->input->post('slider_cid')),
						        'slider_file'=>$data['upload_data']['file_name'],
						        'slider_text1'=>trim($this->input->post('text1')),
						        'slider_text2'=>trim($this->input->post('text2')),
						        'slider_status'=>'1',
						        'slider_deleted'=>'0',
						        'slider_createdon'=>date('Y-m-d H:i:s'),
						        'slider_modifiedon'=>'',
						        'slider_deletedon'=>''
						    );
			$result = $this->generic_model->generic_insert('slider',$slider_data);
			//$data['slider_data'] = $this->generic_model->get_record('slider');
			//$this->template->layout('admin','admincontentview',$data);

			if($result){
		    	$session_data = array(
						'message' => 'Slider has successfully been added.'
						);
						
		    }else{
		    	$session_data = array(
						'message' => 'There went something wrong.'
						);
		    	
		    }
		    $this->session->set_userdata('slider', $session_data);
		    redirect('admin/content/home');
		}
		else
		{
			$error = array('error' => $this->upload->display_errors());
			//$this->load->view('admin/admincontentview', $error);
			$this->template->layout('admin','admincontentview',$error);	
		}
	}

	public function update_status(){
	    $status = $this->input->post('status');
	    $slider_id = $this->input->post('id');
	    $stat=$this->generic_model->update_status('slider',$slider_id,$status,'status');

	}

	public function update_delete_status(){

	    $status = $this->input->post('status');
	    $slider_id = $this->input->post('id');
	    $stat=$this->generic_model->update_status('slider',$slider_id,$status,'delete');
	    
	}

	public function update_page_status(){
	    $status = $this->input->post('status');
	    $content_id = $this->input->post('id');
	    $stat=$this->generic_model->update_status('content',$content_id,$status,'status');

	}

	public function update_delete_page_status(){

	    $status = $this->input->post('status');
	    $content_id = $this->input->post('id');
	    $stat=$this->generic_model->update_status('content',$content_id,$status,'delete');
	    
	}

	public function update_menu_status(){
	    $status = $this->input->post('status');
	    $menu_id = $this->input->post('id');
	    $stat=$this->generic_model->update_status('menu',$menu_id,$status,'status');

	}

	//footer menu
	public function fupdate_menu_status(){
	    $status = $this->input->post('status');
	    $menu_id = $this->input->post('id');
	    $stat=$this->generic_model->update_status('fmenu',$menu_id,$status,'status');
	}

	public function update_delete_menu_status(){

	    $status = $this->input->post('status');
	    $menu_id = $this->input->post('id');
	    $stat=$this->generic_model->update_status('menu',$menu_id,$status,'delete');
	    
	}

	//footer menu
	public function fupdate_delete_menu_status(){
	    $status = $this->input->post('status');
	    $menu_id = $this->input->post('id');
	    $stat=$this->generic_model->update_status('fmenu',$menu_id,$status,'delete');
	}

	public function edit_slider_view(){

	    //$status = $this->input->post('status');
	    $slider_id = $this->input->post('id');
	    $cond=array(
	    			'slider_id' => $slider_id
	    		);
	    $result['slider_data'] = $this->generic_model->get_record('slider',$cond);
	    $condcont=array(
	    			'content_deleted' => '0',
	    			'content_status' => '1'
	    		);
	    $result['content_data'] = $this->generic_model->get_record('content',$condcont);

	    $result['slider_id'] = $slider_id;
	    $sliderdata=$this->load->view('admin/adminslidereditcontentview',$result,true);
	    echo $sliderdata;
	    //$stat=$this->generic_model->update_status('slider',$slider_id,$status,'delete');
	    
	}

	public function slideredit(){
		/*print '<pre>';
		print_r($_FILES['userfile']['name']);
		print '</pre>';*/
		//exit();

		$slider_id = $this->input->post('id');
		if(!empty($_FILES['userfile']['name'])){
			$config = array(
			'upload_path' => "./uploads/",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'overwrite' => TRUE,
			'encrypt_name' => TRUE,
			'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' => "975",
			'max_width' => "1920"
			);
			$this->load->library('upload', $config);
			if($this->upload->do_upload())
			{
				$data = array('upload_data' => $this->upload->data());
			
			}
			
		    $slider_data=array(
							        'slider_title'=>trim($this->input->post('title')),
							        'slider_cid'=>trim($this->input->post('slider_cid')),
							        'slider_file'=>$data['upload_data']['file_name'],
							        'slider_text1'=>trim($this->input->post('text1')),
							        'slider_text2'=>trim($this->input->post('text2')),
							        'slider_modifiedon'=>date('Y-m-d H:i:s'),
							        
							    );
		}else{

			
		    $slider_data=array(
							        'slider_title'=>trim($this->input->post('title')),
							        'slider_cid'=>trim($this->input->post('slider_cid')),
							        'slider_text1'=>trim($this->input->post('text1')),
							        'slider_text2'=>trim($this->input->post('text2')),
							        'slider_modifiedon'=>date('Y-m-d H:i:s'),
							        
							    );
		}
		
	    
	    $stat=$this->generic_model->generic_update('slider',$slider_id,$slider_data);
	    //$qry=$this->db->last_query();
	    /*echo $qry;
	    exit();*/
	    if($stat){
	    	$session_data = array(
					'message' => 'Slider has successfully been update.'
					);
					
	    }else{
	    	$session_data = array(
					'message' => 'There went something wrong.'
					);
	    	
	    }
	    $this->session->set_userdata('slider', $session_data);
	    redirect('admin/content/home');
	    //$stat=$this->generic_model->update_status('slider',$slider_id,$status,'delete');
	    
	}

	//edit content view
	public function edit_page_view(){

	    //$status = $this->input->post('status');
	    $content_id = $this->input->post('id');
	    $cond=array(
	    			'content_id' => $content_id
	    		);
	    $result['other_section_content_data'] = $this->generic_model->get_record('content',$cond);
	    $result['content_id'] = $content_id;
	    $contentdata=$this->load->view('admin/adminpageeditcontentview',$result,true);
	    echo $contentdata;
	    //$stat=$this->generic_model->update_status('slider',$slider_id,$status,'delete');
	    
	}

	//edit menu view
	public function edit_menu_view(){

	    //$status = $this->input->post('status');
	    $menu_id = $this->input->post('id');
	    $cond=array(
	    			'menu_id' => $menu_id
	    		);
	    $condpagecont=array(
	    			'content_deleted' => '0',
	    			'content_status' => '1'
	    		);
	    
	    
	    $result['content_data'] = $this->generic_model->get_record('content',$condpagecont);


	    $result['menu_data'] = $this->generic_model->get_record('menu',$cond);
	    $result['menu_id'] = $menu_id;

	    $condcont=array(
	    			'menu_deleted' => '0',
	    			'menu_id != ' => $menu_id
	    		);
	    
	    $result['menu_data_all'] = $this->generic_model->get_record('menu',$condcont);

	    $contentdata=$this->load->view('admin/adminmenueditcontentview',$result,true);
	    echo $contentdata;
	    //$stat=$this->generic_model->update_status('slider',$slider_id,$status,'delete');
	    
	}

	//edit footer menu view
	public function fedit_menu_view(){

	    //$status = $this->input->post('status');
	    $menu_id = $this->input->post('id');
	    $cond=array(
	    			'fmenu_id' => $menu_id
	    		);
	    $result['menu_data'] = $this->generic_model->get_record('fmenu',$cond);
	    $result['menu_id'] = $menu_id;

	    $condpagecont=array(
	    			'content_deleted' => '0',
	    			'content_status' => '1'
	    		);
	    
	    
	    $result['content_data'] = $this->generic_model->get_record('content',$condpagecont);

	    $condcont=array(
	    			'fmenu_deleted' => '0',
	    			'fmenu_id != ' => $menu_id
	    		);
	    
	    $result['menu_data_all'] = $this->generic_model->get_record('fmenu',$condcont);

	    $contentdata=$this->load->view('admin/adminfmenueditcontentview',$result,true);
	    echo $contentdata;
	    //$stat=$this->generic_model->update_status('slider',$slider_id,$status,'delete');
	    
	}


	public function contentpageedit(){
		
		$content_id = $this->input->post('id');
		    $content_data=array(
						        'content_page'=>trim($this->input->post('content_details_page')),
						        'content_modifiedon'=>date('Y-m-d H:i:s')
						    );
		
	    $stat=$this->generic_model->generic_update_tbl('content',$content_id,'content_id',$content_data);
	    $qry=$this->db->last_query();
	    /*echo $qry;
	    exit();*/
	    if($stat){
	    	$session_data = array(
					'message' => 'Content page has successfully been updated.'
					);
					
	    }else{
	    	$session_data = array(
					'message' => 'There went something wrong.'
					);
	    	
	    }
	    $this->session->set_userdata('content', $session_data);
	    redirect('admin/content/othercontentadd');
	    //$stat=$this->generic_model->update_status('slider',$slider_id,$status,'delete');
	    
	}

	public function contentmenuedit(){
		
		$menu_id = $this->input->post('id');
		    $content_data=array(
						        'menu_title'=>trim($this->input->post('menu_title')),
						        'menu_link'=>trim($this->input->post('menu_link')),
						        'menu_pid'=>trim($this->input->post('menu_pid')),
						        'menu_cid'=>trim($this->input->post('menu_cid')),
						        'menu_modifiedon'=>date('Y-m-d H:i:s')
						    );
		
	    $stat=$this->generic_model->generic_update_tbl('menu',$menu_id,'menu_id',$content_data);
	    $qry=$this->db->last_query();
	    /*echo $qry;
	    exit();*/
	    if($stat){
	    	$session_data = array(
					'message' => 'Menu has successfully been updated.'
					);
					
	    }else{
	    	$session_data = array(
					'message' => 'There went something wrong.'
					);
	    	
	    }
	    $this->session->set_userdata('content', $session_data);
	    redirect('admin/content/menu');
	    //$stat=$this->generic_model->update_status('slider',$slider_id,$status,'delete');
	    
	}

	//footer menu
	public function fcontentmenuedit(){
		
		$menu_id = $this->input->post('id');
		    $content_data=array(
						        'fmenu_title'=>trim($this->input->post('menu_title')),
						        'fmenu_link'=>trim($this->input->post('menu_link')),
						        'fmenu_pid'=>trim($this->input->post('menu_pid')),
						        'fmenu_cid'=>trim($this->input->post('menu_cid')),
						        'fmenu_modifiedon'=>date('Y-m-d H:i:s')
						    );
		
	    $stat=$this->generic_model->generic_update_tbl('fmenu',$menu_id,'fmenu_id',$content_data);
	    $qry=$this->db->last_query();
	    /*echo $qry;
	    exit();*/
	    if($stat){
	    	$session_data = array(
					'message' => 'Footer Menu has successfully been updated.'
					);
					
	    }else{
	    	$session_data = array(
					'message' => 'There went something wrong.'
					);
	    	
	    }
	    $this->session->set_userdata('content', $session_data);
	    redirect('admin/content/fmenu');
	    //$stat=$this->generic_model->update_status('slider',$slider_id,$status,'delete');
	    
	}

	public function getappointment()
	{
		//$result['home_content_data'] = $this->generic_model->get_record_oncontent('1');
		/*print '<pre>';
		print_r($result);
		print '</pre>';
		exit();	*/
		$condcontc=array(
	    			'appointment_type' => 'C'
	    		);
		$condconta=array(
	    			'appointment_type' => 'A'
	    		);
		
	    $result['appointment_data'] = $this->generic_model->get_record('appointment',$condconta);
	    $result['contacted_data'] = $this->generic_model->get_record('appointment',$condcontc);

	    
		$this->template->layout('admin','admincontentappointmentview',$result);
		//$this->load->view('admin/admincontentview');
	}


	public function getdetailappointment($id=false)
	{
		//$result['home_content_data'] = $this->generic_model->get_record_oncontent('1');
		/*print '<pre>';
		print_r($result);
		print '</pre>';
		exit();	*/
		$condcont=array(
	    			'appointment_id' => $id
	    		);
		
		
	    $result['appointment_data'] = $this->generic_model->get_record('appointment',$condcont);
	    /*print '<pre>';
	    print_r($result);
	    print '</pre>';*/
		$this->template->layout('admin','admincontentappointmentdetailview',$result);
		//$this->load->view('admin/admincontentview');
	}






	public function gethomecontent()
	{
		//$result['home_content_data'] = $this->generic_model->get_record_oncontent('1');
		/*print '<pre>';
		print_r($result);
		print '</pre>';
		exit();	*/

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

		$this->template->layout('admin','admincontenthomeview',$result);
		//$this->load->view('admin/admincontentview');
	}


	public function getothercontentsecond()
	{
		//$result['home_content_data'] = $this->generic_model->get_record_oncontent('1');
		/*print '<pre>';
		print_r($result);
		print '</pre>';
		exit();	*/

		$condlists=array(
	    			'content.content_page' => 'about',
	    			'other_content_lists.other_content_lists_deleted' => '0'
	    		);
		


	    $result['other_second_section_data'] = $this->generic_model->get_record_about('other_content_lists',$condlists);
	    
		$this->template->layout('admin','admincontentotherview',$result);
		//$this->load->view('admin/admincontentview');
	}



	public function getaboutcontent()
	{
		//$result['home_content_data'] = $this->generic_model->get_record_oncontent('1');
		/*print '<pre>';
		print_r($result);
		print '</pre>';
		exit();	*/

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




		/*$cond=array(
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
	    			'about_content_lists_cid' => '10',
	    			'about_content_lists_deleted' => '0'
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
	    		);*/




	    $result['about_first_section_data'] = $this->generic_model->get_record_about('about_content_lists',$condlists);
	    $result['about_second_section_data'] = $this->generic_model->get_record_about('about_content_images',$condimg);
	    $result['about_third_section_data'] = $this->generic_model->get_record_about('about_content_details',$condthird);
	    $result['about_fourth_section_data'] = $this->generic_model->get_record_about('about_content_imglists',$condimglists);
	    $result['about_fifth_section_data'] = $this->generic_model->get_record_about('about_content_details',$condfifth);



	    
	    /*$result['home_first_section_data'] = $this->generic_model->get_record('home_content_details',$cond);

	    $result['home_frst_section_data'] = $this->generic_model->get_record('home_content_details',$condfirst);
	    $result['home_second_section_data'] = $this->generic_model->get_record('home_content_details',$condsecond);
	    $result['home_fifth_section_data'] = $this->generic_model->get_record('home_content_details',$condfifth);

	    $result['home_third_section_data'] = $this->generic_model->get_record('home_content_images',$condimg);
	    $result['home_fourth_section_data'] = $this->generic_model->get_record('home_content_lists',$condlists);
	    $result['home_sixth_section_data'] = $this->generic_model->get_record('home_content_imglists',$condimglists);
	    $result['home_seventh_section_data'] = $this->generic_model->get_record('home_content_details',$condseventh);
	    $result['home_eighth_section_data'] = $this->generic_model->get_record('home_content_details',$condeighth);
	    $result['home_ninth_section_data'] = $this->generic_model->get_record('home_content_imglists_second',$condimglistssecond);
	    $result['home_tenth_section_data'] = $this->generic_model->get_record('home_content_details',$condtenth);*/

		$this->template->layout('admin','admincontentaboutview',$result);
		//$this->load->view('admin/admincontentview');
	}

	public function getnewscontent()
	{
		//$result['home_content_data'] = $this->generic_model->get_record_oncontent('1');
		/*print '<pre>';
		print_r($result);
		print '</pre>';
		exit();	*/
		
		$condimglists=array(
	    			'content.content_page' => 'about',
	    			'news_content_imglists.news_content_imglists_deleted' => '0'
	    		);
		
		
	    $result['about_fourth_section_data'] = $this->generic_model->get_record_about('about_content_imglists',$condimglists);

		$this->template->layout('admin','admincontentnewsview',$result);
		//$this->load->view('admin/admincontentview');
	}

	public function requestdistributor($contentdetailsId=false,$contentdetailsCid=false){

		/*$func='setsection'.$secId;
		$this->$func();*/
		$this->setpage($contentdetailsId,$contentdetailsCid);
		
	}

	public function requestdistributorgen($contactId=false){
		/*$func='setsection'.$contactId;
		$this->$func();*/
		$this->setgen($contactId);
		
	}

	public function requestdistributorsoc($contactId=false){
		/*$func='setsection'.$contactId;
		$this->$func();*/
		$this->setsoc($contactId);
		
	}

	public function setpage($contentdetailsId=false,$contentdetailsCid=false){

		if(!$contentdetailsId){
			$checkcontentstatus='101';
		}else if($contentdetailsId){
			$checkcontentstatus='102';
		}else{

		}
		

		if($checkcontentstatus=='101'){ //content home there in content table only
			//echo 'kjhkjhkkkooooo';exit();
			$content_details_data=array(
						        'content_details_cid'=>$contentdetailsCid,
						        'content_details_desc'=>trim($this->input->post('content_details_desc')),
						        'content_details_more_desc'=>trim($this->input->post('content_details_more_desc')),
						        'content_details_status'=>trim($this->input->post('content_details_status')),
						        'content_details_deleted'=>$this->input->post('content_details_deleted'),
						        'content_details_createdon'=>date('Y-m-d H:i:s'),
						        'content_details_modifiedon'=>'',
						        'content_details_deletedon'=>''
						    );
			$resultcontentdetails = $this->generic_model->generic_insert('content_details',$content_details_data);

			if($resultcontentdetails){
		    	$session_data = array(
						'message' => 'Content has successfully been added.'
						);
		    	$this->session->set_userdata('content', $session_data);
		    	//echo 'kjhkjhkkk';exit();
		    	redirect('admin/content/othercontentadd/');
					
		    }else{
		    	$session_data = array(
						'message' => 'There went something wrong.'
						);
		    	//$this->session->set_userdata('content', $session_data);
		    	$result['content']['message']=$session_data['message'];
		    	
		    	$this->template->layout('admin','admincontentotherviewaddedit',$result);
		    }

		}

		if($checkcontentstatus=='102'){ //content home and section there in content details table only
			//echo 'kjhkjhkkkyyyy';exit();
				$content_details_data=array(
							        'content_details_desc'=>trim($this->input->post('content_details_desc')),
							        'content_details_more_desc'=>trim($this->input->post('content_details_more_desc')),
							        'content_details_status'=>trim($this->input->post('content_details_status')),
							        'content_details_deleted'=>$this->input->post('content_details_deleted'),
							        'content_details_modifiedon'=>date('Y-m-d H:i:s')
							    );
	    
			    $resultcontentdetails=$this->generic_model->generic_update_tbl('content_details',$contentdetailsId,'content_details_id',$content_details_data); 
			    //$qry=$this->db->last_query();
			    /*echo $qry;
			    exit();*/

			    if($resultcontentdetails){
			    	$session_data = array(
							'message' => 'Content has successfully been updated.'
							);
			    	$this->session->set_userdata('content', $session_data);
			    	redirect('admin/content/othercontentadd/');
						
			    }else{
			    	$session_data = array(
							'message' => 'There went something wrong.'
							);
			    	//$this->session->set_userdata('content', $session_data);
			    	
			    	$result['content']['message']=$session_data['message'];
			    	$this->template->layout('admin','admincontentotherviewaddedit',$result);
			    }
	    
		}

		
	}

	public function setgen($contactId=false){

		if(!$contactId){
			$checkcontentstatus='101';
		}else if($contactId){
			$checkcontentstatus='102';
		}else{

		}
		

		if($checkcontentstatus=='101'){ //content home there in content table only
			//echo 'kjhkjhkkkooooo';exit();
			$contact_data=array(
						        'contact_addr'=>trim($this->input->post('contact_addr')),
						        'contact_email1'=>trim($this->input->post('contact_email1')),
						        'contact_email2'=>trim($this->input->post('contact_email2')),
						        'contact_phone'=>trim($this->input->post('contact_phone')),
						        'contact_mobile'=>trim($this->input->post('contact_mobile')),
						        'contact_fax'=>trim($this->input->post('contact_fax')),
						    );
			$resultcontentdetails = $this->generic_model->generic_insert('contact',$contact_data);

			if($resultcontentdetails){
		    	$session_data = array(
						'message' => 'Contact has successfully been added.'
						);
		    	$this->session->set_userdata('content', $session_data);
		    	//echo 'kjhkjhkkk';exit();
		    	redirect('admin/content/contactaddedit/');
					
		    }else{
		    	$session_data = array(
						'message' => 'There went something wrong.'
						);
		    	//$this->session->set_userdata('content', $session_data);
		    	$result['content']['message']=$session_data['message'];
		    	
		    	$this->template->layout('admin','admincontactviewaddedit',$result);
		    }

		}

		if($checkcontentstatus=='102'){ //content home and section there in content details table only
			//echo 'kjhkjhkkkyyyy';exit();
				$contact_data=array(
						        'contact_addr'=>trim($this->input->post('contact_addr')),
						        'contact_email1'=>trim($this->input->post('contact_email1')),
						        'contact_email2'=>trim($this->input->post('contact_email2')),
						        'contact_phone'=>trim($this->input->post('contact_phone')),
						        'contact_mobile'=>trim($this->input->post('contact_mobile')),
						        'contact_fax'=>trim($this->input->post('contact_fax')),
						    );
	    
			    $resultcontentdetails=$this->generic_model->generic_update_tbl('contact',$contactId,'contact_id',$contact_data); 
			    //$qry=$this->db->last_query();
			    /*echo $qry;
			    exit();*/

			    if($resultcontentdetails){
			    	$session_data = array(
							'message' => 'Contact has successfully been updated.'
							);
			    	$this->session->set_userdata('content', $session_data);
			    	redirect('admin/content/contactaddedit/');
						
			    }else{
			    	$session_data = array(
							'message' => 'There went something wrong.'
							);
			    	//$this->session->set_userdata('content', $session_data);
			    	
			    	$result['content']['message']=$session_data['message'];
			    	$this->template->layout('admin','admincontactviewaddedit',$result);
			    }
	    
		}

		
	}

	public function setsoc($contactId=false){

		if(!$contactId){
			$checkcontentstatus='101';
		}else if($contactId){
			$checkcontentstatus='102';
		}else{

		}
		

		if($checkcontentstatus=='101'){ //content home there in content table only
			//echo 'kjhkjhkkkooooo';exit();
			$contact_data=array(
						        'contact_fb'=>trim($this->input->post('contact_fb')),
						        'contact_twt'=>trim($this->input->post('contact_twt')),
						        'contact_ins'=>trim($this->input->post('contact_ins')),
						        'contact_lnk'=>trim($this->input->post('contact_lnk')),
						        'contact_youtb'=>trim($this->input->post('contact_youtb')),
						        'contact_sitelogo'=>trim($this->input->post('contact_sitelogo'))
						    );
			$resultcontentdetails = $this->generic_model->generic_insert('contact',$contact_data);

			if($resultcontentdetails){
		    	$session_data = array(
						'message' => 'Social has successfully been added.'
						);
		    	$this->session->set_userdata('content', $session_data);
		    	//echo 'kjhkjhkkk';exit();
		    	redirect('admin/content/socialaddedit/');
					
		    }else{
		    	$session_data = array(
						'message' => 'There went something wrong.'
						);
		    	//$this->session->set_userdata('content', $session_data);
		    	$result['content']['message']=$session_data['message'];
		    	
		    	$this->template->layout('admin','adminsocialviewaddedit',$result);
		    }

		}

		if($checkcontentstatus=='102'){ //content home and section there in content details table only
			//echo 'kjhkjhkkkyyyy';exit();
				$contact_data=array(
						        'contact_fb'=>trim($this->input->post('contact_fb')),
						        'contact_twt'=>trim($this->input->post('contact_twt')),
						        'contact_ins'=>trim($this->input->post('contact_ins')),
						        'contact_lnk'=>trim($this->input->post('contact_lnk')),
						        'contact_youtb'=>trim($this->input->post('contact_youtb')),
						        'contact_sitelogo'=>trim($this->input->post('contact_sitelogo'))
						    );
	    
			    $resultcontentdetails=$this->generic_model->generic_update_tbl('contact',$contactId,'contact_id',$contact_data); 
			    //$qry=$this->db->last_query();
			    /*echo $qry;
			    exit();*/

			    if($resultcontentdetails){
			    	$session_data = array(
							'message' => 'Social has successfully been updated.'
							);
			    	$this->session->set_userdata('content', $session_data);
			    	redirect('admin/content/socialaddedit/');
						
			    }else{
			    	$session_data = array(
							'message' => 'There went something wrong.'
							);
			    	//$this->session->set_userdata('content', $session_data);
			    	
			    	$result['content']['message']=$session_data['message'];
			    	$this->template->layout('admin','adminsocialviewaddedit',$result);
			    }
	    
		}

		
	}


	public function otherdistributor($secId=false){

		/*$func='setsection'.$secId;
		$this->$func();*/
		switch ($secId) {
        
	        case 2:
	            $this->setotherssection1($secId);
	            break;
	        
	        default:
	        		$session_data = array(
								'message' => 'Unknown distributor access.'
								);
			    	$result['content']['message']=$session_data['message'];
			    	//$this->session->set_userdata('content', $session_data);
			    	$this->template->layout('admin','admincontentotherviewaddedit',$result);
	        	break;
        }
	}


	public function aboutdistributor($secId=false){

		/*$func='setsection'.$secId;
		$this->$func();*/
		switch ($secId) {
        
	        case 1:
	            $this->setaboutsection1($secId);
	            break;
	        case 2:
	            $this->setaboutsection2($secId);
	            break;
	        case 3:
	            $this->setaboutsection3($secId);
	            break;
	        case 4:
	            $this->setaboutsection4($secId);
	            break;
	        case 5:
	            $this->setaboutsection5($secId);
	            break;
	        default:
	        		$session_data = array(
								'message' => 'Unknown distributor access.'
								);
			    	$result['content']['message']=$session_data['message'];
			    	//$this->session->set_userdata('content', $session_data);
			    	$this->template->layout('admin','admincontentaboutviewaddedit',$result);
	        	break;
        }
	}




	public function newsdistributor($secId=false){

		/*$func='setsection'.$secId;
		$this->$func();*/
		switch ($secId) {
        
	        case 1:
	            $this->setnewssection1($secId);
	            break;
	        
	        default:
	        		$session_data = array(
								'message' => 'Unknown distributor access.'
								);
			    	$result['content']['message']=$session_data['message'];
			    	//$this->session->set_userdata('content', $session_data);
			    	$this->template->layout('admin','admincontentnewsviewaddedit',$result);
	        	break;
        }
	}


	public function setnewssection1($secId=false){


		if(!empty($this->input->post('listid'))){
			$listid=$this->input->post('listid');
		}
		$checkcontentres=$this->generic_model->check_content_news_lists('news',$secId,'news_content_imglists',$listid);
		
		$checkcontentstatus=(!empty($checkcontentres['result']['statusid'])) ? $checkcontentres['result']['statusid'] : '';
		$content_details_id=(!empty($checkcontentres['result']['cdid'])) ? $checkcontentres['result']['cdid'] : '';
		$content_id=(!empty($checkcontentres['result']['cid'])) ? $checkcontentres['result']['cid'] : '';
		/*echo $content_details_id;
		exit();*/

		$data=array();
		$filename='';
		$content_data=array();
		$content_details_data=array();
		//$content_details_id = $this->input->post('cdid');
		if(!empty($_FILES['userfile']['name']) && $checkcontentstatus != ''){
			$config = array(
			'upload_path' => "./uploads/",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'overwrite' => TRUE,
			'encrypt_name' => TRUE,
			'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' => "975",
			'max_width' => "1920"
			);
			
			$this->load->library('upload', $config);
			if($this->upload->do_upload())
			{
				$data = array('upload_data' => $this->upload->data());
				$filename=$data['upload_data']['file_name'];

			}
		}

		if($checkcontentstatus=='101'){ //content home there in content table only

			$content_details_data=array(
						        'news_content_imglists_cid'=>$content_id,
						        'news_content_imglists_title'=>trim($this->input->post('content_details_title')),
						        'news_content_imglists_desc'=>trim($this->input->post('content_details_desc')),
						        
						        'news_content_imglists_filename'=>$filename,

						        'news_content_imglists_section'=>$secId,
						        'news_content_imglists_listid'=>$listid,
						        'news_content_imglists_status'=>trim($this->input->post('content_details_status')),
						        'news_content_imglists_deleted'=>$this->input->post('content_details_deleted'),
						        'news_content_imglists_createdon'=>date('Y-m-d H:i:s'),
						        'news_content_imglists_modifiedon'=>'',
						        'news_content_imglists_deletedon'=>''
						    );
			$resultcontentdetails = $this->generic_model->generic_insert('news_content_imglists',$content_details_data);

			if($resultcontentdetails){
		    	$session_data = array(
						'message' => 'Content has successfully been added.'
						);
		    	$this->session->set_userdata('content', $session_data);
		    	redirect('admin/content/newscontentadd/6');
					
		    }else{
		    	$session_data = array(
						'message' => 'There went something wrong.'
						);
		    	//$this->session->set_userdata('content', $session_data);
		    	$result['content']['message']=$session_data['message'];
		    	$this->template->layout('admin','admincontentnewsviewaddedit',$result);
		    }

		}

		if($checkcontentstatus=='102'){ //content home and section there in content details table only
				if(!empty($filename)){
					$content_details_data=array(
							        
							        'news_content_imglists_title'=>trim($this->input->post('content_details_title')),
							        'news_content_imglists_desc'=>trim($this->input->post('content_details_desc')),

							        'news_content_imglists_filename'=>$filename,

							        'news_content_imglists_status'=>trim($this->input->post('content_details_status')),
							        'news_content_imglists_deleted'=>$this->input->post('content_details_deleted'),
							        'news_content_imglists_modifiedon'=>date('Y-m-d H:i:s')
							    );
				}else{
					$content_details_data=array(
							        
							        'news_content_imglists_title'=>trim($this->input->post('content_details_title')),
							        'news_content_imglists_desc'=>trim($this->input->post('content_details_desc')),

							        'news_content_imglists_status'=>trim($this->input->post('content_details_status')),
							        'news_content_imglists_deleted'=>$this->input->post('content_details_deleted'),
							        'news_content_imglists_modifiedon'=>date('Y-m-d H:i:s')
							    );
				}
				
	    
			    $resultcontentdetails=$this->generic_model->generic_update_tbl('news_content_imglists',$content_details_id,'news_content_imglists_id',$content_details_data); 
			    //$qry=$this->db->last_query();
			    /*echo $qry;
			    exit();*/

			    if($resultcontentdetails){
			    	$session_data = array(
							'message' => 'Content has successfully been updated.'
							);
			    	$this->session->set_userdata('content', $session_data);
			    	redirect('admin/content/newscontentadd/6');
						
			    }else{
			    	$session_data = array(
							'message' => 'There went something wrong.'
							);
			    	//$this->session->set_userdata('content', $session_data);
			    	$cond=array(
		    			'news_content_imglists_cid' => '10',
		    			'news_content_imglists_section' => '6'
		    		);
		    		$result['news_fourth_section_data'] = $this->generic_model->get_record('news_content_imglists',$cond);

			    	$result['content']['message']=$session_data['message'];
			    	$this->template->layout('admin','admincontentnewsviewaddedit',$result);
			    }
	    
		}

		if($checkcontentstatus=='100'){ //content neither home nor section there in content details table only

			
			$content_data=array(
						        'content_page'=>trim($this->input->post('page')),
						        'content_status'=>'1',
						        'content_deleted'=>'0',
						        'content_createdon'=>date('Y-m-d H:i:s'),
						        'content_modifiedon'=>'',
						        'content_deletedon'=>''
						    );
			
			$resultcontent = $this->generic_model->generic_insert('content',$content_data);
			$insert_id = $this->db->insert_id();

			$content_details_data=array(
						        'news_content_imglists_cid'=>trim($insert_id),
						        'news_content_imglists_title'=>trim($this->input->post('content_details_title')),
						        'news_content_imglists_desc'=>trim($this->input->post('content_details_desc')),
						        
						        'news_content_imglists_filename'=>$filename,

						        'news_content_imglists_section'=>$secId,
						        'news_content_imglists_listid'=>$listid,
						        'news_content_imglists_status'=>trim($this->input->post('content_details_status')),
						        'news_content_imglists_deleted'=>$this->input->post('content_details_deleted'),
						        'news_content_imglists_createdon'=>date('Y-m-d H:i:s'),
						        'news_content_imglists_modifiedon'=>'',
						        'news_content_imglists_deletedon'=>''
						    );
			$resultcontentdetails = $this->generic_model->generic_insert('news_content_imglists',$content_details_data);
			//$result['home_content_data'] = $this->generic_model->get_record_oncontent('1');

			if($resultcontentdetails){
		    	$session_data = array(
						'message' => 'Content has successfully been added.'
						);
		    	$this->session->set_userdata('content', $session_data);
		    	redirect('admin/content/newscontentadd/6');
					
		    }else{
		    	$session_data = array(
						'message' => 'There went something wrong.'
						);
		    	$result['content']['message']=$session_data['message'];
		    	$cond=array(
	    			'news_content_imglists_cid' => '10',
	    			'news_content_imglists_section' => '6'
	    		);
	    		$result['news_fourth_section_data'] = $this->generic_model->get_record('news_content_imglists',$cond);
		    	$this->session->set_userdata('content', $session_data);
		    	$this->template->layout('admin','admincontentnewsviewaddedit',$result);
		    }
		}


	}	




	public function setotherssection1($secId=false){
		//echo 'abc';exit();
		if(!empty($this->input->post('listid'))){
			$listid=$this->input->post('listid');
		}
		$pageId=$this->input->post('content_details_lists_cid');
		$checkcontentres=$this->generic_model->check_content_amnetis_lists($pageId,$secId,'other_content_lists',$listid);
		/*echo $this->db->last_query();
		print '<pre>';
		print_r($checkcontentres);
		print '</pre>';
		print '<pre>';
		print_r($_POST);
		print '</pre>';
		exit();*/
		
		$checkcontentstatus=(!empty($checkcontentres['result']['statusid'])) ? $checkcontentres['result']['statusid'] : '';
		$content_details_id=(!empty($checkcontentres['result']['cdid'])) ? $checkcontentres['result']['cdid'] : '';
		$content_id=(!empty($checkcontentres['result']['cid'])) ? $checkcontentres['result']['cid'] : '';
		/*echo $checkcontentstatus;
		exit();*/

		//for image upload
		$data=array();
		$filename='';
		$content_data=array();
		$content_details_data=array();
		//$content_details_id = $this->input->post('cdid');
		if(!empty($_FILES['userfile']['name']) && $checkcontentstatus != ''){
			$config = array(
			'upload_path' => "./uploads/",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'overwrite' => TRUE,
			'encrypt_name' => TRUE,
			'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' => "975",
			'max_width' => "1920"
			);
			
			$this->load->library('upload', $config);
			if($this->upload->do_upload())
			{
				$data = array('upload_data' => $this->upload->data());
				$filename=$data['upload_data']['file_name'];

			}
		}




		if($checkcontentstatus=='101'){ //content home there in content table only

			$content_details_data=array(
						        'other_content_lists_cid'=>$content_id,
						        'other_content_lists_title'=>trim($this->input->post('content_details_title')),
						        'other_content_lists_desc'=>trim($this->input->post('content_details_desc')),
						        'other_content_lists_readmore'=>trim($this->input->post('content_details_readmore')),
						        'other_content_lists_section'=>$secId,
						        'other_content_lists_listid'=>$listid,
						        'other_content_lists_status'=>trim($this->input->post('content_details_status')),
						        'other_content_lists_deleted'=>$this->input->post('content_details_deleted'),
						        'other_content_lists_createdon'=>date('Y-m-d H:i:s'),
						        'other_content_lists_modifiedon'=>'',
						        'other_content_lists_deletedon'=>''
						    );
			if(!empty($filename)){
				$content_details_data['other_content_lists_filename']=$filename;
			}
			$resultcontentdetails = $this->generic_model->generic_insert('other_content_lists',$content_details_data);

			if($resultcontentdetails){
		    	$session_data = array(
							'message' => 'Content has successfully been added.'
						);
		    	$this->session->set_userdata('content', $session_data);
		    	redirect('admin/content/othercontentadd');
					
		    }else{
		    	$session_data = array(
							'message' => 'There went something wrong.'
						);
		    	//$this->session->set_userdata('content', $session_data);
		    	$result['content']['message']=$session_data['message'];
		    	$this->template->layout('admin','admincontentotherviewaddedit',$result);
		    }

		}

		if($checkcontentstatus=='102'){ //content home and section there in content details table only

				$content_details_data=array(
							        
							        'other_content_lists_title'=>trim($this->input->post('content_details_title')),
							        'other_content_lists_desc'=>trim($this->input->post('content_details_desc')),
							        
							        'other_content_lists_readmore'=>trim($this->input->post('content_details_readmore')),
							        'other_content_lists_status'=>trim($this->input->post('content_details_status')),
							        'other_content_lists_deleted'=>$this->input->post('content_details_deleted'),
							        'other_content_lists_modifiedon'=>date('Y-m-d H:i:s')
							    );

				if(!empty($filename)){
					$content_details_data['other_content_lists_filename']=$filename;
				}
	    
			    $resultcontentdetails=$this->generic_model->generic_update_tbl('other_content_lists',$content_details_id,'other_content_lists_id',$content_details_data); 
			    
			    $qry=$this->db->last_query();
			    
			    /*echo $qry;
			    exit();*/

			    if($resultcontentdetails){
			    	$session_data = array(
							'message' => 'Content has successfully been updated.'
							);
			    	$this->session->set_userdata('content', $session_data);
			    	redirect('admin/content/othercontentadd');
						
			    }else{
			    	$session_data = array(
							'message' => 'There went something wrong.'
							);
			    	//$this->session->set_userdata('content', $session_data);
			    	/*$cond=array(
		    			'about_content_lists_cid' => '10',
		    			'about_content_lists_section' => '4'
		    		);
		    		$result['about_first_section_data'] = $this->generic_model->get_record('first_content_lists',$cond);*/

			    	$result['content']['message']=$session_data['message'];
			    	$this->template->layout('admin','admincontentotherviewaddedit',$result);
			    }
	    
		}

		if($checkcontentstatus=='100'){ //content neither home nor section there in content details table only

			
			$content_data=array(
						        'content_page'=>trim($this->input->post('page')),
						        'content_status'=>'1',
						        'content_deleted'=>'0',
						        'content_createdon'=>date('Y-m-d H:i:s'),
						        'content_modifiedon'=>'',
						        'content_deletedon'=>''
						    );
			
			$resultcontent = $this->generic_model->generic_insert('content',$content_data);
			$insert_id = $this->db->insert_id();

			$content_details_data=array(
						        'other_content_lists_cid'=>trim($insert_id),
						        'other_content_lists_title'=>trim($this->input->post('content_details_title')),
						        'other_content_lists_desc'=>trim($this->input->post('content_details_desc')),
						        'other_content_lists_readmore'=>trim($this->input->post('content_details_readmore')),
						        'other_content_lists_section'=>$secId,
						        'other_content_lists_listid'=>$listid,
						        'other_content_lists_status'=>trim($this->input->post('content_details_status')),
						        'other_content_lists_deleted'=>$this->input->post('content_details_deleted'),
						        'other_content_lists_createdon'=>date('Y-m-d H:i:s'),
						        'other_content_lists_modifiedon'=>'',
						        'other_content_lists_deletedon'=>''
						    );
			if(!empty($filename)){
				$content_details_data['other_content_lists_filename']=$filename;
			}
			
			$resultcontentdetails = $this->generic_model->generic_insert('other_content_lists',$content_details_data);
			//$result['home_content_data'] = $this->generic_model->get_record_oncontent('1');

			if($resultcontentdetails){
		    	$session_data = array(
						'message' => 'Content has successfully been added.'
						);
		    	$this->session->set_userdata('content', $session_data);
		    	redirect('admin/content/othercontentadd');
					
		    }else{
		    	$session_data = array(
						'message' => 'There went something wrong.'
						);
		    	$result['content']['message']=$session_data['message'];
		    	/*$cond=array(
	    			'other_content_lists_cid' => '10',
	    			'other_content_lists_section' => '2'
	    		);
	    		$result['other_first_section_data'] = $this->generic_model->get_record('other_content_lists',$cond);*/
		    	$this->session->set_userdata('content', $session_data);
		    	$this->template->layout('admin','admincontentotherviewaddedit',$result);
		    }
		}
	}

	public function setaboutsection1($secId=false){
		//echo 'abc'.exit();
		if(!empty($this->input->post('listid'))){
			$listid=$this->input->post('listid');
		}
		$checkcontentres=$this->generic_model->check_content_about_lists('about',$secId,'about_content_lists',$listid);
		
		$checkcontentstatus=(!empty($checkcontentres['result']['statusid'])) ? $checkcontentres['result']['statusid'] : '';
		$content_details_id=(!empty($checkcontentres['result']['cdid'])) ? $checkcontentres['result']['cdid'] : '';
		$content_id=(!empty($checkcontentres['result']['cid'])) ? $checkcontentres['result']['cid'] : '';
		/*echo $checkcontentstatus;
		exit();*/

		if($checkcontentstatus=='101'){ //content home there in content table only

			$content_details_data=array(
						        'about_content_lists_cid'=>$content_id,
						        'about_content_lists_title'=>trim($this->input->post('content_details_title')),
						        'about_content_lists_desc'=>trim($this->input->post('content_details_desc')),
						        'about_content_lists_readmore'=>trim($this->input->post('content_details_readmore')),
						        'about_content_lists_section'=>$secId,
						        'about_content_lists_listid'=>$listid,
						        'about_content_lists_status'=>trim($this->input->post('content_details_status')),
						        'about_content_lists_deleted'=>$this->input->post('content_details_deleted'),
						        'about_content_lists_createdon'=>date('Y-m-d H:i:s'),
						        'about_content_lists_modifiedon'=>'',
						        'about_content_lists_deletedon'=>''
						    );
			$resultcontentdetails = $this->generic_model->generic_insert('about_content_lists',$content_details_data);

			if($resultcontentdetails){
		    	$session_data = array(
						'message' => 'Content has successfully been added.'
						);
		    	$this->session->set_userdata('content', $session_data);
		    	redirect('admin/content/aboutcontentadd/4');
					
		    }else{
		    	$session_data = array(
						'message' => 'There went something wrong.'
						);
		    	//$this->session->set_userdata('content', $session_data);
		    	$result['content']['message']=$session_data['message'];
		    	$this->template->layout('admin','admincontentaboutviewaddedit',$result);
		    }

		}

		if($checkcontentstatus=='102'){ //content home and section there in content details table only

				$content_details_data=array(
							        
							        'about_content_lists_title'=>trim($this->input->post('content_details_title')),
							        'about_content_lists_desc'=>trim($this->input->post('content_details_desc')),
							        'about_content_lists_readmore'=>trim($this->input->post('content_details_readmore')),
							        'about_content_lists_status'=>trim($this->input->post('content_details_status')),
							        'about_content_lists_deleted'=>$this->input->post('content_details_deleted'),
							        'about_content_lists_modifiedon'=>date('Y-m-d H:i:s')
							    );
	    
			    $resultcontentdetails=$this->generic_model->generic_update_tbl('about_content_lists',$content_details_id,'about_content_lists_id',$content_details_data); 
			    $qry=$this->db->last_query();
			    /*echo $qry;
			    exit();*/

			    if($resultcontentdetails){
			    	$session_data = array(
							'message' => 'Content has successfully been updated.'
							);
			    	$this->session->set_userdata('content', $session_data);
			    	redirect('admin/content/aboutcontentadd/4');
						
			    }else{
			    	$session_data = array(
							'message' => 'There went something wrong.'
							);
			    	//$this->session->set_userdata('content', $session_data);
			    	$cond=array(
		    			'about_content_lists_cid' => '10',
		    			'about_content_lists_section' => '4'
		    		);
		    		$result['about_first_section_data'] = $this->generic_model->get_record('first_content_lists',$cond);

			    	$result['content']['message']=$session_data['message'];
			    	$this->template->layout('admin','admincontentaboutviewaddedit',$result);
			    }
	    
		}

		if($checkcontentstatus=='100'){ //content neither home nor section there in content details table only

			
			$content_data=array(
						        'content_page'=>trim($this->input->post('page')),
						        'content_status'=>'1',
						        'content_deleted'=>'0',
						        'content_createdon'=>date('Y-m-d H:i:s'),
						        'content_modifiedon'=>'',
						        'content_deletedon'=>''
						    );
			
			$resultcontent = $this->generic_model->generic_insert('content',$content_data);
			$insert_id = $this->db->insert_id();

			$content_details_data=array(
						        'about_content_lists_cid'=>trim($insert_id),
						        'about_content_lists_title'=>trim($this->input->post('content_details_title')),
						        'about_content_lists_desc'=>trim($this->input->post('content_details_desc')),
						        'about_content_lists_readmore'=>trim($this->input->post('content_details_readmore')),
						        'about_content_lists_section'=>$secId,
						        'about_content_lists_listid'=>$listid,
						        'about_content_lists_status'=>trim($this->input->post('content_details_status')),
						        'about_content_lists_deleted'=>$this->input->post('content_details_deleted'),
						        'about_content_lists_createdon'=>date('Y-m-d H:i:s'),
						        'about_content_lists_modifiedon'=>'',
						        'about_content_lists_deletedon'=>''
						    );
			$resultcontentdetails = $this->generic_model->generic_insert('about_content_lists',$content_details_data);
			//$result['home_content_data'] = $this->generic_model->get_record_oncontent('1');

			if($resultcontentdetails){
		    	$session_data = array(
						'message' => 'Content has successfully been added.'
						);
		    	$this->session->set_userdata('content', $session_data);
		    	redirect('admin/content/aboutcontentadd/4');
					
		    }else{
		    	$session_data = array(
						'message' => 'There went something wrong.'
						);
		    	$result['content']['message']=$session_data['message'];
		    	$cond=array(
	    			'about_content_lists_cid' => '10',
	    			'about_content_lists_section' => '4'
	    		);
	    		$result['about_first_section_data'] = $this->generic_model->get_record('about_content_lists',$cond);
		    	$this->session->set_userdata('content', $session_data);
		    	$this->template->layout('admin','admincontentaboutviewaddedit',$result);
		    }
		}
	}

	public function setaboutsection2($secId=false){
		$checkcontentres=$this->generic_model->check_content_about('about',$secId,'about_content_images');
		
		$checkcontentstatus=(!empty($checkcontentres['result']['statusid'])) ? $checkcontentres['result']['statusid'] : '';
		$content_details_id=(!empty($checkcontentres['result']['cdid'])) ? $checkcontentres['result']['cdid'] : '';
		$content_id=(!empty($checkcontentres['result']['cid'])) ? $checkcontentres['result']['cid'] : '';

		/*echo "contentid: ".$content_id."status: ".$checkcontentstatus;
		exit();*/
		/*echo 'oiuoiuoiu '.$checkcontentstatus;
		exit();*/
		/*print '<pre>';
		print_r($_FILES);
		print '</pre>';
		exit();*/

		$data=array();
		$filename='';
		$content_data=array();
		$content_details_data=array();
		//$content_details_id = $this->input->post('cdid');
		if(!empty($_FILES['userfile']['name'])){
			$config = array(
			'upload_path' => "./uploads/",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'overwrite' => TRUE,
			'encrypt_name' => TRUE,
			'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' => "975",
			'max_width' => "1920"
			);
			
			$this->load->library('upload', $config);
			if($this->upload->do_upload())
			{
				$data = array('upload_data' => $this->upload->data());
				$filename=$data['upload_data']['file_name'];

			}
		}

			if($checkcontentstatus=='101'){ //content home there in content table only

				$content_details_images_data=array(
							        'about_content_images_cid'=>$content_id,
							        'about_content_images_filename'=>$filename,
							        'about_content_images_title'=>trim($this->input->post('content_details_title')),
							        'about_content_images_description'=>trim($this->input->post('content_details_desc')),
							        'about_content_images_link'=>trim($this->input->post('content_details_link')),
							        'about_content_images_section'=>$secId,
							        'about_content_images_status'=>trim($this->input->post('content_details_status')),
							        'about_content_images_deleted'=>'0',
							        'about_content_images_createdon'=>date('Y-m-d H:i:s'),
							        'about_content_images_modifiedon'=>'',
							        'about_content_images_deletedon'=>''
							    );

				$resultcontentimagedetails = $this->generic_model->generic_insert('about_content_images',$content_details_images_data);

				if($resultcontentimagedetails){
			    	$session_data = array(
							'message' => 'Content has successfully been added.'
							);
			    	$this->session->set_userdata('content', $session_data);
			    	redirect('admin/content/aboutcontentadd/3');
						
			    }else{
			    	$session_data = array(
							'message' => 'There went something wrong.'
							);
			    	//$this->session->set_userdata('content', $session_data);
			    	$result['content']['message']=$session_data['message'];
			    	$this->template->layout('admin','admincontentaboutviewaddedit',$result);
			    }

			}

			if($checkcontentstatus=='102'){ //content home and section there in content details table only
					if(!empty($filename)){
						$content_details_images_data=array(
												        'about_content_images_filename'=>$filename,
												        'about_content_images_title'=>trim($this->input->post('content_details_title')),
												        'about_content_images_description'=>trim($this->input->post('content_details_desc')),
												        'about_content_images_link'=>trim($this->input->post('content_details_link')),
												        'about_content_images_status'=>trim($this->input->post('content_details_status')),
												        'about_content_images_modifiedon'=>date('Y-m-d H:i:s'),
												    );

					}else{
						$content_details_images_data=array(
												        'about_content_images_title'=>trim($this->input->post('content_details_title')),
												        'about_content_images_description'=>trim($this->input->post('content_details_desc')),
												        'about_content_images_link'=>trim($this->input->post('content_details_link')),
												        'about_content_images_status'=>trim($this->input->post('content_details_status')),
												        'about_content_images_modifiedon'=>date('Y-m-d H:i:s'),
												    );
					}
					

					
		    
				    $resultcontentimagedetails=$this->generic_model->generic_update_tbl('about_content_images',$content_details_id,'about_content_images_id',$content_details_images_data);
				    
				    /*echo 'uuuuuuuuuuuuuuuuuu '.$filename;
				    $qry=$this->db->last_query();
				    echo $qry;
				    exit();*/

				    if($resultcontentimagedetails){
				    	$session_data = array(
								'message' => 'Content has successfully been updated.'
								);
				    	$this->session->set_userdata('content', $session_data);
				    	redirect('admin/content/aboutcontentadd/3');
							
				    }else{
				    	$session_data = array(
								'message' => 'There went something wrong.'
								);
				    	//$this->session->set_userdata('content', $session_data);
				    	/*$cond=array(
			    			'about_content_images_cid' => '10',
			    			'about_content_images_section' => '3'
			    		);
			    		$result['about_second_section_data'] = $this->generic_model->get_record('about_content_images',$cond);*/

				    	$result['content']['message']=$session_data['message'];
				    	$this->template->layout('admin','admincontentaboutviewaddedit',$result);
				    }
		    
			}

			if($checkcontentstatus=='100'){ //content neither home nor section there in content details table only

				
				$content_data=array(
							        'content_page'=>'home',
							        'content_status'=>'1',
							        'content_deleted'=>'0',
							        'content_createdon'=>date('Y-m-d H:i:s'),
							        'content_modifiedon'=>'',
							        'content_deletedon'=>''
							    );
				
				$resultcontent = $this->generic_model->generic_insert('content',$content_data);
				$insert_id = $this->db->insert_id();

				$content_details_images_data=array(
							        'about_content_images_cid'=>'10',
							        'about_content_images_filename'=>$filename,
							        'about_content_images_title'=>trim($this->input->post('content_details_title')),
							        'about_content_images_description'=>trim($this->input->post('content_details_desc')),
							        'about_content_images_link'=>trim($this->input->post('content_details_link')),
							        'about_content_images_section'=>$secId,
							        'about_content_images_status'=>trim($this->input->post('content_details_status')),
							        'about_content_images_deleted'=>'0',
							        'about_content_images_createdon'=>date('Y-m-d H:i:s'),
							        'about_content_images_modifiedon'=>'',
							        'about_content_images_deletedon'=>''
							    );
				$resultcontentimagedetails = $this->generic_model->generic_insert('about_content_images',$content_details_images_data);
				//$result['home_content_data'] = $this->generic_model->get_record_oncontent('1');

				if($resultcontentimagedetails){
			    	$session_data = array(
							'message' => 'Content has successfully been added.'
							);
			    	$this->session->set_userdata('content', $session_data);
			    	redirect('admin/content/aboutcontentadd/3');
						
			    }else{
			    	$session_data = array(
							'message' => 'There went something wrong.'
							);
			    	$result['content']['message']=$session_data['message'];
			    	$cond=array(
		    			'about_content_images_cid' => '10',
		    			'about_content_images_section' => '3'
		    		);
		    		$result['about_second_section_data'] = $this->generic_model->get_record('about_content_images',$cond);
			    	$this->session->set_userdata('content', $session_data);
			    	$this->template->layout('admin','admincontentaboutviewaddedit',$result);
			    }
			}
		
	}

	public function setaboutsection3($secId=false){
		$checkcontentres=$this->generic_model->check_content_about('about',$secId,'about_content_details');
		
		$checkcontentstatus=(!empty($checkcontentres['result']['statusid'])) ? $checkcontentres['result']['statusid'] : '';
		$content_details_id=(!empty($checkcontentres['result']['cdid'])) ? $checkcontentres['result']['cdid'] : '';
		$content_id=(!empty($checkcontentres['result']['cid'])) ? $checkcontentres['result']['cid'] : '';
		/*echo "contentid: ".$content_id."status: ".$checkcontentstatus;
		exit();*/
		/*echo $content_details_id;
		exit();*/

		if($checkcontentstatus=='101'){ //content home there in content table only

			$content_details_data=array(
						        'about_content_details_cid'=>$content_id,
						        'about_content_details_title'=>trim($this->input->post('content_details_title')),
						        'about_content_details_desc'=>trim($this->input->post('content_details_desc')),
						        'about_content_details_section'=>$secId,
						        'about_content_details_status'=>'1',
						        'about_content_details_deleted'=>'0',
						        'about_content_details_createdon'=>date('Y-m-d H:i:s'),
						        'about_content_details_modifiedon'=>'',
						        'about_content_details_deletedon'=>''
						    );
			$resultcontentdetails = $this->generic_model->generic_insert('about_content_details',$content_details_data);

			if($resultcontentdetails){
		    	$session_data = array(
						'message' => 'Content has successfully been added.'
						);
		    	$this->session->set_userdata('content', $session_data);
		    	redirect('admin/content/aboutcontentadd/2');
					
		    }else{
		    	$session_data = array(
						'message' => 'There went something wrong.'
						);
		    	//$this->session->set_userdata('content', $session_data);
		    	$result['content']['message']=$session_data['message'];
		    	$this->template->layout('admin','admincontentaboutviewaddedit',$result);
		    }

		}

		if($checkcontentstatus=='102'){ //content home and section there in content details table only

				$content_details_data=array(
							        
							        'about_content_details_title'=>trim($this->input->post('content_details_title')),
							        'about_content_details_desc'=>trim($this->input->post('content_details_desc')),
							        'about_content_details_modifiedon'=>date('Y-m-d H:i:s')
							    );
	    
			    $resultcontentdetails=$this->generic_model->generic_update_tbl('about_content_details',$content_details_id,'about_content_details_id',$content_details_data); 
			    $qry=$this->db->last_query();
			    /*echo $qry;
			    exit();*/

			    if($resultcontentdetails){
			    	$session_data = array(
							'message' => 'Content has successfully been updated.'
							);
			    	$this->session->set_userdata('content', $session_data);
			    	redirect('admin/content/aboutcontentadd/2');
						
			    }else{
			    	$session_data = array(
							'message' => 'There went something wrong.'
							);
			    	//$this->session->set_userdata('content', $session_data);
			    	/*$cond=array(
		    			'about_content_details_cid' => '10',
		    			'about_content_details_section' => '1'
		    		);
		    		$result['about_third_section_data'] = $this->generic_model->get_record('about_content_details',$cond);*/

			    	$result['content']['message']=$session_data['message'];
			    	$this->template->layout('admin','admincontentaboutviewaddedit',$result);
			    }
	    
		}

		if($checkcontentstatus=='100'){ //content neither home nor section there in content details table only

			
			$content_data=array(
						        'content_page'=>trim($this->input->post('page')),
						        'content_status'=>'1',
						        'content_deleted'=>'0',
						        'content_createdon'=>date('Y-m-d H:i:s'),
						        'content_modifiedon'=>'',
						        'content_deletedon'=>''
						    );
			
			$resultcontent = $this->generic_model->generic_insert('content',$content_data);
			$insert_id = $this->db->insert_id();

			$content_details_data=array(
						        'about_content_details_cid'=>trim($insert_id),
						        'about_content_details_title'=>trim($this->input->post('content_details_title')),
						        'about_content_details_desc'=>trim($this->input->post('content_details_desc')),
						        'about_content_details_section'=>$secId,
						        'about_content_details_status'=>'1',
						        'about_content_details_deleted'=>'0',
						        'about_content_details_createdon'=>date('Y-m-d H:i:s'),
						        'about_content_details_modifiedon'=>'',
						        'about_content_details_deletedon'=>''
						    );
			$resultcontentdetails = $this->generic_model->generic_insert('about_content_details',$content_details_data);
			//$result['home_content_data'] = $this->generic_model->get_record_oncontent('1');

			if($resultcontentdetails){
		    	$session_data = array(
						'message' => 'Content has successfully been added.'
						);
		    	$this->session->set_userdata('content', $session_data);
		    	redirect('admin/content/aboutcontentadd/2');
					
		    }else{
		    	$session_data = array(
						'message' => 'There went something wrong.'
						);
		    	$result['content']['message']=$session_data['message'];
		    	$cond=array(
	    			'about_content_details_cid' => '10',
	    			'about_content_details_section' => '1'
	    		);
	    		$result['about_first_section_data'] = $this->generic_model->get_record('about_content_details',$cond);
		    	$this->session->set_userdata('content', $session_data);
		    	$this->template->layout('admin','admincontentaboutviewaddedit',$result);
		    }
		}
	}

	public function setaboutsection4($secId=false){


		if(!empty($this->input->post('listid'))){
			$listid=$this->input->post('listid');
		}
		$checkcontentres=$this->generic_model->check_content_about_lists('about',$secId,'about_content_imglists',$listid);
		
		$checkcontentstatus=(!empty($checkcontentres['result']['statusid'])) ? $checkcontentres['result']['statusid'] : '';
		$content_details_id=(!empty($checkcontentres['result']['cdid'])) ? $checkcontentres['result']['cdid'] : '';
		$content_id=(!empty($checkcontentres['result']['cid'])) ? $checkcontentres['result']['cid'] : '';
		/*echo $content_details_id;
		exit();*/

		$data=array();
		$filename='';
		$content_data=array();
		$content_details_data=array();
		//$content_details_id = $this->input->post('cdid');
		if(!empty($_FILES['userfile']['name']) && $checkcontentstatus != ''){
			$config = array(
			'upload_path' => "./uploads/",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'overwrite' => TRUE,
			'encrypt_name' => TRUE,
			'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' => "975",
			'max_width' => "1920"
			);
			
			$this->load->library('upload', $config);
			if($this->upload->do_upload())
			{
				$data = array('upload_data' => $this->upload->data());
				$filename=$data['upload_data']['file_name'];

			}
		}

		if($checkcontentstatus=='101'){ //content home there in content table only

			$content_details_data=array(
						        'about_content_imglists_cid'=>$content_id,
						        'about_content_imglists_title'=>trim($this->input->post('content_details_title')),
						        'about_content_imglists_desc'=>trim($this->input->post('content_details_desc')),
						        
						        'about_content_imglists_filename'=>$filename,
						        'about_content_imglists_fblink'=>trim($this->input->post('content_details_fblink')),
						        'about_content_imglists_twtlink'=>trim($this->input->post('content_details_twtlink')),
						        'about_content_imglists_lklink'=>trim($this->input->post('content_details_lklink')),


						        'about_content_imglists_section'=>$secId,
						        'about_content_imglists_listid'=>$listid,
						        'about_content_imglists_status'=>trim($this->input->post('content_details_status')),
						        'about_content_imglists_deleted'=>$this->input->post('content_details_deleted'),
						        'about_content_imglists_createdon'=>date('Y-m-d H:i:s'),
						        'about_content_imglists_modifiedon'=>'',
						        'about_content_imglists_deletedon'=>''
						    );
			$resultcontentdetails = $this->generic_model->generic_insert('about_content_imglists',$content_details_data);

			if($resultcontentdetails){
		    	$session_data = array(
						'message' => 'Content has successfully been added.'
						);
		    	$this->session->set_userdata('content', $session_data);
		    	redirect('admin/content/aboutcontentadd/6');
					
		    }else{
		    	$session_data = array(
						'message' => 'There went something wrong.'
						);
		    	//$this->session->set_userdata('content', $session_data);
		    	$result['content']['message']=$session_data['message'];
		    	$this->template->layout('admin','admincontentaboutviewaddedit',$result);
		    }

		}

		if($checkcontentstatus=='102'){ //content home and section there in content details table only
				if(!empty($filename)){
					$content_details_data=array(
							        
							        'about_content_imglists_title'=>trim($this->input->post('content_details_title')),
							        'about_content_imglists_desc'=>trim($this->input->post('content_details_desc')),

							        'about_content_imglists_filename'=>$filename,
							        'about_content_imglists_fblink'=>trim($this->input->post('content_details_fblink')),
							        'about_content_imglists_twtlink'=>trim($this->input->post('content_details_twtlink')),
							        'about_content_imglists_lklink'=>trim($this->input->post('content_details_lklink')),

							        'about_content_imglists_status'=>trim($this->input->post('content_details_status')),
							        'about_content_imglists_deleted'=>$this->input->post('content_details_deleted'),
							        'about_content_imglists_modifiedon'=>date('Y-m-d H:i:s')
							    );
				}else{
					$content_details_data=array(
							        
							        'about_content_imglists_title'=>trim($this->input->post('content_details_title')),
							        'about_content_imglists_desc'=>trim($this->input->post('content_details_desc')),
							        'about_content_imglists_fblink'=>trim($this->input->post('content_details_fblink')),
							        'about_content_imglists_twtlink'=>trim($this->input->post('content_details_twtlink')),
							        'about_content_imglists_lklink'=>trim($this->input->post('content_details_lklink')),

							        'about_content_imglists_status'=>trim($this->input->post('content_details_status')),
							        'about_content_imglists_deleted'=>$this->input->post('content_details_deleted'),
							        'about_content_imglists_modifiedon'=>date('Y-m-d H:i:s')
							    );
				}
				
	    
			    $resultcontentdetails=$this->generic_model->generic_update_tbl('about_content_imglists',$content_details_id,'about_content_imglists_id',$content_details_data); 
			    //$qry=$this->db->last_query();
			    /*echo $qry;
			    exit();*/

			    if($resultcontentdetails){
			    	$session_data = array(
							'message' => 'Content has successfully been updated.'
							);
			    	$this->session->set_userdata('content', $session_data);
			    	redirect('admin/content/aboutcontentadd/6');
						
			    }else{
			    	$session_data = array(
							'message' => 'There went something wrong.'
							);
			    	//$this->session->set_userdata('content', $session_data);
			    	$cond=array(
		    			'about_content_imglists_cid' => '10',
		    			'about_content_imglists_section' => '6'
		    		);
		    		$result['about_fourth_section_data'] = $this->generic_model->get_record('about_content_imglists',$cond);

			    	$result['content']['message']=$session_data['message'];
			    	$this->template->layout('admin','admincontentaboutviewaddedit',$result);
			    }
	    
		}

		if($checkcontentstatus=='100'){ //content neither home nor section there in content details table only

			
			$content_data=array(
						        'content_page'=>trim($this->input->post('page')),
						        'content_status'=>'1',
						        'content_deleted'=>'0',
						        'content_createdon'=>date('Y-m-d H:i:s'),
						        'content_modifiedon'=>'',
						        'content_deletedon'=>''
						    );
			
			$resultcontent = $this->generic_model->generic_insert('content',$content_data);
			$insert_id = $this->db->insert_id();

			$content_details_data=array(
						        'about_content_imglists_cid'=>trim($insert_id),
						        'about_content_imglists_title'=>trim($this->input->post('content_details_title')),
						        'about_content_imglists_desc'=>trim($this->input->post('content_details_desc')),
						        
						        'about_content_imglists_filename'=>$filename,
						        'about_content_imglists_fblink'=>trim($this->input->post('content_details_fblink')),
						        'about_content_imglists_twtlink'=>trim($this->input->post('content_details_twtlink')),
						        'about_content_imglists_lklink'=>trim($this->input->post('content_details_lklink')),


						        'about_content_imglists_section'=>$secId,
						        'about_content_imglists_listid'=>$listid,
						        'about_content_imglists_status'=>trim($this->input->post('content_details_status')),
						        'about_content_imglists_deleted'=>$this->input->post('content_details_deleted'),
						        'about_content_imglists_createdon'=>date('Y-m-d H:i:s'),
						        'about_content_imglists_modifiedon'=>'',
						        'about_content_imglists_deletedon'=>''
						    );
			$resultcontentdetails = $this->generic_model->generic_insert('about_content_imglists',$content_details_data);
			//$result['home_content_data'] = $this->generic_model->get_record_oncontent('1');

			if($resultcontentdetails){
		    	$session_data = array(
						'message' => 'Content has successfully been added.'
						);
		    	$this->session->set_userdata('content', $session_data);
		    	redirect('admin/content/aboutcontentadd/6');
					
		    }else{
		    	$session_data = array(
						'message' => 'There went something wrong.'
						);
		    	$result['content']['message']=$session_data['message'];
		    	$cond=array(
	    			'about_content_imglists_cid' => '10',
	    			'about_content_imglists_section' => '6'
	    		);
	    		$result['about_fourth_section_data'] = $this->generic_model->get_record('about_content_imglists',$cond);
		    	$this->session->set_userdata('content', $session_data);
		    	$this->template->layout('admin','admincontentaboutviewaddedit',$result);
		    }
		}


	}

	public function setaboutsection5($secId=false){

		$checkcontentres=$this->generic_model->check_content_about('about',$secId,'about_content_details');
		
		$checkcontentstatus=(!empty($checkcontentres['result']['statusid'])) ? $checkcontentres['result']['statusid'] : '';
		$content_details_id=(!empty($checkcontentres['result']['cdid'])) ? $checkcontentres['result']['cdid'] : '';
		$content_id=(!empty($checkcontentres['result']['cid'])) ? $checkcontentres['result']['cid'] : '';
		/*echo $content_details_id;
		exit();*/

		if($checkcontentstatus=='101'){ //content home there in content table only

			$content_details_data=array(
						        'about_content_details_cid'=>$content_id,
						        'about_content_details_title'=>trim($this->input->post('content_details_title')),
						        'about_content_details_desc'=>trim($this->input->post('content_details_desc')),
						        'about_content_details_section'=>$secId,
						        'about_content_details_status'=>'1',
						        'about_content_details_deleted'=>'0',
						        'about_content_details_createdon'=>date('Y-m-d H:i:s'),
						        'about_content_details_modifiedon'=>'',
						        'about_content_details_deletedon'=>''
						    );
			$resultcontentdetails = $this->generic_model->generic_insert('about_content_details',$content_details_data);

			if($resultcontentdetails){
		    	$session_data = array(
						'message' => 'Content has successfully been added.'
						);
		    	$this->session->set_userdata('content', $session_data);
		    	redirect('admin/content/aboutcontentadd/10');
					
		    }else{
		    	$session_data = array(
						'message' => 'There went something wrong.'
						);
		    	//$this->session->set_userdata('content', $session_data);
		    	$result['content']['message']=$session_data['message'];
		    	$this->template->layout('admin','admincontentaboutviewaddedit',$result);
		    }

		}

		if($checkcontentstatus=='102'){ //content home and section there in content details table only

				$content_details_data=array(
							        
							        'about_content_details_title'=>trim($this->input->post('content_details_title')),
							        'about_content_details_desc'=>trim($this->input->post('content_details_desc')),
							        'about_content_details_modifiedon'=>date('Y-m-d H:i:s')
							    );
	    
			    $resultcontentdetails=$this->generic_model->generic_update_tbl('about_content_details',$content_details_id,'about_content_details_id',$content_details_data); 
			    $qry=$this->db->last_query();
			    /*echo $qry;
			    exit();*/

			    if($resultcontentdetails){
			    	$session_data = array(
							'message' => 'Content has successfully been updated.'
							);
			    	$this->session->set_userdata('content', $session_data);
			    	redirect('admin/content/aboutcontentadd/10');
						
			    }else{
			    	$session_data = array(
							'message' => 'There went something wrong.'
							);
			    	//$this->session->set_userdata('content', $session_data);
			    	$cond=array(
		    			'about_content_details_cid' => '10',
		    			'about_content_details_section' => '1'
		    		);
		    		$result['about_fifth_section_data'] = $this->generic_model->get_record('about_content_details',$cond);

			    	$result['content']['message']=$session_data['message'];
			    	$this->template->layout('admin','admincontentaboutviewaddedit',$result);
			    }
	    
		}

		if($checkcontentstatus=='100'){ //content neither home nor section there in content details table only

			
			$content_data=array(
						        'content_page'=>trim($this->input->post('page')),
						        'content_status'=>'1',
						        'content_deleted'=>'0',
						        'content_createdon'=>date('Y-m-d H:i:s'),
						        'content_modifiedon'=>'',
						        'content_deletedon'=>''
						    );
			
			$resultcontent = $this->generic_model->generic_insert('content',$content_data);
			$insert_id = $this->db->insert_id();

			$content_details_data=array(
						        'about_content_details_cid'=>trim($insert_id),
						        'about_content_details_title'=>trim($this->input->post('content_details_title')),
						        'about_content_details_desc'=>trim($this->input->post('content_details_desc')),
						        'about_content_details_section'=>$secId,
						        'about_content_details_status'=>'1',
						        'about_content_details_deleted'=>'0',
						        'about_content_details_createdon'=>date('Y-m-d H:i:s'),
						        'about_content_details_modifiedon'=>'',
						        'about_content_details_deletedon'=>''
						    );
			$resultcontentdetails = $this->generic_model->generic_insert('about_content_details',$content_details_data);
			//$result['home_content_data'] = $this->generic_model->get_record_oncontent('1');

			if($resultcontentdetails){
		    	$session_data = array(
						'message' => 'Content has successfully been added.'
						);
		    	$this->session->set_userdata('content', $session_data);
		    	redirect('admin/content/aboutcontentadd/10');
					
		    }else{
		    	$session_data = array(
						'message' => 'There went something wrong.'
						);
		    	$result['content']['message']=$session_data['message'];
		    	$cond=array(
	    			'about_content_details_cid' => '10',
	    			'about_content_details_section' => '1'
	    		);
	    		$result['about_fifth_section_data'] = $this->generic_model->get_record('about_content_details',$cond);
		    	$this->session->set_userdata('content', $session_data);
		    	$this->template->layout('admin','admincontentaboutviewaddedit',$result);
		    }
		}
	}

	public function homedistributor($secId=false){

		/*$func='setsection'.$secId;
		$this->$func();*/
		switch ($secId) {
        
	        case 1:
	            $this->setsection1($secId);
	            break;
	        case 2:
	            $this->setsection2($secId);
	            break;
	        case 3:
	            $this->setsection3($secId);
	            break;
	        case 4:
	            $this->setsection4($secId);
	            break;
	        case 5:
	            $this->setsection5($secId);
	            break;
	        case 6:
	            $this->setsection6($secId);
	            break;
	        case 7:
	            $this->setsection7($secId);
	            break;
	        case 8:
	            $this->setsection8($secId);
	            break;
	        case 9:
	            $this->setsection9($secId);
	            break;
	        case 10:
	            $this->setsection10($secId);
	            break;
	        default:
	        		$session_data = array(
								'message' => 'Unknown distributor access.'
								);
			    	$result['content']['message']=$session_data['message'];
			    	//$this->session->set_userdata('content', $session_data);
			    	$this->template->layout('admin','admincontenthomeviewaddedit',$result);
	        	break;
        }
	}

	public function setsection1($secId=false){

		$checkcontentres=$this->generic_model->check_content_home(10,$secId,'home_content_details');
		
		$checkcontentstatus=(!empty($checkcontentres['result']['statusid'])) ? $checkcontentres['result']['statusid'] : '';
		$content_details_id=(!empty($checkcontentres['result']['cdid'])) ? $checkcontentres['result']['cdid'] : '';
		/*echo $content_details_id;
		exit();*/

		if($checkcontentstatus=='101'){ //content home there in content table only

			$content_details_data=array(
						        'home_content_details_cid'=>'10',
						        'home_content_details_title'=>trim($this->input->post('content_details_title')),
						        'home_content_details_desc'=>trim($this->input->post('content_details_desc')),
						        'home_content_details_readmore'=>trim($this->input->post('content_details_readmore')),
						        'home_content_details_section'=>$secId,
						        'home_content_details_status'=>'1',
						        'home_content_details_deleted'=>'0',
						        'home_content_details_createdon'=>date('Y-m-d H:i:s'),
						        'home_content_details_modifiedon'=>'',
						        'home_content_details_deletedon'=>''
						    );
			$resultcontentdetails = $this->generic_model->generic_insert('home_content_details',$content_details_data);

			if($resultcontentdetails){
		    	$session_data = array(
						'message' => 'Content has successfully been added.'
						);
		    	$this->session->set_userdata('content', $session_data);
		    	redirect('admin/content/homecontentadd/1');
					
		    }else{
		    	$session_data = array(
						'message' => 'There went something wrong.'
						);
		    	//$this->session->set_userdata('content', $session_data);
		    	$result['content']['message']=$session_data['message'];
		    	$this->template->layout('admin','admincontenthomeviewaddedit',$result);
		    }

		}

		if($checkcontentstatus=='102'){ //content home and section there in content details table only

				$content_details_data=array(
							        
							        'home_content_details_title'=>trim($this->input->post('content_details_title')),
							        'home_content_details_desc'=>trim($this->input->post('content_details_desc')),
							        'home_content_details_readmore'=>trim($this->input->post('content_details_readmore')),
							        'home_content_details_modifiedon'=>date('Y-m-d H:i:s')
							    );
	    
			    $resultcontentdetails=$this->generic_model->generic_update_tbl('home_content_details',$content_details_id,'home_content_details_id',$content_details_data); 
			    //$qry=$this->db->last_query();
			    /*echo $qry;
			    exit();*/

			    if($resultcontentdetails){
			    	$session_data = array(
							'message' => 'Content has successfully been updated.'
							);
			    	$this->session->set_userdata('content', $session_data);
			    	redirect('admin/content/homecontentadd/1');
						
			    }else{
			    	$session_data = array(
							'message' => 'There went something wrong.'
							);
			    	//$this->session->set_userdata('content', $session_data);
			    	$cond=array(
		    			'home_content_details_cid' => '10',
		    			'home_content_details_section' => '1'
		    		);
		    		$result['home_first_section_data'] = $this->generic_model->get_record('home_content_details',$cond);

			    	$result['content']['message']=$session_data['message'];
			    	$this->template->layout('admin','admincontenthomeviewaddedit',$result);
			    }
	    
		}

		if($checkcontentstatus=='100'){ //content neither home nor section there in content details table only

			
			$content_data=array(
						        'content_page'=>trim($this->input->post('page')),
						        'content_status'=>'1',
						        'content_deleted'=>'0',
						        'content_createdon'=>date('Y-m-d H:i:s'),
						        'content_modifiedon'=>'',
						        'content_deletedon'=>''
						    );
			
			$resultcontent = $this->generic_model->generic_insert('content',$content_data);
			$insert_id = $this->db->insert_id();

			$content_details_data=array(
						        'home_content_details_cid'=>trim($insert_id),
						        'home_content_details_title'=>trim($this->input->post('content_details_title')),
						        'home_content_details_desc'=>trim($this->input->post('content_details_desc')),
						        'home_content_details_readmore'=>trim($this->input->post('content_details_readmore')),
						        'home_content_details_section'=>$secId,
						        'home_content_details_status'=>'1',
						        'home_content_details_deleted'=>'0',
						        'home_content_details_createdon'=>date('Y-m-d H:i:s'),
						        'home_content_details_modifiedon'=>'',
						        'home_content_details_deletedon'=>''
						    );
			$resultcontentdetails = $this->generic_model->generic_insert('home_content_details',$content_details_data);
			//$result['home_content_data'] = $this->generic_model->get_record_oncontent('1');

			if($resultcontentdetails){
		    	$session_data = array(
						'message' => 'Content has successfully been added.'
						);
		    	$this->session->set_userdata('content', $session_data);
		    	redirect('admin/content/homecontentadd/1');
					
		    }else{
		    	$session_data = array(
						'message' => 'There went something wrong.'
						);
		    	$result['content']['message']=$session_data['message'];
		    	$cond=array(
	    			'home_content_details_cid' => '10',
	    			'home_content_details_section' => '1'
	    		);
	    		$result['home_first_section_data'] = $this->generic_model->get_record('home_content_details',$cond);
		    	$this->session->set_userdata('content', $session_data);
		    	$this->template->layout('admin','admincontenthomeviewaddedit',$result);
		    }
		}

	}

	public function setsection2($secId=false){
		$checkcontentres=$this->generic_model->check_content_home(10,$secId,'home_content_details');
		
		$checkcontentstatus=(!empty($checkcontentres['result']['statusid'])) ? $checkcontentres['result']['statusid'] : '';
		$content_details_id=(!empty($checkcontentres['result']['cdid'])) ? $checkcontentres['result']['cdid'] : '';
		/*echo $content_details_id;
		exit();*/

		if($checkcontentstatus=='101'){ //content home there in content table only

			$content_details_data=array(
						        'home_content_details_cid'=>'10',
						        'home_content_details_title'=>trim($this->input->post('content_details_title')),
						        'home_content_details_desc'=>trim($this->input->post('content_details_desc')),
						        'home_content_details_section'=>$secId,
						        'home_content_details_status'=>'1',
						        'home_content_details_deleted'=>'0',
						        'home_content_details_createdon'=>date('Y-m-d H:i:s'),
						        'home_content_details_modifiedon'=>'',
						        'home_content_details_deletedon'=>''
						    );
			$resultcontentdetails = $this->generic_model->generic_insert('home_content_details',$content_details_data);

			if($resultcontentdetails){
		    	$session_data = array(
						'message' => 'Content has successfully been added.'
						);
		    	$this->session->set_userdata('content', $session_data);
		    	redirect('admin/content/homecontentadd/2');
					
		    }else{
		    	$session_data = array(
						'message' => 'There went something wrong.'
						);
		    	//$this->session->set_userdata('content', $session_data);
		    	$result['content']['message']=$session_data['message'];
		    	$this->template->layout('admin','admincontenthomeviewaddedit',$result);
		    }

		}

		if($checkcontentstatus=='102'){ //content home and section there in content details table only

				$content_details_data=array(
							        
							        'home_content_details_title'=>trim($this->input->post('content_details_title')),
							        'home_content_details_desc'=>trim($this->input->post('content_details_desc')),
							        'home_content_details_modifiedon'=>date('Y-m-d H:i:s')
							    );
	    
			    $resultcontentdetails=$this->generic_model->generic_update_tbl('home_content_details',$content_details_id,'home_content_details_id',$content_details_data); 
			    $qry=$this->db->last_query();
			    /*echo $qry;
			    exit();*/

			    if($resultcontentdetails){
			    	$session_data = array(
							'message' => 'Content has successfully been updated.'
							);
			    	$this->session->set_userdata('content', $session_data);
			    	redirect('admin/content/homecontentadd/2');
						
			    }else{
			    	$session_data = array(
							'message' => 'There went something wrong.'
							);
			    	//$this->session->set_userdata('content', $session_data);
			    	$cond=array(
		    			'home_content_details_cid' => '10',
		    			'home_content_details_section' => '1'
		    		);
		    		$result['home_first_section_data'] = $this->generic_model->get_record('home_content_details',$cond);

			    	$result['content']['message']=$session_data['message'];
			    	$this->template->layout('admin','admincontenthomeviewaddedit',$result);
			    }
	    
		}

		if($checkcontentstatus=='100'){ //content neither home nor section there in content details table only

			
			$content_data=array(
						        'content_page'=>trim($this->input->post('page')),
						        'content_status'=>'1',
						        'content_deleted'=>'0',
						        'content_createdon'=>date('Y-m-d H:i:s'),
						        'content_modifiedon'=>'',
						        'content_deletedon'=>''
						    );
			
			$resultcontent = $this->generic_model->generic_insert('content',$content_data);
			$insert_id = $this->db->insert_id();

			$content_details_data=array(
						        'home_content_details_cid'=>trim($insert_id),
						        'home_content_details_title'=>trim($this->input->post('content_details_title')),
						        'home_content_details_desc'=>trim($this->input->post('content_details_desc')),
						        'home_content_details_section'=>$secId,
						        'home_content_details_status'=>'1',
						        'home_content_details_deleted'=>'0',
						        'home_content_details_createdon'=>date('Y-m-d H:i:s'),
						        'home_content_details_modifiedon'=>'',
						        'home_content_details_deletedon'=>''
						    );
			$resultcontentdetails = $this->generic_model->generic_insert('home_content_details',$content_details_data);
			//$result['home_content_data'] = $this->generic_model->get_record_oncontent('1');

			if($resultcontentdetails){
		    	$session_data = array(
						'message' => 'Content has successfully been added.'
						);
		    	$this->session->set_userdata('content', $session_data);
		    	redirect('admin/content/homecontentadd/2');
					
		    }else{
		    	$session_data = array(
						'message' => 'There went something wrong.'
						);
		    	$result['content']['message']=$session_data['message'];
		    	$cond=array(
	    			'home_content_details_cid' => '10',
	    			'home_content_details_section' => '1'
	    		);
	    		$result['home_first_section_data'] = $this->generic_model->get_record('home_content_details',$cond);
		    	$this->session->set_userdata('content', $session_data);
		    	$this->template->layout('admin','admincontenthomeviewaddedit',$result);
		    }
		}
	}

	public function setsection3($secId=false){
		$checkcontentres=$this->generic_model->check_content_home(10,$secId,'home_content_images');
		
		$checkcontentstatus=(!empty($checkcontentres['result']['statusid'])) ? $checkcontentres['result']['statusid'] : '';
		$content_details_id=(!empty($checkcontentres['result']['cdid'])) ? $checkcontentres['result']['cdid'] : '';
		/*echo 'oiuoiuoiu '.$checkcontentstatus;
		exit();*/
		/*print '<pre>';
		print_r($_FILES);
		print '</pre>';
		exit();*/

		$data=array();
		$filename='';
		$content_data=array();
		$content_details_data=array();
		//$content_details_id = $this->input->post('cdid');
		if(!empty($_FILES['userfile']['name'])){
			$config = array(
			'upload_path' => "./uploads/",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'overwrite' => TRUE,
			'encrypt_name' => TRUE,
			'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' => "975",
			'max_width' => "1920"
			);
			
			$this->load->library('upload', $config);
			if($this->upload->do_upload())
			{
				$data = array('upload_data' => $this->upload->data());
				$filename=$data['upload_data']['file_name'];

			}


			if($checkcontentstatus=='101'){ //content home there in content table only

				$content_details_images_data=array(
							        'home_content_images_cid'=>'10',
							        'home_content_images_filename'=>$filename,
							        'home_content_images_section'=>$secId,
							        'home_content_images_status'=>'1',
							        'home_content_images_deleted'=>'0',
							        'home_content_images_createdon'=>date('Y-m-d H:i:s'),
							        'home_content_images_modifiedon'=>'',
							        'home_content_images_deletedon'=>''
							    );

				$resultcontentimagedetails = $this->generic_model->generic_insert('home_content_images',$content_details_images_data);

				if($resultcontentimagedetails){
			    	$session_data = array(
							'message' => 'Content has successfully been added.'
							);
			    	$this->session->set_userdata('content', $session_data);
			    	redirect('admin/content/homecontentadd/3');
						
			    }else{
			    	$session_data = array(
							'message' => 'There went something wrong.'
							);
			    	//$this->session->set_userdata('content', $session_data);
			    	$result['content']['message']=$session_data['message'];
			    	$this->template->layout('admin','admincontenthomeviewaddedit',$result);
			    }

			}

			if($checkcontentstatus=='102'){ //content home and section there in content details table only

					$content_details_images_data=array(
												        'home_content_images_filename'=>$filename,
												        'home_content_images_modifiedon'=>date('Y-m-d H:i:s'),
												    );

					
		    
				    $resultcontentimagedetails=$this->generic_model->generic_update_tbl('home_content_images',$content_details_id,'home_content_images_id',$content_details_images_data);
				    
				    /*echo 'uuuuuuuuuuuuuuuuuu '.$filename;
				    $qry=$this->db->last_query();
				    echo $qry;
				    exit();*/

				    if($resultcontentimagedetails){
				    	$session_data = array(
								'message' => 'Content has successfully been updated.'
								);
				    	$this->session->set_userdata('content', $session_data);
				    	redirect('admin/content/homecontentadd/3');
							
				    }else{
				    	$session_data = array(
								'message' => 'There went something wrong.'
								);
				    	//$this->session->set_userdata('content', $session_data);
				    	$cond=array(
			    			'home_content_images_cid' => '10',
			    			'home_content_images_section' => '3'
			    		);
			    		$result['home_third_section_data'] = $this->generic_model->get_record('home_content_images',$cond);

				    	$result['content']['message']=$session_data['message'];
				    	$this->template->layout('admin','admincontenthomeviewaddedit',$result);
				    }
		    
			}

			if($checkcontentstatus=='100'){ //content neither home nor section there in content details table only

				
				$content_data=array(
							        'content_page'=>'home',
							        'content_status'=>'1',
							        'content_deleted'=>'0',
							        'content_createdon'=>date('Y-m-d H:i:s'),
							        'content_modifiedon'=>'',
							        'content_deletedon'=>''
							    );
				
				$resultcontent = $this->generic_model->generic_insert('content',$content_data);
				$insert_id = $this->db->insert_id();

				$content_details_images_data=array(
							        'home_content_images_cid'=>'10',
							        'home_content_images_filename'=>$filename,
							        'home_content_images_section'=>$secId,
							        'home_content_images_status'=>'1',
							        'home_content_images_deleted'=>'0',
							        'home_content_images_createdon'=>date('Y-m-d H:i:s'),
							        'home_content_images_modifiedon'=>'',
							        'home_content_images_deletedon'=>''
							    );
				$resultcontentimagedetails = $this->generic_model->generic_insert('home_content_images',$content_details_images_data);
				//$result['home_content_data'] = $this->generic_model->get_record_oncontent('1');

				if($resultcontentimagedetails){
			    	$session_data = array(
							'message' => 'Content has successfully been added.'
							);
			    	$this->session->set_userdata('content', $session_data);
			    	redirect('admin/content/homecontentadd/3');
						
			    }else{
			    	$session_data = array(
							'message' => 'There went something wrong.'
							);
			    	$result['content']['message']=$session_data['message'];
			    	$cond=array(
		    			'home_content_images_cid' => '10',
		    			'home_content_images_section' => '3'
		    		);
		    		$result['home_third_section_data'] = $this->generic_model->get_record('home_content_images',$cond);
			    	$this->session->set_userdata('content', $session_data);
			    	$this->template->layout('admin','admincontenthomeviewaddedit',$result);
			    }
			}
		}
	}

	public function setsection4($secId=false){

		if(!empty($this->input->post('listid'))){
			$listid=$this->input->post('listid');
		}
		$checkcontentres=$this->generic_model->check_content_home_lists(10,$secId,'home_content_lists',$listid);
		
		$checkcontentstatus=(!empty($checkcontentres['result']['statusid'])) ? $checkcontentres['result']['statusid'] : '';
		$content_details_id=(!empty($checkcontentres['result']['cdid'])) ? $checkcontentres['result']['cdid'] : '';
		/*echo $content_details_id;
		exit();*/

		if($checkcontentstatus=='101'){ //content home there in content table only

			$content_details_data=array(
						        'home_content_lists_cid'=>'10',
						        'home_content_lists_title'=>trim($this->input->post('content_details_title')),
						        'home_content_lists_desc'=>trim($this->input->post('content_details_desc')),
						        'home_content_lists_readmore'=>trim($this->input->post('content_details_readmore')),
						        'home_content_lists_section'=>$secId,
						        'home_content_lists_listid'=>$listid,
						        'home_content_lists_status'=>trim($this->input->post('content_details_status')),
						        'home_content_lists_deleted'=>$this->input->post('content_details_deleted'),
						        'home_content_lists_createdon'=>date('Y-m-d H:i:s'),
						        'home_content_lists_modifiedon'=>'',
						        'home_content_lists_deletedon'=>''
						    );
			$resultcontentdetails = $this->generic_model->generic_insert('home_content_lists',$content_details_data);

			if($resultcontentdetails){
		    	$session_data = array(
						'message' => 'Content has successfully been added.'
						);
		    	$this->session->set_userdata('content', $session_data);
		    	redirect('admin/content/homecontentadd/4');
					
		    }else{
		    	$session_data = array(
						'message' => 'There went something wrong.'
						);
		    	//$this->session->set_userdata('content', $session_data);
		    	$result['content']['message']=$session_data['message'];
		    	$this->template->layout('admin','admincontenthomeviewaddedit',$result);
		    }

		}

		if($checkcontentstatus=='102'){ //content home and section there in content details table only

				$content_details_data=array(
							        
							        'home_content_lists_title'=>trim($this->input->post('content_details_title')),
							        'home_content_lists_desc'=>trim($this->input->post('content_details_desc')),
							        'home_content_lists_readmore'=>trim($this->input->post('content_details_readmore')),
							        'home_content_lists_status'=>trim($this->input->post('content_details_status')),
							        'home_content_lists_deleted'=>$this->input->post('content_details_deleted'),
							        'home_content_lists_modifiedon'=>date('Y-m-d H:i:s')
							    );
	    
			    $resultcontentdetails=$this->generic_model->generic_update_tbl('home_content_lists',$content_details_id,'home_content_lists_id',$content_details_data); 
			    //$qry=$this->db->last_query();
			    /*echo $qry;
			    exit();*/

			    if($resultcontentdetails){
			    	$session_data = array(
							'message' => 'Content has successfully been updated.'
							);
			    	$this->session->set_userdata('content', $session_data);
			    	redirect('admin/content/homecontentadd/4');
						
			    }else{
			    	$session_data = array(
							'message' => 'There went something wrong.'
							);
			    	//$this->session->set_userdata('content', $session_data);
			    	$cond=array(
		    			'home_content_lists_cid' => '10',
		    			'home_content_lists_section' => '4'
		    		);
		    		$result['home_fourth_section_data'] = $this->generic_model->get_record('home_content_lists',$cond);

			    	$result['content']['message']=$session_data['message'];
			    	$this->template->layout('admin','admincontenthomeviewaddedit',$result);
			    }
	    
		}

		if($checkcontentstatus=='100'){ //content neither home nor section there in content details table only

			
			$content_data=array(
						        'content_page'=>trim($this->input->post('page')),
						        'content_status'=>'1',
						        'content_deleted'=>'0',
						        'content_createdon'=>date('Y-m-d H:i:s'),
						        'content_modifiedon'=>'',
						        'content_deletedon'=>''
						    );
			
			$resultcontent = $this->generic_model->generic_insert('content',$content_data);
			$insert_id = $this->db->insert_id();

			$content_details_data=array(
						        'home_content_lists_cid'=>trim($insert_id),
						        'home_content_lists_title'=>trim($this->input->post('content_details_title')),
						        'home_content_lists_desc'=>trim($this->input->post('content_details_desc')),
						        'home_content_lists_readmore'=>trim($this->input->post('content_details_readmore')),
						        'home_content_lists_section'=>$secId,
						        'home_content_lists_listid'=>$listid,
						        'home_content_lists_status'=>trim($this->input->post('content_details_status')),
						        'home_content_lists_deleted'=>$this->input->post('content_details_deleted'),
						        'home_content_lists_createdon'=>date('Y-m-d H:i:s'),
						        'home_content_lists_modifiedon'=>'',
						        'home_content_lists_deletedon'=>''
						    );
			$resultcontentdetails = $this->generic_model->generic_insert('home_content_lists',$content_details_data);
			//$result['home_content_data'] = $this->generic_model->get_record_oncontent('1');

			if($resultcontentdetails){
		    	$session_data = array(
						'message' => 'Content has successfully been added.'
						);
		    	$this->session->set_userdata('content', $session_data);
		    	redirect('admin/content/homecontentadd/4');
					
		    }else{
		    	$session_data = array(
						'message' => 'There went something wrong.'
						);
		    	$result['content']['message']=$session_data['message'];
		    	$cond=array(
	    			'home_content_lists_cid' => '10',
	    			'home_content_lists_section' => '4'
	    		);
	    		$result['home_fourth_section_data'] = $this->generic_model->get_record('home_content_lists',$cond);
		    	$this->session->set_userdata('content', $session_data);
		    	$this->template->layout('admin','admincontenthomeviewaddedit',$result);
		    }
		}
	}

	public function setsection5($secId=false){

		$checkcontentres=$this->generic_model->check_content_home(10,$secId,'home_content_details');
		
		$checkcontentstatus=(!empty($checkcontentres['result']['statusid'])) ? $checkcontentres['result']['statusid'] : '';
		$content_details_id=(!empty($checkcontentres['result']['cdid'])) ? $checkcontentres['result']['cdid'] : '';
		/*echo $content_details_id;
		exit();*/

		if($checkcontentstatus=='101'){ //content home there in content table only

			$content_details_data=array(
						        'home_content_details_cid'=>'10',
						        'home_content_details_title'=>trim($this->input->post('content_details_title')),
						        'home_content_details_desc'=>trim($this->input->post('content_details_desc')),
						        'home_content_details_section'=>$secId,
						        'home_content_details_status'=>'1',
						        'home_content_details_deleted'=>'0',
						        'home_content_details_createdon'=>date('Y-m-d H:i:s'),
						        'home_content_details_modifiedon'=>'',
						        'home_content_details_deletedon'=>''
						    );
			$resultcontentdetails = $this->generic_model->generic_insert('home_content_details',$content_details_data);

			if($resultcontentdetails){
		    	$session_data = array(
						'message' => 'Content has successfully been added.'
						);
		    	$this->session->set_userdata('content', $session_data);
		    	redirect('admin/content/homecontentadd/5');
					
		    }else{
		    	$session_data = array(
						'message' => 'There went something wrong.'
						);
		    	//$this->session->set_userdata('content', $session_data);
		    	$result['content']['message']=$session_data['message'];
		    	$this->template->layout('admin','admincontenthomeviewaddedit',$result);
		    }

		}

		if($checkcontentstatus=='102'){ //content home and section there in content details table only

				$content_details_data=array(
							        
							        'home_content_details_title'=>trim($this->input->post('content_details_title')),
							        'home_content_details_desc'=>trim($this->input->post('content_details_desc')),
							        'home_content_details_modifiedon'=>date('Y-m-d H:i:s')
							    );
	    
			    $resultcontentdetails=$this->generic_model->generic_update_tbl('home_content_details',$content_details_id,'home_content_details_id',$content_details_data); 
			    //$qry=$this->db->last_query();
			    /*echo $qry;
			    exit();*/

			    if($resultcontentdetails){
			    	$session_data = array(
							'message' => 'Content has successfully been updated.'
							);
			    	$this->session->set_userdata('content', $session_data);
			    	redirect('admin/content/homecontentadd/5');
						
			    }else{
			    	$session_data = array(
							'message' => 'There went something wrong.'
							);
			    	//$this->session->set_userdata('content', $session_data);
			    	$cond=array(
		    			'home_content_details_cid' => '10',
		    			'home_content_details_section' => '5'
		    		);
		    		$result['home_fifth_section_data'] = $this->generic_model->get_record('home_content_details',$cond);

			    	$result['content']['message']=$session_data['message'];
			    	$this->template->layout('admin','admincontenthomeviewaddedit',$result);
			    }
	    
		}

		if($checkcontentstatus=='100'){ //content neither home nor section there in content details table only

			
			$content_data=array(
						        'content_page'=>trim($this->input->post('page')),
						        'content_status'=>'1',
						        'content_deleted'=>'0',
						        'content_createdon'=>date('Y-m-d H:i:s'),
						        'content_modifiedon'=>'',
						        'content_deletedon'=>''
						    );
			
			$resultcontent = $this->generic_model->generic_insert('content',$content_data);
			$insert_id = $this->db->insert_id();

			$content_details_data=array(
						        'home_content_details_cid'=>trim($insert_id),
						        'home_content_details_title'=>trim($this->input->post('content_details_title')),
						        'home_content_details_desc'=>trim($this->input->post('content_details_desc')),
						        'home_content_details_section'=>$secId,
						        'home_content_details_status'=>'1',
						        'home_content_details_deleted'=>'0',
						        'home_content_details_createdon'=>date('Y-m-d H:i:s'),
						        'home_content_details_modifiedon'=>'',
						        'home_content_details_deletedon'=>''
						    );
			$resultcontentdetails = $this->generic_model->generic_insert('home_content_details',$content_details_data);
			//$result['home_content_data'] = $this->generic_model->get_record_oncontent('1');

			if($resultcontentdetails){
		    	$session_data = array(
						'message' => 'Content has successfully been added.'
						);
		    	$this->session->set_userdata('content', $session_data);
		    	redirect('admin/content/homecontentadd/5');
					
		    }else{
		    	$session_data = array(
						'message' => 'There went something wrong.'
						);
		    	$result['content']['message']=$session_data['message'];
		    	$cond=array(
	    			'home_content_details_cid' => '10',
	    			'home_content_details_section' => '5'
	    		);
	    		$result['home_fifth_section_data'] = $this->generic_model->get_record('home_content_details',$cond);
		    	$this->session->set_userdata('content', $session_data);
		    	$this->template->layout('admin','admincontenthomeviewaddedit',$result);
		    }
		}

	}

	public function setsection6($secId=false){


		if(!empty($this->input->post('listid'))){
			$listid=$this->input->post('listid');
		}
		$checkcontentres=$this->generic_model->check_content_home_lists(10,$secId,'home_content_imglists',$listid);
		
		$checkcontentstatus=(!empty($checkcontentres['result']['statusid'])) ? $checkcontentres['result']['statusid'] : '';
		$content_details_id=(!empty($checkcontentres['result']['cdid'])) ? $checkcontentres['result']['cdid'] : '';
		/*echo $content_details_id;
		exit();*/

		$data=array();
		$filename='';
		$content_data=array();
		$content_details_data=array();
		//$content_details_id = $this->input->post('cdid');
		if(!empty($_FILES['userfile']['name']) && $checkcontentstatus != ''){
			$config = array(
			'upload_path' => "./uploads/",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'overwrite' => TRUE,
			'encrypt_name' => TRUE,
			'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' => "975",
			'max_width' => "1920"
			);
			
			$this->load->library('upload', $config);
			if($this->upload->do_upload())
			{
				$data = array('upload_data' => $this->upload->data());
				$filename=$data['upload_data']['file_name'];

			}
		}

		if($checkcontentstatus=='101'){ //content home there in content table only

			$content_details_data=array(
						        'home_content_imglists_cid'=>'10',
						        'home_content_imglists_title'=>trim($this->input->post('content_details_title')),
						        'home_content_imglists_desc'=>trim($this->input->post('content_details_desc')),
						        
						        'home_content_imglists_filename'=>$filename,
						        'home_content_imglists_fblink'=>trim($this->input->post('content_details_fblink')),
						        'home_content_imglists_twtlink'=>trim($this->input->post('content_details_twtlink')),
						        'home_content_imglists_lklink'=>trim($this->input->post('content_details_lklink')),


						        'home_content_imglists_section'=>$secId,
						        'home_content_imglists_listid'=>$listid,
						        'home_content_imglists_status'=>trim($this->input->post('content_details_status')),
						        'home_content_imglists_deleted'=>$this->input->post('content_details_deleted'),
						        'home_content_imglists_createdon'=>date('Y-m-d H:i:s'),
						        'home_content_imglists_modifiedon'=>'',
						        'home_content_imglists_deletedon'=>''
						    );
			$resultcontentdetails = $this->generic_model->generic_insert('home_content_imglists',$content_details_data);

			if($resultcontentdetails){
		    	$session_data = array(
						'message' => 'Content has successfully been added.'
						);
		    	$this->session->set_userdata('content', $session_data);
		    	redirect('admin/content/homecontentadd/6');
					
		    }else{
		    	$session_data = array(
						'message' => 'There went something wrong.'
						);
		    	//$this->session->set_userdata('content', $session_data);
		    	$result['content']['message']=$session_data['message'];
		    	$this->template->layout('admin','admincontenthomeviewaddedit',$result);
		    }

		}

		if($checkcontentstatus=='102'){ //content home and section there in content details table only
				if(!empty($filename)){
					$content_details_data=array(
							        
							        'home_content_imglists_title'=>trim($this->input->post('content_details_title')),
							        'home_content_imglists_desc'=>trim($this->input->post('content_details_desc')),

							        'home_content_imglists_filename'=>$filename,
							        'home_content_imglists_fblink'=>trim($this->input->post('content_details_fblink')),
							        'home_content_imglists_twtlink'=>trim($this->input->post('content_details_twtlink')),
							        'home_content_imglists_lklink'=>trim($this->input->post('content_details_lklink')),

							        'home_content_imglists_status'=>trim($this->input->post('content_details_status')),
							        'home_content_imglists_deleted'=>$this->input->post('content_details_deleted'),
							        'home_content_imglists_modifiedon'=>date('Y-m-d H:i:s')
							    );
				}else{
					$content_details_data=array(
							        
							        'home_content_imglists_title'=>trim($this->input->post('content_details_title')),
							        'home_content_imglists_desc'=>trim($this->input->post('content_details_desc')),
							        'home_content_imglists_fblink'=>trim($this->input->post('content_details_fblink')),
							        'home_content_imglists_twtlink'=>trim($this->input->post('content_details_twtlink')),
							        'home_content_imglists_lklink'=>trim($this->input->post('content_details_lklink')),

							        'home_content_imglists_status'=>trim($this->input->post('content_details_status')),
							        'home_content_imglists_deleted'=>$this->input->post('content_details_deleted'),
							        'home_content_imglists_modifiedon'=>date('Y-m-d H:i:s')
							    );
				}
				
	    
			    $resultcontentdetails=$this->generic_model->generic_update_tbl('home_content_imglists',$content_details_id,'home_content_imglists_id',$content_details_data); 
			    //$qry=$this->db->last_query();
			    /*echo $qry;
			    exit();*/

			    if($resultcontentdetails){
			    	$session_data = array(
							'message' => 'Content has successfully been updated.'
							);
			    	$this->session->set_userdata('content', $session_data);
			    	redirect('admin/content/homecontentadd/6');
						
			    }else{
			    	$session_data = array(
							'message' => 'There went something wrong.'
							);
			    	//$this->session->set_userdata('content', $session_data);
			    	$cond=array(
		    			'home_content_imglists_cid' => '10',
		    			'home_content_imglists_section' => '6'
		    		);
		    		$result['home_sixth_section_data'] = $this->generic_model->get_record('home_content_imglists',$cond);

			    	$result['content']['message']=$session_data['message'];
			    	$this->template->layout('admin','admincontenthomeviewaddedit',$result);
			    }
	    
		}

		if($checkcontentstatus=='100'){ //content neither home nor section there in content details table only

			
			$content_data=array(
						        'content_page'=>trim($this->input->post('page')),
						        'content_status'=>'1',
						        'content_deleted'=>'0',
						        'content_createdon'=>date('Y-m-d H:i:s'),
						        'content_modifiedon'=>'',
						        'content_deletedon'=>''
						    );
			
			$resultcontent = $this->generic_model->generic_insert('content',$content_data);
			$insert_id = $this->db->insert_id();

			$content_details_data=array(
						        'home_content_imglists_cid'=>trim($insert_id),
						        'home_content_imglists_title'=>trim($this->input->post('content_details_title')),
						        'home_content_imglists_desc'=>trim($this->input->post('content_details_desc')),
						        
						        'home_content_imglists_filename'=>$filename,
						        'home_content_imglists_fblink'=>trim($this->input->post('content_details_fblink')),
						        'home_content_imglists_twtlink'=>trim($this->input->post('content_details_twtlink')),
						        'home_content_imglists_lklink'=>trim($this->input->post('content_details_lklink')),


						        'home_content_imglists_section'=>$secId,
						        'home_content_imglists_listid'=>$listid,
						        'home_content_imglists_status'=>trim($this->input->post('content_details_status')),
						        'home_content_imglists_deleted'=>$this->input->post('content_details_deleted'),
						        'home_content_imglists_createdon'=>date('Y-m-d H:i:s'),
						        'home_content_imglists_modifiedon'=>'',
						        'home_content_imglists_deletedon'=>''
						    );
			$resultcontentdetails = $this->generic_model->generic_insert('home_content_imglists',$content_details_data);
			//$result['home_content_data'] = $this->generic_model->get_record_oncontent('1');

			if($resultcontentdetails){
		    	$session_data = array(
						'message' => 'Content has successfully been added.'
						);
		    	$this->session->set_userdata('content', $session_data);
		    	redirect('admin/content/homecontentadd/6');
					
		    }else{
		    	$session_data = array(
						'message' => 'There went something wrong.'
						);
		    	$result['content']['message']=$session_data['message'];
		    	$cond=array(
	    			'home_content_imglists_cid' => '10',
	    			'home_content_imglists_section' => '6'
	    		);
	    		$result['home_sixth_section_data'] = $this->generic_model->get_record('home_content_imglists',$cond);
		    	$this->session->set_userdata('content', $session_data);
		    	$this->template->layout('admin','admincontenthomeviewaddedit',$result);
		    }
		}


	}

	public function setsection7($secId=false){
		$checkcontentres=$this->generic_model->check_content_home(10,$secId,'home_content_details');
		
		$checkcontentstatus=(!empty($checkcontentres['result']['statusid'])) ? $checkcontentres['result']['statusid'] : '';
		$content_details_id=(!empty($checkcontentres['result']['cdid'])) ? $checkcontentres['result']['cdid'] : '';
		/*echo $content_details_id;
		exit();*/

		if($checkcontentstatus=='101'){ //content home there in content table only

			$content_details_data=array(
						        'home_content_details_cid'=>'10',
						        'home_content_details_title'=>trim($this->input->post('content_details_title')),
						        'home_content_details_desc'=>trim($this->input->post('content_details_desc')),
						        'home_content_details_readmore'=>trim($this->input->post('content_details_readmore')),
						        'home_content_details_section'=>$secId,
						        'home_content_details_status'=>'1',
						        'home_content_details_deleted'=>'0',
						        'home_content_details_createdon'=>date('Y-m-d H:i:s'),
						        'home_content_details_modifiedon'=>'',
						        'home_content_details_deletedon'=>''
						    );
			$resultcontentdetails = $this->generic_model->generic_insert('home_content_details',$content_details_data);

			if($resultcontentdetails){
		    	$session_data = array(
						'message' => 'Content has successfully been added.'
						);
		    	$this->session->set_userdata('content', $session_data);
		    	redirect('admin/content/homecontentadd/7');
					
		    }else{
		    	$session_data = array(
						'message' => 'There went something wrong.'
						);
		    	//$this->session->set_userdata('content', $session_data);
		    	$result['content']['message']=$session_data['message'];
		    	$this->template->layout('admin','admincontenthomeviewaddedit',$result);
		    }

		}

		if($checkcontentstatus=='102'){ //content home and section there in content details table only

				$content_details_data=array(
							        
							        'home_content_details_title'=>trim($this->input->post('content_details_title')),
							        'home_content_details_desc'=>trim($this->input->post('content_details_desc')),
							        'home_content_details_readmore'=>trim($this->input->post('content_details_readmore')),
							        'home_content_details_modifiedon'=>date('Y-m-d H:i:s')
							    );
	    
			    $resultcontentdetails=$this->generic_model->generic_update_tbl('home_content_details',$content_details_id,'home_content_details_id',$content_details_data); 
			    //$qry=$this->db->last_query();
			    /*echo $qry;
			    exit();*/

			    if($resultcontentdetails){
			    	$session_data = array(
							'message' => 'Content has successfully been updated.'
							);
			    	$this->session->set_userdata('content', $session_data);
			    	redirect('admin/content/homecontentadd/7');
						
			    }else{
			    	$session_data = array(
							'message' => 'There went something wrong.'
							);
			    	//$this->session->set_userdata('content', $session_data);
			    	$cond=array(
		    			'home_content_details_cid' => '10',
		    			'home_content_details_section' => '1'
		    		);
		    		$result['home_first_section_data'] = $this->generic_model->get_record('home_content_details',$cond);

			    	$result['content']['message']=$session_data['message'];
			    	$this->template->layout('admin','admincontenthomeviewaddedit',$result);
			    }
	    
		}

		if($checkcontentstatus=='100'){ //content neither home nor section there in content details table only

			
			$content_data=array(
						        'content_page'=>trim($this->input->post('page')),
						        'content_status'=>'1',
						        'content_deleted'=>'0',
						        'content_createdon'=>date('Y-m-d H:i:s'),
						        'content_modifiedon'=>'',
						        'content_deletedon'=>''
						    );
			
			$resultcontent = $this->generic_model->generic_insert('content',$content_data);
			$insert_id = $this->db->insert_id();

			$content_details_data=array(
						        'home_content_details_cid'=>trim($insert_id),
						        'home_content_details_title'=>trim($this->input->post('content_details_title')),
						        'home_content_details_desc'=>trim($this->input->post('content_details_desc')),
						        'home_content_details_readmore'=>trim($this->input->post('content_details_readmore')),
						        'home_content_details_section'=>$secId,
						        'home_content_details_status'=>'1',
						        'home_content_details_deleted'=>'0',
						        'home_content_details_createdon'=>date('Y-m-d H:i:s'),
						        'home_content_details_modifiedon'=>'',
						        'home_content_details_deletedon'=>''
						    );
			$resultcontentdetails = $this->generic_model->generic_insert('home_content_details',$content_details_data);
			//$result['home_content_data'] = $this->generic_model->get_record_oncontent('1');

			if($resultcontentdetails){
		    	$session_data = array(
						'message' => 'Content has successfully been added.'
						);
		    	$this->session->set_userdata('content', $session_data);
		    	redirect('admin/content/homecontentadd/7');
					
		    }else{
		    	$session_data = array(
						'message' => 'There went something wrong.'
						);
		    	$result['content']['message']=$session_data['message'];
		    	$cond=array(
	    			'home_content_details_cid' => '10',
	    			'home_content_details_section' => '1'
	    		);
	    		$result['home_first_section_data'] = $this->generic_model->get_record('home_content_details',$cond);
		    	$this->session->set_userdata('content', $session_data);
		    	$this->template->layout('admin','admincontenthomeviewaddedit',$result);
		    }
		}
	}

	public function setsection8($secId=false){
		$checkcontentres=$this->generic_model->check_content_home(10,$secId,'home_content_details');
		
		$checkcontentstatus=(!empty($checkcontentres['result']['statusid'])) ? $checkcontentres['result']['statusid'] : '';
		$content_details_id=(!empty($checkcontentres['result']['cdid'])) ? $checkcontentres['result']['cdid'] : '';
		/*echo $content_details_id;
		exit();*/

		if($checkcontentstatus=='101'){ //content home there in content table only

			$content_details_data=array(
						        'home_content_details_cid'=>'10',
						        'home_content_details_title'=>trim($this->input->post('content_details_title')),
						        'home_content_details_desc'=>trim($this->input->post('content_details_desc')),
						        'home_content_details_section'=>$secId,
						        'home_content_details_status'=>'1',
						        'home_content_details_deleted'=>'0',
						        'home_content_details_createdon'=>date('Y-m-d H:i:s'),
						        'home_content_details_modifiedon'=>'',
						        'home_content_details_deletedon'=>''
						    );
			$resultcontentdetails = $this->generic_model->generic_insert('home_content_details',$content_details_data);

			if($resultcontentdetails){
		    	$session_data = array(
						'message' => 'Content has successfully been added.'
						);
		    	$this->session->set_userdata('content', $session_data);
		    	redirect('admin/content/homecontentadd/8');
					
		    }else{
		    	$session_data = array(
						'message' => 'There went something wrong.'
						);
		    	//$this->session->set_userdata('content', $session_data);
		    	$result['content']['message']=$session_data['message'];
		    	$this->template->layout('admin','admincontenthomeviewaddedit',$result);
		    }

		}

		if($checkcontentstatus=='102'){ //content home and section there in content details table only

				$content_details_data=array(
							        
							        'home_content_details_title'=>trim($this->input->post('content_details_title')),
							        'home_content_details_desc'=>trim($this->input->post('content_details_desc')),
							        'home_content_details_modifiedon'=>date('Y-m-d H:i:s')
							    );
	    
			    $resultcontentdetails=$this->generic_model->generic_update_tbl('home_content_details',$content_details_id,'home_content_details_id',$content_details_data); 
			    $qry=$this->db->last_query();
			    /*echo $qry;
			    exit();*/

			    if($resultcontentdetails){
			    	$session_data = array(
							'message' => 'Content has successfully been updated.'
							);
			    	$this->session->set_userdata('content', $session_data);
			    	redirect('admin/content/homecontentadd/8');
						
			    }else{
			    	$session_data = array(
							'message' => 'There went something wrong.'
							);
			    	//$this->session->set_userdata('content', $session_data);
			    	$cond=array(
		    			'home_content_details_cid' => '10',
		    			'home_content_details_section' => '1'
		    		);
		    		$result['home_first_section_data'] = $this->generic_model->get_record('home_content_details',$cond);

			    	$result['content']['message']=$session_data['message'];
			    	$this->template->layout('admin','admincontenthomeviewaddedit',$result);
			    }
	    
		}

		if($checkcontentstatus=='100'){ //content neither home nor section there in content details table only

			
			$content_data=array(
						        'content_page'=>trim($this->input->post('page')),
						        'content_status'=>'1',
						        'content_deleted'=>'0',
						        'content_createdon'=>date('Y-m-d H:i:s'),
						        'content_modifiedon'=>'',
						        'content_deletedon'=>''
						    );
			
			$resultcontent = $this->generic_model->generic_insert('content',$content_data);
			$insert_id = $this->db->insert_id();

			$content_details_data=array(
						        'home_content_details_cid'=>trim($insert_id),
						        'home_content_details_title'=>trim($this->input->post('content_details_title')),
						        'home_content_details_desc'=>trim($this->input->post('content_details_desc')),
						        'home_content_details_section'=>$secId,
						        'home_content_details_status'=>'1',
						        'home_content_details_deleted'=>'0',
						        'home_content_details_createdon'=>date('Y-m-d H:i:s'),
						        'home_content_details_modifiedon'=>'',
						        'home_content_details_deletedon'=>''
						    );
			$resultcontentdetails = $this->generic_model->generic_insert('home_content_details',$content_details_data);
			//$result['home_content_data'] = $this->generic_model->get_record_oncontent('1');

			if($resultcontentdetails){
		    	$session_data = array(
						'message' => 'Content has successfully been added.'
						);
		    	$this->session->set_userdata('content', $session_data);
		    	redirect('admin/content/homecontentadd/8');
					
		    }else{
		    	$session_data = array(
						'message' => 'There went something wrong.'
						);
		    	$result['content']['message']=$session_data['message'];
		    	$cond=array(
	    			'home_content_details_cid' => '10',
	    			'home_content_details_section' => '1'
	    		);
	    		$result['home_first_section_data'] = $this->generic_model->get_record('home_content_details',$cond);
		    	$this->session->set_userdata('content', $session_data);
		    	$this->template->layout('admin','admincontenthomeviewaddedit',$result);
		    }
		}
	}

	public function setsection9($secId=false){
		if(!empty($this->input->post('listid'))){
			$listid=$this->input->post('listid');
		}
		$checkcontentres=$this->generic_model->check_content_home_lists(10,$secId,'home_content_imglists_second',$listid);
		
		$checkcontentstatus=(!empty($checkcontentres['result']['statusid'])) ? $checkcontentres['result']['statusid'] : '';
		$content_details_id=(!empty($checkcontentres['result']['cdid'])) ? $checkcontentres['result']['cdid'] : '';
		/*echo $content_details_id;
		exit();*/

		$data=array();
		$filename='';
		$content_data=array();
		$content_details_data=array();
		//$content_details_id = $this->input->post('cdid');
		if(!empty($_FILES['userfile']['name']) && $checkcontentstatus != ''){
			$config = array(
			'upload_path' => "./uploads/",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'overwrite' => TRUE,
			'encrypt_name' => TRUE,
			'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' => "975",
			'max_width' => "1920"
			);
			
			$this->load->library('upload', $config);
			if($this->upload->do_upload())
			{
				$data = array('upload_data' => $this->upload->data());
				$filename=$data['upload_data']['file_name'];

			}
		}

		if($checkcontentstatus=='101'){ //content home there in content table only

			$content_details_data=array(
						        'home_content_imglists_second_cid'=>'10',
						        'home_content_imglists_second_title'=>trim($this->input->post('content_details_title')),
						        'home_content_imglists_second_desc'=>trim($this->input->post('content_details_desc')),
						        
						        'home_content_imglists_second_filename'=>$filename,
						        'home_content_imglists_second_readmore'=>trim($this->input->post('content_details_readmore')),
						        
						        'home_content_imglists_second_section'=>$secId,
						        'home_content_imglists_second_listid'=>$listid,
						        'home_content_imglists_second_status'=>trim($this->input->post('content_details_status')),
						        'home_content_imglists_second_deleted'=>$this->input->post('content_details_deleted'),
						        'home_content_imglists_second_createdon'=>date('Y-m-d H:i:s'),
						        'home_content_imglists_second_modifiedon'=>'',
						        'home_content_imglists_second_deletedon'=>''
						    );
			$resultcontentdetails = $this->generic_model->generic_insert('home_content_imglists_second',$content_details_data);

			if($resultcontentdetails){
		    	$session_data = array(
						'message' => 'Content has successfully been added.'
						);
		    	$this->session->set_userdata('content', $session_data);
		    	redirect('admin/content/homecontentadd/9');
					
		    }else{
		    	$session_data = array(
						'message' => 'There went something wrong.'
						);
		    	//$this->session->set_userdata('content', $session_data);
		    	$result['content']['message']=$session_data['message'];
		    	$this->template->layout('admin','admincontenthomeviewaddedit',$result);
		    }

		}

		if($checkcontentstatus=='102'){ //content home and section there in content details table only
				if(!empty($filename)){
					$content_details_data=array(
							        
							        'home_content_imglists_second_title'=>trim($this->input->post('content_details_title')),
							        'home_content_imglists_second_desc'=>trim($this->input->post('content_details_desc')),

							        'home_content_imglists_second_filename'=>$filename,
							        'home_content_imglists_second_readmore'=>trim($this->input->post('content_details_readmore')),

							        'home_content_imglists_second_status'=>trim($this->input->post('content_details_status')),
							        'home_content_imglists_second_deleted'=>$this->input->post('content_details_deleted'),
							        'home_content_imglists_second_modifiedon'=>date('Y-m-d H:i:s')
							    );
				}else{
					$content_details_data=array(
							        
							        'home_content_imglists_second_title'=>trim($this->input->post('content_details_title')),
							        'home_content_imglists_second_desc'=>trim($this->input->post('content_details_desc')),
							        'home_content_imglists_second_readmore'=>trim($this->input->post('content_details_readmore')),
							        

							        'home_content_imglists_second_status'=>trim($this->input->post('content_details_status')),
							        'home_content_imglists_second_deleted'=>$this->input->post('content_details_deleted'),
							        'home_content_imglists_second_modifiedon'=>date('Y-m-d H:i:s')
							    );
				}
				
	    
			    $resultcontentdetails=$this->generic_model->generic_update_tbl('home_content_imglists_second',$content_details_id,'home_content_imglists_second_id',$content_details_data); 
			    //$qry=$this->db->last_query();
			    /*echo $qry;
			    exit();*/

			    if($resultcontentdetails){
			    	$session_data = array(
							'message' => 'Content has successfully been updated.'
							);
			    	$this->session->set_userdata('content', $session_data);
			    	redirect('admin/content/homecontentadd/9');
						
			    }else{
			    	$session_data = array(
							'message' => 'There went something wrong.'
							);
			    	//$this->session->set_userdata('content', $session_data);
			    	$cond=array(
		    			'home_content_imglists_second_cid' => '10',
		    			'home_content_imglists_second_section' => '9'
		    		);
		    		$result['home_ninth_section_data'] = $this->generic_model->get_record('home_content_imglists_second',$cond);

			    	$result['content']['message']=$session_data['message'];
			    	$this->template->layout('admin','admincontenthomeviewaddedit',$result);
			    }
	    
		}

		if($checkcontentstatus=='100'){ //content neither home nor section there in content details table only

			
			$content_data=array(
						        'content_page'=>trim($this->input->post('page')),
						        'content_status'=>'1',
						        'content_deleted'=>'0',
						        'content_createdon'=>date('Y-m-d H:i:s'),
						        'content_modifiedon'=>'',
						        'content_deletedon'=>''
						    );
			
			$resultcontent = $this->generic_model->generic_insert('content',$content_data);
			$insert_id = $this->db->insert_id();

			$content_details_data=array(
						        'home_content_imglists_second_cid'=>trim($insert_id),
						        'home_content_imglists_second_title'=>trim($this->input->post('content_details_title')),
						        'home_content_imglists_second_desc'=>trim($this->input->post('content_details_desc')),
						        
						        'home_content_imglists_second_filename'=>$filename,
						        'home_content_imglists_second_readmore'=>trim($this->input->post('content_details_readmore')),
						        

						        'home_content_imglists_second_section'=>$secId,
						        'home_content_imglists_second_listid'=>$listid,
						        'home_content_imglists_second_status'=>trim($this->input->post('content_details_status')),
						        'home_content_imglists_second_deleted'=>$this->input->post('content_details_deleted'),
						        'home_content_imglists_second_createdon'=>date('Y-m-d H:i:s'),
						        'home_content_imglists_second_modifiedon'=>'',
						        'home_content_imglists_second_deletedon'=>''
						    );
			$resultcontentdetails = $this->generic_model->generic_insert('home_content_imglists_second',$content_details_data);
			//$result['home_content_data'] = $this->generic_model->get_record_oncontent('1');

			if($resultcontentdetails){
		    	$session_data = array(
						'message' => 'Content has successfully been added.'
						);
		    	$this->session->set_userdata('content', $session_data);
		    	redirect('admin/content/homecontentadd/9');
					
		    }else{
		    	$session_data = array(
						'message' => 'There went something wrong.'
						);
		    	$result['content']['message']=$session_data['message'];
		    	$cond=array(
	    			'home_content_imglists_second_cid' => '10',
	    			'home_content_imglists_second_section' => '9'
	    		);
	    		$result['home_ninth_section_data'] = $this->generic_model->get_record('home_content_imglists_second',$cond);
		    	$this->session->set_userdata('content', $session_data);
		    	$this->template->layout('admin','admincontenthomeviewaddedit',$result);
		    }
		}
	}

	public function setsection10($secId=false){

		$checkcontentres=$this->generic_model->check_content_home(10,$secId,'home_content_details');
		
		$checkcontentstatus=(!empty($checkcontentres['result']['statusid'])) ? $checkcontentres['result']['statusid'] : '';
		$content_details_id=(!empty($checkcontentres['result']['cdid'])) ? $checkcontentres['result']['cdid'] : '';
		/*echo $content_details_id;
		exit();*/

		if($checkcontentstatus=='101'){ //content home there in content table only

			$content_details_data=array(
						        'home_content_details_cid'=>'10',
						        'home_content_details_title'=>trim($this->input->post('content_details_title')),
						        'home_content_details_desc'=>trim($this->input->post('content_details_desc')),
						        'home_content_details_section'=>$secId,
						        'home_content_details_status'=>'1',
						        'home_content_details_deleted'=>'0',
						        'home_content_details_createdon'=>date('Y-m-d H:i:s'),
						        'home_content_details_modifiedon'=>'',
						        'home_content_details_deletedon'=>''
						    );
			$resultcontentdetails = $this->generic_model->generic_insert('home_content_details',$content_details_data);

			if($resultcontentdetails){
		    	$session_data = array(
						'message' => 'Content has successfully been added.'
						);
		    	$this->session->set_userdata('content', $session_data);
		    	redirect('admin/content/homecontentadd/10');
					
		    }else{
		    	$session_data = array(
						'message' => 'There went something wrong.'
						);
		    	//$this->session->set_userdata('content', $session_data);
		    	$result['content']['message']=$session_data['message'];
		    	$this->template->layout('admin','admincontenthomeviewaddedit',$result);
		    }

		}

		if($checkcontentstatus=='102'){ //content home and section there in content details table only

				$content_details_data=array(
							        
							        'home_content_details_title'=>trim($this->input->post('content_details_title')),
							        'home_content_details_desc'=>trim($this->input->post('content_details_desc')),
							        'home_content_details_modifiedon'=>date('Y-m-d H:i:s')
							    );
	    
			    $resultcontentdetails=$this->generic_model->generic_update_tbl('home_content_details',$content_details_id,'home_content_details_id',$content_details_data); 
			    $qry=$this->db->last_query();
			    /*echo $qry;
			    exit();*/

			    if($resultcontentdetails){
			    	$session_data = array(
							'message' => 'Content has successfully been updated.'
							);
			    	$this->session->set_userdata('content', $session_data);
			    	redirect('admin/content/homecontentadd/10');
						
			    }else{
			    	$session_data = array(
							'message' => 'There went something wrong.'
							);
			    	//$this->session->set_userdata('content', $session_data);
			    	$cond=array(
		    			'home_content_details_cid' => '10',
		    			'home_content_details_section' => '1'
		    		);
		    		$result['home_first_section_data'] = $this->generic_model->get_record('home_content_details',$cond);

			    	$result['content']['message']=$session_data['message'];
			    	$this->template->layout('admin','admincontenthomeviewaddedit',$result);
			    }
	    
		}

		if($checkcontentstatus=='100'){ //content neither home nor section there in content details table only

			
			$content_data=array(
						        'content_page'=>trim($this->input->post('page')),
						        'content_status'=>'1',
						        'content_deleted'=>'0',
						        'content_createdon'=>date('Y-m-d H:i:s'),
						        'content_modifiedon'=>'',
						        'content_deletedon'=>''
						    );
			
			$resultcontent = $this->generic_model->generic_insert('content',$content_data);
			$insert_id = $this->db->insert_id();

			$content_details_data=array(
						        'home_content_details_cid'=>trim($insert_id),
						        'home_content_details_title'=>trim($this->input->post('content_details_title')),
						        'home_content_details_desc'=>trim($this->input->post('content_details_desc')),
						        'home_content_details_section'=>$secId,
						        'home_content_details_status'=>'1',
						        'home_content_details_deleted'=>'0',
						        'home_content_details_createdon'=>date('Y-m-d H:i:s'),
						        'home_content_details_modifiedon'=>'',
						        'home_content_details_deletedon'=>''
						    );
			$resultcontentdetails = $this->generic_model->generic_insert('home_content_details',$content_details_data);
			//$result['home_content_data'] = $this->generic_model->get_record_oncontent('1');

			if($resultcontentdetails){
		    	$session_data = array(
						'message' => 'Content has successfully been added.'
						);
		    	$this->session->set_userdata('content', $session_data);
		    	redirect('admin/content/homecontentadd/10');
					
		    }else{
		    	$session_data = array(
						'message' => 'There went something wrong.'
						);
		    	$result['content']['message']=$session_data['message'];
		    	$cond=array(
	    			'home_content_details_cid' => '10',
	    			'home_content_details_section' => '1'
	    		);
	    		$result['home_first_section_data'] = $this->generic_model->get_record('home_content_details',$cond);
		    	$this->session->set_userdata('content', $session_data);
		    	$this->template->layout('admin','admincontenthomeviewaddedit',$result);
		    }
		}
	}


	public function sethomecontentadd($secId=false){
		
	  /*print '----<pre>';
	  print_r($secId);
	  exit();*/
	  if(!empty($this->input->post())){
	  	
	  	if($secId){
	  		/*echo 'res: '.$secId;
	  		exit();*/
	  	  $this->homedistributor($secId);
	    }
		
	  }else{

	  	//$slider_id = $this->input->post('id');
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
	    /*print '<pre>';
			print_r($this->db->last_query());
			print_r($result['home_sixth_section_data']);
			print '</pre>';
	  		exit();*/


	  	$this->template->layout('admin','admincontenthomeviewaddedit',$result);	
	  }
	}



	public function setothercontentsecondadd($secId=false){
		
	  /*print '----<pre>';
	  print_r($secId);
	  exit();*/
	  if(!empty($this->input->post())){
	  	
	  	if($secId){
	  		/*echo 'res: '.$secId;
	  		exit();*/
	  	  $this->otherdistributor($secId);
	    }
		
	  }else{


	  	$condlists=array(
	    			'content.content_page' => 'others',
	    			'others_content_lists_deleted' => '0'
	    		);
	  	
	    $result['others_second_section_data'] = $this->generic_model->get_record_about('others_content_lists',$condlists);
	    

	  	$this->template->layout('admin','admincontentaboutviewaddedit',$result);	
	  }
	}


	public function setaboutcontentadd($secId=false){
		
	  /*print '----<pre>';
	  print_r($secId);
	  exit();*/
	  if(!empty($this->input->post())){
	  	
	  	if($secId){
	  		/*echo 'res: '.$secId;
	  		exit();*/
	  	  $this->aboutdistributor($secId);
	    }
		
	  }else{


	  	$condlists=array(
	    			'content.content_page' => 'about',
	    			'about_content_lists_deleted' => '0'
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







	  	//$slider_id = $this->input->post('id');
	    /*$cond=array(
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
	    		);*/





	    

	    $result['about_first_section_data'] = $this->generic_model->get_record_about('about_content_lists',$condlists);
	    $result['about_second_section_data'] = $this->generic_model->get_record_about('about_content_images',$condimg);
	    $result['about_third_section_data'] = $this->generic_model->get_record_about('about_content_details',$condthird);

	    /*echo $this->db->last_query();
	    exit();*/
	    $result['about_fourth_section_data'] = $this->generic_model->get_record_about('about_content_imglists',$condimglists);
	    $result['about_fifth_section_data'] = $this->generic_model->get_record_about('about_content_details',$condfifth);
	    /*echo $this->db->last_query();
	    exit();*/







	    /*$result['home_first_section_data'] = $this->generic_model->get_record('home_content_details',$cond);

	    $result['home_frst_section_data'] = $this->generic_model->get_record('home_content_details',$condfirst);
	    $result['home_second_section_data'] = $this->generic_model->get_record('home_content_details',$condsecond);
	    $result['home_fifth_section_data'] = $this->generic_model->get_record('home_content_details',$condfifth);

	    $result['home_third_section_data'] = $this->generic_model->get_record('home_content_images',$condimg);
	    $result['home_fourth_section_data'] = $this->generic_model->get_record('home_content_lists',$condlists);
	    $result['home_sixth_section_data'] = $this->generic_model->get_record('home_content_imglists',$condimglists);
	    $result['home_seventh_section_data'] = $this->generic_model->get_record('home_content_details',$condseventh);
	    $result['home_eighth_section_data'] = $this->generic_model->get_record('home_content_details',$condeighth);
	    $result['home_ninth_section_data'] = $this->generic_model->get_record('home_content_imglists_second',$condimglistssecond);
	    $result['home_tenth_section_data'] = $this->generic_model->get_record('home_content_details',$condtenth);*/
	    	/*print '<pre>';
			print_r($this->db->last_query());
			print_r($result['home_sixth_section_data']);
			print '</pre>';
	  		exit();*/


	  	$this->template->layout('admin','admincontentaboutviewaddedit',$result);	
	  }
	}

	public function setnewscontentadd($secId=false){
		
	  /*print '----<pre>';
	  print_r($secId);
	  exit();*/
	  if(!empty($this->input->post())){
	  	
	  	if($secId){
	  		/*echo 'res: '.$secId;
	  		exit();*/
	  	  $this->newsdistributor($secId);
	    }
		
	  }else{

	  	$condimglists=array(
	    			'content.content_page' => 'news',
	    			'news_content_imglists.news_content_imglists_deleted' => '0'
	    		);
	  	

	    
	    $result['news_first_section_data'] = $this->generic_model->get_record_about('news_content_imglists',$condimglists);
	    /*echo $this->db->last_query();
	    exit();*/

	  	$this->template->layout('admin','admincontentnewsviewaddedit',$result);	
	  }
	}

	public function sethomecontentedit(){
		
	    
	}

	public function update_statusoncontent(){
	    $status = $this->input->post('status');
	    $content_id = $this->input->post('id');
	    $stat=$this->generic_model->update_statusoncontent($content_id,$status,'status');

	}

	public function update_delete_statusoncontent(){

	    $status = $this->input->post('status');
	    $content_id = $this->input->post('id');
	    $stat=$this->generic_model->update_statusoncontentdetails($content_id,$status,'delete');
	    
	}


	public function getothercontent()
	{
		
		//$result['home_content_data'] = $this->generic_model->get_record_oncontent('1');
		/*print '<pre>';
		print_r($result);
		print '</pre>';
		exit();	*/

	    $condlists=array(
	    			'content_details_cid' => $pageId
	    		);
	    
	    $result['other_section_data'] = $this->generic_model->get_record('content_details',$condlists);

	    $condlists=array(
	    			'content.content_page' => 'other',
	    			'other_content_lists.other_content_lists_deleted' => '0'
	    		);
		


	    $result['other_second_section_data'] = $this->generic_model->get_record_about('other_content_lists',$condlists);
	    
		$this->template->layout('admin','admincontentotherview',$result);

	}

	public function setothercontentaddpage(){

	  if(!empty($this->input->post())){
	  	
	    $content_data=array(
						        'content_page'=>trim($this->input->post('content_details_page')),
						        'content_status'=>'1',
						        'content_deleted'=>'0',
						        'content_createdon'=>date('Y-m-d H:i:s'),
						        'content_modifiedon'=>'',
						        'content_deletedon'=>''
						    );
			
			$resultcontent = $this->generic_model->generic_insert('content',$content_data);
			$insert_id = $this->db->insert_id();

			if($resultcontent){
		    	$session_data = array(
						'message' => 'Content page has successfully been added.'
						);
		    	$this->session->set_userdata('content', $session_data);
		    	redirect('admin/content/othercontentadd');
					
		    }else{
		    	$session_data = array(
						'message' => 'There went something wrong.'
						);
		    	$result['content']['message']=$session_data['message'];
		    	
		    	$this->session->set_userdata('content', $session_data);
		    	$this->template->layout('admin','admincontentotherviewaddedit',$result);
		    }
		
	  }else{
	  	$this->template->layout('admin','admincontentotherviewaddedit',$result);	
	  }
		
	}

	public function setmenuadd(){

	  if(!empty($this->input->post())){
	  	
	    $content_data=array(
						        'menu_title'=>trim($this->input->post('menu_title')),
						        'menu_link'=>$this->input->post('menu_link'),
						        'menu_pid'=>trim($this->input->post('menu_pid')),
						        'menu_cid'=>trim($this->input->post('menu_cid')),
						        'menu_status'=>'1',
						        'menu_deleted'=>'0',
						        'menu_createdon'=>date('Y-m-d H:i:s'),
						        'menu_modifiedon'=>'',
						        'menu_deletedon'=>''
						    );
			
			$resultcontent = $this->generic_model->generic_insert('menu',$content_data);
			
			$insert_id = $this->db->insert_id();

			if($resultcontent){
		    	$session_data = array(
						'message' => 'Menu has successfully been added.'
						);
		    	$this->session->set_userdata('content', $session_data);
		    	redirect('admin/content/menu');
					
		    }else{
		    	$session_data = array(
						'message' => 'There went something wrong.'
						);
		    	$result['content']['message']=$session_data['message'];
		    	
		    	$this->session->set_userdata('content', $session_data);
		    	$this->template->layout('admin','adminmenuviewaddedit',$result);
		    	
		    }
		
	  }else{
	  	$condmenucont=array(
	    			'menu_deleted' => '0'
	    		);
	  	$condcont=array(
	    			'content_deleted' => '0',
	    			'content_status' => '1'
	    		);
	    
	    $result['menu_data'] = $this->generic_model->get_record('menu',$condmenucont);
	    $result['content_data'] = $this->generic_model->get_record('content',$condcont);
	  	$this->template->layout('admin','adminmenuviewaddedit',$result);	
	  }
		
	}

	//footer menu
	public function fsetmenuadd(){

	  if(!empty($this->input->post())){
	  	
	    $content_data=array(
						        'fmenu_title'=>trim($this->input->post('menu_title')),
						        'fmenu_link'=>trim($this->input->post('menu_link')),
						        'fmenu_pid'=>trim($this->input->post('menu_pid')),
						        'fmenu_cid'=>trim($this->input->post('menu_cid')),
						        'fmenu_status'=>'1',
						        'fmenu_deleted'=>'0',
						        'fmenu_createdon'=>date('Y-m-d H:i:s'),
						        'fmenu_modifiedon'=>'',
						        'fmenu_deletedon'=>''
						    );
			
			$resultcontent = $this->generic_model->generic_insert('fmenu',$content_data);
			$insert_id = $this->db->insert_id();

			if($resultcontent){
		    	$session_data = array(
						'message' => 'Footer menu has successfully been added.'
						);
		    	$this->session->set_userdata('content', $session_data);
		    	redirect('admin/content/fmenu');
					
		    }else{
		    	$session_data = array(
						'message' => 'There went something wrong.'
						);
		    	$result['content']['message']=$session_data['message'];
		    	
		    	$this->session->set_userdata('content', $session_data);
		    	$this->template->layout('admin','adminfmenuviewaddedit',$result);
		    	
		    }
		
	  }else{

	  	$condmenucont=array(
	    			'fmenu_deleted' => '0'
	    		);
	  	$condcont=array(
	    			'content_deleted' => '0',
	    			'content_status' => '1'
	    		);
	    
	    $result['menu_data'] = $this->generic_model->get_record('fmenu',$condmenucont);
	    $result['content_data'] = $this->generic_model->get_record('content',$condcont);

	  	/*$condcont=array(
	    			'fmenu_deleted' => '0'
	    		);
	    
	    $result['menu_data'] = $this->generic_model->get_record('fmenu',$condcont);*/
	  	$this->template->layout('admin','adminfmenuviewaddedit',$result);	
	  }
		
	}

	//page view
	public function setpageadd(){

	  if(!empty($this->input->post())){
	  	
	    $content_data=array(
						        'content_page'=>trim($this->input->post('content_page')),
						        'content_status'=>'1',
						        'content_deleted'=>'0',
						        'content_createdon'=>date('Y-m-d H:i:s'),
						        'content_modifiedon'=>'',
						        'content_deletedon'=>''
						    );
			
			$resultcontent = $this->generic_model->generic_insert('content',$content_data);
			
			$insert_id = $this->db->insert_id();

			if($resultcontent){
		    	$session_data = array(
						'message' => 'Page has successfully been added.'
						);
		    	$this->session->set_userdata('content', $session_data);
		    	redirect('admin/content/page');
					
		    }else{
		    	$session_data = array(
						'message' => 'There went something wrong.'
						);
		    	$result['content']['message']=$session_data['message'];
		    	
		    	$this->session->set_userdata('content', $session_data);
		    	$this->template->layout('admin','adminpageviewaddedit',$result);
		    	
		    }
		
	  }else{
	  	$condpagecont=array(
	    			'content_deleted' => '0'
	    		);
	  	
	    
	    $result['page_data'] = $this->generic_model->get_record('content',$condpagecont);
	    
	  	$this->template->layout('admin','adminpageviewaddedit',$result);	
	  }
		
	}


	

	public function setothercontentadd(){
		
		/*echo "abc";
		exit();*/
		$condcont=array(
	    			'content_id != ' => '10',
	    			'content_deleted' => '0'
	    		);
	    
	    $result['other_section_content_data'] = $this->generic_model->get_record('content',$condcont);


	  if(!empty($this->input->post())){
	  	/*print '<pre>';
		    print_r($_POST);
		    exit();*/
	  	$contentdetails_id=!empty($this->input->post('content_details_id')) ? $this->input->post('content_details_id') : '';
	  	$contentdetails_cid=!empty($this->input->post('content_details_cid')) ? $this->input->post('content_details_cid') : '';
	  	//$result['content_id'] = $contentdetails_cid;

	  	if(!empty($this->input->post('submit') == 'search')){
	  		 /*echo "kkkk";
	  		 exit();*/
		  	    $condlists=array(
		    			'content_details_cid' => $contentdetails_cid,
		    			'content_details_deleted' => '0'
		    		);
		    $result['other_section_data'] = $this->generic_model->get_record('content_details',$condlists);
		    $result['contentdetails_cid'] = $contentdetails_cid;
		    //echo 'kjhkjhkjh';exit();
		    $this->template->layout('admin','admincontentotherviewaddedit',$result);	
		    /*print '<pre>';
		    print_r($result);
		    exit();*/
	    }else if(!empty($this->input->post('submit') == 'submit')){
	      $this->requestdistributor($contentdetails_id,$contentdetails_cid);
	    }else if(!empty($this->input->post('submit') == 'submitsecond')){
	      $this->otherdistributor(2);
	    }else if(!empty($this->input->post('submit') == 'searchsecond')){
	    	$contentdetails_second_cid=!empty($this->input->post('content_details_select_cid')) ? $this->input->post('content_details_select_cid') : '';
	    	$condlists=array(
	    			'other_content_lists_cid' => $contentdetails_second_cid,
	    			'other_content_lists_deleted' => '0'
	    		);
	    	$result['other_second_section_data'] = $this->generic_model->get_record_about('other_content_lists',$condlists);
	    	$result['contentdetails_second_cid'] = $contentdetails_second_cid;
	    	//print $result['contentdetails_second_cid'];
	    	//die();
	    	$this->template->layout('admin','admincontentotherviewaddedit',$result);	 

	    }else{

	    }
		
	  }else{
	  	
	   $this->template->layout('admin','admincontentotherviewaddedit',$result);	 
	    /*print '<pre>';
			print_r($this->db->last_query());
			print_r($result['other_section_content_data']);
			print '</pre>';
	  		exit();*/
	  }
	   

	    /*print '<pre>';
			print_r($this->db->last_query());
			print_r($result);
			print '</pre>';
	  		exit();*/

	   
		
	}

	//contact
	public function setcontactaddedit(){
	    
	    $result['contact_data'] = $this->generic_model->get_record('contact');

	  if(!empty($this->input->post())){
	  	/*print '<pre>';
		    print_r($_POST);
		    exit();*/
	  	$contact_id=!empty($this->input->post('id')) ? $this->input->post('id') : '';
	  	
	    $this->requestdistributorgen($contact_id);
		
	  }else{
	  	
	   $this->template->layout('admin','admincontactviewaddedit',$result);	 
	    	/*print '<pre>';
			print_r($this->db->last_query());
			print_r($result);
			print '</pre>';
	  		exit();*/
	  }
		
	}

	//social
	public function setsocialaddedit(){
	    
	    $result['contact_data'] = $this->generic_model->get_record('contact');

	  if(!empty($this->input->post())){
	  	/*print '<pre>';
		    print_r($_POST);
		    exit();*/
	  	$contact_id=!empty($this->input->post('id')) ? $this->input->post('id') : '';
	  	
	    $this->requestdistributorsoc($contact_id);
		
	  }else{
	  	
	   $this->template->layout('admin','adminsocialviewaddedit',$result);	 
	    	/*print '<pre>';
			print_r($this->db->last_query());
			print_r($result);
			print '</pre>';
	  		exit();*/
	  }
		
	}

	public function notificationread($app_id=false)
	{
		$notification_data=array(
						        'notification_read'=>'1',
						        'notification_modifiedon'=>date('Y-m-d H:i:s')
						    );
			    /*$resultcontentdetailsnot = $this->generic_model->generic_insert('notification',$notification_data);*/
			    $resultnotifyread = $this->generic_model->generic_update_tbl('notification',$app_id,'notification_app_id',$notification_data);

			    if($resultnotifyread){
			    	redirect('admin/content/appointment/'.$app_id);
			    }
			    


	}


	
}
