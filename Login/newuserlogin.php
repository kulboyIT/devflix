<?php
include "functions.php";
include "newuser.php";
$host = "sql100.epizy.com";
$user = "epiz_32255975";
$password = "0xL646KHBUh0ra";
$db = "epiz_32255975_demo";

$conn = mysqli_connect($host,$user,$password,$db);
if(!$conn)
{
    die("Connection Failed: ". mysqli_connect_error());
}
if(isset($_POST['submit']))
{
    $uname = $_POST['username'];
    $password = $_POST['password'];
    //Do error handlings here...
    if(emptyInputSignup($uname,$password)!==false)
    {
        header("location: newuser.php?error=emptyinput");
        exit();
    }
    if(invalidUid($uname)!==false)
    {
        header("location: newuser.php?error=invalid_username");
        exit();
    }
    if(uidExists($conn,$uname)!==false)
    {
        header("location: newuser.php?error=username_taken");
        exit();
    }
    createUser($conn,$uname,$password);
}
?>
