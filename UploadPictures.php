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
            <li>Lorum Ipsum BlaBlaBla, this page should be linked to from the main menu</li>
        </ul>
    </div>

<?php include('./Common/footer.php'); ?>