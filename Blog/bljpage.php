<!DOCTYPE html>
<html>

<head> 
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bljpages.css">
</head>
    <body>
    <?php
        include('navigation.php');
        require ('database/databaseblj.php');
    ?>
        <div class="gridblogs">
        <?php $stmt = $pdo->query("SELECT * FROM `blog_url`");   ?>
        <?php foreach($stmt->fetchAll() as $x): ?>
            <ul class="blogs">
                <li><h3><a class="blogs" href="<?=$x["blogUrl"]?>"><?= $x["blogAuthor"]?></a></h3></li>
                
            </ul>
        <?php endforeach; ?>
        </div>
    </body>
</html>
