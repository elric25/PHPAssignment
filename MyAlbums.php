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
    
?>

<?php include("./Common/header.php"); ?>
    <link rel="stylesheet" href="Contents/Site.css">
    <div class="horizontal-margin vertical-margin">
	<h2>Add friends</h2>        
        <ul>
            <li>Lorum Ipsum BlaBlaBla, this page should be linked to from the main menu</li>
            <li>Add new albums here <a href="AddAlbum.php">Add Albums</a></li>
        </ul>
    </div>

<?php include('./Common/footer.php'); ?>