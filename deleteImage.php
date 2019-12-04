<?php

session_start();
if ($_SESSION['loggedIn'] == null) {
    die(0);
} else {
    include("./Common/functions.php");
    $connection = ConnectDb();
    $result = $connection->query("SELECT FileName FROM Picture WHERE Picture_Id='$_GET[id]'");
    if($row=$result->fetch_row()){
        if(unlink("./pictures/" . $row[0])){
            $connection->query("DELETE FROM Comment WHERE Picture_Id='$_GET[id]'");
            $connection->query("DELETE FROM Picture WHERE Picture_Id='$_GET[id]'");
        }
    }
}