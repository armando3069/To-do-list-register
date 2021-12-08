

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Prepend and Append Custom File Input</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<style>



</style>
</head>
<body>
    <div class="container w-50">
    <form action="" method="post" enctype="multipart/form-data" >
   <div class="m-4 w-auto">
    <div class="input-group">
        <input type="file" class="form-control" name="uploadfile" value="">
        <button type="submit" name="upload" class="btn btn-secondary" >up</button>
    </div>
</div>
</form>
</div>




<?php error_reporting(0);?>

<?php
        include("./connectDB.php");
        session_start();
        $id = $_SESSION['user_id'];
 
    $msg = "";
  
   if (isset($_POST['upload'])) {
  
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];    
        $folder = "img/".$filename;
          
  
        $sql = " UPDATE  users set  img = '$filename' where id = '$id' ";
  
        mysqli_query($connect, $sql);
          
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{

            $msg = "Failed to upload image";
      }
  }
  $result = mysqli_query($connect, "SELECT * FROM users");
 while($data = mysqli_fetch_array($result))
 {
   ?>

<img src="img/<?php echo $data['img']; ?>">
  
<?php
}
?>



</body>
</html>