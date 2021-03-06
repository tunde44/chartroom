<?php include("template/header.php"); ?>
	<?php include("template/sidebar.php"); ?>
	<script type="text/javascript">
		$(function() {
			$("table").tablesorter({debug: true})
		});
	</script>	
	
	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="dashboard.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Cources</li>
			</ol>
		</div><!--/.row-->
		<br />
		<div style="text-align:right">
			<a href="addedit_course.php"><button type="button" class="btn btn-success">New Course</button></a>
		</div><br />
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Course Management</div>
					<div class="panel-body">
						<table id="myTable" class="tablesorter"> 
						<thead> 
						<tr> 
							<th>Course Name</th> 
							<th>Course Code</th> 
							<th>Option</th> 
						</tr> 
						</thead> 
						<tbody> 
						<?php
							$sql = "SELECT * FROM courses ORDER by course_id DESC ";
							$query = mysqli_query($con,$sql);
							if(mysqli_num_rows($query)== 0){
								?>
								<tr> 
										<td>No course found</td> 
									</tr> 
					<?php
						}else{
							while($row = mysqli_fetch_assoc($query)){
						?>
						<tr style="border-bottom:1px solid #8DBDD8;"> 
							<td><?php echo $row['course_name']; ?></td> 
							<td><?php echo $row['course_code']; ?></td> 
							<td><a href="delete.php?title=course&id=<?php echo $row['course_id']; ?>">Delete</a></td> 
							
						</tr> 
						<?php }	 
						}
						?>
						</tbody> 
						</table> 
					</div>
				</div>
			</div>
		</div><!--/.row-->	
	
		
	</div><!--/.main-->
	
<?php include("template/footer.php"); ?>