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
    
    if(isset($_GET["btnSubmit"]))
    {
        //separate Album ID from new Accessbility_Code
        $arrToString = implode("", $_GET["accessibility"]);
        echo $arrToString;
        $newAccessibility = explode("|", $arrToString);
        
        //cycle through all existing albums of this user
        while($entry = $albumResult->fetch_assoc())
        {
            $id = $entry["Album_Id"];
            $access = $entry["Accessibility_Code"];
            //cycle through submitted ID + accessibility
            //check if ID matches
            for($i = 0; $i < count($newAccessibility)-1; $i++)
            {
                if($i % 2 == 0)
                {
                    $tempID = $newAccessibility[$i];
                    $tempAcc = $newAccessibility[$i+1];
                    if($id == $tempID && $access != $tempAcc)
                    {
                        $update = "UPDATE Album SET Accessibility_Code='$tempAcc' WHERE Album_Id='$tempID'";
                        $connection->query($update);
                    }
                }
                
            }
        }
        
        
        
    }
    
    
    
?>

<?php include("./Common/header.php"); ?>
    <link rel="stylesheet" href="Contents/Site.css">
    <div class="horizontal-margin vertical-margin">
	<h2>My Albums</h2>        
        <ul>
            Welcome <b><?php echo $username; ?>!</b> (Not you? Change user <a href='Login.php'>here</a>)
            <li><a href="AddAlbum.php">Create a New Album</a></li>
        </ul>
        
        <form id="AlbumOutForm" method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <table style="width: 80%;">
        <tr><td></br></td></tr>
        <tr>
            <th>Title</th>
            <th>Date Updated</th>
            <th>Number of Pictures</th>
            <th>Accessibility</th>
        </tr>
        
        <?php   
        $results = $connection->query($albumQuery);
        while ($row = $results->fetch_assoc()) 
        {
            $albumID = $row["Album_Id"];
            $query = "SELECT COUNT(*) AS Num FROM Picture WHERE Album_Id = '$albumID'";
            $countResults = $connection->query($query);
            $counts = $countResults->fetch_assoc();
            $count = $counts["Num"];
            //LINK needs session for album ID, 
            echo '<tr><td><a href="MyPictures.php?album=' . $row['Album_Id'] . '">'.$row['Title'].'</a></td> <td>'.$row['Date_Updated'].'</td> <td>'.$count.'</td> <td>';
            $AccessibilityDesc = "SELECT * FROM Accessibility";
            $Descriptions = mysqli_query($connection, $AccessibilityDesc);
            echo '<select name="accessibility[]" class="accessibility">';  
            while ($new = mysqli_fetch_assoc($Descriptions)) 
            {
                if($row["Accessibility_Code"] == $new["Accessibility_Code"])
                {
                    echo '<option value="'.$row["Album_Id"].'|'.$new['Accessibility_Code'].'|'.'" selected>'.$new['Description'].'</option>';
                }
                else
                {
                    echo '<option value="'.$row["Album_Id"].'|'.$new['Accessibility_Code'].'|'.'">'.$new['Description'].'</option>';   
                }
            }
            echo '</select></td>';
            //Make delete do something
//            echo '<td><button onclick="DeleteAlbum('. $row['Album_Id'] .')">'.delete.'</button></td> </tr>';
            echo '<td><a href="Delete.php?album=' . $row['Album_Id'] . '">'.Delete.'</a></td> </tr>';

        }
        ?>
        </table>
        <input type="submit" name="btnSubmit" id="btnSubmit" value="Save Changes" class="btn btn-primary">
        </form>
    </div>
    
    

    
    
    
<?php include('./Common/footer.php'); ?>