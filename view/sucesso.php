<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votação Realeza Salaberga</title>
    <link rel="shortcut icon" href="assets/icon.png" type="png">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header></header>
    <main class="margin-b">
        <div class="cabecalho">
            <div class="linha-cab">
                <h1>Votação Realeza Salaberga 2024</h1>
            </div>
        </div>
        <article>
            <div class="suc-campo">
                <h2>Sucesso</h2>
                <?php 
                if (isset($_GET['s_id'])) {
                    switch ($_GET['s_id']) {
                        case '1':
                            echo '<p>Adicionado com sucesso!</p>';
                            break;
                        case '2':
                            echo '<p>Voto realizado com sucesso.</p>';
                            break;
                    } 
                } else {
                    header('location:index.php');
                }
                ?>
            </div>
            <div class="campo">
                <a href="index.php" class="voltar">Voltar</a>
                <a href="resultado/jurado.php" class="link">Ver suas notas</a>
            </div>
        </article>
    </main>
    <footer>
        <p>Site desenvolvido por <a href="https://instagram.com/29erik_" target="_blank" rel="noopener noreferrer">Ramon Erik (Informática 2022-2024)</a></p>
    </footer>
</body>
</html>