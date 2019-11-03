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
 
        if(isset($_POST["btnSubmitAlbum"])){
            $isPostBack = TRUE;
        }
        include("AllFunctions.php"); 
                    $_SESSION["albumTitle"] = $_POST["albumTitle"];
                    $_SESSION["accessibility"] = $_POST["accessibility"];
                    $_SESSION["description"] = $_POST["description"];
                    
               if(isset($_POST["btnClear"])){
                unset($_SESSION["albumTitle"]);
                unset($_SESSION["accessibility"]);
                unset($_SESSION["description"]);
   
            }
        if ($isPostBack){
 
            if(ValidateAlbumTitle($_POST["albumTitle"])&&ValidateAccessibility($_POST["accessibility"])&&ValidateDescription($_POST["description"])){

                    header("Location: MyFriends.php");
            }
           
        }
*/
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

        <!-- Nav Bar -->       
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<img src="AlgCommon/AlgCommon/Contents/img/AC.png" alt="Italian Trulli">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
          <a class="nav-link" href="Index.php" id="homePage" name="homePage">Home</a>
      </li>
      <!-- nav link 1 -->
      <li class="nav-item">
          <a class="nav-link" href="MyFriends.php" id="myFriends" name="myFrriends">My Friends</a>
      </li>
      <!-- nav link 2 -->
      <li class="nav-item">
          <a class="nav-link" href="MyAlbums.php" id="myAlbums" name="myAlbums"><strong>My Albums</strong><span class="sr-only">(current)</span></a>
      </li>
            <!-- nav link 3 -->
      <li class="nav-item">
          <a class="nav-link" href="MyPictures.php" id="myPictures" name="myPictures">My Pictures</a>
      </li>
                  <!-- nav link 4 -->
      <li class="nav-item">
          <a class="nav-link" href="Login.php" id="login" name="login">Login</a>
      </li>
    </ul>

  </div>
</nav>
 <!-- end of nav bar -->       
            <br>
           <br>

             
            <form method ="post" action='Project.php' id ="indexForm">
                
            <div class="container">
                <div class="row">
               <div class="col-md-1"></div>
                                
              <div class="col-md-12">

            <h1>Create New Album</h1>
            <p>Welcome <label id ="personName" name ="personName" class="personName"><srong>name</srong></label> (not you? change user
                <a class="additionalInformationLink" href="Login.php" id="signUp" name="signUp" style="color:blue; weight: bold; font-size: 20px;">here</a>)
                   
            </p>
            </div>
               </div>
                </div>
            
           <br>
           <br>
  
<!--------------------------Part 2 -->  
<!-- 1------------------Title -->
<div class="row">
<!-- label --> 
<div class="col-md-2"></div>
    <div class="col-md-2" id="inputText">
        <label for='albumTitle'><strong> Title:</strong></label>
    </div>
 <!-- input -->
    <div class="col-md-6">
        <textarea rows="1" cols="50" type="text" id="albumTitle" name='albumTitle'
                  value ='<?php if(isset($_POST["btnSubmitAlbum"])) echo $_POST["albumTitle"]?>'/></textarea>
    </div>
   <!-- error message -->
          <div class="col-md-2">
         <span class='error' style="color:red; weight: bold"><?php if(isset($_POST["albumTitle"])) ValidateAlbumTitle($_POST["albumTitle"])?></span>
         </div>
  </div>



<!-- 2------------------Accessibility -->   
<div class="row">
<!-- label --> 
<div class="col-md-2"></div>
    <div class="col-md-2" id="inputText">
        <label for='albumTitle'><strong> Accessibility:</strong></label>
    </div>
 <!-- input -->
      <div class="col-md-6">     
        <!--<input type="number" id="years Deposit" name='years Deposit' placeholder="1" min="1" max="20"-->
          
                  <!--<input type="number" name="years Deposit" placeholder="1" min="1" max="20">-->
          <select name="accessibility" class="accessibility">
              
            <option
             value ="1"  <?php if(isset($_SESSION["accessibility"])) if($_SESSION["accessibility"] == 1) echo "SELECTED" ?>>Accessible only for the owner</option>
            <option
             value ="2" <?php if(isset($_SESSION["accessibility"])) if($_SESSION["accessibility"] == 2) echo "SELECTED" ?>>Accessible only for the owner and owner's friends</option>
                        
        </select>
    </div>
 </div>
<!-- 3------------------Description -->         
<div class="row">
<!-- label --> 
<div class="col-md-2"></div>
    <div class="col-md-2" id="inputText">
        <label for='userId'><strong>Description:</strong></label>
    </div>
 <!-- input -->
    <div class="col-md-6">
        <textarea rows="7" cols="50" type="text" id="albumTitle" name='description'
                  value ='<?php if(isset($_POST["btnSubmitAlbum"])) echo $_POST["description"]?>'/></textarea>

    </div>
   <!-- error message -->
          <div class="col-md-2">
         <span class='error' style="color:red; weight: bold"><?php if(isset($_POST["albumTitle"])) ValidateDescription($_POST["description"])?></span>
         </div>
  </div>
       
                <br>
                <hr>
                <br>  
     <!-- 6------------------Buttons -->             
       <div class="row">
           <div class="col-md-2"></div>
     <div class="col-md-1"><button type="submit" id="btnSubmitAlbum" name="btnSubmitAlbum" class="btn btn-primary">Submit</button></div>
     <div class="col-md-1"><button type="submit" id="btnClear" name="btnClear" class="btn btn-primary">Clear</button></div>
     </div>
                </div>

</form>
     

    <div class="push"></div>
  </div>
<!-- <footer class="footer">
      <div class="row" style="background-color: green; padding-bottom: 0px; padding: 15px;">
      <div class="col-md-5"></div>
      <div class="col-md-6"><label class="footerText">@Algonquin College 2010 - 2019. All Rights Reserved</label></div>
      </div>    
 </footer>-->
<?php include('Footer.php'); ?>
       
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
  <!-- front part end -->


   </body>     
</html>

