<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busi Onoranze Funebri</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <a href="index.php">Index</a>
    <a href="annunci.php">Elenco annunci</a>
    <a href="admin.php">Admin</a>
    <h1>Elenco annunci</h1>

    <div class="annunci">

        <!-- Caricamento annunci -->
        <?php
            $db = new PDO("sqlite:database/busionoranzefunebri.db");
            $q = "SELECT * FROM annuncio ORDER BY id DESC";
            $prepare = $db->prepare($q);
            $prepare->execute();
            $annunci = $prepare->fetchAll();
            $db = null;
            foreach ($annunci as $annuncio):?>

                <!-- Annuncio -->
                <div class="annuncio">
                    <div class="nome">
                        <?php echo $annuncio['nome']?>
                    </div>
                    <div class="eta">
                        di <?php echo $annuncio['eta']?> anni
                    </div>
                    <div class="paese">
                        <?php echo $annuncio['paese']?>
                    </div>
                    <a href="annuncio.php?id=<?php echo $annuncio['id']?>">
                        Vai al dettaglio
                    </a>
                </div>

            <?php endforeach;
        ?>

    </div>

</body>
</html>
