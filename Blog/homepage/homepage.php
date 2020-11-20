<?php
$name    = $_POST['name']    ?? '';

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
        <h2>Schreibe einen Blog:</h2>
        <label class="homelabels" for="name"><h2>Ihr Name:</h2></label>
        <input class="input" type="text" id="name" name="name" value="<?= $name ?? '' ?>">
        <label class="homelabels" for="blog"><h2>Ihr Blog:</h2></label>
        <input class="inputblog" type="text" id="blog" name="blog" value="<?= $blog?? '' ?>">
      
    </div>

</body>
</html>