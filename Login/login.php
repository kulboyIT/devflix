<?php
session_start();
$host = "sql100.epizy.com";
$user = "epiz_32255975";
$password = "0xL646KHBUh0ra";
$db = "epiz_32255975_demo";

$conn = mysqli_connect($host,$user,$password,$db);
if(!$conn)
{
    die("Connection Failed: ". mysqli_connect_error());
}
if(isset($_POST["submit"]))
{
    $uname = $_POST["username"];
    $password = $_POST["password"];
    //Do error handlings here...
    require_once 'functions.php';
    if(emptyInputSignup($uname,$password)!==false)
    {
        header("location: index.php?error=emptyinput");
        exit();
    }
    loginUser($conn,$uname,$password);
}
else
{
    header("location: index.php");
    exit();
}
?>