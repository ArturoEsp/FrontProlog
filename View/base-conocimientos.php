<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Base de Conocimientos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="../js/ajax.js"></script>
</head>

<body>
    <?php
    include 'menu-header.html';
    include_once '../Controller/carreras.php';
    include_once '../Controller/getmaterias.php'

    ?>



    <div class="container-conocimiento">
        <h2>Base de conocimientos</h2>
        <span>Ingresa la información correspondiente al sistema experto</span>
        <div class="mod-form">

            <div class="form-conocimiento">
                <h3>Carreras</h3>
                <form id="form-carreras" method="POST">
                    <div>
                        <label>Nombre de la carrera: </label>
                        <input type="text" id="Nombre" required>
                        <input type="submit" class="btn-submit" value="Agregar" onclick="InsertarCarrera($('#Nombre').val())">
                        <br />
                    </div>
                    <span id="msg-carreras"></span>
                </form>

                <div class="table-registros" id="table-carreras">
                </div>

            </div>

            <div class="form-conocimiento">
                <h3>Habilidades</h3>
                <form id="form-materias" method="POST">
                    <div>
                        <label>Nombre de la habilidad: </label>
                        <input type="text" id="NombreMateria" required>
                        <input type="submit" class="btn-submit" value="Agregar" onclick="InsertarMateria($('#NombreMateria').val())">
                        <br />
                    </div>
                    <span id="msg-materias"></span>
                </form>
                <div class="table-registros" id="table-materias">
                </div>
            </div>
        </div>

        <div class="mod-form-2">
            <div class="form-conocimiento" id="padre">
                <form  method="POST">
                    <div>
                        <label>Enlazar datos: </label>
                        <div id="CarreraMaterias" style="display: inline;"></div>
                        <input type="number" min="0" max="10" id="Peso" placeholder="Peso" required style="width: 65px;" maxlength="2">
                        <input type="submit" class="btn-submit" value="Agregar" onclick="InsertarCarreraMateria($('#IdCarrera').val(),$('#IdMateria').val(),$('#Peso').val())">
                        <br />
                    </div>
                </form>
                <span></span>
                <div class="table-enlazar" id="table-carreramaterias">
                </div>
            </div>
        </div>

        <div class="form-preguntas">
            <div class="form-conocimiento">
                <h3>Preguntas</h3>
                <form>
                    <div>
                        <label>Pregunta: </label>
                        <input type="text" id="Pregunta" required>

                        <select id="idMateria2">
            
                        </select>
                        <input type="submit" class="btn-submit" value="Agregar" onclick="InsertarPregunta($('#idMateria2').val(), $('#Pregunta').val())">
                    </div>
                </form>
                <div class="table-registros" id="table-preguntas"></div>
            </div>
        </div>
    </div>
</body>

</html>