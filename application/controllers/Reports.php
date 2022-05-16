<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Reports extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	}
    
        //SELECT v.*,COUNT(p.plantID) FROM vegetation v LEFT JOIN plants p on v.vegetationID = p.vegetation_vegetationID GROUP BY v.vegetationID;

        //SELECT z.*,v.n_common_TH, COUNT(p.plantID) FROM zone z LEFT JOIN plants p on z.zoneID = p.zone_zoneID JOIN vegetation v on v.vegetationID = p.vegetation_vegetationID GROUP BY z.zoneID

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

	public function spreadsheet_export()
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

			foreach (range('A', 'I') as $letra) {            
				$spreadsheet->getActiveSheet()->getColumnDimension($letra)->setAutoSize(true);
			}
			$sheet = $spreadsheet->getActiveSheet();
			$sheet->getStyle('A1:I1')->getFont()->setBold(true);
			$sheet->setCellValue('A1', 'S.No');
			$sheet->setCellValue('B1', 'Product Name');
			// $sheet->setCellValue('C1', 'Quantity');
			// $sheet->setCellValue('D1', 'Price');

			$i=2;
			foreach ($vegelist as $row) {
				//echo $prod->product_name;
				$sheet->setCellValue('A'.$i,$row->vegetationID);
				$sheet->setCellValue('B'.$i,$row->n_common_TH);
				// $sheet->setCellValue('C'.$i,$row->product_quantity);
				// $sheet->setCellValue('D'.$i,$row->product_price);
				$i++;
			}

			$writer = new Xlsx($spreadsheet);
			$writer->save("php://output");
			
	}

}