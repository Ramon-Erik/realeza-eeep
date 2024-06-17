<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado geral</title>
</head>
<body>
    <?php 
    require_once '../../model/Votacao.Class.php';
    $resultado = new Votacao;
    $resultado->resultado_geral();
    ?>
</body>
</html>