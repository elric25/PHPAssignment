<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<!-- front end start-->
<html>
    <body style="background-color: rgba(130, 181, 224, 0.8)">
     <div class="wrapper">

     <?php 
     
     include ('./ProjectCommon/Functions.php');
        session_start();
        $connection = ConnectDb();
     include('./ProjectCommon/Header.php'); ?>
            <br>
           <br>

             
            <form method ="post" action='' id ="indexForm">
                
            <div class="container">
                <div class="row">
               <div class="col-md-1"></div>
               
                 
              <div class="col-md-12">
          
            <h1>Welcome to Algonquin College Online Course Registration</h1>
             <p style="font-size: 20px;">If you have never used this, before, you have to
                <a class="aditionalInformationLink" href="NewUser.php" id="signUp" name="signUp" style="color:blue; weight: bold; font-size: 20px;">sign up</a>
                                first.
            </p>
                        <p style="font-size: 20px;">If you have already signed up, you can
                 <a class="aditionalInformationLink" href="Login.php" id="newUser" name="newUser" style="color:blue; weight: bold; font-size: 20px;">log in</a>           
               
            </p>
              </div>
               </div>
                </div>
            <br>
           <br>

</form>
     
    <div class="push"></div>
  </div>

<?php include('./ProjectCommon/Footer.php'); ?>
  

       
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
   </body>     
</html>


