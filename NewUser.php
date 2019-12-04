<?php 
    $LogoutActive = 'hide';
    include("./Common/functions.php");
    include("./Common/header.php");

    $userIDErr = "";
    $nameErr = "";
    $phoneErr = "";
    $passwordErr = "";
    
    session_start();
    if($_SESSION['loggedIn'] != null)
    { 
        $logoutActive = 'display';
        $loginActive = 'hide';
?>  
        
        <link rel="stylesheet" href="Contents/Site.css">
        <div class="horizontal-margin vertical-margin">
            <h2>Sign Up</h2>
            <p>You are already signed in.</p>
        </div>

<?php
    }
    else
    {
        if(isset($_GET["reset"]))
        {
            $_GET["userID"] = "";
            $_GET["name"] = "";
            $_GET["phone"] = "";
        }

        if(isset($_GET["btnSubmit"]))
        {
            $userID = $_GET["userID"];
            $name = $_GET["name"];
            $phone = $_GET["phone"];
            $password = $_GET["password"];
            $cPassword = $_GET["cPassword"];

            $validUserID = ValidateUserID($userID); 
            $validName = ValidateName($name);
            $validPhone = ValidatePhone($phone);
            $ValidPass = ValidatePassword($password, $cPassword);

            if($validUserID == true &&
               $validName == true &&
               $validPhone == true &&
               $ValidPass == true)
            {
                $ValidNewUser = ValidateNewUser($userID, $name, $phone, $password);
                if($ValidNewUser == true)
                {
                    session_start();
                    $_SESSION['loggedIn'] = $userID;
                    header("location: Index.php");
                }
            }
        }
?>
            <link rel="stylesheet" href="Contents/Site.css">
            <div class="horizontal-margin vertical-margin">
                <h2>Sign Up</h2>
                <p>All fields are required.</p>
            </div>

            <div class="horizontal-margin vertical-margin">
                <form id="signUpForm" method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <table style="width: 80%;">
                        <tr>
                            <td class="style1" colspan="3">
                                Student ID: 
                            </td>

                            <td class="style2">
                                <label>
                                    <input class="form-control" type="text" name="userID" id="userID" value="<?php echo $_GET["userID"]; ?>">
                                </label>
                            </td>
                            <td class="style3">
                                <?php echo '<div style="Color:red">'.$userIDErr.'</div>'; ?> 
                            </td>                        
                        </tr>

                        <tr>
                            <td class="style1" colspan="3">
                                Name: 
                            </td>

                            <td class="style2">
                                <label>
                                    <input class="form-control" type="text" name="name" id="name" value="<?php echo $_GET["name"]; ?>">    
                                </label>
                            </td>
                            <td class="style3">
                                <?php echo '<div style="Color:red">'.$nameErr.'</div>'; ?> 
                            </td>
                        </tr>

                        <tr>
                            <td class="style1" colspan="3">
                                Phone Number:
                                (nnn-nnn-nnnn)
                            </td>
                            <td class="style2">
                                <label>
                                    <input class="form-control" type="text" name="phone" id="name" value="<?php echo $_GET["phone"]; ?>">    
                                </label>
                            </td>
                            <td class="style3">
                                <?php echo '<div style="Color:red">'.$phoneErr.'</div>'; ?> 
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
                            <td class="style3">
                                <?php echo '<div style="Color:red">'.$passwordErr.'</div>'; ?> 
                            </td>
                        </tr>

                        <tr>
                            <td class="style1" colspan="3">
                                Confirm Password: 
                            </td>
                            <td class="style2">
                                <label>
                                    <input class="form-control" type="password" name="cPassword" id="cPassword" value="">
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