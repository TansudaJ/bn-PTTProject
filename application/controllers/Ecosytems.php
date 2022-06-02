<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ecosytems extends CI_Controller {
    public function ecosytem()
	{
		$this->load->model('EcosytemModel');
		$tmp = $this->EcosytemModel->get_all_ecoplant();
		$data = array('navbar_name'=>'ระบบนิเวศพืช');
		$data_top = array('activebar'=>'ecosystem');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		$page_data['ecoList'] = $tmp;

		$this->load->view('ecosytems/eco_list',$page_data);

		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
		
	}

    public function new_eco_plant()
	{
		$this->load->model('EcosytemModel');
		$tmp = $this->EcosytemModel->get_all_ecoplant();
        $tmpt = $this->EcosytemModel->get_all_types();
		$data = array('navbar_name'=>'ระบบนิเวศพืช');
		$data_top = array('activebar'=>'ecosystem');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		$page_data['ecoForm'] = $tmp;
        $page_data['typeList'] = $tmpt;
		$this->load->view('ecosytems/eco_form',$page_data);
		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
	}

	public function new_ecoplant_add()
	{
		$data["eco_plantID"] = NULL;
		$data["plantname"] = $_POST["plantname"];
		$data["typeID"] = $_POST["typeID"];
		$data["activeflag"] = 1;
		
		$this->load->model('EcosytemModel');
		$tmp = $this->EcosytemModel->insert_eco_plant($data);
		if($tmp){
			$this->session->set_flashdata('message_error', 'เพิ่มระบบนิเวศพืชสำเร็จ');
			redirect('Ecosytems/ecosytem');

		}else{
			$this->session->set_flashdata('message_error', 'เพิ่มระบบนิเวศพืชไม่สำเร็จ');
			redirect('Ecosytems/ecosytem');
		}

	}
	//loadหน้าแก้ไข
	public function edit_eco_form(){
		$this->load->model('EcosytemModel');
        $tmpt = $this->EcosytemModel->get_all_types();
		$data = array('navbar_name'=>'ระบบนิเวศพืช');
		$data_top = array('activebar'=>'ecosystem');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
        $page_data= array();

		$page_data['typeList'] = $tmpt;
		
		$id = $this->uri->segment('3'); 
		$page_data['result'] = $this->EcosytemModel->getecobyID($id);
		$this->load->view('ecosytems/eco_edit',$page_data);
		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
        
	   
   }
   //ฟังก์ชันแก้ไข
   public function save_edit_eco(){
		$this->load->model('EcosytemModel');
		$data = array( 
		   'plantname' => $this->input->post('plantname'),
		   'typeID' => $this->input->post('typeID'),
		   'activeflag' => $this->input->post('activeflag')
		); 
		$id = $this->input->post('eco_plantID');
		$this->EcosytemModel->update($data,$id);
		if($data && $id){
			$this->session->set_flashdata('message_error', 'แก้ไขระบบนิเวศพืชสำเร็จ');
			redirect('Ecosytems/ecosytem');
		}else{
			$this->session->set_flashdata('message_error', 'แก้ไขระบบนิเวศพืชไม่สำเร็จ');
			redirect('Ecosytems/ecosytem');
		}
   }

   //ลบ
   public function delete_eco(){

		$this->load->model('EcosytemModel');
		$id = $this->uri->segment('3'); 
		$this->EcosytemModel->delete($id); 
		if($id){
			$this->session->set_flashdata('message_error', 'ลบระบบนิเวศพืชสำเร็จ');
			redirect('Ecosytems/ecosytem');
		}else{
			$this->session->set_flashdata('message_error', 'ลบระบบนิเวศพืชไม่สำเร็จ');
			redirect('Ecosytems/ecosytem');
		}
	}
	
}