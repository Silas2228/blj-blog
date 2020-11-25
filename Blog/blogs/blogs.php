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
    ?>¨
        <div class="gridblogs">
            <ul>
                <?php
                $stmt = $pdo->query("SELECT * FROM `datenblog`");
                
                foreach($stmt->fetchAll() as $x) {
                echo"<li>$x[1]</li>";
                echo"<li>$x[2]</i>";
                }
                ?>
            </ul>
        </div>

    </body>

</html>