<?php
$mysqli = new mysqli("localhost", "root", "", "livechat");

$id = $_GET["id"];
	if (!empty($_GET["id"])) {
        $qry = "DELETE FROM berichten WHERE idberichten = ? ";
        $mysqli_stmt = $mysqli->prepare($qry); // Voorbereiden van de query
        $mysqli_stmt->bind_param('s', $id);
        $mysqli_stmt->execute();

        header('Location:index.php');
}
    else{
        header('Location:index.php');
    }