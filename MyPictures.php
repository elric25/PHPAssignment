<?php
    $PictureActive = 'active';
    session_start();
    if($_SESSION['loggedIn'] == null)
    {
        header("location: Login.php");
    }
    else
    {
        $LoginActive = 'hide';
        $LogoutActive = 'display';
    }
    include("./Common/functions.php");

    $connection = ConnectDb();
    $usernameQuery = "SELECT Name FROM User WHERE UserId = '$_SESSION[loggedIn]'";
    $usernameResult = $connection->query($usernameQuery);
    $usernames = $usernameResult->fetch_assoc();
    $username = $usernames["Name"];
    
    $Error = "";
    
?>

<?php include("./Common/header.php"); ?>
    <link rel="stylesheet" href="Contents/Site.css">
    <div class="horizontal-margin vertical-margin">
    <h2>My Pictures</h2>        
        
        
        
<form id="PictureForm" method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <table style="width: 80%;">
        <tr><td></br></td></tr>
        <tr>
        <td class="style1">
        <select name='accessibility' class='accessibility'>
        <?php
        $query = "SELECT Album_Id, Title, Date_Updated FROM Album WHERE Owner_Id = '$_SESSION[loggedIn]'";
        $result = $connection->query($query);
    
        while($row = $result->fetch_assoc())
        {
            echo '<option value="'.$row['Album_Id'].'">'.$row['Title'].'- updated on '.$row['Date_Updated'].'</option>';
        }
        ?>
        </select>
                          
        </tr>
        <tr>
        <td class="style1" colspan="3">
<!--        //
            TODO: Title goes here 
        //-->
        </td>   
        <td class="style2">
          
            
            
            
            
            
            
                         <div class="row">
                    <!-- label --> 
                    <div class="col-md-1"></div>
                    <div class="col-md-6" id="inputText">
                        <img src="images/Canadian-Parliament-3.jpg" width="800" title="imageFromDatabase" alt="imageFromDatabase">
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

    <style>
        div.scrollmenu {
  background-color: #333;
  overflow: auto;
  white-space: nowrap;
  
  height:135px;
 width: 900px;
 margin-bottom: 50px;
}

div.scrollmenu a {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 1px;
  text-decoration: none;
}

div.scrollmenu a:hover {
  background-color: #777;
}
    </style>
                        <style>

.photobanner {
 height: 233px;
 width: 900px;
 margin-bottom: 50px;
}
 
.imageScroll{
 -webkit-transition: all 0.5s ease;
 -moz-transition: all 0.5s ease;
 -o-transition: all 0.5s ease;
 -ms-transition: all 0.5s ease;
 transition: all 0.5s ease;
}
 
.imageScroll:hover {
 -webkit-transform: scale(1.1);
 -moz-transform: scale(1.1);
 -o-transform: scale(1.1);
 -ms-transform: scale(1.1);
 transform: scale(1.1);
 cursor: pointer;
 
 -webkit-box-shadow: 0px 3px 5px rgba(0,0,0,0.2);
 -moz-box-shadow: 0px 3px 5px rgba(0,0,0,0.2);
 box-shadow: 0px 3px 5px rgba(0,0,0,0.2);
}
                        </style>

   
            
            
            
            
            
            
            
            
            
            
            
        </td>
        </tr>
        <tr>
        <td class="style1" colspan="3">
           
        </td>
        <td>
        
        <div class="form-group" >
        <textarea readonly class="form-control" id="commentbox" rows="20" cols="5"  style="background-color: rgba(130, 181, 224, 0.8)">Content</textarea>
        </div>    
        
        <div class="form-group">
        <input class="form-control" type="text" placeholder="Your comments" />
        </div>
        <div class="form-group">
        <button class="btn btn-primary">Add Comment</button>
        </div>
        </form>
        </div>
        
        </td>
        </tr>
        
        
        
    </div>

<?php include('./Common/footer.php'); ?>