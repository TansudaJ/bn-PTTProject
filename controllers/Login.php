<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index()
	{
		/* $message = "";
		if ($this->session->userdata('message_error')) {
			$message = $_SESSION['message_error'];
			$this->session->unset_userdata('message_error');
		}
		$data["message_error"] = $message;
		$this->load->view('dashboard/login',$data);
		*/
		$this->load->view('dashboard/login');
    }
    
    public function check_login(){
		$username = $_POST["uname"];
		$password = $_POST["psw"];
		$this->load->model('UserModel');
		$tmp = $this->UserModel->check_username_password($username,$password);
		// echo "==$tmp==";
		// die();
		if($tmp){
			
			$this->session->set_flashdata('message_code', '202');
			$this->session->set_flashdata('message_error', 'ยินดีต้อนรับคุณเข้าสู่ระบบ');
			redirect('/Dashboards/dashboard');
		}else{
			$this->session->set_flashdata('message_code', '503');
			$this->session->set_flashdata('message_error', 'กรุณาเข้าสู่ระบบใหม่อีกครั้ง');
			redirect('/Login/');
		}
	}
		
	public function logout(){
		$array_items = array('employeeID', 'username','f_name','l_name','email','phone','authority_authorityID','logged_in');
		$this->session->set_flashdata('message_error', 'ออกจากระบบสำเร็จ');
		$this->session->unset_userdata($array_items);
		redirect('/Login/');
	}
}
