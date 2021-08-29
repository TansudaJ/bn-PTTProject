<?php 
if ($this->session->userdata('message_error')) {
    $message = $_SESSION['message_error'];
    echo $message;
}
?>
<div class="row">
<div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">forest</i>
                  </div>
                  <p class="card-category">จำนวนต้นไม้</p>
                  <h3 class="card-title">34,245
                    <small>ต้น</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <!--<div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="javascript:;">Get More Space...</a>
                  </div>-->
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">park</i>
                  </div>
                  <p class="card-category">จำนวนพรรณไม้</p>
                  <h3 class="card-title">4,245
                  <small>ชนิด</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <!--<div class="stats">
                    <i class="material-icons">date_range</i> Last 24 Hours
                  </div>-->
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">map</i>
                  </div>
                  <p class="card-category">จำนวนโซน</p>
                  <h3 class="card-title">7
                  <small>โซน</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <!--<div class="stats">
                    <i class="material-icons">date_range</i> Last 24 Hours
                  </div>-->
                </div>
              </div>
            </div>
          </div>
          <!--<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">Latest Users</h3>
				  </div>
				  <div class="panel-body">
				    <table class="table table-striped table-hover">
				    	<tr>
				    	<th>Name</th>
				    	<th>Email</th>
				    	<th>Joined</th>
				    	</tr>
				    	<tr>
				    	<td>Piyush Arora</td>
				    	<td>connect@piyusharora.co</td>
				    	<td>June, 19th 1992</td>
				    	</tr>
				    	<tr>
				    	<td>John Doe</td>
				    	<td>john@doe.com</td>
				    	<td>May 21st 1981</td>
				    	</tr>
				    	<tr>
				    	<td>Jill Doe</th>
				    	<td>jill@doe.com</td>
				    	<td>May 21st 1981</td>
				    	</tr>
				    </table>
				  </div>
				</div>-->