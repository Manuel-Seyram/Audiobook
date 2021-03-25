<?php
include('security.php');
//delete user details
$con = mysqli_connect("localhost", "root", "", "audiobook");
if (isset($_POST['delete_user_btn']))
    {
                  $id= $_POST['delete_user_id'];

                  $query= "DELETE FROM users WHERE id='$id'";
                  $query_run= mysqli_query($con, $query);

        if($query_run)
        {
                $_SESSION['success']= " User Profile Deleted Successfully";
             header('Location: admins.php');
        }
        else
        {
           $_SESSION['status']= "Admin Profile Not Deleted ";
           header('Location: admins.php');
       }
   }

   if (isset($_POST['delete_btn']))
    {
                  $id= $_POST['delete_user'];

                  $query= "DELETE FROM audio WHERE id='$id'";
                  $query_run= mysqli_query($con, $query);

        if($query_run)
        {
                $_SESSION['success']= " User Profile Deleted Successfully";
             header('Location: ViewUploads.php');
        }
        else
        {
           $_SESSION['status']= "Admin Profile Not Deleted ";
           header('Location: Viewuploads.php');
       }
   }
?>
?>