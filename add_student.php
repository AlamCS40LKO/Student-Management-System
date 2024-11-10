
<?php

session_start();
if(!isset($_SESSION['username'])){
  header("location:login.php");
}
elseif ($_SESSION['usertype']=='student') {
  header("location:login.php");
}

include 'dbconn.php';
if(isset($_POST['add_student']))
{
  $username=$_POST['name'];
  $u_phone=$_POST['phone'];
  $u_email=$_POST['email'];
  $u_password=$_POST['password'];
  $usertype="student";

  
  $check="Select * from user where username='$username'";

  $check_user=mysqli_query($data,$check);

  $row_count=mysqli_num_rows($check_user);

  if($row_count==1){
    
    echo "<script>
    
    alert('Username Already Exist. Try Another One');

    </script>";
  }else{

  $sql="Insert into user (username, phone, email, usertype, password ) values ('$username', '$u_phone','$u_email','$usertype', '$u_password')";

  $result=mysqli_query($data,$sql);

  if($result){
    echo "<script>
    
    alert('data upload Success');

    </script>";
  }
  else{
    echo "not upload";
  }
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
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;

        }
        .div_deg{
            background-color: skyblue;
            width: 500px;
            padding: 20px;  
            border-radius: 5px;
        }
    </style>
  </head>

  <?php
include'admin_sidebar.php';

?>

  <div class="content">
    <center>
    <h1>Add Student Page </h1>

    <div class="div_deg" >
        <form action="#" method="POST">
            <div>
                <label for="">User name</label>
                <input type="text" name="name" id="">
            </div>
            <div>
                <label for="">Email</label>
                <input type="email" name="email" id="">
            </div>
            <div>
                <label for="">Phone</label>
                <input type="number" name="phone" id="">
            </div>
            <div>
                <label for="">Password</label>
                <input type="text" name="password" id="">
            </div>
            <div>
                <input class="btn btn-primary" type="submit" value="Add Student" name="add_student">
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