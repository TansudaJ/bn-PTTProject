
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
</style>

<form method="post" action="<?php echo site_url("plants/new_plant_add");?>"> 
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
                          <label class="bmd-label-floating">ชื่อสามัญภาษาไทย<span class="s">*</span></label>
                          <input type="text" name="THname" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">ชื่อสามัญภาษาอังกฤษ<span class="s">*</span></label>
                          <input type="text" name="ENname" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">ชื่อวิทยาศาสตร์<span class="s">*</span></label>
                            <input type="text" name="Sciname" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">ชื่อวงศ์<span class="s">*</span></label>
                          <input type="text" name="famname" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                        <label class="bmd-label-floating">เลือกประเภทพันธุ์ไม้<span class="s">*</span></label>
                          <select class="form-select form-control "name="type" required>
                              <option value="">-เลือกประเภทพันธุ์ไม้-</option>
                                <option value="1">ไม้ดอก</option>
                                <option value="2">ไม้ประดับ</option>
                                <option value="3">ไม้ยืนต้น</option>
                                <option value="4">ไม้เลื้อย</option>
                                <option value="5">ไม้อิงอาศัย</option>
                              </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                        <label class="bmd-label-floating">เลือกภูมิภาค<span class="s">*</span></label>
                          <select class="form-select form-control "name="loname_region" id="loname_region" required>
                                <option value="">-เลือกภูมิภาค-</option>
                                  <option value="1">ภาคเหนือ</option>
                                  <option value="2">ภาคอีสาน</option>
                                  <option value="3">ภาคตะวันตก</option>
                                  <option value="4">ภาคกลาง</option>
                                  <option value="5">ภาคตะวันออก</option>
                                  <option value="6">ภาคใต้</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                        <label class="bmd-label-floating">ชื่อพื้นเมือง<span class="s">*</span></label>
                        <input type="text" id="loname_name" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <button type="button" class="btn-add btn-success">Add Row</button>
                        </div>
                      </div>
                    </div>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                        <table class="table table-bordered">
                          <thead>
                              <tr>
                                  <th>Select</th>
                                  <th>ชื่อพื้นเมือง</th>
                                  <th>ภูมิภาค</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td><input type="checkbox" name="record"></td>
                                  <td></td>
                                  <td></td>
                              </tr>
                          </tbody>
                      </table>
                      <script>
                      $(document).ready(function(){
                          $(".btn-add").click(function(){
                              var loname_name = $("#loname_name").val();
                              var loname_region = $("#loname_region").val();
                              var markup = "<tr><td><input type='checkbox' name='record'> <input type='hidden' name='loname_name[]' value='"+loname_name+"'><input type='hidden' name='loname_region[]' value='"+loname_region+"'></td><td>" + loname_name + "</td><td>" + loname_region + "</td></tr>";
                              $("table tbody").append(markup);
                          });
                          // Find and remove selected table rows
                          $(".btn-delete").click(function(){
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
                        <button type="button" class="btn-delete btn-warning">Delete Row</button>
                        </div>
                      </div>
                    </div>
                    <div class=row>
                      <div class="col-md-12">
                        <h4>รายละเอียด</h4>
                      </div>
                    </div><br>
                    <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">ลักษณะ<span class="s">*</span></label>
                            <input type="text" name="appearance" class="form-control" required>
                          </div>
                        </div> 
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">ถิ่นกำเนิด</label><span>
                          <input type="text" name="origin" class="form-control" >
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">การกระจายพันธุ์</label><span>
                          <input type="text" name="distribution" class="form-control" >
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">การเจริญเติบโต</label><span>
                          <input type="text" name="growth" class="form-control" >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">รูปทรง</label><span>
                          <input type="text" name="shape" class="form-control" >
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">การผลัดใบ</label><span>
                          <input type="text" name="defoliation" class="form-control" >
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">ช่วงออกดอก</label><span>
                          <input type="text" name="fperiod" class="form-control" >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                            <select class="form-select form-control "name="propagation" >
                              <option value="">-เลือกวิธีการขยายพันธุ์-</option>
                                <option value="1">การปักชำ</option>
                                <option value="2">การตอนกิ่ง</option>
                                <option value="3">การติดตา</option>
                                <option value="4">การแยกหน่อ</option>
                                <option value="5">การทาบกิ่ง</option>
                                <option value="6">การเสียบยอด</option>
                                <option value="7">การเพราะเลี้ยงเนื้อเยื่อ</option>
                                <option value="8">การเพาะเมล็ด</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">การกักเก็บคาร์บอนไดออกไซด์ (ตัน)</label><span>
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
                    
                    <a href="<?php echo site_url("Plants/plant"); ?>" class="btn btn-warning pull-left">ย้อนกลับ</a>
                    <button type="submit" class="btn btn-success pull-right">บันทึก</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
    </div>
  </div>