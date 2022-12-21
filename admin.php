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

<body>

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

    <?php
        $db = new PDO("sqlite:database/busionoranzefunebri.db");
        $q = "SELECT * FROM annuncio WHERE eliminato IS NULL ORDER BY id DESC";
        $prepare = $db->prepare($q);
        $prepare->execute();
        $annunci = $prepare->fetchAll();
        $db = null;
    ?>

    <div class="content shop-cart">
        <div class="row">
            <div class="col-sm-12">

                <div class="row">
                    <div class="col-12">
                        <a href="annuncio_create.php">
                            <button class="btn" type="submit" value="Modifica annuncio">
                                <i class="fa fa-plus" style="margin-right: 12px;"></i>
                                Aggiungi nuovo annuncio
                            </button>
                        </a>
                    </div>
                </div>

                <br>

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
                                <th>Azioni</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($annunci as $annuncio):?>
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
                                <td>
                                <a href="messaggi.php?id=<?php echo $annuncio['id'];?>">Messaggi</a>
                                |
                                <a href="annuncio_update.php?id=<?php echo $annuncio['id'];?>">Modifica</a>
                                |
                                <a href="annuncio_delete.php?id=<?php echo $annuncio['id'];?>" onclick="return confirm('Sei sicuro?');">Elimina</a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

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
