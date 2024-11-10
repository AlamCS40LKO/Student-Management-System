<?php

session_start();
if(!isset($_SESSION['username'])){
  header("location:login.php");
}
elseif ($_SESSION['usertype']=='admin') {
  header("location:login.php");
}

include'dbconn.php';

$name=$_SESSION['username'];

$sql="select * from  user where username = '$name'";

$result=mysqli_query($data,$sql);

$info=mysqli_fetch_assoc($result);

if(isset($_POST['update_profile'])){
    $s_email = $_POST['email'];
    $s_phone = $_POST['phone'];
    $s_password = $_POST['password'];

    $query="UPDATE `user` SET `email`='$s_email', `phone`='$s_phone', `password`='$s_password' where `username` = '$name'";


    $result2=mysqli_query($data,$query);
    if($result2){
        header("location:student_profile.php");
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
include("student_sidebar.php");

?>

  <div class="content">
    <center>
    <h1>Welcome in Student Profile </h1>
    <div class="deg">
    <form action="#" method="POST">
       
        <div>
            <label for="">Email</label>
            <input type="email" name="email" id="name" value="<?php echo "{$info['email']}";?>">
        </div>
        <div>
            <label for="">Phone</label>
            <input type="number" name="phone" id="name" value="<?php echo "{$info['phone']}";?>">
        </div>
        <div>
            <label for="">Password</label>
            <input type="text" name="password" id="name" value="<?php echo "{$info['password']}";?>">
        </div>
        <div>
            <input class="btn btn-primary" type="submit" value="Update" name="update_profile">
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