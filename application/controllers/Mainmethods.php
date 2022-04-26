<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mainmethods extends CI_Controller {
    public function mainmethod()
	{
		$this->load->model('MainmethodModel');
		$tmp = $this->MainmethodModel->get_all_mainmethods();
		//$tmp2 = $this->UserModel->check_username_password('111','222');
		
//		var_dump($tmp);

		$data = array('navbar_name'=>'จัดการข้อมูลวิธีดูแลรักษา');
		$data_top = array('activebar'=>'mainmethod');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		//$this->load->view('users/user_form');
		//$page_data = array('userList'=>$tmp,'datatml2'=>$tmp2);
		$page_data['mainmethodList'] = $tmp;
		//$page_data['datatmp2'] = $tmp2;

		$this->load->view('mainmethods/mainmethod_list',$page_data);

		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
		
	}

    public function new_mainmethod()
	{
		$this->load->model('MainmethodModel');
		$tmp = $this->MainmethodModel->get_all_mainmethods();
		//$tmp2 = $this->UserModel->check_username_password('111','222');
		
//		var_dump($tmp);

		$data = array('navbar_name'=>'จัดการข้อมูลวิธีดูแลรักษา');
		$data_top = array('activebar'=>'mainmethod');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		//$this->load->view('users/user_form');
		//$page_data = array('userList'=>$tmp,'datatml2'=>$tmp2);
		$page_data['mainmethodForm'] = $tmp;
		//$page_data['datatmp2'] = $tmp2;

		$this->load->view('mainmethods/mainmethod_form',$page_data);

		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
	}

	public function new_mainmethod_add()
	{
		$data["maintenancetypeID"] = NULL;
		$data["n_maintenancetype"] = $_POST["n_maintenancetype"];
		$data["detail"] = $_POST["detail"];
		$data["recommend"] = $_POST["recommend"];
		
		$this->load->model('MainmethodModel');
		$tmp = $this->MainmethodModel->insert_mainmethod($data);
		if($tmp){
			$this->session->set_flashdata('message_error', 'เพิ่มวิธีการดูแลรักษาสำเร็จ');
			redirect('Mainmethods/mainmethod');

		}else{
			$this->session->set_flashdata('message_error', 'เพิ่มวิธีการดูแลรักษาไม่สำเร็จ');
			redirect('Mainmethods/mainmethod');
		}

	}

	
}