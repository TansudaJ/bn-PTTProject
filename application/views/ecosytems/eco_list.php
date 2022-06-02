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
                  <a  href="<?php echo site_url("Ecosytems/new_eco_plant"); ?>" ><button type="submit" class="btn btn-success"><i class="material-icons">add</i>เพิ่มระบบนิเวศพืช</button></a>
                  </div>
                  <div class="table-responsive">
                  <table id="example1" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">รหัส</th>
                            <th class="text-center">ชื่อพืช</th>
                            <th class="text-center">ประเภท</th>
                            <th class="text-center">สถานะการใช้งาน</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody> 	
                    <?php foreach($ecoList as $row){?>
                        <tr>
                            <td><?php echo $row->eco_plantID; ?></td>
                            <td><?php echo $row->plantname; ?></td>
                            <td><?php echo $row->typename; ?></td>
                            <td><?php echo ($row->activeflag == 1) ? "ใช้งาน": "ไม่ใช้งาน"; ?></td>
                            <td class="text-center">
                                  <a  href="<?php echo site_url("Ecosytems/edit_eco_form/$row->eco_plantID"); ?>"><button type="button" title="Edit" class="btn btn-warning btn-sm"><i class="material-icons">edit</i></button></a>
                                  <a onclick="return confirm('คุณต้องการลบระบบนิเวศพืชออกหรือไม่?')" href="<?php echo site_url("Ecosytems/delete_eco/$row->eco_plantID"); ?>"><button type="button" title="Delete" class="btn btn-danger btn-sm"><i class="material-icons">delete</i></button></a>      
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