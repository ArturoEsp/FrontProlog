<?
include_once 'cURLRequest.php';

if (isset($_SESSION['user'])){

}

if (isset($_POST['Nombre'])){
    
    $json = new stdClass();
    $json->nombre = $_POST["Nombre"];

    $curl = new stdClass();
    $curl->URL = "http://192.168.99.100/ProyectoProlog/public/api/carreras";
    $curl->VERBO = "GET";
    $curl->DATA = json_encode($json);

    $data = new cURLRequest();

    $resultado = $data->ApiRest($curl);

    $jsonresultado = json_decode($resultado->body);
}

if (isset($_GET['option']=='delete')){
    
    $json = new stdClass();
    $json->nombre = $_POST["IdMateria"];

    $curl = new stdClass();
    $curl->URL = "http://192.168.99.100/ProyectoProlog/public/api/carreras";
    $curl->VERBO = "DELETE";
    $curl->DATA = json_encode($json);

    $data = new cURLRequest();

    $resultado = $data->ApiRest($curl);

    $jsonresultado = json_decode($resultado->body);
}