<?php include("template/header.php");
	  include("template/nav.php");
	  $sql = "SELECT * FROM user JOIN courses ON courses.course_id = user.course_id
	  JOIN modules ON courses.course_id = modules.course_id
	  WHERE  user_id = '".$_SESSION['st_id']."'";

	 $query = mysqli_query($con,$sql);
	 $userRow = mysqli_fetch_assoc($query);
	
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
                                           <!-- <img src="image/avatar.jpg" alt="">-->
                                        </div>
                                    </div>
                                    <div class="posttext pull-left">
                                      
                                        <p><h1 class="h1-course">Hi , <?php echo $_SESSION['std_firstName']; echo '&nbsp;'.$_SESSION['std_lastName']; ?>   </h1></p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
								
								<div class="col-sm-5 col-md-8">
												<div class="user-left">
													<table class="table table-condensed table-hover">
														<thead>
															<tr>
																<th >Profile Information</th>
															</tr>
														</thead>
														<tbody>
															
															<tr>
																<td>First Name:</td>
																<td>
																	<?php echo $userRow['user_firstname'];  ?>
																</td>
																<td>Last Name:</td>
																<td><?php echo $userRow['user_lastname'];  ?></td>
															</tr>
															<tr>
																<td>email:</td>
																<td>
																<a href="">
																	<?php echo $userRow['user_email'];  ?>
																</a></td>
															
															</tr>
															<tr>
																<td>Couser Name</td>
																<td><?php echo $userRow['course_name'];  ?></td>
																	
															</tr>
															<tr>
																<td>Modules(Subject) Name</td>
																<td><?php echo $userRow['module_name'];  ?></td>
																	
															</tr>
															<tr>
																<td>Change Password</td>
																<td><a href="chagnepassword.php">Click to change</a></td>
																	
															</tr>
															
															
														</tbody>
													</table>
													
												
												</div>
											</div>
								
                                <div class="clearfix"></div>
                            </div><!-- POST -->
							
							
							
                        </div>
</div>
<?php include("template/footer.php"); ?>