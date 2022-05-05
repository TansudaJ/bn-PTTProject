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

                $data = array('upload_data' => $this->upload->data());
                $imgQRCode = "image/QRCode/".$data["upload_data"]["file_name"];
				// echo $img_url;
        }
		
		$data["plantID"] = NULL;
		$data["vegetationID"] = $_POST["vegetationID"];
		$data["zoneID"] = $_POST["zoneID"];
		$data["coordinates"] = $_POST["coordinates"];
		$data["diameter"] 	= $_POST["diameter"];
		$data["height"] 	= $_POST["height"];
		$data["actual"] 	= $_POST["actual"];
		$data["show"] 	= $_POST["show"];
		$data["exclusivity"] = $_POST["exclusivity"];
		$data["QRCode"] = $imgQRCode;

		
		$this->load->model('PlantModel');
		$tmp = $this->PlantModel->insert_plant($data);
		if($tmp){
			$this->session->set_flashdata('message_error', 'เพิ่มต้นไม้สำเร็จ');
			redirect('Plants/plant');

		}else{
			$this->session->set_flashdata('message_error', 'เพิ่มต้นไม้ไม่สำเร็จ');
			redirect('Plants/plant');
		}

	}
}
