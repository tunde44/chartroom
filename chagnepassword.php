<title>Forgot Password </title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<?php
if(isset($_POST['login'])){
session_start();
$new_pass	=	$_POST['new_pass'];
$con_pass 	=	 $_POST['con_pass'];
include("config/connection.php");

if($new_pass == $con_pass){
	
	
$sql = "UPDATE user SET  `user_password`= '".md5($new_pass)."' WHERE user_id = '".$_SESSION['st_id']."' ";
$result = mysqli_query($con,$sql);
echo '<script type="text/javascript">alert("Password changed successfully..!");window.location=\'profile.php\';</script>';
header("location:profile.php");

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
				<div class="panel-heading">Rest Password </div>
				<div class="panel-body">
					<form role="form" method="POST" action="" >
						<fieldset>
							<div class="form-group">
								<input style="width:100%;border:1px solid #ccc; height:24px;"  placeholder="New Password" name="new_pass" type="text" autofocus="" />
							</div>
							<div class="form-group">
								<input style="width:100%;border:1px solid #ccc; height:24px;"  placeholder="Confirm Password" name="con_pass" type="text" autofocus="" />
							</div>
							
							<input type="submit" class="btn btn-primary" name="login" value="Login" />
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
</div>
<?php include("template/footer.php"); ?>