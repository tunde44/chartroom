<?php include("template/header.php");
	  include("template/nav.php");

	  if(isset($_SESSION['st_id'])){ }else{
		  
		header("location:login.php");
	  }	
 ?>


<div class="container-fluid text-center"> 
<div class="row content">
    <?php include("news.php"); ?>
    <div class="col-sm-5 text-left"> 
	<?php 
	 if(isset($_SESSION['st_id'])){
		 $user_id = $_SESSION['st_id'];
		// $sql = "SELECT * FROM courses JOIN modules ON modules.course_id = courses.course_id
		//	JOIN user ON modules.teacher_id = user.user_id WHERE user.user_id = '".$user_id."'
		// ";
			
			$sql = "SELECT * FROM courses JOIN  user ON user.course_id = courses.course_id 
			WHERE user.user_id = '".$user_id."'
		 ";
		
			$result = mysqli_query($con,$sql);
			$records = mysqli_num_rows($result);
			$row = mysqli_fetch_array($result);
			if ($records==0)
			{
				$user_course = "";
			}else{
				
				$user_course = $row['course_name'];
			}
	 }
	?>
	
      <h1 class="h1-course"><?php echo $user_course; ?></h1>
      <div class="course-line"></div>
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
							$sql = "SELECT * FROM `topics` JOIN modules ON topics.module_id = modules.module_id
							JOIN user ON user.course_id = modules.course_id  WHERE topic_status = '1' 
							AND user.user_id = '".$_SESSION['st_id']."'	ORDER BY topics.topic_id DESC";
						
						//AND user.role_user = 'teacher'
							$query = mysqli_query($con,$sql);
							if(mysqli_num_rows($query)== 0){
							}else{
								while($row = mysqli_fetch_assoc($query)){
				?>
				<tr>
					<td class="firsttd"><?php echo $row['module_name']; ?></td>
					<td class="secondtd">
					<?php 
						$te = mysqli_query($con,"SELECT * from user JOIN 
						modules ON modules.course_id = user.module_id 
						WHERE user.role_user = 'teacher' ");
						$teacher = mysqli_fetch_assoc($te);
						
					?>
					<?php echo $teacher['user_firstname']; ?></td>
					<td class="secondtd"><?php echo $row['topic_title']; ?></td>
					<?php  if(isset($_SESSION['st_id'])){ ?>
					<td class="secondtd"><a href="chat.php?id=<?php echo $row['topic_id'] ?>">Start Chat</a></td>
					<?php }else{ ?>
					<td class="secondtd"><a href="login.php">Start Chat</a></td>
					<?php } ?>
				</tr>
							<?php } 
							}
							?>
			</tbody>
		</table>
</div>
<?php include("template/footer.php"); ?>