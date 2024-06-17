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
    public function resultado_geral() {
        $consulta = "SELECT
participantes.nome AS nome_participante,
SUM(CASE WHEN votos.id_jurado = 1 THEN votos.nota_simpatia + votos.nota_charme + votos.nota_elegancia + votos.nota_desenvoltura ELSE 0 END) AS J1,
SUM(CASE WHEN votos.id_jurado = 2 THEN votos.nota_simpatia + votos.nota_charme + votos.nota_elegancia + votos.nota_desenvoltura ELSE 0 END) AS J2,
SUM(CASE WHEN votos.id_jurado = 3 THEN votos.nota_simpatia + votos.nota_charme + votos.nota_elegancia + votos.nota_desenvoltura ELSE 0 END) AS J3,
SUM(CASE WHEN votos.id_jurado = 4 THEN votos.nota_simpatia + votos.nota_charme + votos.nota_elegancia + votos.nota_desenvoltura ELSE 0 END) AS J4,
SUM(CASE WHEN votos.id_jurado = 5 THEN votos.nota_simpatia + votos.nota_charme + votos.nota_elegancia + votos.nota_desenvoltura ELSE 0 END) AS J5,
SUM(CASE WHEN votos.id_jurado = 6 THEN votos.nota_simpatia + votos.nota_charme + votos.nota_elegancia + votos.nota_desenvoltura ELSE 0 END) AS J6,
SUM(CASE WHEN votos.id_jurado = 7 THEN votos.nota_simpatia + votos.nota_charme + votos.nota_elegancia + votos.nota_desenvoltura ELSE 0 END) AS J7
FROM
    votos
JOIN
    participantes ON votos.id_participante = participantes.id
GROUP BY
    participantes.nome
ORDER BY
    participantes.nome;
";
        $consulta_feita = $this->pdo->prepare($consulta);
        $consulta_feita->execute();
        echo '<table>';
        echo '<thead><tr>';
        echo '<th>Participante</th>';
        echo '<th>J-1</th>';
        echo '<th>J-2</th>';
        echo '<th>J-3</th>';
        echo '<th>J-4</th>';
        echo '<th>J-5</th>';
        echo '<th>J-6</th>';
        echo '<th>J-7</th>';
        echo '</tr></thead>';
        foreach ($consulta_feita as $linha) {
            echo "<tr><td>$linha[nome_participante]</td>";
            echo "<td>$linha[J1]</td>";
            echo "<td>$linha[J2]</td>";
            echo "<td>$linha[J3]</td>";
            echo "<td>$linha[J4]</td>";
            echo "<td>$linha[J5]</td>";
            echo "<td>$linha[J6]</td>";
            echo "<td>$linha[J7]</td>";
            echo '</tr>';
        }
        echo '</table>';
    }
}
?>