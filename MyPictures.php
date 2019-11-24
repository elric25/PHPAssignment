<!DOCTYPE html>

            <?php
            include ('./ProjectCommon/Functions.php');
            session_start();
            $connection = ConnectDb();
            include('./ProjectCommon/Header.php');
            ?>


<!-- front end start-->
<html>

    <body style="background-color: rgba(130, 181, 224, 0.8)">
        <div class="wrapper">

            <form method ="post" action='Project.php' id ="indexForm">

                <div class="container">
                    <div class="row">
                        <div class="col-md-1"></div>

                        <div class="col-md-12">

                            <h3 class="picturesTitle">My Pictures</h3>

                        </div>
                    </div>
                </div>


                <!--------------------------Part 2 -->  
                <!-- 1------------------Title -->
                <div class="row">
                    <!-- label --> 
                    <div class="col-md-1"></div>

                    <!-- input -->
                    <div class="col-md-10">
                        <select name="myPicturesDropDown" class="myPicturesDropDown">
                            <option
                                value ="1" <?php if (isset($_SESSION["myPicturesDropDown"])) if ($_SESSION["myPicturesDropDown"] == 1) echo "SELECTED" ?>>Picture Name - updated om time period</option>
                            <option
                                value ="2" <?php if (isset($_SESSION["myPicturesDropDown"])) if ($_SESSION["myPicturesDropDown"] == 2) echo "SELECTED" ?>>Picture Name - updated om time period</option>

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
                    <div class="col-md-1"></div>
                    <div class="col-md-6" id="inputText">
                        <img src="images/Canadian-Parliament-3.jpg" width="900" title="imageFromDatabase" alt="imageFromDatabase">
                        <br>
                               
                        <div class="scrollmenu" width="800">

                            <a href="" class="imageScroll"><img src="images/Canadian-Parliament-3.jpg" alt="" width="200px" height="120px" id="imgScroll"></a>
                            <a href="" class="imageScroll"><img src="images/gettyimages-514479606.jpg" alt="" width="200px" height="120px" id="imgScroll"></a>
                            <a href="" class="imageScroll"><img src="images/chateau-frontenac.jpg" alt="" width="200px" height="120px" id="imgScroll"></a>
                            <a href="" class="imageScroll"><img src="images/Chateau-Frontenac-Quebec.jpg" alt="" width="200px" height="120px" id="imgScroll"></a>
                            <a href="" class="imageScroll"><img src="images/altar.jpg" alt="" width="200px" height="120px" id="imgScroll"></a>
                            <a href="" class="imageScroll"><img src="images/Summer-2015-Skyline0_5e954389-5056-a36f-234589b46e9b25ae.jpg" alt="" width="200px" height="120px" id="imgScroll"></a>
                            <a href="" class="imageScroll"><img src="images/torontoskyline_8-250763.jpg" alt="" width="200px" height="120px" id="imgScroll"></a>
                            <a href="" class="imageScroll"><img src="images/wallpaper-tags-toronto-night-city-city-lights-share-this-wallpaper.jpg" alt="" width="200px" height="120px" id="imgScroll"></a>
                            <a href="" class="imageScroll"><img src="images/Untitled-design-40.jpg" alt="" width="200px" height="120px" id="imgScroll"></a>
                            <a href="" class="imageScroll"><img src="images/5b.jpg" alt="" width="200px" height="120px" id="imgScroll"></a>
                            <a href="" class="imageScroll"><img src="images/1200px-AGO_at_dusk.jpg" width="200px" height="120px" alt="" id="imgScroll"></a>
                            <a href="" class="imageScroll"><img src="images/ROM_Exterior_406EC7A3-BE4C-4C08-83BF1C20A4F195D2_c63e8e8b-1e48-457f-bc3fd5ee7f1b9563.jpg" alt="" width="200px" height="120px" id="imgScroll"></a>
                            <a href="" class="imageScroll"><img src="images/shutterstock_673595569.jpg" alt="" width="200px" height="120px" id="imgScroll"></a>
                            <a href="" class="imageScroll"><img src="images/royal-ontario-museum-wedding-1.jpg" alt="" width="200px" height="120px" id="imgScroll"></a>
                        </div>
                        <!-- Image slides -->

                    </div>
                    <!-- input -->
                    <div class="col-md-4"> 
                        <div class="col-md-12">
                            <select multiple class="form-control" id="exampleFormControlSelect2" style="background-color: rgba(130, 181, 224, 0.8)">
                                <option name="myPicturesDescription">Description</option>
                                <option name="myPicturesComments">Comments</option>

                            </select>

                            <!-- 3------------------Leave Comments -->         
                            <div class="row">
                                <!-- label --> 

                                <!-- input -->
                                <div class="col-md-12">
                                    <textarea rows="5" cols="80" type="text" id="leaveComments" name='leaveComments' placeholder="Leave comments..."
                                              value ='<?php if (isset($_POST["btnSubmitAlbum"])) echo $_POST["leaveComments"] ?>'/></textarea>

                                </div>
                                <!-- error message -->
                                <div class="col-md-2">
                                    <span class='error' style="color:red; weight: bold"><?php if (isset($_POST["albumTitle"])) ValidateDescription($_POST["description"]) ?></span>
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
     
    <div class="push"></div>
  </div>

<?php include('./ProjectCommon/Footer.php'); ?>
    </body>     
</html>


