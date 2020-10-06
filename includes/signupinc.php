<?php
if(isset($_POST['signup-btn']))
{
   require 'dbhinc.php';
   $fullname=$_POST['fullname'];
   $email=$_POST['email'];
   $password=$_POST['pwd'];
   $confirmpassword=$_POST['confirm-pwd'];

   if($password!==$confirmpassword)
   {
      header("Location:../homepage.php?error=passwordcheck&fullname=".$fullname."&email=".$email);
      exit();
   }
   else
   {
      $sql="SELECT email FROM userdetails WHERE email=?";
      $stmt=mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt,$sql))
      {
         header("Location:../homepage.php?error=sqlerror");
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
            header("Location:../homepage.php?error=emailtaken&fullname=".$fullname);
            exit();
         }
         else
         {
               $sql="INSERT INTO userdetails (fullname,email,password) VALUES(?,?,?)";
               $stmt=mysqli_stmt_init($conn);
               if(!mysqli_stmt_prepare($stmt,$sql))
               {
                  header("Location:../homepage.php?error=sqlerror");
                  exit();
               }
               else
               {
                  $hashedPwd=password_hash($password, PASSWORD_DEFAULT);
                  mysqli_stmt_bind_param($stmt,"sss",$fullname,$email,$hashedPwd);
                  mysqli_stmt_execute($stmt);
                  header("Location:../homepage.php?signup=success");
                  exit();
               }
          }

      }
   }
   mysqli_stmt_close($stmt);
   mysqli_close($conn);
}
else{
   header("Location:../homepage.php");
   exit();
}