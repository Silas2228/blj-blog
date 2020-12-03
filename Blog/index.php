

<!DOCTYPE html>
<html>
<head> 
    <title>Blog</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="index.css">
    </head>
<body>
    <?php
    include("navigation.php");
    ?>
    <div class="gridhome">
    <h2>Register</h2>
<?php 
session_start();
$user = 'd041e_sireichlin';
$password = '12345_Db!!!';
$pdo = new PDO('mysql:host=mysql2.webland.ch;dbname=d041e_sireichlin', $user, $password, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
]);
?>
<?php
$showFormular = true; 
 
if(isset($_GET['register'])) {
    $error = false;
    $email = htmlspecialchars($_POST['email']);
    $passwort = htmlspecialchars($_POST['passwort']);
    $passwort2 = htmlspecialchars($_POST['passwort2']);
  
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Please enter a valid email.<br>';
        $error = true;
    }     
    if(strlen($passwort) == 0) {
        echo 'Please enter a password.<br>';
        $error = true;
    }
    if($passwort != $passwort2) {
        echo 'The password should be the same.<br>';
        $error = true;
    }
    
    
    if(!$error) { 
        $statement = $pdo->prepare("SELECT * FROM login WHERE email = :email");
        $result = $statement->execute(array('email' => $email));
        $user = $statement->fetch();
        
        if($user !== false) {
            echo 'This email is already taken.<br>';
            $error = true;
        }    
    }
    
    
    if(!$error) {    
        $passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);
        
        $statement = $pdo->prepare("INSERT INTO login (email, passwort) VALUES (:email, :passwort)");
        $result = $statement->execute(array('email' => $email, 'passwort' => $passwort_hash));
        
        if($result) {        
            echo '>You have been successfully registered. <a class="buttonnav" href="login.php">Login</a>';
            $showFormular = false;
        } else {
            echo 'An error has occurred<br>';
        }
    } 
}
 
if($showFormular) {
?>

<form action="?register=1" method="post">
<div class ="register">
<h3>E-Mail:</h3><br>
<input type="email" size="40" maxlength="250" name="email"><br><br>
 
<h3>Password:</h3><br>
<input type="password" size="40"  maxlength="250" name="passwort"><br>
 
<h3>Repeat your password:</h3><br>
<input type="password" size="40" maxlength="250" name="passwort2"><br><br>
 
<input class="buttonnav" type="submit" value="send">
</form>
</div>    
<?php
} 
?>
    
</body>
</html> 