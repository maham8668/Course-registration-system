<!DOCTYPE html>
<html>
<head> 
  <title>Login</title>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript --> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
</head>
<body>
  <div class="container">  
    <h2 align="center"><b>Course Registration System</b></h2><br/>

    <div class="panel panel-primary">
      <div class="panel-heading">Student Console</div>
      <div class="panel-body">

    <form class = "form-horizontal" action = "logindb.php" method = "post">
      
      <div class = "form-group">
        <label class = "control-label col-sm-2" for = "registrationno">Registrationno:</label>
          <div class = "col-sm-4">
            <input type = "text" class="form-control" id = "registrationno" placeholder = "Enter Registration No " name = "registrationno">
          </div>
      </div>

      <div class = "form-group">
        <label class = "control-label col-sm-2" for = "password">Password:</label>
          <div class = "col-sm-4">
            <input type = "password" class = "form-control" id = "password" placeholder = "Enter password" name = "password">
          </div>
      </div>

      <div class = "form-group">
        <label class = "control-label col-sm-2" for = "submit-button"></label>
          <div class = "col-sm-4">
            <button type = "submit" class = "btn btn-primary" id = "submit-button" name = "login">Log in</button>
          </div>
      </div>

      </form>
      </div>
    </div>
  </div>
</body>
</html>