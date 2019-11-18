<!DOCTYPE html>

            <?php
            include ('./ProjectCommon/Functions.php');
            session_start();
            $connection = ConnectDb();
            include('./ProjectCommon/Header.php');
            include('./ProjectCommon/Footer.php');
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

             
            <form method ="post" action='Project.php' id ="indexForm">
                
            <div class="container">
                <div class="row">
               <div class="col-md-1"></div>
                                
              <div class="col-md-12">

            <h1>Create New Album</h1>
            <p>Welcome <label id ="personName" name ="personName" class="personName"><srong>name</srong></label> (not you? change user
                <a class="aditionalInformationLink" href="Login.php" id="signUp" name="signUp" style="color:blue; weight: bold; font-size: 20px;">here</a>)
                   
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
       
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
  <!-- front part end -->


   </body>     
</html>


