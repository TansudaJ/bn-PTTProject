<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pathmains extends CI_Controller {

    //แสดง 
    public function pathmain()
	{
		$this->load->model('PathmainModel');
		$tmp = $this->PathmainModel->get_all_pathmains();
		//$tmp2 = $this->UserModel->check_username_password('111','222');
		
//		var_dump($tmp);

		$data = array('navbar_name'=>'จัดการข้อมูลส่วนประกอบ');
		$data_top = array('activebar'=>'pathmain');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		//$this->load->view('users/user_form');
		//$page_data = array('userList'=>$tmp,'datatml2'=>$tmp2);
		$page_data['pathmainList'] = $tmp;
		//$page_data['datatmp2'] = $tmp2;

		$this->load->view('pathmains/pathmain_list',$page_data);

		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
	}

    //loadหน้าเพิ่ม
	public function new_pathmain()
	{
		$this->load->model('PathmainModel');
		$tmp = $this->PathmainModel->get_all_pathmains();
        $tmpp = $this->PathmainModel->get_all_plantpaths();
        $tmpv = $this->PathmainModel->get_all_vegetations();

		$data = array('navbar_name'=>'จัดการข้อมูลส่วนประกอบ');
		$data_top = array('activebar'=>'pathmain');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		$page_data['pathmainForm'] = $tmp;
        $page_data['plantpathList'] = $tmpp;
        $page_data['vegetationList'] = $tmpv;

		$this->load->view('pathmains/pathmain_form',$page_data);

		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
	}
    //ฟังก์ชันเพิ่ม
    public function new_pathmain_add()
	{
        // upload
		$config['upload_path']          = 'image/vegetation';
        $config['allowed_types']        = 'gif|jpg|png';

		
        $this->load->library('upload', $config);
		// var_dump($_POST);
		$this->upload->initialize($config); 

		$url = "";

        if ( ! $this->upload->do_upload('URL'))
        {
                $error = array('error' => $this->upload->display_errors());
				var_dump($error);
                // $this->load->view('upload_form', $error);
        }
        else
        {

                $data = array('upload_data' => $this->upload->data());
                $url = "image/plant/".$data["upload_data"]["file_name"];
				// echo $img_url;

                // $this->load->view('upload_success', $data);
        }

		$data["medicinalPropertiesID"] = NULL;
		$data["properties"] = $_POST["properties"];
		$data["instruction"] = $_POST["instruction"];
		$data["caution"] = $_POST["caution"];
		$data["reference"] = $_POST["reference"];
		$data["vegetation_vegetationID"] = $_POST["vegetation_vegetationID"];
		$data["plantspath_pathID"] = $_POST["plantspath_pathID"];

		$data_img["imagevegetationID"] = null;
		$data_img["URL"] = $url;
		$data_img["status"] = null;
		$data_img["vegetation_vegetationID"] = $_POST["vegetation_vegetationID"];
		$data_img["plantpath_pathID"] = $_POST["plantspath_pathID"];

		$this->load->model('PathmainModel');
		$tmp = $this->PathmainModel->insert_pathmain($data,$data_img);
		if($tmp){
			$this->session->set_flashdata('message_error', 'เพิ่มส่วนประกอบต้นไม้สำเร็จ');
			redirect('Pathmains/pathmain');

		}else{
			$this->session->set_flashdata('message_error', 'เพิ่มส่วนประกอบต้นไม้ไม่สำเร็จ');
			redirect('Pathmains/pathmain');
		}
    }

	//loadหน้าแก้ไข
	public function edit_pathmain_form()
	{
		$this->load->model('PathmainModel');
		$tmpp = $this->PathmainModel->get_all_plantpaths();
        $tmpv = $this->PathmainModel->get_all_vegetations();
		
		$data = array('navbar_name'=>'จัดการข้อมูลส่วนประกอบ');
		$data_top = array('activebar'=>'pathmain');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		
		$page_data= array();

		$page_data['plantpathList'] = $tmpp;
		$page_data['vegetationList'] = $tmpv;

		$id = $this->uri->segment('3'); 
		$page_data['result'] = $this->PathmainModel->getpathmainbyID($id);
		// var_dump($page_data);
		// die();
		$this->load->view('pathmains/pathmain_edit',$page_data);
		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');

	}
	//ฟังก์ชันแก้ไข
	public function save_edit_pathmain()
	{
		// upload
		$config['upload_path']          = 'image/vegetation';
        $config['allowed_types']        = 'gif|jpg|png';

		
        $this->load->library('upload', $config);
		// var_dump($_POST);
		$this->upload->initialize($config); 

		$url = "";

        if ( ! $this->upload->do_upload('URL'))
        {
                $error = array('error' => $this->upload->display_errors());
				var_dump($error);
                // $this->load->view('upload_form', $error);
        }
        else
        {

                $data_upload = array('upload_data' => $this->upload->data());
                $url = "image/plant/".$data_upload["upload_data"]["file_name"];
				// echo $img_url;

                // $this->load->view('upload_success', $data);
        }

		$data = array( 
		'vegetation_vegetationID' => $this->input->post('vegetation_vegetationID'),
		'plantspath_pathID' => $this->input->post('plantspath_pathID'),
		'properties' => $this->input->post('properties'),
		'instruction' => $this->input->post('instruction'),
		'caution' => $this->input->post('caution'),
		'reference' => $this->input->post('reference')
		);
		
		$data_img = array();

		if ($url != "") {
			$data_img['URL'] = $url;
		}

		var_dump($data,$data_img);
		die();

		$this->load->model('PathmainModel');
		$id = $this->input->post('medicinalPropertiesID');
		$this->PathmainModel->update($data,$id,$data_img);
		if($data && $id){
			$this->session->set_flashdata('message_error', 'แก้ไขข้อมูลผู้ใช้งานสำเร็จ');
			redirect('Pathmains/pathmain');
		}else{
			$this->session->set_flashdata('message_error', 'แก้ไขข้อมูลผู้ใช้งานไม่สำเร็จ');
			redirect('Pathmains/pathmain');
		}
	}

}