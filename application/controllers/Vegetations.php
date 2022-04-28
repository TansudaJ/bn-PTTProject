<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vegetations extends CI_Controller {
	public function vegetation()
	{
		$this->load->model('VegetationModel');
		$tmp = $this->VegetationModel->get_all_vegetations();
		//$tmp2 = $this->UserModel->check_username_password('111','222');
		
//		var_dump($tmp);

		$data = array('navbar_name'=>'จัดการข้อมูลพันธุ์ไม้');
		$data_top = array('activebar'=>'vegetation');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		//$this->load->view('users/user_form');
		//$page_data = array('userList'=>$tmp,'datatml2'=>$tmp2);
		$page_data['vegetationList'] = $tmp;
		//$page_data['datatmp2'] = $tmp2;

		$this->load->view('vegetations/vegetation_list',$page_data);

		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
	}

	public function new_vegetation()
	{
		//$this->checklogin();
		//$this->load->view('welcome_message');
		$this->load->model('VegetationModel');
		$tmp = $this->VegetationModel->get_all_vegetations();
		$tmpp = $this->VegetationModel->get_all_plantpaths();
		//$tmp2 = $this->UserModel->check_username_password('111','222');
		
		//var_dump($tmp);die();

		$data = array('navbar_name'=>'จัดการข้อมูลพันธุ์ไม้');
		$data_top = array('activebar'=>'vegetation');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		$page_data['vegetationForm'] = $tmp;
		$page_data['plantpathList'] = $tmpp;
		$this->load->view('vegetations/vegetation_form',$page_data);

		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
	}

	public function new_vegetation_add()
	{
		// var_dump($_POST);
		// die();
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
		$data["propagationID"] = $_POST["propagationID"];
		$data["reference_data"] = $_POST["reference_data"];
		
		$this->load->model('VegetationModel');
		$tmp = $this->VegetationModel->insert_vegetation($data,$localname);
		if($tmp){
			$this->session->set_flashdata('message_error', 'เพิ่มพันธุ์ไม้สำเร็จ');
			redirect('Vegetations/vegetation');

		}else{
			$this->session->set_flashdata('message_error', 'เพิ่มพันธุ์ไม้ไม่สำเร็จ');
			redirect('Vegetations/vegetation');
		}

	}
}

