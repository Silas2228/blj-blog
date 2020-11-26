<!DOCTYPE html>
<html>

<head> 
    <meta charset="utf-8">
    <link rel="stylesheet" href="bljpages.css">
</head>
    <body>
    <?php
        include '../nav/navigation.php';
        require 'databaseblj.php';
    ?>
        <div class="gridblogs">
        <?php $stmt = $pdo->query("SELECT * FROM `blog_url`");   ?>
        <?php foreach($stmt->fetchAll() as $x): ?>
            <ul class="blogs">
                <li><h3><a href=<?=$x["blogUrl"]?>></a><?= $x["blogAuthor"]?></h3></li>
                
            </ul>
        <?php endforeach; ?>
        </div>
    </body>
</html>
