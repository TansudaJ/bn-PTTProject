
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
  .s{
    color: red;
   }
  h4{
    color: #9900cc;
    font-size: 1.75rem;
  }
</style>
<?php echo form_open_multipart('vegetations/save_edit_vegetation');?>
<!-- <form method="post" action="<?php echo site_url("vegetations/new_vegetation_add");?>">  -->
<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h3 class="card-title">เพิ่มข้อมูลพันธุ์ไม้</h3>
                </div><br>
                <div class="card-body">
                  <form>
                    <div class=row>
                      <div class="col-md-12">
                        <h4>ข้อมูลทั่วไป</h4>
                      </div>
                    </div><br>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">ชื่อสามัญภาษาไทย</label>
                          <input type="text" name="n_common_TH" class="form-control" value="<?php echo $result[0]->n_common_TH ;?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">ชื่อสามัญภาษาอังกฤษ</label>
                          <input type="text" name="n_common_ENG" class="form-control" value="<?php echo $result[0]->n_common_ENG ;?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">ชื่อวิทยาศาสตร์</label>
                            <input type="text" name="	n_scientific" class="form-control" value="<?php echo $result[0]->	n_scientific ;?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4" style="margin: 30px 0 0 0">
                        <div class="form-group">
                          <label class="bmd-label-floating">ชื่อวงศ์</label>
                          <input type="text" name="n_family" class="form-control" value="<?php echo $result[0]->n_family ;?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                        <label class="bmd-label-floating">เลือกประเภทพันธุ์ไม้</label>
                        <select class="form-select form-control "name="typeID">
                              <option value="">เลือกประเภทพันธุ์ไม้</option>
                              <?php foreach($typeList as $tresult){?>
                                <option value="<?php echo $tresult->typeID;?>"<?php echo ($result[0]->typeID == $tresult->typeID ) ? "selected":""; ?>>
                                <?php echo $tresult->typename;?>
                            </option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                        <label class="bmd-label-floating">เลือกภูมิภาค</label>
                          <select class="form-select form-control "name="loname_region" id="loname_region">
                                <option value="">เลือกภูมิภาค</option>
                                  <option value="1">ภาคเหนือ</option>
                                  <option value="2">ภาคอีสาน</option>
                                  <option value="3">ภาคตะวันตก</option>
                                  <option value="4">ภาคกลาง</option>
                                  <option value="5">ภาคตะวันออก</option>
                                  <option value="6">ภาคใต้</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-4" style="margin: 30px 0px 0 0px;">
                        <div class="form-group">
                          <label class="bmd-label-floating">ชื่อพื้นเมือง</label>
                          <input type="text" id="loname_name" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4" style="margin: 28px 0 0 0;">
                        <div class="form-group">
                          <button type="button" class="btn btn-success" id="btn-add">เพิ่ม</button>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                        <table class="table table-bordered">
                          <thead>
                              <tr>
                                  <th>ตัวเลือก</th>
                                  <th>ชื่อพื้นเมือง</th>
                                  <th>ภูมิภาค</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php $arr = array();
                            $arr[1] = "ภาคเหนือ";
                            $arr[2] = "ภาคอีสาน";
                            $arr[3] = "ภาคตะวันตก";
                            $arr[4] = "ภาคกลาง";
                            $arr[5] = "ภาคตะวันออก";
                            $arr[6] = "ภาคใต้";
                            foreach($localList as $lresult){?>
                              <tr>
                                  <td><input type="checkbox" name="record" checked></td>
                                  <td><?php echo $lresult->localname ?></td>
                                  <td><?php echo $arr[$lresult->region] ?></td>
                              </tr>
                            <?php } ?>
                          </tbody>
                      </table>
                      <script>
                      $(document).ready(function(){
                          $("#btn-add").click(function(){
                              var loname_name = $("#loname_name").val();
                              var loname_region = $("#loname_region").val();
                              var markup = "<tr><td><input type='checkbox' name='record'> <input type='hidden' name='loname_name[]' value='"+loname_name+"'><input type='hidden' name='loname_region[]' value='"+loname_region+"'></td><td>" + loname_name + "</td><td>" + loname_region + "</td></tr>";
                              $("table tbody").append(markup);
                          });
                          // Find and remove selected table rows
                          $("#btn-delete").click(function(){
                              $("table tbody").find('input[name="record"]').each(function(){
                                if($(this).is(":checked")){
                                      $(this).parents("tr").remove();
                                  }
                              });
                          });
                      });    
                      </script>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                        <button type="button" class="btn btn-warning" id="btn-delete">ลบ</button>
                        </div>
                      </div>
                    </div>
                    <!-- ภาพพันธุ์ไม้ -->
                    <div class="row">
                      <div class="col-md-12">
                        <!-- <div class="form-group"> -->
                          <label class="bmd-label-floating">ภาพพันธุ์ไม้</label>
                            <input type="file" name="URL" size="20" class="form-control">
                            <label class="bmd-label-floating s" >*อัพไฟล์ที่มีนามสกุล gif หรือ .jpg หรือ .png</label>
                        <!-- </div> -->
                      </div>
                    </div><br>
                    <!-- รายละเอียด -->
                    <div class=row>
                      <div class="col-md-12">
                        <h4>รายละเอียด</h4>
                      </div>
                    </div><br>
                    <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">ลักษณะ</label>
                            <textarea class="form-control" rows="5" id="comment" name="appearance"><?php echo $result[0]->appearance ;?></textarea>
                          </div>
                        </div> 
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">ถิ่นกำเนิด</label><span>
                          <input type="text" name="origin" class="form-control" value="<?php echo $result[0]->n_family ;?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">การกระจายพันธุ์</label><span>
                          <input type="text" name="distribution" class="form-control" value="<?php echo $result[0]->n_family ;?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">การเจริญเติบโต</label><span>
                          <input type="text" name="ecological" class="form-control" value="<?php echo $result[0]->n_family ;?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">รูปทรง</label><span>
                          <input type="text" name="shape" class="form-control" value="<?php echo $result[0]->n_family ;?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">การผลัดใบ</label><span>
                          <input type="text" name="defoliation" class="form-control" value="<?php echo $result[0]->n_family ;?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">ช่วงออกดอก</label><span>
                          <input type="text" name="fperiod" class="form-control" value="<?php echo $result[0]->n_family ;?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                        <label class="bmd-label-floating">วิธีการขยายพันธุ์</label><span>
                          <input type="text" name="propagation" class="form-control" value="<?php echo $result[0]->n_family ;?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">การกักเก็บคาร์บอนไดออกไซด์ (ตัน)</label>
                          <input type="text" name="co2_storage" class="form-control" >
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">แหล่งที่มาของพันธุ์ไม้</label><span>
                          <input type="text" name="reference" class="form-control" >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">แหล่งที่มาของข้อมูล</label>
                            <input type="text" name="reference_data" class="form-control" >
                          </div>
                        </div> 
                    </div><br>
                    <a href="<?php echo site_url("Vegetations/vegetation"); ?>" class="btn btn-warning pull-left">ย้อนกลับ</a>
                    <button type="submit" class="btn btn-success pull-right">บันทึก</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
    </div>
  </div>
