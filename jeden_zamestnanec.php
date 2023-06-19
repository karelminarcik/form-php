<?php
    require "assets/dbconnection.php";

    if (isset($_GET["id"]) and is_numeric($_GET["id"])){
        $sql = "SELECT * FROM zamestnanci WHERE id= " .$_GET["id"];

    $result = mysqli_query($connection, $sql);

    if($result === false) {
        echo mysqli_error($connection);
    } else {
        $employers = mysqli_fetch_assoc($result);
    }
    } 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zaměstnanec</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="grid.css">
</head>
<body>
    <?php require "assets/header.php" ?>

    <main>
        <h1>Informace o zaměstnanci <?= htmlspecialchars($employers["first_name"]). " " .htmlspecialchars($employers["last_name"]) ?></h1>
        <section class="one_employer row">
            <?php if ($employers === NULL):?>
                <p>Žák nenalezen.</p>
            <?php else: ?>
                <h2><?= htmlspecialchars($employers["first_name"]). " " .htmlspecialchars($employers["last_name"]) ?></h2>
                <p>Věk: <?= htmlspecialchars($employers["age"]) ?></p>
                <p>Oddělení: <?= htmlspecialchars($employers["department"]) ?></p>
                <p>Pozice: <?= htmlspecialchars($employers["position"]) ?></p>
            <?php endif ?>

            <br />
            <a href="zamestnanci.php" class="zpet">Zpět na výpis zaměstnanců</a>
            
        </section>
    </main>
    
    <?php require "assets/footer.php" ?>
</body>
</html>