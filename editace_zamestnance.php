<?php 
require "functions.php";


$connection = connectionDB();

if (isset($_GET["id"]) and is_numeric($_GET["id"])){
       
    $employee = getEmployee ($connection, $_GET["id"]);

    if ($employee) {
        $first_name = $employee["first_name"];
        $last_name = $employee["last_name"];
        $age = $employee["age"];
        $department = $employee["department"];
        $position = $employee["position"];
        $id = $employee["id"];
    } else {
        die ("Student nenalezen.");
    }

    

} else {
    die("ID neni zadano, student nebyl nalezen.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $age = $_POST["age"];
    $department = $_POST["department"];
    $position = $_POST["position"];


    editEmployee($connection, $first_name, $last_name, $age, $department, $position, $id);

    
    
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="grid.css">
</head>
<body>
    <?php require "assets/header.php" ?>

    <main>
        <section>
            <div class="wrapper row">
            <?php require "formular_zamestnanec.php" ?>
            </div>
        </section>
    </main>

    <?php require "assets/footer.php" ?>
</body>
</html>