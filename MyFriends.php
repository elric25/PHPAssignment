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
//        $LoggedID = $_SESSION['loggedIn'];
    }
    include("./Common/functions.php");

    $connection = ConnectDb();
    $user = $_SESSION['loggedIn'];
    $usernameQuery = "SELECT Name FROM User WHERE UserId = '$_SESSION[loggedIn]'";
    $usernameResult = $connection->query($usernameQuery);
    $usernames = $usernameResult->fetch_assoc();
    $username = $usernames["Name"];
    
    $Error = "";
    
    $FriendsQuery = "SELECT UserId, Name FROM User JOIN Friendship ON UserId = Friend_RequesterId WHERE Status = 'accepted' AND Friend_RequesterId != '$user'";
    
//    
//    $FriendQuery1 = "SELECT Name FROM User WHERE UserId = (Select Friend_RequesterId FROM"
//            . " Friendship WHERE Friend_RequesteeId = $_SESSIONS[loggedIn] AND Status = ".accepted.")";
//    $FriendQuery2 = "SELECT Name FROM User WHERE UserId = (Select Friend_RequesteeId FROM"
//            . " Friendship WHERE Friend_RequesterId = $_SESSIONS[loggedIn] AND Status = ".accepted.")";
//    
    
    
?>

<?php include("./Common/header.php"); ?>
    <link rel="stylesheet" href="Contents/Site.css">
    <div class="horizontal-margin vertical-margin">
	<h2>My Friends</h2>        
        <ul>
            Welcome <b><?php echo $username; ?>!</b> (Not you? Change user <a href='Login.php'>here</a>)
            <li><a href="AddFriend.php">Send friend requests</a></li>
        </ul>
    <form id="FriendListForm" method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <table style="width: 80%;">
        <tr>
            <td><h3>Friends</h3></td>
            <td></td>
            <td><a href="AddFriend.php">Send friend requests</a></td>
        </tr>
        <tr>
        <th>Name</th>
        <th>Shared albums</th>
        <th>De-friend</th>
        </tr>
        <?php
          $FriendResult = $connection->query($FriendsQuery);
          while($row = $FriendResult->fetch_assoc())
          {
              $friendId = $row["UserId"];
              $friendName = $row["Name"];
              
              $sharedQuery = "SELECT COUNT(*) AS Num FROM Album WHERE Owner_Id = '$friendId' AND Accessibility_Code = 'shared'";
              $sharedResult = $connection->query($sharedQuery);
              $sharedAmount = $sharedResult->fetch_assoc();
              $sharedNum = $sharedAmount["Num"];
              
              //TODO: Add checkboxes for defriend
              
              
              echo '<tr><td>'.$row["Name"].'</td><td>'.$sharedNum.'</td></tr>';
          }
        
//        $results1 = $connection->query($FriendQuery1);
//        $results2 = $connection->query($FriendQuery2);
//        while ($row = $results1->fetch_assoc()) 
//        {
//         $friendName = $row["Name"];
//         $query = "SELECT COUNT(*) as Num FROM Album WHERE Owner_Id = (select User_Id from User where Name = '$friendName') AND Accessibility_code = ".shared."";
//         $countResults = $connection->query($query);
//         $counts = $countResults->fetch_assoc();
//         $count = $counts["Num"];
//         echo '<tr><td>'. $row['Name'].'</td> <td>'.$count.'</td> <td><input type="checkbox" name="Delete" value="'.$row["Name"].'"></td> <tr>';
//
//         
//        }
//        while ($row = $results2->fetch_assoc()) 
//        {
//            
//        }
        ?>
    </table>
    </form>
        
    </div>

<?php include('./Common/footer.php'); ?>