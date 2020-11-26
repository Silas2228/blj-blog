<!DOCTYPE html>
<html>

<head> 
    <meta charset="utf-8">
    <link rel="stylesheet" href="blogs.css">
</head>
    <body>
    <?php
        include '../nav/navigation.php';
        require '../database/database.php';
    ?>
        <div class="gridblogs">
        <?php $stmt = $pdo->query("SELECT * FROM `datenblog`");   ?>
        <?php foreach($stmt->fetchALL() as $x): ?>
            <ul class="blogs">
                <li><h3><?= $x[1]?></h3></li>
                <li><h5><?=$x[2]?></h5></li>
                <li><?= $x[3]?></li>
                <li><?=$x[4]?></li>
                <li><?=$x[5]?></li><hr class="hr new1">
            </ul>
        <?php endforeach; ?>
        </div>
    </body>
</html>

                

