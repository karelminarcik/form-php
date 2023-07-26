<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="query/header-query.css">
    <script src="https://kit.fontawesome.com/c3fa60ce80.js" crossorigin="anonymous"></script>
    <title>prihlaseni</title>
</head>
<body>
    <?php require "assets/header.php" ?>

    <main>
        <section class="reglog-form">
            
            <form action="./admin/login.php" method="POST">
               
                <div class="inputfield">
                    <input type="email" class="form-input" name="login-email" placeholder="Email" required>
                </div>
                <div class="inputfield">
                    <input type="password" class="form-input" name="login-password" placeholder="Heslo" required>
                </div>
                <div class="buttonfield">
                    <input type="submit" class="registration-button" value="Přihlásit se">
                </div>
                
                
            </form>

        </section>
    </main>

    <?php require "assets/footer.php" ?>
    <script src="./js/header.js"></script>
</body>
</html>