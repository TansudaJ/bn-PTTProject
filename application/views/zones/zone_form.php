
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
<?php echo form_open_multipart('Zones/new_zone_add');?>
<!-- <form method="post" action="<?php echo site_url("Zones/new_zone_add");?>" enctype="multipart/form-data">  -->
<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h3 class="card-title">เพิ่มข้อมูลโซน</h3>
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
                          <label class="bmd-label-floating">ชื่อโซนภาษาไทย<span class="s">*</span></label>
                          <input type="text" name="nameTH" class="form-control" required>
                        </div>
                      </div><div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">ชื่อโซนภาษาอังกฤษ<span class="s">*</span></label>
                          <input type="text" name="nameEN" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-4" style="margin: -32px 0px 0px 0px;">
                        <div class="form-group">
                          <label class="bmd-label-floating">เลือกโซน</label>
                          <select class="form-select form-control "name="headzoneID" >
                              <option value="">เลือกโซน</option>
                              <?php foreach($zoneList as $result){?>
                                <option value="<?php echo $result->zoneID;?>">
                                <?php echo $result->nameTH;?>
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
                          <label class="bmd-label-floating">พิกัด<span class="s">*</span></label>
                          <input type="text" name="location" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">สถานะ<span class="s">*</span></label>
                          <select class="form-select form-control "name="status" required>
                              <option value=""></option>
                                <option value="0">ไม่แสดง</option>
                                <option value="1">แสดง</option>
                            </select>
                        </div>
                      </div>
                    </div>
                    <!-- row4 -->
                    <div class=row>
                      <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">รายละเอียด</label><span>
                            <textarea class="form-control" rows="5" name="detail"></textarea>
                        </div>
                      </div>
                    </div>
                    
                    
                    <a href="<?php echo site_url("Zones/zone"); ?>" class="btn btn-warning pull-left">ย้อนกลับ</a>
                    <button type="submit" class="btn btn-success pull-right">บันทึก</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
    </div>
  </div>