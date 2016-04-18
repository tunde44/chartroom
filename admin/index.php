<?php 
if(isset($_POST['login'])){
	$userName		= $_POST['username'];
	$password 	 	= md5($_POST['password']);
	//...Connection and Db operation , 
	include("../config/connection.php");
	$sql = "SELECT * FROM admin WHERE admin_username = '".$userName."' AND admin_password = '".$password."' ";
	$query = mysqli_query($con,$sql);
	if(mysqli_num_rows($query)== 0){
		header("location:index.php");
	}else{
		$row = mysqli_fetch_assoc($query);
		session_start();
		$_SESSION['admin_id'] = $row['admin_id'];
		$_SESSION['admin_name'] = $row['admin_username'];
		header("location:dashboard.php");
	}
}
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login </title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Admin Login </div>
				<div class="panel-body">
					<form role="form" method="POST" action="" >
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="UserName" name="username" type="text" autofocus />
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" />
							</div>
							<div class="checkbox">
								<label>
									
								</label>
							</div>
							<input type="submit" class="btn btn-primary" name="login" value="Login" />
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	
		

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
