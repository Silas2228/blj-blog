<!DOCTYPE html>
<html>
<head> 
    <title>comment</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/blogs.css">
    </head>
<body>
    <?php
        include('navigation.php');
        include 'database/database.php';
        $postid = $_GET["id"] ?? '';
    ?>
    <div class="gridcomments">
        <h2>Comment</h2>
        <form action="comments.php" method="POST">
        <label class="homelabels" for="name"><h3>Name:</h3></label>
        <input class="input" type="text" name="namecomment"id="namecomment"></input>
        <label class="homelabels" for="comment"><h3>Comment</h3></label>
        <textarea class ="inputblog" type="text"rows="6" cols="40" class="cssdesign" id="comment" name="comment"></textarea> 
        <input type="hidden" id="postid" name="postid" value="<?php echo $postid; ?>">
        <div class="buttonpost"><button class="buttonnav" type="submit" name="commentsubmit">Post</button></div> 
        </form>
    </div>
</html>