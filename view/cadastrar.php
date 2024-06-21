<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar participante</title>
    <link rel="shortcut icon" href="assets/icon.png" type="png">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header></header>
    <main>
        <div class="cabecalho">
            <div class="linha-cab">
                <h1>Votação Realeza Salaberga 2024</h1>
                <h2>Cadastrar participante</h2>
            </div>
        </div>
        <form action="../control/controle-cadastrar.php" method="POST" autocomplete="off">
            <div class="campo">
                <div class="linha">
                    <label for="nomeId">
                        Nome:
                    </label>
                </div>
                <div class="linha">
                    <input type="text" name="nome" id="nomeId" required>
                </div>
                <div class="linha">
                    <label for="sexo" required>
                        Sexo:
                    </label>
                </div>
                <div class="linha">
                    <select name="sexo" id="sexo" class="classic" required>
                        <option value="M">Masculino</option>
                        <option value="F">Feminino</option>
                    </select>
                </div>
                <div class="campo">
                    <div class="linha btns">
                        <div class="area-btn">
                            <input type="submit" name="btnCad" value="Enviar" class="btn enviar">
                            <input type="reset" value="Limpar" class="btn limpar">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
    <footer>
        <p>Site desenvolvido por <a href="https://instagram.com/29erik_" target="_blank" rel="noopener noreferrer">Ramon Erik (Informática 2022-2024)</a></p>
    </footer>
</body>
</html>