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
 
        if(isset($_POST["btnSaveChanges"])){
            $isPostBack = TRUE;
        }
        include("AllFunctions.php"); 
                    $_SESSION["albumTitle"] = $_POST["albumTitle"];
                    $_SESSION["dateUpdated"] = $_POST["dateUpdated"];
                    $_SESSION["numberOfPictures"] = $_POST["numberOfPictures"];
                    $_SESSION["accessibility"] = $_POST["accessibility"];
                    
               
   
            }
        if ($isPostBack){
 
            if(ValidateAlbumTitle($_POST["albumTitle"])&&ValidateDateUpdated($_POST["dateUpdated"])
  *          &&ValidateNumberOfPictures($_POST["numberOfPictures"])&&ValidateAccessibility($_POST["accessibility"])){

                    header("Location: MyFriends.php");
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

            <h1>My Albums</h1>
            <p>Welcome <label id ="personName" name ="personName" class="personName"><srong>name</srong></label> (not you? change user
                <a class="additionalInformationLink" href="Login.php" id="signUp" name="signUp" style="color:blue; weight: bold; font-size: 20px;">here</a>)
                   
            </p>
            </div>
               </div>
                </div>
            
           <br>
           

                <div class="row">
               <div class="col-md-8"></div>
                                
              <div class="col-md-3">
                  <a class="createNewAlbumLink" href="AddAlbums.php" id="signUp" name="signUp" style="color:blue; weight: bold; font-size: 20px;">Create New Album</a>
                              
              </div>
               </div>

           <br>
  
<!--------------------------Part 2 -->  
<!-- 1------------------Title -->
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
<!-- table --> 
<label><?php echo $error ?></label> 
        <table border="1">
             <tr><th class="headTableTitle"><a href="MyAlbumsTable.php?sort=title">Title</a></th><th><a href="BookSelection.php?sort=dateUpdated">Date Updated</a></th>
                 <th>Number of Pictures</th><th>Accessibility</th></tr>
               </div>
                <?php
   
                ?>
</table>
  </div>
        </div>

                <br>
                <hr>
                <br>  
     <!-- 6------------------Buttons -->             
       <div class="row">
           <div class="col-md-8"></div>
     <div class="col-md-1"><button type="submit" id="btnSaveChanges" name="btnSaveChanges" class="btn btn-primary">Save Changes</button></div>

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


