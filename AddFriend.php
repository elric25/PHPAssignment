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
        <tr>
        <td class="style1" colspan="3">
        ID:
        </td>
        <td class="style2" colspan="3">
        <input type="text" id="friendId" name='friendId'>
        </td>
        <td class="style3" colspan="3">
        <input type="submit" name="btnSubmit" id="btnSubmit" value="Send Friend Request" class="btn btn-primary">
        </td>
        </tr>
        </table>
    </div>

<?php include('./Common/footer.php'); ?>