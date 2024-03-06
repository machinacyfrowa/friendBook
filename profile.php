<?php

//kwerenda pobiera jeden profil z tabeli po jego id
$sql = "SELECT * FROM profile WHERE ID=? LIMIT 1";

//połącz się z bazą danych
$db = new mysqli('localhost', 'root', '', 'friendBook');

//przygotuj kwerendę do wysłania
$query = $db->prepare($sql);

//zdefiniuj tymczasowo id na stałe
$id = 2;

//podstaw ID
$query->bind_param('i', $id);

//wykonujemy kwerendę
$query->execute();

//odbierz wynik
$result = $query->get_result()->fetch_assoc();

//result jest jednowierszową tabelą
//echo "<pre>";
//print_r($result);

$firstName = $result['firstName'];
$lastName = $result['lastName'];
$description = $result['description'];
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil użytkownika</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="profileContent">
        <span id="name">
            <?php echo $firstName." ".$lastName; ?>
        </span>
        <img src="https://picsum.photos/600/600" alt="" id="profilePhoto">
        <p id="profileDescription">
            <?php echo $description; ?>
        </p>
    </div>
</body>
</html>