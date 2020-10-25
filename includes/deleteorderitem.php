<?php
session_start();
if(isset($_GET['orderid'])){
    require "dbhinc.php";
    $orderid = $_GET['orderid'];
    $sql="DELETE FROM orderdetails WHERE orderid=? ";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        $_SESSION['error-message'] = "Error!";
        header("Location: ../templates/cart.php?error=sqlerror");                   
        exit();
    }
    else
    {
        mysqli_stmt_bind_param($stmt,"s",$orderid);
        mysqli_stmt_execute($stmt);      
        $_SESSION['success-message']="Item removed from your order successfully!";
        header("Location: ../templates/track-order.php");
        exit();
    }
}
else{
    $_SESSION['error-message'] = "Error!";
    header("Location:../templates/track-order.php");
    exit();
 }
?>