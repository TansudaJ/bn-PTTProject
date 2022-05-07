<?php 
if ($this->session->userdata('message_error')) {
    $message = $_SESSION['message_error'];
    $this->session->unset_userdata('message_error');

?>
    <div class="alert alert-success">
      <strong><?php echo $message;?>!</strong>
    </div>
    <script>
        $(".alert").fadeTo(2000, 500).slideUp(500, function(){
        $(".alert").slideUp(500);
        });
    </script>
<?php } ?>

<style>
  tr:nth-child(even){background-color: #f2f2f2}
th {
  background-color: #04AA6D;
  color: white;
}
table {
  margin: 0;
}
button.btn.btn-info:host {
    width: 20px;
    height: 34px;
}
</style>
<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title "><?php echo $navbar_name?></h4>
                </div>
                <div class="card-body">
                <div class="text-right">
                  <?php if($_SESSION['authority_authorityID'] != '3'){?>
                    <a  href="<?php echo site_url("Plants/new_plant"); ?>" ><button type="submit" class="btn btn-success"><i class="material-icons">add</i>เพิ่มต้นไม้</button></a>
                  <?php } ?>
                  </div>
                  <div class="table-responsive">
                  <table id="example1" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">รหัส</th>
                            <th class="text-center">ชื่อ</th>
                            <th class="text-center">บริเวณที่ปลูก</th>
                            <th class="text-center">สภาพปัจจุบัน</th>
                            <th class="text-center">จุดแสดงในแผนที่</th>
                            <th class="text-center">ความพิเศษ</th>
                            <th class="text-center">QR code</th>
                            <th class="text-center">สถานะการใช้งาน</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody> 	
                    <?php foreach($plantList as $row){?>
                        <tr>
                            <td><?php echo $row->zoneID ."-".$row->plantID; ?></td>
                            <td><?php echo $row->n_common_TH; ?></td>
                            <td><?php echo $row->nameTH; ?></td>
                            <td><?php echo $row->actual; ?></td>
                            <td><?php if($row->show == 0){
                                        echo "ไม่แสดง";
                                      }else{
                                        echo "แสดง";
                                      }
                             ?></td>
                            <td><?php echo $row->exclusivity; ?></td>
                            <td><img src="<?php echo base_url().$row->QRCode;?>" alt="" width="100px" height="100px"></td>
                            <td><?php echo ($row->activeFlag == 1) ? "ใช้งาน": "ไม่ใช้งาน"; ?></td>
                            <td class="text-center">
                                  <button type="button" title="View" class="btn btn-info btn-sm" onclick="infoClick('<?php echo $row->plantID; ?>')"><i class="material-icons">info</i></button>
                                  <a href="<?php echo site_url("Plants/edit_plant_form/$row->plantID"); ?>"><button type="button" title="Edit" class="btn btn-warning btn-sm" ><i class="material-icons">edit</i></button></a>
                                  <a onclick="return confirm('คุณต้องการลบข้อมูลต้นไม้ออกหรือไม่?')" href="<?php echo site_url("Plants/delete_plant/$row->plantID"); ?>"><button type="button" title="Delete" class="btn btn-danger btn-sm"><i class="material-icons">delete</i></button>      
                            </td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <script>
              function page_script(){
                $('#example1').DataTable();
                $('#example2').DataTable();
              }
              function infoClick(plantID){
                
                $.ajax({
                  type: "GET",
                  url: "http://localhost/bn-PTTProject/index.php/API001/plantbyID/"+plantID,
                  contentType: "application/x-www-form-urlencoded;charset=ISO-8859-15",
                  dataType: 'json',
                  success: function(data){
                    plant = data['data'][0];
                    
                    $("#image_plant").attr('src',"<?php echo base_url()?>"+plant['URL']);
                    $("#image_QRCode").attr('src',"<?php echo base_url()?>"+plant['QRCode']);
                    $('#namezone').val(plant['nameTH']);
                    $('#commonTH').val(plant['n_common_TH']);
                    $('#coordinates').val(plant['coordinates']);
                    $('#diameter').val(plant['diameter']);
                    $('#height').val(plant['height']);
                    $('#planting_area').val(plant['planting_area']);
                    $('#actual').val(plant['actual']);
                    $('#show').val((plant['show']) == 1 ? 'แสดง' : 'ไม่แสดง');
                    $('#exclusivity').val(plant['exclusivity']);

                    $('#info_modal').modal('toggle');
                  }
                });


              }
          </script>
     

<!-- open modal info--> 
<div class="modal fade" id="info_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content" style="width: fit-content;">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">ข้อมูลต้นไม้</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <!-- head -->
                <div class="row">
                  <h5><ins>ข้อมูลทั่วไป</ins></h5>
                </div>
                <!-- image -->
                <div class="form-group">
                  <img class="img-fluid rounded mx-auto d-block" id="" src="" style="width:50%; ">
                </div>
                <!-- row1 -->
                <div class="form-group row">
                  <label for="namezone" class="col-form-label">โซน:</label>
                    <div class="col-sm-10" style="margin: -13px 0 0 22px;">
                      <input type="text" class="form-control" id="namezone" style="width:200px;">
                    </div>
                  <label for="commonTH" class="col-form-label" style="margin: 0 0 0 255px;">ชื่อพันธุ์ไม้:</label>
                    <div class="col-sm-10" style="margin: -36px 0 0 312px;">
                      <input type="text" class="form-control" id="commonTH" style="width:200px;">
                    </div>
                </div>
                <!-- row2 -->
                <div class="form-group row">
                  <label for="coordinates" class="col-form-label">พิกัดต้นไม้:</label>
                    <div class="col-sm-10" style="margin: -10px 0 0 58px;">
                      <input type="text" class="form-control" id="coordinates" style="width: 180px;">
                    </div>
                  <label for="localname" class="col-form-label" style="margin: 0 0 0 270px;">ความพิเศษ:</label>
                    <div class="col-sm-10" style="margin: -36px 0 0px 338px;">
                      <input type="text" class="form-control" id="localname" style="width:250px;">
                    </div>
                </div>
                <!-- row3 -->
                <div class="form-group row">
                  <label for="diameter" class="col-form-label">เส้นผ่านศูนย์กลาง:</label>
                    <div class="col-sm-10" style="margin: -13px 0 0 100px;">
                      <input type="text" class="form-control" id="diameter" style="width:180px;">
                    </div>
                  <label for="localname" class="col-form-label" style="margin: 0 0 0 310px;">ความสูง:</label>
                    <div class="col-sm-10" style="margin: -36px 0 0px 355px;">
                      <input type="text" class="form-control" id="localname" style="width:180px;">
                    </div>
                </div>
                <!-- row4 -->
                <div class="form-group row">
                  <label for="show" class="col-form-label">การจัดแสดงในแผนที่:</label>
                    <div class="col-sm-10" style="margin: -13px 0 0 115px;">
                      <input type="text" class="form-control" id="show" style="width:90px;">
                    </div>
                    <label for="actual" class="col-form-label" style="margin: 0 0 0 250px;">สภาพปัจจุบัน:</label>
                    <div class="col-sm-10" style="margin: -36px 0 0px 322px;">
                      <input type="text" class="form-control" id="actual" style="width:150px;">
                    </div>
                </div>
                <!-- image -->
                <div class="form-group">
                  <label for="">QRCode</label>
                  <img class="img-fluid rounded mx-auto d-block" id="image_QRCode" src="" style="width:35%; ">
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">ปิด</button>
            </div>
          </div>
        </div>
</div>
<!-- close modal info--> 