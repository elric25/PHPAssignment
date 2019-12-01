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
    
    if(isset($_GET["btnSubmit"]))
    {
        $title = $_GET["title"];
        $accessibilty = $_GET["accessibility"];
        $description = $_GET["description"];
        $date = date('Y-m-d H:i:s');
        $owner = $_SESSION["loggedIn"]; 
                
        $titleQuery = "SELECT Title FROM Album WHERE (Owner_Id = '$_SESSION[loggedIn]' && Title = '$title')";
        $titleResult = $connection->query($titleQuery);
        
        $insert = "INSERT INTO Project.Album (Title, Description, Date_Updated, Owner_Id, Accessibility_code) "
        . "VALUES ('$title', '$description', '$date', '$owner', '$accessibilty')";
        
        if(strlen($title) == null)
        {
            $Error = "*A title is required.";
        }
        //check if an album of the same name already exists for this user
        else if($titleResult->num_rows > 0)
        {
            $Error = "*Album with this title already exists.";
        }
        else if($titleResult->num_rows == 0)
        {
            $connection->query($insert);
            print "Album has been added";
        }
    }
            
?>

<?php include("./Common/header.php"); ?>
    <link rel="stylesheet" href="Contents/Site.css">
    <div class="horizontal-margin vertical-margin">
	<h2>Create New Album</h2>        
        Welcome <b><?php echo $username; ?>!</b> (Not you? Change user <a href='Login.php'>here</a>)

<form id="AlbumForm" method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <table style="width: 80%;">
        <tr><td></br></td></tr>
        <tr>
        <td class="style1" colspan="3">
        Title: 
        </td>
        <td class="style2">
        <label>
        <input class="form-control" type="text" name="title" id="title" value="<?php echo $_GET["title"]; ?>">
        </label>
        </td>
        <td class="style3">
        <?php echo '<div style="Color:red">'.$Error.'</div>'; ?> 
        </td>                        
        </tr>
        <tr>
        <td class="style1" colspan="3">
        Accessibility: 
        </td>   
        <td class="style2">
        <select name="accessibility" class="accessibility">  
        <?php 
        $AccessibilityDesc = "SELECT * FROM Accessibility";
        $Descriptions = mysqli_query($connection, $AccessibilityDesc);
        while ($row = mysqli_fetch_assoc($Descriptions)) 
        {
            echo '<option value="'.$row['Accessibility_Code'].'">'.$row['Description'].'</option>';
        }
        ?>
        </select>  
        </td>
        </tr>
        <tr>
        <td class="style1" colspan="3">
        Comments: 
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