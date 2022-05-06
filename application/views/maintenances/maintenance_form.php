
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

<form method="post" action="<?php echo site_url("Maintenances/new_maintenance_add");?>"> 
<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h3 class="card-title">เพิ่มข้อมูลการดูแลรักษา</h3>
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
                          <label class="bmd-label-floating">พันธุ์ไม้<span class="s">*</span></label>
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
                          <label class="bmd-label-floating">ประเภทการดูแลรักษา<span class="s">*</span></label>
                          <select class="form-select form-control " name="maintenancetype_maintenancetypeID" required>
                              <option value="">เลือกประเภทการดูแลรักษา</option>
                              <?php foreach($maintenancetypeList as $result){?>
                                <option value="<?php echo $result->maintenancetypeID;?>">
                                <?php echo $result->n_maintenancetype;?>
                            </option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">รายละเอียด<span class="s">*</span></label>
                            <textarea class="form-control" rows="5" name="details" required></textarea>
                          </div>
                      </div>
                    </div>
                      
                    <a href="<?php echo site_url("Maintenances/maintenance"); ?>" class="btn btn-warning pull-left">ย้อนกลับ</a>
                    <button type="submit" class="btn btn-success pull-right">บันทึก</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
    </div>
  </div>