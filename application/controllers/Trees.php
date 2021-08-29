<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trees extends CI_Controller {
	public function tree()
	{
		$this->load->model('TreeModel');
		$tmp = $this->TreeModel->get_all_trees();
		//$tmp2 = $this->UserModel->check_username_password('111','222');
		
//		var_dump($tmp);

		$data = array('navbar_name'=>'จัดการข้อมูลต้นไม้');
		$data_top = array('activebar'=>'tree');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		//$this->load->view('users/user_form');
		//$page_data = array('userList'=>$tmp,'datatml2'=>$tmp2);
		$page_data['treeList'] = $tmp;
		//$page_data['datatmp2'] = $tmp2;

		$this->load->view('trees/tree_list',$page_data);

		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
	}
}
