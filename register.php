<?php
include "db_conc.php";

    $name= $_POST['name'];
    
    $password= $_POST['pword'];
    $email= $_POST['email'];
    $phoneno=$_POST['phone'];
    $username=  $_POST['username'];
   $sql="INSERT INTO `user` ( `name`, `mailid`, `username`,`phoneno`, `password`) VALUES ('$name','$email' ,'$username','$phoneno', '$password');";
   // execute the query 
   if($conn->query($sql)== true){
       $msg="sucessfully added to the database";
        header("Location: login.html?error=$msg" );

    }
    else{
        echo "error : $sql <br> $conn->error";
    }
?>