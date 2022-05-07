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
                  <a  href="<?php echo site_url("Imagemaps/new_imagemap"); ?>" ><button type="submit" class="btn btn-success"><i class="material-icons">add</i>เพิ่มข้อมูลแผนที่</button></a>
                  </div>
                  <div class="table-responsive">
                  <table id="example1" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">รหัส</th>
                            <th class="text-center">ชื่อโซน</th>
                            <th class="text-center">สถานะการใช้งาน</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody> 	
                    <?php foreach($mapList as $row){?>
                        <tr>
                            <td><?php echo $row->imagezoneID; ?></td>
                            <td><?php echo $row->nameTH; ?></td>
                            <td><?php echo ($row->activeFlag == 1) ? "ใช้งาน": "ไม่ใช้งาน"; ?></td>
                            <td class="text-center">
                                  <button type="button" title="View" class="btn btn-info btn-sm" onclick="infoClick('<?php echo $row->imagezoneID; ?>')"><i class="material-icons">info</i></button>
                                  <a  href="<?php echo site_url("Imagemaps/edit_imagemap_form/$row->imagezoneID"); ?>"><button type="button" title="Edit" class="btn btn-warning btn-sm"><i class="material-icons">edit</i></button></a> 
                                  <a onclick="return confirm('คุณต้องการลบวิธีการดูแลรักษาออกหรือไม่?')" href="<?php echo site_url("Imagemaps/delete_imagemap/$row->imagezoneID"); ?>"><button type="button" title="Delete" class="btn btn-danger btn-sm"><i class="material-icons">delete</i></button></a>    
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

              function infoClick(imagezoneID){
                $.ajax({
                  type: "GET",
                  url: "http://localhost/bn-PTTProject/index.php/API001/imagemapbyID/"+imagezoneID,
                  contentType: "application/x-www-form-urlencoded;charset=ISO-8859-15",
                  dataType: 'json',
                  success: function(data){
                    imagezone = data['data'][0];

                    $("#imageURL").attr('src',"<?php echo base_url()?>"+imagezone['imageURL']);
                    $('#nameTH').val(imagezone['nameTH']);
                    $('#imagedetail').val(imagezone['imagedetail']);
                    $('#activeFlag').val((imagezone['activeFlag'] == 1 ? 'ใช้งาน':'ไม่ใช้งาน'));
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
              <h5 class="modal-title" id="exampleModalLabel">ข้อมูลแผนที่</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <!-- image -->
                <div class="form-group">
                  <img class="img-fluid rounded mx-auto d-block" id="imageURL" src="" style="width:100%; ">
                </div>
                <!-- row1 -->
                <div class="form-group row">
                  <label for="nameTH" class="col-form-label">ชื่อโซน:</label>
                    <div class="col-sm-10" style="margin: -13px 0 0px 41px;">
                      <input type="text" class="form-control" id="nameTH" style="width: 180px;">
                    </div>
                    <label for="activeFlag" class="col-form-label" style="margin: 0 0 0 255px;">สถานะการใช้งาน:</label>
                    <div class="col-sm-10" style="margin: -36px 0 0px 350px;">
                      <input type="text" class="form-control" id="activeFlag" style="width:90px;">
                    </div>
                </div><br>
                <!-- row2 -->
                <div class="form-group row">
                    <label for="imagedetail" class="col-form-label">รายละเอียด:</label>
                      <div class="col-sm-10" style="margin: 0 0 0px 64px;">
                        <textarea class="form-control" id="imagedetail" rows="5" style="width: 376px;"></textarea>
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