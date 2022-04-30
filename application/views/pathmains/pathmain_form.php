
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

<form method="post" action="<?php echo site_url("pathmains/new_pathmain_add");?>"> 
<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h3 class="card-title">เพิ่มข้อมูลส่วนประกอบ</h3>
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
                          <label class="bmd-label-floating">ชื่อพันธุ์ไม้<span class="s">*</span></label>
                                <select class="form-select form-control "name="vegetation_vegetationID" required>
                                    <option value="">เลือกส่วนประกอบต้นไม้</option>
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
                          <label class="bmd-label-floating">ส่วนประกอบต้นไม้<span class="s">*</span></label>
                                <select class="form-select form-control "name="plantspath_pathID" required>
                                    <option value="">เลือกส่วนประกอบต้นไม้</option>
                                    <?php foreach($plantpathList as $result){?>
                                      <option value="<?php echo $result->pathID;?>">
                                      <?php echo $result->plantpathname;?>
                                  </option>
                                  <?php } ?>
                                </select>
                        </div>
                      </div>
                    </div>
                    <!-- ภาพส่วนประกอบ -->
                    <div class="row">
                      <div class="col-md-12">
                        <!-- <div class="form-group"> -->
                          <label class="bmd-label-floating">ภาพส่วนประกอบต้นไม้</label>
                            <input type="file" name="URL" size="20" class="form-control">
                        <!-- </div> -->
                      </div>
                    </div><br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">คุณสมบัติ</label><span>
                            <textarea class="form-control" name="properties" id="properties" cols="30" rows="2"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">คำแนะนำ</label><span>
                            <textarea class="form-control" name="instruction" id="instruction" cols="30" rows="2"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">คำเตือน/ข้อควรระวัง</label><span>
                            <textarea class="form-control" name="caution" id="caution" cols="30" rows="2"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">แหล่งที่มาของข้อมูล</label><span>
                            <textarea class="form-control" name="reference" id="reference" cols="30" rows="2"></textarea>
                        </div>
                      </div>
                    </div><br>
                    
                    <a href="<?php echo site_url("Pathmains/pathmain"); ?>" class="btn btn-warning pull-left">ย้อนกลับ</a>
                    <button type="submit" class="btn btn-success pull-right">บันทึก</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
    </div>
  </div>