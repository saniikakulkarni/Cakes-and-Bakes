<?php
    session_start();
    if(isset($_POST['orderconfirm-btn']) && isset($_SESSION['email']) )
    {
        if($_SESSION['email']!='admin@gmail.com')
        {
            require "../includes/dbhinc.php";
            $recipientid=$_POST['address'];
            $userid=$_SESSION['userid'];
            $deliverydate=$_POST['date'];
            $orderdate=date("Y-m-d");
            $paymentmode=$_POST['Payment'];
            $sql="SELECT * FROM cart where userid=?";
            $stmt=mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql))
            {
                $_SESSION['error-message'] = "Error!";
                header("Location:../templates/homapage.php?error=sqlerror");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($stmt,"s",$userid);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                while($row = mysqli_fetch_assoc($result))
                {
                    $itemid=$row['itemid'];
                    $price=$row['price'];
                    $quantity=$row['quantity'];
                    $cartid=$row['cartid'];
                    $status="Order Placed";
                    $sql1="INSERT INTO orderdetails(recipientid,userid,itemid,price,quantity,orderdate,deliverydate,status,paymentmode) VALUES(?,?,?,?,?,?,?,?,?)";
                    $stmt1=mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt1,$sql1))
                    {
                        $_SESSION['error-message'] = "Error!";
                        header("Location:../templates/homapage.php?error=sqlerror");
                        exit();
                    }
                    else
                    {
                        mysqli_stmt_bind_param($stmt1,"sssssssss",$recipientid,$userid,$itemid,$price,$quantity,$orderdate,$deliverydate,$status,$paymentmode);
                        mysqli_stmt_execute($stmt1);
                        $sql2="DELETE FROM cart WHERE cartid=? ";
                        $stmt2=mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt2,$sql2))
                        {
                            $_SESSION['error-message'] = "Error!";
                            header("Location: ../templates/cart.php?error=sqlerror");                   
                            exit();
                        }
                        else
                        {
                            mysqli_stmt_bind_param($stmt2,"s",$cartid);
                            mysqli_stmt_execute($stmt2);
                        }
                    }
                }
                $_SESSION['success-message'] = "Order placed successfully!";
                header("Location:../templates/track-order.php?success=item&added&to&cart");
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
    else if(!isset($_POST['confirmorder-btn']))
    {
        $_SESSION['error-message'] = "Select the Item first to Add";
        header("Location:../templates/homepage.php?error=First Select Item to Add");
        exit();
    } 
?>