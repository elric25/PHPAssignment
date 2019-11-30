<?php
    $LoginActive = 'active';
    $LogoutActive = 'hide';
    include("./Common/functions.php");
    include("./Common/header.php");

    
    $Error = "";
    session_start();
    if($_SESSION['loggedIn'] != null)
    { 
        $LogoutActive = 'display';
        $LoginActive = 'hide';
?>
        <link rel="stylesheet" href="Lab5Contents/Site.css">
        <div class="horizontal-margin vertical-margin">
            <h2> Log In</h2>
            <p>You are already signed in.</p>
        </div>

<?php
    }
    else
    {
        if(isset($_GET["reset"]))
        {
            $_GET["studentID"] = "";
        }
    
        if(isset($_GET["btnSubmit"]))
        {
            $userID = $_GET["userID"];
            $password = $_GET["password"];

            $connection = ConnectDb();
            
            $query = "SELECT UserId, Password FROM User WHERE (UserId = $userID)";
            $result = $connection->query($query);

            $user = $result->fetch_assoc();
            $userPass = $user["Password"];
            
            if($userPass == $password)
            {
                $_SESSION['loggedIn'] = $userID;
                header("location: Index.php");
            }
            else
            {
                $Error = "Incorrect ID or Password.";
            }

            $connection->close();
        }
?>
        <link rel="stylesheet" href="Lab5Contents/Site.css">
        <div class="horizontal-margin vertical-margin">
            <h2> Log In</h2>
            <p>You need to <a href="NewUser.php">sign up</a> if you are a new user.</p>
        </div>

        <div class="horizontal-margin vertical-margin">
            <form id="signUpForm" method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <table style="width: 60%;">
                    <?php echo '<div style="Color:red">'.$Error.'</div>'; ?> 
                    <tr>
                        <td class="style1" colspan="3">
                            User ID: 
                        </td>

                        <td class="style2">
                            <label>
                                <input class="form-control" type="text" name="userID" id="userID" value="<?php echo $_GET["userID"]; ?>">
                            </label>
                        </td>                       
                    </tr>

                    <tr>
                        <td class="style1" colspan="3">
                            Password: 
                        </td>
                        <td class="style2">
                            <label>
                                <input class="form-control" type="password" name="password" id="password" value="">    
                            </label>
                        </td>
                    </tr>
                </table>
                <br>
                <input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" class="btn btn-primary">
                <input type="submit" name="reset" id="reset" value="Clear" class="btn btn-primary">

            </form>        
            </table>
        </div>
<?php
    }
?>

<?php include('./Common/footer.php'); ?>
