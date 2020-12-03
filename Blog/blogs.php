

<!DOCTYPE html>
<html>

<head> 
    <title>Blogs</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/blogs.css">
</head>
    <body>
    <?php
        include('navigation.php');
        require 'database/database.php';
    ?>
        <div class="gridblogs">
            <?php $stmt = $pdo->query("SELECT * FROM `blog1`");?>
        <?php foreach($stmt->fetchALL() as $x): ?>
            <ul class="blogs">
                <li><h3><?= $x[1]?></h3></li>
                <li><h5><?=$x[2]?></h5></li>
                <li><?= $x[3]?></li>
                <img class ="pics" src="<?php echo "$x[4]";?>"><br><br>
                <li><?= $x[5] ?></li>
                <a class="buttoncomment" href="comments.php?id= <?php  echo"$x[0]";?>">write a comment</a>
                <li>Comments:</li>
                <?php 
                $stmt = $pdo->query("SELECT * FROM `comments`");?>
                <?php foreach($stmt->fetchALL() as $y): ?>
            <ul class="blogs">
                <?php if($y[4] === $x[0]):?>
                <li><h3><?=$y[1]?></h3></li>
                <li><?=$y[2]?></li>
                <li><?=$y[3]?></li>
                <hr class="hr new1">
                <?php endif;?>
            </ul>
            <?php endforeach; ?>    
               
            </ul>
   <?php endforeach; ?>
        </div>
    </body>
</html>

                

