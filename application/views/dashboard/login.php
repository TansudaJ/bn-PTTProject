<?php 
if ($this->session->userdata('message_error')) {
    $message = $_SESSION['message_error'];
    $this->session->unset_userdata('message_error');
    echo $message;
}
?>

<! DOCTYPE html>  
<html lang="en" >  
<head>  
  <meta charset="UTF-8">  
  <title> Bootstrap 4 Login Form Example  
</title>  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">  
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
</head>  
<style>  
body {  
          background-repeat: no-repeat, repeat;  
          background-position: center;  
          background-size: cover;  
          padding-top: 50px;  
        }  
        .login-form {  
          background:#1a11117a;  
          margin-top: 40px;  
          margin-bottom: 100px;  
          padding: 100px;  
          border-radius: 50px;  
          color: white;  
          box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);  
        }  
        .login-heading {  
          text-align: center;  
          margin-top: 20px;  
        }  
        .btn-primary {  
          width: 100%;  
        }  
</style>  
<body>  
<h1 class="text-center"> Administration Login </h1>  
    <div class="container">  
      <div class="row">  
        <div class="col-md-8 offset-md-2">  
          <div class="login-form">  
          <form action="<?php echo site_url("login/check_login");?>" method="post">
              <div class="form-group"> 
              <div class="form-group">
              <i class="material-icons">person</i>
                          
              <label for="uname">Username</label>  
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="uname" required>   
              </div>  
              <div class="form-group"> 
              <i class="material-icons">vpn_key</i> 
                <label for="psw">Password</label>  
                <input type="password" class="form-control" id="exampleInputPassword1" name="psw" required>  
              </div>  
              <div class="form-group form-check">  
                <input type="checkbox" class="form-check-input" id="rememDemo">  
                <label class="form-check-label" for="rememDemo">  Remember me  </label>  
              </div>   
              <button type="submit" class="btn btn-primary"> Sign in </button>  
            </form>  
          </div>  
        </div>  
      </div>  
    </div>  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"> </script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"> </script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"> </script>  
    <script>  
    </script>  
  </body>  
</html>  