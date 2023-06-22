<?php
    require "functions.php";

    $connection = connectionDB();


    if($_SERVER["REQUEST_METHOD"] === "POST") {
        deleteEmployee ($connection, $_GET["id"]);
    }

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Smazat žákaform</title>
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="grid.css">
    </head>
    <body>
        <?php require "assets/header.php" ?>
        <main>
            <section class="delete_form row">
                <form method="POST">
                    <p>Jste si jisti ze chcete vybraneho zamestnance vymazat?</p>
                    <button>Smazat</button>
                    <a href="jeden_zamestnanec.php?id=<?= $_GET['id'] ?>">Zrušit</a>
                </form>
            </section>
        </main>
        <?php require "assets/footer.php" ?>
    </body>
    </html>
    