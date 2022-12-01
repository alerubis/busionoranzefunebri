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
    <h1>Busi Onoranze Funebri</h1>

    <button>
        Aggiungi nuovo annuncio
    </button>

    <br>

    <div class="annunci">

        <?php
            $db = new PDO("sqlite:database/busionoranzefunebri.db");
            $q = "SELECT * FROM annuncio ORDER BY data DESC";
            $prepare = $db->prepare($q);
            $prepare->execute();
            $res = $prepare->fetchAll();
            $arr = array();
            foreach ($res as $r):?>
                <div class="annuncio">
                    <div class="nome">
                        <?php echo $r['nome']?>
                    </div>
                    <div class="eta">
                        di <?php echo $r['eta']?> anni
                    </div>
                    <div class="paese">
                        <?php echo $r['paese']?>
                    </div>
                    <button>
                        Modifica annuncio
                    </button>
                </div>
            <?php endforeach;
        ?>
    </div>

</body>
</html>
