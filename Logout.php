<?php
    session_start();
    unset($_SESSION['loggedIn']);
    
    $LoginActive = 'display';
?>

<?php include("./Common/header.php"); ?>
    <link rel="stylesheet" href="Contents/Site.css">
    <div class="horizontal-margin vertical-margin">
    </div>

<?php include('./Common/footer.php'); ?>