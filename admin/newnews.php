<?php include("template/header.php"); 
if(isset($_POST['submitnews'])){
	$news_title		= $_POST['news_title'];
	$news_desc 	 	= $_POST['description'];
	$sql = "INSERT INTO news  (news_title , news_text ,news_status ) VALUES ( '".$news_title."' , '".$news_desc."' , '1') ";
	$query = mysqli_query($con,$sql);
	header("location:news.php");
}
?>
	<?php include("template/sidebar.php"); ?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="news.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">News</li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">News Creation</div>
					<div class="panel-body">
						<div class="col-md-6">
							<form role="form" method="POST" action="" >
							
								<div class="form-group">
									<label>Title</label>
									<input class="form-control" name="news_title" placeholder="News Title">
								</div>
								
								<div class="form-group">
									<label>News Description</label>
									<textarea class="form-control" name="description"  rows="10"></textarea>
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