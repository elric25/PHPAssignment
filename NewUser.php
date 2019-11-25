<!DOCTYPE html>
<!--Header -->
<?php include('./ProjectCommon/Header.php'); ?>  
<!--Footer -->

<?php
/* start of the session */
session_start();
include ('./ProjectCommon/Functions.php');
$connection = ConnectDb();

$userId = $_POST["userId"];
$password = $_POST["password"];
$btnSubmit = $_POST["submit"];
$information = "";

if (isset($_POST['btnSubmit'])) {
    //information
    $information = ValidateLogin($userId, $password);
    if ($information == "") {
        $_SESSION["login"] = $userId;
        header("Location: Login.php");
    }
}
?>

<!-- front end start-->
<html>

    <body style="background-color: rgba(130, 181, 224, 0.8)">
        <div class="wrapper">
            <br>
            <form method ="post" action='' id ="indexForm">
                <div class="container">
                    <div class="row">
                        <div class="col-md-1"></div>                               
                        <div class="col-md-12">
                            <h1>Register here</h1>
                            <p>You need to 
                                <a class="aditionalInformationLink" href="NewUser.php" id="newUser" name="newUser" style="color:blue; weight: bold; font-size: 20px;">sign up</a>
                                if you are a new user.
                            </p>
                            <p class="text-danger"><?php echo "$information"; ?>
                            </p>
                        </div>
                    </div>
                </div>        
                <br>
                <br>

                <!--------------------------Part 2 -->  
                <!-- 1------------------User ID -->
                <div class="row">
                    <!-- label --> 
                    <div class="col-md-2"></div>
                    <div class="col-md-1" id="inputText">
                        <label for='userId'><strong> User ID:</strong></label>
                    </div>
                    <!-- input -->
                    <div class="col-md-3">
                        <input type="text" id="userIdLogin" name='userId' placeholder="User ID"
                               value ='<?php if (isset($_POST["btnSubmit"])) echo $_POST["userId"] ?>'/> 
                    </div>
                    <!-- error message -->
                    <div class="col-md-3">
                        <span class='error' style="color:red; weight: bold"><?php if (isset($_POST["userId"])) ValidateName($_POST["userId"]) ?></span>
                    </div>
                </div>
                <br>  

                <!-- 4------------------Password -->

                <script>
                    function myFunction() {
                        var x = document.getElementById("passwordLogin");
                        if (x.type === "password") {
                            x.type = "text";
                        } else {
                            x.type = "password";
                        }
                    }
                </script>

                <div class="row">
                    <div class="col-md-2"></div>
                    <!-- label -->   
                    <div class="col-md-1" id="inputText">
                        <label for='password'><strong>Password:</strong></label>
                    </div>
                    <!-- input -->         
                    <div class="col-md-3">
                        <input type="password" id="passwordLogin" name="password"  placeholder="Password"
                               value ='<?php if (isset($_POST["btnSubmit"])) echo $_POST["password"] ?>'/> 
                    </div>
                    <!-- error message -->
                    <div class="col-md-3">
                        <span class='error' style="color:red; weight: bold"><?php if (isset($_POST["password"])) ValidatePassword($_POST["password"]) ?></span>
                    </div>
                </div>
<!--                TODO: VALIDATE PRE-SUBMIT TO MAKE SURE BOTH PASSWORD FIELDS MATCH!-->
                <div class="row">
                    <div class="col-md-2"></div>
                    <!-- label -->   
                    <div class="col-md-1" id="inputText">
                        <label for='password'><strong>Password confirm:</strong></label>
                    </div>
                    <!-- input -->         
                    <div class="col-md-3">
                        <input type="password" id="passwordConfirm" name="password"  placeholder="Password"
                               value ='<?php if (isset($_POST["btnSubmit"])) echo $_POST["passwordConfirm"] ?>'/> 
                    </div>
                    <!-- error message -->
                    <div class="col-md-3">
                        <span class='error' style="color:red; weight: bold"><?php if (isset($_POST["passwordConfirm"])) ValidatePassword($_POST["passwordConfirm"]) ?></span>
                    </div>
                </div>

<div class="row">
                    <div class="col-md-2"></div>
                    <!-- label -->   
                    <div class="col-md-1" id="inputText">
                        <label for='password'><strong>Phone number:</strong></label>
                    </div>
                    <!-- input -->         
                    <div class="col-md-3">
                        <input type="text" id="PhoneNum" name="PhoneNum"  placeholder="nnn-nnn-nnnn"
                               value ='<?php if (isset($_POST["btnSubmit"])) echo $_POST["Phone"] ?>'/> 
                    </div>
                    <!-- error message -->
                    <div class="col-md-3">
                        <span class='error' style="color:red; weight: bold"><?php if (isset($_POST["Phone"])) ValidatePassword($_POST["Phone"]) ?></span>
                    </div>
                </div>

<div class="row">
                    <div class="col-md-2"></div>
                    <!-- label -->   
                    <div class="col-md-1" id="inputText">
                        <label for='Name'><strong>Name:</strong></label>
                    </div>
                    <!-- input -->         
                    <div class="col-md-3">
                        <input type="text" id="Name" name="Name"  placeholder="Your Name Here"
                               value ='<?php if (isset($_POST["btnSubmit"])) echo $_POST["Name"] ?>'/> 
                    </div>
                    <!-- error message -->
                    <div class="col-md-3">
                        <span class='error' style="color:red; weight: bold"><?php if (isset($_POST["Name"])) ValidatePhone($_POST["Name"]) ?></span>
                    </div>
                </div>
                

                <br>
                <hr>
                <br>  
                <!-- 6------------------Buttons -->             
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-1"><button type="submit" id="btnSubmit" name="btnSubmit" class="btn btn-primary">Submit</button></div>
                    <div class="col-md-1"><button type="submit" id="btnClear" name="btnClear" class="btn btn-primary">Clear</button></div>
                </div>
 </form>
     
    <div class="push"></div>
  </div>

<?php include('./ProjectCommon/Footer.php'); ?>

</body>     
</html>

