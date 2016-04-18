<?php include("template/header.php"); 
if(isset($_POST['submitnews'])){
	$course_name		= $_POST['course_name'];
	$course_code 	 	= $_POST['course_code'];
	//$date_created = date('Y:m:d');
	$sql = "INSERT INTO courses  (course_name , course_code  ) VALUES ( '".$course_name."' , '".$course_code."') ";
	$query = mysqli_query($con,$sql);
	header("location:course.php");
}
?>
	<?php include("template/sidebar.php"); ?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="news.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Courses</li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">New Course</div>
					<div class="panel-body">
					  <form role="form" method="POST" action="" >
							<div class="col-md-6">
								<div class="form-group">
									<label>Cousre Name</label>
									<input class="form-control" name="course_name" placeholder="Course Name">
								</div>
								
								<div class="form-group">
									<label>Course Code</label>
									<input class="form-control" name="course_code" placeholder="Couser Code">
								</div>
								<button type="reset" class="btn btn-default">Reset Button</button>
								<button type="submit" name="submitnews" class="btn btn-primary">Submit Button</button>
							</div>
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
	</div><!--/.main-->
<?php include("template/footer.php"); ?>