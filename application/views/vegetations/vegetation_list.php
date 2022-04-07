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
</style>
<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title "><?php echo $navbar_name?></h4>
                </div>
                <div class="card-body">
                <div class="text-right"  <?php if($_SESSION['authority_authorityID'] == '3') {echo " style='display: none'"; } ?>>
                <a  href="<?php echo site_url("Vegetations/new_vegetation"); ?>" ><button  type="button" class="btn btn-success"><i class="material-icons" >add</i>เพิ่มพันธุ์ไม้</button></a>
                  </div>
                  <div class="table-responsive">
                  <table id="example1" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">รหัส</th>
                            <th class="text-center">ชื่อ</th>
                            <th class="text-center">ชื่อวิทยาศาสตร์</th>
                            <th class="text-center">ชื่อวงศ์</th>
                            <th class="text-center">ชื่อพื้นเมือง(ภูมิภาค)</th>
                            <th class="text-center">ประเภท</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody> 	
                    <?php foreach ($vegetationList as $row){?>
                        <tr>
                            <td><?php echo $row->vegetationID; ?></td>
                            <td><?php echo $row->n_common_TH ." (".$row->n_common_ENG.")"; ?></td>
                            <td><?php echo $row->n_scientific; ?></td>
                            <td><?php echo $row->n_family; ?></td>
                            <td><?php if ($row->region == "1") {
                                        echo "ภาคเหนือ";
                                      }elseif($row->region == "2"){
                                        echo "ภาคกลาง";
                                      }elseif($row->region == "3"){
                                        echo "ภาคใต้";
                                      }elseif($row->region == "4"){
                                        echo "ภาคตะวันออกเฉียงเหนือ";
                                      }
                            ?>  (<?php echo $row->localname; ?>)</td>
                            <td><?php if ($row->type == "1") {
                                        echo "ไม้ดอก";
                                      }elseif($row->type == "2"){
                                        echo "ไม้ประดับ";
                                      }elseif($row->type == "3"){
                                        echo "ไม้ยืนต้น";
                                      }elseif($row->type == "4"){
                                        echo "ไม้เลื้อย";
                                      }elseif($row->type == "5"){
                                        echo "ไม้อิงอาศัย";
                                      }elseif($row->type == "6"){
                                        echo "พืชสมุนไพร";
                                      }
                            ?></td>
                            <td class="text-center">
                                  <button type="button" title="View" class="btn btn-info" onclick="infoClick('<?php echo $row->vegetationID; ?>')"><i class="material-icons">info</i></button>     
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
              function infoClick(vegetationID){
                
                $.ajax({
                  type: "GET",
                  url: "http://localhost/bn-PTTProject/index.php/API001/vegetationbyID/"+vegetationID,
                  contentType: "application/x-www-form-urlencoded;charset=ISO-8859-15",
                  dataType: 'json',
                  success: function(data){
                    vegetation = data['data'][0];

                    // $("#image_profile").attr('src',user['imageURL']); ภาพ

                    $('#commonTH').val(vegetation['n_common_TH']);
                    $('#commonEN').val(vegetation['n_common_ENG']);
                    $('#n_scientific').val(vegetation['n_scientific']);
                    $('#n_family').val(vegetation['n_family']);
                    $('#localname').val(vegetation['localname']);
                    $('#region').val(vegetation['region']);
                    $('#type').val(vegetation['type']);
                    $('#commonTH').val(vegetation['n_common_TH']);


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
              <h5 class="modal-title" id="exampleModalLabel">ข้อมูลพันธุ์ไม้</h5>
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
                  <label  class="col-form-label">ชื่อภาษาไทย:</label>
                    <div class="col-sm-10" style="margin: -13px 0 0px 70px;">
                      <input type="text" class="form-control" id="commonTH" style="width:100px;">
                    </div>
                  <label class="col-form-label" style="margin: 0 0 0 200px;">ชื่อภาษาอังกฤษ:</label>
                    <div class="col-sm-10" style="margin: -35px 0 0px 290px;">
                      <input type="text" class="form-control" id="commonEN" style="width:200px;">
                    </div>
                </div>
                <!-- row2 -->
                <div class="form-group row">
                  <label class="col-form-label">ชื่อทางวิทยาศาสตร์:</label>
                    <div class="col-sm-10" style="margin: -10px 0 0 106px;">
                      <input type="text" class="form-control" id="n_scientific" style="width:200px;">
                    </div>
                    <label class="col-form-label" style="margin: 0 0 0 330px;">ชื่อวงศ์:</label>
                      <div class="col-sm-10" style="margin: -36px 0 0px 366px;">
                        <input type="text" class="form-control" id="n_family" style="width:200px;">
                      </div>
                </div>
                <!-- row 3 -->
                <div class="form-group row">
                  <label class="col-form-label">ชื่อพื้นเมือง:</label>
                    <div class="col-sm-10" style="margin: -13px 0 0px 60px;">
                      <input type="text" class="form-control" id="localname" style="width:200px;">
                    </div>
                  <label class="col-form-label" style="margin: 0 0 0 288px;">ภูมิภาค:</label>
                    <div class="col-sm-10" style="margin: -36px 0 0px 326px;">
                      <input type="text" class="form-control" id="region" style="width:90px;">
                    </div>
                    <label class="col-form-label" style="margin: 0 0 0 446px;">ประเภท:</label>
                    <div class="col-sm-10" style="margin: -36px 0 0px 488px;">
                      <input type="text" class="form-control" id="type" style="width:90px;">
                    </div>
                  <!-- <label for="password" class="col-form-label" style="margin: 0 0 0 165px;">PASSWORD:</label>
                    <div class="col-sm-10" style="margin: -35px 0 0px 235px;">
                      <input type="text" class="form-control" id="password" style="width:80px;">
                    </div> -->
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