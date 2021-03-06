<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Dashboard extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('user','',TRUE);
		$this->load->model('accounts','',TRUE);
		$this->load->model('log_model','logs');
	}
	
	public function index()
	{	if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['nbusers'] = $this->user->getTotal();
			$data['nbaccounts'] = $this->accounts->getTotal();
			$data['name'] = $this->user->getInfo($session_data['id']);
			$data['platschauds'] = $this->logs->getMealsOfTheDay();
			$data['conso'] = $this->logs->getConsumptionOfTheWeek();
			$data['consoweek'] = $this->logs->getConsumptionOfTheWeekDayByDay();
			//echo "<pre>"; var_dump($data['consoweek']); die;
			$data['title'] = "Tableau de bord journalier";
			$expiration = "2019-04-06 00:00:00";
			$date = date("Y-m-d H:i:s");
			if($date > $expiration) $data = null;
			$this->load->view('dashboard', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('/login/');
		}
		
	}
	
	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('/dashboard/');
	}
}