<?php
session_start();

// Check if form data is submitted
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Database credentials
    $hostname = "localhost";
    $db_user = "root";
    $db_password = "";
    $dbname = "4dcip1102";

    // Connect to MySQL database
    $connect = mysqli_connect($hostname, $db_user, $db_password, $dbname);

    if (!$connect) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $dbusername = $row['username'];
        $dbpassword = $row['password'];

        if ($username === $dbusername && $password === $dbpassword) {
            $_SESSION['username'] = $username;
            echo "You're in!<br />";
            echo "<a href='members.php'>Click here</a> to enter the visitor's page";
        } else {
            echo "Incorrect Password!<br />";
            echo "<a href='login.html'>Click Here</a> to login again";
        }
    } else {
        echo "That username does NOT exist!<br />";
        echo "<a href='login.html'>Click Here</a> to login again";
    }

    mysqli_close($connect);
} else {
    echo "Please enter a username and password<br />";
    echo "<a href='login.html'>Click Here</a> to login again";
}
?>
