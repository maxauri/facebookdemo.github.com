<?php 
session_start();
$con = mysqli_connect('localhost','root','','facebook');
$fname = $lname = $username = $profile_src  = $time = $cover_src = $emptyPost = "";//Login
$time = time();
$Email = $_SESSION['email'];
$select_query = "SELECT * FROM user";
$fire = mysqli_query($con, $select_query) or die(mysqli_error($con));
while($row = mysqli_fetch_assoc($fire)){
if($row['email'] == $_SESSION['email']){
$cover_src = $row['cover_src'];
$fname = $row['fname'];     
$lname = $row['lname'];
$username = $fname." ".$lname;
$profile_src = $row['src'];
break;
}
}

//comment insertion
// if(isset($_POST['send'])){
//     $cmnt = $_POST['comment_section'];
//     $id = $_POST['post_id'];
//     $insert = "INSERT INTO comment(post_id,name, src, email, cmnt) VALUES('$id', '$username', '$profile_src', '$Email', '$cmnt')";
//     if(strlen($cmnt) != 2){
//         mysqli_query($con,$insert) or die(mysqli_error($con));
//     }
// }
?>
<html>
<head>
<title>facebook</title>
<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
<script type="text/javascript" src="bootstrap/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css">    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
<!-- preloader -->
<div id="loading"></div>
<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white">
     <img class="navbar-brand" id="fb_logo" src="img/fb_logo.png">
     <img class="navbar-brand" id="back" src="img/back.png">
     <img src="img/search.png" class="img-fluid" id="search_icon">
     <input type="text" id="search_bar" placeholder="Search Facebook">
     <img id="home" src="img/home.png" onclick="home_click()" />
     <img id="tv" src="img/tv.png" onclick="tv_click()" />
     <img id="friend" src="img/friend.png" onclick="friend_click()" />
     <img id="news" src="img/news.png" onclick="news_click()" />
     <div id="user_profile">
        <img id="user_profile_pic" src="post_img/<?php echo $profile_src; ?>" onclick="profile()">
     </div>
     <h6 id="username" class="mt-2 ml-2 mr-3" height="41" width="43"><?php echo $fname; ?></h6>
     <img src="img/plus.png" class="ml-2">
     <img src="img/message.png" class="ml-2" onclick="messageOpen()">
     <img src="img/notification.png" class="ml-2">
     <img src="img/down.png" id="down" onclick="down()" class="ml-2">
     
    </nav>

<!-- container -->
<div class="container-fluid main_body" id="container">
    <div class="row">

        <!-- setting -->
        <div class="col-md-3 setting">
            <!-- personal setting    -->
            <div class="container">
                <div class="row mt-3 pt-2 pb-2">
                    <div class="col-md-2">
                        <img src="post_img/<?php echo $profile_src; ?>" id="user_profile_pic">
                    </div>
                    <div class="col-md-10">
                        <h6 id="Username"><?php echo $username; ?></h6>
                    </div>
                </div>
            </div>
            <!-- COVID-19 -->
            <div class="container">
                <div class="row pt-2 pb-2">
                    <div class="col-md-2">
                        <img src="img/covid.png" id="user_profile_pic">
                    </div>
                    <div class="col-md-10">
                        <h6>COVID-19 Information Center</h6>
                    </div>
                </div>
            </div>
            <!-- FRIEND -->
            <div class="container">
                <div class="row pt-2 pb-2">
                    <div class="col-md-2">
                        <img src="img/friend_icon.png" height="30" width="30">
                    </div>
                    <div class="col-md-10">
                        <h6>Friends</h6>
                    </div>
                </div>
            </div>
            <!-- Groups -->
            <div class="container">
                <div class="row pt-2 pb-2">
                    <div class="col-md-2">
                        <img src="img/group_icon.png" id="user_profile_pic">
                    </div>
                    <div class="col-md-10">
                        <h6>Groups</h6>
                    </div>
                </div>
            </div>
            <!-- Videos -->
            <div class="container">
                <div class="row pt-2 pb-2">
                    <div class="col-md-2">
                        <img src="img/video_icon.png">
                    </div>
                    <div class="col-md-10">
                        <h6>Videos</h6>
                    </div>
                </div>
            </div>
            <!-- Events -->
            <div class="container">
                <div class="row pt-2 pb-2">
                    <div class="col-md-2">
                        <img src="img/event.png">
                    </div>
                    <div class="col-md-10">
                        <h6>Events</h6>
                    </div>
                </div>
            </div>
            <!-- See More -->
            <div class="container" id="groups">
                <div class="row pt-2 pb-2">
                    <div class="col-md-2">
                        <img src="img/down_icon.png">
                    </div>
                    <div class="col-md-10">
                        <h6 class="mt-2" name="logout">See More</h6>
                    </div>
                </div>
            </div>

            <!-- shortcuts -->
            <div class="container-fluid shortcuts">
                <h6 class="mt-2">Your Shortcuts</h6>
                <div class="row pt-2 pb-2">
                    <div class="col-md-2">
                        <img src="img/flutter.png" id="user_profile_pic">
                    </div>
                    <div class="col-md-10">
                        <h6>Flutter Developer</h6>
                    </div>
                </div>
                <div class="row pt-2 pb-2">
                    <div class="col-md-2">
                        <img src="img/coder.png" id="user_profile_pic">
                    </div>
                    <div class="col-md-10">
                        <h6>Flutter Community Nepal</h6>
                    </div>
                </div>
                <div class="row pt-2 pb-2">
                    <div class="col-md-2">
                        <img src="img/meme.jpg" id="user_profile_pic">
                    </div>
                    <div class="col-md-10">
                        <h6>ThugLife -Memes</h6>
                    </div>
                </div>
                <div class="row pt-2 pb-2">
                    <div class="col-md-2">
                        <img src="img/omg.png" id="user_profile_pic">
                    </div>
                    <div class="col-md-10">
                        <h6>OMG</h6>
                    </div>
                </div>
                <div class="row pt-2 pb-2">
                    <div class="col-md-12">
                        <p style="font-size: 13px; color: #333; font-weight: lighter;">Privacy .Terms .Advertising .Ad Choices<br>.Cookies .More .Facebook @2020</p>
                    </div>
                </div>

            </div>


        </div>
        

        <!-- newsfeed post -->
        <div class="col-md-6 newsfeed">
            <!-- day story -->
            <div class="container story">
                <div class="row"> 
                    <div class="col-md-3 s1">
                        <div class="bg-white">
                            <img src="img/cartoon.jpg" id="create_story">
                            <img src="img/create_story.png" id="create_story_icon">
                            <h6 class="text-center mt-4 pl-1">Create a <br>story</h6>
                        </div>
                    </div>
                    <div class="col-md-3 s2">
                        <img src="https://i.pinimg.com/originals/b1/32/cb/b132cb6e562fef08f3e9457f1b750f38.jpg" class="img-fluid">
                        <img src="https://i.pinimg.com/originals/b1/32/cb/b132cb6e562fef08f3e9457f1b750f38.jpg" id="user_profile_pic">
                        <h6 id="story_title">Bishworaj Poudel</h6>
                    </div>
                    <div class="col-md-3 s3">
                        <img src="https://i.pinimg.com/originals/e9/a5/ab/e9a5abcd9f2c6fa5334769fe4fd5ea63.jpg" class="img-fluid">
                        <img src="https://i.pinimg.com/originals/e9/a5/ab/e9a5abcd9f2c6fa5334769fe4fd5ea63.jpg" id="user_profile_pic">
                        <h6 id="story_title">Rohit Giri</h6>
                    </div>
                    <div class="col-md-3 s4">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRmqPR49N4A7OZYYvEJUtaz3mthJsARq0acvg&usqp=CAU" class="img-fluid">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRmqPR49N4A7OZYYvEJUtaz3mthJsARq0acvg&usqp=CAU" id="user_profile_pic">
                        <h6 id="story_title">Srabesh Basnet</h6>
                        <img src="img/next.png" id="next_icon">
                    </div>
                </div>
            </div>
            <!-- create new status -->
            <div class="statusbar mb-3 bg-white">
                <div class="row input p-3">
                    <div class="col-md-2">
                        <img src="post_img/<?php echo $profile_src; ?>" id="user_profile_pic">
                    </div>
                    <div class="col-md-10">
                        <input type="text" id="statusbar_input" name="" placeholder="What's on your mind, Parbhat?" onclick="create_post()">
                    </div>
                </div>
                <div class="row statusbar_btm text-center">
                    <div class="col-md-4">
                        <img src="img/camera.png" class="img-fluid mr-5">
                        <h6 class="ml-3 pl-5">Live Video</h6>
                    </div>
                    <div class="col-md-4">
                        <img src="img/gallery.png" class="img-fluid mr-5 pr-5">
                        <h6 class="ml-3 pl-4">Photo/Video</h6>
                    </div>
                    <div class="col-md-4 pr-5 ">
                        <img src="img/smile.png" class="img-fluid mr-5 pr-5">
                        <h6 class="ml-4 pl-2">Feeling/Activity</h6>
                    </div>
                </div>
            </div>

            <?php
            $con = mysqli_connect('localhost','root','','facebook');
            $select_query = "SELECT * FROM post ORDER BY id DESC";
            $fire = mysqli_query($con,$select_query);
            while($row = mysqli_fetch_assoc($fire)){
               $str = $row['src'];
               $len = strlen($str);
               $ref = $len - 3;
               $type = substr($str, $ref);
               if($type == "jpg" || $type =="png"){
            ?>
            <!-- photo post -->
                <div class="card ml-5">
                    <div class="card-head p-3">
                        <img id="user_profile_pic" src="post_img/<?php echo $row['profile_src']; ?>">
                        <h6 class="mt-2 ml-2"><?php echo $row['username']; ?></h6>
                        <p class="mt-2 ml-2" id="time"><?php echo $row['time']; ?></p>
                        <p class="mt-2 ml-2" id="caption"><?php echo $row['caption']; ?></p>
                    </div>
                    <img src="post_img/<?php echo $row['src']; ?>" class="img-fluid">
                    <div class="card-body bg-white">
                        <!-- like, share subscriber -->
                        <p style="margin-top: -12px;margin-left: 15px; position: absolute;"><?php echo $row['like']; ?></p>
                        <div class="row like p-1 mt-3 d-flex flex-row">
                            <div class="col-md-4 pl-4">
                                    <img src="img/like.png" name="like" id="like_icon" onclick="liked(<?php echo $row['id']; ?>)" style="height: 25px; width: 25px">
                                <h6 id="like" class="ml-2">Like</h6>
                            </div>
                            <div class="col-md-4">
                                <img src="img/comment.png" class="ml-3 mt-1" style="height: 22px; width: 22px">
                                <h6>Comment</h6>
                            </div>  
                            <div class="col-md-4 pl-5">
                                <img src="img/share.png" style="height: 25px; width: 25px">
                                <h6 class="ml-3 pl-3">Share</h6>
                            </div>          
                        </div>

                        <!-- show All comment -->

                        <div class="row pl-3 allCmnt"></div>
                        <a href="#" class="text-secondary ml-5 mt-1 showCmnt" onclick="showCmnt()">show comments</a>
                        <a href="#" class="text-secondary mt-1 hideCmnt" onclick="hideCmnt()">hide comments</a>

                        <!-- comment center -->
                        <div class="row d-flex pt-2 flex-row">
                            <div class="col-md-1">
                                <img src="img/me.jpg" class="mt-2" style="height: 35px; width: 35px; border-radius: 100%;">
                            </div>
                            <div class="col-md-10 mt-2 pr-5">
                                <!-- <form method="post" action="main.php"> -->
                                    <input type="text" name="post_id" id="post_id" />
                                    <textarea class="comment_section" name="comment_section" id="comment_section<?php echo $row['id']; ?>" placeholder="Write a comment"></textarea>
                                    <button id="cmnt_send" onclick="send1(<?php echo $row['id']; ?>)"></button>
                                <!-- </form> -->
                            </div>
                        </div>
                    </div>
                        
                </div>


             <?php  }else if($type == "mp4" || $type == "MP4"){ ?>

                <!-- video post -->
                <div class="card ml-5 videoPost">
                    <div class="card-head p-3">
                        <img id="user_profile_pic" src="img/me.jpg">
                        <h6 class="mt-2 ml-2">Parbhat Thangwal Lama</h6>
                        <p class="mt-2 ml-2" id="time"><?php echo $row['time']; ?></p>
                        <p class="mt-3 ml-2" id="caption"><?php echo $row['caption']; ?></p>
                    </div>
                     <video src="post_img/<?php echo $row['src']; ?>" class="img-fluid" autoplay muted controls></video>
                    <div class="card-body bg-white">
                        <!-- like, share subscriber -->
                        <p style="margin-top: -12px;margin-left: 15px; position: absolute;"><?php echo $row['like']; ?></p>
                        <div class="row like p-1 mt-3 d-flex flex-row">
                            <div class="col-md-4 pl-4">
                                <img src="img/like.png" name="like" onclick="liked(<?php echo $row['id']; ?>)" style="height: 25px; width: 25px">
                                <h6 id="like" class="ml-2">Like</h6>
                            </div>
                            <div class="col-md-4">
                                <img src="img/comment.png" class="ml-3 mt-1" style="height: 22px; width: 22px">
                                <h6>Comment</h6>
                            </div>  
                            <div class="col-md-4 pl-5">
                                <img src="img/share.png" style="height: 25px; width: 25px">
                                <h6 class="ml-3 pl-3">Share</h6>
                            </div>          
                        </div>
                        
                        <!-- show All comment -->
                        <div class="row pl-3 allCmnt"></div>
                        <a href="#" class="text-secondary ml-5 mt-1 showCmnt" onclick="showCmnt()">show comments</a>
                        <a href="#" class="text-secondary mt-1 hideCmnt" onclick="hideCmnt()">hide comments</a>

                        <!-- comment center -->
                        <div class="row d-flex pt-2 flex-row">
                            <div class="col-md-1">
                                <img src="img/me.jpg" class="mt-2" style="height: 35px; width: 35px; border-radius: 100%;">
                            </div>
                            <div class="col-md-10 mt-2 pr-5">
                                <!-- <form method="post"> -->
                                    <input type="text" name="post_id" id="post_id" />
                                    <textarea class="comment_section" name="comment_section" id="comment_section" placeholder="Write a comment" ></textarea>
                                    <button name="send" id="cmnt_send" onclick="send2(<?php echo $row['id']; ?>)"></button>
                                <!-- </form> -->
                            </div>
                        </div>
                    </div>
                        
                </div>

               <?php }else{ ?>
                <!-- status post -->
                <div class="card ml-5">
                    <div class="card-head p-3">
                        <img id="user_profile_pic" src="post_img/<?php echo $row['profile_src']; ?>">
                        <h6 class="mt-2 ml-2"><?php echo $row['username']; ?></h6>
                        <p class="mt-2 ml-2" id="time"><?php echo $row['time']; ?></p>
                        <p class="mt-3 ml-2" id="caption"><?php echo $row['caption']; ?></p>
                    </div>
                    <div class="card-body bg-white">
                        <!-- like, share subscriber -->
                        <p style="margin-top: -12px;margin-left: 15px; position: absolute;"><?php echo $row['like']; ?></p>
                        <div class="row like p-1 mt-3 d-flex flex-row">
                            <div class="col-md-4 pl-4">
                                    <img src="img/like.png" name="like" id="like_icon" onclick="liked(<?php echo $row['id']; ?>)" style="height: 25px; width: 25px">
                                <h6 id="like" class="ml-2">Like</h6>
                            </div>
                            <div class="col-md-4">
                                <img src="img/comment.png" class="ml-3 mt-1" style="height: 22px; width: 22px">
                                <h6>Comment</h6>
                            </div>  
                            <div class="col-md-4 pl-5">
                                <img src="img/share.png" style="height: 25px; width: 25px">
                                <h6 class="ml-3 pl-3">Share</h6>
                            </div>          
                        </div>

                        <!-- show All comment -->
                        <div class="row pl-3 allCmnt"></div>
                        <a href="#" class="text-secondary ml-5 mt-1 showCmnt" onclick="showCmnt()">show comments</a>
                        <a href="#" class="text-secondary mt-1 hideCmnt" onclick="hideCmnt()">hide comments</a>

                        <!-- comment center -->
                        <div class="row d-flex pt-2 flex-row">
                            <div class="col-md-1">
                                <img src="img/me.jpg" class="mt-2" style="height: 35px; width: 35px; border-radius: 100%;">
                            </div>
                            <div class="col-md-10 mt-2 pr-5">
                                <!-- <form method="post" action="main.php"> -->
                                    <input type="text" name="post_id" id="post_id" />
                                    <textarea class="comment_section" name="comment_section" id="comment_section" placeholder="Write a comment"></textarea>
                                    <button id="cmnt_send" onclick="send3(<?php echo $row['id']; ?>)"></button>
                                <!-- </form> -->
                            </div>
                        </div>
                    </div>
                        
                </div>
               <?php } ?>

            
           

            <?php } ?>


        </div>

        <!-- online active list -->
        <div class="col-md-3 pt-4 ative_user_list">

            <!-- sponsored link -->
            <h6 class="pb-2" style="margin-left: -10px;">Sponsored</h6>
          
            <div class="row pb-3 sponsored">
                <div class="col-md-4 m-0">
                    <img src="img/laptop.jpg" height="60" width="110" style="border-radius: 10px; margin-left: -10px;">
                </div>
                <div class="col-md-8">
                    <h6>Getting it right by using the question<br><a href="#">from cambridge</a></h6>
                </div>
            </div>

            <div class="row sponsored">
                <div class="col-md-4 m-0 pb-4" style="border-bottom:1px solid #B2BABB;">
                    <img src="img/hacker.jpg" height="60" width="110" style="border-radius: 10px; margin-left: -10px;">
                </div>
                <div class="col-md-8" style="border-bottom: 1px solid #B2BABB ">
                    <h6>Getting it right by using the question<br><a href="#">from cambridge</a></h6>
                </div>
            </div>
            <!-- /sponsored link -->

            <!-- active user -->
            <div class="container">
                <!-- contact_head -->
                <div class="row p-2 contact_head">
                    <div class="col-md-6">
                        <h6>Contact</h6>
                    </div>
                    <div class="col-md-2">
                        <img src="img/video.png" height="22" width="22">
                    </div>
                    <div class="col-md-2 mt-1">
                        <img src="img/search.png" height="16" width="16">
                    </div>
                    <div class="col-md-2">
                        <img src="img/threeDot.png" height="22" width="22">
                    </div>
                </div>

                <!-- active-user -->
                <div id="active_status">
                    
                </div>
                
                
                <!-- /active-user -->
            </div>

        </div>
        <!-- /active-userlist -->

    </div>
</div>
<div>
    
</div>


<!-- opacity cover curtains -->
<div class="container-fluid curtains"></div>
<!-- Dialog post form box -->
<div class="container model_form pt-1 pb-3 mt-5 mb-5">
    <!-- row1 -->
    <div class="row" style="border-bottom: 1px solid #CCD1D1">
        <div class="col-md-10 mb-3 text-center">
            <h5 class="mt-2"><b>Create Post</b></h5>
        </div><hr>
        <div class="col-md-2">
            <img src="img/cancel.png" id="cancel_post" class="mt-1 ml-4" height="40" width="40">
        </div>
    </div>
    <!-- row2 -->
    <div class="row mt-2">
        <div class="col-md-1">
            <img src="post_img/<?php echo $profile_src; ?>" class="rounded-circle" height="40" width="40">
        </div>
        <div class="col-md-11">
            <h6>Parbhat Thangwal Lama</h6>
            <div class="row">
                <div class="col-md-3 ml-3 pt-2 d-flex flex-row" id="tag">
                    <i class="fa fa-users pr-2" arial-hidden ="true"></i>   
                    <h6 class="pr-2" style="margin-top: -3px;">Friends</h6>
                    <i class="fa fa-caret-down" arial-hidden ="true"></i>
                </div>
            </div>

        </div>
    </div>
   <div class="row p-3" id="input_area">
        <span class="text-danger ml-5" style="width: 500px;" id="size_err"></span>
        <div class="col-md-12" style="border:1px solid #f1f1f1;border-radius: 10px;">
           <form method="post" enctype="multipart/form-data" action="insert.php">
                <textarea class="mt-2 mb-2 pt-2 pl-2" name="caption" id="post_textarea" placeholder="What's on your mind, Parbhat?"></textarea>
           
    <img src="" class="img-fluid pb-3" id="create_post_img_display" style="visibility: hidden;">
    <video src="" class="img-fluid pb-3" id="create_post_video_display" style="visibility: hidden;" autoplay muted></video>
        </div>
   </div>
    <div class="row emoji mb-3">
        <div class="col-md-10">
            <img src="img/colorMap.png" height="27" width="27" id="colorMap">
        </div>
        <div class="col-md-2">
            <i class="fa fa-smile-o"></i>
        </div> 
    </div>
    <div class="container p-3 tag_container">
        <div class="row icon">
            <div class="col-md-6">
                <h6>Add To Your Post</h6>
            </div>
            <div class="col-md-1">
                <input type="file" name="file" id="file" style="visibility: hidden; position: absolute;">
                <img src="img/gallery.png" height="30" width="30" onclick="select_photo()">
            </div> 
            <div class="col-md-1">
                <img src="img/friend_icon.png" height="26" width="26">
            </div> 
            <div class="col-md-1">
                <img src="img/smile.png" height="26" width="26">
            </div> 
            <div class="col-md-1">
                <img src="img/map_point.png" height="26" width="26">
            </div> 
            <div class="col-md-1">
                <img src="img/gif.png" height="26" width="26">
            </div> 
            <div class="col-md-1">
                <img class="mt-1 pr-1" src="img/threeDot.png" height="21" width="20">
            </div>
        </div>
    </div>
    <button class="post_btn mt-3 mb-3" name="post" onclick="post()">Post</button>
    </form>
</div>

<!-- SeeMoreModel -- logout  -->
<div class="container logout_model p-3" style="width: 380px; position: absolute;top: 59px;left:950px;background-color: white;border-radius: 5px/5px;-webkit-box-shadow: 0px 0px 9px 0px rgba(50, 50, 50, 0.75);
-moz-box-shadow:    0px 0px 9px 0px rgba(50, 50, 50, 0.75);
box-shadow:         0px 0px 9px 0px rgba(50, 50, 50, 0.75);z-index: 2;">
    <div class="row p-1" style="text-align: right; border-bottom-color: 1px solid black;" >
        <div class="col-md-3">
          <img src="post_img/<?php echo $profile_src; ?>" height="65" width="65" class="rounded-circle">
        </div>
        <div class="col-md-9" style="text-align: left;">
          <h6 style=" position: relative;top: 10px;"><?php echo $username; ?></h6> 
          <p>See your profile</p> 
        </div>
    </div>
    <div class="row mt-1 pt-1 pb-1 mb-1" style="border-bottom: 1px solid #333;border-top: 1px solid #333;">
        <div class="col-md-2">
          <img src="img/feedback.png" height="40" width="40" class="rounded-circle mt-2 ml-3">
        </div>
        <div class="col-md-10" style="text-align: left;">
          <h6 style=" position: relative;top: 10px;">Give Feedback</h6> 
          <p>Help us improve the new Facebook</p> 
        </div>
    </div>
    <div class="row p-1">
        <div class="col-md-2">
          <img src="img/setting.png" height="40" width="40" class="rounded-circle mt-2 ml-3">
        </div>
        <div class="col-md-10" style="text-align: left;">
          <h6 style=" position: relative;top: 17px;">Setting & Privacy</h6>
        </div>
    </div>
    <div class="row p-1">
        <div class="col-md-2">
          <img src="img/help.png" height="40" width="40" class="rounded-circle mt-2 ml-3">
        </div>
        <div class="col-md-10" style="text-align: left;">
          <h6 style=" position: relative;top: 17px;">Help & Support</h6> 
        </div>
    </div>
    <div class="row p-1">
        <div class="col-md-2">
          <img src="img/preference.png" height="40" width="40" class="rounded-circle mt-2 ml-3">
        </div>
        <div class="col-md-10" style="text-align: left;">
          <h6 style=" position: relative;top: 17px;">Display Preference</h6> 
        </div>
    </div>
    <div class="row p-1">
        <div class="col-md-2">
          <img src="img/logout.png" height="40" width="40" class="rounded-circle mt-2 ml-3">
        </div>
        <div class="col-md-10" style="text-align: left;">
          <a href="logout.php" style="text-decoration: none;color: black;"><h6 style=" position: relative;top: 17px;" name="logout" id="logout">Log Out</h6></a> 
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h6 style="font-weight: lighter;margin-left: 20px;margin-top: 10px;font-weight: 18px;">Privacy. Terms .Advertising .Ad Choices .Cookies .More .Facebook &#169; 2020</h6>
        </div>
    </div>

</div>
<!-- </EndOfSeeMoreModel> --> 

<!-- profile model  -->
<div class="container profile p-3" style="width: 100%;height: 755px; position: absolute;top: 60px;left:225px;overflow-y: scroll; background-color:white;">
   <div class="row" style="margin-top: -14px;">
       <div class="col-md-12">
           <div class="cover_img" style="height: 350px;width: 900px;overflow-y: hidden;">
           <img src="post_img/<?php echo $cover_src; ?>" class="img-fluid" width="100%">
           <p id="change_coverPic" style="top:310px;left: 750px; background-color: #f1f1f1;padding: 4px;position: absolute;ßborder-radius: 4px;cursor: pointer;"><i class="fa fa-camera"></i> Add Cover Photo</p>
           <form method="post" action="cover_upload.php" enctype="multipart/form-data">
               <input type="file" name="cover_upload" id="cover_upload" style="visibility: hidden;">
               <input type="submit" name="csrc_btn" id="csrc_btn" style="visibility: hidden;">
           </form>
       </div>
       <form method="post" action="profile_upload.php" enctype="multipart/form-data"> 
           <img src="post_img/<?php echo $profile_src; ?>" id="profilePic" height="170" width="170" class="rounded-circle" style="position: absolute;border:5px solid #f1f1f1;left: 32%;top: 43%;cursor: pointer;" >
           <input type="file" name="file" id="profile_upload" style="visibility: hidden;">
           <input type="submit" id="upload" name="upload" style="visibility: hidden;">
       </form>
       <h3 style="margin-top: -20px; margin-left: -230px; text-align: center;"><?php echo $username; ?></h3>
       <textarea id="bio" style="margin-top: -5px; margin-left:145px;width: 590px;height: 30px;text-align: center;border: 0.5px solid #6E6867 ;">stay safe</textarea>
       <a href="#" id="edit_bio" style="margin-left: 425px;">Edit</a>
       <a href="#" id="save" style="margin-left: -25px; position: absolute;">Save</a>
       </div>
   </div>
   <div class="profile_data mt-2" style="width: 900px; border-top:0.8px solid #8C8A8A ;border-bottom:0.8px solid #8C8A8A; color:#5F5C5B ;">
       <div class="profile_link p-1 mt-1">
           <div class="row">
               <div class="col-md-1">
                   <h6 class="pt-2 pl-2">Posts</h6>
               </div>
               <div class="col-md-1">
                   <h6 class="pt-2 pl-2">About</h6>
               </div> 
               <div class="col-md-1">
                   <h6 class="pt-2 pl-2">Friends</h6>
               </div>
               <div class="col-md-1">
                   <h6 class="pt-2 pl-3">Photos</h6>
               </div> 
               <div class="col-md-1">
                   <h6 class="pt-2 pl-3 ml-2">Archives</h6>
               </div>
               <div class="col-md-1">
                   <h6 class="pt-2 ml-4 pl-3">Mores</h6>
               </div>
               <div class="col-md-3">
                   <h6 class="p-2" style="width:130px; margin-left: 70px; background-color:#f1f1f1;border-radius: 5px;"><i class="fa fa-pencil"></i> Edit Profile</h6>
               </div>
               <div class="col-md-1" style="margin-left: -10px;">
                   <h6 style="height: 33px; background-color:#f1f1f1;border-radius: 5px;"><i class="fa fa-eye mt-2" style="margin-left: 14px;"></i></h6>
               </div>
               <div class="col-md-1" style="margin-left: -10px;">
                   <h6 style="height: 33px; background-color:#f1f1f1;border-radius: 5px;"><i class="fa fa-search mt-2" style="margin-left: 14px;"></i></h6>
               </div>
               <div class="col-md-1" style="margin-left: -10px;">
                   <h6 style=" height: 33px; background-color:#f1f1f1;border-radius: 5px;"><i class="fa fa-ellipsis-h mt-2" style="margin-left: 14px;"></i></h6>
               </div>

           </div>
       </div>
   </div>
   <!-- endof personaldata -->
   <!-- personal post -->
       <!-- create new status -->
            <div class="statusbar bg-white" style="margin-top: 20px; margin-left: 200px;">
                <div class="row input p-3">
                    <div class="col-md-2">
                        <img src="post_img/<?php echo $profile_src; ?>" id="user_profile_pic">
                    </div>
                    <div class="col-md-10">
                        <input type="text" id="statusbar_input" name="" placeholder="What's on your mind, Parbhat?" onclick="create_post()">
                    </div>
                </div>
                <div class="row statusbar_btm text-center">
                    <div class="col-md-4">
                        <img src="img/camera.png" class="img-fluid mr-5">
                        <h6 class="ml-3 pl-5">Live Video</h6>
                    </div>
                    <div class="col-md-4">
                        <img src="img/gallery.png" class="img-fluid mr-5 pr-5">
                        <h6 class="ml-3 pl-4">Photo/Video</h6>
                    </div>
                    <div class="col-md-4 pr-5 ">
                        <img src="img/smile.png" class="img-fluid mr-5 pr-5">
                        <h6 class="ml-4 pl-2">Feeling/Activity</h6>
                    </div>
                </div>
            </div>
            <!-- endofcreatepost -->
            <!-- owner post -->
                <div class="container" style="padding-top: 25px; padding-left: 180px;">
                <?php
                $con = mysqli_connect('localhost','root','','facebook');
                $select_query = "SELECT * FROM post WHERE email = '$Email'";
                $fire = mysqli_query($con,$select_query);
                if(mysqli_num_rows($fire)==0){
                    $emptyPost = "No Posts available!";
                }
                while($row = mysqli_fetch_assoc($fire)){
                $str = $row['src'];
                $len = strlen($str);
                $ref = $len - 3;
                $type = substr($str, $ref);
                if($type == "jpg" || $type =="png"){
                ?>
                <!-- photo post -->
                <div class="card">
                    <div class="card-head p-3">
                        <img id="user_profile_pic" src="post_img/<?php echo $row['profile_src']; ?>">
                        <h6 class="mt-2 ml-2"><?php echo $row['username']; ?></h6>
                        <p class="mt-2 ml-2" id="time"><?php echo $row['time']; ?></p>
                        <p class="mt-2 ml-2" id="caption"><?php echo $row['caption']; ?></p>
                    </div>
                    <img src="post_img/<?php echo $row['src']; ?>" class="img-fluid">
                    <div class="card-body bg-white">
                        <!-- like, share subscriber -->
                        <p style="margin-top: -12px;margin-left: 15px; position: absolute;"><?php echo $row['like']; ?></p>
                        <div class="row like p-1 mt-3 d-flex flex-row">
                            <div class="col-md-4 pl-4">
                                    <img src="img/like.png" name="like" id="like_icon" onclick="liked(<?php echo $row['id']; ?>)" style="height: 25px; width: 25px">
                                <h6 id="like" class="ml-2">Like</h6>
                            </div>
                            <div class="col-md-4">
                                <img src="img/comment.png" class="ml-3 mt-1" style="height: 22px; width: 22px">
                                <h6>Comment</h6>
                            </div>  
                            <div class="col-md-4 pl-5">
                                <img src="img/share.png" style="height: 25px; width: 25px">
                                <h6 class="ml-3 pl-3">Share</h6>
                            </div>          
                        </div>
                        <!-- comment center -->
                        <div class="row d-flex pt-2 flex-row">
                            <div class="col-md-1">
                                <img src="post_img/<?php echo $row['profile_src']; ?>" class="mt-2" style="height: 35px; width: 35px; border-radius: 100%;">
                            </div>
                            <div class="col-md-10 mt-2 pr-5">
                                <textarea id="comment_section1" placeholder="Write a comment"></textarea>
                            </div>
                        </div>
                    </div>
                        
                </div>


                <?php  }else if($type == "mp4" || $type == "MP4"){ ?>

                <!-- video post -->
                <div class="card">
                    <div class="card-head p-3">
                        <img id="user_profile_pic" src="img/me.jpg">
                        <h6 class="mt-2 ml-2">Parbhat Thangwal Lama</h6>
                        <p class="mt-2 ml-2" id="time"><?php echo $row['time']; ?></p>
                        <p class="mt-3 ml-2" id="caption"><?php echo $row['caption']; ?></p>
                    </div>
                     <video src="post_img/<?php echo $row['src']; ?>" class="img-fluid" autoplay muted controls></video>
                    <div class="card-body bg-white">
                        <!-- like, share subscriber -->
                        <p style="margin-top: -12px;margin-left: 15px; position: absolute;"><?php echo $row['like']; ?></p>
                        <div class="row like p-1 mt-3 d-flex flex-row">
                            <div class="col-md-4 pl-4">
                                <img src="img/like.png" name="like" onclick="liked(<?php echo $row['id']; ?>)" style="height: 25px; width: 25px">
                                <h6 id="like" class="ml-2">Like</h6>
                            </div>
                            <div class="col-md-4">
                                <img src="img/comment.png" class="ml-3 mt-1" style="height: 22px; width: 22px">
                                <h6>Comment</h6>
                            </div>  
                            <div class="col-md-4 pl-5">
                                <img src="img/share.png" style="height: 25px; width: 25px">
                                <h6 class="ml-3 pl-3">Share</h6>
                            </div>          
                        </div>
                        <!-- comment center -->
                        <div class="row d-flex pt-2 flex-row">
                            <div class="col-md-1">
                                <img src="img/me.jpg" class="mt-2" style="height: 35px; width: 35px; border-radius: 100%;">
                            </div>
                            <div class="col-md-10 mt-2 pr-5">
                                <textarea id="comment_section2" placeholder="Write a comment"></textarea>
                            </div>
                        </div>
                    </div>
                        
                </div>

                <?php }else{ ?>
                <!-- text post -->
                <div class="card">
                    <div class="card-head p-3">
                        <img id="user_profile_pic" src="post_img/<?php echo $row['profile_src']; ?>">
                        <h6 class="mt-2 ml-2"><?php echo $row['username']; ?></h6>
                        <p class="mt-2 ml-2" id="time"><?php echo $row['time']; ?></p>
                        <p class="mt-3 ml-2" id="caption"><?php echo $row['caption']; ?></p>
                    </div>
                    <div class="card-body bg-white">
                        <!-- like, share subscriber -->
                        <p style="margin-top: -12px;margin-left: 15px; position: absolute;"><?php echo $row['like']; ?></p>
                        <div class="row like p-1 mt-3 d-flex flex-row">
                            <div class="col-md-4 pl-4">
                                    <img src="img/like.png" name="like" id="like_icon" onclick="liked(<?php echo $row['id']; ?>)" style="height: 25px; width: 25px">
                                <h6 id="like" class="ml-2">Like</h6>
                            </div>
                            <div class="col-md-4">
                                <img src="img/comment.png" class="ml-3 mt-1" style="height: 22px; width: 22px">
                                <h6>Comment</h6>
                            </div>  
                            <div class="col-md-4 pl-5">
                                <img src="img/share.png" style="height: 25px; width: 25px">
                                <h6 class="ml-3 pl-3">Share</h6>
                            </div>          
                        </div>
                        <!-- comment center -->
                        <div class="row d-flex pt-2 flex-row">
                            <div class="col-md-1">
                                <img src="post_img/<?php echo $row['profile_src']; ?>" class="mt-2" style="height: 35px; width: 35px; border-radius: 100%;">
                            </div>
                            <div class="col-md-10 mt-2 pr-5">
                                <textarea id="comment_section3" placeholder="Write a comment"></textarea>
                            </div>
                        </div>
                    </div>
                        
                </div>
                <?php } ?>
                <?php } ?>
                <h6 class="mt-1 text-primary" style="margin-left: 200px;"><?php echo $emptyPost; ?></h6>
                </div>
</div>
<!-- </EndOfProfileModel> -->
</body>
<script type="text/javascript" src="js/script.js"></script>
<script src="https://use.fontawesome.com/e9241f93d8.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/eba070197c.js" crossorigin="anonymous"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 




<script type="text/javascript">
var height = window.innerHeight;
$('.setting').css('height',height);
$('.newsfeed').css('height',height);
$('.ative_user_list').css('height',height);
//messenger open link
function messageOpen(){
    location.assign('http://whatsup-clone.herokuapp.com/');
}
//preloader
setTimeout(function(){
    $('#loading').fadeToggle();
},500);

//profile

$('#user_profile_pic').click(function(){
    $('#loading').fadeToggle();
    setTimeout(function(){
    $('#loading').fadeOut();
},50);
})
//active-status-update 
function updateActiveStatus(){
    $.ajax({
        url:'update_active_status.php',
        success:function(result){
            //code
        }
    })
}
setInterval(function(){
    updateActiveStatus();
},500);


setInterval(function(){
    $('#active_status').load('active_status.php');
},1000);
$('#search_bar').click(function(){
    $('#fb_logo').css('visibility','hidden');
    $('#search_bar').css('paddingLeft','15');
    $('#search_bar').css('marginLeft','-30');
    $('#search_bar').css('backgroundColor','#F8F9F9');
    $('#back').css('visibility','visible');
    $('#search_icon').css('visibility','hidden');
})

$('#back').click(function(){
    $('#fb_logo').css('visibility','visible');
    $('#search_bar').css('paddingLeft','30');
    $('#search_bar').css('marginLeft','0');
    $('#back').css('visibility','hidden');
    $('#search_icon').css('visibility','visible');
    $('#search_bar').css('paddingLeft','45px');
    $('#search_icon').css('marginLeft','10px');
})
$('.s1').mouseover(function(){
    $('#create_story').css('transform','scaleX(1.04)')
})
$('.s1').mouseout(function(){
    $('#create_story').css('transform','translate(0px, 0px)')
})
  
function home_click(){
    location.assign('main.php');
}
//see more navigation button
$('.profile').css('visibility','hidden');
function profile(){
    $('#container').css('visibility','hidden');
    $('body').css('backgroundColor','white');
    $('.profile').css('visibility','visible');
}

//edit biodata
$('#bio').css('borderColor','#f1f1f1');
$('#bio').css('backgroundColor','#fff');
$('#bio').prop('disabled',true);
$('#save').css('visibility','hidden');
$('#edit_bio').click(function(){
    $('#bio').prop('disabled',false);
    $('#bio').css('backgroundColor','#f1f1f1');
    $('#bio').css('borderColor','#8C8A8A');
    $('#bio').css('outlineStyle','none');
    $('#edit_bio').css('visibility','hidden');
    $('#save').css('visibility','visible');
})
$('#save').click(function(){
    $('#edit_bio').css('visibility','visible');
    $('#save').css('visibility','hidden');
    $('#bio').css('borderColor','#fff');
    $('#bio').css('backgroundColor','#fff');
    $('#bio').prop('disabled',true);
    //fetch bio value and insert into database
    var bio = $('#bio').val();
    
})
//change cover pic
$('#change_coverPic').click(function(){
    $('#cover_upload').click();
    var cover_file = document.getElementById('cover_upload'); 
    cover_file.addEventListener('change',function(){
        $("[for=file]").html(this.files[0].name);
        $('#csrc_btn').click();
    })
})

//profile upload and update
$('#profilePic').click(function(){
    $('#profile_upload').click();
    var file = document.querySelector('#profile_upload');
    file.addEventListener('change',function(){
        $("[for=file]").html(this.files[0].name);
        $('#upload').click();
    })
})

$('.logout_model').css('visibility','hidden');
function down(){
    var check = $('.logout_model').css('visibility');
    if(check == 'visible'){
        $('.logout_model').css('visibility','hidden');
    }else{
        $('.logout_model').css('visibility','visible');
    }
}

//create post
function create_post(){
    $('#statusbar_input').css('backgroundColor','#CCD1D1');
    $('.curtains').css('visibility','visible');
    $('.model_form').css('visibility','visible');
}
 // post_video hover
 $('#post_video').hover(function(){
    $('#post_video').attr('controls','controls');
 })

// checking keyboard press event
$('#post_textarea').keyup(function(){
    var input_val = $('#post_textarea').val();
    var len = input_val.length;
    if(len>0){
        $('.post_btn').css('backgroundColor','#3498DB')
    }else{
        $('.post_btn').css('backgroundColor','#CCD1D1')
    }
})
//checking keyboard backspace key press event
$('#post_textarea').keydown(function(){
    var input_val = $('#post_textarea').val();
    var len = input_val.length;
    if(len>0){
        $('.post_btn').css('backgroundColor','#3498DB')
    }else{
        $('.post_btn').css('backgroundColor','#CCD1D1')
    }
})

//post
function post_btn(){
    $('.post_btn').css('outline-style','none');
}

//select photo
function select_photo(){
    $('#file').click();
    var file = document.querySelector('#file');
    file.addEventListener('change',function(){
    //code to retrive the file --> name and type
    $("[for=file]").html(this.files[0].name);
    //code to distinguish image or video type file
    var size = this.files[0].size;
    size_err = "";
    $('#size_err').html(size_err);
    if(size<9833622){
        var type = this.files[0].name;
        var len = type.length;
        var ref = len-3;
        var res = type.substr(ref,len);
        
        if(res == "jpg" || res == "png"){
            //image type file
            $("#create_post_img_display").attr("src", URL.createObjectURL(this.files[0]));
            $('#create_post_img_display').css('visibility','visible')
            $('#input_area').css('overflow-y','scroll')
        }else{
            //video type file
            $("#create_post_video_display").attr("src", URL.createObjectURL(this.files[0]));
            $('#create_post_video_display').css('visibility','visible')
            $('#input_area').css('overflow-y','scroll')
        }
    }else{
        var size_err = "Sorry! file size size more than expected. Please upload file less than 9MB.";
        $('#size_err').html(size_err);
    }
})
}
// cancel post
$('#cancel_post').click(function(){
    $('.curtains').css('visibility','hidden')
    $('.model_form').css('visibility','hidden')
    $('#create_post_img_display').css('visibility','hidden')
    $('#create_post_video_display').css('visibility','hidden')
    location.assign('main.php');
})

//liked
function liked(id){
    var id = id;
    //dom event
    $('#like_icon').attr('src', 'img/liked.png');
    $('#like_icon').attr('class', 'animate__animated animate__bounceIn');
    $('#like').css('color','#3498DB');
    //ajax like number transfer to insert.php page
    $.ajax({
        url:'like.php',
        data:'uid=' + id,
        success:function(data){
            // alert(id);
            // location.assign('like.php');
        }
    })
}

//load comment to div
$(".allCmnt").load("comment.php");
function send1(id){
    var id = "comment_section"+id;
    var cmnt = $("#"+id+"").val()
    alert(cmnt)
}
function send2(id){
    var id = "comment_section"+id;
    var cmnt = $("#"+id+"").val()
    alert(cmnt)
}
function send3(id){
    var id = "comment_section"+id;
    var cmnt = $("#"+id+"").val()
    alert(id)
}

//show all comment 
$('.hideCmnt').css('visibility','hidden');
function showCmnt(){
    $('.showCmnt').css('visibility','hidden');
    $('.hideCmnt').css('visibility','visible');
    $('.allCmnt').css('visibility','visible');
    $('.allCmnt').css('position','static');
}
//hide all comment
function hideCmnt(){
    $('.hideCmnt').css('visibility','hidden');
    $('.showCmnt').css('visibility','visible');
    $('.allCmnt').css('visibility','hidden');
    $('.allCmnt').css('position','absolute');

}

//responsive window
var rheight = window.innerHeight;
var rwidth = window.innerWidth;

// window.addEventListener('resize',function(){
//     var height = window.innerHeight;
//     var width = window.innerWidth;
//     console.log(width)
//     if(width<rwidth){
//         $('body').css('visibility','hidden');
//         alert('Not supported for mobile devices!')

//     }
// })

</script>

</html>