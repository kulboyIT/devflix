<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
    <link rel="icon" type="image/x-icon" href="favi.ico">
</head>
<body>
    <br>
    <p style="text-align:center;"><img src="logo.png" alt="Logo"></p>
    <br>
    <h1>
        Welcome to the login page !
        <?php
         session_start();
         if(isset($_SESSION["user"]))
         {
            echo "<p style='text-align:center;font-size:120%;'><i>".$_SESSION["user"]."</i></p>";
         }
        ?>
    </h1>
    <br><br>
    <a href="temp.php" target="_self">
        <p style="text-align:center;"><button class="log-out">LOG OUT</button></p>
    </a>
</body>
</html>