<?php
    session_start();
    if(isset($_POST['save-address']) && isset($_SESSION['userid']))
    {
        require "dbhinc.php";

        $userid = $_SESSION['userid'];
        $custname=$_POST['custname'];
        $contactnum=$_POST['contactnum'];
        $address= $_POST['address'];
        
        $sql="INSERT INTO recipientdetails (userid,fullname,contactnumber,address) VALUES(?,?,?,?)";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location:../templates/profile.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt,"ssis",$userid,$custname,$contactnum,$address);
            mysqli_stmt_execute($stmt);
            header("Location:../templates/profile.php?success=address added successfully");
            exit();
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    else
    {
        header("Location:../templates/homepage.php?error=login first");
        exit();
    }
?>