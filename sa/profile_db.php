<?php 
    session_start();
    include('server.php');

    $email = mysqli_real_escape_string($conn, $_SESSION['email']);
    $password =  $_POST['newpass'];
    echo $email.$password;
    $address = $_POST['newaddress'];
    $phone = mysqli_real_escape_string($conn, $_POST['newphone']);
    $fname = mysqli_real_escape_string($conn, $_POST['newfname']);
    $lname = mysqli_real_escape_string($conn, $_POST['newlname']);

    $sql = "UPDATE `user1` SET fname='$fname',lname='$lname',password='$password',phone='$phone',address='$address' WHERE email ='$email'";
    mysqli_query($conn, $sql);
    mysqli_close();
    header("location: profile.php");
    echo $sql;
?>