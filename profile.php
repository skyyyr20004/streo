<?php
//pobierz sobie z url ID profilu
if(isset($_GET['profileID'])) {
    //jeśli istnieje profile id w url (w linku) to podstaw
    $id = $_GET['profileID'];
} else {
    //jeślinie istnieje w linku (nie podano) to ustaw 1
    $id = 1;
}

//kwerenda pobiera jeden profil z tabeli po jego id
$sql = "SELECT * FROM profile LEFT JOIN photo ON profile.profilePhotoID = photo.ID WHERE profile.ID=? LIMIT 1";

//połącz się z bazą danych
$db = new mysqli('localhost', 'root','','streo');

//przygotuj kweręde do wysłania
$query = $db->prepare($sql);

//podstaw ID
$query->bind_param('i', 2);

//wykonujemy kwerendę
$query->execute();

//odbierz wynik
$result = $query->get_result()->fetch_assoc();

//result jest jednowierszową tabelą



$firstName = $result['firstName'];
$lastName = $result['lastName'];
$description = $result['description'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Użytkownika</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="profileContent">
        <span id="name">
            <?php echo $firstName."".$lastName; ?>
        </span>
        <img src="<?php echo $profilePhotoUrl; ?>" alt="" id="profilePhoto">
        <P id="profileDescription">
            <?php echo $description; ?>
        </P>
    </div>
</body>
</html>
