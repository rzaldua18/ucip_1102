<?php
    // Database credentials
    $hostname = "localhost";
    $db_user = "root";
    $db_password = "";
    $dbname = "4dcip1102";

    $connect = mysqli_connect($hostname, $db_user, $db_password, $dbname);
    // Check connection
if (mysqli_connect_errno () )
{
echo "Failed to connect to MySQL: " . mysqli_connect_error ();
}

?> 
