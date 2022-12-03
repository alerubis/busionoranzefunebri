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
    <h1>Admin</h1>

    <?php
        $username = "busi";
        $password = "busi";

        if(isset($_POST['submit'])) {
            if($_POST['username'] == $username && $_POST['password'] == $password) {
                $db = new PDO("sqlite:database/busionoranzefunebri.db");
                $q = "SELECT * FROM annuncio ORDER BY id DESC";
                $prepare = $db->prepare($q);
                $prepare->execute();
                $annunci = $prepare->fetchAll();
                $db = null;
                ?>

                <a href="annuncio_create.php">
                    Aggiungi nuovo annuncio
                </a>

                <table>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Azioni</th>
                    </tr>
                    <?php
                    foreach ($annunci as $annuncio):?>
                        <tr>
                            <td><?php echo $annuncio['id']?></td>
                            <td><?php echo $annuncio['nome']?></td>
                            <td>
                                <a href="annuncio_update.php?id=<?php echo $annuncio['id'];?>">Modifica</a>
                                |
                                <a href="annuncio_delete.php?id=<?php echo $annuncio['id'];?>" onclick="return confirm('Sei sicuro?');">Elimina</a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </table>

                <?php
            } else {
                echo "Username e/o password errati";
            }
        } else {
            ?>

            <!-- Form login -->
            <form method="post">
                Username: <input type="text" name="username"/>
                <br>
                Password: <input type="password" name="password"/>
                <br>
                <input type='submit' name='submit'/>
            </form>

            <?php
        }
    ?>

</body>
</html>
