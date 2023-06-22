<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="grid.css">
    <title>Firma</title>
</head>
<body>
   <?php require "assets/header.php" ?>

    <main>
        <section class="firm_title">
            <h1>FIRM - Lorem ipsum dolor sit amet consectetur adipisici</h1>
        </section>
        <section class="our_projects heading-main">
                <h2>Naše projekty</h2>
        </section>
        <section class="row">
            
            <div class="col span-1-of-2">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In, velit tempora facilis iste ut accusamus necessitatibus! Reprehenderit, neque nostrum ipsam perspiciatis rem molestias, nisi vitae eaque illo magnam recusandae ab!</p>
            </div>

            <div class="col span-1-of-2">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In, velit tempora facilis iste ut accusamus necessitatibus! Reprehenderit, neque nostrum ipsam perspiciatis rem molestias, nisi vitae eaque illo magnam recusandae ab!</p>
            </div>

        </section>
       
        <section class="photogalery row">
            <div class="heading-main">
                <h2>Fotogalerie</h2>
            </div>
            <div class="our_services">
                <div class="col span-1-of-2">
                    <img src="img/seo.jpg" alt="firm-seo">
                </div>
                <div class="col span-1-of-2">
                    <img src="img/helpdesk.jpg" alt="firm-helpdesk">
                </div>
            </div>
        </section>
        <section class="referencies row">
            <div class="heading-main">
                <h2>Reference</h2>
            </div>
        </section>
    </main>
    <?php require "assets/footer.php" ?>
</body>
</html>