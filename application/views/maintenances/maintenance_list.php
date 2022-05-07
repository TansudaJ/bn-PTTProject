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
                  <a  href="<?php echo site_url("Maintenances/new_maintenance"); ?>" ><button type="submit" class="btn btn-success"><i class="material-icons">add</i>เพิ่มวิธีการดูแล</button>
                  </div>
                  <div class="table-responsive">
                  <table id="example1" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">รหัส</th>
                            <th class="text-center">ชื่อพันธุ์ไม้</th>
                            <th class="text-center">ชื่อผู้ดูแล</th>
                            <th class="text-center">วันที่</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody> 	
                    <?php foreach($maintenanceList as $row){?>
                        <tr>
                            <td><?php echo $row->maintenanceID; ?></td>
                            <td><?php echo $row->n_common_TH; ?></td>
                            <td><?php echo $row->prefix_name."".$row->f_name ." ".$row->l_name; ?></td>
                            <td><?php echo $row->date; ?></td>
                            <td class="text-center">
                                  <button type="button" title="View" class="btn btn-info"><i class="material-icons">info</i></button>
                                  <button type="button" title="Edit" class="btn btn-warning"><i class="material-icons">edit</i></button>  
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
          </script>
     