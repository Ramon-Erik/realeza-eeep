<?php 
Class Participante {
    public $pdo; 
    public function __construct() {
        $this->pdo = new pdo("mysql:host=localhost; dbname=realeza_eeep", "root", "");
    }
    public function cadastrar_novo($nome, $sexo) {
        try {
            $consulta = "INSERT INTO participantes VALUES(null, :nome, :sexo)";
            $cadastrar = $this->pdo->prepare($consulta);
            $cadastrar->bindValue(':nome', $nome);
            $cadastrar->bindValue(':sexo', $sexo);
            $cadastrar->execute();
        } catch (PDOException $pdo_e) {
            echo '<p>Erro com o pdo:</p><pre>' . $pdo_e;
        } catch (Exception $exc) {
            echo '<p>Erro php:</p><pre>' . $exc;
        }
    }
    public function get_participantes() {
        try {
            $consulta = "SELECT * FROM participantes order by sexo";
            $select_p = $this->pdo->prepare($consulta);
            $select_p->execute();
            if ($select_p) {
                echo '<select name="participante" id="participanteId">';
                echo '<optgroup label="Mulheres">';
                $opt = 1;
                foreach ($select_p as $p) {
                    if ($p['sexo'] === 'M') {
                        if ($opt === 1) {
                            echo "</optgroup>";
                            echo "<optgroup label=\"Homens\">";
                            $opt++;
                        }
                    }
                    echo "<option value=\"$p[id]\">$p[nome]</option>"; 
                }
                echo '</select>';
            }
        } catch (PDOException $pdo_e) {
            echo '<p>Erro com o pdo:</p><pre>' . $pdo_e;
        } catch (Exception $exc) {
            echo '<p>Erro php:</p><pre>' . $exc;
        }
    }
}
?>