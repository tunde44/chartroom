<title>Login </title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<?php
if(isset($_POST['login'])){
session_start();
$st_email=$_POST['std_email'];
$std_password= md5($_POST['std_password']);
include("config/connection.php");
$sql = "select * from user where user_email='".$st_email."' and user_password='".$std_password."'";

$result = mysqli_query($con,$sql);
$records = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);
if ($records==0)
{
	
echo '<script type="text/javascript">alert("Wrong Email or Password");window.location=\'index.php\';</script>';
header("location:login.php");
}
else
{
	$_SESSION['st_id']=$row['user_id'];
	$_SESSION['std_firstName']=$row['user_firstname'];
	$_SESSION['std_lastName']=$row['user_lastname'];
	
	header("location:index.php");
}
} 
?>
<?php include("template/header.php");
	  include("template/nav.php");
 ?>

<div class="container-fluid text-center"> 
<div class="row content">
    <?php include("news.php"); ?>
	<div class="col-sm-5 text-left"> 
     <div class="login-panel panel panel-default">
				<div class="panel-heading">Login </div>
				<div class="panel-body">
					<form role="form" method="POST" action="" >
						<fieldset>
							<div class="form-group">
								<input style="width:100%;border:1px solid #ccc; height:24px;"  placeholder="Email" name="std_email" type="text" autofocus="" />
							</div>
							<div class="form-group">
								<input style="width:100%;border:1px solid #ccc;height:24px; " placeholder="Password" name="std_password" type="password" />
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
</div>
<?php include("template/footer.php"); ?>