<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plants extends CI_Controller {
	public function plant()
	{
		$this->load->model('PlantModel');
		$tmp = $this->PlantModel->get_all_plants();
		//$tmp2 = $this->UserModel->check_username_password('111','222');
		
//		var_dump($tmp);

		$data = array('navbar_name'=>'จัดการข้อมูลต้นไม้');
		$data_top = array('activebar'=>'plant');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		//$this->load->view('users/user_form');
		//$page_data = array('userList'=>$tmp,'datatml2'=>$tmp2);
		$page_data['plantList'] = $tmp;
		//$page_data['datatmp2'] = $tmp2;

		$this->load->view('plants/plant_list',$page_data);

		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
	}

	public function new_plant()
	{
		//$this->checklogin();
		//$this->load->view('welcome_message');
		$this->load->model('PlantModel');
		$tmp = $this->PlantModel->get_all_plants();
		$tmpv = $this->PlantModel->get_all_vegetation();
		$tmpz = $this->PlantModel->get_all_zone();
		//$tmp2 = $this->UserModel->check_username_password('111','222');
		
		//var_dump($tmp);die();

		$data = array('navbar_name'=>'จัดการข้อมูลต้นไม้');
		$data_top = array('activebar'=>'plant');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		$page_data['plantForm'] = $tmp;
		$page_data['vegetationList'] = $tmpv;
		$page_data['zoneList'] = $tmpz;

		$this->load->view('plants/plant_form',$page_data);

		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
	}

	public function new_plant_add()
	{
		// upload
		$config['upload_path']          = 'image/QRCode';
        $config['allowed_types']        = 'gif|jpg|png';

		
        $this->load->library('upload', $config);
		// var_dump($_POST);
		$this->upload->initialize($config); 

		$imgQRCode = "";

        if ( ! $this->upload->do_upload('QRCode'))
        {
                $error = array('error' => $this->upload->display_errors());
				var_dump($error);
                // $this->load->view('upload_form', $error);
        }
        else
        {

                $data_upload = array('upload_data' => $this->upload->data());
                $imgQRCode = "image/QRCode/".$data_upload["upload_data"]["file_name"];
				// echo $img_url;
        }

		// upload
		$config['upload_path']          = 'image/plant';
        $config['allowed_types']        = 'gif|jpg|png';

		
        $this->load->library('upload', $config);
		// var_dump($_POST);
		$this->upload->initialize($config); 

		$img_plant = "";

        if ( ! $this->upload->do_upload('URL'))
        {
                $error = array('error' => $this->upload->display_errors());
				var_dump($error);
                // $this->load->view('upload_form', $error);
        }
        else
        {

                $data_upload = array('upload_data' => $this->upload->data());
                $img_plant = "image/plant/".$data_upload["upload_data"]["file_name"];
				// echo $img_url;
        }
		
		$data["plantID"] = NULL;
		$data["vegetation_vegetationID"] = $_POST["vegetationID"];
		$data["zone_zoneID"] = $_POST["zoneID"];
		$data["coordinates"] = $_POST["coordinates"];
		$data["diameter"] 	= $_POST["diameter"];
		$data["height"] 	= $_POST["height"];
		$data["actual"] 	= $_POST["actual"];
		$data["show"] 	= $_POST["show"];
		$data["exclusivity"] = $_POST["exclusivity"];
		$data["QRCode"] = $imgQRCode;

		$data_img["imageplantID"] = null;
		$data_img["URL"] = $img_plant;


		// var_dump($data,$data_img);
		// die();
		
		$this->load->model('PlantModel');
		$tmp = $this->PlantModel->insert_plant($data,$data_img);
		if($tmp){
			$this->session->set_flashdata('message_error', 'เพิ่มต้นไม้สำเร็จ');
			redirect('Plants/plant');

		}else{
			$this->session->set_flashdata('message_error', 'เพิ่มต้นไม้ไม่สำเร็จ');
			redirect('Plants/plant');
		}

	}

//loadหน้าแก้ไข
	public function edit_plant_form()
	{

		$this->load->model('PlantModel');
		$data = array('navbar_name'=>'จัดการข้อมูลต้นไม้');
		$data_top = array('activebar'=>'plant');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		$id = $this->uri->segment('3'); 
		$data['result'] = $this->PlantModel->getplantbyID($id);
		$this->load->view('plants/plant_edit',$data);
		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');

   }
   //ฟังก์ชันแก้ไข
   public function save_edit_user()
   {
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
	

}
