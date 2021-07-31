<?php 
$con = mysqli_connect('localhost','root','','facebook');
$select_query = "SELECT * FROM comment";
$fire = mysqli_query($con, $select_query);
while($row = mysqli_fetch_assoc($fire)){   
?>
<div class="row mt-2 commentText">
<div class="col-md-2">
<img src="post_img/<?php echo $row['src']; ?>" class="rounded-circle" height="36" width="36">
</div>
<div class="col-md-10">
<h6 class="ml-1"><?php echo $row['name']; ?></h6>
<p class="mt-4"><?php  echo $row['cmnt']; ?></p>
</div>
</div> 
<?php } ?> 