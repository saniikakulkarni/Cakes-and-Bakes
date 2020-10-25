<?php
    session_start();
    if(isset($_POST['save-review']) && isset($_SESSION['userid']))
    {
        require "dbhinc.php";
        $itemid = $_GET['itemid'];
        $itemname = $_GET['itemname'];
        $userid = $_SESSION['userid'];
        $rating = $_POST['rating'];
        $review = $_POST['review'];
        
        $sql="INSERT INTO review (userid,itemid,rating,review) VALUES(?,?,?,?)";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            $_SESSION['error-message'] = "Error!";
            header("Location:../templates/itempage.php?itemname=$itemname&error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt,"ssss",$userid,$itemid,$rating,$review);
            mysqli_stmt_execute($stmt);
            $_SESSION['success-message'] = "Review added successfully!";
            header("Location:../templates/itempage.php?itemname=$itemname&success=review&added");
            exit();
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    else
    {
        $_SESSION['error-message'] = "Login required";
        header("Location:../templates/itempage.php?itemname=$itemname&error=login first");
        exit();
    }
?>