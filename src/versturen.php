<?php
$mysqli = new mysqli("localhost", "root", "", "livechat");

if(!empty($_POST['Naam'])&&!empty($_POST['bericht'])){
    $mysqli_stmt = $mysqli->prepare("INSERT INTO berichten (Naam, Bericht) VALUES (?, ?);");
    $mysqli_stmt->bind_param("ss", $_POST['Naam'], $_POST['bericht']);
    $mysqli_stmt->execute();
    $mysqli_stmt->close();

    header('Location:index.php');
}
else{
    header('Location:index.php');
}