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

    <section class="services1">
        <div class="row">
            <div class="col-sm-12">

                <!-- Caricamento annuncio -->
                <?php
                    if (isset($_GET['id'])) {
                        $db = new PDO("sqlite:database/busionoranzefunebri.db");
                        $q = "INSERT INTO messaggio (id_annuncio, nome, cognome, email, testo, visibile, data) VALUES (:id_annuncio, :nome, :cognome, :email, :testo, :visibile, :data)";
                        $prepare = $db->prepare($q);
                        $prepare->bindValue(':id_annuncio', $_GET['id']);
                        $prepare->bindValue(':nome', $_POST['nome']);
                        $prepare->bindValue(':cognome', $_POST['cognome']);
                        $prepare->bindValue(':email', $_POST['email']);
                        $prepare->bindValue(':testo', $_POST['testo']);
                        $prepare->bindValue(':visibile', $_POST['visibile']);
                        $prepare->bindValue(':data', date('Y-m-d'));
                        $prepare->execute();
                        $annuncio = $prepare->fetch();
                        $db = null;
                        header('Location: annuncio.php?id='.$_GET['id']);
                        die();
                    }
                ?>

            </div>
        </div>
    </section>

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
