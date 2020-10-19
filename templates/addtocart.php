<?php
    session_start();
    if(isset($_POST['addtocart-btn']) && isset($_SESSION['email']) )
    {
        if($_SESSION['email']!='admin@gmail.com'){
            require "../includes/dbhinc.php";
            $itemid=$_GET['itemid'];
            $userid=$_SESSION['userid'];
            $qp=explode(": ",$_POST['upgrade']);
            $quantity=$qp[0];
            $pricetemp=explode("₹",$qp[1]);
            $price=intval($pricetemp[1]);
            echo $itemid;
            echo $userid;
            echo $quantity;
            echo print_r($pricetemp);
            echo $price;
            /*$sql="INSERT INTO cart (userid,itemid,quantity,price) VALUES(?,?,?,?)";
            $stmt=mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql))
            {
                header("Location:../templates/homapage.php?error=sqlerror");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($stmt,"sssi",$itemid,$userid,$quantity,$price);
                mysqli_stmt_execute($stmt);
                header("Location:../templates/cart.php?successfully added item");
                exit();
            }
            mysqli_stmt_close($stmt);
            mysqli_close($conn);*/
        }
        /*else if($_SESSION['email']=='admin@gmail.com')
        {
            header("Location:../templates/homepage.php?error=Admin cannot access this page");
            exit();
        }*/
    }
    /*else if(!(isset($_SESSION['email'])))
    {
        header("Location:../templates/homepage.php?error=Login First");
        exit();
    }
    else if(!isset($_POST['addtocart-btn']))
    {
        header("Location:../templates/homepage.php?error=First Select Item to Add");
        exit();
    } */
?>