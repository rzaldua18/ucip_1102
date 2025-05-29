<?php
    $id=$_GET['id'];
    include ('conn.php');
    mysqli_query ($connect,"DELETE from users WHERE id='$id'");
    header ("location:index.php");
?>
