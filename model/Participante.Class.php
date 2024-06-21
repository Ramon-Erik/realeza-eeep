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
            $cadastrar->bindValue(':nome', urlencode($nome));
            $cadastrar->bindValue(':sexo', $sexo);
            $cadastrar->execute();
            header('location:../view/sucesso.php?s_id=1');
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
            if ($select_p->rowCount() >= 1) {
                echo '<select name="participante" id="participanteId" class="classic">';
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
                    echo "<option value=\"$p[id]\">". urldecode($p['nome']). "</option>"; 
                }
                echo '</select>';
            } else {
                echo '<select name="participante" id="participanteId" class="classic"><option value="none">Nenhum participante cadastrado até o momento.</option></select>';
            }
        } catch (PDOException $pdo_e) {
            echo '<p>Erro com o pdo:</p><pre>' . $pdo_e;
        } catch (Exception $exc) {
            echo '<p>Erro php:</p><pre>' . $exc;
        }
    }
}
?>