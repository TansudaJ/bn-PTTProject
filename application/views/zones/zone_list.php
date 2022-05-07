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
                  <a  href="<?php echo site_url("Zones/new_zone"); ?>" ><button type="submit" class="btn btn-success"><i class="material-icons">add</i>เพิ่มโซน</button></a>
                  </div>
                  <div class="table-responsive">
                  <table id="example1" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">รหัส</th>
                            <th class="text-center">ชื่อ</th>
                            <th class="text-center">สถานะ</th>
                            <th class="text-center">สถานที่</th>
                            <th class="text-center">สถานะการใช้งาน</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody> 	
                    <?php foreach($zoneList as $row){?>
                        <tr>
                            <td><?php echo $row->headzoneID ."-".$row->zoneID; ?></td>
                            <td><?php echo $row->nameTH; ?></td>
                            <td><?php if ($row->status == 1) {
                              echo "แสดง";
                            }else{
                              echo "ไม่แสดง";
                            } ?></td>
                            <td><?php echo $row->location; ?></td>
                            <td><?php echo ($row->activeflag == 1) ? "ใช้งาน": "ไม่ใช้งาน"; ?></td>
                            <td class="text-center">
                                  <button type="button" title="View" class="btn btn-info btn-sm" onclick="infoClick('<?php echo $row->zoneID; ?>')"><i class="material-icons">info</i></button>
                                  <a  href="<?php echo site_url("Zones/edit_zone_form/$row->zoneID"); ?>"><button type="button" title="Edit" class="btn btn-warning btn-sm"><i class="material-icons">edit</i></button></a>
                                  <a onclick="return confirm('คุณต้องการลบส่วนประกอบต้นไม้ออกหรือไม่?')" href="<?php echo site_url("Zones/delete_zone/$row->zoneID"); ?>"><button type="button" title="Delete" class="btn btn-danger btn-sm"><i class="material-icons">delete</i></button></a>      
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

              function infoClick(zoneID){
                
                $.ajax({
                  type: "GET",
                  url: "http://localhost/bn-PTTProject/index.php/API001/zonebyID/"+zoneID,
                  contentType: "application/x-www-form-urlencoded;charset=ISO-8859-15",
                  dataType: 'json',
                  success: function(data){
                    zone = data['data'][0];
                    
                    $('#nameTH').val(zone['nameTH']);
                    $('#nameEN').val(zone['nameEN']);
                    $('#detail').val(zone['detail']);
                    $('#location').val(zone['location']);
                    $('#status').val((zone['status']) == 1 ? 'แสดง' : 'ไม่แสดง');
                    

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
              <h5 class="modal-title" id="exampleModalLabel">ข้อมูลโซน</h5>
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
                  <img class="img-fluid rounded mx-auto d-block" id="image_zone" src="" style="width:40%; ">
                </div>
                <!-- row1 -->
                <div class="form-group row">
                  <label for="nameTH" class="col-form-label">ชื่อโซนภาษาไทย:</label>
                    <div class="col-sm-10" style="margin: -13px 0 0 96px;">
                      <input type="text" class="form-control" id="nameTH" style="width:130px;">
                    </div>
                  <label for="nameEN" class="col-form-label" style="margin: 0 0 0 265px;">ชื่อโซนภาษาอังกฤษ:</label>
                    <div class="col-sm-10" style="margin: -36px 0 0 380px;">
                      <input type="text" class="form-control" id="nameEN" style="width:200px;">
                    </div>
                </div>
                <!-- row2 -->
                <div class="form-group row">
                  <label for="location" class="col-form-label">พิกัด:</label>
                    <div class="col-sm-10" style="margin: -13px 0 0 25px;">
                      <input type="text" class="form-control" id="location" style="width: 200px;">
                    </div>
                    <label for="status" class="col-form-label" style="margin: 0 0 0 250px;">สถานะ:</label>
                    <div class="col-sm-10" style="margin: -36px 0 0 291px;;">
                      <input type="text" class="form-control" id="status" style="width: 90px;">
                    </div>
                </div><br>
                <!-- row3 -->
                <div class="form-group row">
                  <label for="n_family" class="col-form-label">รายละเอียด:</label>
                    <div class="col-sm-10" style="margin: -13px 0 0 67px;">
                      <textarea  id="detail" class="form-control" rows="3" style="width:513px;"></textarea>
                    </div>
                </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">ปิด</button>
            </div>
          </div>
        </div>
</div>
<!-- close modal info--> 