
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

<form method="post" action="<?php echo site_url("Maintenances/save_edit_maintenance");?>"> 
<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h3 class="card-title">แก้ไขข้อมูลการดูแลรักษา</h3>
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
                          <label class="bmd-label-floating">พันธุ์ไม้</label>
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
                          <label class="bmd-label-floating">ประเภทการดูแลรักษา</label>
                          <select class="form-select form-control " name="maintenancetype_maintenancetypeID">
                              <option value="">เลือกประเภทการดูแลรักษา</option>
                              <?php foreach($maintenancetypeList as $mresult){?>
                                <option value="<?php echo $mresult->maintenancetypeID;?>"<?php echo ($result[0]->maintenancetype_maintenancetypeID == $mresult->maintenancetypeID ) ? "selected":""; ?>>
                                <?php echo $mresult->n_maintenancetype;?>
                            </option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">สถานะการใช้งาน</label>
                          <select class="form-select form-control "name="activeFlags" >
                              <option value=""></option>
                                <option value="0"<?php echo ($result[0]->activeFlags == 0 ) ? "selected":""; ?>>ไม่ใช้งาน</option>
                                <option value="1"<?php echo ($result[0]->activeFlags == 1 ) ? "selected":""; ?>>ใช้งาน</option>
                            </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">รายละเอียด</label>
                            <textarea class="form-control" rows="5" name="details"><?php echo $result[0]->details ;?></textarea>
                          </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">หมายเหตุ</label>
                            <textarea class="form-control" rows="5" name="note"><?php echo $result[0]->note ;?></textarea>
                          </div>
                      </div>
                    </div>
                    <input type="hidden" name="maintenanceID" class="form-control" value="<?php echo $result[0]->maintenanceID;?>">
                    <a href="<?php echo site_url("Maintenances/maintenance"); ?>" class="btn btn-warning pull-left">ย้อนกลับ</a>
                    <button type="submit" class="btn btn-success pull-right">บันทึก</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
    </div>
  </div>