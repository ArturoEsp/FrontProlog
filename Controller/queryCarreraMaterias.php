<?php
include_once 'cURLRequest.php';
?>

<?php
if ($_POST['select'] == '1')
{
    echo "<select name=\"IdCarrera\">
    <option>- Carrera -</option>";
  

    $json = new stdClass();
    $curl = new stdClass();
    $curl->URL = "http://apache/ProyectoProlog/public/api/carreras";
    $curl->VERBO = "GET";
    $curl->DATA = json_encode($json);

    $data = new cURLRequest();

    $resultado = $data->ApiRest($curl);

    $jsonresultado = json_decode($resultado->body);

    foreach ($jsonresultado as $obj) {
        $IdCarrera = $obj->IdCarrera;
        $nombre = $obj->Nombre;
        echo "<option value = \"$IdCarrera\">$nombre</option>";
    }

    echo "</select>
    <select name=\"IdMateria\">
    <option>- Habilidad -</option>";
 

    $json = new stdClass();
    $curl = new stdClass();
    $curl->URL = "http://apache/ProyectoProlog/public/api/getmaterias";
    $curl->VERBO = "GET";
    $curl->DATA = json_encode($json);

    $data = new cURLRequest();

    $resultado = $data->ApiRest($curl);

    $jsonmateria = json_decode($resultado->body);


    foreach ($jsonmateria as $obj) {
        $IdMateria = $obj->IdMateria;
        $nombre = $obj->Nombre;
        echo "<option value = \"$IdMateria\">$nombre</option>";
    }
    
   echo "</select>";

}


if ($_POST['table'] == '1') {


    $json = new stdClass();
    $curl = new stdClass();
    $curl->URL = "http://apache/ProyectoProlog/public/api/carreras";
    $curl->VERBO = "GET";
    $curl->DATA = json_encode($json);

    $data = new cURLRequest();

    $resultado = $data->ApiRest($curl);

    $jsoncarrera = json_decode($resultado->body);



    foreach ($jsoncarrera as $obj) {


        echo "<table class=\"table-obj\">
                        <tr>";
        $id = $obj->IdCarrera;
        $nombre = $obj->Nombre;

        $json = new stdClass();
        $json->IdCarrera = $id;

        $curl = new stdClass();
        $curl->URL = "http://apache/ProyectoProlog/public/api/getpesomateria";
        $curl->VERBO = "GET";
        $curl->DATA = json_encode($json);

        $data = new cURLRequest();

        $resultado = $data->ApiRest($curl);

        $jsonresultado = json_decode($resultado->body);

        echo "
                                <th>$nombre</th>
                                <th>Peso</th>
                                ";
        echo "</tr>";
        foreach ($jsonresultado as $obj) {
            $Nombre = $obj->Nombre;
            $peso = $obj->Peso;
            echo "<tr>
                                        <td>$Nombre</td>
                                        <td style='padding-left:3%;'>$peso</td>
                                    </tr>";
        }
    }
    echo "</table>";
}

?>