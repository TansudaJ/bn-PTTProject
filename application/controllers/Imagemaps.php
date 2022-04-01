<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Imagemaps extends CI_Controller {
    public function imagemap()
	{
		$this->load->model('ImagemapModel');
		$tmp = $this->ImagemapModel->get_all_imagemap();

		$data = array('navbar_name'=>'จัดการแผนที่รูปภาพ');
		$data_top = array('activebar'=>'imagemap');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		//$this->load->view('users/user_form');
		//$page_data = array('userList'=>$tmp,'datatml2'=>$tmp2);
		$page_data['imagemapList'] = $tmp;
		//$page_data['datatmp2'] = $tmp2;

		$this->load->view('imagemaps/imagemap_list',$page_data);

		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
	}
    
}