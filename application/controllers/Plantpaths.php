<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plantpaths extends CI_Controller {
    public function plantpath()
	{
		$this->load->model('PlantpathModel');
		$tmp = $this->PlantpathModel->get_all_plantpaths();
		//$tmp2 = $this->UserModel->check_username_password('111','222');
		
//		var_dump($tmp);

		$data = array('navbar_name'=>'จัดการข้อมูลส่วนประกอบ');
		$data_top = array('activebar'=>'plantpath');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		//$this->load->view('users/user_form');
		//$page_data = array('userList'=>$tmp,'datatml2'=>$tmp2);
		$page_data['plantpathList'] = $tmp;
		//$page_data['datatmp2'] = $tmp2;

		$this->load->view('plantpaths/plantpath_list',$page_data);

		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
	}

	public function new_plantpath()
	{
		//$this->checklogin();
		//$this->load->view('welcome_message');
		$this->load->model('PlantpathModel');
		$tmp = $this->PlantpathModel->get_all_plantpaths();
		//$tmp2 = $this->UserModel->check_username_password('111','222');
		
		//var_dump($tmp);die();

		$data = array('navbar_name'=>'จัดการข้อมูลส่วนประกอบ');
		$data_top = array('activebar'=>'plantpath');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		$page_data['plantpathForm'] = $tmp;

		$this->load->view('plantpaths/plantpath_form',$page_data);

		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
	}

}