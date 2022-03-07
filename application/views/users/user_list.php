<?php 
if ($this->session->userdata('message_error')) {
    $message = $_SESSION['message_error'];
    $this->session->unset_userdata('message_error');
    echo $message;
}
?>
      
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
                            <td><?php echo $row->f_name ." ".$row->l_name; ?></td>
                            
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
                                  <button type="button" title="Edit" class="btn btn-warning btn-sm" ><i class="material-icons">edit</i></button>    
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
                  url: "http://localhost/bn-PTTProject/index.php/Users/userbyID/"+userID,
                  contentType: "application/x-www-form-urlencoded;charset=ISO-8859-15",
                  dataType: 'json',
                  success: function(data){
                    $user = data['data'][0];
        
                    $('#recipient-name').val($user['n_prefix']);
                    $('#info_modal').modal('toggle');
                  }
                });


              }
          </script>         

<!-- open modal info--> 
      <div class="modal fade" id="info_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>
<!-- close modal info--> 