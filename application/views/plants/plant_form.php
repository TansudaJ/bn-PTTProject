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
                  <h3 class="card-title">เพิ่มข้อมูลต้นไม้</h3>
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
                          <label class="bmd-label-floating">ชื่อ<span class="s">*</span></label>
                          <select class="form-select form-control "name="n_common_TH" required>
                              <option value="">-เลือกชื่อ-</option>
                              <?php foreach($result as $row){?>
                                <option value="<?php echo $row["vegetationID"];?>">
                                <?php echo $row["n_common_TH"];?>
                            </option>
                            <?php } ?>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">โซน<span class="s">*</span></label>
                          <input type="text" name="diameter" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">พิกัด<span class="s">*</span></label>
                          <input type="text" name="coordinates" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">เส้นผ่านศูนย์กลาง<span class="s">*</span></label>
                          <input type="text" name="diameter" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">ความสูง<span class="s">*</span></label>
                            <input type="text" name="height" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class=row>
                      <div class="col-md-12">
                        <h4>รายละเอียด</h4>
                      </div>
                    </div><br>
                    <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">บริเวณที่ปลูก</label>
                            <select class="form-select form-control "name="propagation" >
                              <option value="">-เลือกบริเวณที่ปลูกต้นไม้-</option>
                                <option value="1">ป่าเสม็ด</option>
                                <option value="2">ป่าพลุ</option>
                                <option value="3">ป่าดงดึบ</option>
                                <option value="4">ป่าเบญจพรรณ</option>
                                <option value="5">ป่าชายเลน</option>
                                <option value="6">ป่าหาดทราย</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">สภาพปัจจุบัน</label><span>
                                <input type="text" name="origin" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">จุดแสดงในแผนที่</label><span>
                                <select class="form-select form-control "name="propagation" >
                              <option value="">-เลือกการแสดงในแผนที่-</option>
                                <option value="1">แสดง</option>
                                <option value="0">ไม่แสดง</option>
                            </select>
                            </div>
                        </div>

                    </div>
                    
                    
                    <a href="<?php echo site_url("Plants/plant"); ?>" class="btn btn-warning pull-left">ย้อนกลับ</a>
                    <button type="submit" class="btn btn-success pull-right">บันทึก</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
    </div>
  </div>