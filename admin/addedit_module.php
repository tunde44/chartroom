<?php include("template/header.php"); 
if(isset($_POST['submitnews'])){
	$course_id			= $_POST['course_id'];
	$module_name		= $_POST['module_name'];
	$module_code 	 	= $_POST['module_code'];
	//$date_created = date('Y:m:d');
	$sql = "INSERT INTO modules  (module_name , module_code , course_id ) VALUES ( '".$module_name."' , '".$module_code."' , '".$course_id."' ) ";

	$query = mysqli_query($con,$sql);
	header("location:module.php");
}
?>
	<?php include("template/sidebar.php"); ?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="news.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Modules (Subject)</li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">New Module (Subject)</div>
					<div class="panel-body">
					  <form role="form" method="POST" action="" >
							<div class="col-md-6">
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
								
								<div class="form-group">
									<label>Module(subject) Name</label>
									<input class="form-control" name="module_name" placeholder="Module Name">
								</div>
								
								
								<!--<div class="form-group">
									<label>Teacher</label>
									<select name="teacher_id" class="form-control">
									<option value="">Select Teacher</option>
									<?php 
									$tesql = "SELECT  * from user where role_user = 'teacher' order by user_id DESC  ";
										$query_teacher = mysqli_query($con,$tesql);
									while($row_t = mysqli_fetch_assoc($query_teacher)){ ?>
									<option value="<?php echo $row_t['user_id'] ?>"><?php echo $row_t['user_firstname']; ?></option>
									
									<?php  } ?>
									</select>
								</div>-->
								
								
								<div class="form-group">
									<label>Module(Subject) Code</label>
									<input class="form-control" name="module_code" placeholder="Module Code">
								</div>
								<button type="submit" name="submitnews" class="btn btn-primary">Submit Button</button>
								<button type="reset" class="btn btn-default">Reset Button</button>
							</div>
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
	</div><!--/.main-->
<?php include("template/footer.php"); ?>