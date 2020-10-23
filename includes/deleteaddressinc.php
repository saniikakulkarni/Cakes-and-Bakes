<?php
session_start();

require "dbhinc.php";

$userid = $_SESSION['userid'];
$recipientid= $_GET['recipientid'];

$sql="DELETE FROM recipientdetails WHERE recipientid=? ";
$stmt=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql))
{
    $_SESSION['error-message'] = "Error!";
    header("Location: ../profile.php?error=sqlerror");                   
    exit();
}
else
{
    mysqli_stmt_bind_param($stmt,"s",$recipientid);
    mysqli_stmt_execute($stmt);      
    $_SESSION['success-message']="Item deleted successfully!";
    header("Location: ../templates/profile.php");
    exit();
}

