<?php
    session_start();
    if(isset($_POST['addtocart-btn']) && isset($_SESSION['email']) )
    {
        if($_SESSION['email']!='admin@gmail.com')
        {
            require "../includes/dbhinc.php";
            $itemid=$_GET['itemid'];
            $userid=$_SESSION['userid'];
            $qp=explode(": ",$_POST['upgrade']);
            $quantity=$qp[0];
            $pricetemp=explode("₹",$qp[1]);
            $price=intval($pricetemp[1]);
            $sql="INSERT INTO cart (userid,itemid,quantity,price) VALUES(?,?,?,?)";
            $stmt=mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql))
            {
                $_SESSION['error-message'] = "Error!";
                header("Location:../templates/homapage.php?error=sqlerror");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($stmt,"ssss",$userid,$itemid,$quantity,$price);
                mysqli_stmt_execute($stmt);
                $_SESSION['success-message'] = "Item succefully added to Cart";
                header("Location:../templates/cart.php?success=item&added&to&cart");
                exit();
            }
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        }
        else if($_SESSION['email']=='admin@gmail.com')
        {
            $_SESSION['error-message'] = "Admin cannot access this page";
            header("Location:../templates/homepage.php?error=Admin cannot access this page");
            exit();
        }
    }
    else if(!(isset($_SESSION['email'])))
    {
        $_SESSION['error-message'] = "Login Required";
        header("Location:../templates/homepage.php?error=Login First");
        exit();
    }
    else if(!isset($_POST['addtocart-btn']))
    {
        $_SESSION['error-message'] = "Select the Item first to Add";
        header("Location:../templates/homepage.php?error=First Select Item to Add");
        exit();
    } 
?>