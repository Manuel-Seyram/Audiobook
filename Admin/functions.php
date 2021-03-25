<?php
include('security.php');
$con = mysqli_connect("localhost", "root", "", "Audiobook");
//Register code
if(isset($_POST['registerbtn']))
{
    $Firstname= $_POST['Firstname'];
    $Lastname= $_POST['Lastname'];
    $Email= $_POST['Email'];
    $Password= $_POST['Password'];
    $ConfirmPassword=$_POST['ConfirmPassword'];

  if ($Password==$ConfirmPassword)
  {
         $query= "INSERT into register (Firstname,Lastname,Email,Password,ConfirmPassword) VALUES ('$Firstname','$Lastname', '$Email', '$Password', '$ConfirmedPassword')";
         $query_run= mysqli_query($con, $query);

    if($query_run)
    {
                 $_SESSION['success']= " Admin Added Successfully";
              header('Location: register.php');
    }
    else
    {
            $_SESSION['status']= "Admin Not Added ";
            header('Location: register.php');
    }
  }
  else{
    $_SESSION['status']= " Password and Confirm Password Do Not Match";
        header('Location: register.php');
  }

}

?>