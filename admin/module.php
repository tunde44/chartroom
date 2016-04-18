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
				<li class="active">Modules (Subject)</li>
			</ol>
		</div><!--/.row-->
		<br />
		<div style="text-align:right">
			<a href="addedit_module.php"><button type="button" class="btn btn-success">New Module</button></a>
		</div><br />
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Modules Management</div>
					<div class="panel-body">
						<table id="myTable" class="tablesorter"> 
						<thead> 
						<tr> 
							<th>Module Name</th> 
							<th>Module Code</th> 
							<th>Course Name</th>
							<th>Teacher Name</th>
							<th>Option</th> 
						</tr> 
						</thead> 
						<tbody> 
						<?php
							$sql = "SELECT * FROM modules JOIN courses ON modules.course_id = courses.course_id  ORDER by module_id DESC ";
							//JOIN user ON  user.user_id = modules.teacher_id where role_user = 'teacher'
							$query = mysqli_query($con,$sql);
							if(mysqli_num_rows($query)== 0){
								?>
								<tr> 
										<td>No Module(Subject) found</td> 
									</tr> 
					<?php
						}else{
							while($row = mysqli_fetch_assoc($query)){
						?>
						<tr style="border-bottom:1px solid #8DBDD8;"> 
							<td><?php echo $row['module_name']; ?></td> 
							<td><?php echo $row['module_code']; ?></td> 
							<td><?php echo $row['course_name']; ?></td> 
							<td><?php ///echo $row['user_firstname']; ?></td> 
							<td><a href="delete.php?title=module&id=<?php echo $row['module_id']; ?>">Delete</a></td> 
							
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