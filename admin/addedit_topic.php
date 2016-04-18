<?php include("template/header.php"); 
if(isset($_POST['submitnews'])){
	$topic_title		= $_POST['topic_title'];
	$topic_desc 	 	= $_POST['description'];
	$module_id			= $_POST['module_id'];
	$date_created		 = date('d:m:Y'); 
	$sql = "INSERT INTO topics  (topic_title , topic_des ,topic_status , module_id ,date_created ) VALUES
	( '".$topic_title."' , '".$topic_desc."' , '1' , '".$module_id."' , '".$date_created."') ";
	
	$query = mysqli_query($con,$sql);
	header("location:topic.php");
}
?>
	<?php include("template/sidebar.php"); ?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="news.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Topics</li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">News Topic</div>
					<div class="panel-body">
						<div class="col-md-6">
							<form role="form" method="POST" action="" >
							
								<div class="form-group">
									<label>Title</label>
									<input class="form-control" name="topic_title" placeholder="Topic Title">
								</div>
								<div class="form-group">
									<label>Topic Module</label>
									<select name="module_id" class="form-control">
									<option value="">Select Module</option>
									<?php 
										$sql = "SELECT  * from modules  ";
											$query = mysqli_query($con,$sql);
										while($row = mysqli_fetch_assoc($query)){ ?>
										<option value="<?php echo $row['module_id'] ?>"><?php echo $row['module_name']; ?></option>
										
									<?php  } ?>
									</select>
								</div>
								
								<div class="form-group">
									<label>Topic Description</label>
									<textarea class="form-control" name="description"  rows="10"></textarea>
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