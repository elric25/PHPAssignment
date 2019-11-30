<?php

/* to connect to database */

function ConnectDb() {
    $mysqli = new mysqli('localhost', 'PHPSCRIPT', '1234', 'Project', 3306);

    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    return $mysqli;
}

/* Function Validate Login */

function ValidateLogin($userid, $password) {
    $password = addslashes($password);
    $link = mysqli_connect('localhost', 'PHPSCRIPT', '1234', 'Project', '3306');
    if ($link) {
        $userSelect = "SELECT UserId, password FROM User WHERE UserId = '$userid' AND Password='$password'";
        $result = mysqli_query($link, $userSelect);
        if ($row = mysqli_fetch_assoc($result)) {
            return "";
        } else {
            return "Incorrect User Id or Password.";
        }
    }
}

//$userId = $_POST["userId"];
//$name = $_POST["name"];
//$phoneNumber = $_POST["phoneNumber"];
//$password = $_POST["password"];
//$passwordAgain = $_POST["passwordAgain"];

/* Function Validate New User */
function ValidateNewUser($userid, $name, $phoneNumber, $password, $passwordAgain) {
    $link = mysqli_connect('localhost', 'PHPSCRIPT', '1234', 'Project', '3306');
    if (!$link) {
        die('System is currently unavailable, please try later.');
    }
    $userSelect = "SELECT * FROM User WHERE UserId = '$userid'";
    $result = mysqli_query($link, $userSelect);
    
    if ($result->num_rows) {
        return "User already exists";
    }else{
        // build query to store the user in the database
        $query = "INSERT INTO User (UserId, Name, Phone, Password) "
                . "VALUES ('$userid', '$name', '$phoneNumber', '$password')";

        echo $query;

        mysqli_query($link, $query);

        return "";
    }
}



/* Function Validations */

/* name */

function ValidateName($name) {

    if (empty($name)) {
        return "Please enter your name";
    } else if ($name < 0) {
        return "Please enter your name";
    }
    return "";
}

/* password */

function ValidatePassword($password) {

    if (empty($password)) {
        return "Please enter your password";
    } else if ($password < 0) {
        return "Please enter your password";
    }
    return "";
}

function ValidatePasswordAgain($password, $passwordAgain) {

    if (empty($passwordAgain)) {
        return "Please enter your password";
    } else if ($passwordAgain < 0) {
        return "Please enter your password";
    }else if (strcmp($password, $passwordAgain) == 1){
        return "Passwords do not match.";
    }
    return "";
}

/* postalCode */
/* if (ValidatePostalCode($_POST["postalCode"])>0) $var= 1; */


/* phoneNumber */
/* if (ValidatePhone($_POST["phoneNumber"])>0) $var=1; */

function ValidatePhone($phoneNumber) {
    $regex = "/^[0-9]{3}-[0-9]{3}-[0-9]{4}/";
    if (empty($phoneNumber)) {
        return "Please enter phone number";
    } else if (!preg_match($regex, $phoneNumber)) {
        return "Invalid phone number";
    }
    return "";
}


?>
            
