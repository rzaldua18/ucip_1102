<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html">
    <title>Template in PHP</title>
    <style>
        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            text-align: center;
        }
        table {
            margin: 0 auto;
        }
        th, td {
            border: 1px solid black;
        }
        .right { text-align: center; width: 150px; }
        .left { text-align: center; width: 150px; }
    </style>
</head>
<body>

<form method="POST">
    <table>
        <thead>
            <tr>
                <th colspan="3" style="font-size: 24px; height: 100px;">REGEX REGISTRATION</th>
            </tr>
        </thead>
        <tbody>
            <!--Input Username!-->        
            <tr>
                <td><label for="user">Enter your Username:</label></td>
                <td><input type="text" id="user" name="user" placeholder="Username" style="text-align: center;" value="<?= isset($_POST['user']) ? htmlspecialchars(trim($_POST['user'])) : '' ?>"></td>
                <th rowspan="5"><input type="submit" value="Submit"></th> 
            </tr>
            <!--Input Password!--> 
            <tr>
                <td><label for="password">Enter your Password:</label></td>
                <td><input type="password" id="password" name="password" placeholder="Password" style="text-align: center;" value="<?= isset($_POST['password']) ? htmlspecialchars(trim($_POST['password'])) : '' ?>"></td>
            </tr>
            <!--Input Firstname!--> 
             <tr>
                <td><label for="firstname">Enter your Firstname:</label></td>
                <td><input type="text" id="firstname" name="firstname" placeholder="FirstName" style="text-align: center;" value="<?= isset($_POST['firstname']) ? htmlspecialchars(trim($_POST['firstname'])) : '' ?>"></td>
            </tr>
            <!--Input Lastname!--> 
             <tr>
                <td><label for="lastname">Enter your Lastname:</label></td>
                <td><input type="text" id="lastname" name="lastname" placeholder="Lastname" style="text-align: center;" value="<?= isset($_POST['lastname']) ? htmlspecialchars(trim($_POST['lastname'])) : '' ?>"></td>
            </tr>
             <!--Input Cellphone Number!--> 
             <tr>
                <td><label for="phone">Enter your Lastname:</label></td>
                <td><input type="text" id="phone" name="phone" placeholder="Cell phone" style="text-align: center;" value="<?= isset($_POST['phone']) ? htmlspecialchars(trim($_POST['phone'])) : '' ?>"></td>
            </tr>
        </tbody>
    </table>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $validuser = false;
    $validpass = false;

    // Username validation
    if (isset($_POST["user"])) {
        $user = trim($_POST["user"]);

        if (empty($user)) {
            $userMessage = "*Username is required.*";
        } elseif (strpos($user, ' ') !== false) {
            $userMessage = "Username must not contain spaces.";
        } elseif (strlen($user) !== 8) {
            $userMessage = "Username must 8 characters.";
        } elseif (!preg_match("/^USR_/", $user)) {
            $userMessage = "Username must start with 'USR_'";
        } elseif (!preg_match("/^USR_\d{2}/", $user)) {
            $userMessage = "Username must have exactly two digits after 'USR_'";
        } elseif (!preg_match("/^USR_\d{2}[a-d]+$/", $user)) {
            $userMessage = "Username must have only lowercase letters a–d after the digits.";
        } else {
            $user = htmlspecialchars($user);
            $userMessage = "";
            $validuser = true;
        }

        echo "<br>".$userMessage;
    }

    // Password validation
if (isset($_POST["password"])) {
    $password = trim($_POST["password"]);

    if (empty($password)) {
        $passMessage = "*Password is required.*";
    } elseif (strpos($user, ' ') !== false) {
        $passMessage = "Password must not contain spaces.";
    } elseif (strlen($password) !== 8) {
        $passMessage = "Password must be 8 characters.";
    } else {
        // Check for strong password
        $hasUpper = preg_match("/[A-Z]/", $password);
        $hasUnderscore = strpos($password, '_') !== false;
        $hasNumber = preg_match("/\d/", $password);

        if ($hasUpper && $hasUnderscore && $hasNumber) {
            $passMessage = "";
            $validpass =true;
     } elseif (preg_match('/^[[:alnum:]]+$/', $password)) {

            $passMessage = "Your Password is Weak (only alphanumeric characters).";
            $validpass =true;
        } else {
            $passMessage = "Password is not strong. Add an uppercase letter, underscore, and a number.";
            $validpass =true;
        }
    }

    echo "<br>".$passMessage;
    }

// Firstname validation
    $validfname = false;

if (isset($_POST["firstname"])) {
    $firstname = trim($_POST["firstname"]);

    if (empty($firstname)) {
        $fnameMessage = "*Firstname is required.*";
    } elseif (!preg_match("/^[A-Za-z]+([ ]?[A-Za-z]+)*$/", $firstname)) {

        $fnameMessage = "Firstname must contain only alphabetic characters.";
    } else {
        $firstname = htmlspecialchars($firstname);
        $fnameMessage = "";
        $validfname = true;
    }

    echo "<br>" . $fnameMessage;
}

// LastName validation
    $validlname = false;
if (isset($_POST["lastname"])) {
    $lastname = trim($_POST["lastname"]);

    if (empty($lastname)) {
        $lnameMessage = "*Lastname is required.*";
    } elseif (!preg_match("/^[A-Za-z]+([ ]?[A-Za-z]+)*$/", $lastname)) {

        $lnameMessage = "Lastname must contain only alphabetic characters.";
    } else {
        $lastname = htmlspecialchars($lastname);
        $lnameMessage = "";
        $validlname = true;
    }

    echo "<br>" . $lnameMessage;
}
// Cellphone validation
$validphone = false;

if (isset($_POST["phone"])) {
    $phone = trim($_POST["phone"]);

    if (empty($phone)) {
        $phoneMessage = "*Cellphone number is required.*";
    } elseif (!preg_match("/^\+63\d{10}$/", $phone)) {
        $phoneMessage = "Cellphone must start with '+63' followed by 10 digits.";
    } else {
        $phone = htmlspecialchars($phone);
        $phoneMessage = "";
        $validphone = true;
    }

    echo "<br>" . $phoneMessage;
}

//Show Output when all validation is true
    if ($validuser && $validpass && $validfname && $validlname && $validphone) {
    echo "<br>";
    echo "<tr><th colspan='2'>Congratulations, you have successfully registered. Please keep the following information below.</th></tr>";
     echo "<br><br><br>";
    echo "<table border='1' style='margin: 0 auto; text-align: center;'>";
    echo "<tr><td><b>Username</b></td><td>$user</td></tr>";
    echo "<tr><td><b>Password</b></td><td>$password</td></tr>";
    echo "<tr><td><b>Name</b></td><td>" . $lastname . "".","." " . $firstname . " </td></tr>";
    echo "<tr><td><b>Phone Number</b></td><td>$phone</td></tr>";
    echo "</table>";

    echo "<br><a href='".$_SERVER['PHP_SELF']."'>Register another account</a>";
    }
}
?>

</body>
</html>
