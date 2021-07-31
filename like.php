<?php 
$con = mysqli_connect('localhost','root','','facebook');
if(isset($_GET['uid'])){
	$id = $_GET['uid'];
	echo $id;	
	$insert = "INSERT INTO like(email) VALUES('$id')";
	if(mysqli_query($con,$insert)){
		echo "inserted";
	}else{
		echo "failed";
	}
}
?>