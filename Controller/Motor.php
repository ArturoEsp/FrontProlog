<?php

include '../Controller/cURLRequest.php';
echo "<link rel=stylesheet href=../css/style.css>";
//if(($_GET['PesoRespuesta'])=='true'){
$json = new stdClass();
$respuestas = new stdClass();
$curl = new stdClass();
$curl->URL = "http://apache/ProyectoProlog/public/api/getpreguntas";
$curl->VERBO = "GET";
$curl->DATA = json_encode($json);

$data = new cURLRequest();
$resultado = $data->ApiRest($curl);

$jsonresultado = json_decode($resultado->body);

$array = array();
foreach ($jsonresultado as $obj) {
    $preguntas = new stdClass();
    $IdPregunta = $obj->IdPregunta;
    $IdMateria = $obj->IdMateria;
    $pregunta = $obj->Pregunta;

    $varid = 'id' . $IdPregunta;
    $varpeso = 'Peso' . $IdPregunta;

    //array_push($array,$obj);

    $array[] = array("IdPregunta" => $_GET[$varid], "Peso" => $_GET[$varpeso], "IdMateria" => $IdMateria);
}
//var_dump($array);


$curl = new stdClass();
$curl->URL = "http://apache/ProyectoProlog/public/api/getDis";
$curl->VERBO = "GET";

$data = new cURLRequest();
$resultado = $data->ApiRest($curl);

$jsonres = json_decode($resultado->body);

foreach($jsonres as $val){
    $Id=$val->IdCarrera;
    $Resul = 0;
    foreach ($array as $value) {
        $array2 = json_decode(GetPesoMateria($value['IdMateria'],$Id));
        foreach ($array2 as $obj) {
            $varMat = $obj->Peso;
            $varPre = $value['Peso'];
            //var_dump($varMat);
            //var_dump($varPre);echo"<br>";
            $Resul += CalcularPregunta($varMat,$varPre);
            
        }
        
    }
    //var_dump($Resul);echo"<br>";
    CalculaResultado($Resul,$Id);
}


/*
foreach ($array as $value) {

    $array2 = json_decode(GetPesoMateria($value['IdMateria'],$jsonres->IdCarrera));
    //var_dump($array2);
    //echo"<br>";
    $Resul = 0;
    foreach ($array2 as $obj) {
        $varMat = $obj->Peso;
        $otravar = $obj->IdCarrera;
        $varPre = $value['Peso'];
        //var_dump($varMat);
        //var_dump($varPre);echo"<br>";
        $Resul = CalcularPregunta($varMat,$varPre);
    }
    CalculaResultado($Resul);
    //var_dump($Resul);
}*/
//CalculaResultado($Resul);

function CalculaResultado($Resul,$id){
    //var_dump($id);echo"<br>";
    $json = new stdClass();
    $json->IdCarrera = $id;
    $curl = new stdClass();
    $curl->URL = "http://apache/ProyectoProlog/public/api/getTotal";
    $curl->VERBO = "GET";
    $curl->DATA = json_encode($json);

    $data = new cURLRequest();
    $resultado = $data->ApiRest($curl);

    $jsonresultado = json_decode($resultado->body);
    //var_dump($resultado);

    //echo"<div style='display:flex; justify-content:center; background-color: red;'";
    /*
    foreach ($jsonresultado as $obj) {
        $Nombre = $obj->Nombre;
        $PesoTotal = $obj->PesoTotal;
        //var_dump($PesoTotal);echo"<br>";
        //var_dump($Resul);
        $valorCarrera = (100 / $PesoTotal) * $Resul;
        //var_dump($valorCarrera);
        
        echo"
                <div style='background-color: #245483; text-align:center; width:100%;'>
                    <h3 style='color:#fff;'>El porcentaje de la carrera: $Nombre es: $valorCarrera %</h3>
                </div>";
        
        echo "El porcentaje de la carrera: ".$Nombre." es: ".$valorCarrera."%<br>";
        
    }*/
    foreach ($jsonresultado as $obj) {
        $Nombre = $obj->Nombre;
        $PesoTotal = $obj->PesoTotal;
        $valorCarrera = (100 / $PesoTotal) * $Resul;
    }
    
    echo "El porcentaje de la carrera: ".$Nombre." es: ".$valorCarrera."%<br>";
    //echo "</div>";
}

function CalcularPregunta($PesoPregunta, $PesoMateria)
{
    $var1=$PesoPregunta;
    $var2=$PesoMateria;
    //echo($var1);
    //echo($var2);echo"<br>";
    
    $resultado = 0.0;
    if ($PesoPregunta != 0 || $PesoMateria != 0) {
        $resultado = ($var1 * $var2) / 10.0;
        //var_dump($resultado);
    }
    return $resultado;
}

/*
function GetPesoMateria($idmateria)
{
    $json = new stdClass();
    $json->IdMateria = $idmateria;
    $respuestas = new stdClass();
    $curl = new stdClass();
    $curl->URL = "http://apache/ProyectoProlog/public/api/getMotor";
    $curl->VERBO = "GET";
    $curl->DATA = json_encode($json);

    $data = new cURLRequest();
    $resultado = $data->ApiRest($curl);
    
    $jsonresultado = json_decode($resultado->body);
    //var_dump(json_encode($jsonresultado));
    return json_encode($jsonresultado);
}*/

function GetPesoMateria($idmateria,$idcarrera)
{
    $json = new stdClass();
    $json->IdMateria = $idmateria;
    $json->IdCarrera = $idcarrera;
    $respuestas = new stdClass();
    $curl = new stdClass();
    $curl->URL = "http://apache/ProyectoProlog/public/api/getFinal";
    $curl->VERBO = "GET";
    $curl->DATA = json_encode($json);

    $data = new cURLRequest();
    $resultado = $data->ApiRest($curl);
    
    $jsonresultado = json_decode($resultado->body);
    //var_dump(json_encode($jsonresultado));
    return json_encode($jsonresultado);
}