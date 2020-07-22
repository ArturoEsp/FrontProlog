<?
include_once 'cURLRequest.php';

if(($_GET['option']) == "register"){

    $json = new stdClass();
    $json->Nombre = $_POST["Nombre"];   
    $json->Usuario = $_POST["Usuario"];   
    $json->Contrasena = $_POST["Contrasena"];   

    $curl = new stdClass();
    $curl->URL = "http://192.168.99.100/ProyectoProlog/public/api/usuarios";
    $curl->VERBO = "POST";
    $curl->DATA = json_encode($json);

    $data = new cURLRequest();

    $resultado = $data->ApiRest($curl);
    
    $jsonresultado = json_decode($resultado->body);

    header('Location: ../View/login.php');
}