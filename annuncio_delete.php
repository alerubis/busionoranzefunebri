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
    <h1>Elimina annuncio</h1>

    <!-- Caricamento annuncio -->
    <?php
        if (isset($_GET['id'])) {
            $db = new PDO("sqlite:database/busionoranzefunebri.db");
            $q = "DELETE FROM annuncio WHERE id = :id";
            $prepare = $db->prepare($q);
            $prepare->bindValue(':id', $_GET['id']);
            $prepare->execute();
            $annuncio = $prepare->fetch();
            $db = null;
            header('Location: admin.php');
            die();
        }
    ?>

</body>
</html>
