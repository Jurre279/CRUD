<?php
$mysqli = new mysqli("localhost", "root", "", "chat");

    if (!empty($_GET["id"])) {
        $qry = "SELECT bericht, naam FROM berichten WHERE idberichten = ?";
        $mysqli_stmt = $mysqli->prepare($qry); // Voorbereiden van de query
        $mysqli_stmt->bind_param('i', $_GET["id"]);
        $mysqli_stmt->execute(); // Uitvoeren van de query
        $result = $mysqli_stmt->get_result();   //Ophalen van de resultatenS
        $content = " ";

        while ($row = $result->fetch_assoc()) { // Steeds een rij ophalen uit de resultaten
            echo '<form action="" method="POST">';
            echo "<span><input type='text' placeholder='naam' name='naam' value='" . $row['naam'] . "'></span>&nbsp;";
            echo "<span><input type='text' placeholder='bericht' name='bericht' value='" . $row['bericht'] . "'></span>&nbsp;";
            echo "<span><input name='wijzigen' type='submit' value='wijzigen'></span>&nbsp;";
            echo "</form>";
        }
    }
    else{
        header('Location:index.php');
    }
    if (isset($_POST["wijzigen"])) {
        $updateqry = "UPDATE berichten SET bericht=?, naam=? WHERE idberichten = ? ";
        $mysqli_stmt = $mysqli->prepare($updateqry); // Voorbereiden van de query
        $mysqli_stmt->bind_param('ssi', $_POST["bericht"], $_POST["naam"], $_GET["id"]);
        $mysqli_stmt->execute();

        header('Location:index.php');
    }
