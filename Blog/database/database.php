<?php
$errors = [];
//connection 

//try {
    $user = 'root';
    $password = '';
    $pdo = new PDO('mysql:host=localhost;dbname=blog1', $user, $password, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    ]);
//}
//catch(PDOException $e)
//{
   // die('Keine Verbindung zur Database möglich' . $e->getMessage());
//}

       
                   
                                    
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = trim($_POST['title'] ?? '');
    $created_by = trim($_POST['name'] ?? '');
    $blog = trim($_POST['blog'] ?? '');
    $link = trim($_POST['link']  ?? '');
                                          

    if($title === '')
    {
        array_push($errors, "Please enter a title!");
    }
    if($created_by === '')
    {
        array_push($errors, "Please enter a username!");
    }
    if($blog === '')
    {
        array_push($errors, "Please enter your blog!");
    }
    else {

        //insert into database
        $stmt = $pdo->prepare('INSERT INTO datenblog (title_blog, username, blog, link, usertime) 
            VALUES (:title_blog, :username, :blog, :link, now())');

        $stmt->execute([':title_blog' => $title, ':username' => $created_by, ':blog' => $blog, ':link' => $link]);
    }
}
       
?>


