<!DOCTYPE html>
<html>

<head> 
    <meta charset="utf-8">
    <link rel="stylesheet" href="blogs.css">
</head>

    <body>
    <?php
        include '..\nav\navigation.php';
        include '../database/database.php';
    ?>¨
        <div class="gridblogs">
            <ul>
                <?php
                $stmt->execute([':id' => 1]);
                foreach($stmt->fetchAll() as $x) {
                    var_dump($x);
                }
                ?>
            </ul>
        </div>

    </body>

</html>