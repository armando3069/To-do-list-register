<?php
    include("./connectDB.php");
    session_start();

if(isset($_POST['btn']))
{
    $text = $_POST['todo'];

    if(!$text == " ")
    {
        header("Location: ./home.php");

    }
    else{


   
   $id = $_SESSION["user_id"];
   
  $sql = "INSERT INTO todo ( makedo,id_User ) VALUES ('$text','$id') ";
 if(mysqli_query($connect,$sql))
 {
   
    header("Location: ./home.php");
 }

else {
 die(mysqli_error($connect));
}

}


}

?>