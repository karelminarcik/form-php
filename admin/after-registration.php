<?php

require "../assets/url.php";
require "../assets/dbconnection.php";
require "../assets/user.php";

session_start();

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $connection = connectionDB();

    $first_name = $_POST["first_name"];
    $second_name = $_POST["second_name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $id = AddUser($connection, $first_name, $second_name, $email, $password);
    
    if (!empty($id)){
        // Zabraňuje provedení tzv. fixation attack. Více zde:
        https://owasp.org/www-community/attacks/Session_fixation

        session_regenerate_id(true);

        // Nastaveni ze je uzivatel prihlaseny 
        $_SESSION["is-loged-in"] = true;
        // Nastaveni id uzivatele
        $_SESSION["user-id"] = $id;



        redirectUrl("/form-php/admin/zamestnanci.php");
    } else {
        echo "Uzivatele se nepodarilo pridat";
    }
}