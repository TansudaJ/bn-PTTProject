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
                            <th class="text-center">รหัสผู้ใช้งาน</th>
                            <th class="text-center">ชื่อ-นามสกุล</th>
                            <th class="text-center">สถานะ</th>
                            <th class="text-center">สิทธิการใช้งาน</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody> 	
                    <?php foreach ($userList as $row){?>
                        <tr>
                            <td><?php echo $row->userID; ?></td>
                            <td><?php echo $row->fname ." ".$row->lname; ?></td>
                            
                            <td class="text-center">
                                <?php if($row->activeFlag == '1') { ?>
                                  <span class="badge badge-success">Active</span>
                                  
                                <?php } 
                                else { ?>
                                <span class="badge badge-danger">Inactive</span>
                                  
                                <?php } ?>
                            </td>
                            <td class="text-center"><?php echo $row->rolename; ?></td>
                            
                            <td class="text-center">
                                  <button type="button" title="View" class="btn btn-info btn-sm"><i class="material-icons">info</i></button>
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
          </script>
          
          
     