<!DOCTYPE html>

            <?php
            include ('./ProjectCommon/Functions.php');
            include('./ProjectCommon/Header.php');
            include('./ProjectCommon/Footer.php');
            session_start();
            $connection = ConnectDb();
            
            ?>


<!-- front end start-->
<html>
    <body style="background-color: rgba(130, 181, 224, 0.8)">
        <div class="wrapper">

            <br>
            <br>


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
                        <table class="table">
                            <thead>
                                <tr class="col-md-12">
                                    <th scope="col" class="tableTitle" name="tableTitle">Title</th>
                                    <th scope="col" class="" name="tableDateUpdated">Date Updated</th>
                                    <th scope="col" class="" name="tableNumberOfPictures">Number of Pictures</th>
                                    <th scope="col" class="" name="tableAccessibility">Accessibility</th>
                                    <th scope="col" class="" name="tableDelete"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>delete</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>delete</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>delete</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <br>
                <hr>
                <br>  
                <!-- 6------------------Buttons -->             
                <div class="row">
                    <div class="col-md-7"></div>
                    <div class="col-md-2"><button type="submit" id="btnSaveChanges" name="btnSaveChanges" class="btn btn-primary">Save Changes</button></div>

                </div>
                    

        </div>
        </form>


    <div class="push"></div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- front part end -->


</body>  
</html>


