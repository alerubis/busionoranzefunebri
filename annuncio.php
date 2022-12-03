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
    <h1>Dettaglio annuncio</h1>

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

    <?php if($annuncio) : ?>

        <!-- Dettaglio annuncio -->
        <div>
            <label for="id">id</label>
            <input type="text" id="id" name="id" disabled value="<?php echo (isset($annuncio['id']))?$annuncio['id']:'';?>">
            <br>
            <label for="nome">nome</label>
            <input type="text" id="nome" name="nome" value="<?php echo (isset($annuncio['nome']))?$annuncio['nome']:'';?>">
        </div>

    <?php else : ?>

        <!-- Annuncio non trovato -->
        <div>
            Annuncio non trovato
        </div>

    <?php endif; ?>

</body>
</html>
