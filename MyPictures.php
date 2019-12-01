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
          
        </td>
        </tr>
        <tr>
        <td class="style1" colspan="3">
         
        </td>
        <td>
        <!--Div for css if we get around to it-->
        
        <p class="commentDescription">Picture Description goes here.</p>
        <div class="actionBox">
        <ul class="commentList">
        <li>
        <div class="Username">
        Username (Date):
        </div>
        <div class="commentText">
        <p class="">Hello this is a test comment.</p> 
        </div>
        </li>
        </ul>
        <form class="form-inline" role="form">
        <div class="form-group">
        <input class="form-control" type="text" placeholder="Your comments" />
        </div>
        <div class="form-group">
        <button class="btn btn-primary">Add Comment</button>
        </div>
        </form>
    </div>
</div>
        </td>
        </tr>
        
        
        </table>
        <input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" class="btn btn-primary">
        <input type="submit" name="reset" id="reset" value="Clear" class="btn btn-primary">
        </form>
    
    </div>

<?php include('./Common/footer.php'); ?>