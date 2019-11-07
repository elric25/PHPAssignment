<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

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

     <?php include('ProjectCommon/Header.php'); ?>
       
            <br>
           <br>

             
            <form method ="post" action='Project.php' id ="indexForm">
                
            <div class="container">
                <div class="row">
               <div class="col-md-1"></div>
               
                 
              <div class="col-md-12">

            <h1>Welcome to Algonquins Social Media Website</h1>
            <br>
            <br>
            <p>If you have never used this, before, you have to 
                <a class="additionalInformationLink" href="Login.php" id="signUp" name="signUp" style="color:blue; weight: bold; font-size: 20px;">Sign up</a>
                                first.
            </p>
                        <p>If you have already signed up, you can
                 <a class="additionalInformationLink" href="NewUser.php" id="newUser" name="newUser" style="color:blue; weight: bold; font-size: 20px;">Log in</a>           
               
            </p>
              </div>
               </div>
                </div>
            <br>
           <br>
           
     
<!--  <div class ="amount_ditails">  Typo? Undo comment if something is dependant Del-->
<div class="amount details">

      <fieldset>
         
     <div class="row">
         <div class="col-md-1"></div>

     </div>

    
  <div class="row">
         <div class="col-md-3" id="inputText">
         </div>
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
<?php include('./ProjectCommon/Footer.php'); ?>
  

       
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
  <!-- front part end -->



<!-- back part start -->
    
        <?php       
   
        ?>
   </body>     
</html>


