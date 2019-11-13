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
 
        if(isset($_POST["btnSubmitPictures"])){
            $isPostBack = TRUE;
        }
        include("AllFunctions.php"); 
                    $_SESSION["uploadToAlbumPictures"] = $_POST["uploadToAlbumPictures"];
                    $_SESSION["fileToUploadPictures"] = $_POST["fileToUploadPictures"];
                    $_SESSION["titlePictures"] = $_POST["titlePictures"];
                    $_SESSION["descriptionPictures"] = $_POST["descriptionPictures"];
                    
               if(isset($_POST["btnClear"])){
                unset($_SESSION["uploadToAlbumPictures"]);
                unset($_SESSION["fileToUploadPictures"]);
                unset($_SESSION["titlePictures"]);
                unset($_SESSION["descriptionPictures"]);         
   
            }
        if ($isPostBack){
 
            if(ValidateUploadToAlbumPictures($_POST["uploadToAlbumPictures"])&&ValidateFileToUploadPictures($_POST["fileToUploadPictures"])
  *         &&ValidateTitlePictures($_POST["titlePictures"])&&ValidateDescriptionPictures($_POST["descriptionPictures"])){

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

<!--Header -->
     <?php include('./ProjectCommon/Header.php'); ?>      
            <br>
           <br>

             
            <form method ="post" action='Project.php' id ="indexForm">
                
            <div class="container">
                <div class="row">
               <div class="col-md-1"></div>
                                
              <div class="col-md-12">

            <h1>Upload Pictures</h1>
            <p>Accepted picture types: JPG (JPEG), GIF and PNG.</p>
            <p>You can upload multiple pictures at a time by pressing the shift key while selecting pictures.</p>
            <p>When uploading multiple pictures, the title and description fields will be applied to all pictures.</p>
            </div>
               </div>
                </div>
            
           <br>
           <br>
  
<!--------------------------Part 2 -->  
<!-- 1------------------Upload to Album -->
<div class="row">
<!-- label --> 
<div class="col-md-2"></div>
    <div class="col-md-2" id="inputText">
        <label for='albumTitle'><strong> Upload to Album:</strong></label>
    </div>
 <!-- input -->
      <div class="col-md-6">     
       
          <select name="uploadToAlbumPictures" class="uploadToAlbumPictures">
              
            <option
             value ="1"  <?php if(isset($_SESSION["uploadToAlbumPictures"])) if($_SESSION["uploadToAlbumPictures"] == 1) echo "SELECTED" ?>>My China Trip</option>
            <option
             value ="2" <?php if(isset($_SESSION["uploadToAlbumPictures"])) if($_SESSION["uploadToAlbumPictures"] == 2) echo "SELECTED" ?>></option>
                        
        </select>
    </div>
 </div>

<!-- 2------------------File to Upload -->   
<div class="row">
<!-- label --> 
<div class="col-md-2"></div>
    <div class="col-md-2" id="inputText">
        <label for='albumTitle'><strong> File to Upload:</strong></label>
    </div>
 <!-- input -->
      <div class="col-md-6">           
          <button type="button" id="btnChoosePictures" name="btnChoosePictures" class="btn btn-secondary">Choose Files</button>
          No files chosen
      </div>
 </div>
<br>
<!-- 3------------------Title -->         
<div class="row">
<!-- label --> 
<div class="col-md-2"></div>
    <div class="col-md-2" id="inputText">
        <label for='title'><strong>Title:</strong></label>
    </div>
 <!-- input -->
    <div class="col-md-6">
        <textarea rows="1" cols="50" type="text" id="titleOfPicture" name='titleOfPicture'
                  value ='<?php if(isset($_POST["btnSubmitPictures"])) echo $_POST["titleOfPicture"]?>'/></textarea>

    </div>
   <!-- error message -->
          <div class="col-md-2">
         <span class='error' style="color:red; weight: bold"><?php if(isset($_POST["titleOfPicture"])) ValidateTitlePictures($_POST["titleOfPicture"])?></span>
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
        <textarea rows="7" cols="50" type="text" id="descriptionPictures" name='descriptionPictures'
                  value ='<?php if(isset($_POST["btnSubmitPictures"])) echo $_POST["descriptionPictures"]?>'/></textarea>

    </div>
   <!-- error message -->
          <div class="col-md-2">
         <span class='error' style="color:red; weight: bold"><?php if(isset($_POST["descriptionPictures"])) ValidateDescriptionPictures($_POST["descriptionPictures"])?></span>
         </div>
  </div>
       
                <br>
                <hr>
                <br>  
     <!-- 6------------------Buttons -->             
       <div class="row">
           <div class="col-md-2"></div>
     <div class="col-md-1"><button type="submit" id="btnSubmitPictures" name="btnSubmitPictures" class="btn btn-primary">Submit</button></div>
     <div class="col-md-1"><button type="submit" id="btnClear" name="btnClear" class="btn btn-primary">Clear</button></div>
     </div>
                </div>

</form>
     
  
<!--Footer -->
<?php include('./ProjectCommon/Footer.php'); ?>
       
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
  <!-- front part end -->


   </body>     
</html>



