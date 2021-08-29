
<form method="post" action="<?php echo site_url("users/new_user_add");?>"> 
<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h3 class="card-title">New User Profile</h3>
                </div>
                <div class="card-body">
                  <form>
                    <div class="row">
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">ID</label>
                          <input type="text" name="user_id" class="form-control" disabled>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input type="text" name="username" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group input-group">
                          <label class="bmd-label-floating">Password</label>
                            <input type="text" class="form-control" id="password" name="password" readonly>
                            <div class="input-group-append">
                              <button class="btn btn-primary btn-sm" type="button" onclick="genPassword()">สุ่มรหัสผ่าน</button>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">ชื่อ</label>
                          <input type="text" name="fname" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">นามสกุล</label>
                          <input type="text" name="lname" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email Address</label>
                          <input type="text" name="email" class="form-control" required>
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
                    <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">เบอร์ติดต่อ</label>
                            <input type="text" name="telno" class="form-control" required>
                          </div>
                        </div>
                        
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">สิทธิการใช้งาน</label><span>
                          <select class="form-select form-control "name="roleID" required>
                            <option value="">Open this select menu</option>
                            <option value="1">Administrator</option>
                            <option value="2">Editor</option>
                            <option value="3">Employee</option>
                          </select>
                        </div>
                    </div>
                            

                   
                      <div class="col-md-4">
                        <div class="form-group">
                        <label class="bmd-label-floating">สถานะ</label><span>
                        <select class="form-select form-control "name="activeFlag" required>
                          <option value="">Open this select menu</option>
                          <option value="0">Inactive</option>
                          <option value="1">Active</option>
                        </select>
                         
                        </div>
                      </div>
                    </div>
                    
                    <a href="<?php echo site_url("Users/user"); ?>" class="btn btn-warning pull-left">ย้อนกลับ</a>
                    <button type="submit" class="btn btn-success pull-right">บันทึก</button>
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


