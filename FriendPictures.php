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
                    $_SESSION["friendPicturesDropDown"] = $_POST["friendPicturesDropDown"];
                    $_SESSION["friendPicturesDescription"] = $_POST["friendPicturesDescription"];
                    $_SESSION["friendPicturesComments"] = $_POST["friendPicturesComments"];
                    $_SESSION["friendLeaveComments"] = $_POST["friendLeaveComments"];
  
               if(isset($_POST["btnClear"])){
                unset($_SESSION["friendPicturesDropDown"]);
                unset($_SESSION["friendPicturesDescription"]);
                unset($_SESSION["friendPicturesComments"]);
                unset($_SESSION["friendleaveComments"]);
   
            }
        if ($isPostBack){
 
            if(ValidateFriendPicturesDropDown($_POST["friendPicturesDropDown"])
              &&ValidateFriendPicturesDescription($_POST["friendPicturesDescription"])
              &&ValidateFriendPicturesComments($_POST["friendPicturesComments"])
               &&ValidateFriendLeaveComments($_POST["friendLeaveComments"])){

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


            <form method ="post" action='Project.php' id ="indexForm">
                
            <div class="container">
                <div class="row">
               <div class="col-md-1"></div>
                                
              <div class="col-md-12">

                  <h3 class="picturesTitle">Friend Pictures</h3>
                     
            </div>
               </div>
                </div>
          
  
<!--------------------------Part 2 -->  
<!-- 1------------------Title -->
<div class="row">
<!-- label --> 
<div class="col-md-2"></div>

 <!-- input -->
    <div class="col-md-8">
               <select name="friendPicturesDropDown" class="friendPicturesDropDown">
            <option
             value ="1" <?php if(isset($_SESSION["friendPicturesDropDown"])) if($_SESSION["friendPicturesDropDown"] == 1) echo "SELECTED" ?>>Picture Name - updated om time period</option>
            <option
             value ="2" <?php if(isset($_SESSION["friendPicturesDropDown"])) if($_SESSION["friendPicturesDropDown"] == 2) echo "SELECTED" ?>>Picture Name - updated om time period</option>
                      
       </select> 
    </div>
  </div>

            <div class="container">
                <div class="row">
               <div class="col-md-1"></div>
                                
              <div class="col-md-9">

                  <h3 class="picturesName" name="picturesName">Picture Name</h3>
                     
            </div>
               </div>
                </div>

<!-- 2------------------Picture -->   
<div class="row">
<!-- label --> 
<div class="col-md-2"></div>
    <div class="col-md-6" id="inputText">
        <img src="AlgCommon/AlgCommon/Contents/img/Canadian-Parliament-3.jpg" width="900" title="imageFromDatabase" alt="imageFromDatabase">
        <br>
        <div class="scrollmenu" width="800">

  <a href="" class="imageScroll"><img src="AlgCommon/AlgCommon/Contents/img/Canadian-Parliament-3.jpg" alt="" id="imgScroll"></a>
  <a href="" class="imageScroll"><img src="AlgCommon/AlgCommon/Contents/img/gettyimages-514479606.jpg" alt="" id="imgScroll"></a>
  <a href="" class="imageScroll"><img src="AlgCommon/AlgCommon/Contents/img/chateau-frontenac.jpg" alt="" id="imgScroll"></a>
  <a href="" class="imageScroll"><img src="AlgCommon/AlgCommon/Contents/img/Chateau-Frontenac-Quebec.jpg" alt="" id="imgScroll"></a>
  <a href="" class="imageScroll"><img src="AlgCommon/AlgCommon/Contents/img/altar.jpg" alt="" id="imgScroll"></a>
  <a href="" class="imageScroll"><img src="AlgCommon/AlgCommon/Contents/img/Summer-2015-Skyline0_5e954389-5056-a36f-234589b46e9b25ae.jpg" alt="" id="imgScroll"></a>
  <a href="" class="imageScroll"><img src="AlgCommon/AlgCommon/Contents/img/torontoskyline_8-250763.jpg" alt="" id="imgScroll"></a>
  <a href="" class="imageScroll"><img src="AlgCommon/AlgCommon/Contents/img/wallpaper-tags-toronto-night-city-city-lights-share-this-wallpaper.jpg" alt="" id="imgScroll"></a>
  <a href="" class="imageScroll"><img src="AlgCommon/AlgCommon/Contents/img/Untitled-design-40.jpg" alt="" id="imgScroll"></a>
  <a href="" class="imageScroll"><img src="AlgCommon/AlgCommon/Contents/img/5b.jpg" alt="" id="imgScroll"></a>
  <a href="" class="imageScroll"><img src="AlgCommon/AlgCommon/Contents/img/1200px-AGO_at_dusk.jpg" alt="" id="imgScroll"></a>
  <a href="" class="imageScroll"><img src="AlgCommon/AlgCommon/Contents/img/ROM_Exterior_406EC7A3-BE4C-4C08-83BF1C20A4F195D2_c63e8e8b-1e48-457f-bc3fd5ee7f1b9563.jpg" alt="" id="imgScroll"></a>
  <a href="" class="imageScroll"><img src="AlgCommon/AlgCommon/Contents/img/shutterstock_673595569.jpg" alt="" id="imgScroll"></a>
  <a href="" class="imageScroll"><img src="AlgCommon/AlgCommon/Contents/img/royal-ontario-museum-wedding-1.jpg" alt="" id="imgScroll"></a>
</div>
        <!-- Image slides -->

    </div>
 <!-- input -->
      <div class="col-md-4"> 
     <div class="col-md-12">
    <select multiple class="form-control" id="exampleFormControlSelect2" style="background-color: rgba(130, 181, 224, 0.8)">
        <option name="friendPicturesDescription">Description</option>
      <option name="friendPicturesComments">Comments</option>

    </select>
 
<!-- 3------------------Leave Comments -->         
<div class="row">
<!-- label --> 

 <!-- input -->
    <div class="col-md-12">
        <textarea rows="5" cols="80" type="text" id="leaveComments" name='leaveComments' placeholder="Leave comments..."
                  value ='<?php if(isset($_POST["btnSubmitAlbum"])) echo $_POST["leaveComments"]?>'/></textarea>

    </div>
   <!-- error message -->
          <div class="col-md-2">
         <span class='error' style="color:red; weight: bold"><?php if(isset($_POST["albumTitle"])) ValidateDescription($_POST["description"])?></span>
         </div>
  </div>

     <!-- 6------------------Buttons Add Comments -->             
       <div class="row">
      
     <div class="col-md-6"><button type="submit" id="btnAddComments" name="btnAddComments" class="btn btn-primary">Add Comment</button></div>
 
     </div>
  </div>  
 </div>
 </div>
  </form>
              </div>
     

    <div class="push"></div>
<!--Footer -->
<?php include('./ProjectCommon/Footer.php'); ?>
       
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
  <!-- front part end -->


   </body>     
</html>




