<?php
session_start();
if(isset($_POST['cancel-item'])){

    require "dbhinc.php";

    $cartid = $_GET['cartid'];

    $sql="DELETE FROM cart WHERE cartid=? ";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        $_SESSION['error-message'] = "Error!";
        header("Location: ../templates/cart.php?error=sqlerror");                   
        exit();
    }
    else
    {
        mysqli_stmt_bind_param($stmt,"s",$cartid);
        mysqli_stmt_execute($stmt);      
        $_SESSION['success-message']="Item removed from your cart successfully!";
        header("Location: ../templates/cart.php");
        exit();
    }
}
else{
    $_SESSION['error-message'] = "Error!";
    header("Location:../templates/cart.php");
    exit();
 }
