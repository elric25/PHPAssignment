<?php
$UploadActive = 'active';
session_start();
if ($_SESSION['loggedIn'] == null) {
    header("location: Login.php");
} else {
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

$title = "";
$description = "";

if (isset($_POST["btnSubmit"]) && isset($_FILES['file'])) {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $album = $_POST['album'];
    
    $uploads_dir = './pictures';
    if ($_FILES["file"]["error"] == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["file"]["tmp_name"];
        $extension = explode(".",basename($_FILES["file"]["name"]))[count(explode(".",basename($_FILES["file"]["name"])))-1];
        $name = date("YmdHis") . ".$extension";
        $successful = move_uploaded_file($tmp_name, "$uploads_dir/$name");
        
        if($successful){
            $query = "INSERT INTO Picture (Album_Id, FileName, Title, Description, Date_added) VALUES ('$album', '$name', '$title', '$description', CURRENT_DATE())";
            $connection->query($query);
        }
    }
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

    <form id="UploadForm" method="POST" action="" enctype="multipart/form-data">
        <table style="width: 80%;">
            <tr><td></br></td></tr>
            <tr>
                <td class="style1" colspan="3">
                    Upload to Album: 
                </td>
                <td class="style2">
                    <label>
                        <select name='album' class='accessibility'>
<?php
$query = "SELECT Album_Id, Title FROM Album WHERE Owner_Id = '$_SESSION[loggedIn]'";
$result = $connection->query($query);

while ($row = $result->fetch_assoc()) {
    echo '<option value="' . $row['Album_Id'] . '">' . $row['Title'] . '</option>';
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
                    <!--<label for="choose" class="btn btn-default">Choose Files</label>-->
                    <input class="form-control" type="file" name="file" id="choose">
                </td>
            </tr>
            <tr>
                <td class="style1" colspan="3">
                    Title: 
                </td>
                <td>
                    <input class="form-control" type="text" name="title" id="choose" value="<?php echo $title; ?>">
                </td>
            </tr>
            <tr>
                <td class="style1" colspan="3">
                    Description:        
                </td>
                <td>
                    <textarea rows="7" cols="20" type="text" id="description" name='description'><?php echo $description; ?></textarea>    
                </td>
            </tr>
        </table>
        <input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" class="btn btn-primary">
        <a href="" class="btn btn-primary">Clear</a>
    </form>

</div>



<?php include('./Common/footer.php'); ?>