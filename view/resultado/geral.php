<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado geral</title>
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
    <link rel="shortcut icon" href="../assets/icon.png" type="png">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header></header>
    <main class="margin-b">
        <article>
            <h1>Resultado geral</h1>
        </article>
        <div class="container-tabela">
            <?php
            require_once '../../model/Votacao.Class.php';
            $resultado = new Votacao;
            $resultado->resultado_geral_m();
            ?>
        </div>
        <div class="container-tabela">
            <?php
            require_once '../../model/Votacao.Class.php';
            $resultado = new Votacao;
            $resultado->resultado_geral_f();
            ?>
        </div>
        <div class="campo" style="text-align: center;">
            <a href="../index.php" class="voltar">Votar novamente</a>
        </div>
    </main>
    <footer>
        <p>Site desenvolvido por <a href="https://instagram.com/29erik_" target="_blank" rel="noopener noreferrer">Ramon Erik (Informática 2022-2024)</a></p>
    </footer>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script>
        // let table = new DataTable('table.display');
        // table
        // var DataTable = require( 'datatables.net' );
        var table = new DataTable('table.cell-border', {
            language: {
                url: 'https://cdn.datatables.net/plug-ins/2.0.8/i18n/pt-BR.json',
            },
            lengthMenu: [5, 10, 25, 50, 75, 100]
        });
        table;
    </script>
</body>
</html>