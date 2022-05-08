<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maintenances extends CI_Controller {
    public function maintenance()
	{
		$this->load->model('MaintenanceModel');
		$tmp = $this->MaintenanceModel->get_all_maintenance();
		$data = array('navbar_name'=>'ข้อมูลการดูแลรักษา');
		$data_top = array('activebar'=>'maintenance');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		$page_data['maintenanceList'] = $tmp;
		$this->load->view('maintenances/maintenance_list',$page_data);

		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
		
	}

    public function new_maintenance()
	{
		$this->load->model('MaintenanceModel');
		$tmp = $this->MaintenanceModel->get_all_maintenance();
		$tmpm = $this->MaintenanceModel->get_all_maintenancetype();
		$tmpv = $this->MaintenanceModel->get_all_vegetation();
		$tmpz = $this->MaintenanceModel->get_all_zone();

		$data = array('navbar_name'=>'ข้อมูลการดูแลรักษา');
		$data_top = array('activebar'=>'maintenance');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		$page_data['maintenanceForm'] = $tmp;
		$page_data['maintenancetypeList'] = $tmpm;
		$page_data['vegetationList'] = $tmpv;
		$page_data['zoneList'] = $tmpz;
		$this->load->view('maintenances/maintenance_form',$page_data);

		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
	}

	public function new_maintenance_add()
	{
		$data["maintenanceID"] = NULL;
		$data["details"] = $_POST["details"];
		$data["maintenancetype_maintenancetypeID"] = $_POST["maintenancetypeID"];
		$data["details"] = $_POST["details"];
		$data["employee_employeeID"] = $_SESSION["employeeID"];
		$data["zone_zoneID"] = $_POST["zoneID"];
		$data["vegetation_vegetationID"] = $_POST["vegetationID"];
		$data["note"] = $_POST["note"];

		// var_dump($data);
		// die();
		$this->load->model('MaintenanceModel');
		$tmp = $this->MaintenanceModel->insert_maintenance($data);
		if($tmp){
			$this->session->set_flashdata('message_error', 'เพิ่มการดูแลรักษาสำเร็จ');
			redirect('Maintenances/maintenance');

		}else{
			$this->session->set_flashdata('message_error', 'เพิ่มการดูแลรักษาไม่สำเร็จ');
			redirect('Maintenances/maintenance');
		}
    }

	//loadหน้าแก้ไข
	public function edit_maintenance_form()
	{
		$this->load->model('MaintenanceModel');

		$tmpm = $this->MaintenanceModel->get_all_maintenancetype();
		$tmpv = $this->MaintenanceModel->get_all_vegetation();
		$tmpz = $this->MaintenanceModel->get_all_zone();
		
		$data = array('navbar_name'=>'ข้อมูลการดูแลรักษา');
		$data_top = array('activebar'=>'maintenance');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');

		$page_data= array();

		$page_data['maintenancetypeList'] = $tmpm;
		$page_data['vegetationList'] = $tmpv;
		$page_data['zoneList'] = $tmpz;
		$id = $this->uri->segment('3'); 
		$page_data['result'] = $this->MaintenanceModel->getmaintenancebyID($id);
		$this->load->view('maintenances/maintenance_edit',$page_data);
		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
        
	   
   }
   //ฟังก์ชันแก้ไข
   public function save_edit_maintenance()
   {
		$this->load->model('MaintenanceModel');
		$data = array( 
		   
		   'maintenancetype_maintenancetypeID ' => $this->input->post('maintenancetype_maintenancetypeID'),
		   'zone_zoneID' => $this->input->post('zone_zoneID'),
		   'vegetation_vegetationID' => $this->input->post('vegetation_vegetationID'),
		   'details' => $this->input->post('details'),
		   'note' => $this->input->post('note'),
		   'activeFlags' => $this->input->post('activeFlags')

		); 
		$id = $this->input->post('maintenanceID');
		$this->MaintenanceModel->update($data,$id);
		if($data && $id){
			$this->session->set_flashdata('message_error', 'แก้ไขการดูแลรักษาสำเร็จ');
			redirect('Maintenances/maintenance');
		}else{
			$this->session->set_flashdata('message_error', 'แก้ไขการดูแลรักษาไม่สำเร็จ');
			redirect('Maintenances/maintenance');
		}
   }

   //ลบ
   public function delete_mainmethod()
   {

		$this->load->model('MaintenanceModel');
		$id = $this->uri->segment('3'); 
		$this->MaintenanceModel->delete($id); 
		if($id){
			$this->session->set_flashdata('message_error', 'ลบการดูแลรักษาสำเร็จ');
			redirect('Maintenances/maintenance');
		}else{
			$this->session->set_flashdata('message_error', 'ลบการดูแลรักษาไม่สำเร็จ');
			redirect('Maintenances/maintenance');
		}
	}
	
	
}