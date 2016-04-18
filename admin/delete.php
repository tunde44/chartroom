<?php 
$title = $_GET['title'];
//....For connection to data Base
include("../config/connection.php");
if($title == "course"){
	$sql = "DELETE from courses WHERE course_id = '".$_GET['id']."' ";
	$query = mysqli_query($con,$sql);
	header("location:course.php");
}else if ($title == "student"){
	$sql = "DELETE from user WHERE user_id = '".$_GET['id']."' ";
	$query = mysqli_query($con,$sql);
	header("location:student.php");
}else if ($title == 'teacher'){
	$sql = "DELETE from user WHERE user_id = '".$_GET['id']."' ";
	$query = mysqli_query($con,$sql);
	header("location:teacher.php");
}else if ($title == 'topic'){
	$del = $_GET['id'];
	$sql = "DELETE from topics WHERE topic_id = '".$_GET['id']."' ";
	$query = mysqli_query($con,$sql);
	$sql_dis = "DELETE from discussion WHERE topic_id = '".$del."' ";
	$query = mysqli_query($con,$sql_dis);
	header("location:topic.php");	
}else if($title == 'module'){
	$sql = "DELETE from module WHERE module_id = '".$_GET['id']."' ";
	$query = mysqli_query($con,$sql);
	header("location:module.php");	
	
}else if($title == 'news'){
	$sql = "DELETE from news WHERE news_id = '".$_GET['id']."' ";
	$query = mysqli_query($con,$sql);
	header("location:news.php");	
	
}
?>