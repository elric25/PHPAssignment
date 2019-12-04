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
    //connection to DB
    $connection = ConnectDb();
    
    //Getting userinfo
    $userID = $_SESSION["loggedIn"];
    $usernameQuery = "SELECT Name FROM User WHERE UserId = '$userID'";
    $usernameResult = $connection->query($usernameQuery);
    $usernames = $usernameResult->fetch_assoc();
    $username = $usernames["Name"];
    
    //predeclared Error
    $Error = "";
    
    if(isset($_GET["btnSubmit"]))
    {
        //Friend ID check
        $friendID = $_GET["friendID"];
        
        if($friendID == null)
        {
            $Error = "You must enter a Friend ID";
        }
        else
        {
            $friendQuery = "SELECT UserId FROM User WHERE UserId = '$friendID'";
            $friendResult = $connection->query($friendQuery);
            $friendIdDB;
            if($friendResult->num_rows > 0)
            {
                $friends = $friendResult->fetch_assoc();
                $friendIdDB = $friends["UserId"];
            }
            else
            {
                $Error = "A user with this ID does not exist";
            }
            //Getting request variable instead of hardcoding
            $statusQuery = "SELECT Status_Code FROM FriendshipStatus WHERE Status_Code = 'request'";
            $statusResult = $connection->query($statusQuery);
            $status = $statusResult->fetch_assoc();
            $request = $status["Status_Code"];
            //Check if they are already friends or have a request send before adding
            $check = "SELECT * FROM Friendship WHERE Friend_RequesteeId = '$userID' AND Friend_RequesterId = '$friendIdDB'";
            $checkResult = $connection->query($check);
            if($checkResult->num_rows > 0)
            {
                $Error = "You already sent a friend request or are already friends with this user.";
            }
            else
            {       
                $insert = "INSERT INTO Project.Friendship (Friend_RequesterId, Friend_RequesteeId, Status) "
                . "VALUES ('$userID', '$friendIdDB', '$request')";
                $connection->query($insert);
                header("location: MyFriends.php");
            }
        }
        
        
    }
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
        <input type="text" id="friendId" name='friendID'>
        <input type="submit" name="btnSubmit" id="btnSubmit" value="Send Friend Request" class="btn btn-primary">
        </td>
        </tr>
        </table>
    </div>

<?php include('./Common/footer.php'); ?>