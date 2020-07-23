<?
include_once 'cURLRequest.php';

if(isset($_POST['Nombre']) && isset($_POST['Usuario']) && isset($_POST['Contrasena'])){

    $json = new stdClass();
    $json->Nombre = $_POST["Nombre"];   
    $json->Usuario = $_POST["Usuario"];   
    $json->Contrasena = $_POST["Contrasena"];   

    $curl = new stdClass();
    $curl->URL = "http://apache/ProyectoProlog/public/api/usuarios";
    $curl->VERBO = "POST";
    $curl->DATA = json_encode($json);

    $data = new cURLRequest();

    $resultado = $data->ApiRest($curl);
    
    $jsonresultado = json_decode($resultado->body);
    
    header('Location: ../View/login.php');
}