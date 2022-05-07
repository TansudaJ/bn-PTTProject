<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class API001 extends CI_Controller {

    public function userbyID($id)
	{
		$this->checklogin();
		$this->load->model('UserModel');
		$tmp = $this->UserModel->get_user_byID($id);
		$data['ststus'] = '200';
		$data['data'] = $tmp;
		echo header('Content-Type: text/html; charset=UTF-8');
		echo json_encode($data);
		//var_dump($tmp);
	}

	public function vegetationbyID($id)
	{
		$this->load->model('VegetationModel');
		$tmp = $this->VegetationModel->get_vegetation_byID($id);
		$data['ststus'] = '200';
		$data['data'] = $tmp;
		echo header('Content-Type: text/html; charset=UTF-8');
		echo json_encode($data);
	}

	public function plantbyID($id)
	{
		$this->load->model('PlantModel');
		$tmp = $this->PlantModel->get_plant_byID($id);
		$data['ststus'] = '200';
		$data['data'] = $tmp;
		echo header('Content-Type: text/html; charset=UTF-8');
		echo json_encode($data);
	}

	public function mainmethodbyID($id)
	{
		$this->load->model('MainmethodModel');
		$tmp = $this->MainmethodModel->get_mainmethod_byID($id);
		$data['ststus'] = '200';
		$data['data'] = $tmp;
		echo header('Content-Type: text/html; charset=UTF-8');
		echo json_encode($data);
	}

	public function pathmainbyID($id)
	{
		$this->load->model('PathmainModel');
		$tmp = $this->PathmainModel->get_pathmain_byID($id);
		$data['ststus'] = '200';
		$data['data'] = $tmp;
		echo header('Content-Type: text/html; charset=UTF-8');
		echo json_encode($data);
	}

	public function imagemapbyID($id)
	{
		$this->load->model('ImagemapModel');
		$tmp = $this->ImagemapModel->get_imagemap_byID($id);
		$data['ststus'] = '200';
		$data['data'] = $tmp;
		echo header('Content-Type: text/html; charset=UTF-8');
		echo json_encode($data);
	}
	public function zonebyID($id)
	{
		$this->load->model('ZoneModel');
		$tmp = $this->ZoneModel->get_zone_byID($id);
		$data['ststus'] = '200';
		$data['data'] = $tmp;
		echo header('Content-Type: text/html; charset=UTF-8');
		echo json_encode($data);
	}
	public function maintenancebyID($id)
	{
		$this->load->model('MaintenanceModel');
		$tmp = $this->MaintenanceModel->get_maintenance_byID($id);
		$data['ststus'] = '200';
		$data['data'] = $tmp;
		echo header('Content-Type: text/html; charset=UTF-8');
		echo json_encode($data);
	}
	



    private function checklogin(){
		if(!isset($_SESSION['logged_in'])){
			$this->session->set_flashdata('message_error', 'กรุณาเข้าสู่ระบบ');
			redirect('/login/');
		}

		if($_SESSION['authority_authorityID'] != '1'){
			$this->session->set_flashdata('message_error', 'คุณไม่มีสิทธิ์ใช้งาน');
			redirect('/Dashboards/dashboard');
		}
	}
}