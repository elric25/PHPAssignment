<?php
$PictureActive = 'active';
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
    $query = "SELECT * FROM Album WHERE Owner_Id='$_SESSION[loggedIn]'";
    $result = $connection->query($query);
    $row = $result->fetch_assoc();
    $_GET['album'] = $row['Album_Id'];
}

$picture['Picture_Id'] = isset($_GET['picture']) ? $_GET['picture'] : "";
$pictureList = [];
$query = "SELECT * FROM Picture WHERE Album_Id = '$_GET[album]'";
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
    <h1 style="text-align: center">My Pictures</h1>        
    <table style="width: 80%;">
        <tr>
            <td>
                <form action="" method="get">
                    <select name='album' class='form-control' id="selectPicture" onchange="$(this).closest('form').trigger('submit')">
                        <?php
                        $query = "SELECT * FROM Album WHERE Owner_Id='$_SESSION[loggedIn]'";
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

                    <!--
                    <style>
                        $select : hover{
                           opacity: 0.7; 
                           
                        }
                        $selectPicture{
 -webkit-transition: all 0.5s ease;
 -moz-transition: all 0.5s ease;
 -o-transition: all 0.5s ease;
 -ms-transition: all 0.5s ease;
 transition: all 0.5s ease;
}
 
.imageScroll:hover {
 -webkit-transform: scale(1.1);
 -moz-transform: scale(1.1);
 -o-transform: scale(1.1);
 -ms-transform: scale(1.1);
 transform: scale(1.1);
 cursor: pointer;
 
 -webkit-box-shadow: 0px 3px 5px rgba(0,0,0,0.2);
 -moz-box-shadow: 0px 3px 5px rgba(0,0,0,0.2);
 box-shadow: 0px 3px 5px rgba(0,0,0,0.2);
}
                    </style>
                    -->
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
                <style>
                    .image-hover-menu {
                        position: absolute;
                        bottom: 3%;
                        left: 50%;
                        transform: translateX(-50%);
                        display: none;
                        background: #FFFFFF88;
                    }
                    .image-hover-menu img {
                        width: 40px;
                        height: 40px;
                        margin: 5px;
                        opacity: 0.5;
                    }
                    .image-hover-menu img:hover {
                        opacity: 1;
                    }
                    .image-menu-back{
                        position: relative;
                        text-align: center;
                        height: 500px;
                    }
                    .image-menu-back:hover .image-hover-menu{
                        display: block;
                    }
                    #imageMain {
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%,-50%);
                    }
                </style>
                <script>
                    var imgRotation = 0;
                    function rotateImg(c) {
                        imgRotation += c;
                        $("#imageMain").css("transform", `translate(-50%,-50%) rotate(${imgRotation}deg)`)
                    }
                    function deleteImage(id) {
                        if (confirm("Are you sure you want to delete?")) {
                            $.ajax("deleteImage.php?id=" + id).done((r) => {
                                window.location = window.location.href.split("picture")[0];
                            });
                        }
                    }
                </script>
                <div class="image-menu-back">
                    <img id="imageMain" src="./pictures/<?php
                    echo $picture['FileName'];
                    ?>" style="max-height: 100%; max-width: 100%;" />

                    <div class="image-hover-menu">
                        <img onclick="rotateImg(90)" src="./Contents/img/rotate_clockwise.png" />
                        <img onclick="rotateImg(-90)" src="./Contents/img/rotate_other_side.png" />
                        <a href="./pictures/<?php echo $picture['FileName']; ?>" download>
                            <img src="./Contents/img/download.png" />
                        </a>
                        <img src="./Contents/img/tresh.png" onclick="deleteImage(<?php echo $picture['Picture_Id']; ?>)" />
                    </div>
                </div>
                <hr>
                <div style="overflow-x: auto; width: 100%; white-space: nowrap;">
                    <?php
                    foreach ($pictureList as $pic) {
                        echo "<a href='?album=$_GET[album]&picture=$pic[Picture_Id]'><img src='./pictures/$pic[FileName]' style='height: 100px;' /></a>";
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