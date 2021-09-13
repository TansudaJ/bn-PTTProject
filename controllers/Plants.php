<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plants extends CI_Controller {
	public function plant()
	{
		$this->load->model('PlantModel');
		$tmp = $this->PlantModel->get_all_plants();
		//$tmp2 = $this->UserModel->check_username_password('111','222');
		
//		var_dump($tmp);

		$data = array('navbar_name'=>'จัดการข้อูลพรรณไม้');
		$data_top = array('activebar'=>'plant');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		//$this->load->view('users/user_form');
		//$page_data = array('userList'=>$tmp,'datatml2'=>$tmp2);
		$page_data['plantList'] = $tmp;
		//$page_data['datatmp2'] = $tmp2;

		$this->load->view('plants/plant_list',$page_data);

		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
	}

	public function new_plant()
	{
		//$this->checklogin();
		//$this->load->view('welcome_message');
		$this->load->model('PlantModel');
		$tmp = $this->PlantModel->get_all_plants();
		//$tmp2 = $this->UserModel->check_username_password('111','222');
		
		//var_dump($tmp);die();

		$data = array('navbar_name'=>'จัดการข้อูลพรรณไม้');
		$data_top = array('activebar'=>'plant');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		$page_data['plantForm'] = $tmp;

		$this->load->view('plants/plant_form',$page_data);

		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
	}

	public function new_plant_add()
	{
		//var_dump($_POST);
		$loname_region = $_POST["loname_region"];
		$loname_name = $_POST["loname_name"];
		$localname = array();
		foreach($loname_region as $id=>$regionID){
			$localname[$id] = array("regionID"=>$regionID,"name"=>$loname_name[ $id]);
		}
		
		$data["vegetationID"] = NULL;
		$data["n_common_TH"] = $_POST["THname"];
		$data["n_common_ENG"] 	= $_POST["ENname"];
		$data["n_scientific"] 	= $_POST["Sciname"];
		$data["n_family"] 	= $_POST["famname"];
		$data["appearance"] 	= $_POST["appearance"];
		$data["plant_origin"] = $_POST["origin"];
		$data["distribution"] = $_POST["distribution"];
		$data["type"] = $_POST["type"];
		$data["growth"] = $_POST["growth"];
		$data["shape"] 	= $_POST["shape"];
		$data["defoliation"] 	= $_POST["defoliation"];
		$data["flowering_period"] 	= $_POST["fperiod"];
		$data["reference"] = $_POST["reference"];
		$data["co2_storage"] = $_POST["co2_storage"];
		$data["propagation"] = $_POST["propagation"];
		$data["reference_data"] = $_POST["reference_data"];
		
		$this->load->model('PlantModel');
		$tmp = $this->PlantModel->insert_plant($data,$localname);
		if($tmp){
			$this->session->set_flashdata('message_error', 'เพิ่มพันธุ์ไม้สำเร็จ');
			redirect('Plants/plant');

		}else{
			$this->session->set_flashdata('message_error', 'เพิ่มพันธุ์ไม้ไม่สำเร็จ');
			redirect('Plants/plant');
		}

	}
}
