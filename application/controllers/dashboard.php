<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Dashboard extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('user','',TRUE);
	}
	
	public function index()
	{	if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['name'] = $this->user->getInfo($session_data['id']);
			$data['title'] = "Dashboard";
			$data['menu'] = $this->load->view('menu', NULL, TRUE);
			$data['menu'] = $this->load->view('menu', NULL, TRUE);
			$this->load->view('dashboard', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
		
	}
	
	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('dashboard', 'refresh');
	}
}