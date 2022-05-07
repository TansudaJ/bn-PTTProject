
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
<?php echo form_open_multipart('Zones/save_edit_zone');?>
<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h3 class="card-title">แก้ไขข้อมูลโซน</h3>
                </div><br>
                <div class="card-body">
                  <form>
                    <div class=row>
                      <div class="col-md-12">
                        <h4>ข้อมูลทั่วไป</h4>
                      </div>
                    </div><br>
                    <!-- row1 -->
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">ชื่อโซนภาษาไทย</label>
                          <input type="text" name="nameTH" class="form-control" value="<?php echo $result[0]->nameTH ;?>">
                        </div>
                      </div><div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">ชื่อโซนภาษาอังกฤษ</label>
                          <input type="text" name="nameEN" class="form-control" value="<?php echo $result[0]->nameEN ;?>">
                        </div>
                      </div>
                      <div class="col-md-4" style="margin: -32px 0px 0px 0px;">
                        <div class="form-group">
                          <label class="bmd-label-floating">เลือกโซนหลัก</label>
                          <select class="form-select form-control "name="headzoneID" >
                              <option value="">เลือกโซน</option>
                              <?php foreach($zoneList as $zresult){?>
                                <option value="<?php echo $zresult->zoneID;?>"<?php echo ($result[0]->headzoneID == $zresult->zoneID ) ? "selected":""; ?>>
                                <?php echo $zresult->nameTH;?>
                            </option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- row2 -->
                    <div class="row">
                      <div class="col-md-4" style="margin: 30px 0px 0 0px;">
                        <div class="form-group">
                          <label class="bmd-label-floating">พิกัด</label>
                          <input type="text" name="location" class="form-control"  value="<?php echo $result[0]->location ;?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">สถานะการจัดแสดง</label>
                          <select class="form-select form-control "name="status" >
                              <option value=""></option>
                                <option value="0"<?php echo ($result[0]->status == 0 ) ? "selected":""; ?>>ไม่แสดง</option>
                                <option value="1"<?php echo ($result[0]->status == 1 ) ? "selected":""; ?>>แสดง</option>
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
                    <!-- row4 -->
                    <div class=row>
                      <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">รายละเอียด</label><span>
                            <textarea class="form-control" rows="5" name="detail"><?php echo $result[0]->detail ;?></textarea>
                        </div>
                      </div>
                    </div>
                    
                    <input type="hidden" name="zoneID" class="form-control" value="<?php echo $result[0]->zoneID ;?>">
                    <a href="<?php echo site_url("Zones/zone"); ?>" class="btn btn-warning pull-left">ย้อนกลับ</a>
                    <button type="submit" class="btn btn-success pull-right">บันทึก</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
    </div>
  </div>