<?php
$errors = [];
//connection 

//try {
    $user = 'd041e_sireichlin';
    $password = '12345_Db!!!';
    $pdo = new PDO('mysql:host=mysql2.webland.ch;dbname=d041e_sireichlin', $user, $password, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    ]);
//}
//catch(PDOException $e)
//{
   // die('Keine Verbindung zur Database möglich' . $e->getMessage());
//}          
                                    
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = htmlspecialchars(trim($_POST['title'] ?? ''));
    $created_by = htmlspecialchars(trim($_POST['name'] ?? ''));
    $blog = htmlspecialchars(trim($_POST['blog'] ?? ''));
    $link = htmlspecialchars(trim($_POST['link']  ?? ''));
    

                                        

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
        $stmt = $pdo->prepare('INSERT INTO blog1 (title_blog, username, blog, link, usertime) 
            VALUES (:title_blog, :username, :blog, :link, now())');

        $stmt->execute([':title_blog' => $title, ':username' => $created_by, ':blog' => $blog, ':link' => $link]);
    }
}


//<script>
//window.location.href = "www.google.com";
//</script>

?>
<?php
                          $errorscomment = [];

                          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                              $commentname = htmlspecialchars(trim($_POST['namecomment'] ?? ''));
                              $comment = htmlspecialchars(trim($_POST['comment'] ?? ''));
                              $postid = $_POST['postid'] ?? '';
                              

                              if($commentname === '')
                              {
                                  array_push($errorscomment, "Please enter a username!");
                              }
                              if($comment === '')
                              {
                                  array_push($errorscomment, "Please enter a comment!");
                              }
                              else
                              {  
                              $stmt = $pdo->prepare('INSERT INTO comments (commentname, comment, id_post, commenttime)
                                  VALUES (:commentname, :comment, :id_post , now())');
                                $stmt->execute(['commentname' => $commentname, 'comment' => $comment,'id_post' => $postid]);
                              }
                          }
?>


