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

                            <h1>Add Friend</h1>
                            <br>


                            <p>Welcome <label id ="personName" name ="personName" class="personName"><srong>name</srong></label> (not you? change user
                                <a class="aditionalInformationLink" href="Login.php" id="signUp" name="signUp" style="color:blue; weight: bold; font-size: 20px;">here</a>)
                            </p>
                            <p>Enter the ID of the user you want to be friend with</p>
                        </div>
                    </div>
                </div>

                <br>
                <!-- error message -->
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-10">
                        <span class='error' style="color:red; weight: bold"><?php if (isset($_POST["userId"])) ValidateName($_POST["userId"]) ?>
                            Your request has sent to Jane Doe (ID: doej). Once Jane Doe accepts your request, you and Jane Doese
                            will be friends and be able to view each other's shared albums.</span>
                    </div>
                </div>
                <br>

                <!--------------------------Part 2 -->  
                <!-- 1------------------Friend ID -->
                <div class="row">
                    <!-- label --> 
                    <div class="col-md-2"></div>
                    <div class="col-md-1" id="inputText">
                        <label for='yearsDeposit'><strong> ID:</strong></label>
                    </div>
                    <!-- input -->
                    <div class="col-md-3">
                        <input type="text" id="friendId" name='friendId' placeholder="ID"
                               value ='<?php if (isset($_POST["btnSendFriendRequest"])) echo $_POST["friendId"] ?>'/> 
                    </div>
                    <div class="col-md-3"><button type="submit" id="btnSendFriendRequest" name="btnSendFriendRequest" class="btn btn-primary">Send Friend Request</button></div>

                </div>
            </form>

        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <!-- front part end -->


    </body>     
</html>
