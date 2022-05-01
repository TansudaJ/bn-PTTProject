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
                  <a  href="<?php echo site_url("Mainmethods/new_mainmethod"); ?>" ><button type="submit" class="btn btn-success"><i class="material-icons">add</i>เพิ่มวิธีการดูแลรักษา</button></a>
                  </div>
                  <div class="table-responsive">
                  <table id="example1" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">รหัส</th>
                            <th class="text-center">ชื่อวิธีการดูแลรักษา</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody> 	
                    <?php foreach($mainmethodList as $row){?>
                        <tr>
                            <td><?php echo $row->maintenancetypeID; ?></td>
                            <td><?php echo $row->n_maintenancetype; ?></td>
                            <td class="text-center">
                                  <button type="button" title="View" class="btn btn-info" onclick="infoClick('<?php echo $row->maintenancetypeID; ?>')"><i class="material-icons">info</i></button>
                                  <a  href="<?php echo site_url("Mainmethods/edit_mainmethod_form/$row->maintenancetypeID"); ?>"><button type="button" title="Edit" class="btn btn-warning"><i class="material-icons">edit</i></button></a> 
                                  <a onclick="return confirm('คุณต้องการลบวิธีการดูแลรักษาออกหรือไม่?')" href="<?php echo site_url("Mainmethods/delete_mainmethod/$row->maintenancetypeID"); ?>"><button type="button" title="Delete" class="btn btn-danger"><i class="material-icons">delete</i></button></a>    
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

              function infoClick(maintenancetypeID){
                $.ajax({
                  type: "GET",
                  url: "http://localhost/bn-PTTProject/index.php/API001/mainmethodbyID/"+maintenancetypeID,
                  contentType: "application/x-www-form-urlencoded;charset=ISO-8859-15",
                  dataType: 'json',
                  success: function(data){
                    maintenancetype = data['data'][0];

                    $('#n_maintenancetype').val(maintenancetype['n_maintenancetype']);
                    $('#detail').val(maintenancetype['detail']);
                    $('#recommend').val(maintenancetype['recommend']);

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
              <h5 class="modal-title" id="exampleModalLabel">ข้อมูลวิธีการดูแลรักษา</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <!-- row1 -->
                <div class="form-group row">
                  <label for="n_maintenancetype" class="col-form-label">ชื่อวิธีการดูแลรักษา:</label>
                    <div class="col-sm-10" style="margin: -13px 0 0px 106px;">
                      <input type="text" class="form-control" id="n_maintenancetype" style="width:200px;">
                    </div>
                </div>
                <!-- row2 -->
                <div class="form-group row">
                    <label for="detail" class="col-form-label">รายละเอียด:</label>
                      <div class="col-sm-10" style="margin: -13px 0 0px 64px;">
                        <textarea class="form-control" id="detail" cols="30" rows="3" style="width: 300px;"></textarea>
                      </div>
                </div>
                <!-- row 3 -->
                <div class="form-group row">
                  <label for="username" class="col-form-label">ข้อแนะนำ:</label>
                    <div class="col-sm-10" style="margin: -13px 0 0px 54px;">
                      <textarea class="form-control" id="recommend" cols="30" rows="3" style="width: 310px;"></textarea>
                    </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
            </div>
          </div>
        </div>
</div>
<!-- close modal info--> 