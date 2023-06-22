<?php
    require "functions.php";

    $connection = connectionDB();

    if (isset($_GET["id"]) and is_numeric($_GET["id"])){
       
        $employees = getEmployee ($connection, $_GET["id"]);
    } else {
        $employees = null;
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
        <h1>Informace o zaměstnanci <?= htmlspecialchars($employees["first_name"]). " " .htmlspecialchars($employees["last_name"]) ?></h1>
        <section class="one_employer row">
            <?php if ($employees === NULL):?>
                <p>Žák nenalezen.</p>
            <?php else: ?>
                <h2><?= htmlspecialchars($employees["first_name"]). " " .htmlspecialchars($employees["last_name"]) ?></h2>
                <p>Věk: <?= htmlspecialchars($employees["age"]) ?></p>
                <p>Oddělení: <?= htmlspecialchars($employees["department"]) ?></p>
                <p>Pozice: <?= htmlspecialchars($employees["position"]) ?></p>
            <?php endif ?>
            
        </section>
        <section class="edit_button row">
                <a href="editace_zamestnance.php?id=<?= $employees['id']?>">Editovat</a>
                <a href="odstranit_zamestnance.php?id=<?= $employees['id']?>">Odstranit</a>
        </section>
        
        <section class="back_button">
            <a href="zamestnanci.php" class="zpet">Zpět na výpis zaměstnanců</a>
        </section>
        
    </main>
    
    <?php require "assets/footer.php" ?>
</body>
</html>