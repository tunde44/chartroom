<?php include("template/header.php"); 
if(isset($_POST['save'])){
	
	$first_name			= $_POST['te_first_name'];
	$last_name 	 		= $_POST['te_last_name'];
	$email	 			= $_POST['te_email'];
	$password			= md5($_POST['te_password']);
	$std_org_password  	= $_POST['te_password'];
	$role_user 			= 'teacher';
	$module_id 			= $_POST['module_id'];
	$sql = "INSERT INTO user  (user_firstname ,user_lastname ,user_email,user_password,user_status , user_org_password , module_id , role_user ) 
	VALUES ( '".$first_name."' , '".$last_name."' ,'".$email."' , '".$password."' , 'Active' , '".$std_org_password."' , '".$module_id."','".$role_user."') ";
	$query = mysqli_query($con,$sql);
	header("location:teacher.php");
}
?>
	<?php include("template/sidebar.php"); ?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="news.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Teachers</li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">News Teacher</div>
					<div class="panel-body">
						<form role="form" method="POST" action="" >
							<div class="col-md-6">
								<div class="form-group">
									<label>Teacher Name</label>
									<input class="form-control" name="te_first_name" placeholder="Teacher Name ">
								</div>
								<div class="form-group">
									<label>Last Name</label>
									<input class="form-control" name="te_last_name" placeholder="Student Last Name ">
								</div>
								<div class="form-group">
									<label>Email</label>
									<input class="form-control" name="te_email" placeholder="Student Email">
								</div>
								<div class="form-group">
									<label>Password</label>
									<input class="form-control" name="te_password" placeholder="Password ">
								</div>
								<div class="form-group">
									<label>Module</label>
									<select name="module_id" class="form-control">
									<option value="">Select Module</option>
									<?php 
										$sql = "SELECT  * from modules ";
										$query = mysqli_query($con,$sql);
										while($row = mysqli_fetch_assoc($query)){ ?>
									<option value="<?php echo $row['module_id']; ?>"><?php echo $row['module_name']; ?></option>
									
									<?php  } ?>
									</select>
								</div>
								
								<button type="submit" name="save" class="btn btn-primary">Submit Button</button>
								<button type="reset" class="btn btn-default">Reset Button</button>
								
							</div>
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
	</div><!--/.main-->
<?php include("template/footer.php"); ?>