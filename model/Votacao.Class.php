<?php 
Class Votacao {
    public $pdo; 
    public function __construct() {
        $this->pdo = new pdo("mysql:host=localhost; dbname=realeza_eeep", "root", "");
    }
    public function votar($id_jurado, $id_participante, array $notas) {
        $consulta = "INSERT INTO votos VALUES (null, :id_participante, :id_jurado,  :nota_simpatia, :nota_charme, :nota_elegancia, :nota_desenvoltura);";
        $consulta_feita = $this->pdo->prepare($consulta);
        $consulta_feita->bindValue(":id_participante", $id_participante);
        $consulta_feita->bindValue(":id_jurado", $id_jurado);
        $consulta_feita->bindValue(":nota_simpatia", $notas[0]);
        $consulta_feita->bindValue(":nota_charme", $notas[1]);
        $consulta_feita->bindValue(":nota_elegancia", $notas[2]);
        $consulta_feita->bindValue(":nota_desenvoltura", $notas[3]);
        $consulta_feita->execute();
        header('location: ../view/sucesso.php');
        // echo '<pre>' . print_r($notas);
        // echo $id_jurado;
        // echo $id_participante;
    }
}
?>