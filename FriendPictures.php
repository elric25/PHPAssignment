<?php
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

if (!isset($_GET['album'])) {
//    $query = "SELECT Album.*, User.Name FROM Friendship
//JOIN User ON (Friendship.Friend_RequesterId='$_SESSION[loggedIn]' AND User.UserId=Friendship.Friend_RequesteeId) OR (Friendship.Friend_RequesterId=User.UserId AND Friendship.Friend_RequesteeId='$_SESSION[loggedIn]]')
//JOIN Album WHERE Album.Owner_Id=User.UserId AND Album.Accessibility_code='shared'";
    
    $query = "SELECT * FROM Album WHERE Owner_Id='$_GET[id]' AND Accessibility_Code='Shared'";
    $result = $connection->query($query);
    $row = $result->fetch_assoc();
    $_GET['album'] = $row['Album_Id'];
}

$picture['Picture_Id'] = isset($_GET['picture']) ? $_GET['picture'] : "";
$pictureList = [];
$query = "SELECT Picture.* FROM Picture, Album WHERE Picture.Album_Id=Album.Album_Id AND Picture.Album_Id = '$_GET[album]' AND Accessibility_Code='shared'";
$result = $connection->query($query);

while ($row = $result->fetch_assoc()) {
    if ($row['Picture_Id'] == $picture['Picture_Id'] || $picture['Picture_Id'] == "") {
        $picture = $row;
    }
    $pictureList[] = $row;
}

if (isset($_POST['btnComment'])) {
    $query = "INSERT INTO Comment (Author_Id, Picture_Id, Comment_Text, Date) VALUES ('$_SESSION[loggedIn]', '$_POST[picture_id]', '$_POST[comment]', CURRENT_TIMESTAMP)";
    $connection->query($query);
}
?>

<?php include("./Common/header.php"); ?>
<link rel="stylesheet" href="Contents/Site.css">
<div class="horizontal-margin vertical-margin">
    <h1 style="text-align: center">Friends Pictures</h1>        
    <table style="width: 80%;">
        <tr>
            <td>
                <form action="" method="get">
                    <input type="hidden" value="<?php echo $_GET['id'] ?>" name="id" />
                    
                    <select name='album' class='form-control' id="selectPicture" onchange="$(this).closest('form').trigger('submit')">
                        <?php
//                        $query = "SELECT Album.*, User.Name FROM Friendship
//                                JOIN User ON (Friendship.Friend_RequesterId='S0001' AND User.UserId=Friendship.Friend_RequesteeId) OR (Friendship.Friend_RequesterId=User.UserId AND Friendship.Friend_RequesteeId='S0001')
//                                JOIN Album WHERE Album.Owner_Id=User.UserId AND Album.Accessibility_code='shared'";
                        $query = "SELECT * FROM Album WHERE Owner_Id='$_GET[id]' AND Accessibility_Code='Shared'";
                        $result = $connection->query($query);

                        while ($row = $result->fetch_assoc()) {
                            if ($row['Album_Id'] == $_GET['album']) {
                                echo '<option selected value="' . $row['Album_Id'] . '">' . $row['Title'] . ' - updated on ' . $row['Date_Updated'] . '</option>';
                            } else {
                                echo '<option value="' . $row['Album_Id'] . '">' . $row['Title'] . ' - updated on ' . $row['Date_Updated'] . '</option>';
                            }
                        }
                        ?>
                    </select>

                </form>
            </td>
        </tr>
        <tr>
            <td>
                <?php
                echo "<h2 style='text-align: center'>$picture[Title]</h2>";
                ?>
            </td>
        </tr>
        <tr>
            <td rowspan="2" style="width: 60%; padding-right: 10px">


                <div class="image-menu-back">
                    <img id="imageMain" src="./pictures/<?php
                    echo $picture['FileName'];
                    ?>" style="max-height: 500px; max-width: 100%;" />
                </div>
                <hr>
                <div style="overflow-x: auto; width: 100%; white-space: nowrap;">
                    <?php
                    foreach ($pictureList as $pic) {
                        echo "<a href='?id=$_GET[id]&album=$_GET[album]&picture=$pic[Picture_Id]'><img src='./pictures/$pic[FileName]' style='height: 100px;' /></a>";
                    }
                    ?>
                </div>
            </td>
            <td style="padding-top: 10px">
                <div style="max-height: 300px; overflow-y: auto;">
                    <b>Description:</b>
                    <div>
                        <?php echo $picture["Description"] ?>
                    </div>
                    <b>Comments:</b>
                    <div>
                        <?php
                        $query = "SELECT Comment.*, DATE_FORMAT(Date,'%d/%m/%Y') AS Date_uploaded, User.Name FROM Comment JOIN User ON Author_Id=UserId WHERE Picture_Id='$picture[Picture_Id]'";
                        $result = $connection->query($query);

                        while ($row = $result->fetch_assoc()) {
                            echo "<div style='padding-top: 10px;'><span style='color:blue; font-style: italic;'>$row[Name] ($row[Date_uploaded]):</span>&nbsp$row[Comment_Text]</div>";
                        }
                        ?>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <form method="POST" action="">
                    <input type="hidden" value="<?php echo $picture['Picture_Id']; ?>" name="picture_id" />
                    <div>
                        <textarea rows="5" cols="5" type="text" name="comment"></textarea>
                    </div>
                    <div>
                        <input type="submit" name="btnComment" value="Comment" class="btn btn-primary" />
                    </div> 
                </form>
            </td>
        </tr>
    </table>

</div>

<?php include('./Common/footer.php'); ?>