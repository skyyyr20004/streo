<?php

require_once('class/User.class');

if (isset($_REQUEST['email']) && isset($_REQUEST['password'])) {
    //wysłano formularz - przechwyć i obrób dane
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    //wywołujemy metodę klasy
    //metody statyczne w PHP wywołuje się poprzez ::
    $result = User::Register($email, $password);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz rejestracji</title>
    
</head>
<body>
    <div id="contaider">
        <div id="loginForm" class="col-4 offset-4"></div>
    </div>
</body>
</html>