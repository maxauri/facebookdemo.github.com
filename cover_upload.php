<?php  
session_start();
$con = mysqli_connect('localhost','root','','facebook');
$id = $email = $file = "";
if(isset($_POST['csrc_btn'])){
	$file = $_FILES['cover_upload']['name'];
	$tmp_name = $_FILES['cover_upload']['tmp_name'];
	move_uploaded_file($tmp_name, 'post_img/'.$file);
}
$email = $_SESSION['email'];
$query = "UPDATE user SET cover_src = '$file' WHERE email = '$email'";
 if(mysqli_query($con, $query)){
    echo "cover Pic Udated";
    echo "<script>location.assign('main.php');</script>";	
 }else{
    echo "Failed to updated";
 }
?>