<?php
    include("connection.php");


    if (isset($_POST['submit'])){
        $name =$_POST['name'];
        $email=$_POST['email'];
        $address=$_POST['address'];

        $qry="insert into details values(null,'$name','$email','$address')";

        if(mysqli_query($db,$qry)){
            header('location: dbConn.php');
        }
        else{
            echo mysqli_error($db);
        }
    }
?>