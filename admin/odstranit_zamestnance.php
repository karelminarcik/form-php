<?php
    require "../functions.php";
    require "../assets/auth.php";

    session_start();

    if ( !isLoggedIn() ){
        die("Nepovoleny pristup");
    }

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
        <link rel="stylesheet" href="../css/general.css">
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="stylesheet" href="../css/grid.css">
        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../query/header-query.css">
        <script src="https://kit.fontawesome.com/c3fa60ce80.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php require "../assets/admin-header.php" ?>
        <main>
            <section class="delete_form row">
                <form method="POST">
                    <p>Jste si jisti ze chcete vybraneho zamestnance vymazat?</p>
                    <button>Smazat</button>
                    <a href="jeden_zamestnanec.php?id=<?= $_GET['id'] ?>">Zrušit</a>
                </form>
            </section>
        </main>
        <?php require "../assets/footer.php" ?>
        <script src="../js/header.js"></script>
    </body>
    </html>
    