<?php

include("./connectDB.php");

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $sql = "DELETE from todo where id = '$id' ";

    if(mysqli_query($connect,$sql))
    {
        header("Location: ./home.php");
    }
    else
    {
        die(mysqli_error($connect));
    }

}
?>