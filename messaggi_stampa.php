<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GoodGrowth - Financial Services HTML Template</title>
    <link rel="shortcut icon" href="images/favicon.png" />
    <!-- GOOGLE WEB FONTS -->
    <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,100,300,700,900&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!-- END OF GOOGLE WEB FONTS -->

    <!-- BOOTSTRAP & STYLES -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/block_grid_bootstrap.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/typicons.min.css" rel="stylesheet">
    <link href="css/odometer-theme-default.css" rel="stylesheet">
    <link href="css/animate-custom.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.default.min.css" rel="stylesheet">
    <link href="css/slicknav.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>

<body>

    <?php
        // Password protect this content
        require_once('protect-this.php');
    ?>

    <!-- Caricamento annuncio -->
    <?php
        if (isset($_GET['id'])) {
            $db = new PDO("sqlite:database/busionoranzefunebri.db");
            $q = "SELECT * FROM annuncio WHERE id = :id";
            $prepare = $db->prepare($q);
            $prepare->bindValue(':id', $_GET['id']);
            $prepare->execute();
            $annuncio = $prepare->fetch();
            $db = null;
        }
    ?>

    <!-- Caricamento messaggi -->
    <?php
        if (isset($_GET['id'])) {
            $db = new PDO("sqlite:database/busionoranzefunebri.db");
            $q = "SELECT * FROM messaggio WHERE id_annuncio = :id AND eliminato IS NULL";
            $prepare = $db->prepare($q);
            $prepare->bindValue(':id', $_GET['id']);
            $prepare->execute();
            $messaggi = $prepare->fetchAll();
            $db = null;
        }
    ?>

    <?php if($annuncio) : ?>

        <?php foreach ($messaggi as $messaggio):?>
            <div class="blog" style="padding: 24px;">
                <article>
                    <div class="post-content" style="text-align: center;">
                        <p>
                            <?php echo $messaggio['testo']?>
                        </p>
                        <div class="themeta">
                            <span>
                                <?php echo $messaggio['nome']?>
                                <?php echo $messaggio['cognome']?>
                            </span>
                            <span>
                                <?php
                                    $data = null;
                                    if ($messaggio['data']) {
                                        $dataFromDb = date_create_from_format("d/m/Y H:i", $messaggio['data']);
                                        $data = date_format($dataFromDb, "d/m/Y");
                                    }
                                ?>
                                <?php echo $data?>
                            </span>
                        </div>
                    </div>
                </article>
                <hr>
            </div>
        <?php endforeach;?>

        <div style="text-align: center;">
            <button class="non-stampare" onClick="window.print()">
                <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                Stampa
            </button>
        </div>

    <?php else : ?>

        <!-- Annuncio non trovato -->
        <section class="introtext error404">
            <div class="row">
                <div class="col-sm-12">
                    <h2>404</h2>
                    <hr class="small">
                    <h5>Annuncio non trovato</h5>
                </div>
            </div>
        </section>

    <?php endif; ?>

    <div class="spacing-45"></div>

    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.hoverIntent.js"></script>
    <script src="js/superfish.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/odometer.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/retina.min.js"></script>
    <script src="js/custom.js"></script>
    <!-- END OF JAVASCRIPT FILES -->

</body>

</html>
