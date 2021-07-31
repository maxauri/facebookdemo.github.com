<?php 
$class = "";
$time = time();
$con = mysqli_connect('localhost','root','','facebook');
$fname = $lname = $username = $profile_src = "";//Login
$select_query = "SELECT * FROM user";
$fire = mysqli_query($con, $select_query) or die(mysqli_error($con));
while($row = mysqli_fetch_assoc($fire)){
   if($row['active_time']>$time){
     $class = "btn-success";
   }else{
    $class = "btn-secondary";
   }
?>

<div class="row mb-2 active_profile">       
    <div class="col-md-2">
        <img src="post_img/<?php echo $row['src']; ?>" id="user_profile_pic">
        <div class="<?php echo $class; ?>" style="height: 10px;width: 10px;border-radius: 100%;margin-left: 33px;margin-top: -15px;"></div>
    </div>
    <div class="col-md-10" style="margin-left: -5px;">
        <h6 class="mt-2" id="activerUser" id="<?php echo $row['id']; ?>"><?php echo $row['fname']." ".$row['lname']; ?></h6>
    </div>
</div>
<?php } ?>

