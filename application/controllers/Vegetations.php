<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vegetations extends CI_Controller {
	public function vegetation()
	{
		$this->load->model('VegetationModel');
		$tmp = $this->VegetationModel->get_all_vegetations();
		$data = array('navbar_name'=>'จัดการข้อมูลพันธุ์ไม้');
		$data_top = array('activebar'=>'vegetation');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		$page_data['vegetationList'] = $tmp;

		$this->load->view('vegetations/vegetation_list',$page_data);

		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
	}
	//loadหน้าเพิ่ม
	public function new_vegetation()
	{
		$this->load->model('VegetationModel');
		$tmp = $this->VegetationModel->get_all_vegetations();
		$tmpt = $this->VegetationModel->get_all_types();

		$data = array('navbar_name'=>'จัดการข้อมูลพันธุ์ไม้');
		$data_top = array('activebar'=>'vegetation');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		$page_data['vegetationForm'] = $tmp;
		$page_data['typeList'] = $tmpt;
		
		$id = $this->uri->segment('3'); 
		$page_data['localList'] = $this->VegetationModel->getregionbyID($id);
		$this->load->view('vegetations/vegetation_form',$page_data);
		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
	}
	//ฟังก์ชันเพิ่ม
	public function new_vegetation_add()
	{
		// upload
		$config['upload_path']          = 'image/vegetation';
        $config['allowed_types']        = 'gif|jpg|png';
		
        $this->load->library('upload', $config);
		// var_dump($_POST);
		$this->upload->initialize($config); 

		$img_url = "";

        if ( ! $this->upload->do_upload('URL'))
        {
                $error = array('error' => $this->upload->display_errors());
				var_dump($error);
                // $this->load->view('upload_form', $error);
        }
        else
        {
                $data_upload = array('upload_data' => $this->upload->data());
                $img_url = "image/vegetation/".$data_upload["upload_data"]["file_name"];
				// echo $img_url;
        }

		$loname_region = $_POST["loname_region"];
		$loname_name = $_POST["loname_name"];
		$localname = array();
		foreach($loname_region as $id=>$regionID){
			$localname[$id] = array("regionID"=>$regionID,"name"=>$loname_name[ $id]);
		}
		
		$data["vegetationID"] = NULL;
		$data["n_common_TH"] = $_POST["THname"];
		$data["n_common_ENG"] 	= $_POST["ENname"];
		$data["n_scientific"] 	= $_POST["Sciname"];
		$data["n_family"] 	= $_POST["famname"];
		$data["appearance"] 	= $_POST["appearance"];
		$data["plant_origin"] = $_POST["origin"];
		$data["distribution"] = $_POST["distribution"];
		$data["typeID"] = $_POST["typeID"];
		$data["ecological"] = $_POST["ecological"];
		$data["produce_period"] = $_POST["produce_period"];
		$data["flowering_period"] = $_POST["fperiod"];
		$data["reference"] = $_POST["reference"];
		$data["co2_storage"] = $_POST["co2_storage"];
		$data["propagation"] = $_POST["propagation"];
		$data["reference_data"] = $_POST["reference_data"];

		$data_img["imagevegetationID "] = null;
		$data_img["URL"] = $img_url;
		$data_img["status"] = null;
		$data_img["plantpath_pathID"] = null;
		
		// var_dump($data);
		// die();

		if ($img_url != "") {
			$data_img['status'] = 1; 
		}
		
		$this->load->model('VegetationModel');
		$tmp = $this->VegetationModel->insert_vegetation($data,$localname,$data_img);
		if($tmp){
			$this->session->set_flashdata('message_error', 'เพิ่มพันธุ์ไม้สำเร็จ');
			redirect('Vegetations/vegetation');

		}else{
			$this->session->set_flashdata('message_error', 'เพิ่มพันธุ์ไม้ไม่สำเร็จ');
			redirect('Vegetations/vegetation');
		}

	}
	//loadหน้าแก้ไข
	public function edit_vegetation_form()
	{
		$this->load->model('VegetationModel');
		$tmpt = $this->VegetationModel->get_all_types();
		
		$data = array('navbar_name'=>'จัดการข้อมูลพันธุ์ไม้');
		$data_top = array('activebar'=>'vegetation');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		
		$page_data= array();

		$page_data['typeList'] = $tmpt;
		

		
		$id = $this->uri->segment('3'); 
		$page_data['result'] = $this->VegetationModel->getvegetationbyID($id);
		$page_data['localList'] = $this->VegetationModel->getregionbyID($id);
		// var_dump($page_data);
		// die();
		$this->load->view('vegetations/vegetation_edit',$page_data);
		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');

	}
	//ฟังก์ชันแก้ไข
	public function save_edit_vegetation()
	{
		$data = array( 
		'n_common_TH' => $this->input->post('n_common_TH'),
		'n_common_ENG' => $this->input->post('n_common_ENG'),
		'n_scientific' => $this->input->post('n_scientific'),
		'n_family' => $this->input->post('n_family'),
		'typeID' => $this->input->post('typeID'),
		'appearance' => $this->input->post('appearance'),
		'plant_origin' => $this->input->post('plant_origin'),
		'distribution' => $this->input->post('distribution'),
		'ecological' => $this->input->post('ecological'),
		'activeFlag' => $this->input->post('activeFlag'),
		'produce_period' => $this->input->post('produce_period'),
		'flowering_period' => $this->input->post('flowering_period'),
		'propagation' => $this->input->post('propagation'),
		'co2_storage' => $this->input->post('co2_storage'),
		'reference' => $this->input->post('reference'),
		'reference_data' => $this->input->post('reference_data')
		);
		// var_dump($data);
		// die();

		$this->load->model('VegetationModel');
		$id = $this->input->post('vegetationID');
		$this->VegetationModel->update($data,$id);
		if($data && $id){
			$this->session->set_flashdata('message_error', 'แก้ไขข้อมูลผู้ใช้งานสำเร็จ');
			redirect('Vegetations/vegetation');
		}else{
			$this->session->set_flashdata('message_error', 'แก้ไขข้อมูลผู้ใช้งานไม่สำเร็จ');
			redirect('Vegetations/vegetation');
		}
	}
	//ลบ
	public function delete_vegetation()
	{
		$this->load->model('VegetationModel');
		 $id = $this->uri->segment('3'); 
		 $this->VegetationModel->delete($id); 
		 if($id){
			 $this->session->set_flashdata('message_error', 'ลบโซนสำเร็จ');
			 redirect('Vegetations/vegetation');
		 }else{
			 $this->session->set_flashdata('message_error', 'ลบโซนไม่สำเร็จ');
			 redirect('Vegetations/vegetation');
		 }
	 }


}

