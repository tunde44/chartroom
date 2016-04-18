<?php include("template/header.php"); 
if(isset($_POST['save'])){
	$first_name			= $_POST['std_first_name'];
	$last_name 	 		= $_POST['std_last_name'];
	$email	 			= $_POST['std_email'];
	$password			= md5($_POST['std_password']);
	$std_org_password  	= $_POST['std_password'];
	$course_id 			= $_POST['course_id'];
	$role_user 			='student';
	//$date_created = date('Y:m:d');
	$sql = "INSERT INTO user  (user_firstname ,user_lastname ,user_email,user_password,user_status , user_org_password , course_id , role_user ) 
	VALUES ( '".$first_name."' , '".$last_name."' ,'".$email."' , '".$password."' , 'Active' , '".$std_org_password."' , '".$course_id."','".$role_user."') ";
	$query = mysqli_query($con,$sql);
	header("location:student.php");
}
?>
	<?php include("template/sidebar.php"); ?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="news.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Students</li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">News Student</div>
					<div class="panel-body">
						<div class="col-md-6">
							<form role="form" method="POST" action="" >
							
								<div class="form-group">
									<label>First Name</label>
									<input class="form-control" name="std_first_name" placeholder="Student First Name ">
								</div>
								<div class="form-group">
									<label>Last Name</label>
									<input class="form-control" name="std_last_name" placeholder="Student Last Name ">
								</div>
								<div class="form-group">
									<label>Email</label>
									<input class="form-control" name="std_email" placeholder="Student Email">
								</div>
								<div class="form-group">
									<label>Password</label>
									<input class="form-control" name="std_password" placeholder="Password ">
								</div>
								<div class="form-group">
									<label>Course</label>
									<select name="course_id" class="form-control">
									<option value="">Select Course</option>
									<?php 
									$sql = "SELECT  * from courses  ";
										$query = mysqli_query($con,$sql);
									while($row = mysqli_fetch_assoc($query)){ ?>
									<option value="<?php echo $row['course_id'] ?>"><?php echo $row['course_name']; ?></option>
									
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