<?php
    require "functions.php";

    $connection = connectionDB();

    $employees = getAllEmployees($connection, "id, first_name, last_name");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="grid.css">
    <title>Seznam zaměstnanců</title>
</head>
<body>
    <?php require "assets/header.php" ?>

    <main>
        <h1>Seznam zaměstnanců</h1>
        <section class="one_employer row">
            <?php if(empty($employees)): ?>
                <p>Žádní žáci nebyli nalezeni</p>
            <?php else: ?>
                <ul>
                    <?php foreach($employees as $one_employer): ?>
                        <li>
                            <div class="employer_name">
                                <?php echo htmlspecialchars($one_employer["first_name"]) . " " . htmlspecialchars($one_employer["last_name"]) ?>
                            </div>
                            <div class="employer_info">
                                <a href="jeden_zamestnanec.php?id=<?= $one_employer['id'];?>">Více informací</a>
                            </div>
                            
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </section>
    </main>
    <?php require "assets/footer.php" ?>
</body>
</html>