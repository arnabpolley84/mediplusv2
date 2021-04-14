<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminlogin extends CI_Controller {

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

	public function __construct() {
		parent::__construct();

			// Load database
			//$this->load->model('generic_model');
	}

	public function index()
	{
		$this->load->view('admin/adminloginview');
	}

	// Check for user login process
	public function user_login_process() {

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('admin/adminhomeview');
			}else{
				$this->load->view('admin/adminloginview');
			}
		} else {
			$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
			);
			$result = $this->generic_model->login($data);
			//$qry=$this->db->last_query();
			/*print '<pre>';
			print_r($qry);
			print '</pre>';*/
			if ($result == TRUE) {

				$username = $this->input->post('username');
				$result = $this->generic_model->read_user_information($username);
				if ($result != false) {
					$session_data = array(
					'username' => $result[0]->user_name,
					'message' => 'Welcome '.$result[0]->user_name.', you are successfully logged in!'
					);
					// Add user data in session
					$this->session->set_userdata('logged_in', $session_data);
					//$this->load->view('admin/adminhomeview');
					redirect('/admin/');
				}
			} else {
				$data = array(
				'error_message' => 'Invalid Username or Password'
				);
				$this->load->view('admin/adminloginview', $data);
				//redirect('/admin/login/');
			}
		}
	}

	// Logout from admin page
	public function logout() {

		// Removing session data
		$sess_array = array(
		'username' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		$data['message_display'] = 'Successfully Logout';
		$this->load->view('admin/adminloginview', $data);
	}

}
