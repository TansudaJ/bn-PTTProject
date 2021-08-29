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
		if($tmp){
			redirect('/Dashboards/dashboard');
		}else{
			$this->session->set_flashdata('message_error', 'กรุณาเข้าสู่ระบบใหม่อีกครั้ง');
			redirect('/Login/');
		}
	}
		
	public function logout(){
		$array_items = array('userID', 'username','fname','lname','email','phone','roleID','logged_in');
		$this->session->set_flashdata('message_error', 'ออกสู่ระบบสำเร็จ');
		$this->session->unset_userdata($array_items);
		redirect('/Login/');
	}
}
