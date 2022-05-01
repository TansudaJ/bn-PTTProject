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
	//loadหน้าแก้ไข
	public function edit_mainmethod_form(){
		$this->load->model('MainmethodModel');
		$data = array('navbar_name'=>'จัดการข้อมูลวิธีดูแลรักษา');
		$data_top = array('activebar'=>'mainmethod');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		$id = $this->uri->segment('3'); 
		$data['result'] = $this->MainmethodModel->getmainmethodbyID($id);
		$this->load->view('mainmethods/mainmethod_edit',$data);
		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
        
	   
   }
   //ฟังก์ชันแก้ไข
   public function save_edit_mainmethod(){
		$this->load->model('MainmethodModel');
		$data = array( 
		   'n_maintenancetype' => $this->input->post('n_maintenancetype'),
		   'detail' => $this->input->post('detail'),
		   'recommend' => $this->input->post('recommend')
		); 
		$id = $this->input->post('maintenancetypeID');
		$this->MainmethodModel->update($data,$id);
		if($data && $id){
			$this->session->set_flashdata('message_error', 'แก้ไขวิธีการดูแลรักษาสำเร็จ');
			redirect('Mainmethods/mainmethod');
		}else{
			$this->session->set_flashdata('message_error', 'แก้ไขวิธีการดูแลรักษาไม่สำเร็จ');
			redirect('Mainmethods/mainmethod');
		}
   }

   //ลบ
   public function delete_mainmethod(){

		$this->load->model('MainmethodModel');
		$id = $this->uri->segment('3'); 
		$this->MainmethodModel->delete($id); 
		if($id){
			$this->session->set_flashdata('message_error', 'ลบวิธีการดูแลรักษาสำเร็จ');
			redirect('Mainmethods/mainmethod');
		}else{
			$this->session->set_flashdata('message_error', 'ลบวิธีการดูแลรักษาไม่สำเร็จ');
			redirect('Mainmethods/mainmethod');
		}
	}
	
}