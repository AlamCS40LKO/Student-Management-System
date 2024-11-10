<?php
error_reporting(0);
session_start();
session_destroy();

if($_SESSION['message']){
    $message=$_SESSION['message'];

    echo " <script type='text/javascript'> 
        alert('$message');
    </script> ";
}

include'dbconn.php';

$sql = "select * from teacher";

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
    <link rel="stylesheet" href="style.css">
    <title>Student Management System</title>
  </head>
  <body>
    <nav>
        <label class="logo" for="">W-School</label>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="admission.php">Admission</a></li>
            <li><a href="login.php" class="btn btn-primary" >Login</a></li>
        </ul>
    </nav>
    <div class="section1">
        <label for="" class="img_text">We Teach Student With Care</label>
        <img class="main-img" src="image/school_management.jpg" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="welcome_img" src="image/school2.jpg" alt="">
            </div>
            <div class="col-md-8">
                <h1>Welcome to W-School</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores neque nesciunt fuga excepturi error ea at velit. Dolorum, voluptate voluptates pariatur, iste provident laudantium aut eos molestias et porro laboriosam dolores nulla facere fuga tempora dolore natus temporibus. Mollitia, fugiat velit. Enim ab quae hic velit. Dicta quod assumenda aut odio neque enim at. Est, vero reprehenderit consectetur, sunt quod deleniti fuga aut exercitationem impedit esse corporis itaque nulla accusamus illum sapiente obcaecati adipisci quasi excepturi minus fugit quis laborum.</p>
            </div>
        </div>
    </div>

    <div class="container">
    <center>
        <h1>Our Teacher</h1>
    </center>
        <div class="row m-5">
            <?php
                while($info=$result->fetch_assoc()) {
                    
                
            ?>
            <div class="card mx-5" style="width: 18rem;">
  <img src="<?php echo "{$info['image']}" ?>" class="card-img-top" alt="Teacher Image">
  <div class="card-body">
  <h3><?php echo "{$info['name']}" ?></h3>
    <p class="card-text"><?php echo "{$info['description']}"?></p>
  </div>
</div>
            <?php
                }
            ?>
        </div>
    </div>

    <div class="container">
    <center>
        <h1>Our Courses</h1>
    </center>
        <div class="row m-3">
            <div class="col-md-4">
                <img class="teacher" src="image/graphic.jpg" alt="">
                <h1 class="text-center">Graphics Design</h1>
            </div>
            <div class="col-md-4">
                <img class="teacher" src="image/marketing.png" alt="">
                <h1 class="text-center">Marketing</h1>
            </div>
            <div class="col-md-4">
                <img class="teacher" src="image/web.jpg" alt="">
                <h1 class="text-center">Web Development</h1>
            </div>
        </div>
    </div>

     
    <div class="container" id="form">
    
    <div align="center" class="admission_form">
    <center>
        <h1 class="adm">Admission Form</h1>
    </center>

        <form action="data_check.php" method="POST">
            <div class="adm_int">
                <label for="" class="lable_text">Name</label>
                <input class="input_deg" type="text" name="name" id="">
            </div>
            <div class="adm_int">
                <label for="" class="lable_text">E_mail</label>
                <input class="input_deg" type="email" name="email" id="">
            </div>
            <div class="adm_int">
                <label for="" class="lable_text">Phone</label>
                <input class="input_deg" type="number" name="phone" id="">
            </div>
            <div class="adm_int">
                <label for="" class="lable_text">Message</label>
                <textarea class="input_txt" name="message" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="adm_int">
                <input  class="btn btn-primary" id="submit" name="apply" type="submit" value="Apply">
            </div>
        </form>
    </div>
    </div>
    <footer>
        <h2>All Copy reserved by Me</h2>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>