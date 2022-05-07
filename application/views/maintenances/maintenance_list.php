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
                  <a  href="<?php echo site_url("Maintenances/new_maintenance"); ?>" ><button type="submit" class="btn btn-success"><i class="material-icons">add</i>เพิ่มวิธีการดูแล</button></a>
                  </div>
                  <div class="table-responsive">
                  <table id="example1" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">รหัส</th>
                            <th class="text-center">ชื่อโซน</th>
                            <th class="text-center">ชื่อพันธุ์ไม้</th>
                            <th class="text-center">ชื่อผู้ดูแล</th>
                            <th class="text-center">วันที่</th>
                            <th class="text-center">สถานะการใช้งาน</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody> 	
                    <?php foreach($maintenanceList as $row){?>
                        <tr>
                            <td><?php echo $row->maintenanceID; ?></td>
                            <td><?php echo $row->nameTH; ?></td>
                            <td><?php echo $row->n_common_TH; ?></td>
                            <td><?php echo $row->prefix_name."".$row->f_name ." ".$row->l_name; ?></td>
                            <td><?php echo $row->date; ?></td>
                            <td><?php echo ($row->activeFlags == 1) ? "ใช้งาน": "ไม่ใช้งาน"; ?></td>
                            <td class="text-center">
                              <button type="button" title="View" class="btn btn-info btn-sm" onclick="infoClick('<?php echo $row->maintenanceID; ?>')"><i class="material-icons">info</i></button>  
                              <a  href="<?php echo site_url("Maintenances/edit_maintenance_form/$row->maintenanceID"); ?>"><button type="button" title="Edit" class="btn btn-warning btn-sm"><i class="material-icons">edit</i></button></a>
                              <a onclick="return confirm('คุณต้องการลบข้อมูลการดูแลรักษาออกหรือไม่?')" href="<?php echo site_url("Maintenances/delete_mainmethod/$row->maintenanceID"); ?>"><button type="button" title="Delete" class="btn btn-danger btn-sm"><i class="material-icons">delete</i></button>  
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
              function infoClick(maintenanceID){
                
                $.ajax({
                  type: "GET",
                  url: "http://localhost/bn-PTTProject/index.php/API001/maintenancebyID/"+maintenanceID,
                  contentType: "application/x-www-form-urlencoded;charset=ISO-8859-15",
                  dataType: 'json',
                  success: function(data){
                    maintenance = data['data'][0];

                    $('#name').val(maintenance['prefix_name']+maintenance['f_name']+" "+maintenance['l_name']);
                    $('#nameTH').val(maintenance['nameTH']);
                    $('#n_common_TH').val(maintenance['n_common_TH']);
                    $('#n_maintenancetype').val(maintenance['n_maintenancetype']);
                    $('#details').val(maintenance['details']);
                    $('#note').val(maintenance['note']);

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
              <h5 class="modal-title" id="exampleModalLabel">ข้อมูลการดูแลรักษา</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <!-- row1 -->
                <div class="form-group row">
                  <label for="nameTH" class="col-form-label">โซน:</label>
                    <div class="col-sm-10" style="margin: -13px 0 0 25px;">
                      <input type="text" class="form-control" id="nameTH" style="width:180px;">
                    </div>
                  <label for="n_common_TH" class="col-form-label" style="margin: 0 0 0 240px;">พันธุ์ไม้:</label>
                    <div class="col-sm-10" style="margin: -36px 0 0 283px;">
                      <input type="text" class="form-control" id="n_common_TH" style="width:200px;">
                    </div>
                </div>
                <!-- row2 -->
                <div class="form-group row">
                  <label for="n_maintenancetype" class="col-form-label">ประเภทการดูแลรักษา:</label>
                    <div class="col-sm-10" style="margin: -10px 0 0 121px;">
                      <input type="text" class="form-control" id="n_maintenancetype" style="width: 170px;">
                    </div>
                  <label for="name" class="col-form-label"style="margin: 0 0 0 325px;">ชื่อพนักงาน:</label>
                    <div class="col-sm-10" style="margin: -36px 0 0 386px;">
                      <input type="text" class="form-control" id="name" style="width: 170px;">
                    </div>
                </div>
                
                
                <!-- row3 -->
                <div class="form-group row">
                  <label for="details" class="col-form-label">รายละเอียด:</label>
                    <div class="col-sm-10" style="margin: -10px 0 0px 65px;">
                      <textarea class="form-control" id="details" rows="6" style="width: 489px;"></textarea>
                    </div>
                </div>
                <!-- row4 -->
                <div class="form-group row">
                  <label for="note" class="col-form-label">หมายเหตุ:</label>
                    <div class="col-sm-10" style="margin: -10px 0 0px 56px;">
                    <textarea class="form-control" id="note" rows="6" style="width: 500px; "></textarea>
                    </div>
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