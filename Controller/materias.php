<?
include_once 'cURLRequest.php';



if (isset($_POST['Nombre'])){
    
    $json = new stdClass();
    $json->Nombre = $_POST["Nombre"];

    $curl = new stdClass();
    $curl->URL = "http://192.168.99.100/ProyectoProlog/public/api/setmateria";
    $curl->VERBO = "POST";
    $curl->DATA = json_encode($json);

    $data = new cURLRequest();

    $resultado = $data->ApiRest($curl);

    $jsonresultado = json_decode($resultado->body);
    $MensajeMateria = $jsonresultado->mensaje;
    header('Location: ../View/base-conocimientos.php');
}

if (($_GET['option']=='delete')){
    $json = new stdClass();
    
    $json->IdMateria = $_GET["id"];

    $curl = new stdClass();
    $curl->URL = "http://192.168.99.100/ProyectoProlog/public/api/materiadelete";
    $curl->VERBO = "DELETE";
    $curl->DATA = json_encode($json);

    $data = new cURLRequest();

    $resultado = $data->ApiRest($curl);

    $jsonresultado = json_decode($resultado->body);

    header('Location: ../View/base-conocimientos.php');
}

    function showDatos(){
        $json = new stdClass();   
        $curl = new stdClass();
        $curl->URL = "http://192.168.99.100/ProyectoProlog/public/api/getmaterias";
        $curl->VERBO = "GET";
        $curl->DATA = json_encode($json);
        
        $data = new cURLRequest();

        $resultado = $data->ApiRest($curl);
        
        $jsonresultado = json_decode($resultado->body);

        echo "<table><thead><tr><td>Fecha</td><td>Título</td><td>Enlace</td></tr></thead><tbody>";
        foreach($jsonresultado as $post){
            echo "<tr><td>".$post['IdMateria']."</td><td>";
        }
        echo "</tbody></table>";
    }