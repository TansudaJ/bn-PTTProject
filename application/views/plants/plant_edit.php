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
<?php echo form_open_multipart('plants/save_edit_plant');?>
<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h3 class="card-title">แก้ไขข้อมูลต้นไม้</h3>
                </div><br>
                <div class="card-body">
                  <form>
                    <!-- row1 -->
                    <div class=row>
                      <div class="col-md-12">
                        <h4>ข้อมูลทั่วไป</h4>
                      </div>
                    </div><br>
                    <!-- row2 -->
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">โซน</label>
                          <select class="form-select form-control "name="zone_zoneID">
                              <option value="">เลือกโซน</option>
                              <?php foreach($zoneList as $zresult){?>
                                <option value="<?php echo $zresult->zoneID;?>"<?php echo ($result[0]->zone_zoneID == $zresult->zoneID ) ? "selected":""; ?>>
                                <?php echo $zresult->nameTH;?>
                            </option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">ชื่อพันธุ์ไม้</label>
                          <select class="form-select form-control" name="vegetation_vegetationID">
                              <option value="">เลือกพันธุ์ไม้</option>
                              <?php foreach($vegetationList as $vresult){?>
                                <option value="<?php echo $vresult->vegetationID;?>"<?php echo ($result[0]->vegetation_vegetationID == $vresult->vegetationID ) ? "selected":""; ?>>
                                <?php echo $vresult->n_common_TH;?>
                            </option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">ส่วนประกอบ</label>
                          <select class="form-select form-control" name="plantpath_pathID">
                              <option value="">เลือกส่วนประกอบ</option>
                              <?php foreach($pathList as $presult){?>
                                <option value="<?php echo $presult->pathID;?>" <?php echo ($result[0]->pathID == $presult->pathID ) ? "selected":""; ?>>
                                <?php echo $presult->plantpathname;?>
                            </option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- row3 -->
                    <div class="row">
                      <div class="col-md-3" style="margin: 30px 0 0 0;">
                          <div class="form-group">
                            <label class="bmd-label-floating">เส้นผ่านศูนย์กลาง</label>
                            <input type="text" name="diameter" class="form-control" value="<?php echo $result[0]->diameter ;?>">
                          </div>
                        </div>
                        <div class="col-md-1" style="margin: 55px 0 0 -20px;">
                          เซนติเมตร
                        </div>
                        <div class="col-md-3" style="margin: 30px 0 0 0">
                          <div class="form-group">
                            <label class="bmd-label-floating">ความสูง</label>
                            <input type="text" name="height" class="form-control" value="<?php echo $result[0]->diameter ;?>">
                          </div>
                        </div>
                        <div class="col-md-1" style="margin: 56px 0 0 -20px;">
                          เมตร
                        </div>
                        <div class="col-md-4" style="margin: 30px 0 0 0;">
                        <div class="form-group">
                          <label class="bmd-label-floating">พิกัดต้นไม้</label>
                          <input type="text" name="coordinates" class="form-control" value="<?php echo $result[0]->coordinates ;?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4" style="margin: 30px 0 0 0">
                            <div class="form-group">
                              <label class="bmd-label-floating">สภาพปัจจุบัน</label>
                                <input type="text" name="actual" class="form-control" value="<?php echo $result[0]->actual ;?>">
                            </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">การจัดแสดงในแผนที่</label>
                            <select class="form-select form-control "name="show">
                              <option value="">เลือกการจัดแสดงในแผนที่</option>
                                <option value="0" <?php echo ($result[0]->show == 0 ) ? "selected":""; ?>>ไม่แสดง</option>
                                <option value="1" <?php echo ($result[0]->show == 1 ) ? "selected":""; ?>>แสดง</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4" style="margin: 30px 0 0 0;">
                            <div class="form-group">
                                <label class="bmd-label-floating">ความพิเศษ</label>
                                <input type="text" name="exclusivity" class="form-control" value="<?php echo $result[0]->exclusivity ;?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">สถานะการใช้งาน</label>
                          <select class="form-select form-control "name="active" >
                              <option value=""></option>
                                <option value="0"<?php echo ($result[0]->active == 0 ) ? "selected":""; ?>>ไม่ใช้งาน</option>
                                <option value="1"<?php echo ($result[0]->active == 1 ) ? "selected":""; ?>>ใช้งาน</option>
                            </select>
                        </div>
                      </div>
                    </div>
                    <!-- row4 uploadsFile ภาพ -->
                    <div class="row">
                      <div class="col-md-12">
                          <label class="bmd-label-floating">ภาพQRCode</label>
                            <input type="file" name="" size="20" class="form-control">
                            <label class="bmd-label-floating s" >*อัพไฟล์ที่มีนามสกุล gif หรือ .jpg หรือ .png</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                          <label class="bmd-label-floating">ภาพต้นไม้</label>
                            <input type="file" name="" size="20" class="form-control">
                            <label class="bmd-label-floating s" >*อัพไฟล์ที่มีนามสกุล gif หรือ .jpg หรือ .png</label>
                      </div>
                    </div><br>
                    <input type="hidden" name="plantID" class="form-control" value="<?php echo $result[0]->plantID;?>">
                    <a href="<?php echo site_url("Plants/plant"); ?>" class="btn btn-warning pull-left">ย้อนกลับ</a>
                    <button type="submit" class="btn btn-success pull-right">บันทึก</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
    </div>
  </div>