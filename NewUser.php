<!DOCTYPE html>
<!--Header -->
<?php include('./ProjectCommon/Header.php'); ?>  
<!--Footer -->

<?php
/* start of the session */
session_start();
include ('./ProjectCommon/Functions.php');
$connection = ConnectDb();
// Define variables and initialize with empty values
$userId = $_POST["userId"];
$name = $_POST["name"];
$phoneNumber = $_POST["phoneNumber"];
$password = $_POST["password"];
$passwordAgain = $_POST["passwordAgain"];
$information = "";
if ($_SESSION["login"] == "yes") {
    header("Login: Logout.php");
}
if (isset($_POST['btnSubmit'])) {
    //information
    $information = ValidateNewUser($userId, $name, $phoneNumber, $password, $passwordAgain);
    if ($information == "") {
        $_SESSION["login"] = $userId;

        header("Location: Index.php");
    }
}

?>
<!-- front end start-->
<html>
    <head>
        <title>Project</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="main.scss"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body style="background-color: rgba(130, 181, 224, 0.8)">
        <div class="wrapper">
            <br>
            <br>
            <form method ="post" action='' id ="indexForm">

                <div class="container">
                    <div class="row">
                        <div class="col-md-1"></div>                                
                        <div class="col-md-12">
                            <h1>Sign Up</h1>
                            <p>All fields are required</p>
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
                    <div class="col-md-2" id="inputText">
                        <label for='userId'><strong> User ID:</strong></label>
                    </div>
                    <!-- input -->
                    <div class="col-md-4">
                        <input type="text" id="userId" name='userId'placeholder="User ID"
                               value ='<?php if (isset($_POST["btnSubmit"])) echo $_POST["userId"] ?>'/> 
                    </div>
                    <!-- error message -->
                    <div class="col-md-3">
                        <span class='error' style="color:red; weight: bold">
                            <?php 
                            echo $information;
                            if (isset($_POST["userId"])) ValidateName($_POST["userId"]);
                            ?></span>
                    </div>
                </div>

                <!-- 2------------------Name -->
                <div class="row">
                    <!-- label --> 
                    <div class="col-md-2"></div>
                    <div class="col-md-2" id="inputText">
                        <label for='yearsDeposit'><strong> Name:</strong></label>
                    </div>
                    <!-- input -->
                    <div class="col-md-4">
                        <input type="text" id="name" name='name'placeholder="Name"
                               value ='<?php if (isset($_POST["btnSubmit"])) echo $_POST["name"] ?>'/> 
                    </div>
                    <!-- error message -->
                    <div class="col-md-3">
                        <span class='error' style="color:red; weight: bold"><?php if (isset($_POST["$nameErr"])) ValidateName($_POST["nameErr"]) ?></span>
                    </div>
                </div>

                <!-- 3------------------Phone Number -->        
                <div class="row">
                    <div class="col-md-2"></div>
                    <!-- label -->            
                    <div class="col-md-2" id="inputText">
                        <label for='phoneNumber'><strong>Phone Number:</strong></label>
                    </div>
                    <!-- input -->
                    <div class="col-md-4">
                        <input type="text" id="phoneNumber" name="phoneNumber" placeholder="0000000000"
                               value ='<?php if (isset($_POST["btnSubmit"])) echo $_POST["phoneNumber"] ?>'/> 
                    </div>
                    <!-- error message -->
                    <div class="col-md-3">
                        <span class='error' style="color:red; weight: bold"><?php if (isset($_POST["phoneNumber"])) ValidatePhone($_POST["phoneNumber"]) ?></span>
                    </div>
                </div>

                <br>
                <hr>
                <br>  

                <!-- 4------------------Password -->   
                <div class="row">
                    <div class="col-md-2"></div>
                    <!-- label -->   
                    <div class="col-md-2" id="inputText">
                        <label for='password'><strong>Password:</strong></label>
                    </div>
                    <!-- input -->         
                    <div class="col-md-4">
                        <input type="text" id="password" name="password" placeholder="Password"
                               value ='<?php if (isset($_POST["btnSubmit"])) echo $_POST["password"] ?>'/> 
                    </div>
                    <!-- error message -->
                    <div class="col-md-3">
                        <span class='error' style="color:red; weight: bold"><?php if (isset($_POST["passwordError"])) ValidatePassword($_POST["passwordError"]) ?></span>
                    </div>
                </div>

                <!-- 5------------------Password Again -->   
                <div class="row">
                    <div class="col-md-2"></div>
                    <!-- label -->   
                    <div class="col-md-2" id="inputText">
                        <label for='password'><strong>Password:</strong></label>
                    </div>
                    <!-- input -->         
                    <div class="col-md-4">
                        <input type="text" id="password" name="passwordAgain" placeholder="passwordAgain"
                               value ='<?php if (isset($_POST["btnSubmit"])) echo $_POST["password"] ?>'/> 
                    </div>
                    <!-- error message -->
                    <div class="col-md-3">
                        <span class='error' style="color:red; weight: bold"><?php if (isset($_POST["passwordAgain"])) ValidatePassword($_POST["passwordAgain"]) ?></span>
                    </div>
                </div>

                <br>
                <hr>
                <br>  
                <!-- 6------------------Buttons -->             
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-1"><button type="submit" id="btnSubmit" name="btnSubmit" class="btn btn-primary">Submit</button></div>
                    <div class="col-md-1"><button type="" id="btnClear" name="btnClear" class="btn btn-primary">Clear</button></div>
                </div>
                </form>
        </div>



    <div class="push"></div>
</div>
<?php include('./ProjectCommon/Footer.php'); ?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- front part end -->


</body>     
</html>
