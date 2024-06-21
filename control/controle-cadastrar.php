<?php 
if (isset($_POST['btnCad'])) {
    require_once '../model/Participante.Class.php';
    $nome = $_POST['nome'];
    $sexo = $_POST['sexo'];
    // echo '<pre>';
    // print_r($_POST);
    // print_r($sexo);
    $participante = new Participante;
    $participante->cadastrar_novo($nome, $sexo);
}
?>