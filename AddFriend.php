<!DOCTYPE html>

            <?php
            include ('./ProjectCommon/Functions.php');
            session_start();
            $connection = ConnectDb();
            include('./ProjectCommon/Header.php');
            ?>

<!-- front end start-->

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
     
    <div class="push"></div>
  </div>

<?php include('./ProjectCommon/Footer.php'); ?>

    </body>     
</html>
