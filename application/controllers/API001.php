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