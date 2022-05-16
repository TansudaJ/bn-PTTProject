
<style>
  tr:nth-child(even){background-color: #f2f2f2}
th {
  background-color: #04AA6D;
  color: white;
}
table {
  margin: 0;
}
#btn_export{
  font-size: medium;
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
                <a  href="<?php echo site_url("Reports/export_report"); ?>" ><button  type="submit" class="btn btn-success" name="btn_export" id="btn_export">ออกรายงาน</button></a>
                  </div>
                  <div class="table-responsive">
                  <table id="example1" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">รหัส</th>
                            <th class="text-center">ชื่อ</th>
                            <th class="text-center">ชื่อวิทยาศาสตร์</th>
                            <th class="text-center">ชื่อวงศ์</th>
                            <th class="text-center">ประเภท</th>
                            <th class="text-center">จำนวนต้นไม้ (ต้น)</th>

                        </tr>
                    </thead>
                    <tbody> 	
                    <?php foreach ($vegetationList as $row){?>
                        <tr>
                            <td class="text-center"><?php echo $row->vegetationID; ?></td>
                            <td><?php echo $row->n_common_TH ." (".$row->n_common_ENG.")"; ?></td>
                            <td><?php echo $row->n_scientific; ?></td>
                            <td><?php echo $row->n_family; ?></td>
                            <td><?php echo $row->typename; ?></td>
                            <td class="text-center"><?php echo $row->countp;?></td>
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