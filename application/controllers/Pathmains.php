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
		$config['upload_path']          = 'image/plant';
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
        $medicinalPropertiesID = null;
		$properties = $_POST["properties"];
		$instruction 	= $_POST["instruction"];
		$caution = $_POST["caution"];
		$reference = $_POST["reference"];
		$vegetation_vegetationID = $_POST["vegetation_vegetationID"];
		$plantspath_pathID = $_POST["plantspath_pathID"];
		$imageplantID = null;
		// $URL= $_POST["URL"];
		
		$data = array(
			"medicinalPropertiesID"=>$medicinalPropertiesID, 
			"properties"=>$properties, 
			"instruction"=>$instruction,
			"caution"=>$caution,
			"reference"=>$reference,
			"vegetation_vegetationID"=>$vegetation_vegetationID,
			"plantspath_pathID"=>$plantspath_pathID,
			"imageplantID"=>$imageplantID,
			"imageURL"=>$url
			
		);
		// var_dump($data);
		// die();

		$this->load->model('PathmainModel');
		$tmp = $this->PathmainModel->insert_pathmain($data);
		if($tmp){
			$this->session->set_flashdata('message_error', 'เพิ่มส่วนประกอบต้นไม้สำเร็จ');
			redirect('Plantpaths/plantpath');

		}else{
			$this->session->set_flashdata('message_error', 'เพิ่มส่วนประกอบต้นไม้ไม่สำเร็จ');
			redirect('Plantpaths/plantpath');
		}
    }

}