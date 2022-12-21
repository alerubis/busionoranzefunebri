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
    <!-- END OF BOOTSTRAP & STYLES -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    $(function(){
        $("#menu").load("./menu.html");
    });
</script>
<script>
    $(function(){
        $("#footer").load("./footer.html");
    });
 </script>
</head>

<body class="pagina-da-stampare">

    <!-- HEADER -->
    <div id="hw-hero">

        <section id="menu" style="padding-bottom: 0px; padding-top: 0px;"></section>

        <!-- PAGE HEADER -->
        <div id="page-header">
        <div class="title-breadcrumbs">
            <h1>ADMIN</h1>
            <div class="thebreadcumb"></div>
        </div>
        </div>

    </div>

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

        <div class="content shop-cart">
            <div class="row">
                <div class="col-sm-12">

                    <h4 style="text-align: center">
                        Annuncio
                    </h4>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Foto</th>
                                    <th>Nome</th>
                                    <th>Età</th>
                                    <th>Paese</th>
                                    <th>Citazione</th>
                                    <th>Apertura</th>
                                    <th>Testo</th>
                                    <th>Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $annuncio['id']?></td>
                                    <td><img src="data:image/jpeg;base64,<?php echo base64_encode($annuncio['foto'])?>"></td>
                                    <td><?php echo $annuncio['nome']?></td>
                                    <td><?php echo $annuncio['eta']?></td>
                                    <td><?php echo $annuncio['paese']?></td>
                                    <td><?php echo $annuncio['citazione']?></td>
                                    <td><?php echo $annuncio['apertura']?></td>
                                    <td><?php echo $annuncio['testo']?></td>
                                    <td><?php echo $annuncio['data']?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <br>
                    <br>

                    <h4 style="text-align: center">
                        Messaggi
                        <a href="messaggi_stampa.php?id=<?php echo $annuncio['id'];?>">
                            <button style="margin-left: 12px">
                                <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                            </button>
                        </a>
                    </h4>

                    <div class="table-responsive stampa-questo">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>Cognome</th>
                                    <th>Email</th>
                                    <th>Testo</th>
                                    <th>Visibile solo alla famiglia</th>
                                    <th>Data</th>
                                    <th>Azioni</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($messaggi as $messaggio):?>
                                <tr>
                                    <td><?php echo $messaggio['id']?></td>
                                    <td><?php echo $messaggio['nome']?></td>
                                    <td><?php echo $messaggio['cognome']?></td>
                                    <td><?php echo $messaggio['email']?></td>
                                    <td><?php echo $messaggio['testo']?></td>
                                    <td><?php echo $messaggio['visibile']?></td>
                                    <td><?php echo $messaggio['data']?></td>
                                    <td>
                                    <a href="messaggio_delete.php?id=<?php echo $messaggio['id'];?>&id_annuncio=<?php echo $annuncio['id'];?>" onclick="return confirm('Sei sicuro?');">Elimina</a>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>

                    <br>
                    <br>

                </div>
            </div>
        </div>

        <section class="introtext error404">
            <div class="row">
                <div class="col-sm-12">
                    <h5>
                        <a href="admin.php" title="">
                            <i class="fa fa-arrow-left" style="margin-right: 12px;"></i>
                            Torna alla sezione admin
                        </a>
                    </h5>
                </div>
            </div>
        </section>

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

    <section id="footer" style="padding-bottom: 0px;"></section>

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
