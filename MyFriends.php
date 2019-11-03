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
 
        if(isset($_POST["btnAcceptFriendSelected"])){
            $isPostBack = TRUE;
        }
        include("AllFunctions.php"); 
                    $_SESSION["clickDefriend"] = $_POST["clickDefriend"];
                    $_SESSION["acceptFriend"] = $_POST["acceptFriend"];       
                  }
        if ($isPostBack){
 
            if(ValidateClickDefriend($_POST["clickDefriend"])&&ValidateAcceptFriend($_POST["acceptFriend"])){

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
             
            <form method ="post" action='Project.php' id ="indexForm">
                
            <div class="container">
                <div class="row">
               <div class="col-md-1"></div>
                                
              <div class="col-md-12">

            <h1>My Albums</h1>
            <p>Welcome <label id ="personName" name ="personName" class="personName"><srong>name</srong></label> (not you? change user
                <a class="aditionalInformationLink" href="Login.php" id="signUp" name="signUp" style="color:blue; weight: bold; font-size: 20px;">here</a>)
                   
            </p>
            </div>
               </div>
                </div>
        

                <div class="row">
               <div class="col-md-2"></div>
               <div class="col-md-6">
                   <label>Friends:</label>
               </div>                
              <div class="col-md-3">
                  <a class="addFriend" href="AddFriend.php" id="addFriends" name="addFriend" style="color:blue; weight: bold; font-size: 20px;">Add Friend</a>
                              
              </div>
               </div>

<!--------------------------Part 2 -->  
<!-- 1------------------Table 1 -->
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-9">
<!-- table 1 --> 
<label><?php echo $error ?></label> 
<table class="table">
  <thead>
    <tr class="col-md-12">
        <th scope="col" class="tableTitle" name="tableName"><strong>Name</strong></th>
      <th scope="col" class="tableSharedAlbums" name="tableSharedAlbums"><strong>Shared Albums</strong></th>
      <th scope="col" class="tableDefriend" name="tableDefriend"><strong>Defriend</strong></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row" name="friendsNamePictures" class="friendsNamePictusignUres"><a class="friendPicturesLink" href="FriendPictures.php" id="friendPicturesLink" name="friendPicturesLink" style="color:blue; font-size: 16px;">John Smith</a> </th>
      <td></td>
      <td></td>
      <td>
                     <!-- check box -->  
 <input type="checkbox" value="yes" name='clickDefriend' class="clickDefriend" 
         <?php if($_SESSION["clickDefriend"]== "yes") echo 'checked' ?> />
      </td>

    </tr>
    <tr>
      <th scope="row" name="friendsNamePictures" class="friendsNamePictusignUres"><a class="friendPicturesLink" href="FriendPictures.php" id="friendPicturesLink" name="friendPicturesLink" style="color:blue; font-size: 16px;">Peter Adams</a> </th>
      <td></td>
      <td></td>
      <td>
                     <!-- check box -->  
 <input type="checkbox" value="yes" name='clickDefriend' class="clickDefriend" 
         <?php if($_SESSION["clickDefriend"]== "yes") echo 'checked' ?> />
      </td>
    </tr>
    <tr>
      <th scope="row" name="friendsNamePictures" class="friendsNamePictusignUres"><a class="friendPicturesLink" href="FriendPictures.php" id="friendPicturesLink" name="friendPicturesLink" style="color:blue; font-size: 16px;">Jane Doe</a> </th>
      <td></td>
      <td></td>
      <td>
                     <!-- check box -->  
 <input type="checkbox" value="yes" name='clickDefriend' class="clickDefriend" 
         <?php if($_SESSION["clickDefriend"]== "yes") echo 'checked' ?> />
      </td>
    </tr>
  </tbody>
</table>
  </div>
        </div>

     <!-- 6------------------Buttons -->             
       <div class="row">
           <div class="col-md-8"></div>
     <div class="col-md-3"><button type="submit" id="btnDefriendSelected" name="btnDefriendSelected" class="btn btn-primary">Defriend Selected</button></div>

     </div>
                     <div class="row">
               <div class="col-md-2"></div>
               <div class="col-md-6">
                   <label>Friend Requests:</label>
               </div>                
               </div>

<!-- Part3-->           
<!-- 2------------------Table 2 -->
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-9">
<!-- table 1 --> 
<label><?php echo $error ?></label> 
<table class="table">
  <thead>
    <tr class="col-md-10">
        <th scope="col" class="tableNameFriendRequests" name="tableNameFriendRequests">Name</th>
      <th scope="col" class="tableAcceptOrDeny" name="tableAcceptOrDeny">Accept or Deny</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td></td>
      <td>
        <!-- check box -->  
 <input type="checkbox" value="yes" name='acceptFriend' class="acceptFriend" 
         <?php if($_SESSION["clickDefriend"]== "yes") echo 'checked' ?> />
    
    </td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td></td>
      <td>
        <!-- check box -->  
 <input type="checkbox" value="yes" name='acceptFriend' class="acceptFriend" 
         <?php if($_SESSION["clickDefriend"]== "yes") echo 'checked' ?> />
      </td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td></td>
      <td>
        <!-- check box -->  
 <input type="checkbox" value="yes" name='acceptFriend' class="acceptFriend" 
         <?php if($_SESSION["clickDefriend"]== "yes") echo 'checked' ?> />
      </td>
    </tr>
  </tbody>
</table>
  </div>
        </div>

     <!-- 6------------------Buttons -->             
       <div class="row">
           <div class="col-md-7"></div>
     <div class="col-md-4"><button type="submit" id="btnAcceptSelected" name="btnAcceptSelected" class="btn btn-primary">Accept Selected</button>
     <button type="submit" id="btnDenySelected" name="btnDenySelected" class="btn btn-primary">Deny Selected</button></div>
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




