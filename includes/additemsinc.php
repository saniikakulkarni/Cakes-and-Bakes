<?php
    session_start();
    if(isset($_POST['additem-btn']) && $_SESSION['email']=='admin@gmail.com')
    {
        require "dbhinc.php";
        $category=$_POST['category'];
        $name= $_POST['name'];
        $quantityprice=$_POST['quantityprice'];
        $availability= $_POST['availability'];
        $description=$_POST['description'];
        
        $sql="INSERT INTO item (category,name,quantityprice,description,availability) VALUES(?,?,?,?,?)";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location:../templates/adminadditems.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt,"sssss",$category,$name,$quantityprice,$description,$availability);
            mysqli_stmt_execute($stmt);
            header("Location:../templates/results.php?category=$category");
            exit();
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    else if($_SESSION['email']=='admin@gmail.com')
    {
        header("Location:../templates/adminadditems.php?error=additem to access this page");
        exit();
    }
    else
    {
        header("Location:../templates/homepage.php?error=login first");
        exit();
    }
?>