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

/* Function Course Selection */

function CourseSelection($semesterCode) {
    $link = mysqli_connect('localhost', 'PHPSCRIPT', '1234', 'Project', '3306');
    if (!$link) {
        die('System is currently unavailable, please try later.');
    }
    //query the database to find infor about the semester code selection
    $userSelect = "SELECT * FROM Course JOIN CourseOffer on CourseOffer.Course Code = Course.CourseCode WHERE SemesterCode = '$semesterCode' ";
    if ($result = mysqli_query($link, $userSelect)) {
        
    } else {
        echo mysqli_error($link);
    }

    return 5;
}

/* Function Course Selection */

function ValidateCourseRegistration($semesterCode, $userId) {
    $link = mysqli_connect('localhost', 'PHPSCRIPT', '1234', 'CST8257', '3306');
    if (!$link) {
        die('System is currently unavailable, please try later.');
    }
    //query the database to find infor about the semester code selection
    $userSelect = "SELECT * FROM Course JOIN CourseOffer on CourseOffer.Course Code = Course.CourseCode WHERE SemesterCode = $semesterCode ";
    if ($result = mysqli_query($link, $userSelect)) {
        return $information;
    } else {
        echo mysqli_error($link);
    }
    return 5;
}

/* validate Forms */

function ValidateTermsAndConditions($checkBoxStart) {

    if (empty($checkBoxStart)) {
        echo "Please agree to the terms and conditions";
        return 1;
    } else {
        return 2;
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

function ValidatePostalCode($postalCode) {
    $regex = "/[a-zA-Z][0-9][a-zA-Z]\s*[0-9][a-zA-Z][0-9]/";
    if (empty($postalCode)) {
        return "Please enter postal code";
    } else if (!preg_match($regex, $postalCode)) {
        return "Invalid postal code";
    }
    return "";
}

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

/* emailAddress */

function ValidateEmail($emailAddress) {
    $regex = "/\b[_\.0-9a-zA-Z]+@(([0-9a-zA-Z]+)\.)+[a-zA-Z]{2,3}\b/";
    if (empty($emailAddress)) {
        return "Please enter email address";
    } else if (!preg_match($regex, $emailAddress)) {
        return "Invalid email address";
    }
    return "";
}
?>
            
