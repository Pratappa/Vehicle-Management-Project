<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');

if(isset($_POST['login']))
  {
    $adminuser=$_POST['username'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"SELECT ID from admin where  UserName='$adminuser' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['vpmsaid']=$ret['ID'];
     header('location:dashboard.php');
    }
    else{
    $msg="Login Failed !!";
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Vehicle Parking System</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <!-- Inline CSS for styling -->
    <style>
        body {
            display:inline-block;
            align-items:center;
            background-image: url("park.png");
            height: 100%;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            line-height: 1.0;
            min-height: 100px;
            font-family: 'Montserrat', sans serif;
            justify-content:flex;
             
        }
        .custom-heading {
            color: blue; 
        }
        .login-panel {
            max-width: 400px;
            background-color: #00ffff;
            border-radius: 40px;
            padding: 40px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 4);
            margin: 0 auto;
            margin-top: 50px;
            transform-style: preserve-3d;
        }

        .panel-body {
            max-width: 358px;
            background-color: #ffdab9;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 4);
            margin: 0 auto;
            margin-top: 80px;
            transform-style: preserve-3d;
         }
        .panel-heading {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 20px;
            text-align: center;
            color: #ff0000;
        }
        .form-control {
            border-radius: 8px;
            background-color: #f0ffff;
            color: #333;
            margin-bottom: 20px;
        }
        .form-control::placeholder {
            color: #7d8396;
        }
        .btn {
            border-radius: 8px;
            background-color: #0000ff;
            color: #fff;
            font-size: 16px;
            font-weight: 700;
            transition: background-color 0.9s ease;
            box-shadow: 0px 0px 6px rgba(0, 0, 0, 2);
        }
        .alert {
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 20px;
        }
        .alert-danger {
            background-color: #dc3545;
            color: #fff;
        }
    </style>
        <!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="row">
		<div class="col-xs-12 col-xs-offset-2">
                  <center><h1 class="custom-heading" style="font-family:forte">Vehicle Parking System</h1></center>
			<div class="login-panel" data-tilt>
				<div class="panel-heading">Please Log In To Continue</div>
				       <div class="panel-body">
					       <form method="POST">
					<?php if($msg)
						echo "<div class='alert bg-danger' role='alert'>
						<em class='fa fa-lg fa-warning'>&nbsp;</em> 
						$msg
						<a href='#' class='pull-right'>
						<em class='fa fa-lg fa-close'>
						</em></a></div>" ?> 
                        

						 <fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="username" type="text">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							
								
								<a href="forgot-password.php" style="text-decoration:none;">Forgot Password? </a>
							
							<button class="btn btn-success" type="submit" name="login">Login</button></fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.1/vanilla-tilt.min.js" integrity="sha512-wC/cunGGDjXSl9OHUH0RuqSyW4YNLlsPwhcLxwWW1CR4OeC2E1xpcdZz2DeQkEmums41laI+eGMw95IJ15SS3g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    VanillaTilt.init(document.querySelector("[data-tilt]"), {
        max: 25,
        speed: 80,
        glare: true,
        "max-glare": 0.6
    });
</script>
</body>
</html>
