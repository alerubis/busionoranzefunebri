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
    <h1>Crea nuovo annuncio</h1>

    <form action="annuncio_create.php" method="post">

        <label for="nome">Nome:</label>
        <input id="nome" name="nome" type="text">

        <br>

        <!-- Prevent implicit submission of the form -->
        <button type="submit" disabled style="display: none" aria-hidden="true"></button>

        <input name="submit_data" type="submit" value="Crea annuncio">

    </form>

    <?php
        if (isset($_POST['submit_data'])) {
            $db = new PDO("sqlite:database/busionoranzefunebri.db");
            $q = "INSERT INTO annuncio (nome) VALUES (:nome)";
            $prepare = $db->prepare($q);
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
