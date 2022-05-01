
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
  h4{
    color: #9900cc;
    font-size: 1.75rem;
  }
</style>

<form method="post" action="<?php echo site_url("Mainmethods/save_edit_mainmethod");?>"> 
<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h3 class="card-title">เพิ่มวิธีการดูแลรักษา</h3>
                </div><br>
                <div class="card-body">
                  <form>
                    <div class=row>
                      <div class="col-md-12">
                        <h4>ข้อมูลทั่วไป</h4>
                      </div>
                    </div><br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">ชื่อวิธีการดูแลรักษา</label>
                          <input type="text" name="n_maintenancetype" class="form-control" value="<?php echo $result[0]->n_maintenancetype ;?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">รายละเอียด</label>
                            <textarea class="form-control" rows="5" name="detail"><?php echo $result[0]->detail ;?></textarea>
                          </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">ข้อแนะนำ</label>
                            <textarea class="form-control" rows="5" name="recommend"><?php echo $result[0]->recommend ;?></textarea>
                          </div>
                      </div>
                    </div>
                    <input type="hidden" name="maintenancetypeID" class="form-control" value="<?php echo $result[0]->maintenancetypeID ;?>">
                    <a href="<?php echo site_url("Mainmethods/mainmethod"); ?>" class="btn btn-warning pull-left">ย้อนกลับ</a>
                    <button type="submit" class="btn btn-success pull-right">บันทึก</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
    </div>
  </div>