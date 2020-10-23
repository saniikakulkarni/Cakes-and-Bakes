<?php

session_start();

if(isset($_POST['signup-btn']))
{
   require 'dbhinc.php';
   $fullname=$_POST['fullname'];
   $email=$_POST['email'];
   $password=$_POST['pwd'];
   $confirmpassword=$_POST['confirm-pwd'];

   if($password!==$confirmpassword)
   {
      $_SESSION['error-message'] = "Password do not match";
      header("Location:../templates/homepage.php?error=passwordcheck");
      exit();
   }
   else
   {
      $sql="SELECT email FROM userdetails WHERE email=?";
      $stmt=mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt,$sql))
      {
         $_SESSION['error-message'] = "Error!";
         header("Location:../templates/homepage.php?error=sqlerror");
         exit();
      }
      else
      {
         mysqli_stmt_bind_param($stmt,"s",$email);
         mysqli_stmt_execute($stmt);
         mysqli_stmt_store_result($stmt);
         $resultCheck=mysqli_stmt_num_rows($stmt);
         if($resultCheck>0)
         {
            $_SESSION['error-message'] = "Email is already taken";
            header("Location:../templates/homepage.php?error=emailtaken");
            exit();
         }
         else
         {
               $sql="INSERT INTO userdetails (fullname,email,password) VALUES(?,?,?)";
               $stmt=mysqli_stmt_init($conn);
               if(!mysqli_stmt_prepare($stmt,$sql))
               {
                  $_SESSION['error-message'] = "Error!";
                  header("Location:../templates/homepage.php?error=sqlerror");
                  exit();
               }
               else
               {
                  $hashedPwd=password_hash($password, PASSWORD_DEFAULT);
                  mysqli_stmt_bind_param($stmt,"sss",$fullname,$email,$hashedPwd);
                  mysqli_stmt_execute($stmt);
                  $_SESSION['success-message'] = "Signed Up successfully!";
                  header("Location:../templates/homepage.php?signup=success");
                  exit();
               }
          }

      }
   }
   mysqli_stmt_close($stmt);
   mysqli_close($conn);
}
else{
   $_SESSION['error-message'] = "Error!";
   header("Location:../templates/homepage.php");
   exit();
}
?>