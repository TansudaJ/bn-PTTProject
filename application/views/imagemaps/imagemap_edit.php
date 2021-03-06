
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

<?php echo form_open_multipart('imagemaps/save_edit_imagemap');?>
<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h3 class="card-title">แก้ไขข้อมูลแผนที่</h3>
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
                          <label class="bmd-label-floating">สถานะการใช้งาน</label>
                          <select class="form-select form-control "name="activeFlag" >
                              <option value=""></option>
                                <option value="0"<?php echo ($result[0]->activeFlag == 0 ) ? "selected":""; ?>>ไม่ใช้งาน</option>
                                <option value="1"<?php echo ($result[0]->activeFlag == 1 ) ? "selected":""; ?>>ใช้งาน</option>
                            </select>
                        </div>
                      </div>
                    </div>
                    <!-- row2 uploadsFile ภาพ -->
                    <div class="row">
                      <div class="col-md-12">
                          <label class="bmd-label-floating">ภาพแผนที่</label>
                            <input type="file" name="imageURL" size="20" class="form-control">
                            <label class="bmd-label-floating s" >*อัพไฟล์ที่มีนามสกุล gif หรือ .jpg หรือ .png</label>
                      </div>
                    </div><br>
                    <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">ข้อมูลแผนที่</label>
                            <textarea class="form-control" rows="5" id="imagedetail" name="imagedetail"><?php echo $result[0]->imagedetail ;?></textarea>
                          </div>
                      </div>
                    </div>
                    
                    <input type="hidden" name="imagezoneID" class="form-control" value="<?php echo $result[0]->imagezoneID ;?>">
                    <a href="<?php echo site_url("Imagemaps/imagemap"); ?>" class="btn btn-warning pull-left">ย้อนกลับ</a>
                    <button type="submit" class="btn btn-success pull-right">บันทึก</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
    </div>
  </div>