<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	public function user()
	{
		$this->checklogin();
		$this->load->model('UserModel');
		$tmp = $this->UserModel->get_all_users();
		//$tmp2 = $this->UserModel->check_username_password('111','222');
		
//		var_dump($tmp);

		$data = array('navbar_name'=>'จัดการข้อมูลผู้ใช้งาน');
		$data_top = array('activebar'=>'user');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		//$this->load->view('users/user_form');
		//$page_data = array('userList'=>$tmp,'datatml2'=>$tmp2);
		$page_data['userList'] = $tmp;
		//$page_data['datatmp2'] = $tmp2;

		$this->load->view('users/user_list',$page_data);

		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
		
	}
	public function new_user()
	{
		$this->checklogin();
		//$this->load->view('welcome_message');
		$this->load->model('UserModel');
		$tmp = $this->UserModel->get_all_users();
		//$tmp2 = $this->UserModel->check_username_password('111','222');
		
//		var_dump($tmp);

		$data = array('navbar_name'=>'จัดการข้อมูลผู้ใช้งาน');
		$data_top = array('activebar'=>'user');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		//$this->load->view('users/user_form');
		//$page_data = array('userList'=>$tmp,'datatml2'=>$tmp2);
		$page_data['userForm'] = $tmp;
		//$page_data['datatmp2'] = $tmp2;

		$this->load->view('users/user_form',$page_data);

		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
	}

	public function new_user_add()
	{
		$this->checklogin();
		$username 	= $_POST["username"];
		$email 		= $_POST["email"];
		$fname 		= $_POST["fname"];
		$lname 		= $_POST["lname"];
		$telno 		= $_POST["telno"];
		$password 	= $_POST["password"];
		$roleID 		= $_POST["roleID"];
		$activeFlag 		= $_POST["activeFlag"];
		
		$data = array(
			"username"=>$username, 
			"email"=>$email,
			"fname"=>$fname,
			"lname"=>$lname,
			"telno"=>$telno,
			"password"=>$password,
			"roleID"=>$roleID,
			"activeFlag"=>$activeFlag
		);
		
		$this->load->model('UserModel');
		$tmp = $this->UserModel->insert_users($data);
		if($tmp){
			$this->session->set_flashdata('message_error', 'เพิ่มผู้ใช้สำเร็จ');
			redirect('Users/user');

		}else{
			$this->session->set_flashdata('message_error', 'เพิ่มผู้ใช้ไม่สำเร็จ');
			redirect('Users/user');
		}

	}


	public function edit_user()
	{
		$this->checklogin();

		$this->load->model('UserModel');
		$tmp = $this->UserModel->get_all_users();
		$data = array('navbar_name'=>'Users');
		$this->load->view('dashboard/top');
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');

		$this->load->view('users/user_edit_form');
		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
	}

	private function checklogin(){
		if(!isset($_SESSION['logged_in'])){
			$this->session->set_flashdata('message_error', 'กรุณาเข้าสู่ระบบ');
			redirect('/login/');
		}

		if($_SESSION['roleID'] != '1'){
			$this->session->set_flashdata('message_error', 'คุณไม่มีสิทธิ์ใช้งาน');
			redirect('/Dashboards/dashboard');
		}
	}
	
}
