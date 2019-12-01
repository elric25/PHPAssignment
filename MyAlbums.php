<?php
    $AlbumActive = 'active';
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
    
    $albumQuery = "SELECT Album_Id, Title, Owner_Id, Date_Updated, Accessibility_Code FROM Album WHERE (Owner_Id = '$_SESSION[loggedIn]')";
    $albumResult = $connection->query($albumQuery);
    $albums = $albumResult->fetch_assoc();
    
    $ownerID = $albums["Owner_Id"];
    $albumID = $albums["Album_Id"];
    $title = $albums["Title"];
    $date = $albums["Date_Updated"];
    $accessibilty = $albums["Accessibility_Code"];
    
    $pictureQuery = "SELECT * FROM Picture WHERE Album_Id = '$albumID'";
    $pictureResult = $connection->query($pictureQuery);
    
    $numOfPictures = $pictureResult->num_rows;
    
    
    
?>

<?php include("./Common/header.php"); ?>
    <link rel="stylesheet" href="Contents/Site.css">
    <div class="horizontal-margin vertical-margin">
	<h2>My Albums</h2>        
        <ul>
            Welcome <b><?php echo $username; ?>!</b> (Not you? Change user <a href='Login.php'>here</a>)
            <li><a href="AddAlbum.php">Create a New Album</a></li>
        </ul>
    </div>

    
    
    
<?php include('./Common/footer.php'); ?>