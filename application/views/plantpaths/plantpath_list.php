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
                              <a  href="<?php echo site_url("Plantpaths/edit_plantpath_form/$row->pathID"); ?>"><button type="button" title="Edit" class="btn btn-warning"><i class="material-icons">edit</i></button></a>
                              <a onclick="return confirm('คุณต้องการลบส่วนประกอบต้นไม้ออกหรือไม่?')" href="<?php echo site_url("Plantpaths/delete_plantpath/$row->pathID"); ?>"><button type="button" title="Delete" class="btn btn-danger"><i class="material-icons">delete</i></button>      
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
     
<!-- open modal info--> 
<form id="deleteForm" method="post">
	<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="deleteModalLabel">ลบส่วนประกอบต้นไม้</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			   <strong>คุณต้องการลบส่วนประกอบต้นไม้ออกหรือไม่?</strong>
		  </div>
		  <div class="modal-footer">
			<input type="hidden" name="deleteId" id="deleteId" class="form-control">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">ไม่</button>
			<button type="submit" class="btn btn-primary">ใช่</button>
		  </div>
		</div>
	  </div>
	</div>
</form>
<!-- close modal info--> 


