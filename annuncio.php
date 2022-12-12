<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GoodGrowth - Financial Services HTML Template</title>
  <link rel="shortcut icon" href="images/favicon.png" />
  <!-- GOOGLE WEB FONTS -->
  <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700&subset=latin,latin-ext' rel='stylesheet'
    type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Lato:400,100,300,700,900&subset=latin,latin-ext' rel='stylesheet'
    type='text/css'>
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
   <h1>ANNUNCI FUNEBRI</h1>
   <div class="thebreadcumb">
   </div>
   </div>

    </div>
    <!-- END OF PAGE HEADER -->
  </div>

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
      $q = "SELECT * FROM messaggio WHERE id_annuncio=:id AND visibile='si' ORDER BY data DESC";
      $prepare = $db->prepare($q);
      $prepare->bindValue(':id', $_GET['id']);
      $prepare->execute();
      $messaggi = $prepare->fetchAll();
      $db = null;
    }
  ?>

  <?php if($annuncio) : ?>

    <!-- Dettaglio annuncio -->
    <section class="content shortcodes">
      <div class="row">
        <div class="col-sm-12" style="text-align: center;">

          <!-- Columns -->
          <div class="row" style="text-align: center;">
            <div class="col-sm-8">
              <p style="white-space: pre-line;">
                <?php echo $annuncio['citazione']?>
              </p>
              <p style="white-space: pre-line;">
                <?php echo $annuncio['apertura']?>
              </p>
              <div>
                <img style="padding-left: 35%;padding-right: 35%;" src="data:image/jpeg;base64,<?php echo base64_encode($annuncio['foto'])?>" alt="" />
              </div>
              <p><b><?php echo $annuncio['nome']?></b><br>di <?php echo $annuncio['eta']?> anni</p>
              <p style="white-space: pre-line;">
                <?php echo $annuncio['testo']?>
              </p>
              <p style="text-align: left;">
                Bergamo, <?php echo $annuncio['data']?><br>
                O.F. Busi, 0345-99490
              </p>
            </div>
            <div class="col-sm-4">
              <section class="contact-form">
                <div class="row">
                  <div class="col-sm-12">
                    <h3>Lascia il tuo <span>messaggio</span> di cordoglio alla famiglia </h3>
                    <hr class="small" />
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div id="sendstatus"></div>

                    <div id="contactform">
                      <form method="post" action="annuncio_add_messaggio.php?id=<?php echo $annuncio['id'];?>">
                        <div class="row">
                          <div class="col-sm-12">
                            <p><input type="text" placeholder="Nome" class="form-control" name="nome" id="nome" tabindex="1" /></p>
                            <p><input type="text" placeholder="Cognome" class="form-control" name="cognome" id="cognome" tabindex="2" /></p>
                            <p><input type="text" placeholder="Email" class="form-control" name="email" id="email" tabindex="3" /></p>
                            <p><textarea placeholder="Messaggio" class="form-control" name="testo" id="testo" tabindex="4"></textarea></p>
                            <p style="text-align: left;">
                              <input type="checkbox" id="visibile" name="visibile" value="si">
                              Desidero che il cordoglio sia visibile solo alla famiglia
                            </p>
                            <p><input name="submit" type="submit" id="submit" class="submit" value="Invia" tabindex="5" />
                            </p>
                          </div>
                          <div class="col-sm-6">

                          </div>
                        </div>
                      </form>

                    </div>
                  </div>
                </div>
              </section>
            </div>
          </div>
        </div>
        <?php
        foreach ($messaggi as $messaggio):?>
          <hr class="long" />
          <div class="row  spacing-40">
            <div class="col-sm-12">
              <div class="col-sm-6" style="text-align: left;">
                <p><b><?php echo $messaggio['nome']?> <?php echo $messaggio['cognome']?></b></p>
              </div>
              <div class="col-sm-6" style="text-align: right;">
                <?php echo $messaggio['data']?>
              </div>
              <div class="col-sm-12">
                <p>
                  <?php echo $messaggio['testo']?>
                </p>
              </div>
            </div>
          </div>
        <?php endforeach;?>
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