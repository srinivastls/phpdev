<?php
session_start();
require 'db_conc.php';
$_SESSION['msg'] =$_POST['username'];


if(isset($_POST['update_profile']))
{
    $id = mysqli_real_escape_string($conn, $_POST['username']);

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['mailid']);
    $course = mysqli_real_escape_string($conn, $_POST['phoneno']);

    $query = "UPDATE user SET `name`='$name', mailid='$email',`phoneno`='$course' WHERE `username`='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "profile Updated Successfully";
        $_SESSION['msg']=$id;
        header("Location: profile.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "profile Not Updated";
        header("Location: profile.php");
        exit(0);
    }

}




?>