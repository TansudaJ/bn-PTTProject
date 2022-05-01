<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plantpaths extends CI_Controller {

   //แสดง 
    public function plantpath()
	{
		$this->load->model('PlantpathModel');
		$tmp = $this->PlantpathModel->get_all_plantpaths();
		//$tmp2 = $this->UserModel->check_username_password('111','222');
		
//		var_dump($tmp);

		$data = array('navbar_name'=>'จัดการข้อมูลส่วนประกอบ');
		$data_top = array('activebar'=>'plantpath');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		//$this->load->view('users/user_form');
		//$page_data = array('userList'=>$tmp,'datatml2'=>$tmp2);
		$page_data['plantpathList'] = $tmp;
		//$page_data['datatmp2'] = $tmp2;

		$this->load->view('plantpaths/plantpath_list',$page_data);

		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
	}
	//loadหน้าเพิ่ม
	public function new_plantpath()
	{
		//$this->checklogin();
		//$this->load->view('welcome_message');
		$this->load->model('PlantpathModel');
		$tmp = $this->PlantpathModel->get_all_plantpaths();
		//$tmp2 = $this->UserModel->check_username_password('111','222');
		
		//var_dump($tmp);die();

		$data = array('navbar_name'=>'จัดการข้อมูลส่วนประกอบ');
		$data_top = array('activebar'=>'plantpath');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		$page_data['plantpathForm'] = $tmp;

		$this->load->view('plantpaths/plantpath_form',$page_data);

		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
	}
	//ฟังก์ชันเพิ่ม
	public function new_plantpath_add()
	{
		$data["pathID"] = NULL;
		$data["plantpathname"] = $_POST["plantpathname"];
		// var_dump($data);
		// die();

		$this->load->model('PlantpathModel');
		$tmp = $this->PlantpathModel->insert_plantpath($data);
		if($tmp){
			$this->session->set_flashdata('message_error', 'เพิ่มส่วนประกอบต้นไม้สำเร็จ');
			redirect('Plantpaths/plantpath');

		}else{
			$this->session->set_flashdata('message_error', 'เพิ่มส่วนประกอบต้นไม้ไม่สำเร็จ');
			redirect('Plantpaths/plantpath');
		}

	}
	//loadหน้าแก้ไข
	public function edit_plantpath_form(){
		$this->load->model('PlantpathModel');
		$data = array('navbar_name'=>'จัดการข้อมูลส่วนประกอบ');
		$data_top = array('activebar'=>'plantpath');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		$id = $this->uri->segment('3'); 
		$data['result'] = $this->PlantpathModel->getplantpathbyID($id);
		$this->load->view('plantpaths/plantpath_edit',$data);
		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
        
	   
   }
   //ฟังก์ชันแก้ไข
   public function save_edit_plantpath(){
		$this->load->model('PlantpathModel');
		$data = array( 
		   'plantpathname' => $this->input->post('plantpathname')
		); 
		$id = $this->input->post('pathID');
		$this->PlantpathModel->update($data,$id);
		if($data && $id){
			$this->session->set_flashdata('message_error', 'แก้ไขส่วนประกอบต้นไม้สำเร็จ');
			redirect('Plantpaths/plantpath');
		}else{
			$this->session->set_flashdata('message_error', 'แก้ไขส่วนประกอบต้นไม้ไม่สำเร็จ');
			redirect('Plantpaths/plantpath');
		}
   }

   //ลบ
   public function delete_plantpath(){

		$this->load->model('PlantpathModel');
		$id = $this->uri->segment('3'); 
		$this->PlantpathModel->delete($id); 
		if($id){
			$this->session->set_flashdata('message_error', 'ลบส่วนประกอบต้นไม้สำเร็จ');
			redirect('Plantpaths/plantpath');
		}else{
			$this->session->set_flashdata('message_error', 'ลบส่วนประกอบต้นไม้ไม่สำเร็จ');
			redirect('Plantpaths/plantpath');
		}
	}

}