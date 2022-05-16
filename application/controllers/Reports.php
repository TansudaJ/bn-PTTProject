<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {
    function index(){
        //SELECT v.*,COUNT(p.plantID) FROM vegetation v LEFT JOIN plants p on v.vegetationID = p.vegetation_vegetationID GROUP BY v.vegetationID;

        //SELECT z.*,v.n_common_TH, COUNT(p.plantID) FROM zone z LEFT JOIN plants p on z.zoneID = p.zone_zoneID JOIN vegetation v on v.vegetationID = p.vegetation_vegetationID GROUP BY z.zoneID
    }

    public function report()
	{
		$this->load->model('ReportModel');
		$tmp = $this->ReportModel->get_all_vegereports();
		
		$data = array('navbar_name'=>'ออกรายงานพันธุ์ไม้');
		$data_top = array('activebar'=>'vegereport');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		
		$page_data['vegetationList'] = $tmp;
		$this->load->view('reports/report_vegelist',$page_data);

		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
	}

	public function export_report_excel()
	{
			// โหลด excel library
			$this->load->library('Excel');
			//โหลดโมเดล
			$this->load->model('ReportModel');
			$tmp = $this->ReportModel->get_all_vegereports();
			
			
	}

}