<?php    
    session_start();
    if($_SESSION['loggedIn'] == null)
    {
        header("location: LogIn.php");
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
    
    session_start();
    if(isset($_GET["reset"]))
    {
        $_GET["title"] = "";
        $_GET["accessibility"] = "";
        $_GET["description"] = "";
    }

    if(isset($_GET["btnSubmit"]))
    {
        $title = $_GET["title"];
        $accessibilty = $_GET["accessibility"];
        $description = $_GET["description"];
        
        $titleQuery = "SELECT Title FROM Album WHERE (Owner_Id = '$_SESSION[loggedIn]' && Title = '$title')";
        $titleResult = $connection->query($titleQuery);
        $titles = $titleResult->fetch_assoc();
        
        if(strlen($title) == null)
        {
            $Error = "*A title is required.";
        }
        //check if an album of the same name already exists for this user
        else if($titles->num_rows > 0)
        {
            $Error = "*Album with this title already exists.";
        }
        else
        {
            //add album
        }
    }
             
     
?>

<?php include("./Common/header.php"); ?>
    <link rel="stylesheet" href="Contents/Site.css">
    <div class="horizontal-margin vertical-margin">
	<h2>Create New Album</h2>        
        Welcome <b><?php echo $username; ?>!</b> (Not you? Change user <a href='Login.php'>here</a>)
        You have registered <br><br>
    </div>
    
    
<?php include('./Common/footer.php'); ?>