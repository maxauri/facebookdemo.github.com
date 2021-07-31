<?php
session_start();
$con = mysqli_connect('localhost','root','','facebook');
//login
$currentTime = date("h:i:sa");
$fname = $lname = $result = $fname = $src = $email = "";
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $select_query = "SELECT * FROM user";
    $fire = mysqli_query($con, $select_query) or die(mysqli_error($con));
    while($row = mysqli_fetch_assoc($fire)){
        if($row['email'] = $email && $row['password'] == $password){
        	$_SESSION['email'] = $email;
        	$result = "successfully login!";
        	//set cookie for re-login
            $fname = $row['fname'];
            $username = $row['fname']." ".$row['lname'];
            $src = $row['src'];
            setcookie("fname", $fname, time() + (86400 * 30), "/");
            setcookie("src", $src, time() + (86400 * 30), "/");
            setcookie("email", $email, time() + (86400 * 30), "/");
            setcookie("username", $username, time() + (86400 * 30), "/");
        	echo "<script>location.assign('main.php');</script>";
        	break;
        }
    }
}

if(isset($_POST['re_login'])){
	$email = $_COOKIE['email'];
	$password = $_POST['password'];
    $select_query = "SELECT * FROM user";
    $fire = mysqli_query($con, $select_query) or die(mysqli_error($con));
    while($row = mysqli_fetch_assoc($fire)){
        if($row['email'] = $email && $row['password'] == $password){
        	$_SESSION['email'] = $email;
        	$result = "successfully login!";
        	//set cookie for re-login
            $fname = $row['fname'];
            $username = $row['fname']." ".$row['lname'];
            $src = $row['src'];
            setcookie("fname", $fname, time() + (86400 * 30), "/");
            setcookie("src", $src, time() + (86400 * 30), "/");
            setcookie("email", $email, time() + (86400 * 30), "/");
            setcookie("username", $username, time() + (86400 * 30), "/");
        	echo "<script>location.assign('main.php');</script>";
        	break;
        }
    }
}
//signup
if(isset($_POST['signUp'])){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$year = $_POST['year'];
	$month = $_POST['month'];
	$day = $_POST['day'];
	$birth = $year.":".$month.":".$day;
	$src = "male.png";

	$gender = $_POST['optradio'];

	$insert_query = "INSERT INTO user(fname, lname, email, password, birth, gender,src) VALUES('$fname','$lname','$email','$password','$birth','$gender','$src')";
	if(mysqli_query($con,$insert_query)){
		$result = "Account created successfully!";
	}else{
		$result = "Failed to create Account!";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>facebook - Log in or Sign Up</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
        <script type="text/javascript" src="bootstrap/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css">    
</head>
<body style="overflow-y: hidden;">
<!-- preloader -->
<div id="loading"></div>
<div class="container login p-5">
	<div class="row">
		<div class="col-md-7 p-5">
			<h1 class="text-primary">facebook</h1>
			<h4>Recents Login</h4>
			<h6>Click your pictures or add an account</h6>
			<div class="row mt-4" id="re_login">
				<div class="card" id="card1" style="height: 13rem; width: 11rem; margin-left:5px;">
					<img class="card-img-top" src="post_img/<?php echo $_COOKIE['src']; ?>" height="160" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title text-center" style="margin-top: -10px;"><?php echo $_COOKIE['fname']; ?></h5>
					</div>
				</div>
				<div class="card" id="card2" style="height: 13rem; width: 11rem; margin-left:5px;background-color: #f1f1f1;overflow: hidden;">
					<img src="img/create_story.png" height="48" width="48" style="margin-top: 70px;margin-bottom: 40px;	 margin-left: 60px;">
					<div class="card-body bg-white">
						<h5 class="card-title text-center text-primary" style="margin-top: -10px;">Add Account</h5>
					</div>
				</div>

			</div>
		</div>
		<div class="col-md-5 text-center">
			<form method="post" id="form">
				<div class="row">
					<div class="col-md-12">
						<input type="text" id="email" name="email" placeholder="Email or Phone Number">
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<input type="password" id="password" name="password" placeholder="Password" required="">
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-md-12">
						<button class="btn btn-primary" name="login" id="login" required="">Log In</button>
						<span class="text-danger"><?php echo $result; ?></span>
					</div>
				</div>
				<a href="#">Forgot Password?</a><hr>
				<a href="#" class="btn" id="createNewAccount" name="createNewAccount" >Create New Account</a>
			</form>
			<p class="mt-4"><b>Create a Page</b> for a celebrity, band or business</p>
		</div>
	</div>
</div>
<!-- opacity cover curtains -->
<div class="container-fluid curtains"></div>
<!-- create new account model -->
<div class="container-fluid p-3" id="model">
	<h1>Sign Up</h1>
	<p id="p">it's quick and easy</p><hr>
	<form method="post" action="">
	<div class="row p-2">
		<div class="col-md-6">
			<input type="text" name="fname" id="fname" placeholder="First name" required="">
		</div>
		<div class="col-md-6">
			<input type="text" name="lname" id="lname" placeholder="Last name" required="">
		</div>
	</div>
	<!-- phone number -->
	<div class="row p-2">
		<div class="col-md-12">
			<input type="text" name="email" id="email" placeholder="Mobile number or email" required="">
		</div>
	</div>
	<!-- New Password -->
	<div class="row p-2">
		<div class="col-md-12">
			<input type="password" name="password" id="password" placeholder="New Password" required="">
		</div>
	</div>
	<!-- Birthday -->
	<div class="row mt-4 pl-2 pr-4">
		<p id="birthdate">Birthday</p>
		<!-- month -->
		<div class="col-md-4">
			<div class="input-group mb-3">
				<div class="input-group-prepend"></div>
				<select class="custom-select" id="month" name="month">
					<option selected>Month</option>
					<option value="Jan">Jan</option>
					<option value="Feb">Feb</option>
					<option value="Mar">Mar</option> 
					<option value="Apr">Apr</option> 
					<option value="May">May</option> 
					<option value="Jun">Jun</option> 
		
					<option value="Jul">Jul</option> 
					<option value="Aug">Aug</option> 
					<option value="Sept">Sept</option> 
					<option value="Oct">Oct</option> 
					<option value="Nov">Nov</option> 
					<option value="Dec">Dec</option> 
				</select>
			</div>
		</div>
		<!-- Day -->
		<div class="col-md-4">
			<div class="input-group mb-3">
				<div class="input-group-prepend"></div>
				<select class="custom-select" id="day" name="day">
					<option selected>Day</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option> 
					<option value="4">4</option> 
					<option value="5">5</option> 
					<option value="6">6</option> 
					<option value="7">7</option> 
					<option value="8">8</option> 
					<option value="9">9</option> 
				</select>
			</div>
		</div>
		<!-- month -->
		<div class="col-md-4">
			<div class="input-group mb-3">
				<div class="input-group-prepend"></div>
				<select class="custom-select" id="year" name="year">
					<option selected>Year</option>
					<option value="2000">2000</option>
					<option value="2001">2001</option>
					<option value="2002">2002</option> 
					<option value="2003">2003</option> 
					<option value="2004">2004</option> 
					<option value="2005">2005</option> 
					<option value="2006">2006</option> 
					<option value="2007">2007</option> 
					<option value="2008">2008</option> 
				</select>
			</div>
		</div>

	</div>

	<!-- Gender -->
	<div class="row mt-4 pl-2 pr-4" id="gender">
		<p id="birthdate">Gender</p>
		<!-- Male -->
		<div class="col-md-4">
			<div class="radio">
				<label>Male</label><input type="radio" value="male" name="optradio" checked>
			</div>
		</div>
		<!-- Female -->
		<div class="col-md-4">
			<div class="radio">
				<label>Female</label><input type="radio" value="female" name="optradio" checked>
			</div>
		</div>
		<!-- Customs -->
		<div class="col-md-4">
			<div class="radio">
				<label>Customs</label><input type="radio" value="gay" name="optradio" checked>
			</div>
		</div>


	</div>
    <p id="terms">By clicking Sign Up. you agree to our Terms. Date Policy and Cookies Policy. You may recieve SMS Notification from us and can opt at any time.</p>
    <input type="submit" class="btn mb-3 signUp"  id="createNewAccount" name="signUp"></input>
</form>
</div>
<?php  ?>

<!-- reform login -->
    <div class="re_login_form">
	<form method="post" id="re_login_form">
		<img src="img/cancel.png" id="cancel"><br><br>
		<img src="post_img/<?php echo $_COOKIE['src']; ?>" class="rounded-circle mb-1" height="150" width="150">
		<h4 class="pb-4"><?php echo $_COOKIE['username'];  ?></h4>
		<div class="row">
			<div class="col-md-12">
				<input type="password" id="password" name="password" placeholder="Password" required="">
			</div>
		</div>
		<div class="row mb-3">
			<div class="col-md-12">
				<button class="btn btn-primary" name="re_login" id="login" required="">Log In</button>
				<span class="text-danger"><?php echo $result; ?></span>
			</div>
		</div>
		<a href="#">Forgot Password?</a>
	</form>
</div>
<p id="data" style="visibility: hidden;"><?php echo $_COOKIE['email'];  ?></p>
</body>
<script type="text/javascript" src="js/script.js"></script>
     <script src="https://use.fontawesome.com/e9241f93d8.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://kit.fontawesome.com/eba070197c.js" crossorigin="anonymous"></script>
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<script>
//preloader
setTimeout(function(){
    $('#loading').fadeToggle();
},500);

//hide relogin bar if there is no cookie
var data = $('#data').text();
var err = "Notice";
var res = data.search(err);
if(res>0){
	$('#card1').css('visibility','hidden');
	$('#card2').css('visibility','hidden');
}
//re_login
$('#re_login_form').css('visibility','hidden');
$('#re_login').click(function(){
	$('#email').text(data);
	$('.curtains').css('visibility','visible');	
	$('#re_login_form').css('visibility','visible');
})
$('#re_login_form #cancel').click(function(){	
	location.assign('index.php');
})
//model form retrieve and submission to database
$('#login').click(function(){
	 var email = $('#email').val();
	 var password = $('#password').val();
	//sending to php
	$.ajax({
		url:'main.php',
		type:'post',
		data:{data:true, email, password},
		success:function(data){
			
		}
	})
})


$('#createNewAccount').click(function(){
$('#model').css('visibility','visible');
$('.curtains').css('visibility','visible');
})
$('.curtains').click(function(){
$("#model").css('visibility','hidden');
$('.curtains').css('visibility','hidden');
location.assign('index.php')
})
</script>
</html>