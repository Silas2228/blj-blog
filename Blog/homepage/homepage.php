<?php

$user = 'root';
$password = '';
$created_by = $_POST['name'] ?? '';
$blog = $_POST['blog'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(isset($_POST['name'])) {
        $blog = $_POST['name'];
    }
}



$pdo = new PDO('mysql:host=localhost;dbname=blog', $user, $password, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
]);

$stmt = $pdo->prepare('SELECT * FROM `datenblog` WHERE id = :id');
$stmt->execute([':id' => 1]);

foreach($stmt->fetchAll() as $x) {
    var_dump($x);
}


$dbConnection = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
$stmt = $dbConnection->prepare('INSERT INTO addresses (created_by, blog) 
                                    VALUES (:created_by, :blog, now())');
                    
$stmt->execute([':blog' => $blog, 'created_by' => $created_by]);





?>

<!DOCTYPE html>
<html>
<head> 
    <meta charset="utf-8">
    <link rel="stylesheet" href="homepage.css">

<body>
    <?php
        include '..\nav\navigation.php';
    ?>
    <div class="gridhome">
        <h2>Blog schreiben</h2>
        <form action="homepage.php" method="POST">
        <label class="homelabels" for="name"><h2>Ihr Name:</h2></label>
        <input class="input" type="text" id="name" name="name" value="<?= $name ?? '' ?>">
                
        <label class="homelabels" for="blog"><h2>Ihr Blog:</h2></label>
        <textarea class ="inputblog" type="text" id="blog" rows="6" cols="40" class="cssdesign" value="<?= $blog?? '' ?>"></textarea> 
        <button class="buttonnav" type="submit" value="abschicken">Posten</button>
        </form>
    </div>

</body>
</html>