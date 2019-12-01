<?php if($_SESSION['loggedIn'] == null)
    {
        header("location: LogIn.php");
    }
    else
    {
    }
?>

<?php include("./Common/header.php"); ?>
    <link rel="stylesheet" href="Contents/Site.css">
    <div class="horizontal-margin vertical-margin">
	<h2>Add friends</h2>        
        <ul>
            <li>Lorum Ipsum BlaBlaBla, this page should be linked to from clicking on a friends account</li>
            <li>Link back: <a href="MyFriends.php">My Friends</a></li>
        </ul>
    </div>

<?php include('./Common/footer.php'); ?>