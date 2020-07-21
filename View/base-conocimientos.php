<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Base de Conocimientos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php
    include 'menu-header.html';
    ?>

    <div class="container-conocimiento">
        <h2>Base de conocimientos</h2>
        <span>Ingresa la información correspondiente al sistema experto</span>
        <div class="mod-form">
            <div class="form-conocimiento">
                <h3>Carreras</h3>
                <form>
                    <div>
                    <form action="..\Controller\carreras.php" method="POST">
                        <label>Nombre de la carrera: </label>
                            <input type="text" name="Nombre" required>
                            <input type="submit" class="btn-submit" value="Agregar">
                            <br />
                            <span>Registro agregado correctamente!</span>
                        </form>
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
                            <td>1</td>
                            <td>Ing. Sistemas</td>
                            <td style="text-align: center; width: 10px;">
                            <a href="base-conocimientos.php?option=delete" id="delete" class="delete-item"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="form-conocimiento">
                <h3>Habilidades</h3>
                <form>
                    <div>
                        <label>Nombre de la habilidad: </label>
                        <input type="text">
                        <input type="submit" class="btn-submit" value="Agregar">
                        <br />
                        <span>Registro agregado correctamente!</span>
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
                            <td>1</td>
                            <td>Lógica</td>
                            <td style="text-align: center; width: 10px;"><a href="#" class="delete-item"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="mod-form-2">

        </div>
    </div>
</body>

</html>