<?php
    session_start();
    session_destroy () ;
        echo "You have sucessfully logged out.<br />";
        echo "Please click here to <a href='login.html'>login </a>again.";
?>
