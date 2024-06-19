<?php 
Class Votacao {
    public $pdo; 
    public function __construct() {
        $this->pdo = new pdo("mysql:host=localhost; dbname=realeza_eeep", "root", "");
    }
    public function votar($id_jurado, $id_participante, array $notas) {
        $consulta = "INSERT INTO votosALUES (null, :id_participante, :id_jurado,  :nota_simpatia, :nota_charme, :nota_elegancia, :nota_desenvoltura);";
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
    public function vencedor() {
        $vencedoras = "SELECT participantes.id as p_id, participantes.nome AS nome_participante, participantes.sexo, SUM(votos.nota_simpatia + votos.nota_charme + votos.nota_elegancia + votos.nota_desenvoltura) AS soma_total_notas FROM votos JOIN participantes ON votos.id_participante = participantes.id WHERE participantes.sexo = 'F' GROUP BY participantes.nome, participantes.sexo ORDER BY soma_total_notas DESC LIMIT 2;";
        $lista_vencedoras = $this->pdo->prepare($vencedoras);
        $lista_vencedoras->execute();
        $i = 0;
        foreach ($lista_vencedoras as $v) {
            if ($i === 0) {
                $lista_final['rainha'] = $v['nome_participante']; 
            } else {
                $lista_final['princesa'] = $v['nome_participante']; 
            }
            $i++;
            // echo $v['nome_participante'];
        }
        $vencedores = "SELECT participantes.id as p_id, participantes.nome AS nome_participante, participantes.sexo, SUM(votos.nota_simpatia + votos.nota_charme + votos.nota_elegancia + votos.nota_desenvoltura) AS soma_total_notas FROM votos JOIN participantes ON votos.id_participante = participantes.id WHERE participantes.sexo = 'M' GROUP BY participantes.nome, participantes.sexo ORDER BY soma_total_notas DESC LIMIT 2;";
        $lista_vencedores = $this->pdo->prepare($vencedores);
        $lista_vencedores->execute();
        $i = 0;
        // echo '<pre>';
        foreach ($lista_vencedores as $v) {
            if ($i === 0) {
                $lista_final['rei'] = $v['nome_participante']; 
            } else {
                $lista_final['principe'] = $v['nome_participante']; 
            }
            $i++;
            // echo $v['nome_participante'] . $lista_vencedores->rowCount();
        }
        // print_r($lista_final);
        return $lista_final;
    }
    public function resultado_geral_m() {
        $consulta_f = "SELECT participantes.nome  AS nome_participante, SUM(CASE WHEN votos.id_jurado = 1 THEN votos.nota_simpatia + votos.nota_charme + votos.nota_elegancia + votos.nota_desenvoltura ELSE 0 END) AS J1, SUM(CASE WHEN votos.id_jurado = 2 THEN votos.nota_simpatia + votos.nota_charme + votos.nota_elegancia + votos.nota_desenvoltura ELSE 0 END) AS J2, SUM(CASE WHEN votos.id_jurado = 3 THEN votos.nota_simpatia + votos.nota_charme + votos.nota_elegancia + votos.nota_desenvoltura ELSE 0 END) AS J3, SUM(CASE WHEN votos.id_jurado = 4 THEN votos.nota_simpatia + votos.nota_charme + votos.nota_elegancia + votos.nota_desenvoltura ELSE 0 END) AS J4, SUM(CASE WHEN votos.id_jurado = 5 THEN votos.nota_simpatia + votos.nota_charme + votos.nota_elegancia + votos.nota_desenvoltura ELSE 0 END) AS J5, SUM(CASE WHEN votos.id_jurado = 6 THEN votos.nota_simpatia + votos.nota_charme + votos.nota_elegancia + votos.nota_desenvoltura ELSE 0 END) AS J6, SUM(CASE WHEN votos.id_jurado = 7 THEN votos.nota_simpatia + votos.nota_charme + votos.nota_elegancia + votos.nota_desenvoltura ELSE 0 END) AS J7 FROM votos JOIN participantes ON votos.id_participante = participantes.id where participantes.sexo = 'F' GROUP BY participantes.nome ORDER BY participantes.nome;";

        $consulta_feita_f = $this->pdo->prepare($consulta_f);
        $consulta_feita_f->execute();
        $vencedores = $this->vencedor();
        $vencedores = $this->vencedor();
        if (sizeof($vencedores) !== 4) {
            echo '<p class="aviso">&#9888; Verifique se todos desfilaram e se todos os jurados votaram...</p>';
        }
        if ($consulta_feita_f) {
            echo '<table>';
            echo '<caption>Homens</caption>';
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
            $tipo = '';
            foreach ($consulta_feita_f as $linha) {
                if (isset($vencedores['rainha']) and $linha['nome_participante'] === $vencedores['rainha']) {
                    $tipo = 'rainha';
                    // echo "<script>$linha[nome_participante] $vencedores[rainha]</script>";
                }
                if (isset($vencedores['princesa']) and $linha['nome_participante'] === $vencedores['princesa']) {
                    $tipo = 'princesa';
                    // echo "<script>$linha[nome_participante] $vencedores[princesa]</script>";
                }
                echo "<tr class=\"$tipo\">";
                echo "<td>$linha[nome_participante]</td>";
                echo "<td>$linha[J1]</td>";
                echo "<td>$linha[J2]</td>";
                echo "<td>$linha[J3]</td>";
                echo "<td>$linha[J4]</td>";
                echo "<td>$linha[J5]</td>";
                echo "<td>$linha[J6]</td>";
                echo "<td>$linha[J7]</td>";
                echo '</tr>';
                $tipo = '';
            }
            echo '</table>';
        } else {
            echo '<p>Parece que ainda não há votações.</p>';
        }
    }
    public function resultado_geral_f() {
        $consulta_m = "SELECT participantes.nome  AS nome_participante, SUM(CASE WHEN votos.id_jurado = 1 THEN votos.nota_simpatia + votos.nota_charme + votos.nota_elegancia + votos.nota_desenvoltura ELSE 0 END) AS J1, SUM(CASE WHEN votos.id_jurado = 2 THEN votos.nota_simpatia + votos.nota_charme + votos.nota_elegancia + votos.nota_desenvoltura ELSE 0 END) AS J2, SUM(CASE WHEN votos.id_jurado = 3 THEN votos.nota_simpatia + votos.nota_charme + votos.nota_elegancia + votos.nota_desenvoltura ELSE 0 END) AS J3, SUM(CASE WHEN votos.id_jurado = 4 THEN votos.nota_simpatia + votos.nota_charme + votos.nota_elegancia + votos.nota_desenvoltura ELSE 0 END) AS J4, SUM(CASE WHEN votos.id_jurado = 5 THEN votos.nota_simpatia + votos.nota_charme + votos.nota_elegancia + votos.nota_desenvoltura ELSE 0 END) AS J5, SUM(CASE WHEN votos.id_jurado = 6 THEN votos.nota_simpatia + votos.nota_charme + votos.nota_elegancia + votos.nota_desenvoltura ELSE 0 END) AS J6, SUM(CASE WHEN votos.id_jurado = 7 THEN votos.nota_simpatia + votos.nota_charme + votos.nota_elegancia + votos.nota_desenvoltura ELSE 0 END) AS J7 FROM votos JOIN participantes ON votos.id_participante = participantes.id where participantes.sexo = 'M' GROUP BY participantes.nome ORDER BY participantes.nome;";

        $consulta_feita_m = $this->pdo->prepare($consulta_m);
        $consulta_feita_m->execute();
        $vencedores = $this->vencedor();
        $vencedores = $this->vencedor();
        if (sizeof($vencedores) !== 4) {
            echo '<p class="aviso">&#9888; Verifique se todos desfilaram e se todos os jurados votaram...</p>';
        }
        if ($consulta_feita_m) {
            echo '<table>';
            echo '<caption>Mulheres</caption>';
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
            $tipo = '';
            foreach ($consulta_feita_m as $linha) {
                if (isset($vencedores['rei']) and $linha['nome_participante'] === $vencedores['rei']) {
                    $tipo = 'rei';
                    // echo "<script>$linha[nome_participante] $vencedores[rei]</script>";
                }
                if (isset($vencedores['principe']) and $linha['nome_participante'] === $vencedores['principe']) {
                    $tipo = 'principe';
                    // echo "<script>$linha[nome_participante] $vencedores[principe]</script>";
                }
                echo "<tr class=\"$tipo\">";
                echo "<td>$linha[nome_participante]</td>";
                echo "<td>$linha[J1]</td>";
                echo "<td>$linha[J2]</td>";
                echo "<td>$linha[J3]</td>";
                echo "<td>$linha[J4]</td>";
                echo "<td>$linha[J5]</td>";
                echo "<td>$linha[J6]</td>";
                echo "<td>$linha[J7]</td>";
                echo '</tr>';
                $tipo = '';
            }
            echo '</table>';
        } else {
            echo '<p>Parece que ainda não há votações.</p>';
        }
    }
    public function resultado_jurado($id_jurado) {
        $consulta = "SELECT participantes.nome as p_nome, votos.nota_simpatia as n1, votos.nota_charme as n2, votos.nota_elegancia as n3, votos.nota_desenvoltura as n4 FROM votos inner join participantes on participantes.id = votos.id_participante where :id_jurado = votos.id_jurado;";
        $consulta_feita = $this->pdo->prepare($consulta);
        $consulta_feita->bindValue(":id_jurado", $id_jurado);
        $consulta_feita->execute();
        if ($consulta_feita) {
            echo '<table>';
            echo '<thead><tr>';
            echo '<th>Participante</th>';
            echo '<th>Nota 1</th>';
            echo '<th>Nota 2</th>';
            echo '<th>Nota 3</th>';
            echo '<th>Nota 4</th>';
            echo '</tr></thead>';
            foreach ($consulta_feita as $linha) {
                echo "<tr><td>$linha[p_nome]</td>";
                echo "<td>$linha[n1]</td>";
                echo "<td>$linha[n2]</td>";
                echo "<td>$linha[n3]</td>";
                echo "<td>$linha[n4]</td>";
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '<p>Parece que ainda não há votações.</p>';
        }

    }
}
?>
