<?php
$errors = [];
$formsent = false;






//connectiom    
try {
    $user = 'root';
    $password = '';
    $pdo = new PDO('mysql:host=localhost;dbname=blog', $user, $password, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    ]);
}
catch(PDOException $e)
{
    die('Keiene Verbindung zur Database möglich' . $e->getMessage());
}

$dbConnection = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
//insert into database
$stmt = $pdo->prepare('INSERT INTO datenblog (created_by, blog, time) 
                                    VALUES (:created_by, :blog, now())');
                                    
                                    $created_by = $_POST['name'] ?? '';
                                    $blog = $_POST['blog'] ?? '';

$stmt->execute([':created_by' => $created_by, ':blog' => $blog ]);

//select        
//$stmt = $pdo->prepare('SELECT * FROM `datenblog` WHERE id = :id');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $created_by = trim($created_by);
    $blog = trim($blog);

    if(!empty($_REQUEST['query']))
    {
    $blog = $_REQUEST['blog'];
    }

}
       


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
        <input class="input" type="text" id="name" name="name"></input>
        <label class="homelabels" for="blog"><h2>Ihr Blog:</h2></label>
        <textarea class ="inputblog" type="text"rows="6" cols="40" class="cssdesign" id="blog" name="blog"></textarea> 
        <button class="buttonnav" type="submit" value="abschicken">Posten</button>
        </form>
    </div>

</body>
</html>