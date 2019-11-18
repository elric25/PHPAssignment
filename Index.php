<!DOCTYPE html>

            <?php
            include ('./ProjectCommon/Functions.php');
            session_start();
            $connection = ConnectDb();
            include('./ProjectCommon/Header.php');
            include('./ProjectCommon/Footer.php');
            ?>

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


            <form method ="post" action='' id ="indexForm">

                <div class="container">
                    <div class="row">
                        <div class="col-md-1"></div>


                        <div class="col-md-12">

                            <h1>Welcome to Algonquin College Online Course Registration</h1>
                            <br>
                            <br>
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



        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <!-- front part end -->



        <!-- back part start -->

        <?php
        ?>
    </body>     
</html>


