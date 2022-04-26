<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mainmethods extends CI_Controller {
    public function maintenance()
	{
		$this->load->model('MaintenanceModel');
		$tmp = $this->MaintenanceModel->get_all_maintenance();
		//$tmp2 = $this->UserModel->check_username_password('111','222');
		
//		var_dump($tmp);

		$data = array('navbar_name'=>'จัดการข้อมูลวิธีดูแลรักษา');
		$data_top = array('activebar'=>'maintenance');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		//$this->load->view('users/user_form');
		//$page_data = array('userList'=>$tmp,'datatml2'=>$tmp2);
		$page_data['maintenanceList'] = $tmp;
		//$page_data['datatmp2'] = $tmp2;

		$this->load->view('maintenances/maintenance_list',$page_data);

		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
		
	}

    public function new_maintenance()
	{
		$this->load->model('MaintenanceModel');
		$tmp = $this->MaintenanceModel->get_all_maintenance();
		//$tmp2 = $this->UserModel->check_username_password('111','222');
		
//		var_dump($tmp);

		$data = array('navbar_name'=>'จัดการข้อมูลวิธีดูแลรักษา');
		$data_top = array('activebar'=>'maintenance');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		//$this->load->view('users/user_form');
		//$page_data = array('userList'=>$tmp,'datatml2'=>$tmp2);
		$page_data['maintenanceForm'] = $tmp;
		//$page_data['datatmp2'] = $tmp2;

		$this->load->view('maintenances/maintenance_form',$page_data);

		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
	}
}