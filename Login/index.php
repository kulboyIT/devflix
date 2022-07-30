<html>
    <head>
        <title>Devflix Login</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="icon" type="image/x-icon" href="favi.ico">
    </head>
    <body>
        <div class="loginbox">
            <img src = "favi.ico" class="doll">
            <h1>Login Here</h1>
            <form method="POST" action="login.php">
                <p>User Name</p>
                <input type="text" name="username" placeholder="Enter your User Name">
                <p>Password</p>
                <input type="password" name="password" placeholder="Enter your password"> 
                <input type="submit" name="submit" value="LOGIN">
                <a href="#">Forgot your password?</a> <br>
                <a href="newuser.php" target="_blank">New User?</a>
            </form>
        </div>
        <?php
  if(isset($_GET["error"]))
  {
      if($_GET["error"] == "emptyinput")
      {
          echo "<p style='color:white;text-align:center;background-color:red;padding: 5px;opacity:0.90;'>Fill in all fields!</p>";
      }
      elseif($_GET["error"] == "wronglogin")
      {
          echo "<p style='color:white;text-align:center;background-color:#671178;padding: 5px;opacity:0.90;'>Incorrect username!</p>";
      }
  }
  ?>
    </body>
</html>
