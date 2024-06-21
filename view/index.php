<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votação Realeza Salaberga</title>
    <link rel="shortcut icon" href="assets/icon.png" type="png">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header></header>
    <main>
        <div class="cabecalho">
            <div class="linha-cab">
                <h1>Votação Realeza Salaberga 2024</h1>
            </div>
        </div>
        <form action="../control/controle-index.php" method="post" id="voto">
            <div class="campo">
                <div class="linha">
                    <h2>Sobre você</h2>
                </div>
                <div class="linha">
                    <label for="juradoId">Você é o jurado </label>
                </div>
                <div class="linha">
                    <select name="jurado" id="juradoId" class="classic">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                    </select>
                </div>
            </div>
            <div class="campo">
                <div class="linha">
                    <h2>Sobre as participantes</h2>
                </div>
                <div class="linha">
                    <label for="participanteId">A participante a se avaliada é a</label>
                </div>
                    <div class="linha">
                        <?php
                        require_once '../model/Participante.Class.php';
                        $x = new Participante;
                        $x->get_participantes();
                        ?>
                    </div>
                <div class="campo">
                    <div class="campo">
                        <div class="linha">
                            <h3>Como você avaliaria a simpatia</h3>
                        </div>
                        <div class="campo-radio">
                            <div class="linha">
                                <label for="simpatiaSeis">
                                    <input type="radio" value="6" required name="simpatia" id="simpatiaSeis">
                                    6
                                </label>
                            </div>
                            <div class="linha">
                                <label for="simpatiaSete">
                                    <input type="radio" value="7" required name="simpatia" id="simpatiaSete">
                                    7
                                </label>
                            </div>
                            <div class="linha">
                                <label for="simpatiaOito">
                                    <input type="radio" value="8" required name="simpatia" id="simpatiaOito">
                                    8
                                </label>
                            </div>
                            <div class="linha">
                                <label for="simpatiaNove">
                                    <input type="radio" value="9" required name="simpatia" id="simpatiaNove">
                                    9
                                </label>
                            </div>
                            <div class="linha">
                                <label for="simpatiaDez">
                                    <input type="radio" value="10" required name="simpatia" id="simpatiaDez">
                                    10
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="campo">
                        <div class="linha">
                            <h3>Como você avaliaria o charme?</h3>
                        </div>
                        <div class="campo-radio">
                            <div class="linha">
                                <label for="charmeSeis">
                                    <input type="radio" value="6" required name="charme" id="charmeSeis">
                                    6
                                </label>
                            </div>
                            <div class="linha">
                                <label for="charmeSete">
                                    <input type="radio" value="7" required name="charme" id="charmeSete">
                                    7
                                </label>
                            </div>
                            <div class="linha">
                                <label for="charmeOito">
                                    <input type="radio" value="8" required name="charme" id="charmeOito">
                                    8
                                </label>
                            </div>
                            <div class="linha">
                                <label for="charmeNove">
                                    <input type="radio" value="9" required name="charme" id="charmeNove">
                                    9
                                </label>
                            </div>
                            <div class="linha">
                                <label for="charmeDez">
                                    <input type="radio" value="10" required name="charme" id="charmeDez">
                                    10
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="campo">
                        <div class="linha">
                            <h3>Como você avaliaria a elegância?</h3>
                        </div>
                        <div class="campo-radio">
                            <div class="linha">
                                <label for="eleganciaSeis">
                                    <input type="radio" value="6" required name="elegancia" id="eleganciaSeis">
                                    6
                                </label>
                            </div>
                            <div class="linha">
                                <label for="eleganciaSete">
                                    <input type="radio" value="7" required name="elegancia" id="eleganciaSete">
                                    7
                                </label>
                            </div>
                            <div class="linha">
                                <label for="eleganciaOito">
                                    <input type="radio" value="8" required name="elegancia" id="eleganciaOito">
                                    8
                                </label>
                            </div>
                            <div class="linha">
                                <label for="eleganciaNove">
                                    <input type="radio" value="9" required name="elegancia" id="eleganciaNove">
                                    9
                                </label>
                            </div>
                            <div class="linha">
                                <label for="eleganciaDez">
                                    <input type="radio" value="10" required name="elegancia" id="eleganciaDez">
                                    10
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="campo">
                        <div class="linha">
                            <h3>Como você avaliaria a desenvoltura?</h3>
                        </div>
                        <div class="campo-radio">
                            <div class="linha">
                                <label for="desenvolturaSeis">
                                    <input type="radio" value="6" required name="desenvoltura" id="desenvolturaSeis">
                                    6
                                </label>
                            </div>
                            <div class="linha">
                                <label for="desenvolturaSete">
                                    <input type="radio" required value="7" name="desenvoltura" id="desenvolturaSete">
                                    7
                                </label>
                            </div>
                            <div class="linha">
                                <label for="desenvolturaOito">
                                    <input type="radio" required value="8" name="desenvoltura" id="desenvolturaOito">
                                    8
                                </label>
                            </div>
                            <div class="linha">
                                <label for="desenvolturaNove">
                                    <input type="radio" required name="desenvoltura" value="9" id="desenvolturaNove">
                                    9
                                </label>
                            </div>
                            <div class="linha">
                                <label for="desenvolturaDez">
                                    <input type="radio" required name="desenvoltura" value="10" id="desenvolturaDez">
                                    10
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="linha btns">
                <div class="area-btn">
                    <button type="button" id="btnAtivarModalId" class="btn enviar">Enviar</button>
                    <dialog id="confirmarId">
                        <div class="cabecalho">
                            <div class="linha-cab">
                                <h3>Deseja realmente enviar?</h3>
                                <h4>Resumo das notas:</h4>
                            </div>
                        </div>
                        <div class="linha">
                            <div class="linha">
                                <p id="primeiro">Simpatia: <span class="nota"></span></p>
                            </div>
                            <div class="linha">
                                <p id="segundo">Charme: <span class="nota"></span></p>
                            </div>
                            <div class="linha">
                                <p id="terceiro">Elegância: <span class="nota"></span></p>
                            </div>
                            <div class="linha">
                                <p id="quarto">Desenvoltura: <span class="nota"></span></p>
                            </div>
                            <div class="linha">
                                <p id="total">Total: <span class="nota-total"></span></p>
                            </div>
                        </div>
                        <div class="btns-dialog">
                            <input type="submit" id="btnEnviarId" name="btnE" value="Enviar">
                            <input type="hidden" name="btnE" value="Enviar">
                            <button type="button" id="btnCancelarId">Cancelar</button>
                        </div>
                    </dialog>
                    <dialog id="erroId">
                        <div class="linha">
                            <h3>Parece que você não marcou todos os campos</h3>
                        </div>
                    </dialog>
                    <input type="reset" value="Limpar" class="btn limpar">
                </div>
            </div>
        </form>
    </main>
    <footer>
        <p>Site desenvolvido por <a href="https://instagram.com/29erik_" target="_blank" rel="noopener noreferrer">Ramon Erik (Informática 2022-2024)</a></p>
    </footer>
    <script src="js/script.js"></script>
</body>

</html>