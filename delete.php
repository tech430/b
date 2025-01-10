<?php
    include("connection.php");

    if(!$db){
        die('Error in Database' .mysqli_error($db));
    }

    $id =$_GET['id'];

    $qry ="delete from details where id = $id";

    if(mysqli_query($db,$qry)){
        header('location: dbConn.php');
    }
    else{
        echo mysqli_error($db);
    }
?>