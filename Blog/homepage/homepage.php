

<!DOCTYPE html>
<html>
<head> 
    <meta charset="utf-8">
    <link rel="stylesheet" href="homepage.css">
    
    <?php
    include '../database/database.php';
    foreach ($errors as $error)
    {
        echo "<li>$error</li>";
    }
    ?>
    
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