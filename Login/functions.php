<?php
function emptyInputSignup($uname,$password)
{
    $result;
    if(empty($uname) || empty($password))
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}

function invalidUid($uname)
{
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/",$uname))
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}

function uidExists($conn,$uname)
{
    $sql = "SELECT * FROM loginform WHERE User=?;";
    //Prepared statement
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: newuser.php?error=statement_failed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s",$uname);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData))
    {
        return $row;
    }
    else
    {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn,$uname,$password)
{
    $sql = "INSERT into loginform (User, Pass) VALUES (?,?);";
    //Prepared statement
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: index.php?error=statement_failed");
        exit();
    }
    $hashedPwd = password_hash($password,PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt,"ss",$uname,$hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: newuser.php?error=none");
    exit();
}

function loginUser($conn,$uname,$password)
{
    $uidExists = uidExists($conn,$uname);
    if($uidExists === false)
    {
        header("Location: index.php?error=wronglogin");
        exit();
    }
    $pwdHashed = $uidExists["Pass"];
    $checkPwd = password_verify($password,$pwdHashed);
    if($checkPwd === false)
    {
        header("Location: index.php?error=wronglogin");
        exit();
    }
    elseif($checkPwd === true)
    {
        session_start();
        $_SESSION["id"] = $uidExists["ID"];
        $_SESSION["user"] = $uidExists["User"];
        header("Location: user.php?signup=success");
        exit();
    }
}