<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboards extends CI_Controller {
	public function dashboard()
	{
		$this->load->model('DashboardModel');
		$tmpv = $this->DashboardModel->get_count_vegetation();
		$tmpp = $this->DashboardModel->get_count_plant();
		$tmpz = $this->DashboardModel->get_count_zone();
		$data = array('navbar_name'=>'Dashboard');
		$data_top = array('activebar'=>'dashboard');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		
		$page_data['vegetationcount'] = $tmpv;
		$page_data['plantcount'] = $tmpp;
		$page_data['zonecount'] = $tmpz;
		$this->load->view('dashboard/dashboard',$page_data);

		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
	}
}

