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
    if ($mysqli->connect_error) 
    {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }
    return $mysqli;
}

function DeleteAlbum($AlbumID){
    $connection = ConnectDb();
    
    
}

function ValidateLogin($userid, $password) 
{
    //Connect to the DB
    $link = ConnectDb();
    
    //If Success
    if ($link) 
    {
        //Find the hashed Password from DB
        $query = "SELECT UserId, Password FROM User WHERE (UserId = '$userid')";
        $passResult = $link->query($query);
        if($passResult->num_rows > 0)
        {
            $DBpass = $passResult->fetch_assoc();
            $hashedPass = $DBpass["Password"];
        }  
        //Compare password to hashed password
        if (password_verify($password, $hashedPass)) 
        {
            return true;
        } 
        else 
        {
            //Throw error otherwise
            $GLOBALS['Error'] = "Incorrect ID or Password.";
            return false;
        }
    }
}

function ValidateNewUser($userID, $name, $phone, $password) 
{
    //Connct to DB
    $connection = ConnectDb();

    //Create a hashed password
    $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

    $query = "SELECT UserId FROM User WHERE (UserId = '$userID')";
    $result = $connection->query($query);
    $insert = "INSERT INTO Project.User (UserId, Name, Phone, Password) "
        . "VALUES ('$userID', '$name', '$phone', '$passwordHashed')";

    if($result->num_rows == 0)
    {
        $connection->query($insert);
        return true;
    }
    else
    {
        $GLOBALS['userIDErr'] = "User with this student ID already exists.";
        return false;
    }

}
?>

<!--/                                                                           /
/                                                                               /
/                   USER INPUT VALIDATION                                  /
/                                                                               /
/                                                                               /
/                                                                               /-->
<?php
function ValidateUserID($userID)
{
    $userID = trim($userID);
    if(strlen($userID) == 0)
    {
        $isValid = false;
        $GLOBALS["userIDErr"] = "*User ID is Required. <br><br>";
    }
    else
    {
        $isValid = true;
    }
                
    return $isValid;
}

function ValidateName($name)
{
    $name = trim($name);
    if(strlen($name) == 0)
    {
        $isValid = false;
        $GLOBALS["nameErr"] = "*Name is Required.<br><br>";
    }
    else
    {
        $name = validatestring($name);
        $isValid = true;
    }
    return $isValid;
}

function ValidatePhone($phone)
{
    $phone = trim($phone);
    $phoneCodeRegex = "/\D*([2-9]\d{2})(\D*)([2-9]\d{2})(\D*)(\d{4})\D*/";
    if(strlen($phone) == 0)
    {
        $isValid = false;
        $GLOBALS["phoneErr"] = "*Phone number cannot be blank. <br><br>";
    }
    elseif(!preg_match($phoneCodeRegex, $phone))
    {
        $isValid = false;
        $GLOBALS["phoneErr"] = "*Invalid phone number. (xnn-xnn-nnnn) Where x must be greater than 1";
    }
    else
    {
        $isValid = true;
    }
    return $isValid;
}

function ValidatePassword($password, $cPassword)
{
    
    $passValid = checkPass($password);
    if($passValid == true)
    {
       if($password != $cPassword)
       {
           $isValid = false;
           $GLOBALS["passwordErr"] = "The passwords must match";
       }
       elseif(strlen($password) == 0 || strlen($cPassword) == 0)
       {
           $isValid = false;
           $GLOBALS["passwordErr"] = "Password cannot be blank. <br><br>";
       }
       else
       {
           $isValid = true;
       }
    }
    
    return $isValid;
}
?>
<!--/                                                                           /
/                                                                               /
/                   OTHER VALIDATION                                  /
/                                                                               /
/                                                                               /
/                                                                               /-->
<?php
function checkPass($pass)
{
    if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,16}$/', $pass) )
    {
        $isValid = false;
        $GLOBALS["passwordErr"] = "Password must contain: an upper case letter, a lowercase letter, one digit and be at least 6 characters long";
    }
    else
    {
        $isValid = true;
    }
    return $isValid;
}


?>