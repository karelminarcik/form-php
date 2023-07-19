<?php
    require "../functions.php";
    require "../assets/auth.php";

    session_start();

    if ( !isLoggedIn() ){
        die("Nepovoleny pristup");
    }

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
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/grid.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../query/header-query.css">
    <script src="https://kit.fontawesome.com/c3fa60ce80.js" crossorigin="anonymous"></script>
    <title>Zaměstnanec</title>
</head>
<body>
    <?php require "../assets/admin-header.php" ?>

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
            <a href="./zamestnanci.php" class="zpet">Zpět na výpis zaměstnanců</a>
        </section>
        
    </main>
    
    <?php require "../assets/footer.php" ?>
    <script src="../js/header.js"></script>
</body>
</html>