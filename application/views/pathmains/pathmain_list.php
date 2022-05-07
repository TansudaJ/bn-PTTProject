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
                  <a  href="<?php echo site_url("pathmains/new_pathmain"); ?>" ><button type="submit" class="btn btn-success"><i class="material-icons">add</i>เพิ่มข้อมูลส่วนประกอบ</button></a>
                  </div>
                  <div class="table-responsive">
                  <table id="example1" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">รหัส</th>
                            <th class="text-center">ชื่อพันธุ์ไม้</th>
                            <th class="text-center">ชื่อส่วนประกอบ</th>
                            <th class="text-center">สถานะการใช้งาน</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody> 	
                    <?php foreach($pathmainList as $row){?>
                        <tr>
                            <td><?php echo $row->medicinalPropertiesID; ?></td>
                            <td><?php echo $row->n_common_TH; ?></td>
                            <td><?php echo $row->plantpathname; ?></td>
                            <td><?php echo ($row->activeflag == 1) ? "ใช้งาน": "ไม่ใช้งาน"; ?></td>
                            <td class="text-center">
                              <button type="button" title="View" class="btn btn-info btn-sm" onclick="infoClick('<?php echo $row->medicinalPropertiesID; ?>')"><i class="material-icons">info</i></button>  
                              <a  href="<?php echo site_url("Pathmains/edit_pathmain_form/$row->medicinalPropertiesID"); ?>"><button type="button" title="Edit" class="btn btn-warning btn-sm"><i class="material-icons">edit</i></button></a>
                              <a onclick="return confirm('คุณต้องการลบข้อมูลส่วนประกอบต้นไม้ออกหรือไม่?')" href="<?php echo site_url("Pathmains/delete_pathmain/$row->medicinalPropertiesID"); ?>"><button type="button" title="Delete" class="btn btn-danger btn-sm"><i class="material-icons">delete</i></button>      
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

              function infoClick(medicinalPropertiesID){
                
                $.ajax({
                  type: "GET",
                  url: "http://localhost/bn-PTTProject/index.php/API001/pathmainbyID/"+medicinalPropertiesID,
                  contentType: "application/x-www-form-urlencoded;charset=ISO-8859-15",
                  dataType: 'json',
                  success: function(data){
                    medicinalProperties = data['data'][0];

                    $("#image_path").attr('src',"<?php echo base_url()?>"+medicinalProperties['URL']);
                    // $("#image_path").attr('src',((medicinalProperties['URL']) == null) ? "<?php echo base_url()?>image/vegetation/no-pic.jpg" : "<?php echo base_url()?>"+ medicinalProperties['URL']);
                    $('#nameTH').val(medicinalProperties['n_common_TH']);
                    $('#pathname').val(medicinalProperties['plantpathname']);
                    $('#properties').val(medicinalProperties['properties']);
                    $('#instruction').val(medicinalProperties['instruction']);
                    $('#caution').val(medicinalProperties['caution']);
                    $('#reference').val(medicinalProperties['reference']);

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
              <h5 class="modal-title" id="exampleModalLabel">ข้อมูลส่วนประกอบ</h5>
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
                  <img class="img-fluid rounded mx-auto d-block" id="image_path" src="" style="width:50%; ">
                </div>
                <!-- row1 -->
                <div class="form-group row">
                  <label for="nameTH" class="col-form-label">ชื่อพันธุ์ไม้:</label>
                    <div class="col-sm-10" style="margin: -13px 0 0 55px;">
                      <input type="text" class="form-control" id="nameTH" style="width:180px;">
                    </div>
                  <label for="pathname" class="col-form-label" style="margin: 0 0 0 285px;">ส่วนประกอบต้นไม้:</label>
                    <div class="col-sm-10" style="margin: -36px 0 0 385px;">
                      <input type="text" class="form-control" id="pathname" style="width:130px;">
                    </div>
                </div>
                <!-- row2 -->
                <div class="form-group row">
                  <label for="properties" class="col-form-label">คุณสมบัติ:</label>
                    <div class="col-sm-10" style="margin: -10px 0 0 58px;">
                      <textarea id="properties" rows="3" class="form-control" style="width:460px;"></textarea>
                    </div>
                </div><br>
                <!-- row3 -->
                <div class="form-group row">
                  <label for="instruction" class="col-form-label">คำแนะนำ:</label>
                    <div class="col-sm-10" style="margin: -36px 0 0px 58px;">
                      <textarea id="instruction" rows="3" class="form-control" style="width:460px;"></textarea>
                    </div>
                </div><br>
                <!-- row4 -->
                <div class="form-group row">
                  <label for="caution" class="col-form-label">คำเตือน/ข้อควรระวัง:</label>
                    <div class="col-sm-10" style="margin: -13px 0 0 112px;">
                      <textarea id="caution" rows="3" class="form-control" style="width:406px;"></textarea>
                    </div>
                </div>
                <!-- row5 -->
                <div class="form-group row">
                  <label for="reference" class="col-form-label">แหล่งที่มาของข้อมูล:</label>
                    <div class="col-sm-10" style="margin: -13px 0 0 112px;">
                      <textarea id="reference" rows="3" class="form-control" style="width:406px;"></textarea>
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


