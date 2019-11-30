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

                            <h1>My Friends</h1>
                            <p>Welcome <label id ="personName" name ="personName" class="personName"><strong>
                                    <?php
                                    $selectNameQuery = "SELECT Name FROM User WHERE UserId = '$_SESSION[login]'";
                                    $selectNameResult = mysqli_query($connection, $selectNameQuery);
                                    $name = mysqli_fetch_assoc($selectNameResult);
                                    echo $name['Name'];
                                    //$name = mysqli_fetch_row($selectNameResult);
                                    //echo $name[0];
                                    ?>
                                </strong></label> (not you? change user
                            <a class="aditionalInformationLink" href="Login.php" id="signUp" name="signUp" >here</a>)
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
                                               <?php if ($_SESSION["clickDefriend"] == "yes") echo 'checked' ?> />
                                    </td>

                                </tr>
                                <tr>
                                    <th scope="row" name="friendsNamePictures" class="friendsNamePictusignUres"><a class="friendPicturesLink" href="FriendPictures.php" id="friendPicturesLink" name="friendPicturesLink" style="color:blue; font-size: 16px;">Peter Adams</a> </th>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <!-- check box -->  
                                        <input type="checkbox" value="yes" name='clickDefriend' class="clickDefriend" 
                                               <?php if ($_SESSION["clickDefriend"] == "yes") echo 'checked' ?> />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" name="friendsNamePictures" class="friendsNamePictusignUres"><a class="friendPicturesLink" href="FriendPictures.php" id="friendPicturesLink" name="friendPicturesLink" style="color:blue; font-size: 16px;">Jane Doe</a> </th>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <!-- check box -->  
                                        <input type="checkbox" value="yes" name='clickDefriend' class="clickDefriend" 
                                               <?php if ($_SESSION["clickDefriend"] == "yes") echo 'checked' ?> />
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
                                               <?php if ($_SESSION["clickDefriend"] == "yes") echo 'checked' ?> />

                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td></td>
                                    <td>
                                        <!-- check box -->  
                                        <input type="checkbox" value="yes" name='acceptFriend' class="acceptFriend" 
                                               <?php if ($_SESSION["clickDefriend"] == "yes") echo 'checked' ?> />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td></td>
                                    <td>
                                        <!-- check box -->  
                                        <input type="checkbox" value="yes" name='acceptFriend' class="acceptFriend" 
                                               <?php if ($_SESSION["clickDefriend"] == "yes") echo 'checked' ?> />
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- 6------------------Buttons -->             
                <div class="row">
                    <div class="col-md-7"></div>
                    <div class="col-md-4">
                 <button type="submit" id="btnDenySelected" name="btnDeleteSelected" class="btn btn-primary" type="button" onclick="if(confirm('Are you sure?')) $(this).closest('form').trigger('submit')" >Delete Selected</button>
                       <!-- <button type="submit" id="btnDenySelected" name="btnDeleteSelected" class="btn btn-primary" >Delete Selected</button>--> 
                        <a href="CourseSelection.php?term=<?php echo $_GET[term]; ?>" id="btnClear" name="btnClear" class="btn btn-primary">Clear</a>
                    </div>
                </div> 

</form>             
        </div>
<?php include('./ProjectCommon/Footer.php'); ?>

</body>     
</html>




