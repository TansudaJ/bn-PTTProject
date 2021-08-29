<style>
  tr:nth-child(even){background-color: #f2f2f2}
th {
  background-color: #04AA6D;
  color: white;
}
table {
  margin: 0;
}
</style>
<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title "><?php echo $navbar_name?></h4>
                </div>
                <div class="card-body">
                <div class="text-right"  <?php if($_SESSION['roleID'] == '3') {echo " style='display: none'"; } ?>>
                
            
<button  type="button" class="btn btn-success"><i class="material-icons" >add</i>เพิ่มพรรณไม้</button>

                      
                  </div>
                  <div class="table-responsive">
                  <table id="example1" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">รหัส</th>
                            <th class="text-center">ชื่อ</th>
                            <th class="text-center">ชื่อวิทยาศาสตร์</th>
                            <th class="text-center">ชื่อวงศ์</th>
                            <th class="text-center">ชื่อพื้นเมือง</th>
                            <th class="text-center">ประเภท</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody> 	
                    <?php foreach($plantList as $row){?>
                        <tr>
                            <td><?php echo $row->plantID; ?></td>
                            <td><?php echo $row->Common; ?></td>
                            <td><?php echo $row->Sci; ?></td>
                            <td><?php echo $row->Family; ?></td>
                            <td><?php echo $row->Local; ?></td>
                            <td><?php echo $row->Type; ?></td>
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
     