<?php
error_reporting(0);
session_start();
include('dbconn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username='$name' AND password='$pass'";
    $result = mysqli_query($data, $sql);

   
    $row = mysqli_fetch_array($result);

    if($row["usertype"]=="student"){
        $_SESSION['username']=$name;
         $_SESSION['usertype']="student";
        header("Location: studenthome.php");
    }
    elseif ($row["usertype"] == "admin") {
                $_SESSION['username']=$name;
                $_SESSION['usertype']="admin";
                header("Location: adminhome.php");
                // exit();
            } 
            elseif ($pass != $row['password']) {
                    $message =  "password do not match";
                    $_SESSION['loginMessage']=$message;
                header("location: login.php");
            }
            elseif ($name != $row['username']) {
                $message =  "Username do not match";
                $_SESSION['loginMessage']=$message;
            header("location: login.php");
        }
}
?>
