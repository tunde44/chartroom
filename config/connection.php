<?php
//My sql connection 
$server = "localhost";
$username = "root";
$databaseName = "chatforum";
$con = mysqli_connect($server , $username , "");
$db = mysqli_select_db($con,$databaseName);  


?>