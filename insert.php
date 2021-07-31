<?php
session_start();
$con = mysqli_connect('localhost','root','','facebook');	
$email = $fname = $lname = $username = $profile_src = "";
$email = $_SESSION['email'];
$select_query = "SELECT * FROM user";
$fire = mysqli_query($con,$select_query);
while($row = mysqli_fetch_assoc($fire)){
	if($row['email'] == $_SESSION['email']){
		$fname = $row['fname'];
		$lname = $row['lname'];
		$username = $fname." ".$lname;
		$profile_src = $row['src'];
	}
}

//insert_queru

if(isset($_POST['post'])){
	$file = $_FILES['file']['name'];
	$caption = $_POST['caption'];
	//time
	date_default_timezone_set("Asia/Kathmandu");
    $time = date('h:ia');

    //move to file
    $temp_file = $_FILES['file']['tmp_name'];
    move_uploaded_file($temp_file, 'post_img/'.$file);

	//insert query
	$insert_query = "INSERT INTO post(username,time, caption, src,profile_src,email) VALUES('$username','$time', '$caption', '$file','$profile_src','$email')";
	if(mysqli_query($con,$insert_query)){
		echo "<script>location.assign('main.php');</script>";	
	}else{
		die(mysqli_error($con));
	}
}
?>