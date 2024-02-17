<?php
session_start();
if(isset($_SESSION['WebDevelopment_userid'])){   
    $_SESSION['WebDevelopment_userid']=NULL;
    unset($_SESSION['WebDevelopment_userid']);
}
header("Location: login.php");
die;