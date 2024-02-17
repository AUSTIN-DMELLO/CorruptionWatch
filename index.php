<?php
include("classes/autoload.php");
$login = new Login();
$user_data=$login->check_login($_SESSION['WebDevelopment_userid']);
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
            min-height: 400px;
            margin-top: 20px;
            padding: 8px;
            text-align: center;
            font-size: 20px;
            color: #405d9b;
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
            
            <!--below cover area-->
            <div style="display: flex;">
                <!--people area-->
                <div style="min-height: 400px; flex: 1;">
                    <div id="friends_bar">
                        <img src="profilepic.jpg" id="profile_pic">
                        <br>
                       <a href="profile.php" style="text-decoration:none;"> <?php echo $user_data['first_name'] . "<br> " . $user_data['last_name'] ?> </a>
                    </div>
                </div>
                <!--posts area-->
                <div style="min-height: 400px; flex:2.5; padding: 20px; padding-right: 0px;">
                    <div style="border: solid thin #aaa; padding: 10px; background-color: white;">
                        <textarea placeholder="Type a message"></textarea>
                        <input id="post_button" type="submit" value="Post">
                        <br>
                    </div>
                    <!--posts-->
                    <div id="post_bar">
                        <!--post 1-->
                        <div id="post">
                            <div>
                                <img src="user1.jpg" style="width: 75px; margin-right: 4px;" alt="">
                            </div>
                            <div>
                                <div style="font-weight: bold; color: #405d9b;">First Guy</div>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a gallery of tape and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap of electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem 
                                <br><br>
                                <a href="">Like </a> . <a href="">Comment</a> . <span style="color: #999;">April 23 2020</span>
                            </div>
                        </div>
                        <!--post 2-->
                        <div id="post">
                            <div>
                                <img src="user4.jpg" style="width: 75px; margin-right: 4px;" alt="">
                            </div>
                            <div>
                                <div style="font-weight: bold; color: #405d9b;">African Dude</div>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a gallery of tape and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap of electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem 
                                <br><br>
                                <a href="">Like </a> . <a href="">Comment</a> . <span style="color: #999;">April 23 2020</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>