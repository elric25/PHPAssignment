<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
        <?php   
        /*
 $isPostBack = FALSE;        
/*start of the session */
 session_start();

 /*to redirect to the other page finish */
 /*
if(!isset($_SESSION['signUp'])) {
    header("Location: Index.php");
    exit();
}
 
        if(isset($_POST["btnSubmit"])){
            $isPostBack = TRUE;
        }
        include("AllFunctions.php"); 
                    $_SESSION["userId"] = $_POST["userId"];
                    $_SESSION["password"] = $_POST["password"];
                    
               if(isset($_POST["btnClear"])){
                unset($_SESSION["userId"]);
                unset($_SESSION["password"]);
            }
        if ($isPostBack){
 
            if(ValidateUserId($_POST["userId"])&&ValidatePassword($_POST["password"])){

                    header("Location: MyAlbums.php");
            }
           
        }
*/
        ?>

<!-- front end start-->
<html>
<!--    <head>
        <title>Project</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="main.scss"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   
    </head>-->
    <body style="background-color: rgba(130, 181, 224, 0.8)">
     <div class="wrapper">

<!--Header -->
     <?php include('./ProjectCommon/Header.php'); ?>  
 
            <br>
           <br>

             
            <form method ="post" action='Project.php' id ="indexForm">
                
            <div class="container">
                <div class="row">
               <div class="col-md-1"></div>
                                
              <div class="col-md-12">

            <h1>Log In</h1>
             <p>You need to 
                <a class="additionalInformationLink" href="NewUser.php" id="newUser" name="newUser" style="color:blue; weight: bold; font-size: 20px;">Sign up<br/> if you are a new user.</a>
                   
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
        <input type="text" id="userIdLogin" name='userId'
           value ='<?php if(isset($_POST["btnSubmit"])) echo $_POST["userId"]?>'/> 
    </div>
   <!-- error message -->
          <div class="col-md-3">
         <span class='error' style="color:red; weight: bold"><?php if(isset($_POST["userId"])) ValidateName($_POST["userId"])?></span>
         </div>
  </div>

                <br>  

<!-- 4------------------Password -->   
     <div class="row">
         <div class="col-md-2"></div>
          <!-- label -->   
    <div class="col-md-1" id="inputText">
        <label for='password'><strong>Password:</strong></label>
    </div>
   <!-- input -->         
    <div class="col-md-3">
        <input type="text" id="passwordLogin" name="password"
          value ='<?php if(isset($_POST["btnSubmit"])) echo $_POST["password"]?>'/> 
    </div>
    <!-- error message -->
          <div class="col-md-3">
         <span class='error' style="color:red; weight: bold"><?php if(isset($_POST["password"])) ValidatePassword($_POST["password"])?></span>
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
                </div>

</form>
     
    <div class="push"></div>
  
<!--Footer -->
<?php include('./ProjectCommon/Footer.php'); ?>
       
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
  <!-- front part end -->


   </body>     
</html>
