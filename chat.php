<?php include("template/header.php");
	  include("template/nav.php");
	  
		$topic_id = $_GET['id'];
		$sql = "SELECT * FROM `topics` JOIN modules ON topics.module_id = modules.module_id 
		JOIN courses ON modules.course_id = courses.course_id 
		  WHERE  topics.topic_id = '".$topic_id."' ";
		$query = mysqli_query($con,$sql);
		$row = mysqli_fetch_assoc($query);
		$topic_title = $row['topic_title'];
		$topic_desc = $row['topic_des'];
		$create_date  = $row['date_created'];
//.........For saving the discussion data
if(isset($_POST['submitcomment'])){
		$comment 		= $_POST['user_comment'];
		$user_id 		= $_SESSION['st_id'];
		$topic_id 		= $_POST['topic_id'];
		$created_date	= date('d:m:Y h:m:s'); 
		$sql = "INSERT INTO discussion  (topic_id , user_id , comment 	,created_date  ) VALUES
		( '".$topic_id."' , '".$user_id."' ,'".$comment."' ,'".$created_date."') ";
		$query = mysqli_query($con,$sql);
		header("location:chat.php?id=".$topic_id);
		
		
		
}
	
 ?>


<div class="container-fluid text-center"> 
<div class="content">
    <?php include("news.php"); ?>
    <div class="text-left"> 

      <div class="course-line"></div>
         <!-- Custom -->
        <link href="css/custom.css" rel="stylesheet">

					
                        <div class="col-lg-8 col-md-8">
						 <div class="post">
                                <div class="wrap-ut pull-left">
                                    <div class="userinfo pull-left">
                                        <div class="avatar">
                                            <!--<img src="image/avatar.jpg" alt="">-->
											<?php  echo $_SESSION['std_firstName']; ?>
                                            <div class="status green">&nbsp;</div>
                                        </div>
                                    </div>
                                    <div class="posttext pull-left">
                                      
                                        <p><b>Title  : <?php echo $topic_title; ?></b></p>
										<p><b>Description  : <?php echo $topic_desc; ?></b></p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                               
                                <div class="clearfix"></div>
                            </div><!-- POST -->
							
                            <!-- POST -->
							<?php 
								$dis = "SELECT * FROM discussion JOIN user ON discussion.user_id = user.user_id 
								WHERE topic_id = '".$topic_id."'";
								$disquery = mysqli_query($con,$dis);
								while($disrow = mysqli_fetch_assoc($disquery)){
							?>
                            <div class="post">
                                <div class="wrap-ut pull-left">
                                    <div class="userinfo pull-left">
                                        <div class="avatar">
                                            <!--<img src="image/avatar.jpg" alt="">-->
											<?php  echo $disrow['user_firstname']; ?>
                                            <div class="status green">&nbsp;</div>
                                        </div>
                                    </div>
                                    <div class="posttext pull-left">
                                      
                                        <p><?php echo $disrow['comment']; ?></p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                
                                <div class="clearfix"></div>
                            </div><!-- POST -->
							<?php } ?>
							<?php 
								if(isset($_SESSION['st_id'])){  ?>
							<!-- POST -->
                            <div class="post">
                                <div class="wrap-ut pull-left">
                                    <div class="userinfo pull-left">
                                        <div class="avatar">
                                           <!-- <img src="image/avatar.jpg" alt="">-->
										   <?php  echo $_SESSION['std_firstName']; ?>
                                            <div class="status red">&nbsp;</div>
                                        </div>
                                    </div>
									<form method="POST" action="" >
                                    <div class="posttext pull-left">
                                       <input type="hidden" name="topic_id" value="<?php echo $topic_id; ?>" />
                                        <p style="text-align:right;"><textarea class="ta10" name="user_comment"  placeholder="Place a new comment..!" cols="105" rows="5" ></textarea></p>
										<br />
										<button type="submit" name="submitcomment"  class="btn btn-primary">Submit </button>
                                    </div></form>
                                    <div class="clearfix"></div>
										
                                </div>
                               
                                <div class="clearfix"></div>
                            </div><!-- POST -->
							
								<?php } ?>
							
							
							
							

                        </div>
                 
	  
	  
	  
</div>
<?php include("template/footer.php"); ?>