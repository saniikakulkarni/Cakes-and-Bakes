<?php
session_start();
if(isset($_POST['modify'])){

    require "dbh.php";
    
    $userid = $_SESSION['userid'];
    $name = $_POST['name'];
    $abtme = $_POST['aboutme'];
    $connect = $_POST['connectme'];
    if($_FILES['profilephoto']['size']>0)
    {
        $setflag=1;
        $profileimg = $userid . '_' . $_FILES['profilephoto']['name'];
        $target = '../profile-images/'.$profileimg;

        if(!(move_uploaded_file($_FILES['profilephoto']['tmp_name'],$target)))
        {
            $_SESSION['error-message'] = "Failed to uplaod";
            header("Location:../profile.php?error6");
            exit();
        }
    }
    else{
        $setflag=0;
    }
   
    $sql="SELECT * FROM userdetails WHERE userid=?";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        $_SESSION['error-message'] = "Error!";
        header("Location:../profile.php?error1");           
        exit();
    }
    else
    {
        mysqli_stmt_bind_param($stmt,"s",$userid);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck=mysqli_stmt_num_rows($stmt);
        if($resultCheck>0)
        {
            if($setflag==0)
            {
                $sql = "SELECT * FROM userdetails WHERE userid=?";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    $_SESSION['error-message'] = "Error!";
                    header("Location: ../home.php?error=sqlerror");
                    exit();
                }
                else
                {
                    mysqli_stmt_bind_param($stmt,"s",$userid);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    $row = mysqli_fetch_assoc($result);
                    $profileimg = $row['profileimg'];
                    echo $profileimg;
                }   
            }
            $sql="UPDATE userdetails SET aboutme=?, connection=?, profileimg=? WHERE userid=? ";
            $stmt=mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql))
            {
                $_SESSION['error-message'] = "Error!";
                header("Location: ../profile.php?error2");                   
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($stmt,"ssss",$abtme,$connect,$profileimg,$userid);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $sql2 = "UPDATE user SET name=? WHERE userid=? ";
                $stmt2 = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt2,$sql2))
                {
                    $_SESSION['error-message'] = "Error!";
                    header("Location: ../profile.php?error3");                        
                    exit();
                }
                else
                {
                    mysqli_stmt_bind_param($stmt2,"ss",$name,$userid);
                    mysqli_stmt_execute($stmt2);
                    mysqli_stmt_store_result($stmt2);
                    $_SESSION['success-message']="Profile updated successfully!";
                    header("Location:../profile.php?success1");
                    exit();
                }
            }
        }
        else
        {
            if($setflag==0)
            {
                $profileimg = "defaultprofilepic1.png";
            }
            $sql="INSERT INTO userdetails (userid,aboutme,connection,profileimg) VALUES(?,?,?,?)";
            $stmt=mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql))
            {
                $_SESSION['error-message'] = "Error!";
                header("Location:../profile.php?error4");                   
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($stmt,"ssss",$userid,$abtme,$connect,$profileimg);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $sql2 = "UPDATE user SET name=? WHERE userid=? ";
                $stmt2 = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt2,$sql2))
                {
                    $_SESSION['error-message'] = "Error!";
                    header("Location: ../profile.php?error5");                     
                    exit();
                }
                else
                {   
                    mysqli_stmt_bind_param($stmt2,"ss",$name,$userid);
                    mysqli_stmt_execute($stmt2);
                    mysqli_stmt_store_result($stmt2);
                    $_SESSION['success-message']="Profile updated successfully!";
                    header("Location:../profile.php?success2");                     
                    exit();
                } 
            }
        }
    }
}
else{
    header("Location:../profile.php");
    exit();
 }
