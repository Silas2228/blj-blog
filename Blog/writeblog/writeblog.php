

<!DOCTYPE html>
<html>
<head> 
    <meta charset="utf-8">
    <link rel="stylesheet" href="writeblog.css">
    </head>
<body>
    <?php
        include '../nav/navigation.php';
        include '../database/database.php';
    ?>
    <div class="gridhome">
        <h2>Write your blog!</h2>
        <form action="writeblog.php" method="POST">
        <label class="homelabels" for="title"><h3>Title:</h3></label>
        <input class="input" type="text" name="title"id="title"></input>
        <label class="homelabels" for="name"><h3>Name:</h3></label>
        <input class="input" type="text" id="name" name="name"></input>
        <label class="homelabels" for="blog"><h3>Blog:</h3></label>
        <textarea class ="inputblog" type="text"rows="6" cols="40" class="cssdesign" id="blog" name="blog"></textarea> 
        <label class="homelabels" for="link"><h3>Picture link:</h3></label>
        <input class="input" type="text" id="link"></input>
        <div class="buttonpost"><button class="buttonnav" type="submit" name="submit">Post</button></div>
        </form>

    </div>
    <ul class="error-box">
        <?php
            foreach ($errors as $error)
            {
                echo "<li>$error</li>";
            }
        ?>
        
    </ul>
</body>


</html>