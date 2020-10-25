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
            $sql1="SELECT AVG(rating) as avg_ratings,COUNT(*) as total_ratings FROM review GROUP BY itemid HAVING itemid=?";
            $stmt1 = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt1,$sql1))
            {
                $_SESSION['error-message'] = 'Error!';
                header("Location: ../templates/itempage.php?itemname=$itemname&error=sqlerror");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($stmt1,"s",$itemid);
                mysqli_stmt_execute($stmt1);
                $result1 = mysqli_stmt_get_result($stmt1);
                if($row1 = mysqli_fetch_assoc($result1))
                {
                   $avgratings = $row1['avg_ratings'];
                   $totalratings = $row1['total_ratings'];
                   $sql2="UPDATE item SET rating=?,star=? WHERE itemid=?";
                   $stmt2=mysqli_stmt_init($conn);
                   if(!mysqli_stmt_prepare($stmt2,$sql2))
                   {
                       $_SESSION['error-message'] = "Error!";
                       header("Location:../templates/itempage.php?itemname=$itemname&error=sqlerror");
                       exit();
                   }
                   else
                   {
                       mysqli_stmt_bind_param($stmt2,"sss",$totalratings,$avgratings,$itemid);
                       mysqli_stmt_execute($stmt2);
                       $_SESSION['success-message'] = "Review added successfully!";
                        header("Location:../templates/itempage.php?itemname=$itemname&success=review&added");
                        exit();
                   }                          
                }
            } 
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