<?php
    require "functions.php";
    
    $first_name = null;
    $last_name = null;
    $age = null;
    $department = null;
    $position = null;

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $age = $_POST["age"];
        $department = $_POST["department"];
        $position = $_POST["position"];

        $connection = connectionDB();

        AddEmployee($connection, $first_name, $last_name, $age, $department, $position); 
    }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="grid.css">
    <title>Nový_zaměstnanec</title>
</head>
<body>
    <?php require "assets/header.php" ?>

    <main>
        <section class="row"> 
            <h1>Přidat nového zaměstnance</h1>
        </section>
        <section>
            <div class="wrapper row">
                <?php require "formular_zamestnanec.php" ?>
            </div>
        </section>
    </main>
    
    <?php require "assets/footer.php" ?>
</body>
</html>