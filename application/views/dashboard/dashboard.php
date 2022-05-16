<?php 
if ($this->session->userdata('message_error')) {
    $message = $_SESSION['message_error'];
?>
<div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-fill-check" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm2.146 5.146a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647z"/>
    </svg>
      <strong><?php echo $message;?></strong> 
</div>
    <script>
        $(".alert").fadeTo(2000, 500).slideUp(500, function(){
        $(".alert").slideUp(500);
        });
    </script>

<?php 
}
?>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- <?php var_dump($vegetationcount[0]->count_name); ?> -->
<!-- <?php var_dump($plantcount); ?> -->
<!-- ออกreport -->
    <div class="text-right">
      <!-- <a  href="<?php echo site_url("Imagemaps/new_imagemap"); ?>" id="download_link" onClick="javascript:ExcelReport();" ><button type="submit" class="btn btn-success"><i class="material-icons"></i>ออกรายงาน</button></a>
     -->
     <?php
          echo form_open('simpleexport',' name="form_export" ');
      ?>
          <button class="btn btn-success" type="submit" name="btn_export" id="btn_export" style="font-size:20px ;"><i class="material-icons" style="font-size:30px ;">assignment </i> ออกรายงาน</button>
      <?php
          echo "</form>";
      ?>
    </div>

<div class="row">
<div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">forest</i>
                  </div>
                  <p class="card-category">จำนวนต้นไม้</p>
                  <h3 class="card-title"><?php echo $plantcount[0]->count_ID?>
                    <small>ต้น</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <!--<div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="javascript:;">Get More Space...</a>
                  </div>-->
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">park</i>
                  </div>
                  <p class="card-category">จำนวนพรรณไม้</p>
                  
                  <h3 class="card-title"><?php echo $vegetationcount[0]->count_name?>
                  <small>ชนิด</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <!--<div class="stats">
                    <i class="material-icons">date_range</i> Last 24 Hours
                  </div>-->
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">map</i>
                  </div>
                  <p class="card-category">จำนวนโซน</p>
                  <h3 class="card-title"><?php echo $zonecount[0]->count_ID?>
                  <small>โซน</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <!--<div class="stats">
                    <i class="material-icons">date_range</i> Last 24 Hours
                  </div>-->
                </div>
              </div>
            </div>
          </div>
          <!--<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">Latest Users</h3>
				  </div>
				  <div class="panel-body">
				    <table class="table table-striped table-hover">
				    	<tr>
				    	<th>Name</th>
				    	<th>Email</th>
				    	<th>Joined</th>
				    	</tr>
				    	<tr>
				    	<td>Piyush Arora</td>
				    	<td>connect@piyusharora.co</td>
				    	<td>June, 19th 1992</td>
				    	</tr>
				    	<tr>
				    	<td>John Doe</td>
				    	<td>john@doe.com</td>
				    	<td>May 21st 1981</td>
				    	</tr>
				    	<tr>
				    	<td>Jill Doe</th>
				    	<td>jill@doe.com</td>
				    	<td>May 21st 1981</td>
				    	</tr>
				    </table>
				  </div>
				</div>-->
        <?php
// เมื่อคลิกที่ปุ่ม btn_export เพื่อออกรายงาน
if($this->input->post("btn_export")){
    // โหลด excel library
    $this->load->library('excel');    
     
    // เรียนกใช้ PHPExcel  
    $objPHPExcel = new PHPExcel();   
    // เราสามารถเรียกใช้เป็น  $this->excel แทนก็ได้
     
    // กำหนดค่าต่างๆ ของเอกสาร excel
    $objPHPExcel->getProperties()->setCreator("Ninenik.com")  
                                 ->setLastModifiedBy("Ninenik.com")  
                                 ->setTitle("PHPExcel Test Document")  
                                 ->setSubject("PHPExcel Test Document")  
                                 ->setDescription("Test document for PHPExcel, generated using PHP classes.")  
                                 ->setKeywords("office PHPExcel php")  
                                 ->setCategory("Test result file");      
 
    // กำหนดชื่อให้กับ worksheet ที่ใช้งาน  
    $objPHPExcel->getActiveSheet()->setTitle('Product Report');  
       
    // กำหนด worksheet ที่ต้องการให้เปิดมาแล้วแสดง ค่าจะเริ่มจาก 0 , 1 , 2 , ......  
    $objPHPExcel->setActiveSheetIndex(0);        
                                  
    // การจัดรูปแบบของ cell  
    $objPHPExcel->getDefaultStyle()  
                            ->getAlignment()  
                            ->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)  
                            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);   
                            //HORIZONTAL_CENTER //VERTICAL_CENTER               
                             
    // จัดความกว้างของคอลัมน์
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);     
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);                                              
     
    // กำหนดหัวข้อให้กับแถวแรก
    $objPHPExcel->setActiveSheetIndex(0)  
                ->setCellValue('A1', 'ลำดับ')    
                ->setCellValue('B1', 'รหัสสินค้า')  
                ->setCellValue('C1', 'ชื่อสินค้า')  
                ->setCellValue('D1', 'ราคา');    
         
    // ดึงข้อมูลเริ่มเพิ่มแถวที่ 2 ของ excel            
    $start_row=2;  
    $sql = "
    SELECT *                                
    FROM tbl_product
    ";
 
    $query = $this->db->query($sql);  
    $result = $query->result_array(); 
    $i_num=0;
    if(count($result)>0){
        foreach($result as $row){
            $i_num++;
             
            // หากอยากจัดข้อมูลราคาให้ชิดขวา
            $objPHPExcel->getActiveSheet()
                ->getStyle('C'.$start_row)
                ->getAlignment()  
                ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);         
                 
            // หากอยากจัดให้รหัสสินค้ามีเลย 0 ด้านหน้า และแสดง 3     หลักเช่น 001 002
            $objPHPExcel->getActiveSheet()
                ->getStyle('B'.$start_row)
                ->getNumberFormat()
                ->setFormatCode('000');          
             
            // เพิ่มข้อมูลลงแต่ละเซลล์                          
            $objPHPExcel->setActiveSheetIndex(0)  
                        ->setCellValue('A'.$start_row, $i_num)  
                        ->setCellValue('B'.$start_row, $row['pro_id'])  
                        ->setCellValue('C'.$start_row, $row['pro_name'])  
                        ->setCellValue('D'.$start_row, $row['pro_price']);           
             
            // เพิ่มแถวข้อมูล
            $start_row++;               
        }
 
        // กำหนดรูปแบบของไฟล์ที่ต้องการเขียนว่าเป็นไฟล์ excel แบบไหน ในที่นี้เป้นนามสกุล xlsx  ใช้คำว่า Excel2007
        // แต่หากต้องการกำหนดเป็นไฟล์ xls ใช้กับโปรแกรม excel รุ่นเก่าๆ ได้ ให้กำหนดเป็น  Excel5
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  // Excel2007 (xlsx) หรือ Excel5 (xls)        
         
        $filename='Product-'.date("dmYHi").'.xlsx'; //  กำหนดชือ่ไฟล์ นามสกุล xls หรือ xlsx
        // บังคับให้ทำการดาวน์ดหลดไฟล์
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        ob_end_clean();     
        $objWriter->save('php://output'); // ดาวน์โหลดไฟล์รายงาน
        // หากต้องการบันทึกเป็นไฟล์ไว้ใน server  ใช้คำสั่งนี้ $this->excel->save("/path/".$filename); 
        // แล้วตัด header ดัานบนทั้ง 3 อันออก   
        exit;
    }
     
}
?>