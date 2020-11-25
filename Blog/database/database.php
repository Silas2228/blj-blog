<?php
$errors = [];
//connection 

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
    die('Keine Verbindung zur Database möglich' . $e->getMessage());
}

//insert into database
$stmt = $pdo->prepare('INSERT INTO datenblog (created_by, blog, time) 
                                    VALUES (:created_by, :blog, now())');
                                    
                                    $created_by = $_POST['name'] ?? '';
                                    $blog = $_POST['blog'] ?? '';

$stmt->execute([':created_by' => $created_by, ':blog' => $blog ]);

//select        
$stmt = $pdo->prepare('SELECT * FROM `datenblog` WHERE id = :id');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $created_by = trim($created_by);
    $blog = trim($blog);

    if(!empty($_REQUEST['query']))
    {
    $blog = $_REQUEST['blog'];
    }
    if($created_by === '')
    {
        array_push($errors, "Please enter a username!");
    }
    if($blog === '')
    {
        array_push($errors, "Please enter your blog!");
    }

}
       
?>