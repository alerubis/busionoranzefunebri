<!DOCTYPE html>
<html lang="it">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GoodGrowth - Financial Services HTML Template</title>
    <link rel="shortcut icon" href="images/favicon.png" />
    <!-- GOOGLE WEB FONTS -->
    <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,100,300,700,900&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!-- END OF GOOGLE WEB FONTS -->

    <style>
        @media print {
            body{
                width: 21cm;
                height: 29.7cm;
                margin: 0;
                padding: 0;
            }
            .messaggio {
                border: none !important;
                margin: 0px !important;
            }
            .non-stampare {
                position: absolute;
            }
        }
        .messaggio {
            page-break-after: always;
            width: 21cm;
            height: 29.7cm;
            padding: 2.5cm;
            margin: 24px;
            border: 1px solid black;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: stretch;
        }
        .messaggio:last-child {
            page-break-after: avoid;
        }
        .bordo {
            border-top: 4px dotted #1b673b;
        }
        .centro {
            margin: 48px;
        }
        .apertura {
            font-size: 200px;
            margin-bottom: -150px;
            color: #1b673b;
        }
        .nome {
            font-size: 32px;
            color: #1b673b;
            margin: 0px 64px 0px 64px;
        }
        .testo {
            font-size: 24px;
            margin: 0px 64px 0px 64px;
            white-space: pre-line;
        }
        .chiusura {
            font-size: 200px;
            text-align: right;
            margin-top: -50px;
            color: #1b673b;
        }
        .contatto {
            font-size: 24px;
            text-align: right;
            margin-bottom: 8px;
            font-style: italic;
        }
        .data {
            font-size: 24px;
            text-align: left;
            margin-top: 8px;
            font-style: italic;
        }
    </style>

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

        <div class="non-stampare" style="width: 24cm; text-align: center; margin: 24px;">
            <button onClick="window.print()" class="non-stampare">
                <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                Stampa
            </button>
        </div>

        <div class="messaggi">

            <?php foreach ($messaggi as $messaggio):?>
                <div class="messaggio">
                    <div class="sopra">
                        <div class="bordo"></div>
                    </div>
                    <div class="centro">
                        <div class="apertura">“</div>
                        <div class="nome">
                            <?php echo $messaggio['nome']?>
                            <?php echo $messaggio['cognome']?>
                        </div>
                        <div class="testo">
                            <?php echo $messaggio['testo']?>
                        </div>
                        <div class="chiusura">”</div>
                    </div>
                    <div class="sotto">
                        <div class="contatto">
                            <?php echo $messaggio['email']?>
                        </div>
                        <div class="bordo"></div>
                        <div class="data">
                            <?php
                                $data = null;
                                if ($messaggio['data']) {
                                    $dataFromDb = date_create_from_format("d/m/Y H:i", $messaggio['data']);
                                    $data = date_format($dataFromDb, "d/m/Y");
                                }
                            ?>
                            <?php echo $data?>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
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
