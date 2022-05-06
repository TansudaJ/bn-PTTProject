<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zones extends CI_Controller {

    public function zone()
	{
		$this->load->model('ZoneModel');
		$tmp = $this->ZoneModel->get_all_zone();
		//$tmp2 = $this->UserModel->check_username_password('111','222');
		
//		var_dump($tmp);

		$data = array('navbar_name'=>'จัดการข้อมูลโซน');
		$data_top = array('activebar'=>'zone');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		//$this->load->view('users/user_form');
		//$page_data = array('userList'=>$tmp,'datatml2'=>$tmp2);
		$page_data['zoneList'] = $tmp;
		//$page_data['datatmp2'] = $tmp2;

		$this->load->view('zones/zone_list',$page_data);

		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
	}

    public function new_zone()
	{
		//$this->checklogin();
		//$this->load->view('welcome_message');
		$this->load->model('ZoneModel');
		$tmp = $this->ZoneModel->get_all_zone();
		$tmpz = $this->ZoneModel->getzoneList();
		//$tmp2 = $this->UserModel->check_username_password('111','222');
		
		//var_dump($tmp);die();

		$data = array('navbar_name'=>'จัดการข้อมูลโซน');
		$data_top = array('activebar'=>'zone');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		//$this->load->view('users/user_form');
		//$page_data = array('userList'=>$tmp,'datatml2'=>$tmp2);
		$page_data['zoneForm'] = $tmp;
		$page_data['zoneList'] = $tmpz;
		//$page_data['datatmp2'] = $tmp2;

		$this->load->view('zones/zone_form',$page_data);

		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
	}


	public function new_zone_add()
	{
		$zoneID = null;
		$nameEN = $_POST["nameEN"];
		$nameTH = $_POST["nameTH"];
		$detail = $_POST["detail"];
		$status = $_POST["status"];
		$้headzoneID = $_POST["headzoneID"];

		
		$data = array(
			"zoneID"=>$zoneID, 
			"nameEN"=>$nameEN, 
			"nameTH"=>$nameTH,
			"detail"=>$detail,
			"status"=>$status,
			"headzoneID"=>$้headzoneID
		);
		
		$this->load->model('ZoneModel');
		$tmp = $this->ZoneModel->insert_zone($data);
		if($tmp){
			$this->session->set_flashdata('message_error', 'เพิ่มโซนสำเร็จ');
			redirect('Zones/zone');

		}else{
			$this->session->set_flashdata('message_error', 'เพิ่มโซนไม่สำเร็จ');
			redirect('Zones/zone');
		}

	}

}