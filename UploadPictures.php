<?php
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

    if(isset($_GET["reset"]))
    {
        $_GET["title"] = "";
        $_GET["accessibility"] = "";
        $_GET["description"] = "";
    }
    
    //
    //          DROPDOWN
    //
    
    
    
?>

<?php include("./Common/header.php"); ?>
    <link rel="stylesheet" href="Contents/Site.css">
    <div class="horizontal-margin vertical-margin">
	<h2>Upload Pictures</h2>        
        <ul>
            <p>Accepted picture types: JPG (JPEG), GIF and PNG.</p>
            <p>You can upload multiple pictures at a time by pressing the shift key while selecting pictures.</p>
            <p>When uploading multiple pictures, the title and description fields will be applied to all pictures.</p>
        </ul>
        
    <form id="UploadForm" method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <table style="width: 80%;">
        <tr><td></br></td></tr>
        <tr>
        <td class="style1" colspan="3">
        Upload to Album: 
        </td>
        <td class="style2">
        <label>
        <select name='accessibility' class='accessibility'>
        <?php
        $query = "SELECT Album_Id, Title FROM Album WHERE Owner_Id = '$_SESSION[loggedIn]'";
        $result = $connection->query($query);
    
        while($row = $result->fetch_assoc())
        {
            echo '<option value="'.$row['Album_Id'].'">'.$row['Title'].'</option>';
        }
        ?>
        </select>
        </label>
        </td>                       
        </tr>
        <tr>
        <td class="style1" colspan="3">
        File to Upload: 
        </td>   
        <td class="style2">
<!--        //
        // TODO: form {
                  display: inline-block;
                  position: relative;
                }
                form input {
                  padding-right: 4.6em;
                }
                form button {
                  position: absolute;
                  top: 0;
                  right: 0;
                  width: 4.4em;
                }
        //-->
        <input class="form-control" type="text" name="choose" id="choose" value="<?php echo $_GET["choose"]; ?>">
        <button type="button" id="btnChoosePictures" name="btnChoosePictures" class="btn btn-secondary">Choose Files</button>
        </td>
        </tr>
        <tr>
        <td class="style1" colspan="3">
        Title: 
        </td>
        <td>
            <input class="form-control" type="text" name="choose" id="choose" value="<?php echo $_GET["choose"]; ?>">
        </td>
        </tr>
        <tr>
        <td class="style1" colspan="3">
        Description:        
        </td>
        <td>
            <textarea rows="7" cols="20" type="text" id="description" name='description'><?php echo $_GET["description"]; ?></textarea>    
        </td>
        </tr>
        
        
        </table>
        <input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" class="btn btn-primary">
        <input type="submit" name="reset" id="reset" value="Clear" class="btn btn-primary">
        </form>

    </div>
    
    
    
<?php include('./Common/footer.php'); ?>