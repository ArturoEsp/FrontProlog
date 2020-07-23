<?
include_once 'cURLRequest.php';

if (isset($_POST['IdCarrera']) && isset($_POST['IdMateria']) && isset($_POST['Peso'])){

    $json = new stdClass();
    $json->IdCarrera = $_POST["IdCarrera"];
    $json->IdMateria = $_POST["IdMateria"];
    $json->Peso = $_POST["Peso"];
    
    $curl = new stdClass();
    $curl->URL = "http://apache/ProyectoProlog/public/api/setCarreraMaterias";
    $curl->VERBO = "POST";  //CHECAR
    $curl->DATA = json_encode($json);
    
    $data = new cURLRequest();

    $resultado = $data->ApiRest($curl);
    
    $jsonresultado = json_decode($resultado->body);
    $MensajeCarrera = $jsonresultado->mensaje;
    header('Location: ../View/base-conocimientos.php');
}


/////////////////////////////////////
/*function getCarreraMateria($request){

    $carreras=new consulta();
return $carreras->getCarreraMateria($request);
}
class consulta{
    private $conexion;
    
    function __construct(){            
        $database=new DbConnect();
        $this->conexion=$database->connect();
    }

    function getCarreraMateria($request){
        $carreras;
        $response;
        $carrera=json_decode($request->getBody());
        $sql="SELECT * FROM CarreraMaterias WHERE IdCarrera=:IdCarrera AND IdMateria=:IdMateria";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam("IdCarrera",$carrera->IdCarrera);
            $statement->bindParam("IdMateria",$carrera->IdMateria);
            $statement->execute();
            $count=$statement->rowCount();
            
            if($count)
            {
                $response->mensaje = 1;
            }
            else
            {
                $response->mensaje = 0;
            }         
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }


}