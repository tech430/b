<?php
    include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head> 
    <title>Data Insert</title>
</head>
<body>
    <form method="post" action="database.php">
        <label>Name</label>
        <input type="text" name="name" id="name" placeholder="Enter Name"><br><br>
        <label>Email</label>
        <input type="email" name="email" id="email" placeholder="Enter Email"><br><br>
        <label>Address</label>
        <input type="address" name="address" id="address" placeholder="Enter Address"><br><br>
        <input type="submit" value="Submit" name="submit">
    </form>
<hr>

<h3> User's details</h3>
<table style="width: 80%;" border="1">
 <tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Address</th>
<th>Operations</th>
</tr>

<?php
    $i=1;
    $qry="select * from details ";
    $run = $db -> query($qry);

    if($run -> num_rows > 0){
        while($row = $run->fetch_assoc()){
            $id = $row['id'];

?>
<tr>
    <td><?php echo $row['id'];?></td>
    <td><?php echo $row['name'];?></td>
    <td><?php echo $row['email'];?></td>
    <td><?php echo $row['address'];?></td>

    <td>
        <a href="edit.php?id=<?php echo $id;?>">Edit</a>
        <a href="delete.php?id=<?php echo $id;?>" onclick="return confirm('Are you sure?')">Delete</a>
    </td>
</tr>

<?php   
        }
    }
?>
 
</body>
</html>

