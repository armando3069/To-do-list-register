<?php

//connect la baza de date
 include("./connectDB.php");
 session_start();
 

 $nume = $_POST['name'];
 $prenume = $_POST['surname'];
 $email = $_POST['email'];
 $parola = $_POST['password'];
 $image = "./img/profil.png";

 $sql = "INSERT INTO users (nume,prenume,parola,email,img) VALUES ('$nume','$prenume','$parola','$email','$image')";
 
 if(mysqli_query($connect,$sql))
 {
    header("Location: ./login.html");
  
 } else
  {
    die(mysqli_error($connect));
  }




?>