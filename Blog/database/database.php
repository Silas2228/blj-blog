<?php
$errors = [];
//connection 

//try {
    $user = 'root';
    $password = '';
    $pdo = new PDO('mysql:host=localhost;dbname=blog', $user, $password, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    ]);
//}
//catch(PDOException $e)
//{
   // die('Keine Verbindung zur Database möglich' . $e->getMessage());
//}

//insert into database
$stmt = $pdo->prepare('INSERT INTO datenblog (title_blog, created_by, blog, created_at, link) 
                                    VALUES (:title_blog, :created_by, :blog, :link, now())');
                                    
                                    $title = $_POST['title'] ?? '';
                                    $created_by = $_POST['name'] ?? '';
                                    $blog = $_POST['blog'] ?? '';
                                    $link = $_POST['link']  ?? '';
                                    
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $created_by = trim($created_by);
    $blog = trim($blog);
    $title = trim($title);
    $link = trim($link);

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
        $stmt->execute([':title_blog' => $title, ':created_by' => $created_by, ':blog' => $blog, ':link' => $link]);
        header("Location: ../blogs/blogs.php");
    }
}
       
?>