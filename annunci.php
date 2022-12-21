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

  <section class="projects1">
    <div class="row full-width-padding">
      <div class="col-sm-12">
        <div class="block-grid-sm-4 block-grid-xs-1 projectsposts1">

          <!-- Caricamento annunci -->
          <?php
            $db = new PDO("sqlite:database/busionoranzefunebri.db");
            $q = "SELECT * FROM annuncio WHERE eliminato IS NULL ORDER BY id DESC";
            $prepare = $db->prepare($q);
            $prepare->execute();
            $annunci = $prepare->fetchAll();
            $db = null;
            foreach ($annunci as $annuncio):?>

              <!-- PROJECT -->
              <div class="block-grid-item finance">
                <a href="annuncio.php?id=<?php echo $annuncio['id']?>" title="">
                  <figure>
                    <img style="padding-left: 20%;padding-right: 20%;" src="data:image/jpeg;base64,<?php echo base64_encode($annuncio['foto'])?>" alt="" />
                    <figcaption >
                      <div class="fig-overlay" >
                      </div>
                    </figcaption>
                  </figure>
                </a>
                <h6>
                  <a href="annuncio.php?id=<?php echo $annuncio['id']?>" title="">
                    <p>
                      <b><?php echo $annuncio['nome']?></b>
                      <br>
                      di <?php echo $annuncio['eta']?> anni
                      <br>
                      <?php echo $annuncio['paese']?>
                    </p>
                  </a>
                </h6>
              </div>
              <!-- END OF PROJECT -->

            <?php endforeach;
          ?>

        </div>


      </div>
    </div>
  </section>



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
  <script src="js/jquery.isotope.js"></script>
  <script src="js/retina.min.js"></script>
  <script src="js/custom.js"></script>
  <!-- END OF JAVASCRIPT FILES -->
  <script>
    jQuery(document).ready(function ($) {
      "use strict";
      $(window).load(function () {
        var $container = $('.projectsposts1');
        $container.isotope({
          filter: '*',
          animationOptions: {
            duration: 750,
            easing: 'easeInCirc',
            queue: false
          }
        });

        $('.projectsfilter a').on('click', function (event) {
          $('.projectsfilter .active').removeClass('active');
          $(this).addClass('active');

          var selector = $(this).attr('data-filter');
          $container.isotope({
            filter: selector,
            animationOptions: {
              duration: 750,
              easing: 'easeInCirc',
              queue: false
            }
          });
          return false;
        });
      });
    });
  </script>
</body>

</html>