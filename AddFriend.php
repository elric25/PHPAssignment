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
    $userID = $_SESSION["loggedIn"];
    $usernameQuery = "SELECT Name FROM User WHERE UserId = '$userID'";
    $usernameResult = $connection->query($usernameQuery);
    $usernames = $usernameResult->fetch_assoc();
    $username = $usernames["Name"];
    
    
    $Error = "";
    
    $friendID = $_GET["friendID"];
    
    $friendQuery = "SELECT UserId FROM User WHERE UserId = '$friendID'";
    $friendResult = $connection->query($friendQuery);
    if($friendResult->num_rows > 0)
    {
        $friends = $friendResult->fetch_assoc();
        $friendIdDB = $friends["User_Id"];
    }
    else
    {
        $Error = "A user with this ID does not exist";
    }
    $statusQuery = "SELECT Status_Code FROM FriendshipStatus WHERE Status_Code = 'request'";
    $statusResult = $connection->query($statusQuery);
    $status = $statusResult->fetch_assoc();
    $request = $status["Status_Code"];
    
    $insert = "INSERT INTO Project.Friendship (FriendRequesteeId, Friend_RequesterId, Status) "
        . "VALUES ('$userID', '$friendIdDB', '$phone', '$passwordHashed')";
    
?>

<?php include("./Common/header.php"); ?>
    <link rel="stylesheet" href="Contents/Site.css">
    <div class="horizontal-margin vertical-margin">
	<h2>Add Friend</h2>        
        <ul>
            Welcome <b><?php echo $username; ?>!</b> (Not you? Change user <a href='Login.php'>here</a>)
            <p>Enter the ID of the user you want to be friend with</p>
        </ul>
        
        <form id="addFriendForm" method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <table style="width: 80%;">
        <tr><td></br></td></tr>
        <?php echo '<div style="Color:red">'.$Error.'</div>'; ?> 
        <tr>
        <td class="style1" colspan="3">
        ID:
        </td>
        <td class="style2" colspan="3">
        <input type="text" id="friendId" name='friendId'>
        <input type="submit" name="btnSubmit" id="btnSubmit" value="Send Friend Request" class="btn btn-primary">
        </td>
        </tr>
        </table>
    </div>

<?php include('./Common/footer.php'); ?>