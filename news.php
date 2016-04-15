<div class="col-sm-4 sidenav">
       <h3 class="h3-news">News</h3>
       <div class="newline"></div>
      <?php 
	$sql = "SELECT * FROM news WHERE news_status = 'Active' ";
	$query = mysqli_query($con,$sql);
	while($row = mysqli_fetch_assoc($query)){
?>	  
      <div class="well">
        <p class="well-p"><?php echo $row['news_text']; ?> <a href="" class="read-red">[read more]</a> </p>
      </div>
	<?php } ?>
      
          <a href="" class="viewmore">View more</a>
      
    </div>