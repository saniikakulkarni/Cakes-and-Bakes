<?php
    session_start();
    if(isset($_POST['additem-btn']) && $_SESSION['email']=='admin@gmail.com')
    {
        require "dbhinc.php";
        $category=$_POST['category'];
        $name= $_POST['name'];
        $quantityprice=$_POST['quantityprice'];
        $availability= $_POST['availability'];
        $description=$_POST['description'];
        $imgarray=[];
        if($_FILES['itemimages']['size']>0)
        {
            for($i=0;$i<4;$i++)
            {
                if(isset($_FILES['itemimages']['name'][$i]))
                {
                    $itemimg=$name."_".$category."_".$i.$_FILES['itemimages']['name'][$i];
                }
               else
               {
                    $itemimg=$name."_".$category."_".$i.'default.png';
               }
              if(!(move_uploaded_file($_FILES['itemimages']['tmp_name'][$i],'../templates/itemimages/'.$itemimg)))
                {
                    $_SESSION['error-message'] = "Failed to uplaod";
                    header("Location:../templates/adminadditems.php?error6");
                    exit();
               }
               else
               {
                   array_push($imgarray,$itemimg);
               }
            }
        }
        
        $sql="INSERT INTO item (category,name,quantityprice,description,availability,img1,img2,img3,img4) VALUES(?,?,?,?,?,?,?,?,?)";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location:../templates/adminadditems.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt,"sssssssss",$category,$name,$quantityprice,$description,$availability,$imgarray[0],$imgarray[1],$imgarray[2],$imgarray[3]);
            mysqli_stmt_execute($stmt);
            header("Location:../templates/results.php?category=$category");
            exit();
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    /*else if($_SESSION['email']=='admin@gmail.com')
    {
        header("Location:../templates/adminadditems.php?error=additem to access this page");
        exit();
    }
    else
    {
        header("Location:../templates/homepage.php?error=login first");
        exit();
    }*/
?>