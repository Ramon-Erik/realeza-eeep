<?php 
if (isset($_POST['btnE'])) {
    require_once '../model/Votacao.Class.php';
    $id_jurado = $_POST['jurado'];
    $id_participante = $_POST['participante'];
    $notas = [$_POST['simpatia'], $_POST['charme'], $_POST['elegancia'], $_POST['desenvoltura']];
    // echo '<pre>';
    // print_r($_POST);
    // print_r($notas);
    $voto = new Votacao;
    $voto->votar($id_jurado, $id_participante, $notas);
}
?>