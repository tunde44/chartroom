<?php include("template/header.php");
	  include("template/nav.php");
	 
	  if(isset($_POST['search_text'])){
		   $text = $_POST['search_text'];
	  //...Query for student search
	  $sql_st = "SELECT * FROM user WHERE user_firstname like '%$text%' AND role_user = 'student' ";
	  $res_st = mysqli_query($con,$sql_st);
	  $records_st = mysqli_num_rows($res_st);
	  $row_st = mysqli_fetch_array($res_st);
	  
	   //...Query for teacher search
	  $sql_te = "SELECT * FROM user WHERE user_firstname like '%$text%' AND role_user = 'teacher' ";
	  $res_te = mysqli_query($con,$sql_te);
	  $records_te = mysqli_num_rows($res_te);
	  $row_te = mysqli_fetch_array($res_te);
	  
	   //...Query for Topic search
	  $sql_top = "SELECT * FROM `topics` JOIN modules ON topics.module_id = modules.module_id
			JOIN user ON user.course_id = modules.course_id  WHERE topic_status = '1' 
			AND topics.topic_title like '%$text%'  	ORDER BY topics.topic_id DESC";
	  $res_top     = mysqli_query($con,$sql_top);
	  $records_top = mysqli_num_rows($res_top);
	  
	  
 ?>

<div class="container-fluid text-center"> 
<div class="row content">
    <?php include("news.php"); ?>
    <div class="col-sm-5 text-left"> 
	 <h1 class="h1-course"><?php if(isset($text)){  echo $text; } ?></h1>
      <div class="course-line"></div>
	  <?php if($records_top >  0 ){ ?>
     <table class="course" style="height:176px;">
			<thead>
				<tr>
					<th style="width: 195px;">Modules</th>
					<th>Teacher</th>
					<th>Topic</th>
					<th>Discussion</th>
				</tr>
			</thead>
			<tbody>
			<?php
								while($row =  mysqli_fetch_array($res_top)){
				?>
				<tr>
					<td class="firsttd"><?php echo $row['module_name']; ?></td>
					<td class="secondtd"><?php echo $row['user_firstname']; ?></td>
					<td class="secondtd"><?php echo $row['topic_title']; ?></td>
					<?php  if(isset($_SESSION['st_id'])){ ?>
					<td class="secondtd"><a href="chat.php?id=<?php echo $row['topic_id'] ?>">Start Chat</a></td>
					<?php }else{ ?>
					<td class="secondtd"><a href="login.php">Start Chat</a></td>
					<?php } ?>
				</tr>
							<?php } 
							?>
			</tbody>
		</table>
	  <?php }else{ ?>
		 <table class="course" style="height:176px;">
			<thead>
				<tr>
					<th style="width: 100%;">No record found..!</th>
					
				</tr>
			</thead>
			<tbody>
			
			</tbody>
		</table>
		 <?php
	  } ?>
		
		
</div>

<?php }else{
	header("location:index.php");
}	?>
<?php include("template/footer.php"); ?>