<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Imagemaps extends CI_Controller {
    public function imagemap()
	{
		$this->load->model('ImagemapModel');
		$tmp = $this->ImagemapModel->get_all_imagemaps();

		$data = array('navbar_name'=>'จัดการข้อมูลแผนที่');
		$data_top = array('activebar'=>'imagemap');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		
		$page_data['mapList'] = $tmp;

		$this->load->view('imagemaps/imagemap_list',$page_data);

		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
		
	}
    // loadหน้าเพิ่ม
	public function new_imagemap()
	{
		$this->load->model('ImagemapModel');
		$tmp = $this->ImagemapModel->get_all_imagemaps();
        $tmpz = $this->ImagemapModel->get_all_zones();

		$data = array('navbar_name'=>'จัดการข้อมูลแผนที่');
		$data_top = array('activebar'=>'imagemap');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		$page_data['userForm'] = $tmp;
        $page_data['zoneList'] = $tmpz;

		$this->load->view('imagemaps/imagemap_form',$page_data);

		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
	}
    //ฟังก์ชันเพิ่ม
    public function new_imagemap_add()
	{
		// upload
		$config['upload_path']          = 'imagemap/';
        $config['allowed_types']        = 'gif|jpg|png';

        $this->load->library('upload', $config);
		// var_dump($_POST);
		$this->upload->initialize($config); 

		$img_url = "";

        if ( ! $this->upload->do_upload('imageURL'))
        {
                $error = array('error' => $this->upload->display_errors());
				var_dump($error);
        }else{
                $data_upload = array('upload_data' => $this->upload->data());
                $img_url = "imagemap/".$data_upload["upload_data"]["file_name"];
        }
		// die();
		
		$data["imagezoneID"] = NULL;
		$data["imagedetail"] = $_POST["imagedetail"];
        $data["imageURL"] = $img_url;
        $data["zone_zoneID"] = $_POST["zone_zoneID"];
		
		$this->load->model('ImagemapModel');
		$tmp = $this->ImagemapModel->insert_imagemap($data);
		if($tmp){
			$this->session->set_flashdata('message_error', 'เพิ่มข้อมูลแผนที่สำเร็จ');
			redirect('Imagemaps/imagemap');

		}else{
			$this->session->set_flashdata('message_error', 'เพิ่มข้อมูลแผนที่ไม่สำเร็จ');
			redirect('Imagemaps/imagemap');
		}

	}

    //loadหน้าแก้ไข
	public function edit_imagemap_form()
	{
		$this->load->model('ImagemapModel');
		$tmpz = $this->ImagemapModel->get_all_zones();
		
		$data = array('navbar_name'=>'จัดการข้อมูลแผนที่');
		$data_top = array('activebar'=>'imagemap');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		$page_data['zoneList'] = $tmpz;
		
		$id = $this->uri->segment('3'); 
		$data['result'] = $this->ImagemapModel->getimagemapbyID($id);
		$this->load->view('imagemaps/imagemap_edit',$data,$page_data);
		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');

	}
	//ฟังก์ชันแก้ไข
	public function save_edit_imagemap()
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

		$this->load->model('ImagemapModel');

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
		
		if ($img_url != "") {
			$data['imageURL'] = $img_url;
		}

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