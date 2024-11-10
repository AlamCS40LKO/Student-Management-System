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
$sql="Select * from user where usertype='student'";
$result=mysqli_query($data,$sql);
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
  </head>
<body>
 
<?php
include'admin_sidebar.php';

?>

  <div class="content">
    <h1 class="text-center">All Students</h1>

    <?php
        if($_SESSION['message']){
            echo $_SESSION['message'];
        }
    ?>
    <br>
<center>
  

        <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Password</th>
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
      <th scope="row"><?php echo "{$info['username']}";?></th>
      <td><?php echo "{$info['email']}";?></td>
      <td><?php echo "{$info['phone']}";?></td>
      <td><?php echo "{$info['password']}";?></td>
      <td><?php echo "<a class='btn btn-light' onClick=\" javascript:return confirm('Are You Sure Delete this Student data'); \" href='delete.php?student_id={$info['id']}'>DELETE</a>";?></td>
      <td> <?php echo "<a class='btn btn-light' href='update_student.php?student_id={$info['id']}'>UPDATE</a>";?></td>
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