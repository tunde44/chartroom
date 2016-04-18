 <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a href="index.php"><div class="navbar-brand"><img src="image/logo.png" alt="No Logo"  /></div></a>
    </div>
    <ul class="nav navbar-nav">
	 <?php 
	  session_start();
	  if(isset($_SESSION['st_id'])){  ?>
      <li class="profile"><a href="profile.php" class="p-text">PROFILE</a></li>
      <li><a href="index.php">COURSES</a></li>
	   <li><a href="http://localhost/thetabook/login.php">book app</a></li>
      <li class="logout"><a href="#"><?php echo $_SESSION['std_firstName']; ?> </a></li>
      <li><a href="logout.php" class="colorlg">LOGOUT</a></li> 
	  
	  <?php }else{ ?>
	  <li class="logout"><a href="#">&nbsp;</a>
	   <li><a href="login.php" class="colorlg">Login</a></li> 
	  <?php  } ?> 
    </ul>
  </div>
</nav>

<div class="jumbotron">
  <div class="container text-center">
    <form role="form" method="POST" action="search.php">
  <div class="form-group">
    <input type="text" value="<?php if(isset($_POST['search_text'])){ echo $_POST['search_text']; } ?>" class="form-control" name="search_text" id="search" placeholder="Search">
  </div>
  <button type="submit" class="btn btn-default">SEARCH</button>
</form>    
  </div>
</div>