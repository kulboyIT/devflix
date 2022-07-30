<!DOCTYPE html>
<html>
    <head>
        <title>Devflix Sign Up</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="icon" type="image/x-icon" href="favi.ico">
    </head>
    <body>
        <div class="loginbox">
            <img src = "favi.ico" class="doll">
            <h1>Sign Up Here</h1>
            <form method="POST" action="newuserlogin.php">
                <p>Your User Name?</p>
                <input type="text" name="username" placeholder="Enter your User Name">
                <p>Your Password?</p>
                <input type="password" name="password" placeholder="Enter your password"> 
                <input type="submit" name="submit" value="CREATE ACCOUNT">
            </form>
        </div>
        <?php
if(isset($_GET["error"]))
{
    if($_GET["error"] == "emptyinput")
    {
        echo "<p style='color:white;text-align:center;background-color:red;padding: 5px;opacity:0.90;'>Fill in all fields!</p>";
    }
    else if($_GET["error"] == "invalid_username")
    {
        echo "<p style='color:white;text-align:center;background-color:#671178;padding: 5px;opacity:0.90;'>Choose a proper username!</p>";
    }
    else if($_GET["error"] == "username_taken")
    {
        echo "<p style='color:white;text-align:center;background-color:#180F6C;padding: 5px;opacity:0.90;'>Username taken. Try a different one!</p>";
    }
    else if($_GET["error"] == "statement_failed")
    {
        echo "<p style='color:black;text-align:center;background-color:#E5F601;padding: 5px;opacity:0.90;'>Something went wrong. Try again!</p>";
    }
    else if($_GET["error"] == "none")
    {
        echo "<p style='color:white;text-align:center;background-color:#22B24D;padding: 5px;opacity:0.90;'>Account created successfully!</p>";
    }
}
?>
    </body>
</html>
