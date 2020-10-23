<?php
session_start();
if(isset($_POST['edit-profile'])){

    require "dbhinc.php";

    $userid = $_SESSION['userid'];
    $name = $_POST['fullname'];

    $sql="UPDATE userdetails SET  fullname=? WHERE userid=? ";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        $_SESSION['error-message'] = "Error!";
        header("Location: ../profile.php?error=sqlerror");                   
        exit();
    }
    else
    {
        mysqli_stmt_bind_param($stmt,"ss",$name,$userid);
        mysqli_stmt_execute($stmt);      
        $_SESSION['success-message']="Profile updated successfully!";
        header("Location: ../templates/profile.php?success=profileupdated");
        exit();
    }
}
else{
    $_SESSION['error-message'] = "Error!";
    header("Location:../templates/homepage.php");
    exit();
 }
