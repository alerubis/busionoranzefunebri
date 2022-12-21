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
                <h1>NUOVO ANNUNCIO</h1>
                <div class="thebreadcumb"></div>
            </div>
        </div>

    </div>

    <?php
        // Password protect this content
        require_once('protect-this.php');
    ?>

    <?php
        if (isset($_POST['submit_data'])) {
            $db = new PDO("sqlite:database/busionoranzefunebri.db");
            $q = "INSERT INTO annuncio (nome,eta,paese,citazione,apertura,foto,testo,data) VALUES (:nome,:eta,:paese,:citazione,:apertura,:foto,:testo,:data)";
            $prepare = $db->prepare($q);
            $prepare->bindValue(':nome', $_POST['nome']);
            $prepare->bindValue(':eta', $_POST['eta']);
            $prepare->bindValue(':paese', $_POST['paese']);
            $prepare->bindValue(':citazione', $_POST['citazione']);
            $prepare->bindValue(':apertura', $_POST['apertura']);
            if (isset($_FILES['foto']) && file_exists($_FILES['foto']['tmp_name']) && is_uploaded_file($_FILES['foto']['tmp_name'])) {
                $fotoContent = file_get_contents($_FILES['foto']['tmp_name']);
                $prepare->bindValue(':foto', $fotoContent);
            }
            $prepare->bindValue(':testo', $_POST['testo']);
            if (isset($_POST['data'])) {
                $date = date_create($_POST['data']);
                $prepare->bindValue(':data', date_format($date, "d/m/Y"));
            } else {
                $prepare->bindValue(':data', null);
            }
            $prepare->execute();
            $annuncio = $prepare->fetch();
            $db = null;
            header('Location: admin.php');
            die();
        }

        if (isset($_POST['annulla'])) {
            header('Location: admin.php');
            die();
        }
    ?>

    <div class="content shop-cart">
        <div class="row">
            <div class="col-sm-12">

                <form action="annuncio_create.php" method="post" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-sm-12">
                            <p>
                                <label for="foto">Foto</label>
                                <input id="foto" name="foto" type="file" class="form-control">
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <p>
                                <label for="nome">Nome</label>
                                <input id="nome" name="nome" type="text" class="form-control">
                            </p>
                        </div>
                        <div class="col-sm-2">
                            <p>
                                <label for="eta">Età</label>
                                <input id="eta" name="eta" type="number" class="form-control">
                            </p>
                        </div>
                        <div class="col-sm-3">
                            <p>
                                <label for="paese">Paese</label>
                                <input id="paese" name="paese" type="text" class="form-control">
                            </p>
                        </div>
                        <div class="col-sm-3">
                            <p>
                                <label for="data">Data</label>
                                <input id="data" name="data" type="date" class="form-control">
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <p>
                                <label for="citazione">Citazione</label>
                                <textarea id="citazione" name="citazione" type="text" class="form-control" rows="3"></textarea>
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <p>
                                <label for="apertura">Apertura</label>
                                <textarea id="apertura" name="apertura" type="text" class="form-control" rows="3"></textarea>
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <p>
                                <label for="testo">Testo</label>
                                <textarea id="testo" name="testo" type="text" class="form-control" rows="3"></textarea>
                            </p>
                        </div>
                    </div>

                    <!-- Prevent implicit submission of the form -->
                    <button type="submit" disabled style="display: none" aria-hidden="true"></button>

                    <br>

                    <div class="row">
                        <div class="col-sm-6">
                            <button class="btn btn-default" name="annulla" type="submit" value="Annulla">
                                Annulla
                            </button>
                        </div>
                        <div class="col-sm-6">
                            <button class="btn" name="submit_data" type="submit" value="Crea annuncio">
                                <i class="fa fa-plus" style="margin-right: 12px;"></i>
                                Aggiungi nuovo annuncio
                            </button>
                        </div>
                    </div>

                </form>

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
