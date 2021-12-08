<?php
 session_start();
 include("./connectDB.php");
 $sesion = $_SESSION['user_id'];
  if($sesion)
  {

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Prepend and Append Custom File Input</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<style>
    body
    {
        background-color: blanchedalmond;
    }
    .input-group
    {
        margin-top:10%;
        margin-left: auto;
        margin-right: auto;
        display: flex;
        text-decoration: none;
        
    }
    .form-control
    {
        margin-right: 10px;
    }
    .btn 
    {
        border-radius: 30px;
    }
   .list-group
   {
       margin-right: auto;
       margin-left: auto;
       margin-top:3%;
   }
   .flex-grow-1
   {
       margin-top: 80px;
       margin-left: 10%;

   }
   h5{
    font-size: 40px;
    margin-left: 20px;
   }

   .box
   {
    display : flex;
    justify-content: center;
    align-items: center;
       
   }
   
   
</style>
</head>
<body>

<div class="m-4">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container-fluid">
                <a href="./init.html" class="navbar-brand"><h3><i class="bi bi-wordpress"></i>ToDoList</h3></a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                  
                    <div class="navbar-nav ms-auto">
                        <a href="./logout.php" class="nav-item nav-link"> <i class="bi bi-door-open"></i>Logout</a>
                        <a href="./register.html" class="nav-item nav-link"><i class="bi bi-person-plus"></i> Register</a>
                        <a href="./seting.php" class="nav-item nav-link"> <i class="bi bi-gear"></i> Setări</a>

    
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <div class="box">
    <div class="d-flex">
    <?php

     $id = $_SESSION['user_id'];

     $sql = "SELECT nume , prenume ,img  FROM users  WHERE id = '$id' "; 

     $result = mysqli_query( $connect , $sql);
    $row = mysqli_fetch_array($result);
    ?>
        <div class="flex-shrink-0">
            <img src="./img/profil.png" class="rounded-circle" width="150" height="150" alt="Sample Image">
        </div>
        <div class="flex-grow-1 ms-1">
            

            <h5><?php echo $row['nume'] , " " , $row['prenume'] ?> <small class="text-muted"><i></i></small></h5>
        </div>
    </div>
    </div>
    <hr>


<div class="m-4">
    <form action="./insert.php" method="post">
    <div class="input-group w-50 ">
        <input type="text" name="todo" placeholder="Ce faci ?" class="form-control">
        <input type="submit" name="btn" class="btn btn-primary" value="Adauga"></input>
    </div>
    </form>


    <div class="list-group w-50">
    <?php
    include("./connectDB.php");

    $id = $_SESSION['user_id'];

    $sql = "SELECT * FROM todo where id_User = '$id' ";

   $query = mysqli_query($connect,$sql);

  while($row =  mysqli_fetch_array($query))
    {?>

        <label class="list-group-item">
            <input type="checkbox" id="text" class="form-check-input me-1" name="hobbies">
             <?php echo $row['makedo']?>  <a href ="delete.php?id=<?php echo $row['id'] ?>" >
            <img src = "img/del.png"></a>
        </label>

    <?php } ?>
    
    </div>

</div>

</body>
</html>
<?php
  }
  else
{
    header("Location: ./login.html");

}
?>