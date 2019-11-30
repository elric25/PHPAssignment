<?php
    function validatestring($data)
    {
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }
?>

<!--/                                                                           /
/                                                                               /
/                   SQL AND DATABASE FUNCTIONS                                  /
/                                                                               /
/                                                                               /
/                                                                               /-->
<?php
    function ConnectDb() 
    {
        $mysqli = new mysqli('localhost', 'PHPSCRIPT', '1234', 'Project', 3306);
        if ($mysqli->connect_error) {
            die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
        }
        return $mysqli;
    }

    function ValidateLogin($userid, $password) 
    {        
        $link = ConnectDb();
    
        if ($link) 
        {
            $passwordHashFromDb = "SELECT password FROM User WHERE UserId = '$userid'";
            $passResult = $link->query($passwordHashFromDb);
            
            if (password_verify($password, $passResult)) 
            {
                return "";
            } 
            else 
            {
                return "Incorrect User Id or Password.";
            }
        }
    }

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
?>
<!--USER INPUT VALIDATIONS-->
<?php
        function ValidatePhone($PNum)
        {
            $phone = trim($PNum);
            $phoneCodeRegex = "/\D*([2-9]\d{2})(\D*)([2-9]\d{2})(\D*)(\d{4})\D*/";
            if(empty($phone))
            {
                $Valid = false;
                $GLOBALS["PhoneErr"] = "Please enter a phone number. <br><br>";
            }
            elseif(!preg_match($phoneCodeRegex, $phone) || strlen($phone) != 12)
            {
                $Valid = false;
                $GLOBALS["PhoneErr"] = "Invalid phone number.";
            }
            else
            {
                $Valid = true;
            }
            return $Valid;
        }
//        TODO: ADD PASSWORD VALIDATION IN DETAIL
        function ValidatePassword($Password)
        {
            $pass = trim($Password);
            if(empty($pass)){
                $Valid = false;
                $GLOBALS["PassErr"] = "Please enter a password.";
            }else{
              $Valid = false;
              $GLOBALS["PassErr"] = "Invalid password, must be X digits and have Y parameters.";  
//            }else
//            {
//                $Valid = true;
//            }
            return $Valid;
        }
        }
        
?>