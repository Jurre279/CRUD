<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Livechat - Database </title>
</head>
<?php
$conn = new mysqli('localhost', 'root', '', 'chat');
$stmt = "SELECT naam, bericht, idberichten FROM berichten";
$result = $conn -> query($stmt);
    while ( $row = $result->fetch_assoc() ) {
        echo $row["naam"];
        echo ":";
        echo $row["bericht"];
        echo ' <a href=Updaten.php?id=' . $row["idberichten"] . '>Updaten</a>';
        echo " ";
        echo ' <a href=verwijderen.php?id=' . $row["idberichten"] . '>verwijderen</a>';
        echo "</br>";
    }
$result->close();

?>
<body>
    <form action="versturen.php" method="POST">
        <input type="text" name="Naam" placeholder="Naam">
        <input type="text" name="bericht" placeholder="Je bericht">
        <button type="submit">Verzenden</button>
    </form>
</body> 
</html>
