<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zones extends CI_Controller {

    public function zone()
	{
		$this->load->model('ZoneModel');
		$tmp = $this->ZoneModel->get_all_zone();
		//$tmp2 = $this->UserModel->check_username_password('111','222');
		
//		var_dump($tmp);

		$data = array('navbar_name'=>'จัดการข้อมูลโซน');
		$data_top = array('activebar'=>'zone');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		//$this->load->view('users/user_form');
		//$page_data = array('userList'=>$tmp,'datatml2'=>$tmp2);
		$page_data['zoneList'] = $tmp;
		//$page_data['datatmp2'] = $tmp2;

		$this->load->view('zones/zone_list',$page_data);

		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
	}

    public function new_zone()
	{
		//$this->checklogin();
		//$this->load->view('welcome_message');
		$this->load->model('ZoneModel');
		$tmp = $this->ZoneModel->get_all_zone();
		$tmpz = $this->ZoneModel->getzoneList();
		//$tmp2 = $this->UserModel->check_username_password('111','222');
		
		//var_dump($tmp);die();

		$data = array('navbar_name'=>'จัดการข้อมูลโซน');
		$data_top = array('activebar'=>'zone');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		//$this->load->view('users/user_form');
		//$page_data = array('userList'=>$tmp,'datatml2'=>$tmp2);
		$page_data['zoneForm'] = $tmp;
		$page_data['zoneList'] = $tmpz;
		//$page_data['datatmp2'] = $tmp2;

		$this->load->view('zones/zone_form',$page_data);

		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
	}


	public function new_zone_add()
	{
		$zoneID = null;
		$nameEN = $_POST["nameEN"];
		$nameTH = $_POST["nameTH"];
		$detail = $_POST["detail"];
		$status = $_POST["status"];
		$location = $_POST["location"];
		$้headzoneID = $_POST["headzoneID"];

		
		$data = array(
			"zoneID"=>$zoneID, 
			"nameEN"=>$nameEN, 
			"nameTH"=>$nameTH,
			"detail"=>$detail,
			"status"=>$status,
			"location"=>$location,
			"headzoneID"=>$้headzoneID
		);
		
		$this->load->model('ZoneModel');
		$tmp = $this->ZoneModel->insert_zone($data);
		if($tmp){
			$this->session->set_flashdata('message_error', 'เพิ่มโซนสำเร็จ');
			redirect('Zones/zone');

		}else{
			$this->session->set_flashdata('message_error', 'เพิ่มโซนไม่สำเร็จ');
			redirect('Zones/zone');
		}

	}

	//loadหน้าแก้ไข
	public function edit_zone_form()
	{
		$this->load->model('ZoneModel');
		$tmpz = $this->ZoneModel->getzoneList();

		$data = array('navbar_name'=>'จัดการข้อมูลโซน');
		$data_top = array('activebar'=>'zone');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');

		$page_data= array();

		$page_data['zoneList'] = $tmpz;

		$id = $this->uri->segment('3'); 
		$page_data['result'] = $this->ZoneModel->getzonebyID($id);
		$this->load->view('zones/zone_edit',$page_data);
		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');

   }
   //ฟังก์ชันแก้ไข
   public function save_edit_zone()
   {
		$this->load->model('ZoneModel');
		$data = array( 
		   'nameTH' => $this->input->post('nameTH'),
		   'nameEN' => $this->input->post('nameEN'),
		   'headzoneID' => $this->input->post('headzoneID'),
		   'location' => $this->input->post('location'),
		   'status' => $this->input->post('status'),
		   'detail' => $this->input->post('detail'),
		   'activeflag' => $this->input->post('activeflag')
		);
	
// 		var_dump($data);
// die();
		$id = $this->input->post('zoneID');
		$this->ZoneModel->update($data,$id);
		if($data && $id){
			$this->session->set_flashdata('message_error', 'แก้ไขข้อมูลโซนสำเร็จ');
			redirect('Zones/zone');
		}else{
			$this->session->set_flashdata('message_error', 'แก้ไขข้อมูลโซนไม่สำเร็จ');
			redirect('Zones/zone');
		}
   }

   //ลบ
   public function delete_zone()
   {
		$this->load->model('ZoneModel');
		$id = $this->uri->segment('3'); 
		$this->ZoneModel->delete($id); 
		if($id){
			$this->session->set_flashdata('message_error', 'ลบโซนสำเร็จ');
			redirect('Zones/zone');
		}else{
			$this->session->set_flashdata('message_error', 'ลบโซนไม่สำเร็จ');
			redirect('Zones/zone');
		}
	}

}