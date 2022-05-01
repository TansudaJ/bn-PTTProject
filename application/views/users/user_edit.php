<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
            $(document).ready(function() {
                $('#categories').change(function() {
                    $.ajax({
                        type: 'POST',
                        data: {categories: $(this).val()},
                        url: 'select_product.php',
                        success: function(data) {
                            $('#products').html(data);
                        }
                    });
                    return false;
                });
            });
        </script>
<style>
  .s{
    color: red;
   }
</style>
<?php echo form_open_multipart('users/save_edit_user');?>
<!-- <form method="post" action="<?php echo site_url("users/new_user_add");?>">  -->
      <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h3 class="card-title">เพิ่มข้อมูลผู้ใช้งาน</h3>
                </div>
                <div class="card-body">
                  <form>
                    <!-- row1 -->
                    <div class="row justify-content-md-center">
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">รหัสพนักงาน</label>
                          <input type="text" name="employeeID" class="form-control" value="<?php echo $result[0]->employeeID ;?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input type="text" name="username" class="form-control" value="<?php echo $result[0]->username ;?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group input-group">
                          <label class="bmd-label-floating">Password</label>
                            <input type="text" class="form-control" id="password" name="password" value="<?php echo $result[0]->password ;?>">
                            <div class="input-group-append">
                              <button class="btn btn-primary btn-sm" type="button" onclick="genPassword()">สุ่มรหัสผ่าน</button>
                            </div>
                        </div>
                      </div>
                    </div>
                    <!-- row2 -->
                    <div class="row justify-content-md-center">
                    <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">คำนำหน้า</label>
                            <select class="form-select form-control" name="PrefixID" value="<?php echo $result[0]->PrefixID ;?>">
                              <option value="">ตัวเลือก</option>
                              <option value="1">นาย</option>
                              <option value="2">นาง</option>
                              <option value="3">นางสาว</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">ชื่อ</label>
                          <input type="text" name="f_name" class="form-control" value="<?php echo $result[0]->f_name ;?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">นามสกุล</label>
                          <input type="text" name="l_name" class="form-control" value="<?php echo $result[0]->l_name ;?>">
                        </div>
                      </div>
                    </div>
                    <!--<div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                        <label class="bmd-label-floating">ฝ่าย</label>
                          <input list="title" class="form-control" required>
                            <datalist id="title">
                              <option value="วิศวะกรรมและบำรุงรักษา">
                              <option value="ปฎิบัติการณ์">
                              <option value="กลยุทธ์และบริหารองค์กร">
                            </datalist>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                        <label class="bmd-label-floating">ส่วน/แผนก</label>
                          <input list="title" class="form-control" required>
                            <datalist id="title">
                              <option value="หัวหน้า1">
                              <option value="เลขา">
                              <option value="ผู้ช่วย...">
                            </datalist>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                        <label class="bmd-label-floating">ตำแหน่ง</label>
                          <input list="title" class="form-control" required>
                            <datalist id="title">
                              <option value="หัวหน้า1">
                              <option value="เลขา">
                              <option value="ผู้ช่วย...">
                            </datalist>
                        </div>
                      </div>
                    </div>-->
                    <!-- row3 -->
                    <div class="row justify-content-md-center">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email Address</label>
                          <input type="text" name="email" class="form-control" value="<?php echo $result[0]->email ;?>">
                        </div>
                      </div>
                      <div class="col-md-5">
                          <div class="form-group">
                            <label class="bmd-label-floating">เบอร์ติดต่อ</label>
                            <input type="text" name="telno" class="form-control" value="<?php echo $result[0]->telno ;?>">
                          </div>
                        </div>
                    </div><br>
                    <!-- row4 uploadsFile ภาพประจำตัว -->
                    <div class="row justify-content-md-center">
                      <div class="col-md-10">
                        <!-- <div class="form-group"> -->
                          <label class="bmd-label-floating">ภาพประจำตัว</label>
                            <input type="file" name="imageURL" size="20" class="form-control" value="<?php echo $result[0]->imageURL ;?>">
                        <!-- </div> -->
                      </div>
                    </div><br>
                    <!-- row5 -->
                    <div class="row justify-content-md-center">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">สิทธิการใช้งาน</label>
                          <select class="form-select form-control " name="authority_authorityID" value="<?php echo $result[0]->authority_authorityID ;?>">
                            <option value="">ตัวเลือก</option>
                            <option value="1">Admin</option>
                            <option value="2">Editor</option>
                            <option value="3">Employee</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                        <label class="bmd-label-floating">สถานะ</label>
                        <select class="form-select form-control" name="activeflag" value="<?php echo $result[0]->activeflag ;?>">
                          <option value="">ตัวเลือก</option>
                          <option value="0">Inactive</option>
                          <option value="1">Active</option>
                        </select>
                        </div>
                      </div>
                    </div>
                    <br>
                    <a href="<?php echo site_url("Users/user"); ?>" class="btn btn-warning pull-left" style="margin-left: 100px;">ย้อนกลับ</a>
                    <button type="submit" class="btn btn-success pull-right" style="margin-right: 100px;">บันทึก</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
      </div>
  </div>

  <script>
    var password=document.getElementById("password");

function genPassword() {
   var chars = "0123456789abcdefghijklmnopqrstuvwxyz!@#$%^&*()_+~\\`|}{[]:;?><,./-=ABCDEFGHIJKLMNOPQRSTUVWXYZ";
   var passwordLength = 9;
   var password = "";
for (var i = 0; i <= passwordLength; i++) {
  var randomNumber = Math.floor(Math.random() * chars.length);
  password += chars.substring(randomNumber, randomNumber +1);
 }
       document.getElementById("password").value = password;
}

</script>


