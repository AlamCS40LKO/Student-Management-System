
<?php

session_start();
if(!isset($_SESSION['username'])){
  header("location:login.php");
}
elseif ($_SESSION['usertype']=='student') {
  header("location:login.php");
}

include'dbconn.php';

if (isset($_POST['add_teacher'])) {
       $t_name=$_POST['name'] ;
       $t_desc=$_POST['desc'] ;
       $file=$_FILES['image']['name'] ;

       $dst="./image/".$file;
       $dst_db="image/".$file;

       move_uploaded_file($_FILES['image']['tmp_name'], $dst);
       $sql = "INSERT INTO `teacher` ( `name`, `description`, `image`) VALUES ('$t_name', '$t_desc', '$dst_db')";

       $result = mysqli_query($data,$sql);
       if($result){
        header('location:admin_add_teacher.php');
       }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
    <style>
        label{
            display: inline-block;
            width: 100px;
            text-align: center;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .deg{
            background-color: skyblue;
            width: 400px;
            padding-bottom: 70px;
            padding-top: 70px;

        }
    </style>
  </head>

  <?php
include'admin_sidebar.php';

?>

  <div class="content">
    <center>
    <h1>Add Teacher </h1><br>
    <div class="deg">
    <form action="#" method="POST" enctype="multipart/form-data">
       
        <div>
            <label for="">Teacher Name</label>
            <input type="text" name="name" id="name" value="">
        </div>
        <div>
            <label for="">Description</label>
            <textarea name="desc" id="" cols="25" rows="2"></textarea>
        </div>
        <div>
            <label for="">Image</label>
            <input type="file" name="image" id="name" value="">
        </div>
        <div>
            <input class="btn btn-primary" type="submit" value="Add teacher" name="add_teacher">
        </div>
        
    </form>
  </div>
    </center>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>