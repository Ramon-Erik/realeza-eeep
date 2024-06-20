<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erro</title>
    <!-- <link rel="shortcut icon" href="https://icons.iconarchive.com/icons/aha-soft/desktop-buffet/48/Steak-icon.png" type="png"> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header></header>
    <main>
        <div class="cabecalho">
            <div class="linha-cab">
                <h1>Votação Realeza Salaberga 2024</h1>
            </div>
        </div>
        <article>
            <div class="suc-campo">
                <h2>Erro</h2>
                <?php 
                if (isset($_GET['err_id']) and $_GET['err_id'] === '1') {
                    echo '<p>Parece que você já votou!</p>';
                }
                ?>
            </div>
            <div class="campo">
                <a href="index.php" class="voltar">Voltar</a>
                <a href="resultado/jurado.php" class="link">Ver suas notas</a>
            </div>
        </article>
    </main>
</body>
</html>