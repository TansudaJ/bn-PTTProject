<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Reports extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	}

    public function vegereport()
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

	public function spreadsheet_export_vege()
	{

			//โหลดโมเดล
			$this->load->model('ReportModel');

			//fetch my data
			$vegelist=$this->ReportModel->get_all_vegereports();
			
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="รายงานข้อมูลพันธุ์ไม้.xlsx"');
			
			
			$spreadsheet = new Spreadsheet();
			// กำหนดค่าเริ่มต้น รูปแบบ
			$spreadsheet->getDefaultStyle()->getFont()->setName('TH SarabunPSK');
			$spreadsheet->getDefaultStyle()->getFont()->setSize(16);

			foreach (range('B', 'F') as $letra) {            
				$spreadsheet->getActiveSheet()->getColumnDimension($letra)->setAutoSize(true);
			}
			$sheet = $spreadsheet->getActiveSheet();
			$sheet->getStyle('A1:F1')->getFont()->setBold(true);
			$sheet->getStyle('A1:F1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
			$sheet->setCellValue('A1', '#');
			$sheet->setCellValue('B1', 'ชื่อพันธุ์ไม้ภาษาไทย');
			$sheet->setCellValue('C1', 'ชื่อพันธุ์ไม้ภาษาอังกฤษ');
			$sheet->setCellValue('D1', 'ประเภทพันธุ์ไม้');
			$sheet->setCellValue('E1', 'สถานะการใช้งาน');
			$sheet->setCellValue('F1', 'จำนวนต้นไม้ในพันธุ์ไม้ (ต้น)');
			$i=2;
			foreach ($vegelist as $rowv) {
				//echo $prod->product_name;
				$sheet->setCellValue('A'.$i,$rowv->vegetationID);
				$sheet->setCellValue('B'.$i,$rowv->n_common_TH);
				$sheet->setCellValue('C'.$i,$rowv->n_common_ENG);
				$sheet->setCellValue('D'.$i,$rowv->typename);
				$sheet->setCellValue('E'.$i,($rowv->activeFlag == 1) ? 'ใช้งาน':'ไม่ใช้งาน');
				$sheet->setCellValue('F'.$i,$rowv->countp);
				$i++;
			}

			$writer = new Xlsx($spreadsheet);
			$writer->save("php://output");
	}
	
	public function zonereport()
	{
		$this->load->model('ReportModel');
		$tmp = $this->ReportModel->get_all_zonereports();
		
		$data = array('navbar_name'=>'ออกรายงานโซน');
		$data_top = array('activebar'=>'zonereport');
		$this->load->view('dashboard/top',$data_top);
		$this->load->view('dashboard/navbar',$data);
		$this->load->view('dashboard/topcontent');
		
		$page_data['zoneList'] = $tmp;
		$this->load->view('reports/report_zonelist',$page_data);

		$this->load->view('dashboard/footcontent');
		$this->load->view('dashboard/footer');
	}

	public function spreadsheet_export_zone()
	{
			//โหลดโมเดล
			$this->load->model('ReportModel');
			//fetch my data
			$zonelist=$this->ReportModel->get_all_zonereports();
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="รายงานข้อมูลโซน.xlsx"');
			
			$spreadsheet = new Spreadsheet();
			// กำหนดค่าเริ่มต้น รูปแบบ
			$spreadsheet->getDefaultStyle()->getFont()->setName('TH SarabunPSK');
			$spreadsheet->getDefaultStyle()->getFont()->setSize(16);

			foreach (range('B','F') as $letra) {            
				$spreadsheet->getActiveSheet()->getColumnDimension($letra)->setAutoSize(true);
			}
			$sheet = $spreadsheet->getActiveSheet();
			$sheet->getStyle('A1:F1')->getFont()->setBold(true);
			$sheet->getStyle('A1:F1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
			$sheet->setCellValue('A1', '#');
			$sheet->setCellValue('B1', 'ชื่อโซน');
			$sheet->setCellValue('C1', 'พันธุ์ไม้');
			$sheet->setCellValue('D1', 'สถานะบนแผนที่');
			$sheet->setCellValue('E1', 'สถานะการใช้งาน');
			$sheet->setCellValue('F1', 'จำนวนต้นไม้ในโซน (ต้น)');
			$i=2;
			
			foreach ($zonelist as $rowz) {
				//echo $prod->product_name;
				$sheet->setCellValue('A'.$i,$rowz->headzoneID .'-'.$rowz->zoneID);
				$sheet->setCellValue('B'.$i,$rowz->nameTH ." (".$rowz->nameEN.")");
				$sheet->setCellValue('C'.$i,$rowz->n_common_TH);
				$sheet->setCellValue('D'.$i,($rowz->status == 1) ? 'แสดง': 'ไม่แสดง');
				$sheet->setCellValue('E'.$i,($rowz->activeflag == 1) ? 'ใช้งาน':'ไม่ใช้งาน');
				$sheet->setCellValue('F'.$i,$rowz->countp);
				$i++;
			}

			$writer = new Xlsx($spreadsheet);
			$writer->save("php://output");
	}

}