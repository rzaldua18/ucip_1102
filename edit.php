<?php
    include ('conn.php');
    $id=$_GET['id'];
    $query=mysqli_query($connect,"SELECT * from users WHERE id='$id'");
    $row=mysqli_fetch_array ($query);
?> 


<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h2>Edit</h2>
    <form method="POST" action="update.php?id=<?php echo $id; ?>">
        <label>Firstname:</label>
        <input type="text" value="<?php echo $row['firstname']; ?>" name="firstname"><br><br>

        <label>Lastname:</label>
        <input type="text" value="<?php echo $row['lastname']; ?>" name="lastname"><br><br>

        <input type="submit" name="submit" value="Update">
        <a href="index.php">Back</a>
    </form>
</body>
</html

