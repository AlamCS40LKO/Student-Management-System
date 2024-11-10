

<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['username'])){
  header("location:login.php");
}
elseif ($_SESSION['usertype']=='student') {
  header("location:login.php");
}

include 'dbconn.php';

$t_id = isset($_GET['teacher_id']) ? $_GET['teacher_id'] : null;
if($t_id){
  $sql = "SELECT * FROM teacher WHERE id = '$t_id'";
  $result = mysqli_query($data, $sql);
  $info = $result ? $result->fetch_assoc() : null;
}

if(isset($_POST['update_teacher'])){
  $t_id = $_POST['id'];
  $t_name = $_POST['name'];
  $t_desc = $_POST['desc'];
  $file = isset($_FILES['img']['name']) ? $_FILES['img']['name'] : null;

  if($file){
    $dst = "./image/".$file;
    $dst_db = "image/".$file;
    move_uploaded_file($_FILES['img']['tmp_name'], $dst);
  }

  $query = "UPDATE `teacher` SET `name`='$t_name', `description`='$t_desc', `image`='$dst_db' WHERE `id` = '$t_id'";
  $result2 = mysqli_query($data, $query);

  if($result2){
    header("location:admin_view_teacher.php");
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
    label {
      display: inline-block;
      width: 100px;
      text-align: center;
      padding-top: 10px;
      padding-bottom: 10px;
    }

    .deg {
      background-color: skyblue;
      width: 600px;
      padding-bottom: 40px;
      padding-top: 40px;
      height: 100%;
    }
  </style>
</head>
<body>

<?php
include 'admin_sidebar.php';
?>

<div class="content">
  <center>
    <h1 class="text-center">Update Teacher</h1>
    <div class="deg">
      <form action="admin_update_teacher.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="id" value="<?php echo isset($info['id']) ? $info['id'] : ''; ?>" hidden>
        <div>
          <label for="">Teacher Name</label>
          <input type="text" name="name" value="<?php echo isset($info['name']) ? $info['name'] : ''; ?>">
        </div>
        <div>
          <label for="">About Teacher</label>
          <textarea name="desc" id="" cols="21" rows="2" rows="4"><?php echo isset($info['description']) ? $info['description'] : ''; ?></textarea>
        </div>
        <div>
          <label for="">Teacher Old Image</label>
          <img width="100px" height="100px" name="" class="img" src="<?php echo isset($info['image']) ? $info['image'] : ''; ?>" alt="">
        </div>
        <div>
          <label for="">Teacher New Image</label> <br>
          <input type="file" name="img" id="">
        </div>
        <div>
          <input class="btn btn-primary" type="submit" value="Update" name="update_teacher">
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
