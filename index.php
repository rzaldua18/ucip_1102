
<body>
    <div>
        <hl>Add, Edit, Delete Form</h1>
        <form method="POST" action="add.php">
            <label>Firstname:</label><input type="text" name="firstname" placeholder ="Firstname"” required>
            <label>Lastname:</label><input type="text" name="lastname" placeholder="Lastname" required>
            <input type="submit" name="add">
        </form>
    </div>
    <br>
    <div>
        <table>
            <thead>
                <th>Firstname</th>
                <th>Lastname</th>
                <th></th>
    </thead>
    <tbody>

<?php
    include ('conn.php');
    $query=mysqli_query ($connect, "SELECT * FROM users");
    
    while ($row=mysqli_fetch_array($query)) {
        ?>
        <tr>
            <td><?php echo $row['firstname']; ?></td>
            <td><?php echo $row['lastname']; ?></td>
        <td>
            <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
            <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
        </td>
        </tr>
        <?php
            }
        ?>

        
    </tbody>
    </table>
    </div>
</body>
