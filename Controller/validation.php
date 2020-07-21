<?
include_once 'cURLRequest.php';

if (isset($_POST['Usuario']) && isset($_POST['Contrasena'])) {

    $json = new stdClass();
    $json->usuario = $_POST["Usuario"];
    $json->contrasena = $_POST["Contrasena"];
    
    $curl = new stdClass();
    $curl->URL = "http://192.168.99.100/ProyectoProlog/public/api/validation";
    $curl->VERBO = "GET";
    $curl->DATA = json_encode($json);

    $data = new cURLRequest();

    $resultado = $data->ApiRest($curl);
    
    $jsonresultado = json_decode($resultado->body);


    if($jsonresultado->mensaje == 1){
        header('Location: ../View/index.php');
    }else{
        header('Location: ../View/login.html');
    } 
    
}


