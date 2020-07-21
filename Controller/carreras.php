<?
include_once 'cURLRequest.php';

if (isset($_POST["Nombre"])){

    $json = new stdClass();
    $json->Nombre = $_POST["Nombre"];
    
    $curl = new stdClass();
    $curl->URL = "http://localhost/ProyectoProlog/public/api/carrera";
    $curl->VERBO = "POST";
    $curl->DATA = json_encode($json);
    
    $data = new cURLRequest();

    $resultado = $data->ApiRest($curl);
    
    $jsonresultado = json_decode($resultado->body);
}

if (isset($_GET['option']=='delete')){
    $json = new stdClass();
    $json->IdCarrera = $_GET["IdCarrera"];
    
    $curl = new stdClass();
    $curl->URL = "http://localhost/ProyectoProlog/public/api/carreradelete";
    $curl->VERBO = "DELETE";
    $curl->DATA = json_encode($json);

    $data = new cURLRequest();

    $resultado = $data->ApiRest($curl);
    
    $jsonresultado = json_decode($resultado->body);
}
