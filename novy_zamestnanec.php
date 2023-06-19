<?php
    require "assets/dbconnection.php";
    require "functions.php";

    if(isset($_POST["submit"])){
        AddFun();  
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
                <form action="novy_zamestnanec.php" method="POST" class="new_form"><br />
                    <input  type="text" name="first_name" placeholder="Křestní jméno"><br />
                    <input type="text" name="last_name" placeholder="Příjmení"><br />
                    <input type="text" name="age" placeholder="Věk"><br />
                    <input type="text" name="department" placeholder="Oddělení"><br />
                    <input type="text" name="position" placeholder="Pozice"><br />
                    <button type="submit" name="submit">Přidat</button>
                </form>
            </div>
        </section>
    </main>
    
    <?php require "assets/footer.php" ?>
</body>
</html>