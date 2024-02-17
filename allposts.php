<?php
    include("classes/autoload.php");
    $login = new Login();
    $user_data=$login->check_login($_SESSION['WebDevelopment_userid']);
    $USER=$user_data;
    if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $profile=new Profile();
    $profile_data=$profile->get_profile($_GET['id']);
    if(is_array($profile_data)){
    $user_data=$profile_data[0];
    }
}
    //posting starts here
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $post=new Post();
        $id=$_SESSION['WebDevelopment_userid'];
        $result=$post->create_post($id,$_POST,$_FILES);
        if($result == ""){
            header("Location: profile.php");
            die;
        }
        else{
            echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey;'>";
            echo "<br>The following errors occured:<br><br>";
            echo $result;
            echo "</div>";
        }
    }
    //collect posts
    $post = new Post();
    $posts = $post->get_posts_for_admin();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Profile | Community Forum</title>
    </head>
    <style type="text/css">
        #blue_bar{
            height: 50px;
            background-color: #405d9b;
            color: #d9dfeb;
        }
        #search_box{
            width: 400px;
            height: 20px;
            border-radius: 5px;
            border: none;
            padding: 4px;
            font-size: 14px;
            background-image: url(search.png);
            background-repeat: no-repeat;
            background-position: right;
        }
        #profile_pic{
            width: 150px;
            margin-top: -300px;
            border-radius: 50%;
            border: solid 2px white;
        }
        #menu_buttons{
            width: 100px;
            display: inline-block;
            margin: 2px;
        }
        #friends_img{
            width: 75px;
            float: left;
            margin: 8px;
        }
        #friends_bar{
            background-color: white;
            min-height: 400px;
            margin-top: 20px;
            color: #aaa;
            padding: 8px;
        }
        #friends{
            clear: both;
            font-size: 12px;
            font-weight: bold;
            color: #405d95;
        }
        textarea{
            width: 100%;
            border: none;
            font-family: tahoma;
            font-size: 14px;
            height: 60px;
        }
        #post_button{
            float: right;
            background-color: #405d9b;
            border: none;
            color: white;
            padding: 4px;
            font-size: 14px;
            border-radius: 2px;
            width: 50px;
            min-width: 50px;
            cursor: pointer;
        }
        .navigation {
    background: orange; /* Change background color to orange */
    text-align: center;
    padding: 10px;
}

.navigation a {
    text-decoration: none;
    color: #fff;
    font-weight: bold;
    margin: 0 20px;
    transition: all 0.3s;
    display: inline; /* Display links in one line */
}

.navigation a:hover {
    color: #8f94fb;
}
        #post_bar{
            margin-top: 20px;
            background-color: white;
            padding: 10px;
        }
        #post{
            padding: 4px;
            font-size: 13px;
            display: flex;
            margin-bottom: 20px;
        }
    </style>
    <body style="font-family: tahoma; background-color: #d0d8e4;">
        <br>
        <?php include("header.php");
        ?>
        <!--cover area-->
        <div style="width: 800px; margin: auto; min-height: 400px;">
            <div style="background-color: white; text-align: center; color: #405d9b;">
            <?php
                $image="images/coverimage.jpg";
                if(file_exists($user_data['cover_image'])){
                    $image=$image_class->get_thumb_cover($user_data['cover_image']);
                }
                ?>
                <img src="<?php echo $image ?>" alt="" style="width: 100%;">
                <span style="font-size: 12px;">
                <?php
                $image="images/user_male.jpg";
                if($user_data['gender'] == "Female"){
                    $image="images/user_female.jpg"; 
                }
                if(file_exists($user_data['profile_image'])){
                    $image=$image_class->get_thumb_profile($user_data['profile_image']);
                }
                ?>
                    <img id="profile_pic" src="<?php echo $image ?>" alt=""><br>
                    <a style="text-decoration:none; color:#f0f;" href="change_profile_image.php?change=profile">Change Profile Image</a> |
                    <a style="text-decoration:none; color:#f0f;" href="change_profile_image.php?change=cover">Change Cover Image</a>
                </span>
                <br>
                <div style="font-size: 20px;color: black;"><?php echo $user_data['first_name'] . " " . $user_data['last_name'] ?> 
                </a>
                    </div>
                <br>
            </div>
            <!--below cover area-->
            <div style="display: flex;">
                    <!--posts-->
                    <div id="post_bar">
                       <?php
                       if($posts){
                        foreach($posts as $ROW){
                            $user=new User(); 
                            $ROW_USER = $user->get_user($ROW['userid']);
                            include("post.php");
                        }
                    }
                        ?>
                        <!--posts area-->
                <div style="min-height: 400px; flex:2.5; padding: 20px; padding-right: 0px;">
                    <div style="border: solid thin #aaa; padding: 10px; background-color: white;">
                        <form method="post" enctype="multipart/form-data">
                            <textarea name="post" placeholder="Type a message"></textarea>
                            <input type="file" name="file">
                            <input id="post_button" type="submit" value="Post">
                            <br>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>