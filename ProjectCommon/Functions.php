<?php

/* to connect to database */

function ConnectDb() {
    $mysqli = mysqli_connect('localhost', 'PHPSCRIPT', '1234', 'Project');

    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    return $mysqli;
    //mysqli_close($mysqli);
}

/* Function Validate Login */

function ValidateLogin($userid, $password, $information) {
    $link = ConnectDb();
    //mysqli_connect('localhost', 'PHPSCRIPT', '1234', 'Project');
    /*if (!$link) {
        die('System is currently unavailable, please try later.');
    }*/
    $userSelect = "SELECT UserId, password FROM User WHERE UserId = '$userid'";
    if ($result = mysqli_query($link, $userSelect)) {
        if ($result->num_rows == 0) {
            $information = "Incorrect user Id and or Password!";
        } else {
            if ($student = mysqli_fetch_assoc($result)) {
                if ($student["UserId"] == $userid && $student["password"] == $password) {
                    $information = "";
                    header("Location: CourseSelection.php");
                } else {
                    $information = "Incorrect student ID and/or Password";
                }
            }
            return $information;
        }
    } else {
        echo mysqli_error($link);
    }

    return 5;
mysqli_close($link);
}

//$userId = $_POST["userId"];
//$name = $_POST["name"];
//$phoneNumber = $_POST["phoneNumber"];
//$password = $_POST["password"];
//$passwordAgain = $_POST["passwordAgain"];

/* Function Validate New User */
function ValidateNewUser($userid, $name, $phoneNumber, $password, $passwordAgain, $information) {
    $link = ConnectDb();
    //$link = mysqli_connect('localhost', 'PHPSCRIPT', '1234', 'Project');
    /*if (!$link) {

        die('System is currently unavailable, please try later.');
    }
     */
     
    $userSelect = "SELECT * FROM User WHERE UserId = '$userid'";
    if ($result = mysqli_query($link, $userSelect)) {
        if ($result->num_rows == 0) {

            // build query to store the user in the database
            $query = "INSERT INTO Project.User (UserId, Name, Phone, Password) "
                    . "VALUES ('$userid', '$name', '$phoneNumber', '$password')";

            echo $query;

            mysqli_query($link, $query);

            return "";
        } else {
            if ($student = mysqli_fetch_assoc($result)) {
                if ($student[userId] == $userId && $student[password] == $password) {
                    $information = "";
                    header("Location: CourseSelection.php");
                } else {
                    $information = "Incorrect student ID and/or Password";
                }
            }
            return $information;
        }
    } else {
        echo mysqli_error($link);
    }
    //return 5;
    mysqli_close($link);
}

/* Function Course Selection */

function CourseSelection($semesterCode) {
    $link = mysqli_connect('localhost', 'PHPSCRIPT', '1234', 'Project');
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
    mysqli_close($link);
}

/* Function Course Selection */

function ValidateCourseRegistration($semesterCode, $userId) {
    $link = mysqli_connect('localhost', 'PHPSCRIPT', '1234', 'Project', '3306');
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
    mysqli_close($link);
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
        echo "Please enter your name";
        return 0;
    } else if ($name < 0) {
        echo "Please enter your name";
        return 0;
    }
    return 1;
    
}

/* password */

function ValidatePassword($password) {

    if (empty($password)) {
        echo "Please enter your password";
        return 0;
    } else if ($password < 0) {
        echo "Please enter your password";
        return 0;
    }
    return 1;
}

/* postalCode */
/* if (ValidatePostalCode($_POST["postalCode"])>0) $var= 1; */

function ValidatePostalCode($postalCode) {
    $regex = "/[a-zA-Z][0-9][a-zA-Z]\s*[0-9][a-zA-Z][0-9]/";
    if (empty($postalCode)) {
        echo "Please enter postal code";
        return 0;
    } else if (!preg_match($regex, $postalCode)) {
        echo "Invalid postal code";
        return 0;
    }
    return 1;
}

/* phoneNumber */
/* if (ValidatePhone($_POST["phoneNumber"])>0) $var=1; */

function ValidatePhone($phoneNumber) {
    $regex = "/^[0-9]{3}-[0-9]{3}-[0-9]{4}/";
    if (empty($phoneNumber)) {
        echo "Please enter phone number";
        return 0;
    } else if (!preg_match($regex, $phoneNumber)) {
        echo "Invalid phone number";
        return 0;
    }
    return 1;
}

/* emailAddress */

function ValidateEmail($emailAddress) {
    $regex = "/\b[_\.0-9a-zA-Z]+@(([0-9a-zA-Z]+)\.)+[a-zA-Z]{2,3}\b/";
    if (empty($emailAddress)) {
        echo "Please enter email address";
        return 0;
    } else if (!preg_match($regex, $emailAddress)) {
        echo "Invalid email address";
        return 0;
    }
    return 1;
}
?>
            
