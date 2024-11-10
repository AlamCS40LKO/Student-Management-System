<?php
include('dbconn.php');
session_start();

if(isset($_POST['apply'])){
    $d_name = $_POST['name'];
    $d_email = $_POST['email'];
    $d_phone = $_POST['phone'];
    $d_messege = $_POST['message'];

    $sql="INSERT INTO `admission` (`name`, `email`, `phone`, `message`) VALUES ('$d_name', '$d_email', '$d_phone', '$d_messege')";

    $result=mysqli_query($data, $sql);

    if($result){
        $_SESSION['message']="Your Application Sent Successfull";

        header("location:index.php");
    }else{
        echo "not";
    }
}


?>