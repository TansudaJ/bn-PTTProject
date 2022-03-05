<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>PTT</title>

<!-- Bootstrap -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">  
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style type="text/css">
.btn{
	width:100%;
}
label{
  font-size: medium;
}
</style>
</head>
<body>
<?php 

if ($this->session->userdata('message_code')) {
  $message_code = $_SESSION['message_code'];
  $message = $_SESSION['message_error'];
      $this->session->unset_userdata('message_code');
      $this->session->unset_userdata('message_error');
?>

<div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
    </svg>
    <strong><?php echo $message;?> !!</strong> 
</div>
<script>
        $(".alert").fadeTo(2000, 500).slideUp(500, function(){
        $(".alert").slideUp(500);
        });
    </script>
  <?php 
  }
  ?>
<div class="container" style="padding-top:100px">
  <div class="row">
  <div class="col-md-4"></div>
    <div class="col-md-4" style="background-color:#f4f4f4">
      <h3 align="center">
      <span class="glyphicon glyphicon-lock"> </span>
       Member Login </h3>
      <form  name="formlogin" action="<?php echo site_url("login/check_login");?>" method="POST" id="login" class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-12">
          <i class="fa fa-user"></i>
          <label for="uname">Username</label>
            <input type="text"  name="uname" class="form-control" required placeholder="Username" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <i class="fa fa-lock"></i>
            <label for="psw">Password</label> 
            <input type="password" name="psw" class="form-control" required placeholder="Password" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
              <label>
                <input type="checkbox"  name="remember"> Remember me
               </label>
            <button type="submit" class="btn btn-primary">
            <span class="glyphicon glyphicon-log-in"> </span>
             Login </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed -->
</body>
</html>