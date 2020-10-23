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
            $_SESSION['error-message'] = "Error!";
            header("Location:../templates/profile.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt,"ssis",$userid,$custname,$contactnum,$address);
            mysqli_stmt_execute($stmt);
            $_SESSION['success-message'] = "Address added successfully!";
            header("Location:../templates/profile.php?success=address&added");
            exit();
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    else
    {
        $_SESSION['error-message'] = "Login required";
        header("Location:../templates/homepage.php?error=login first");
        exit();
    }
?>