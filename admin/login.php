<?php

require "../functions.php";
// require "../assets/url.php";
require "../assets/user.php";

session_start();

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $connection= connectionDB();
    $log_email = $_POST["login-email"];
    $log_password = $_POST["login-password"];

    

    if (authentication ($connection, $log_email, $log_password)) {
        // Ziskani ID uzivatele
        $id = getUserId($connection, $log_email);

        // Zabraňuje provedení tzv. fixation attack. Více zde:
        https://owasp.org/www-community/attacks/Session_fixation
        session_regenerate_id(true);

         // Nastaveni ze je uzivatel prihlaseny 
         $_SESSION["is-loged-in"] = true;
         // Nastaveni id uzivatele
         $_SESSION["user-id"] = $id;

         redirectUrl("/form-php/admin/zamestnanci.php");
        
    } else {
        $error = "Chyba pri prihlaseni. Zadali jste spatne prihlasovaci jmeno nebo heslo.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if(!empty($error)): ?>
        <p><?= $error ?><p>
        <a href="../login-form.php">Zpet na prihlaseni</a>
    <?php endif; ?>
</body>
</html>

