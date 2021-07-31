<?php  
session_start();
$con = mysqli_connect('localhost','root','','facebook');
$id = $email = "";
if(isset($_POST['upload'])){
	$file = $_FILES['file']['name'];
	$tmp_name = $_FILES['file']['tmp_name'];
	move_uploaded_file($tmp_name, 'post_img/'.$file);
}
$email = $_SESSION['email'];
$post_query = "UPDATE post SET profile_src = '$file' WHERE email = '$email'";
$query = "UPDATE user SET src = '$file' WHERE email = '$email'";
//profile pic update
 if(mysqli_query($con, $query)){
    echo "Profile Pic Udated";
    mysqli_query($con,$post_query);
    echo "<script>location.assign('main.php');</script>";
 }else{
    echo "Failed to updated";
 }
?>