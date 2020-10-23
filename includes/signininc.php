<?php

session_start();

if(isset($_POST['signin-btn'])){
    require "dbhinc.php";
    $email = $_POST['email'];
    $password = $_POST['pwd'];

    $sql = "SELECT * FROM userdetails WHERE email=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        $_SESSION['error-message'] = "Error!";
        header("Location: ../templates/homepage.php?error=sqlerror");
        exit();
    }
    else
    {
        mysqli_stmt_bind_param($stmt,"s",$email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($result))
        {
            $pwdCheck = password_verify($password,$row['password']);
            if($pwdCheck == false)
            {
                $_SESSION['error-message'] = "Wrong Password";
                header("Location: ../templates/homepage.php?error=wrongpwd");
                exit();
            }
            else if($pwdCheck == true)
            {
                session_start();
                $_SESSION['userid'] = $row['userid'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['success-message'] = "Logged in successfully!";
                header("Location: ../templates/homepage.php?login=success");
                exit();

            }
            else
            {
                $_SESSION['error-message'] = "Wrong password";
                header("Location: ../templates/homepage.php?error=wrongpwd");
                exit();
            }
        }
        else
        {
            $_SESSION['error-message'] = "Error!";
            header("Location: ../templates/homepage.php?error=nouser");
            exit();
        }
    }
}   
else{
    $_SESSION['error-message'] = "Error!";
    header("Location:../templates/homepage.php");
    exit();
 }
?>