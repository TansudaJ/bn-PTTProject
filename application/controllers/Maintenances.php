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
		$data["maintenancetype_maintenancetypeID"] = $_POST["maintenancetype_maintenancetypeID"];
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
	
}