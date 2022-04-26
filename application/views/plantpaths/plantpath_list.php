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
                  <a  href="<?php echo site_url("Plantpaths/new_plantpath"); ?>" ><button type="submit" class="btn btn-success"><i class="material-icons">add</i>เพิ่มส่วนประกอบต้นไม้</button></a>
                  </div>
                  <div class="table-responsive">
                  <table id="example1" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">รหัส</th>
                            <th class="text-center">ชื่อ</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody> 	
                    <?php foreach($plantpathList as $row){?>
                        <tr>
                            <td><?php echo $row->pathID; ?></td>
                            <td><?php echo $row->plantpathname; ?></td>
                            <td class="text-center">
                                  <button type="button" title="Edit" class="btn btn-warning" onclick="EditClick('<?php echo $row->pathID; ?>')"><i class="material-icons">edit</i></button>  
                                  <button type="button" title="Delete" class="btn btn-danger"><i class="material-icons">delete</i></button>      
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

              function EditClick(pathID){
                
                $.ajax({
                  type: "GET",
                  url: "http://localhost/bn-PTTProject/index.php/API001/plantpathbyID/"+pathID,
                  contentType: "application/x-www-form-urlencoded;charset=ISO-8859-15",
                  dataType: 'json',
                  success: function(data){
                    path = data['data'][0];
                    console.log(pathID);

                    // $("#image_profile").attr('src',user['imageURL']); ภาพ
                    $('#plantpathname').val(path['plantpathname']);
                    
                    $('#update_modal').modal('toggle');
                  }
                });
                $('#updateForm').on('submit',function(){
                    var pathID = $('#pathID').val();
                    var plantpathname = $('#plantpathname').val();		
                    $.ajax({
                      type : "POST",
                      url  : "Plantpaths/update_plantpath",
                      dataType : "JSON",
                      data : {pathID:pathID, plantpathname:plantpathname},
                      success: function(data){
                        $("#pathID").val("");
                        $("#plantpathname").val("");

                        $('#update_modal').modal('hide');
                        // location.reload();
                      }
                    });
                    return false;
                  });


              }
          </script>
     
<!-- open modal info--> 
<form id="updateForm" method="post">
  <div class="modal fade" id="update_modal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: fit-content;">
              <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">ข้อมูลส่วนประกอบต้นไม้ต้นไม้</h5>
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
                  <!-- row1 -->
                  <div class="form-group row">
                    <label for="plantpathname" class="col-form-label">ชื่อส่วนประกอบต้นไม้:</label>
                      <div class="col-sm-10" style="margin: -13px 0 0 117px;">
                        <input type="text" class="form-control" id="plantpathname" name="plantpathname" style="width:200px;">
                      </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <input type="hidden" name="pathID" id="pathID" class="form-control">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                <button type="submit" class="btn btn-primary" id="update_data">บันทึกข้อมูล</button>
              </div>
            </div>
          </div>
  </div>
</form>
<!-- close modal info--> 