<?
include_once 'cURLRequest.php';

/* $userSession = new UserSession();


if (isset($_SESSION['user'])){
    
} */


if (isset($_POST['Usuario']) && isset($_POST['Contrasena'])) {

    $usuario = $_POST["Usuario"];
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

        echo GetRolUsuario($usuario);

       /*  if()
        {
            //$userSession->setCurrentUser("1");           
            //header('Location: ../View/base-conocimientos.php');
        }
         else
        {
            //$userSession->setCurrentUser("0");s
            //header('Location: ../View/index.php');
        }  */

    }
    
    else{
        header('Location: ../View/login.php');
    }  
    
}

function GetRolUsuario($usuario){
    
    $json = new stdClass();
    $json->usuario = $usuario;
    
    $curl = new stdClass();
    $curl->URL = "http://192.168.99.100/ProyectoProlog/public/api/usuario";
    $curl->VERBO = "GET";
    $curl->DATA = json_encode($json);

    $data = new cURLRequest();
    $resultado = $data->ApiRest($curl);
    
    $jsonresultado = json_decode($resultado->body);

    return $jsonresultado;
}