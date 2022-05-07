
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
<?php echo form_open_multipart('Pathmains/save_edit_pathmain');?>
<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h3 class="card-title">แก้ไขข้อมูลส่วนประกอบ</h3>
                </div><br>
                <div class="card-body">
                  <form>
                    <div class=row>
                      <div class="col-md-12">
                        <h4>ข้อมูลทั่วไป</h4>
                      </div>
                    </div><br>
                    <div class=row>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">ชื่อพันธุ์ไม้</label>
                                <select class="form-select form-control "name="vegetation_vegetationID">
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
                          <label class="bmd-label-floating">ส่วนประกอบต้นไม้</label>
                                <select class="form-select form-control "name="plantspath_pathID">
                                    <option value="">เลือกส่วนประกอบต้นไม้</option>
                                    <?php foreach($plantpathList as $presult){?>
                                      <option value="<?php echo $presult->pathID;?>" <?php echo ($result[0]->plantspath_pathID == $presult->pathID ) ? "selected":""; ?>>
                                      <?php echo $presult->plantpathname;?>
                                  </option>
                                  <?php } ?>
                                </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">สถานะการใช้งาน</label>
                          <select class="form-select form-control "name="activeflag" >
                              <option value=""></option>
                                <option value="0"<?php echo ($result[0]->activeflag == 0 ) ? "selected":""; ?>>ไม่ใช้งาน</option>
                                <option value="1"<?php echo ($result[0]->activeflag == 1 ) ? "selected":""; ?>>ใช้งาน</option>
                            </select>
                        </div>
                      </div>
                    </div>
                    <!-- ภาพส่วนประกอบ -->
                    <div class="row">
                      <div class="col-md-12">
                        <!-- <div class="form-group"> -->
                          <label class="bmd-label-floating">ภาพส่วนประกอบต้นไม้</label>
                            <input type="file" name="" size="20" class="form-control">
                            <label class="bmd-label-floating s" >*อัพไฟล์ที่มีนามสกุล gif หรือ .jpg หรือ .png</label>
                        <!-- </div> -->
                      </div>
                    </div><br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">คุณสมบัติ</label><span>
                            <textarea class="form-control" name="properties" id="properties" cols="30" rows="2"><?php echo $result[0]->properties ;?></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">คำแนะนำ</label><span>
                            <textarea class="form-control" name="instruction" id="instruction" cols="30" rows="2"><?php echo $result[0]->instruction ;?></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">คำเตือน/ข้อควรระวัง</label><span>
                            <textarea class="form-control" name="caution" id="caution" cols="30" rows="2"><?php echo $result[0]->caution ;?></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">แหล่งที่มาของข้อมูล</label><span>
                            <textarea class="form-control" name="reference" id="reference" cols="30" rows="2"><?php echo $result[0]->reference ;?></textarea>
                        </div>
                      </div>
                    </div><br>
                    <input type="hidden" name="medicinalPropertiesID" class="form-control" value="<?php echo $result[0]->medicinalPropertiesID ;?>">
                    <a href="<?php echo site_url("Pathmains/pathmain"); ?>" class="btn btn-warning pull-left">ย้อนกลับ</a>
                    <button type="submit" class="btn btn-success pull-right">บันทึก</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
    </div>
  </div>