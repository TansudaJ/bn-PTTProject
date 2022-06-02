
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
<?php echo form_open_multipart('Ecosytems/save_edit_eco');?>
<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h3 class="card-title">เพิ่มข้อมูลระบบนิเวศพืช</h3>
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
                          <label class="bmd-label-floating">ชื่อพืช</label>
                          <input type="text" name="plantname" class="form-control" value="<?php echo $result[0]->plantname ;?>">
                        </div>
                      </div><div class="col-md-4" style="margin: -32px 0px 0px 0px;">
                        <div class="form-group">
                        <label class="bmd-label-floating">เลือกประเภทพืช</label>
                        <select class="form-select form-control "name="typeID" >
                              <option value="">เลือกประเภทพืช</option>
                              <?php foreach($typeList as $tresult){?>
                                <option value="<?php echo $tresult->typeID;?>"<?php echo ($result[0]->typeID == $tresult->typeID ) ? "selected":""; ?>>
                                <?php echo $tresult->typename;?>
                            </option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4" style="margin: -32px 0px 0px 0px;">
                        <div class="form-group">
                          <label class="bmd-label-floating">สถานะการใช้งาน</label>
                          <select class="form-select form-control "name="activeflag" >
                              <option value=""></option>
                                <option value="0"<?php echo ($result[0]->activeflag == 0 ) ? "selected":""; ?>>ไม่ใช้งาน</option>
                                <option value="1"<?php echo ($result[0]->activeflag == 1 ) ? "selected":""; ?>>ใช้งาน</option>
                            </select>
                        </div>
                      </div>
                    </div><br>
                    
                    <input type="hidden" name="eco_plantID" class="form-control" value="<?php echo $result[0]->eco_plantID ;?>">
                    <a href="<?php echo site_url("Ecosytems/ecosytem"); ?>" class="btn btn-warning pull-left">ย้อนกลับ</a>
                    <button type="submit" class="btn btn-success pull-right">บันทึก</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
    </div>
  </div>