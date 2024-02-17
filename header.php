<!--top bar-->
<?php
$corner_image ="images/user_male.jpg";
if(isset($USER)){
    if(file_exists($USER['profile_image'])){
        $image_class=new Image();
        $corner_image=$image_class->get_thumb_profile($USER['profile_image']);
    }
    else{
        if($USER['gender']=="Female"){
            $corner_image="images/user_female.jpg";
        }
    }
}

?>
<div id="blue_bar">
            <div style="width: 800px; margin: auto; font-size: 30px; text-align:center;">Forum
                <img src="<?php echo $corner_image ?>" alt="" style="width: 50px; float: right;">
                </a>
                <a href="Logout.php">
                <span style="font-size: 11px;float: right; margin: 10px; color:white;">Logout</span>
                </a>
            </div>
        </div>