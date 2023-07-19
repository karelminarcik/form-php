<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="query/header-query.css">
    <script src="https://kit.fontawesome.com/c3fa60ce80.js" crossorigin="anonymous"></script>
    <title>Registrace</title>
</head>
<body>
    <?php require "assets/header.php" ?>

    <main>
        <section class="registration-form">
            
            <form action="admin/after-registration.php" method="POST">
                <input type="text" name="first_name" placeholder="Křestní jméno" required><br />
                <input type="text" name="second_name" placeholder="Příjmení" required><br />
                <input type="email" name="email" placeholder="Email" required><br />
                <input type="password" name="password" placeholder="Heslo" required><br />
                <input type="password" name="password-again" placeholder="Potvrďte heslo" required><br />
                <input type="submit" value="Zaregistrovat">
            </form>

        </section>
    </main>

    

    <?php require "assets/footer.php" ?>
    <script src="./js/header.js"></script>
</body>
</html>