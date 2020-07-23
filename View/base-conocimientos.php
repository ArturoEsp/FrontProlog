<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Base de Conocimientos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    $(document).ready(iniciar);

    function iniciar() {
        $("#valores").change(mostrarTitulo);
    }

    function mostrarTitulo() {
        var x = $(this).val();
        $.ajax({
            url: "../Controller/carreras.php",
            type: "get",
            success: function(data) {
                $("#cajatexto").val(data);
            }
        });
    }

    //
    function iniciar2() {
        $("#valores").change(mostrarTitulo2);
    }

    function mostrarTitulo2() {
        var x = $(this).val();
        $.ajax({
            url: "../Controller/materias.php",
            type: "get",
            success: function(data) {
                $("#cajatexto").val(data);
            }
        });
    }
    //
</script>

<body>
    <?php
    include 'menu-header.html';
    include_once '../Controller/carreras.php';
    include_once '../Controller/getmaterias.php';


    ?>

    <div class="container-conocimiento">
        <h2>Base de conocimientos</h2>
        <span>Ingresa la información correspondiente al sistema experto</span>
        <div class="mod-form">

            <div class="form-conocimiento">
                <h3>Carreras</h3>
                <form action="..\Controller\carreras.php?" method="POST">
                    <div>
                        <label>Nombre de la carrera: </label>
                        <input type="text" name="Nombre" required>
                        <input type="submit" class="btn-submit" value="Agregar">
                        <br />
                    </div>
                </form>
                <div class="table-registros">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Carrera</th>
                            <th>Eliminar</th>
                        </tr>

                        <tr>
                            <?php

                            $json = new stdClass();
                            $curl = new stdClass();
                            $curl->URL = "http://192.168.99.100/ProyectoProlog/public/api/carreras";
                            $curl->VERBO = "GET";
                            $curl->DATA = json_encode($json);

                            $data = new cURLRequest();

                            $resultado = $data->ApiRest($curl);

                            $jsoncarrera = json_decode($resultado->body);

                            //echo $jsonresultado;
                            // print_r($jsonresultado);

                            foreach ($jsoncarrera as $obj) {
                                $id = $obj->IdCarrera;
                                $nombre = $obj->Nombre;
                                echo "<tr> <td> $id </td>
                                <td> $nombre </td>
                                <td style=\"text-align: center; width: 10px;\">
                                <a href=\"../Controller/carreras.php?option=delete&id=$id\" id=\"delete\" class=\"delete-item\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>
                                </td> </tr>";
                            }
                            ?>

                        </tr>
                    </table>

                </div>
            </div>

            <div class="form-conocimiento">
                <h3>Habilidades</h3>
                <form action="..\Controller\materias.php?" method="POST">
                    <div>
                        <label>Nombre de la habilidad: </label>
                        <input type="text" name="Nombre" required>
                        <input type="submit" class="btn-submit" value="Agregar">
                        <br />
                    </div>
                </form>
                <div class="table-registros">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Habilidad</th>
                            <th>Eliminar</th>
                        </tr>

                        <tr>
                            <?php

                            $json = new stdClass();
                            $curl = new stdClass();
                            $curl->URL = "http://192.168.99.100/ProyectoProlog/public/api/getmaterias";
                            $curl->VERBO = "GET";
                            $curl->DATA = json_encode($json);

                            $data = new cURLRequest();

                            $resultado = $data->ApiRest($curl);

                            $jsonresultado = json_decode($resultado->body);

                            //echo $jsonresultado;
                            // print_r($jsonresultado);

                            foreach ($jsonresultado as $obj) {
                                $id = $obj->IdMateria;
                                $nombre = $obj->Nombre;
                                echo "<tr> <td> $id </td>
                                <td> $nombre </td>
                                <td style=\"text-align: center; width: 10px;\">
                                <a href=\"../Controller/materias.php?option=delete&id=$id\" id=\"delete\" class=\"delete-item\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>
                                </td> </tr>";
                            }
                            ?>

                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="mod-form-2">
            <div class="form-conocimiento">
                <form action="..\Controller\CarreraMateria.php?" method="POST">
                    <div>
                        <label>Enlazar datos: </label>
                        <select name="Carrera">
                            <option value="">- Carrera -</option>
                            <?php

                            $json = new stdClass();
                            $curl = new stdClass();
                            $curl->URL = "http://192.168.99.100/ProyectoProlog/public/api/carreras";
                            $curl->VERBO = "GET";
                            $curl->DATA = json_encode($json);

                            $data = new cURLRequest();

                            $resultado = $data->ApiRest($curl);

                            $jsonresultado = json_decode($resultado->body);

                            //echo $jsonresultado;
                            // print_r($jsonresultado);

                            foreach ($jsonresultado as $obj) {
                                $id = $obj->IdCarrera;
                                $nombre = $obj->Nombre;
                                echo "<option value = \"$id\">$nombre</option>";
                            }
                            ?>
                        </select>
                        <select name="Materia">
                            <option value="">- Habilidad -</option>
                            <?php

                            $json = new stdClass();
                            $curl = new stdClass();
                            $curl->URL = "http://192.168.99.100/ProyectoProlog/public/api/getmaterias";
                            $curl->VERBO = "GET";
                            $curl->DATA = json_encode($json);

                            $data = new cURLRequest();

                            $resultado = $data->ApiRest($curl);

                            $jsonresultado = json_decode($resultado->body);

                            //echo $jsonresultado;
                            // print_r($jsonresultado);

                            foreach ($jsonresultado as $obj) {
                                $id = $obj->IdMateria;
                                $nombre = $obj->Nombre;
                                echo "<option value = \"$id\">$nombre</option>";
                            }
                            ?>
                        </select>

                        <input type="text" name="Peso" placeholder="Peso" required style="width: 65px;" maxlength="2">
                        <input type="submit" class="btn-submit" value="Agregar">
                        <br />
                    </div>
                </form>
                <div class="table-enlazar">
                    <table>
                        <tr>
                            <?php
                            foreach ($jsoncarrera as $obj) {
                                $id = $obj->IdCarrera;
                                $nombre = $obj->Nombre;
                                echo "  <table>
                                            <tr>
                                                <th>$nombre</th>
                                                <th>Peso</th>
                                            </tr>
                                            <tr>
                                                <td>Popo</td>
                                                
                                            </tr>    
                                        </table>";
                            }
                            ?>
                   
                </div>
            </div>

        </div>
    </div>
</body>

</html>