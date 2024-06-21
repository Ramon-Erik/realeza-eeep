<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suas notas</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header></header>
    <main class="margin-b">
        <article>
            <h1>Suas notas</h1>
        </article>
        <div class="container-tabela">
            <?php
            require_once '../../model/Votacao.Class.php';
            $resultado = new Votacao;
            $resultado->resultado_jurado(1);
            ?>
        </div>
        <div class="campo" style="text-align: center;">
            <a href="../index.php" class="voltar">Votar novamente</a>
        </div>
    </main>
    <footer>
        <p>Site desenvolvido por <a href="https://instagram.com/29erik_" target="_blank" rel="noopener noreferrer">Ramon Erik (Informática 2022-2024)</a></p>
    </footer>
</body>
</html>