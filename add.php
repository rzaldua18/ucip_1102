<?php
    include ('conn.php');
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    mysqli_query ($connect, "INSERT into users (firstname, lastname) values ('$firstname', '$lastname')");
    header ("location: index.php");
?>
