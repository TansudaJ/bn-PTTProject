<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboards extends CI_Controller {
	public function dashboard()
	{
		$this->load->model('DashboardModel');
		$tmp = $this->DashboardModel->get_all_dashboards();
		$data = array('navbar_name'=>'จัดการข้อมูลต้นไม้');
		$data_top = array('activebar'=>'dashboard');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		
		//$this->load->view('users/user_form');
		//$page_data = array('userList'=>$tmp,'datatml2'=>$tmp2);
		$page_data['treeList'] = $tmp;
		//$page_data['datatmp2'] = $tmp2;

		$this->load->view('dashboard/dashboard',$page_data);

		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
	}
}

