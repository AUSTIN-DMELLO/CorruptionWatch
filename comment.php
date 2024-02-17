
<div id="post" >
        <div>
            <?php
            if($ROW_USER['gender'] == "Female"){
                $image="images/user_female.jpg";
            }
            else if(file_exists($ROW_USER['profile_image'])){
                $image_class=new Image();
                $image=$image_class->get_thumb_profile($ROW_USER['profile_image']);
            }
            else{
                $image="images/user_male.jpg";
            }
            ?>
        <img src="<?php echo $image ?>" style="width: 75px; margin-right: 4px;border-radius:50%" alt="">
        </div>
        <div style="width:100%">
            <div style="font-weight: bold; color: #405d9b;width:100%;">
            <?php 
            if($ROW_USER['email'] == "admin@cw.com"){
            echo "<a href='profile.php>?id=$COMMENT[userid]'>";
            echo htmlspecialchars($ROW_USER['first_name']) . " " . htmlspecialchars($ROW_USER['last_name']); 
            echo "</a>";
            }
            if($COMMENT['is_profile_image']){
                $pronoun = "his";
                if($ROW_USER['gender'] == "Female"){
                    $pronoun="her";
                }
                echo "<span style='font-weight:normal;color:#aaa;'> updated $pronoun profile image.</span>";
                
            }
            if($COMMENT['is_cover_image']){
                $pronoun = "his";
                if($ROW_USER['gender'] == "Female"){
                    $pronoun="her";
                }
                echo "<span style='font-weight:normal;color:#aaa;'> updated $pronoun cover image.</span>";
                
            }
            ?>
        </div>
                <?php 
                echo "<a href='profile.php?id=$ROW[userid]'>";
                echo htmlspecialchars($ROW_USER['first_name']) . " " . htmlspecialchars($ROW_USER['last_name']); 
                echo "</a>";
                echo "<br><br>";
                echo htmlspecialchars($COMMENT['post']);
                ?>
                <br><br>
                <?php 
                if(file_exists($COMMENT['image'])){
                    $post_image= $image_class->get_thumb_post($COMMENT['image']);
                    echo "<img src='$post_image' style='width:80%;' />";
                }
                
                ?>
               <br><br>
               <?php
                $likes="";
                $likes=($COMMENT['likes']>0) ? "(" . $COMMENT['likes'] . ")" : "" ;
               ?>
            <a href="like.php?type=post&id=<?php echo $COMMENT['postid'] ?>">Like<?php echo $likes ?> </a>
            <span style="color: #999;">
            <a href="single_post.php?id=<?php echo $COMMENT['postid'] ?>">Reply</a>
            <span style="color: #999;">
            <?php echo $COMMENT['date'] ?>
            </span>
            <?php
            ?>
            <span style="color: #999;float:right;">
            <?php
            $post=new Post();
            $DB=new Database();
            if($ROW_USER['email'] == "admin@cw.com"){
                $sql="select * from posts";
                $result=$DB->read($sql);
            }
            if($post->i_own_post($COMMENT['postid'],$_SESSION['WebDevelopment_userid'])){
                echo "
                <a href='edit.php?id=$COMMENT[postid]'>
                Edit   
                </a>
                <a href='delete.php?id=$COMMENT[postid]' >
                Delete
                </a>";
            }
            ?>
            </span>
            <?php
            $i_liked=false;
            if(isset($_SESSION['WebDevelopment_userid'])){
            $DB=new Database();
            $sql="select likes from likes where type='post' && contentid = '$COMMENT[postid]' limit 1";
            $result=$DB->read($sql);
            if(is_array($result)){
                $likes=json_decode($result[0]['likes'],true);
                $user_ids=array_column($likes,"userid");
                if(in_array($_SESSION['WebDevelopment_userid'],$user_ids)){
                    $i_liked=true;
                }
            }
        }
            if($COMMENT['likes']>0){
                echo "<br>";
                echo "<a href='likes.php?type=post&id=$COMMENT[postid]'>";
                if($COMMENT['likes']==1){
                    if($i_liked){
                echo "<div style='text-align:left;'>You liked this post.</div>";
                    }
                else{
                echo "<div style='text-align:left;'>1 person liked this post.</div>";
                }
                }
                else{
                    if($i_liked){
                        $text="others";
                        if(($COMMENT['likes'] -1)==1){
                            $text="other";
                        }
                echo "<div style='text-align:left;'>You and " . ($COMMENT['likes'] -1) . " $text liked this post.</div>";
                    }
                    else{
                echo "<div style='text-align:left;'>" . $COMMENT['likes'] . " others liked this post.</div>";
                    }
            }
            echo "</a>";
        }
            ?>
        </div>
    </div>