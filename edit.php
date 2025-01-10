<?php
    include ("connection.php");

    if(!$db){
        die('Error in database ' . mysqli_error($db));

    }
    else{
        $id=$_GET['id'];
        $qry="select * from details where id=$id";
        $run =$db->query($qry);

        if($run->num_rows>0){
            while ($row =$run->fetch_assoc()) {
                $username =$row['name'];
                $useremail = $row['email'];
                $useraddress = $row['address'];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit details</title>
</head>
<body>
    <form method="post">
        <label >Name</label>
        <input type="text" name="name" id="name" value="<?php echo $username;?>"><br><br>
        <label >Email</label>
        <input type="email" name="email" id="email" value="<?php echo $useremail;?>"><br><br>
        <label >Address</label>
        <input type="text" name="address" id="address" value="<?php echo $useraddress;?>"><br><br>

        <input type="submit" value="update" name="update">
    </form>

    <?php
        if(isset($_POST['update'])){
            $id=$_GET['id'];
            $name = $_POST['name'];
            $email=$_POST['email'];
            $address=$_POST['address'];

            $qry="update details set name ='$name' , email ='$email' , address='$address' where id = $id";

            if(mysqli_query($db,$qry)){
                header('Location: dbConn.php');
            }
            else{
                echo mysqli_error($db);
            }
        }
    ?>
</body>
</html>