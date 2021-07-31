<?php 
session_start();
$con = mysqli_connect('localhost','root','','facebook');
$id = $_SESSION['email'];
$time = time() + 10;
$fire = mysqli_query($con, "UPDATE user SET active_time = '$time' WHERE email = '$id'");
?>