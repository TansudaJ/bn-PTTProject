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
      
         <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title "><?php echo $navbar_name?></h4>
                </div>
                <div class="card-body">
                <div class="text-right">
                      <a  href="<?php echo site_url("Users/new_user"); ?>" ><button type="button" class="btn btn-success"><i class="material-icons">add</i>เพิ่มผู้ใช้งาน</button></a>
                  </div>
                  <div class="table-responsive">
                  <table id="example1" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">รหัสพนักงาน</th>
                            <th class="text-center">ชื่อ-นามสกุล</th>
                            <th class="text-center">สถานะ</th>
                            <th class="text-center">สิทธิการใช้งาน</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody> 	
                    <?php foreach ($userList as $row){?>
                        <tr>
                            <td class="text-center"><?php echo $row->employeeID; ?></td>
                            <td><?php if($row->PrefixID == 1){
                                        echo "นาย"."".$row->f_name ." ".$row->l_name; 
                                      }elseif($row->PrefixID == 2){
                                        echo "นาง"."".$row->f_name ." ".$row->l_name ;
                                      }elseif($row->PrefixID == 3){
                                        echo "นางสาว"."".$row->f_name ." ".$row->l_name ;
                                      } ?></td>
                            <td class="text-center">
                                <?php if($row->activeflag == '1') { ?>
                                  <span class="badge badge-success">Active</span>
                                <?php } 
                                else { ?>
                                <span class="badge badge-danger">Inactive</span>
                                <?php } ?>
                            </td>
                            <td class="text-center"><?php echo $row->n_authority; ?></td>
                            <td class="text-center">
                                  <button type="button" title="View" class="btn btn-info btn-sm"  onclick="infoClick('<?php echo $row->employeeID; ?>')"><i class="material-icons">info</i></button>
                                  <!-- <button type="button" title="Edit" class="btn btn-warning btn-sm" ><i class="material-icons">edit</i></button>     -->
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

              function infoClick(userID){
  
                $.ajax({
                  type: "GET",
                  url: "http://localhost/bn-PTTProject/index.php/API001/userbyID/"+userID,
                  contentType: "application/x-www-form-urlencoded;charset=ISO-8859-15",
                  dataType: 'json',
                  success: function(data){
                    user = data['data'][0];
        
                    //$('#image-profile').val($user['imageURL']);
                    $("#image_profile").attr('src',user['imageURL']);
                    $('#prefix').val(user['prefix_name']);
                    $('#fname').val(user['f_name']);
                    $('#lname').val(user['l_name']);
                    $('#telno').val(user['telno']);
                    $('#email').val(user['email']);
                    $('#username').val(user['username']);
                    $('#password').val(user['password']);
                    $('#authority').val(user['n_authority']);
                    $('#activeflag').val(user['activeflag']);

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
              <h5 class="modal-title" id="exampleModalLabel">ข้อมูลผู้ใช้งาน</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <!-- image -->
                <div class="form-group">
                  <img class="img-fluid rounded mx-auto d-block" id="image_profile" src="" style="width:50%; ">
                </div>
                <!-- row1 -->
                <div class="form-group row">
                  <label for="prefix" class="col-form-label">คำนำหน้าชื่อ:</label>
                    <div class="col-sm-10" style="margin: -13px 0 0px 70px;">
                      <input type="text" class="form-control" id="prefix" style="width:66px;">
                    </div>
                  <label for="fname" class="col-form-label" style="margin: 0 0 0 165px;">ชื่อ:</label>
                    <div class="col-sm-10" style="margin: -35px 0 0px 180px;">
                      <input type="text" class="form-control" id="fname" style="width:115px;">
                    </div>
                  <label for="lname" class="col-form-label" style="margin: 0 0 0 325px;">นามสกุล:</label>
                    <div class="col-sm-10" style="margin: -35px 0 0px 375px;">
                      <input type="text" class="form-control" id="lname" style="width:120px;">
                    </div>
                </div>
                <!-- row2 -->
                <div class="form-group row">
                    <label for="telno" class="col-form-label">เบอร์ติดต่อ:</label>
                      <div class="col-sm-10" style="margin: -13px 0 0px 59px;">
                        <input type="text" class="form-control" id="telno" style="width:80px;">
                      </div>
                    <label for="email" class="col-form-label" style="margin: 0 0 0 185px;">Email:</label>
                      <div class="col-sm-10" style="margin: -35px 0 0px 217px;">
                        <input type="text" class="form-control" id="email" style="width:250px;">
                      </div>
                </div>
                <!-- row 3 -->
                <div class="form-group row">
                  <label for="username" class="col-form-label">USERNAME:</label>
                    <div class="col-sm-10" style="margin: -13px 0 0px 70px;">
                      <input type="text" class="form-control" id="username" style="width:66px;">
                    </div>
                  <label for="password" class="col-form-label" style="margin: 0 0 0 165px;">PASSWORD:</label>
                    <div class="col-sm-10" style="margin: -35px 0 0px 235px;">
                      <input type="text" class="form-control" id="password" style="width:80px;">
                    </div>
                </div>
                <!-- row 4 -->
                <div class="form-group row">
                  <label for="authority" class="col-form-label">สิทธิการใช้งาน:</label>
                    <div class="col-sm-10" style="margin: -13px 0 0px 80px;">
                      <input type="text" class="form-control" id="authority" style="width:80px;">
                    </div>
                  <label for="activeflag" class="col-form-label" style="margin: 0 0 0 195px;">สถานะ:</label>
                    <div class="col-sm-10" style="margin: -35px 0 0px 235px;">
                      <input type="text" class="form-control" id="activeflag" style="width:80px;">
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