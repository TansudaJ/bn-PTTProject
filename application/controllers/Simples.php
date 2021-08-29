<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simples extends CI_Controller {
	public function simple()
	{
		$this->load->model('SimpleModel');
		$tmp = $this->SimpleModel->get_all_simples();
		$data = array('navbar_name'=>'จัดการข้อมูลต้นไม้');
		$data_top = array('activebar'=>'simple');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		
		//$this->load->view('users/user_form');
		//$page_data = array('userList'=>$tmp,'datatml2'=>$tmp2);
		$page_data['treeList'] = $tmp;
		//$page_data['datatmp2'] = $tmp2;

		$this->load->view('simple/simple_list',$page_data);

		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
	}
}
