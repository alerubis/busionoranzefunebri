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
    <h1>Modifica annuncio</h1>

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

        <!-- Form modifica annuncio -->
        <form action="annuncio_update.php" method="post">

            <label for="nome">Id:</label>
            <input id="id" name="id" type="text" value="<?php echo $annuncio['id'];?>" readonly>

            <br>

            <label for="nome">Nome:</label>
            <input id="nome" name="nome" type="text" value="<?php echo $annuncio['nome'];?>">

            <br>

            <!-- Prevent implicit submission of the form -->
            <button type="submit" disabled style="display: none" aria-hidden="true"></button>

            <input name="submit_data" type="submit" value="Modifica annuncio">

        </form>

    <?php else : ?>

        <!-- Annuncio non trovato -->
        <div>
            Annuncio non trovato
        </div>

    <?php endif; ?>

    <?php
        if (isset($_POST['submit_data'])) {
            $db = new PDO("sqlite:database/busionoranzefunebri.db");
            $q = "UPDATE annuncio SET nome = :nome WHERE id = :id";
            $prepare = $db->prepare($q);
            $prepare->bindValue(':id', $_POST['id']);
            $prepare->bindValue(':nome', $_POST['nome']);
            $prepare->execute();
            $annuncio = $prepare->fetch();
            $db = null;
            header('Location: admin.php');
            die();
        }
    ?>

</body>
</html>
