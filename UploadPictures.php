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
    $query = "SELECT Album_Id, Title FROM Album WHERE Owner_Id = '$_SESSION[loggedIn]'";
    $result = $connection->query($query);
    
    print "<select name='accessibility' class='accessibility'>";
    while($row = $result->fetch_assoc())
    {
        echo '<option value="'.$row['Album_Id'].'">'.$row['Title'].'</option>';
    }
    print "</select>";
    
    
    
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
    </div>

<?php include('./Common/footer.php'); ?>