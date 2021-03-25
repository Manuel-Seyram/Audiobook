<?php
include('security.php');

if(isset($_POST['submit'])&& $_POST['submit']== "Submit")
{
    $Text= $_POST['text'];
    $Message = $_POST['by'];
    $dir= 'uploads/';
    $audio_path = $dir.basename($_FILES['audio']['name']);

    if(move_uploaded_file($_FILES['audio']['tmp_name'], $audio_path) && $Text && $Message)
    {
        header("location: ViewUploads.php");
        saveAudio($audio_path);
    }
}

function saveAudio($fileName)
{
    $Text= $_POST['text'];
    $Message = $_POST['by'];
    $con = mysqli_connect("localhost", "root", "", "audiobook");
   if(!$con)
   {
      die('server not connected');
   }

   $query= "INSERT into audio(filename, text, byy)VALUES ('{$fileName}', '$Text', '$Message')";
   mysqli_query($con,$query);
   if(mysqli_affected_rows($con)>0)
   {
    header("location: ViewUploads.php");
   }
   mysqli_close($con);
}

?>