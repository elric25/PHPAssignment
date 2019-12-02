<?php

session_start();
include("./Common/functions.php");

$connection = ConnectDb();
$usernameQuery = "SELECT Name FROM User WHERE UserId = '$_SESSION[loggedIn]'";
$usernameResult = $connection->query($usernameQuery);
$usernames = $usernameResult->fetch_assoc();
$username = $usernames["Name"];
    
$Error = "";
$AlbumID = $_GET['album'];
$query1 = "DELETE * FROM Picture WHERE Album_Id = '$AlbumID'";
$query2 = "DELETE * FROM Album WHERE Album_Id = '$AlbumID'";

mysqli_query($connection, $query1);
mysqli_query($connection, $query2);
mysqli_close($connection);
header("location: MyAlbums.php");
