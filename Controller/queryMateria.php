<?php

include_once '../Controller/cURLRequest.php';
$json = new stdClass();
$curl = new stdClass();
$curl->URL = "http://apache/ProyectoProlog/public/api/getmaterias";
$curl->VERBO = "GET";
$curl->DATA = json_encode($json);

$data = new cURLRequest();

$resultado = $data->ApiRest($curl);

$jsoncarrera = json_decode($resultado->body);


echo "<table>
            <tr>
                <th>ID</th>
                <th>Materia</th>
                <th>Eliminar</th>
            </tr>

            <tr>";

foreach ($jsoncarrera as $obj) {
    $id = $obj->IdMateria;
    $nombre = $obj->Nombre;
    echo "<tr> <td> $id </td>
                <td> $nombre </td>
                <td style=\"text-align: center; width: 10px;\">
                <a href=\"../Controller/materias.php?option=delete&id=$id\" id=\"delete\" class=\"delete-item\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>
                </td> </tr>";
}
echo "</tr> </table>";


?>
