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
		// upload
		$config['upload_path']          = 'image/employee';
        $config['allowed_types']        = 'gif|jpg|png';

		
        $this->load->library('upload', $config);
		// var_dump($_POST);
		$this->upload->initialize($config); 

		$img_url = "";

        if ( ! $this->upload->do_upload('imageURL'))
        {
                $error = array('error' => $this->upload->display_errors());
				var_dump($error);
                // $this->load->view('upload_form', $error);
        }
        else
        {

                $data = array('upload_data' => $this->upload->data());
                $img_url = "image/employee/".$data["upload_data"]["file_name"];
				// echo $img_url;
        }
		// die();
		
		$employeeID 	= $_POST["employeeID"];
		$username 	= $_POST["username"];
		$email 		= $_POST["email"];
		$PrefixID= $_POST["PrefixID"];
		$f_name 		= $_POST["f_name"];
		$l_name 		= $_POST["l_name"];
		$telno 		= $_POST["telno"];
		$password 	= $_POST["password"];
		$authority_authorityID		= $_POST["authority_authorityID"];
		$activeflag 		= $_POST["activeflag"];
		
		$data = array(
			"employeeID"=>$employeeID, 
			"username"=>$username, 
			"email"=>$email,
			"PrefixID"=>$PrefixID,
			"f_name"=>$f_name,
			"l_name"=>$l_name,
			"telno"=>$telno,
			"password"=>$password,
			"authority_authorityID"=>$authority_authorityID,
			"activeflag"=>$activeflag,
			"imageURL"=>$img_url
			
		);
		
		// var_dump($data);
		// die();

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
	//loadหน้าแก้ไข
	public function edit_user_form()
	{
		$this->checklogin();

		$this->load->model('UserModel');
		$data = array('navbar_name'=>'จัดการข้อมูลผู้ใช้งาน');
		$data_top = array('activebar'=>'user');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		$id = $this->uri->segment('3'); 
		$data['result'] = $this->UserModel->getuserbyID($id);
		$this->load->view('users/user_edit',$data);
		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');

   }
   //ฟังก์ชันแก้ไข
   public function save_edit_user()
   {
		$this->checklogin();
		// upload
		$config['upload_path']          = 'image/employee';
        $config['allowed_types']        = 'gif|jpg|png';

        $this->load->library('upload', $config);
		$this->upload->initialize($config); 

		$img_url = "";
        if ( ! $this->upload->do_upload('imageURL'))
        {
                $error = array('error' => $this->upload->display_errors());
				var_dump($error);
        }
        else
        {

                $data = array('upload_data' => $this->upload->data());
                $img_url = "image/employee/".$data["upload_data"]["file_name"];
        }

		$this->load->model('UserModel');
		$data = array( 
		   'employeeID' => $this->input->post('employeeID'),
		   'username' => $this->input->post('username'),
		   'password' => $this->input->post('password'),
		   'email' => $this->input->post('email'),
		   'PrefixID' => $this->input->post('PrefixID'),
		   'f_name' => $this->input->post('f_name'),
		   'l_name' => $this->input->post('l_name'),
		   'telno' => $this->input->post('telno'),
		   'authority_authorityID' => $this->input->post('authority_authorityID'),
		   'activeflag' => $this->input->post('activeflag')
		);
		
		if ($img_url != "") {
			$data['imageURL'] = $img_url;
			// $data['status'] = 1; upพันไม้&ต้นไม้
		}

		$id = $this->input->post('employeeID');
		$this->UserModel->update($data,$id);
		if($data && $id){
			$this->session->set_flashdata('message_error', 'แก้ไขข้อมุลผู้ใช้งานสำเร็จ');
			redirect('Users/user');
		}else{
			$this->session->set_flashdata('message_error', 'แก้ไขข้อมูลผู้ใช้งานไม่สำเร็จ');
			redirect('Users/user');
		}
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
