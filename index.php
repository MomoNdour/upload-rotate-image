<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>fonctions</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <form action="treatment.php" method="POST" enctype = "multipart/form-data" >
        <?php
            if(isset($_GET) && !empty($_GET) && $_GET['mode']== "dir"){
                echo '<label for="file" >Upload par un dossier</label><br><input type="file" name="file" id="file" size="50" />
                <p><a href="?mode=">Annuler</a></p>';
            }else{
                echo '<label for="url" >Upload par URL</label><br><input type="text" name="url" id="url" size="50" /><input type="reset" name="reset" value="Annuler"/><br>
                <p><a href="?mode=dir" >Uploader depuis un dossier</a></p>';
            }
        ?>
        <br><input type="submit" name ="submit">

        <div>
            <img src="test.jpg" alt="" name="image_rotate"><br>
            <input type="submit" name="rotate" value="Rotate">
        </div>
    </form>
</body>
</html>