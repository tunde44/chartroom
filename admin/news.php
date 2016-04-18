<?php include("template/header.php"); ?>
		
	<?php include("template/sidebar.php"); ?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="dashboard.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">News</li>
			</ol>
		</div><!--/.row-->
		<br />
		<div style="text-align:right">
			<a href="newnews.php"><button type="button" class="btn btn-success">News Creation</button></a>
		</div><br />
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">News Management</div>
					<div class="panel-body">
						<table id="myTable" class="tablesorter"> 
							<thead> 
						   thead> 
							<tr> 
								<th>News Ttile</th>
						        <th >News</th>
						    </tr>
						    </thead>
							<tbody> 
						<?php
							$sql = "SELECT * FROM news WHERE news_status = 'Active' order by news_id ";
							//JOIN user ON  user.user_id = modules.teacher_id where role_user = 'teacher'
							$query = mysqli_query($con,$sql);
							if(mysqli_num_rows($query)== 0){
								?>
								<tr> 
										<td>No News found</td> 
									</tr> 
					<?php
						}else{
							while($row = mysqli_fetch_assoc($query)){
						?>
						<tr style="border-bottom:1px solid #8DBDD8;"> 
							<td><?php echo $row['news_title']; ?></td> 
							<td><?php echo $row['news_text']; ?></td>
							<td><a href="delete.php?title=news&id=<?php echo $row['news_id']; ?>">Delete</a></td> 
							
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