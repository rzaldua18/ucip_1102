<?php
    include ('conn.php');
    $id=$_GET['id'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    mysqli_query ($connect,"UPDATE users set firstname='$firstname', lastname='$lastname' where id='$id'");
    header ("location:index.php");
?>
