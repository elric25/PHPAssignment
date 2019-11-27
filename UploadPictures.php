<!DOCTYPE html>

            <?php
            include ('./ProjectCommon/Functions.php');
            session_start();
            $connection = ConnectDb();
            include('./ProjectCommon/Header.php');
            if(isset($_SESSION['login']))
            {
            }
             else{       
                 header("location: Login.php");
        
                 }
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
                                value ="1"  <?php if (isset($_SESSION["uploadToAlbumPictures"])) if ($_SESSION["uploadToAlbumPictures"] == 1) echo "SELECTED" ?>>My China Trip</option>
                            <option
                                value ="2" <?php if (isset($_SESSION["uploadToAlbumPictures"])) if ($_SESSION["uploadToAlbumPictures"] == 2) echo "SELECTED" ?>></option>

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
                                  value ='<?php if (isset($_POST["btnSubmitPictures"])) echo $_POST["titleOfPicture"] ?>'/></textarea>

                    </div>
                    <!-- error message -->
                    <div class="col-md-2">
                        <span class='error' style="color:red; weight: bold"><?php if (isset($_POST["titleOfPicture"])) ValidateTitlePictures($_POST["titleOfPicture"]) ?></span>
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
                                  value ='<?php if (isset($_POST["btnSubmitPictures"])) echo $_POST["descriptionPictures"] ?>'/></textarea>

                    </div>
                    <!-- error message -->
                    <div class="col-md-2">
                        <span class='error' style="color:red; weight: bold"><?php if (isset($_POST["descriptionPictures"])) ValidateDescriptionPictures($_POST["descriptionPictures"]) ?></span>
                    </div>
                </div>

                <br>
                <hr>
                <br>  
                <!-- 6------------------Buttons -->             
                <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-1"><button type="submit" id="btnSubmitPictures" name="btnSubmitPictures" class="btn btn-primary">Submit</button></div>
                    <div class="col-md-1"><a href="UploadPictures.php?term=<?php echo $_GET[term]; ?>" id="btnClear" name="btnClear" class="btn btn-primary">Clear</a></div>
                </div>


</form>
     
    <div class="push"></div>
  </div>

<?php include('./ProjectCommon/Footer.php'); ?>

</body>     
</html>



