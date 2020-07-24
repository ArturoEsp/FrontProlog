<?
include_once 'cURLRequest.php';



if (isset($_POST['NombreMateria'])){
    
    $json = new stdClass();
    $json->Nombre = $_POST["NombreMateria"];

    $curl = new stdClass();
    $curl->URL = "http://apache/ProyectoProlog/public/api/setmateria";
    $curl->VERBO = "GET";
    $curl->DATA = json_encode($json);

    $data = new cURLRequest();

    $resultado = $data->ApiRest($curl);

    $jsonresultado = json_decode($resultado->body);
    $MensajeMateria = $jsonresultado->mensaje;
    
}

if (($_GET['option'] == 'delete')){
    $json = new stdClass();
    
    $json->IdMateria = $_GET["id"];

    $curl = new stdClass();
    $curl->URL = "http://apache/ProyectoProlog/public/api/materiadelete";
    $curl->VERBO = "DELETE";
    $curl->DATA = json_encode($json);

    $data = new cURLRequest();

    $resultado = $data->ApiRest($curl);

    $jsonresultado = json_decode($resultado->body);

    
}

  