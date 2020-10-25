<?php
session_start();
if(isset($_POST['changestatus-btn']))
{
    require "dbhinc.php";
    $orderid = $_GET['orderid'];
    $status=$_POST['status'];
    $sql="UPDATE orderdetails SET status=? WHERE orderid=? ";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        $_SESSION['error-message'] = "Error!";
        header("Location: ../templates/adminorders.php?error=sqlerror");                   
        exit();
    }
    else
    {
        mysqli_stmt_bind_param($stmt,"ss",$status,$orderid);
        mysqli_stmt_execute($stmt);      
        $_SESSION['success-message']="Status updated successfully!";
        header("Location: ../templates/adminorders.php");
        exit();
    }
}
else{
    $_SESSION['error-message'] = "Error!";
    header("Location:../templates/adminorders.php");
    exit();
 }
