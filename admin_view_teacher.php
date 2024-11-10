<?php
session_start();
error_reporting(0);
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
        header('location:admin_view_teacher.php');
       }
}
include'dbconn.php';
$sql="Select * from  teacher";
$result=mysqli_query($data,$sql);

if($_GET['teacher_id']){
    $t_id=$_GET['teacher_id'];

    $sql2="Delete from teacher where id = '$t_id'";

    $result2=mysqli_query($data,$sql2);

    if($result2){
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
        .img{
            width: 100px;
            height: 100px;
        }
    </style>
  </head>

  <?php
include'admin_sidebar.php';

?>

<div class="content">
    <h1 class="text-center">All Teacher's</h1>

    <!-- <?php
        if($_SESSION['message']){
            echo $_SESSION['message'];
        }
    ?> -->
    <br>
<center>
        <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Teacher Name</th>
      <th scope="col">About Teacher</th>
      <th scope="col">Image</th>
      <th scope="col">Delete</th>
      <th scope="col">Update</th>
    </tr>
  </thead>

        <?php

        while($info=$result->fetch_assoc())
        {
            ?>
      

        <tbody>
    <tr>
      <td><?php echo "{$info['name']}";?></td>
      <td><?php echo "{$info['description']}";?></td>
      <td><img class="img" src="<?php echo "{$info['image']}";?>" alt=""> </td>
      <td>  <?php echo "<a class='btn btn-light'onClick=\" javascript:return confirm('Are You Sure Delete this Teacher data'); \" href='admin_view_teacher.php?teacher_id={$info['id']}'>DELETE</a>";?></td>
      <td> <?php echo "<a class='btn btn-light' href='admin_update_teacher.php?teacher_id={$info['id']}'>UPDATE</a>";?></td>
    </tr>
  </tbody>
        <?php }
        ?>
    </table>
    </center>
  </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>