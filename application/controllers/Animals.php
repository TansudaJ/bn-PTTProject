<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Animals extends CI_Controller {
    public function animal()
	{
		$this->load->model('AnimalModel');
		$tmp = $this->AnimalModel->get_all_ecoanimal();
		$data = array('navbar_name'=>'ระบบนิเวศสัตว์');
		$data_top = array('activebar'=>'animal');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		$page_data['animalList'] = $tmp;

		$this->load->view('animals/animal_list',$page_data);

		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
		
	}

    public function new_eco_animal()
	{
		$this->load->model('AnimalModel');
		$tmp = $this->AnimalModel->get_all_ecoanimal();
        $tmpt = $this->AnimalModel->get_all_types();
		$data = array('navbar_name'=>'ระบบนิเวศสัตว์');
		$data_top = array('activebar'=>'animal');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		$page_data['animalForm'] = $tmp;
        $page_data['typeList'] = $tmpt;
		$this->load->view('animals/animal_form',$page_data);
		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
	}

	public function new_ecoanimal_add()
	{
		$data["eco_animalsID"] = NULL;
		$data["animal_name"] = $_POST["animal_name"];
		$data["type_animalID"] = $_POST["type_animalID"];
		$data["activeFlag"] = 1;
		
		$this->load->model('AnimalModel');
		$tmp = $this->AnimalModel->insert_eco_animal($data);
		if($tmp){
			$this->session->set_flashdata('message_error', 'เพิ่มระบบนิเวศสัตว์สำเร็จ');
			redirect('Animals/animal');

		}else{
			$this->session->set_flashdata('message_error', 'เพิ่มระบบนิเวศสัตว์ไม่สำเร็จ');
			redirect('Animals/animal');
		}

	}
	//loadหน้าแก้ไข
	public function edit_ecoanimal_form(){
		$this->load->model('AnimalModel');
        $tmpt = $this->AnimalModel->get_all_types();
		$data = array('navbar_name'=>'ระบบนิเวศสัตว์');
		$data_top = array('activebar'=>'animal');;
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
        $page_data= array();

		$page_data['typeList'] = $tmpt;
		
		$id = $this->uri->segment('3'); 
		$page_data['result'] = $this->AnimalModel->get_ecoanimal_byID($id);
		$this->load->view('animals/animal_edit',$page_data);
		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
        
	   
   }
   //ฟังก์ชันแก้ไข
   public function save_edit_ecoanimal(){
		$this->load->model('AnimalModel');
		$data = array( 
		   'animal_name' => $this->input->post('animal_name'),
		   'type_animalID' => $this->input->post('type_animalID'),
		   'activeFlag' => $this->input->post('activeFlag')
		); 
		$id = $this->input->post('eco_animalsID');
		$this->AnimalModel->update($data,$id);
		if($data && $id){
			$this->session->set_flashdata('message_error', 'แก้ไขระบบนิเวศสัตว์สำเร็จ');
			redirect('Animals/animal');
		}else{
			$this->session->set_flashdata('message_error', 'แก้ไขระบบนิเวศสัตว์ไม่สำเร็จ');
			redirect('Animals/animal');
		}
   }

   //ลบ
   public function delete_animal(){

		$this->load->model('AnimalModel');
		$id = $this->uri->segment('3'); 
		$this->AnimalModel->delete($id); 
		if($id){
			$this->session->set_flashdata('message_error', 'ลบระบบนิเวศสัตว์สำเร็จ');
			redirect('Animals/animal');
		}else{
			$this->session->set_flashdata('message_error', 'ลบระบบนิเวศสัตว์ไม่สำเร็จ');
			redirect('Animals/animal');
		}
	}
	
}