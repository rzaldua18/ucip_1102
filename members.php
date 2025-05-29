<?php
    session_start();
    if (isset($_SESSION['username'])) {
        echo "Welcome ".$_SESSION['username']."<br />";
        echo "<a href='logout.php'>Click here</a> to log out.";
}
    else{
echo "<p style='color: red; font-family:Arial; font-weight: bold'>";
echo "You are NOT allowed to access this page. <br />";
echo "This is for MEMBERS only!<br />";
    }
?>
