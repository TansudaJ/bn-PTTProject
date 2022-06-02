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
<?php echo form_open_multipart('plants/new_plant_add');?>
<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h3 class="card-title">เพิ่มข้อมูลต้นไม้</h3>
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
                          <label class="bmd-label-floating">โซน<span class="s">*</span></label>
                          <select class="form-select form-control "name="zoneID" required>
                              <option value="">เลือกโซน</option>
                              <?php foreach($zoneList as $result){?>
                                <option value="<?php echo $result->zoneID;?>">
                                <?php echo $result->nameTH;?>
                            </option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">ชื่อพันธุ์ไม้<span class="s">*</span></label>
                          <select class="form-select form-control "name="vegetationID" required>
                              <option value="">เลือกพันธุ์ไม้</option>
                              <?php foreach($vegetationList as $result){?>
                                <option value="<?php echo $result->vegetationID;?>">
                                <?php echo $result->n_common_TH;?>
                            </option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">ส่วนประกอบ<span class="s">*</span></label>
                          <select class="form-select form-control "name="plantpath_pathID" required>
                              <option value="">เลือกส่วนประกอบ</option>
                              <?php foreach($pathList as $result){?>
                                <option value="<?php echo $result->pathID;?>">
                                <?php echo $result->plantpathname;?>
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
                            <label class="bmd-label-floating">เส้นผ่านศูนย์กลาง<span class="s">*</span></label>
                            <input type="text" name="diameter" class="form-control" required>
                          </div>
                        </div>
                        <div class="col-md-1" style="margin: 55px 0 0 -20px;">
                          เซนติเมตร
                        </div>
                        <div class="col-md-3" style="margin: 30px 0 0 0">
                          <div class="form-group">
                            <label class="bmd-label-floating">ความสูง<span class="s">*</span></label>
                            <input type="text" name="height" class="form-control" required>
                          </div>
                        </div>
                        <div class="col-md-1" style="margin: 56px 0 0 -20px;">
                          เมตร
                        </div>
                        <div class="col-md-4" style="margin: 30px 0 0 0;">
                        <div class="form-group">
                          <label class="bmd-label-floating">พิกัดต้นไม้<span class="s">*</span></label>
                          <input type="text" name="coordinates" class="form-control" required title="โปรดกรอกพิกัดของต้นไม้">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4" style="margin: 30px 0 0 0">
                            <div class="form-group">
                              <label class="bmd-label-floating">สภาพปัจจุบัน<span class="s">*</span></label>
                                <input type="text" name="actual" class="form-control" required 
                                title="โปรดกรอกสภาพปัจจุบันของต้นไม้ เช่น สมบูรณ์ดี ย้ายที่">
                            </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">การจัดแสดงในแผนที่<span class="s">*</span></label>
                            <select class="form-select form-control "name="show" required>
                              <option value="">เลือกการจัดแสดงในแผนที่</option>
                                <option value="0">ไม่แสดง</option>
                                <option value="1">แสดง</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4" style="margin: 30px 0 0 0;">
                            <div class="form-group">
                                <label class="bmd-label-floating">ความพิเศษ</label><span>
                                <input type="text" name="exclusivity" class="form-control">
                            </div>
                        </div>
                    </div>
                    <!-- row4 uploadsFile ภาพ -->
                    <div class="row">
                      <div class="col-md-12">
                          <a href="https://me-qr.com/th/?bannerid=4797045193&campaignid=12874623582&adgroupid=120965962269&feeditemid=&targetid=kwd-174630914&loc_interest_ms=&loc_physical_ms=1012747&matchtype=b&network=g&device=c&devicemodel=&gclid=Cj0KCQjwnNyUBhCZARIsAI9AYlEfECd3--EJrYaoS16QCKyJ64RpMb1LlNbw9uqu_qNuyqtVYOhN3LgaAqEwEALw_wcB&ifmobile:[value]=&ifnotmobile:[value]=[value]&ifsearch:[value]=[value]&ifcontent:[value]=&creative=517907940719&keyword=qr%20code&placement=&target=&param1=&param2=&adposition=&gclid=Cj0KCQjwnNyUBhCZARIsAI9AYlEfECd3--EJrYaoS16QCKyJ64RpMb1LlNbw9uqu_qNuyqtVYOhN3LgaAqEwEALw_wcB" target="_blank">เข้าสู่เว็บไซต์ Gen QRCode</a>
                          
                          <br><label class="bmd-label-floating">ภาพQRCode</label>
                            <input type="file" name="QRCode" size="20" class="form-control">
                            <label class="bmd-label-floating s" >*อัพไฟล์ที่มีนามสกุล gif หรือ .jpg หรือ .png</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                          <label class="bmd-label-floating">ภาพต้นไม้</label>
                            <input type="file" name="URL" size="20" class="form-control">
                            <label class="bmd-label-floating s" >*อัพไฟล์ที่มีนามสกุล gif หรือ .jpg หรือ .png</label>
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