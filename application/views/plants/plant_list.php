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
                  <a  href="<?php echo site_url("Plants/new_plant"); ?>" ><button type="submit" class="btn btn-success"><i class="material-icons">add</i>เพิ่มต้นไม้</button></a>
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
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody> 	
                    <?php foreach($plantList as $row){?>
                        <tr>
                            <td><?php echo $row->zoneID ."-".$row->vegetationID; ?></td>
                            <td><?php echo $row->n_common_TH; ?></td>
                            <td><?php echo $row->nameTH; ?></td>
                            <td><?php echo $row->actual; ?></td>
                            <td><?php echo $row->show; ?></td>
                            <td><?php echo $row->exclusivity; ?></td>
                            <td>Code</td>
                            <td class="text-center">
                                  <button type="button" title="View" class="btn btn-info" onclick="infoClick('<?php echo $row->plantID; ?>')"><i class="material-icons">info</i></button>      
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
                    console.log(plantID);

                    // $("#image_profile").attr('src',user['imageURL']); ภาพ
                    $('#namezone').val(plant['nameTH']);
                    $('#commonTH').val(vegetation['n_common_TH']);
                    $('#n_scientific').val(vegetation['n_scientific']);
                    $('#n_family').val(vegetation['n_family']);
                    $('#localname').val(vegetation['localname']);
                    $('#region').val(vegetation['region']);
                    $('#type').val(vegetation['type']);
                    $('#appearance').val(vegetation['appearance']);
                    $('#origin').val(vegetation['plant_origin']);
                    $('#distribution').val(vegetation['distribution']);

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
                  <img class="img-fluid rounded mx-auto d-block" id="image_profile" src="" style="width:50%; ">
                </div>
                <!-- row1 -->
                <div class="form-group row">
                  <label for="namezone" class="col-form-label">โซน:</label>
                    <div class="col-sm-10" style="margin: -13px 0 0 70px;">
                      <input type="text" class="form-control" id="namezone" style="width:200px;">
                    </div>
                  <label for="commonEN" class="col-form-label" style="margin: 0 0 0 300px;">ชื่อภาษาอังกฤษ:</label>
                    <div class="col-sm-10" style="margin: -36px 0 0 388px;">
                      <input type="text" class="form-control" id="commonEN" style="width:200px;">
                    </div>
                </div>
                <!-- row2 -->
                <div class="form-group row">
                  <label for="n_scientific" class="col-form-label">ชื่อทางวิทยาศาสตร์:</label>
                    <div class="col-sm-10" style="margin: -10px 0 0 106px;">
                      <input type="text" class="form-control" id="n_scientific" style="width: 484px;">
                    </div>
                </div>
                <!-- row3 -->
                <div class="form-group row">
                  <label for="n_family" class="col-form-label">ชื่อวงศ์:</label>
                    <div class="col-sm-10" style="margin: -13px 0 0 35px;">
                      <input type="text" class="form-control" id="n_family" style="width:215px;">
                    </div>
                  <label for="localname" class="col-form-label" style="margin: 0 0 0 280px;">ชื่อพื้นเมือง:</label>
                    <div class="col-sm-10" style="margin: -36px 0 0px 338px;">
                      <input type="text" class="form-control" id="localname" style="width:250px;">
                    </div>
                </div>
                <!-- row4 -->
                <div class="form-group row">
                  <label for="region" class="col-form-label">ภูมิภาค:</label>
                    <div class="col-sm-10" style="margin: -13px 0 0 38px;">
                      <input type="text" class="form-control" id="region" style="width:150px;">
                    </div>
                    <label for="type" class="col-form-label" style="margin: 0 0 0 218px;">ประเภท:</label>
                    <div class="col-sm-10" style="margin: -36px 0 0px 261px;">
                      <input type="text" class="form-control" id="type" style="width:150px;">
                    </div>
                </div>
                <!-- head -->
                <div class="row">
                  <h5><ins>รายละเอียด</ins></h5>
                </div>
                <!-- row5 -->
                <div class="form-group row">
                  <label for="appearance" class="col-form-label">ลักษณะ:</label>
                    <div class="col-sm-10" style="margin: -10px 0 0px 40px;">
                      <textarea class="form-control" id="appearance" rows="6" style="width: 550px;"></textarea>
                    </div>
                </div>
                <!-- row6 -->
                <div class="form-group row">
                  <label for="origin" class="col-form-label">ถิ่นกำเนิด:</label>
                    <div class="col-sm-10" style="margin: -10px 0 0px 50px;">
                    <textarea class="form-control" id="origin" rows="2" style="width: 540px; "></textarea>
                    </div>
                </div>
                <!-- row7 -->
                <div class="form-group row">
                  <label for="distribution" class="col-form-label">การกระจายพันธุ์:</label>
                    <div class="col-sm-10" style="margin: -10px 0 0px 40px;">
                    <textarea class="form-control" id="distribution" rows="2" style="width: 505px; margin: 0 0 0 45px;"></textarea>
                    </div>
                </div>
                <!-- row8 -->
                <div class="form-group row">
                  <label for="growth" class="col-form-label">การเจริญเติบโต:</label>
                    <div class="col-sm-10" style="margin: -10px 0 0px 40px;">
                    <textarea class="form-control" id="growth" rows="2" style="width: 505px; margin: 0 0 0 45px;"></textarea>
                    </div>
                </div>
                <!-- row9 -->
                <div class="form-group row">
                  <label for="shape" class="col-form-label">รูปทรง:</label>
                    <div class="col-sm-10" style="margin: -13px 0 0 35px;">
                    <input type="text" class="form-control" id="shape" style="width: 555px;">
                    </div>
                </div>
                <!-- row10 -->
                <div class="form-group row">
                  <label for="defoliation" class="col-form-label">การผลัดใบ:</label>
                    <div class="col-sm-10" style="margin: -13px 0 0 58px;">
                    <input type="text" class="form-control" id="defoliation" style="width: 529px;">
                    </div>
                </div>
                <!-- row11 -->
                <div class="form-group row">
                  <label for="fperiod" class="col-form-label">ช่วงออกดอก:</label>
                    <div class="col-sm-10" style="margin: -13px 0 0 69px;">
                    <input type="text" class="form-control" id="fperiod" style="width: 520px;">
                    </div>
                </div>
                <!-- row12 -->
                <div class="form-group row">
                  <label for="propagationname" class="col-form-label">วิธีการขยายพันธุ์:</label>
                    <div class="col-sm-10" style="margin: -13px 0 0 90px;">
                    <input type="text" class="form-control" id="propagationname" style="width: 250px;">
                    </div>
                </div>
                <!-- row13 -->
                <div class="form-group row">
                  <label for="co2_storage" class="col-form-label">การกักเก็บคาร์บอนไดร์ออกไซด์(ตัน):</label>
                    <div class="col-sm-10" style="margin: -13px 0 0 203px;">
                    <input type="text" class="form-control" id="co2_storage" style="width: 387px;">
                    </div>
                </div>
                <!-- row14 -->
                <div class="form-group row">
                  <label for="reference" class="col-form-label">แหล่งที่มาของพันธุ์ไม้:</label>
                    <div class="col-sm-10" style="margin: -13px 0 0 90px;">
                    <textarea class="form-control" id="reference" rows="2" style="width: 475px; margin: 0 0 0 25px;"></textarea>
                    </div>
                </div>
                <!-- row15 -->
                <div class="form-group row">
                  <label for="reference_data" class="col-form-label">แหล่งที่มาของข้อมูล:</label>
                    <div class="col-sm-10" style="margin: -13px 0 0 90px;">
                    <textarea class="form-control" id="reference_data" rows="2" style="width: 475px; margin: 0 0 0 25px;"></textarea>
                    </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
              <button type="button" class="btn btn-primary">บันทึกข้อมูล</button>
            </div>
          </div>
        </div>
</div>
<!-- close modal info--> 