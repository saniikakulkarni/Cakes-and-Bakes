<?php
session_start();
if(isset($_POST['modify'])){

    require "dbhinc.php";

    $itemid = $_GET['itemid'];
    $category = $_POST['category'];
    $name = $_POST['name'];
    $qp = $_POST['quantityprice'];
    $description = $_POST['description'];
    $availability = $_POST['availability'];
   
    $sql="UPDATE item SET category=?, name=?, quantityprice=?, description=?, availability=? WHERE itemid=? ";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        $_SESSION['error-message'] = "Error!";
        header("Location: ../profile.php?error=sqlerror");                   
        exit();
    }
    else
    {
        mysqli_stmt_bind_param($stmt,"ssssss",$category,$name,$qp,$description,$availability,$itemid);
        mysqli_stmt_execute($stmt);      
        $_SESSION['success-message']="Item updated successfully!";
        header("Location: ../templates/itempage.php?itemname=$name");
        exit();
    }
}
else{
    $_SESSION['error-message'] = "Error!";
    header("Location:../adminmodifyitems.php");
    exit();
 }
