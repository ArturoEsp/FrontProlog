
<?php


if ($_POST['table'] == '1') {


    include_once '../Controller/cURLRequest.php';
    $json = new stdClass();
    $curl = new stdClass();
    $curl->URL = "http://apache/ProyectoProlog/public/api/getpreguntas";
    $curl->VERBO = "GET";
    $curl->DATA = json_encode($json);

    $data = new cURLRequest();

    $resultado = $data->ApiRest($curl);

    $jsoncarrera = json_decode($resultado->body);


    echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Pregunta</th>
                    <th>Habilidad</th>
                    <th>Eliminar</th>
                </tr>

                <tr>";

    foreach ($jsoncarrera as $obj) {
        $id = $obj->IdPregunta;
        $idmateria = $obj->IdMateria;
        $pregunta = $obj->Pregunta;
        echo "<tr> <td> $id </td>
                    <td> $pregunta </td>
                    <td> $idmateria </td>
                    <td style=\"text-align: center; width: 10px;\">
                    <a href=\"../Controller/queryPreguntas.php?delete=1&id=$id\" id=\"delete\" class=\"delete-item\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>
                    </td> </tr>";
    }
    echo "</tr> </table>";
}


if($_POST['add'] == '1'){

    include_once '../Controller/cURLRequest.php';
    $json = new stdClass();
    $json->IdMateria = $_POST['IdMateria'];
    $json->Pregunta = $_POST['Pregunta'];

 $curl = new stdClass();
    $curl->URL = "http://apache/ProyectoProlog/public/api/setpreguntas";
    $curl->VERBO = "GET";
    $curl->DATA = json_encode($json);

    $data = new cURLRequest();

    $resultado = $data->ApiRest($curl);

    $jsoncarrera = json_decode($resultado->body); 
}

if($_GET['delete'] == '1'){

    include_once '../Controller/cURLRequest.php';
    $json = new stdClass();
    $json->IdMateria = $_GET['id'];

 $curl = new stdClass();
    $curl->URL = "http://apache/ProyectoProlog/public/api/deletepregunta";
    $curl->VERBO = "DELETE";
    $curl->DATA = json_encode($json);

    $data = new cURLRequest();

    $resultado = $data->ApiRest($curl);

    $jsoncarrera = json_decode($resultado->body); 
    header('Location: ');
    
}

?>
